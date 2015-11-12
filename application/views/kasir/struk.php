<style>
.kanan{text-align:right;}
.tengah{text-align:center;}
.kecil{font-size:0.8em;}
.struksize{width:300px;}
</style>
<?php
echo '<div class="struksize">';
echo '<h3 class="tengah">RV BABY N KIDS SPA</h3>';
echo '<p class="kecil tengah">ALAMAT : JL. MOH. YAMIN TELP. 0451-00000 </p>';
echo '<p class="tengah">- - - - - - - - - - - - - - - - - - - - - - - - </p>';
echo '<table border="0" width="300px">';
$total=0;
$disc=0;
foreach($struk as $data)
{
	echo '	<tr>
				<td width="60%"><strong>'.$data->id_produk.'</strong><br>'.strtoupper($data->nama).'</td>
				<td class="tengah kecil" width="20%">'.number_format($data->harga_jual).'<br>disc('.$data->disc.'%)</td>
				<td class="kanan" width="20%">'.number_format($data->harga_jual-($data->harga_jual*$data->disc/100)).'</td>
			</tr>';
	$total+=$data->harga_jual-($data->harga_jual*$data->disc/100);
}
echo '	<tr><td></td><td>TOTAL</td><td class="kanan">'.number_format($total).'</td></tr>';
echo '</table>';
echo '<p class="tengah">- - - - - - - - - - - - - - - - - - - - - - - - </p>';
echo '<p class="kecil tengah">'.$this->session->userdata("transaksi_terakhir").'</p>';
echo '<p class="kanan kecil">'.date("d/m/y h:m").' - '.strtoupper($this->session->userdata("userid")).'</p>';
echo '<p class="tengah">TERIMA KASIH ATAS KUNJUNGAN ANDA</p>';
echo '</div>';
