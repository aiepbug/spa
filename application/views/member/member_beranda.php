<div class="pull-left"><a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span class="fa  fa-exchange"></span></a></div>
<p><h1>Member</h1>
<a href="javascript:void(0)" onclick="tambah_member()" class="btn btn-info text-right"  data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah</a>
<button class="pull-right" onclick="cari_member('reset')"><span class="fa fa-refresh"></span> <small>Reset</small></button>
<input class="pull-right " id="cari" type="text" placeholder="Cari" onchange="cari_member(this.value)">
</p>
<div id="tabel_member"></div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div id="isimodal"></div>
    </div>
  </div>
</div>
<script>
$("#menu-toggle").click(function(e) {e.preventDefault();$("#wrapper").toggleClass("toggled");});
$(document).ready(function(){
				$.ajax({
					url      : "index.php/member/ambil_member/",
					type     : 'POST',
					dataType : 'html',
					success  : function(respon){
							$('#tabel_member').html(respon);
						},
				})		
});
function detail_member(id_member)
{
	$.ajax({
					url      : "index.php/member/detail_member/",
					data     : ({id_member:id_member}),
					type     : 'POST',
					dataType : 'html',
					success  : function(respon){
							$('#isimodal').html(respon);
						},
				})	
}
function tambah_member()
{
				$.ajax({
					url      : "index.php/member/tambah_member/",
					type     : 'POST',
					dataType : 'html',
					success  : function(respon){
							$('#isimodal').html(respon);
						},
				})	
}
function cari_member(param)
{
	if(param=='reset'){$("#cari").val('');param='';}
				$.ajax({
					url      : "index.php/member/cari_member/",
					data     : ({param:param}),
					type     : 'POST',
					dataType : 'html',
					success  : function(respon){
							$('#tabel_member').html(respon);
						},
				})	
}
</script>
