@extends('layouts.main')
 <script src="{{ asset('/update/plug.js') }}"></script>
 <script type="text/javascript" src="{{ asset('/custome/js/master_barang/add_stok.js') }}"></script>
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
                    <a href="{{URL::to('masterbarang/masuk')}}">Data Stok Barang</a>
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
            <form method="post" action="{{ url ('/masterbarang/addstok')}}">
	        <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <input type="hidden" name="tgl_transaksi" value="{{ Format::indoDate(date('Y-m-d')) }}">
            <div class="col-md-8">
                <!-- BEGIN VALIDATION STATES-->
                <div class="portlet light portlet-fit portlet-form bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-green bold uppercase">{{$title}}</span>
                        </div>
                    </div>
                    <div class="portlet-body">
        	    			<div class="form-body">
        	                    <div class="alert alert-danger display-hide">
        	                        <button class="close" data-close="alert"></button> Silahkan lengkapi Form di yang bertanda (*) di bawah ini
        	                    </div>
        	                    <div class="row">
        	    					<div class="col-md-12">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-hover table-checkable dt-responsive " width="100%" >
                                                <thead>
                                                    <tr>
                                                        <th width="35%" class="text-middle text-center">Barang</th>
                                                        <th  class="text-middle text-center">Sisa Stok</th>
                                                        <th  class="text-middle text-center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="content-barang"></tbody>
                                    		</table>
        	    					</div>
        	    				</div>
        	    			</div>
        					<br>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END VALIDATION STATES-->
            </div>
        </div>
            <div class="col-md-4">
                <div class="portlet light portlet-fit portlet-form bordered">
                    <div class="portlet-body">
        	    			<div class="form-body">
        	                    <div class="row">
        	    					<div class="col-md-12">
                                          <div class="form-group">
                                              <strong>Dibuat Oleh</strong>
                 							<p>{{ Me::fullName() }}</p>
                 							<strong>Tanggal</strong>
                 							<p>{{ Format::indoDate(date('Y-m-d')) }}</p>

                                            <input type="hidden" name="tgl_transaksi" value="{{ Format::indoDate(date('Y-m-d')) }}">
                                          </div>
                                          <div class="form-group">

                                          </div>
        	    					</div>
        	    				</div>
        	    			</div>
        					<br>
        	                <div class="form-actions">
        	                    <div class="row">
        	                        <div class="col-md-9">
                                        <button type="button" class="btn btn red" data-toggle="modal" data-target="#cari_barang" onclick="loadbarang(1);"><i class="fa fa-search"></i> Cari Barang </button>
        								<button type="submit" class="btn green">Simpan</button>
        	                        </div>
        	                    </div>
        	                </div>
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<span id="mode" data-mode="{{ $mode}}"></span>
<div class="modal fade" id="cari_barang" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
