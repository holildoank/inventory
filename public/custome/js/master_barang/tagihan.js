$(function(){


	allbarang = function(page){


		var $nomor_transaksi    = $('[name="nomor_transaksi"]').val();
		var $limit    = $('[name="limit"]').val();

		$('.btn-proses').button('loading');

		var param = {
			page 	: page,
			nomor_transaksi	: $nomor_transaksi,

			limit	: $limit
		};

		$('.allbarang').css('opacity', .3);
		$.getJSON(_base_url + '/transaksi/ajaxtransaksi', param, function(json){

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
