    
<?php 
if(@$_GET['k']==''){
	require('tabelDaftarTransaksi.php');
}elseif(@$_GET['k'] == 'importListTransaction'){
	require('ImportTransaksi/importTransaksi.php');
}
?>
