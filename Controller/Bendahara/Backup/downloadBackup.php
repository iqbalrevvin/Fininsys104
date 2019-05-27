<?php 
	@session_start();
	include "../../../Config/configdb.php";
	include "../../../Config/Functions.php";
	include "../../session.php";
	if(isset($_POST['downloadBackup'])){ 
		//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------
		error_reporting(0);
        date_default_timezone_set('Asia/Jakarta');
		$file = fopen('../../../DatabaseBackup/Fininsys-Database-Backup_'.date('d-m-Y').'.sql.gz','r+');
		if(empty($file)){
			?><div class="alert bg-pink alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <b class="font-bold col-yellow">FILE BACKUP TIDAK DITEMUKAN</b><br> 
                            File Backup Tidak Ditemukan!, Lakukan Backup Database Terlebih Dahulu Untuk Hari Ini Lalu Klik Kembali Tombol
                            <span class="font-bold col-black">"UNDUH HASIL BACKUP"</span>
							
                    </p> 
            </div><?php
            logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Download Backup Database Gagal');
		}else{
			?><div class="alert bg-teal alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <b class="font-bold col-yellow">FILE BACKUP DITEMUKAN</b><br> 
                            File Backup Ditemukan!, Silahkan Klik Tombol "Unduh File" Berikut!
                            <a href="DatabaseBackup/Fininsys-Database-Backup_<?= date('d-m-Y') ?>.sql.gz"> 
                            	<button class="btn bg-indigo btn-xs waves-effect">Unduh file</button><br>
                            </a>
                            <span class="font-11">Simpan File Backup di komputer lain dengan aman, lebih baik lagi jika disimpan di Cloud Storage seperti Google Drive, Dropbox, Dsb.</span>
                    </p> 
            </div><?php
            logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Download File Backup');
		}

		
	 }
?>