<?php
include "ConfigDB.php";
date_default_timezone_set('Asia/Jakarta');
//ekspor xls
function xlsBOF() {
echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
return;
}
 
function xlsEOF() {
echo pack("ss", 0x0A, 0x00);
return;
}
 
function xlsWriteNumber($Row, $Col, $Value) {
echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
echo pack("d", $Value);
return;
}
 
function xlsWriteLabel($Row, $Col, $Value ) {
$L = strlen($Value);
echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
echo $Value;
return;
}
//IDENTIFIKASI AKHIR SESSION------------------------------------------------------------------------------------
function isLoginSessionExpired() {
  $login_session_duration = 89; 
  $current_time = time(); 
  if(isset($_SESSION['loggedin_time']) and isset($_SESSION['Administrator']) and isset($_SESSION['Kepalasekolah']) and isset($_SESSION['Bendahara'])){  
    if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
      return true; 
    } 
  }
  return false;
}
//---------------------------------------------------------------------------------------------------------------
//IDENTIFIKASI LEVEL AKUN----------------------------------------------------
function noHP($noHP){
  $noHP = $noHP;
  $noHP1 = substr($noHP,0,4);
  $noHP2 = substr($noHP,4,4);
  $noHP3 = substr($noHP,8,5);
  $handphone = $noHP1."-".$noHP2."-".$noHP3;
  return "$handphone";
}

function LevelName($level){
	if($level == '1'){
        $namalevel = 'Administrator';
     } elseif($level == '2') {
         $namalevel = 'Kepala Sekolah';
     }elseif($level == '3') {
          $namalevel = 'Bendahara';
     }elseif($level == '4') {
         $namalevel = 'Guru';
     }elseif($level == '5'){
        $namalevel = 'Siswa';
     } 
      echo "$namalevel";
    return;
}
//--------------------------------------------------------------------------
//HALAMAN AKUN PENGGUNA----------------------------------------------------
function Aktivasi($status){
	if($status == 'aktif'){
        $Aktivasi = '<p class="font-bold col-teal">Akun Sudah Aktif</p>';
     } elseif($status == 'nonaktif') {
         $Aktivasi = '<p class="font-bold col-pink">Akun NonAktif</p>';
     } 
      echo "$Aktivasi";
    return;
}
function Online($online){
	if($online == 'on'){
        $status = '<p class="font-bold col-teal">Akun Sedang Online</p>';
     } elseif($online == 'off') {
         $status = '<p class="font-bold col-pink">Akun Sedang Offline</p>';
     } 
      echo "$status";
    return;
}
//-------------------------------------------------------------------------

function usia($tanggal_lahir) {
	list($year,$month,$day) = explode("-",$tanggal_lahir);
	$year_diff  = date("Y") - $year;
	$month_diff = date("m") - $month;
	$day_diff   = date("d") - $day;
	if ($month_diff < 0) $year_diff--;
	elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
	return $year_diff;
	}

function ubahTgl($tgl)
 {
 $exp = explode('-',$tgl);
 if(count($exp) == 3)
 {
 $tgl = $exp[2].'-'.$exp[1].'-'.$exp[0];
 }
 return $tgl;
 }

