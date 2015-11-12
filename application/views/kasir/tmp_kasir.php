<tr class="bg-primary">
		<th class="text-center" width="5%">#</th>
		<th class="text-center" width="50%">Jenis/Terapis</th>
		<th class="text-center" width="15%">Harga</th>
		<th class="text-center" width="15%">Disc (%)</th>
		<th class="text-center" width="15%">Sub</th>
		<th class="text-center" width="15%"><span class="fa fa-gear"></th>
</tr>
<?php
$no=1;
$total=0;
foreach ($kasir AS $data)
{
	echo '	<tr>
			<td class="text-center">'.$no++.'</td>
			<td class="text-left">'.$data->nama;
			if($data->jenis=='jasa')
			{
				if(!empty($data->terapis))
				{
					echo ' <small class="text-muted"> ( '.$data->terapis.' )</small> <button type="button" onclick="hapus_terapis('.$data->seq.')" class="pull-right label label-danger">Remove</button>';
				}
				else
				{
					echo '<button type="button" onclick="ambil_terapis('.$data->seq.')" class="pull-right label label-info" data-toggle="modal" data-target="#myModal">Terapis</button>';
				}
			}
			echo '
			</td>
			<td class="text-right">'.number_format($data->harga_jual).'</td>
			<td class="text-center"><input type="text" id="disc" onchange="update_disc('.$data->seq.'+pemisah+this.value)" style="width:40%" class="text-center" onfocus="this.select();" maxlength="2" onmouseup="return false;" value="'.$data->disc.'"></td>
			<td class="text-right">'.number_format($data->harga_jual-($data->harga_jual*$data->disc/100)).'</td>
			<td class="text-right"><a class="btn btn-danger btn-xs" href="javascript:void(0)" onclick="hapus_tmp_kasir('.$data->seq.')"><span class="fa fa-remove"></a></td>
			</tr>
			';
		$total+=$data->harga_jual-($data->harga_jual*$data->disc/100);	
}
echo '<tr><td></td><td></td><td colspan="2" class="text-right"><h4>TOTAL</h4></td><td class="text-right"><input type="hidden" value="'.$total.'" id="total"><h4>'.number_format($total).'</h4></td><td></td></tr>';
echo '<tr><td colspan="6" class="text-right"><a class="btn btn-success" href="javascript:void(0)" onclick="bayar()">Bayar (F3)</a></td></tr>';
?>
<script>
var pemisah='?';
$(document).ready(function(){
 $("#disc").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
function hapus_tmp_kasir(seq)
{
	$.ajax({
		url      : "index.php/kasir/hapus_tmp_kasir/",
		data     : ({seq:seq}),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
			$('#tmp_kasir').html(respon);
			},
	})	

}
function ambil_terapis(seq)
{
	$.ajax({
		url      : "index.php/kasir/ambil_terapis/",
		data     : ({seq:seq}),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
			$('#isimodal').html(respon);
			},
	})	
}
function hapus_terapis(seq)
{
	$.ajax({
		url      : "index.php/kasir/hapus_terapis/",
		data     : ({seq:seq}),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
			$('#tmp_kasir').html(respon);
			},
	})	
}
function pilih_terapis(terapis)
{
	$.ajax({
		url      : "index.php/kasir/pilih_terapis/",
		data     : ({terapis:terapis}),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
			$('#tmp_kasir').html(respon);
			$('#myModal').modal('hide');
			},
	})	
}
function update_disc(param)
{
	var param=param.split('?');
	var seq=param[0];
	var disc=param[1];
	$.ajax({
		url      : "index.php/kasir/update_disc/",
		data     : ({seq:seq,disc:disc}),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
			$('#tmp_kasir').html(respon);
			},
	})	
}
function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}
function bayar()
{
	var member = $("#member").val();
	var bayar = window.prompt("Jumlah bayar", "");
	var total = $('#total').val();
	if(Number(bayar)<Number(total))
	{
		alert('Uang bayar lebih kecil dari total harga!');
		return false
	}
	else
	{
		$.ajax({
			url      : "index.php/kasir/bayar/",
			data     : ({member:member,bayar:bayar}),
			type     : 'POST',
			dataType : 'html',
			success  : function(respon){
				$('#tmp_kasir').html(respon);
				window.open('index.php/kasir/struk/','','width=310,height=600');
				},
		})
		var kembali=bayar-total;
		alert('Kembali '+numberWithCommas(kembali));
		
	}
}
</script>
