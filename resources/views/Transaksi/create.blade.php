@extends('layouts.main')
 <script src="{{ asset('/update/plug.js') }}"></script>
 <script type="text/javascript" src="{{ asset('/custome/js/master_barang/transaksi.js') }}"></script>
@section('content')
<div class="page-content-wrapper">
    @if(Session::get('notif'))
    <div class="panel-alert">
        <div class="alert alert-{{ Session::get('notif')['label'] }}">
            <button type="button" class="close"><span aria-hidden="true"></span><span class="sr-only">Close</span></button>
            <p>{!! Session::get('notif')['err'] !!}</p>
        </div>
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="panel-alert">
        <div class="alert alert-danger">
            <button type="button" class="close"><span aria-hidden="true"></span><span class="sr-only">Close</span></button>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
	<!-- END
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-bar">
            <ul class="page-breadcrumb breadcrumb">
				<li>
                    <a href="{{URL::to('/')}}">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
				<li>
                    <a href="javascript:;">{{$title}}</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
            <div class="page-toolbar">
            </div>
        </div>
        <div class="row">
            <form method="post" action="{{ url ('/transaksi/transaksi')}}">
	        <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <div class="col-md-12">
                <div class="portlet light portlet-fit portlet-form bordered">
						<table class="table table-hover">
							<thead>
								<tr>
									<th width="25%">Kode</th>
									<th width="20%" class="text-left">Barang</th>
									<th width="15%" class="text-right">Qty</th>
									<th width="30%" class="text-right">Harga</th>
                                    <th width="30%" class="text-right">Total</th>
									<th width="5%" class="text-right"></th>
								</tr>
							</thead>
							<tbody class="content-barang"></tbody>
						</table>
					</div>

					<!-- footer  -->
					<div class="row" style="padding:10px 0;">
						<div class="col-sm-7">
							<div class="form-group">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#barang" onclick="loadbarang(1);"><i class="fa fa-search"></i> Cari Item/Barang</button>
								<button type="button" class="btn btn-danger btn-hapus" style="display:none;"><i class="fa fa-trash"></i> Hapus</button>
								<input type="hidden" name="id_delete" value="0">
							</div>

							<div class="form-group">
								<label for="keterangan">Catatan :</label>
								<textarea name="keterangan" id="keterangan" class="form-control" rows="5"></textarea>
							</div>
                            <input type="hidden" name="tgl_transaksi" value="{{ Format::indoDate(date('Y-m-d')) }}">
						</div>
						<div class="col-sm-5">
							<table class="table table-striped portlet light portlet-fit portlet-form bordered">
								<tr>
									<td width="30%" class="text-right"><strong>Sub Total :</strong></td>
									<td width="70%" class="faktur-subtotal text-right">0,00</td>
								</tr>

								<tr>
									<td class="text-right"><strong>Total :</strong></td>
									<td class="faktur-total text-right">0,00</td>
								</tr>
								<tr valign="center">
									<td class="text-right"><strong>Total Bayar :</strong></td>
									<td class="faktur-total_bayar text-right">
										<input type="number" value="0" name="total_bayar" class="form-control text-right">
									</td>
								</tr>
                                <tr valign="center">
									<td class="text-right"><strong>Uang kemabli :</strong></td>
									<td class="faktur-kembalian text-right">
										<input type="number" value="0" name="kembalian" class="form-control text-right">
									</td>
								</tr>

							</table>
							<input type="hidden" name="subtotal" value="0">
							<input type="hidden" name="grandtotal" value="0">
						</div>
					</div>

					<div class="grid-footer">
						<div class="row">
							<div class="col-sm-2">
								<a href="{{ url('/dashboard') }}" class="btn btn-default btn-block">Batal</a>
							</div>
							<div class="col-sm-offset-7 col-sm-3">
								<button class="btn btn-primary btn-block simpan" type="submit">Simpan</button>
							</div>
						</div>
					</div>
				</div>
            </div>
        </form>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<span id="mode" data-mode="{{ $mode}}"></span>
<div class="modal fade" id="barang" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title"><?php echo $title ?></h4>
		</div>
		<div class="modal-body">
	    			<div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" name="modal-kode-item" class="form-control" placeholder="Kode Barang">
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="modal-barang-item" class="form-control" placeholder="Nama  Barang">
                            </div>
                            <div class="col-sm-3">
                                <div class="btn-group">
                                    <button class="btn btn-lg green btn-search-item"><i class="fa fa-search"></i></button>
                                    <button title="Refresh" class="btn btn-lg red btn-search-item"><i class="fa fa-refresh"></i></button>
                                </div>
                            </div>
                        </div>
	    			</div>
					<br>
                    <div>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Kode Barang</th>
									<th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Stok Barang</th>
									<th></th>
								</tr>
							</thead>
							<tbody class="modal-barang-list">
								<tr>
									<td colspan="4">Memuat...</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="modal-barang-pagin text-center"></div>
    		</div>
    	</div>
    </div>
</div>


@endsection
