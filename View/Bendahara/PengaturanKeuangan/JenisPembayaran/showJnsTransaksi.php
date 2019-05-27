<?php
	if(isset($_POST['tampilJenisTransaksi'])){
		$tahun          = $_POST['tahun'];
        $prodi          = $_POST['prodi'];
		require('../../../../Controller/Bendahara/PengaturanKeuangan/DaftarJenisTransaksi/daftarJnsTransaksiQuery.php');
		require('tabelDaftarJnsTransaksi.php');
		require('modal_addJnsTransaksi.php');
		require('modal_filterJenisTransaksi.php');
	}
?>