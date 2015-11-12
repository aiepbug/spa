<small class="text-muted">Total <strong><?php echo $total?></strong> Produk</small>
<div class="table-responsive">
	<table class="table table-bordered panel table-condensed">
		<tr class="bg-primary text-center"><td>NO</td><td>Barcode</td><td>Jenis</td><td>Nama</td><td>Deskripsi</td><td>Harga Beli</td>
			<td>Harga Jual</td><td>Stok</td><td>User</td><td><span class="fa fa-gear"></span></td></tr>
					<?php
					if($offset==0){$no=1;}else{$no=$offset+1;}
					foreach($produk as $data)
					{
						$stok=$this->mproduk->ambil_stok($data->id_produk)->result();
						echo '
						<tr>
							<td class="text-center">'.$no++.'</td>
							<td class="text-center">'.$data->id_produk.'</td>
							<td class="text-center">'.strtoupper($data->jenis).'</td>
							<td>'.strtoupper($data->nama).'</td>
							<td>'.strtoupper($data->deskripsi).'</td>
							<td class="text-right">'.number_format($data->harga_beli).'</td>
							<td class="text-right">'.number_format($data->harga_jual).'</td>
							<td class="text-right">'.$stok[0]->stok.'</td>
							<td class="text-center">'.$data->user.'</td>
							<td class="text-center"><a href="javascript:void(0)" onclick="detail_produk('.$data->id_produk.')"   data-toggle="modal" data-target="#myModal">Edit</a></td>
						</tr>';
					}
					?>
	</table>
</div>
<nav>
  <ul class="pagination">
	  <?php 
	  $paging=$total/$halaman;$hal=(ceil($offset/$halaman))+1;
	  function aktif($hal,$page)
	  {
		  if($hal==$page){return "active";}
	  }
	  for($page=1;$page<=ceil($paging);$page++)
	  {
		  echo '<li class="'.aktif($hal,$page).'"><a href="javascript:void(0)" onclick="halaman('.$page.')">'.$page.'</a></li>';
	  }
	  ?>
  </ul> 
</nav>
<script>
function halaman(offset)
{
		$.ajax({
					url      : "index.php/produk/halaman/",
					data     : ({offset:offset}),
					type     : 'POST',
					dataType : 'html',
					success  : function(respon){
							$('#tabel_produk').html(respon);
						},
		})	
}
function detail_produk(id_produk)
{
		$.ajax({
					url      : "index.php/produk/detail_produk/",
					data     : ({id_produk:id_produk}),
					type     : 'POST',
					dataType : 'html',
					success  : function(respon){
							$('#isimodal').html(respon);
						},
		})	
}
</script>
