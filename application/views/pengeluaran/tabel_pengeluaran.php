<div class="table-responsive">
	<table class="table table-bordered panel table-condensed">
		<tr class="bg-primary text-center"><td>No</td><td>Tanggal</td><td>Pengeluaran</td><td>Keterangan</td><td>Harga</td><td>User</td><td><span class="fa fa-gear"></span></td></tr>
					<?php
					$no=1;
					foreach($pengeluaran as $data)
					{
						echo '
						<tr>
							<td class="text-center">'.$no++.'</td>
							<td class="text-center">'.date("d/m/Y",strtotime($data->tanggal)).'</td>
							<td>'.strtoupper($data->barang).'</td>
							<td>'.strtoupper($data->keterangan).'</td>
							<td class="text-center">'.number_format($data->harga).'</td>
							<td class="text-center">'.$data->user.'</td>
							<td class="text-center"><a href="javascript:void(0)" onclick="edit_pengeluaran('.$data->seq.')">Edit</a></td>
						</tr>';
					}
					?>
	</table>
</div>
<script>
function edit_pengeluaran(seq)
{
	alert("Edit pengeluaran?")
}
</script>