function tgl_indo($tgl) {
	$tanggal = substr($tgl,8,2);
	$bulan = getBulan(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;		 
}

function semester($tglMasuk, $jmlSmst){
  date_default_timezone_set('Asia/Jakarta');
  $date = date("Y-m-d");
  $timeStart = strtotime($tglMasuk);
    $timeEnd = strtotime("$date");
    // Menambah bulan ini + semua bulan pada tahun sebelumnya
    $numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
    // menghitung selisih bulan
    $numBulan += date("m",$timeEnd)-date("m",$timeStart);
    $angkatan = date("Y",$timeStart);
    $sem = $numBulan/6;
    if($sem<=1){
      if($sem > $jmlSmst){
        $semester = "A-".$angkatan."";
      }else{
        $semester = '1';
      }
    }elseif($sem<=2){
        if($sem > $jmlSmst){
        $semester = "A-".$angkatan."";
      }else{
        $semester = '2';
      }
    }elseif($sem<=3){
        if($sem > $jmlSmst){
        $semester = "A-".$angkatan."";
      }else{
        $semester = '3';
      }
    }elseif($sem<=4){
        if($sem > $jmlSmst){
        $semester = "A-".$angkatan."";
      }else{
        $semester = '4';
      }
    }elseif($sem<=5){
        if($sem > $jmlSmst){
        $semester = "A-".$angkatan."";
      }else{
        $semester = '5';
      }
    }elseif($sem<=6){
        if($sem > $jmlSmst){
        $semester = "A-".$angkatan."";
      }else{
        $semester = '6';
      }
    }elseif($sem<=7){
        if($sem > $jmlSmst){
        $semester = "A-".$angkatan."";
      }else{
        $semester = '7';
      }
    }elseif($sem<=8){
        if($sem > $jmlSmst){
        $semester = "A-".$angkatan."";
      }else{
        $semester = '8';
      }
    }elseif($sem<=9){
        if($sem > $jmlSmst){
        $semester = "A-".$angkatan."";
      }else{
        $semester = '9';
      }
    }elseif($sem<=10){
        if($sem > $jmlSmst){
        $semester = "A-".$angkatan."";
      }else{
        $semester = '10';
      }
    }elseif($sem<=11){
        if($sem > $jmlSmst){
        $semester = "A-".$angkatan."";
      }else{
        $semester = '11';
      }
    }elseif($sem<=12){
        if($sem > $jmlSmst){
        $semester = "A-".$angkatan."";
      }else{
        $semester = '12';
      }
    }elseif($sem<=13){
        if($sem > $jmlSmst){
        $semester = "A-".$angkatan."";
      }else{
        $semester = '13';
      }
    }elseif($sem<=14){
      if($sem > $jmlSmst){
        $semester = "A-".$angkatan."";
      }else{
        $semester = '14';
      }
    }elseif($sem > $jmlSmst){
        $semester = "A-".$angkatan."";
    }
    return $semester;
}


/*function semester($tglMasuk){
	$date = date("Y-m-d");
	$timeStart = strtotime($tglMasuk);
    $timeEnd = strtotime("$date");
    // Menambah bulan ini + semua bulan pada tahun sebelumnya
    $numBulan = 1 + (date("Y-m-d",$timeEnd)-date("Y-m-d",$timeStart))*12;
    // menghitung selisih bulan
    $numBulan += date("Y-m-d",$timeEnd)-date("Y-m-d",$timeStart);
    $angkatan = date("Y",$timeStart);
    $sem = $numBulan/6;
    if($sem<=1){
        $semester = '1';
    }elseif($sem<=2){
        $semester = '2';
    }elseif($sem<=3){
        $semester = '3';
    }elseif($sem<=4){
        $semester = '4';
    }elseif($sem<=5){
        $semester = '5';
    }elseif($sem<=6){
        $semester = '6';
    }elseif($sem<=7){
        $semester = '7';
    }elseif($sem<=8){
        $semester = '8';
    }elseif($sem<=9){
        $semester = '9';
    }elseif($sem<=10){
        $semester = '10';
    }elseif($sem<=11){
        $semester = '11';
    }elseif($sem<=12){
        $semester = '12';
    }elseif($sem<=13){
        $semester = '13';
    }elseif($sem<=14){
        $semester = '14';
    }else{
        $semester = "A-".$angkatan."";
    }
    return $semester;
}*/

function grade($tglMasuk, $jmlSmst){
  date_default_timezone_set('Asia/Jakarta');
	$date = date("Y-m-d");
	$timeStart = strtotime($tglMasuk);
    $timeEnd = strtotime("$date");
    // Menambah bulan ini + semua bulan pada tahun sebelumnya
    $numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
    // menghitung selisih bulan
    $numBulan += date("m",$timeEnd)-date("m",$timeStart);
    $angkatan = date("Y",$timeStart);
    $sem = $numBulan/6;
    if($sem<=1){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '1';
      }
    }elseif($sem<=2){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '1';
      }
    }elseif($sem<=3){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '2';
      }
    }elseif($sem<=4){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '2';
      }
    }elseif($sem<=5){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '3';
      }
    }elseif($sem<=6){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '3';
      }
    }elseif($sem<=7){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '4';
      }
    }elseif($sem<=8){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '4';
      }
    }elseif($sem<=9){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '5';
      }
    }elseif($sem<=10){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '5';
      }
    }elseif($sem<=11){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '6';
      }
    }elseif($sem<=12){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '6';
      }
    }elseif($sem<=13){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '7';
      }
    }elseif($sem<=14){
      if($sem > $jmlSmst){
        $grade = "A-".$angkatan."";
      }else{
        $grade = '7';
      }
    }else{
        $grade = "A-".$angkatan."";
    }
    return $grade;
}


function angkatan($tglMasuk){
	$date = date("Y-m-d");
	$timeStart = strtotime($tglMasuk);
    $timeEnd = strtotime("$date");
    // Menambah bulan ini + semua bulan pada tahun sebelumnya
    $numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
    // menghitung selisih bulan
    $numBulan += date("m",$timeEnd)-date("m",$timeStart);
    $angkatan = date("Y",$timeStart);
    return $angkatan;
}

