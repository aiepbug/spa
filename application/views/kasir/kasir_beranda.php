<div class="pull-left"><a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span class="fa  fa-exchange"></span></a></div>
<h1> Kasir</h1>
<div class="input-group">
	Member :
	<select id="member" class="form-control">
		<option selected value="0" selected>Non Member</option>
	<?php foreach($member AS $data){echo '<option value="'.$data->id_member	.'" selected>'.$data->id_member.' - '.strtoupper($data->nama).'</option>';}?>
	</select>
</div>
<div class="input-group">
	<input type="text" class="form-control" id="barcode" placeholder="Barcode" autofocus>
	<span class="input-group-btn">
		<button class="btn btn-info" type="button"><span class="fa fa-search"></span>&nbsp</button>
	</span>
</div>
<ul id="autokomplit"></ul>
<div class="">
	<div class="table-responsive">
		<table id="tmp_kasir" class="table table-bordered panel table-condensed">
		</table>
	</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div id="isimodal"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<script>
$("#menu-toggle").click(function(e) {e.preventDefault();$("#wrapper").toggleClass("toggled");});
$(document).ready(function(){
	$.ajax({
					url      : "index.php/kasir/tmp_transaksi/",
					type     : 'POST',
					dataType : 'html',
					success  : function(respon){
							$('#tmp_kasir').html(respon);
						},
				})		
	
	
	
   $('#barcode').on('keyup paste',barang);
   $('#barcode').on('focusout',function(){$("#autokomplit").hide()});
   $('#barcode').keypress(function(e) {
	   if(e.which == 13) {
			$.ajax({
				url      : "index.php/kasir/ambilbarcode/",
				data     : ({id:$('#barcode').val(),method:'cek'}),
				type     : 'POST',
				dataType : 'html',
				success  : function(respon){
						if(respon=='Oke')
						{
							pilihbarang($('#barcode').val())
						}
						else
						{
							alert('Barcode tidak ada')
						}
					},
			})	
		}
	});
});
function barang()
{
	$("#autokomplit").show()
	var param=$("#barcode").val()
	$.ajax({
			url      : "index.php/kasir/caribarang/",
			data     : ({param:param}),
			type     : 'POST',
			dataType : 'html',
			success  : function(respon){
				$('#autokomplit').html(respon);
				},
		})	
}
function pilihbarang(id)
{
$.ajax({
		url      : "index.php/kasir/tambah_transaksi/",
		data     : ({id:id}),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
			$('#tmp_kasir').html(respon);
			$("#autokomplit").hide();
			$("#barcode").val('');
			},
	})	
}
</script>
<style>
#autokomplit
{
	font-family:"Times New Roman", Georgia, Serif;
	font-size: 2em;
    border-radius: 3px;
    min-height:400px
	position:absolute;
	background-color:white;
	list-style-type: none;
}
</style>
