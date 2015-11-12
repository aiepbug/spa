<h2 class="modal-title" id="myModalLabel"><?php echo $produk[0]->nama?> </h2></div>
<div class="modal-body">


<ul class="nav nav-tabs" role="tablist">
      <li class="active">
          <a href="#home" role="tab" data-toggle="tab">
              <icon class="fa fa-home"></icon> Keterangan
          </a>
      </li>
      <li><a href="#harga" role="tab" data-toggle="tab">
          <i class="fa fa-user"></i> Harga - Stok
          </a>
      </li>
		<li id="status" class="pull-right text-success">
		
		</li>
    </ul>
    
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane fade active in" id="home">
		  <h2>Keterangan</h2>
        	<div class="form-group">
				<label">ID Produk *</label>
				<input type="text" class="form-control" id="id_produk" placeholder="ID" value="<?php echo $produk[0]->id_produk?>" readonly required>
			</div>
			<div class="form-group">
				<label">Nama *</label>
				<input type="text" class="form-control" id="nama" placeholder="Nama produk" value="<?php echo $produk[0]->nama?>" readonly required>
			</div>
			<div class="form-group">
				<label">Deskripsi</label>
				<input type="text" class="form-control" id="deskripsi" placeholder="Deskripsi" value="<?php echo $produk[0]->deskripsi?>" readonly required>
			</div>
			<div class="form-group">
				<label">Jenis *</label>
				<select id="jenis" disabled class="form-control"><?php foreach($jenis as $row){echo '<option '; if($produk[0]->jenis==$row->jenis){echo ' selected ';}  echo 'value="'.$row->jenis.'">'.strtoupper($row->jenis).'</option>';}?></select>
			</div>	
      </div>
      <div class="tab-pane fade" id="harga">
		  <h2>Harga - Stok</h2>
		  <div class="row">
			<div class="col-md-5">
			  <div class="form-group">
					<label">Harga beli sekarang *</label>
					<input type="text" class="form-control" id="harga_beli" placeholder="Harga beli" value="<?php echo $produk[0]->harga_beli?>" readonly required>
				</div>
				<div class="form-group">
					<label">Harga jual sekarang *</label>
					<input type="text" class="form-control" id="harga_jual" placeholder="Harga beli" value="<?php echo $produk[0]->harga_jual?>" readonly required>
				</div>
				<div class="form-group">
					<label">Stok sekarang</label>
					<input type="text" class="form-control" id="stok" placeholder="Stok" value="<?php echo $stok[0]->stok?>" readonly required>
				</div>
				</div>
			<div class="col-md-5">
			  <div class="form-group">
					<label">Harga beli baru *</label>
					<input type="text" class="form-control" id="harga_beli_baru" placeholder="Harga beli" value="0" readonly>
				</div>
				<div class="form-group">
					<label">Harga jual baru *</label>
					<input type="text" class="form-control" id="harga_jual_baru" placeholder="Harga beli" value="0" readonly>
				</div>
				<div class="form-group">
					<label">Tambah stok *</label>
					<input type="text" class="form-control" id="stok_baru" placeholder="Stok" value="0" readonly>
				</div>
				</div>
			<div class="col-md-2">
			  <div class="form-group">
					<label"> &nbsp;</label>
					<a id="tblupdate1" href="javascript:void(0)" onclick="harga_beli_baru()" class="btn btn-success" disabled>Update</a>
				</div>
				<div class="form-group">
					<label"> &nbsp;</label>
					<a id="tblupdate2" href="javascript:void(0)" onclick="harga_jual_baru()" class="btn btn-success" disabled>Update</a>
				</div>
				<div class="form-group">
					<label"> &nbsp;</label>
					<a id="tblupdate3" href="javascript:void(0)" onclick="stok_baru()" class="btn btn-success" disabled>Update</a>
				</div>
				</div>
			</div>
      </div>

    </div>


</div>
<div class="modal-footer">
	<p class="text-left">* Wajib diisi</p>
	<button id="edit" type="button" class="btn btn-primary" onclick="edit_produk()">Edit</button>
	<button id="hapus" type="button" class="btn btn-danger" onclick="hapus_produk()">Hapus</button>
	<button id="simpan" type="button" class="btn btn-success" onclick="update_produk()">Simpan</button>
	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
