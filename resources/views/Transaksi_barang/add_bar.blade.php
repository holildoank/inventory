@extends('layouts.main')
<!-- <script src="{{ asset('/update\plug.js') }}"></script> -->
<!-- <script type="text/javascript" src="{{ asset('/custome/js/master_barang/create_bar.js') }}"></script> -->
<script type="text/javascript">
$.fn.select2.defaults.set( "theme", "bootstrap" );
$('.id_jenis_barang').select2({
    placeholder: 'Pilih jenis Barang',
});
</script>
@section('content')
<div class="page-content-wrapper">

	<!-- END
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-bar">
            <ul class="page-breadcrumb breadcrumb">
				<li>
                    <a href="#">Data Barang</a>
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
            <form method="post" action="{{ url ('/masterbarang/create')}}">
	        <input type="hidden" name="_token" value="{{ csrf_token()}}">
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
                                            <div class="form-group">
                                                <label class="control-label">Nama Item *</label>
                                                <input type="text" class="form-control " name="nm_barang"  id="nm_barang" value="{{ old('nm_barang') ? old('nm_barang') : @$barang->nm_barang }}" placeholder="Silahkan isi form dengan nama item / barang" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Jenis Item/Barang *</label>
                                                <select class="form-control id_jenis_barang" id="id_jenis_barang" name="id_jenis_barang" required>
                                                    <option >Pilih Jenis Barang</option>
                                                     @foreach ($jenis_bar as $key)
                                                        <option value="{{$key->id_jenis_barang}}" {{ $key->id_jenis_barang == @$barang->id_jenis_barang ? 'selected="selected"' : ''}}>{{$key->nm_jenis_bar}}</option>
                                                     @endforeach
                                                </select>
                                            </div>
                                            @if ($mode=='edit'):
                                            <input type="hidden" name="id_barang" id="id_barang" value="{{@$barang->id_barang}}">
                                            <input type="hidden" name="mode" value="{{@$mode}}">
                                            <div class="form-group">
                                                <label class="control-label"> Stok Barang *</label>
                                                <input type="text" class="form-control" name="stok" id="stok" value="{{ (@$barang->in - @$barang->out)}}" readonly="readonly">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"> Stok Nyata *</label>
                                                <input type="text" class="form-control" name="stok_penyesuain" id="stok_penyesuain" value="" placeholder="silahkan masukan stok nyata anda">
                                            </div>
                                            @else
                                            <input type="hidden" name="mode" value="{{@$mode}}">
                                            <div class="form-group">
                                                <label class="control-label"> Qty *</label>
                                                <input type="number" class="form-control" name="in" id="in" value="{{ old('in') ? old('in') : @$barang->in }}" placeholder="masukan jumlah item" required>
                                            </div>
                                            @endif
                                            <div class="form-group">
                                                <label class="control-label">Pilih Satuan *</label>
                                                <select class="form-control id_satuan" id="id_satuan" name="id_satuan" required>
                                                    <option >Pilih Satuan</option>
                                                     @foreach ($satuan as $item)
                                                        <option value="{{$item->id_satuan}}"  {{ $item->id_satuan == @$barang->id_barang ? 'selected="selected"' : ''}}>{{$item->satuan}}</option>
                                                     @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Keterangan </label>
                                                <textarea name="keterangan" rows="2" class="form-control" id="keterangan" cols="2">{{ old('keterangan') ? old('keterangan') : @$barang->keterangan }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Harga Beli</label>
                                                <input type="number" name="harga_beli" id="harga_beli" class="form-control" value="{{ old('harga_beli') ? old('harga_beli') : @$barang->harga_beli }}" placeholder="masukan harga beli item" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Harga Jual</label>
                                                <input type="number" name="harga_jual" id="harga_jual" class="form-control" value="{{ old('harga_jual') ? old('harga_jual') : @$barang->harga_jual }}" placeholder="masukan harga jual item" required>
                                            </div>
                                        </div>
        	    					</div>
        	    				</div>
        	    			</div>
        					<br>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END VALIDATION STATES-->
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

        	    					</div>
        	    				</div>
        	    			</div>
        					<br>
        	                <div class="form-actions">
        	                    <div class="row">
        	                        <div class="col-md-9">
        								<?php if ($mode=='add'): ?>
											<a href="#" class="btn dark btn-outline"> Batal</a>
        									<button type="submit" class="btn green">Simpan</button>
        								<?php elseif ($mode=='edit'): ?>
                                            <a href="#" class="btn dark btn-outline"> Batal</a>
        									<button type="submit" class="btn green">Update</button>
        								<?php endif; ?>
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
@endsection
