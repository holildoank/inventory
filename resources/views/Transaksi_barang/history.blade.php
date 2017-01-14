@extends('layouts.main')
    <script src="{{ asset('/update/plug.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/custome/js/master_barang/history.js') }}"></script>


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
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="javascript:;">Data Barang</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-9">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <span class="caption-subject bold uppercase">{{$judul}}
                            </span>
                        </div>
                    </div>
                    <div >
                        <table class="table table-striped table-hover table-checkable dt-responsive " width="100%" id="table_Barang">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th  class="text-middle text-center">Barang</th>
                                    <th  class="text-middle text-center">Kode</th>
                                    <th  class="text-middle text-center">Stok Masuk</th>
                                    <th  class="text-middle text-center">Stok Keluar</th>
                                    <th  class="text-middle text-center">Satuan</th>
                                    <th  class="text-middle text-center">Jenis Transaksi</th>
                                    <th  class="text-middle text-center"></th>
                                </tr>
                            </thead>

                            <tbody class="allbarang">
                            </tbody>
                		</table>

                		<div class="pagin text-center"></div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
            <div class="col-md-3">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="form-group">
                        <center>

                        </center>
                    </div>
                    <div class="form-group">
                        <label class="control-label"> Kode Barang</label>
                        <input type="text" class="form-control kode_barang" name="kode_barang" id="kode_barang">
                    </div>
                    <div class="form-group">
                        <label class="control-label"> Nama Barang</label>
                        <input type="text" class="form-control nm_barang" name="nm_barang" id="nm_barang">
                    </div>
                    <div class="form-group">
							<label class="control-label">Limit / Page</label>
							<select name="limit" class="form-control">
								<option value="5">5</option>
								<option value="10" selected="selected">10</option>
								<option value="50">50</option>
								<option value="100">100</option>
								<option value="500">500</option>
							</select>
						</div>
                    <div class="form-group">
                        <button class="btn btn-block btn-default btn-proses"><i class="fa fa-search"></i> Cari</button>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
@endsection