function getBulan($bln){
	switch ($bln){
		case 1: 
			return "Januari";
			break;
		case 2:
			return "Februari";
			break;
		case 3:
			return "Maret";
			break;
		case 4:
			return "April";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "Juni";
			break;
		case 7:
			return "Juli";
			break;
		case 8:
			return "Agustus";
			break;
		case 9:
			return "September";
			break;
		case 10:
			return "Oktober";
			break;
		case 11:
			return "November";
			break;
		case 12:
			return "Desember";
			break;
	}
}
//IDENTIFIKASI GENDER UNTUK FOTO--------------------------------------------------------------------------------------------------------------
function GenderFoto($jk){
	if($jk=='L'){
		echo "<img style='width:250px; height:250px;' class='profile-user-img img-responsive img-circle' src='assets/images/admin/admin-L.png' align='center' width='300' height='300' alt='User profile picture'>";
	}else{
		echo "<img style='width:250px; height:250px;' class='profile-user-img img-responsive img-circle' src='assets/images/admin/admin-P.png' align='center' width='300' height='300' alt='User profile picture'>";
	}
	return;
}
//-----------------------------------------------------------------------------------------------------------------------------
 
//INSERT LOOG AKTIVITAS--------------------------------------------------------------------------------------------------------
function logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, $deskirpLog){
  include"ConfigDB.php";
$insertLog = $db->query("INSERT INTO log_aktivitas( idLog, 
                                                    idUsers, 
                                                    level, 
                                                    nama_tampilan, 
                                                    tgl_aktivitas, 
                                                    jam_aktivitas, 
                                                    tgl_jam_aktivitas, 
                                                    mac_address, 
                                                    deskripsi_log )
                                            VALUES('',
                                                    '$idUsers', 
                                                    '$level', 
                                                    '$namaTmpln', 
                                                    '$tglAct', 
                                                    '$jamAct', 
                                                    '$tglJamAct', 
                                                    '$mac', 
                                                    '$deskirpLog')");
return $insertLog;
}

//-----------------------------------------------------------------------------------------------------------------------
 //IDENTIFIKASI MAC ADDRESS PERANGKAT--------------------------------------------------------------------------------------------------------------

$mac = $_SERVER['HTTP_USER_AGENT'];

function device($macadd)
 {
 $exp = explode(' ',$macadd);
 if($exp[1] == '(Windows'){
    $macadd = $exp[1].' '.$exp[2].' '.$exp[3].' '.$exp[4].' '.$exp[5];
 }else{
    $macadd = $exp[1].' '.$exp[2].' '.$exp[3].' '.$exp[4].' '.$exp[5].' '.$exp[6].' '.$exp[7];
 }
 return $macadd;
 }
//--------------------------------------------------------------------------------------------------------------------------------------------

//Menghasilkan backup DB
function backupDatabaseTables($dbhost,$dbuser,$dbpass,$dbname,$tables = '*'){
  //menghubungkan & memilih DB
    $db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
 //Mendapatkan semua Table
 if($tables == '*'){
  $tables = array();
  $result = $db->query("SHOW TABLES");
  while($row = $result->fetch_row()){
   $tables[] = $row[0];
  }
 }else{
  $tables = is_array($tables)?$tables:explode(',',$tables);
 }
 //Loop melalui Table
 foreach($tables as $table){
  $result = $db->query("SELECT * FROM $table");
  $numColumns = $result->field_count;
  #$return .= "DROP TABLE $table;";
        $result2 = $db->query("SHOW CREATE TABLE $table");
        $row2 = $result2->fetch_row();
  $return .= "\n\n".$row2[1].";\n\n";
  for($i = 0; $i < $numColumns; $i++){
   while($row = $result->fetch_row()){
    $return .= "INSERT INTO $table VALUES(";
    for($j=0; $j < $numColumns; $j++){
     $row[$j] = addslashes($row[$j]);
     $row[$j] = ereg_replace("\n","\\n",$row[$j]);
     if (isset($row[$j])) { $return .= '"'.$row[$j].'"' ; } else { $return .= '""'; }
     if ($j < ($numColumns-1)) { $return.= ','; }
    }
    $return .= ");\n";
   }
  }
  $return .= "\n\n\n";
 }
 //simpan file
 $handle = fopen('../../../BackupDatabase/FininsysBackup_'.date('d-m-Y').'.sql','w+');
 fwrite($handle,$return);
 fclose($handle);
}


?>
