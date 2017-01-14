$(function(){


	allbarang = function(page){

		var $status_barang    = $('[name="status_barang"]:checked').val();
		var $nm_barang    = $('[name="nm_barang"]').val();
		var $kode_barang    = $('[name="kode_barang"]').val();
		var $limit    = $('[name="limit"]').val();

		$('.btn-proses').button('loading');

		var param = {
			page 	: page,
			status_barang	: $status_barang,
			nm_barang	: $nm_barang,
			kode_barang	: $kode_barang,
			limit	: $limit
		};

		$('.allbarang').css('opacity', .3);
		$.getJSON(_base_url + '/masterbarang/ajaxstokbarang', param, function(json){

			// SETUP
			$('.btn-proses').button('reset');
			$('.allbarang').css('opacity', 1);
			// CONTENT
			// console.log(json.content);
			$('.allbarang').html(json.content);
			$('.pagin').html(json.pagin);


			$('div.pagin > ul.pagination > li > a').click(function(e){
				e.preventDefault();
				var $link     = $(this).attr('href');
				var $split 	= $link.split('?page=');
				var $page 	= $split[1];
				allbarang($page);
			});

		}, 'json');

	}
	$('select').change(function(){
			allbarang(1);
		});
	$('.btn-proses').click(function(){
		allbarang(1);
	});
	$('.btn-proses').ready(function(){
		allbarang(1);
	});

});
