<p><h1>Admin</h1>
<a href="javascript:void(0)" onclick="tambah_pengeluaran()" class="btn btn-info text-right"  data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah</a>
</p>
<div id="tabel_admin"></div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div id="isimodal"></div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
	$.ajax({
		url      : "index.php/admin/ambil_user/",
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
				$('#tabel_admin').html(respon);
			},
	})		
});
</script>
