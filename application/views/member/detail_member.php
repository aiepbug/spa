<h2 class="modal-title" id="myModalLabel">Detail member </h2></div>
<div class="modal-body">
	<div class="form-group">
		<label">ID Member</label>
		<input type="text" class="form-control" id="id_member" placeholder="Nama" value="<?php echo $member[0]->id_member?>" readonly required>
	</div>
	<div class="form-group">
		<label">Nama *</label>
		<input type="text" class="form-control" id="nama" placeholder="Nama" value="<?php echo $member[0]->nama?>" readonly required>
	</div>
	<div class="form-group">
		<label">Nomor Identitas *</label>
			<div class="input-group">
			  <span class="input-group-addon">
				<select class="" id="jid" required disabled><option value="ktp">KTP</option><option value="sim">SIM</option></select>
			  </span>
			  <input type="text" class="form-control"  value="<?php echo $member[0]->nik?>" id="nik" placeholder="Nomor identitas" readonly required>
			</div><!-- /input-group -->
	</div>
	<div class="form-group">
		<label">Alamat *</label>
		<input type="text" class="form-control" id="alamat" placeholder="Alamat" value="<?php echo $member[0]->alamat?>" readonly required>
	</div>
	<div class="form-group">
		<label">HP *</label>
		<input type="text" class="form-control" id="hp" placeholder="Nomor HP" value="<?php echo $member[0]->hp?>" readonly required>
	</div>
</div>
<div class="modal-footer">
	<p class="text-left">* Wajib diisi</p>
	<button id="edit" type="button" class="btn btn-primary" onclick="edit_member()">Edit</button>
	<button id="hapus" type="button" class="btn btn-danger" onclick="hapus_member()">Hapus</button>
	<button id="simpan" type="button" class="btn btn-success" onclick="update_member()">Simpan</button>
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
					$("#jid").removeAttr('disabled')
					$("#nik").removeAttr('readonly')
					$("#alamat").removeAttr('readonly')
					$("#hp").removeAttr('readonly')
					
				})
});
function update_member()
{
	var id_member=$("#id_member").val(),nama=$("#nama").val(),jid=$("#jid").val(),nik=$("#nik").val(),alamat=$("#alamat").val(),hp=$("#hp").val();
	if(nama==''){$("#nama").focus();return false;}
	if(nik==''){$("#nik").focus();return false;}
	if(alamat==''){$("#alamat").focus();return false;}
	if(hp==''){$("#hp").focus();return false;}
	$.ajax({
		url      : "index.php/member/update_member/",
		data     : ({id_member:id_member,nama:nama,jid:jid,nik:nik,alamat:alamat,hp:hp}),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
			$('#tabel_member').html(respon);
			$('#myModal').modal('hide');
			},
	})	
}
function hapus_member()
{
	var id_member=$("#id_member").val()
	if (confirm("Yakin dihapus?") == true) 
	{
		$.ajax({
			url      : "index.php/member/hapus_member/",
			data     : ({id_member:id_member}),
			type     : 'POST',
			dataType : 'html',
			success  : function(respon){
				$('#tabel_member').html(respon);
				$('#myModal').modal('hide');
				},
		})	
	}else{return false;}
}
</script>
