$(function(){


	$('#tab-4 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

	/* Load data Barang */
	loadbarang = function(page){

		var kode_barang = $('[name="modal-kode-item"]').val();
		var nm_barang = $('[name="modal-barang-item"]').val();

		var param = {
			page : page,
			kode_barang : kode_barang,
			nm_barang : nm_barang
		};

		$('.modal-barang-list').css('opacity', .3);

		$.getJSON(_base_url + '/transaksi/loadbarang', param, function(json){

			$('.modal-barang-list').html(json.content);
			$('.modal-barang-pagin').html(json.pagin);
			$('.modal-barang-list').css('opacity', 1);
			$('body').css('cursor', 'default');

			onDataCancel();

			$('div.modal-barang-pagin > ul.pagination > li > a').click(function(e){
				e.preventDefault();
				var $link 	= $(this).attr('href');
				var $split 	= $link.split('?page=');
				var $page 	= $split[1];
				loadbarang($page);
			});
		});
	}
	$('[name="modal-kode-item"], [name="modal-barang-item"]').keyup(function(e){
		if(e.keyCode == 13)add
			loadbarang(1);
	});
	$('.btn-search-item').click(function(){
		loadbarang(1);
	});


    add_barang = function(id){

    		$('.barang1-' + id).css('opacity', .3);
    		$('.btn-barang-' + id).remove();
    		$('.barang-loading-' + id).removeClass('hide');
    		$.getJSON(_base_url + '/transaksi/addbarang', {id : id}, function(json){
    			var $htm = '\
    				<tr  class="item-barang baris_form" data-item="' + json.item.id_barang + '">\
                    <td >\
					<input type="text" class="form-control" value="' + json.item.kode_barang + '" name="kode_barang[]">\
                    </td>\
					<td><input type="text" class="form-control" value="' + json.item.nm_barang + '" name="kode_barang[]"></td>\
    						<input type="hidden" value="' + json.item.id_barang + '" name="id_barang[]">\
    					<td>\
    						<div class="input-group input-group-sm">\
    							<input type="number" data-form="jumlah_input" min="1"   value="1" name="jumlah_input[]" class="form-control " required>\
    						  	<span class="input-group-addon">' + json.item.nm_satuan + '</span>\
    						  	<input type="hidden" name="id_satuan[]" value="' + json.item.id_satuan + '" />\
    						</div>\
    					</td>\
						<td><input type="number" data-form="harga_jual" min="0"   value="' + json.item.harga_jual + '" name="harga_jual[]" class="form-control " required></td>\
						<td><input type="number" data-form="total" value="0" name="total[]" class="form-control text-right" readonly="readonly" required></td>\
                        <td><button title="Hapus" type="button" class="btn btn-danger btn-hapus"><i class="fa fa-trash"></i></button></td>\
    				</tr>\
    			';
    			$('.content-barang').append($htm);
    			$('.barang1-' + json.item.id_barang).remove();
				$('.form-control').keyup(function(e){
					matematika();
				});
				$('.form-control').change(function(e){
					matematika();
				});
				matematika();
    		});
    	}

        $(document).on('click', '.btn-hapus', function(event) {
		event.preventDefault();

		$(this).closest('.baris_form').remove();



	});

	/* MATEMATIKA */
	matematika = function(){
		var subtotal = 0;
		var kembalian =0;
		$(':input[data-form="jumlah_input"]').each(function(i){
			/* PENJUMLAHAN */
			var harga = $(':input[data-form="harga_jual"]')[i].value;
			var kali = harga * $(this).val();
			$(':input[data-form="total"]')[i].value = kali;
			subtotal += kali;
		});
		var total = subtotal;
			kembali_null = 0;

		var bayar = parseInt($(':input[name="total_bayar"]').val());

		if (bayar > subtotal) {
			var kembalian =  bayar - subtotal;

	       }else{
	          var kembalian = kembali_null;
	       }






		$('.faktur-subtotal').html(subtotal);
		$('.faktur-total').html(total);
		$('.faktur-kembalian').html(kembalian);

		$(':input[name="subtotal"]').val(subtotal);
		$(':input[name="grandtotal"]').val(total);
		$(':input[name="kembalian"]').val(kembalian);
	}

	$('.form-control').keyup(function(e){
		matematika();
	});
	$('.form-control').change(function(e){
		matematika();
	});
});
