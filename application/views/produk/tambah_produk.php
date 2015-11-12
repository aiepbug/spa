<h2 class="modal-title" id="myModalLabel">Tambah produk </h2></div>
<div class="modal-body">
	<div class="form-group">
		<label">Barcode * <small id="peringatan_barcode" class="text-danger pull-right">Barcode sudah ada</small></label>
		<input type="hidden" id="barkod" value="0">
		<input type="text" class="form-control" onchange="cekbarcode(this.value)" id="id_produk" placeholder="Barcode" required>
	</div>
	<div class="form-group">
		<label">Nama *</label>
		<input type="text" class="form-control" id="nama" placeholder="Nama" required>
	</div>
	<div class="form-group">
		<label">Jenis *</label>
		<select class="form-control" id="jenis"><?php foreach($jenis as $row){echo '<option value="'.$row->jenis.'">'.strtoupper($row->jenis).'</option>';}?></select>
	</div>
	<div class="form-group">
		<label">Deskripsi</label>
		<input type="text" class="form-control" id="deskripsi" placeholder="Deskripsi" required>
	</div>
	<div class="form-group">
		<label">Harga Beli * <small id="peringatan_harga_beli" class="text-danger pull-right">Harus angka tanpa tanda baca</small></label>
		<input type="text" class="form-control" id="harga_beli" placeholder="Harga beli" required>
	</div>
	<div class="form-group">
		<label">Harga Jual * <small id="peringatan_harga_jual" class="text-danger pull-right">Harus angka tanpa tanda baca</small></label>
		<input type="text" class="form-control" id="harga_jual" placeholder="Harga jual" required>
	</div>
	<div class="form-group">
		<label">Jumlah * <small id="peringatan_jumlah" class="text-danger pull-right">Harus angka tanpa tanda baca</small></label>
		<input type="text" class="form-control" id="jumlah" placeholder="Jumlah" required>
	</div>
</div>
<div class="modal-footer">
	<p class="text-left">* Wajib diisi</p>
	<button type="button" class="btn btn-success" onclick="simpan_produk()">Simpan</button>
	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
</div>
<script>
$(document).ready(function(){
	$("#peringatan_barcode").hide();	
	$("#peringatan_harga_beli").hide();	
	$("#peringatan_harga_jual").hide();	
	$("#peringatan_jumlah").hide();	
});
function simpan_produk()
{
	var 
	id_produk=$("#id_produk").val(), 
	nama=$("#nama").val(),
	deskripsi=$("#deskripsi").val(),
	harga_beli=$("#harga_beli").val(),
	harga_jual=$("#harga_jual").val(),
	jenis=$("#jenis").val(),
	jumlah=$("#jumlah").val();
	if(id_produk==''){$("#id_produk").focus();return false;}
	if($("#barkod").val()=='1'){$("#id_produk").focus();return false;}
	if(nama==''){$("#nama").focus();return false;}
	if(harga_beli==''){$("#harga_beli").focus();return false;}
	if(isNaN(harga_beli)){$("#harga_beli").focus();$("#peringatan_harga_beli").show('');return false;}else{$("#peringatan_harga_beli").hide();	}
	if(harga_jual==''){$("#harga_jual").focus();return false;}
	if(isNaN(harga_jual)){$("#harga_jual").focus();$("#peringatan_harga_jual").show('');return false;}else{$("#peringatan_harga_jual").hide();	}
	if(jumlah==''){$("#jumlah").focus();return false;}
	if(isNaN(jumlah)){$("#jumlah").focus();$("#peringatan_jumlah").show('');return false;}else{$("#peringatan_jumlah").hide();}
	$.ajax({
		url      : "index.php/produk/simpan_produk/",
		data     : ({id_produk:id_produk,nama:nama,harga_beli:harga_beli,jenis:jenis,deskripsi:deskripsi}),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
				$.ajax({
					url      : "index.php/produk/input_harga/",
					data     : ({id_produk:id_produk,harga_jual:harga_jual}),
					type     : 'POST',
					dataType : 'html',
					success  : function(respon){
							$.ajax({
								url      : "index.php/produk/input_harga_beli/",
								data     : ({id_produk:id_produk,harga_beli:harga_beli}),
								type     : 'POST',
								dataType : 'html',
								success  : function(respon){
										$.ajax({
											url      : "index.php/produk/input_stok/",
											data     : ({id_produk:id_produk,jumlah:jumlah}),
											type     : 'POST',
											dataType : 'html',
											success  : function(respon){
													$('#tabel_produk').html(respon);
													$('#myModal').modal('hide');
											},
										})
								},
							})
							
						},
				})

			},
	})	
}

function cekbarcode(barcode)
{
	$.ajax({
		url      : "index.php/produk/cekbarcode/",
		data     : ({barcode:barcode}),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
			if(respon=="ada"){$("#peringatan_barcode").show('');$("#barkod").val('1');return false;}
			else {$("#barkod").val('0');$("#peringatan_barcode").hide('');}
			},
	})	
}
</script>
