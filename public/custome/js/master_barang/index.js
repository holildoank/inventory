$(function(){
$('[name="nm_barang"]').focus();
	hapus = function( _name , _id){
			swal({
				title: "Anda yakin ?",
				text: _name + " akan dihapus secara permanen, dan tidak dapat dikembalikan!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, delete it!",
				closeOnConfirm: false
			}, function(){
				/* Delete with Ajax */
				$('.sweet-alert h2').html('Menghapus...');
				$.ajax({
					type : 'POST',
					url : _base_url + '/masterbarang/destroy',
					data : {id : _id},
					cache : false,
					dataType : 'json',
					success : function(ses){
						
						if(ses.result == true){
							$('.barang-' + _id).addClass('animated hinge', function(){
								setTimeout(function(){
									$('.barang-' + _id).remove();
								}, 2000);
								swal("Deleted!", _name + " Berhasil dihapus dari Database.", "success");
							});
						}

					}
				});

			});
		}

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
		$.getJSON(_base_url + '/masterbarang/ajaxbarang', param, function(json){

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
