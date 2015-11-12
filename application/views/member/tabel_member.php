<small class="text-muted">Total <strong><?php echo $total?></strong> Member</small>
<div class="table-responsive">
	<table class="table table-bordered panel table-condensed">
		<tr class="bg-primary text-center"><td>NO</td><td>ID</td><td>Nama</td><td>No Identitas</td><td>Alamat</td><td>HP</td>
			<td>Tgl Daftar</td><td>User</td><td><span class="fa fa-gear"></span></td></tr>
					<?php
					if($offset==0){$no=1;}else{$no=$offset+1;}
					foreach($member as $data)
					{
						echo '
						<tr>
							<td class="text-center">'.$no++.'</td>
							<td class="text-center"><a href="javascript:void(0)" onclick="detail_member('.$data->id_member.')"   data-toggle="modal" data-target="#myModal">'.$data->id_member.'</a></td>
							<td>'.strtoupper($data->nama).'</td>
							<td class="text-center">('.strtoupper($data->jenis_nik).') '.$data->nik.'</td>
							<td>'.strtoupper($data->alamat).'</td>
							<td class="text-center">'.$data->hp.'</td>
							<td class="text-center">'.date('d/m/Y',strtotime($data->tgl_daftar)).'</td>
							<td class="text-center">'.$data->user.'</td>
							<td class="text-center"><span style="color:red" class="fa fa-signal"></span></td>
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
					url      : "index.php/member/halaman/",
					data     : ({offset:offset}),
					type     : 'POST',
					dataType : 'html',
					success  : function(respon){
							$('#tabel_member').html(respon);
						},
		})	
}
</script>
