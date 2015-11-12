<div class="table-responsive">
	<table class="table table-bordered panel table-condensed">
		<tr class="bg-primary text-center"><td>No</td><td>Userid</td><td>Nama</td><td>Password</td><td>Level</td><td>Aktif</td><td><span class="fa fa-gear"></span></td></tr>
					<?php
					$no=1;
					foreach($admin as $data)
					{
						echo '
						<tr>
							<td class="text-center">'.$no++.'</td>
							<td class="text-center">'.$data->userid.'</td>
							<td>'.$data->nama.'</td>
							<td>'.$data->password.'</td>
							<td class="text-center">'.$data->level.'</td>
							<td class="text-center">'.$data->aktif.'</td>
							<td class="text-center"><a href="javascript:void(0)" onclick="edit_user('.$data->id.')">Edit</a></td>
						</tr>';
					}
					?>
	</table>
</div>
<script>
function edit_user(id)
{
	alert("Edit pengeluaran?")
}
</script>
