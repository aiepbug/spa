<p><h1>Produk</h1>
<a href="javascript:void(0)" onclick="tambah_produk()" class="btn btn-info text-right"  data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah</a>
<button class="pull-right" onclick="cari_produk('reset')"><span class="fa fa-refresh"></span> <small>Reset</small></button>
<input class="pull-right" id="cari" type="text" placeholder="Cari" onchange="cari_produk(this.value)">

</p>

<div id="tabel_produk"></div>
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
		url      : "index.php/produk/ambil_produk/",
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
				$('#tabel_produk').html(respon);
			},
	})		
});
function tambah_produk()
{
	$.ajax({
		url      : "index.php/produk/tambah_produk/",
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
				$('#isimodal').html(respon);
			},
	})
}
function cari_produk(param)
{
	if(param=='reset'){$("#cari").val('');param='';}
	$.ajax({
		url      : "index.php/produk/cari_produk/",
		data     : ({param:param}),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
				$('#tabel_produk').html(respon);
			},
	})	
}

</script>
