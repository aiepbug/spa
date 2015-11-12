<h2 class="modal-title" id="myModalLabel">Tambah member </h2></div>
<div class="modal-body">
	<div class="form-group">
		<label">Nama *</label>
		<input type="text" class="form-control" id="nama" placeholder="Nama" required>
	</div>
	<div class="form-group">
		<label">Nomor Identitas *</label>
			<div class="input-group">
			  <span class="input-group-addon">
				<select class="" id="jid" required><option value="ktp">KTP</option><option value="sim">SIM</option></select>
			  </span>
			  <input type="text" class="form-control" aria-label="..." id="nik" placeholder="Nomor identitas" required>
			</div><!-- /input-group -->
	</div>
	<div class="form-group">
		<label">Alamat *</label>
		<input type="text" class="form-control" id="alamat" placeholder="Alamat" required>
	</div>
	<div class="form-group">
		<label">HP *</label>
		<input type="text" class="form-control" id="hp" placeholder="Nomor HP" required>
	</div>
</div>
<div class="modal-footer">
	<p class="text-left">* Wajib diisi</p>
	<button type="button" class="btn btn-success" onclick="simpan_member()">Simpan</button>
	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
</div>
<script>
function simpan_member()
{
	var nama=$("#nama").val(),jid=$("#jid").val(),nik=$("#nik").val(),alamat=$("#alamat").val(),hp=$("#hp").val();
	if(nama==''){$("#nama").focus();return false;}
	if(nik==''){$("#nik").focus();return false;}
	if(alamat==''){$("#alamat").focus();return false;}
	if(hp==''){$("#hp").focus();return false;}
	$.ajax({
		url      : "index.php/member/simpan_member/",
		data     : ({nama:nama,jid:jid,nik:nik,alamat:alamat,hp:hp}),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
			$('#tabel_member').html(respon);
			$('#myModal').modal('hide');
			},
	})	
}
</script>
