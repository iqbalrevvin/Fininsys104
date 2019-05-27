<?php 
if(@$_GET['k']==''){
	logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Pengaturan Jenis Pembayaran');
	require('jenisPembayaran.php');
	//include "showJnsTransaksi.php";
}
if(@$_GET['k']=='ViewFinancialType'){
	$tahun = @$_GET['year'];
	$program = @$_GET['program'];
	?>
		<input type="hidden" id="tahun" value="<?= $tahun ?>">
        <input type="hidden" id="prodi" value="<?= $program ?>">
	<?php
	echo '<div id="showJnsTransaksi"></div>';
	//include "showJnsTransaksi.php";
}
else{
}
?>