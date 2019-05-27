<?php
if(isset($_POST['prosesImport'])){ 
	@session_start();
	include "../../../Config/configdb.php";
	include "../../../Config/Functions.php";
	error_reporting(0);
	date_default_timezone_set('Asia/Jakarta');
	$file = fopen('../../../DatabaseImport/FininsysImportFile-'.date('d-m-Y').'.sql.gz','r+');
		if(empty($file)){
			?><div class="alert bg-pink alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>
                        <b class="font-bold col-yellow">FILE IMPORT TIDAK DITEMUKAN</b><br> 
                            File Import Tidak Ditemukan!, Mohon Letakan Terlebih Dahulu File Yang Akan Di Import!
				<script>swal("PROSES GAGAL!", "File Import Tidak Ditemukan !", "warning");</script>			
                     
            </div><?php
            logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Import Database Gagal');
        }else{

	set_time_limit(0);
	ignore_user_abort(true);

	require('MySQLImport.php');

	$time = -microtime(true);

	$import = new MySQLImport(new mysqli('localhost', 'root', '', 'fininsys_prima-insani'));

	$import->onProgress = function ($count, $percent) {
		if ($percent !== null) {
			echo (int) $percent . " %\r";
		} elseif ($count % 10 === 0) {
			echo '.';
		}
	};

	$import->load('../../../DatabaseImport/FininsysImportFile-'.date('d-m-Y').'.sql.gz');

	$time += microtime(true);
	echo "FINISHED (in $time s)";
	logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Import Database Berhasil');
	?>
	<script>
		swal({
            title: "IMPORT BERHASIL",
            text: "Database Berhasil Di Import Dalam Waktu <?= $time ?> Detik",
            type: "success",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }, function () {
            setTimeout(function () {
                refresh();
            }, 1500);
        });
	<?php
}
}