</div>
<style>
#simpan,#hapus{display:none}
</style>
<script>
$(document).ready(function(){
	
	$("#edit").click(function()
				{
					$("#simpan").show()
					$("#hapus").show()
					$("#edit").hide()
					$("#nama").removeAttr('readonly')
					$("#jenis").removeAttr('disabled')
					$("#tblupdate1").removeAttr('disabled')
					$("#tblupdate2").removeAttr('disabled')
					$("#tblupdate3").removeAttr('disabled')
					$("#deskripsi").removeAttr('readonly')
					$("#harga_beli_baru").removeAttr('readonly')
					$("#harga_jual_baru").removeAttr('readonly')
					$("#stok_baru").removeAttr('readonly')
					
				})
});
function update_produk()
{
	var id_produk=$("#id_produk").val(),nama=$("#nama").val(),deskripsi=$("#deskripsi").val(),jenis=$("#jenis").val();
	if(nama==''){$("#nama").focus();return false;}
	$.ajax({
		url      : "index.php/produk/update_produk/",
		data     : ({id_produk:id_produk,nama:nama,deskripsi:deskripsi,jenis:jenis}),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
			$('#tabel_produk').html(respon);
			$('#myModal').modal('hide');
			},
	})	
}
function hapus_produk()
{
	var id_produk=$("#id_produk").val()
	if (confirm("Yakin dihapus?") == true) 
	{
		$.ajax({
			url      : "index.php/produk/hapus_produk/",
			data     : ({id_produk:id_produk}),
			type     : 'POST',
			dataType : 'html',
			success  : function(respon){
				$('#tabel_produk').html(respon);
				$('#myModal').modal('hide');
				},
		})	
	}else{return false;}
}
function harga_beli_baru()
{	
		var id_produk="<?php echo $produk[0]->id_produk?>";
		var harga_beli_baru=$("#harga_beli_baru").val();
		$.ajax({
			url      : "index.php/produk/harga_beli_baru/",
			data     : ({id_produk:id_produk,harga_beli_baru:harga_beli_baru}),
			type     : 'POST',
			dataType : 'html',
			success  : function(respon){
				$('#harga_beli').val(respon);
				$('#harga_beli_baru').val('0');
				$.ajax({
						url      : "index.php/produk/index/",
						type     : 'POST',
						dataType : 'html',
						success  : function(respon){
							$('#tabel_produk').html(respon);
							$('#myModal').modal('hide');
							},
					})	
				},
		})	
}
function harga_jual_baru()
{	
		var id_produk="<?php echo $produk[0]->id_produk?>";
		var harga_jual_baru=$("#harga_jual_baru").val();
		$.ajax({
			url      : "index.php/produk/harga_jual_baru/",
			data     : ({id_produk:id_produk,harga_jual_baru:harga_jual_baru}),
			type     : 'POST',
			dataType : 'html',
			success  : function(respon){
				$('#harga_jual').val(respon);
				$('#harga_jual_baru').val('0');
				$.ajax({
						url      : "index.php/produk/index/",
						type     : 'POST',
						dataType : 'html',
						success  : function(respon){
							$('#tabel_produk').html(respon);
							$('#myModal').modal('hide');
							},
					})	
				},
		})	
}
function stok_baru()
{	
		var id_produk="<?php echo $produk[0]->id_produk?>";
		var stok_baru=$("#stok_baru").val();
		$.ajax({
			url      : "index.php/produk/stok_baru/",
			data     : ({id_produk:id_produk,stok_baru:stok_baru}),
			type     : 'POST',
			dataType : 'html',
			success  : function(respon){
				$('#stok').val(respon);
				$('#stok_baru').val('0');
				$.ajax({
						url      : "index.php/produk/index/",
						type     : 'POST',
						dataType : 'html',
						success  : function(respon){
							$('#tabel_produk').html(respon);
							$('#myModal').modal('hide');
							},
					})	
				},
		})	
}
</script>
