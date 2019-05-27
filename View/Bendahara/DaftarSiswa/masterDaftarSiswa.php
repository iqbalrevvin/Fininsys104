
<?php
@session_start();
$ID = @$_GET['ID'];
if(@$_GET['k'] == '') {
    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Daftar Siswa');
    include "View/Other/Loading.php";
    include"Controller/Bendahara/DaftarSiswa/daftarSiswaQuery.php";
    include"tabelDaftarSiswa2.php";
    include"Controller/Other/daftarJurusanQuery.php";
    include"AddSiswa/modalAddSiswa.php";
}elseif($_GET['k'] == 'Profile'){
    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Profil Siswa');
    include "View/Other/Loading.php";
    include "Controller/Bendahara/DaftarSiswa/ProfilSiswa/profilSiswaQuery.php";
    $profil = mysqli_fetch_array($profilSiswaQuery); 
    $date = date("Y-m-d");
    //Identifikasi Semester, Tingkat, dan Angkatan Menggunakan fungsi yang suda di buat
    $semester   = semester($profil['tgl_masuk'], $profil['jumlah_semester']);
    $grade      = grade($profil['tgl_masuk'], $profil['jumlah_semester']);
    $angkatan   = angkatan($profil['tgl_masuk']);
    
    //Akhir Hitung Semester & Tahun
    $ID = @$_GET['ID'];
    $scure = @$_GET['Scure'];
    $check=md5(md5($ID).md5('qwerty12345'));
    if($scure==$check){     
    include "ProfilSiswa/profilSiswa.php";
    }else{
        include "view/Other/404.html";
    }
}elseif ($_GET['k'] == 'StatusPrint') {
    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Print Status Pembayaran Siswa');
    include "View/Other/Loading.php";
    include "Controller/Bendahara/PengaturanData/DataSekolah/profilSekolahQuery.php";
    include "Controller/Bendahara/DaftarSiswa/ProfilSiswa/profilSiswaQuery.php";
    $profil = mysqli_fetch_array($profilSiswaQuery); 
    $date = date("Y-m-d");
    //Identifikasi Semester, Tingkat, dan Angkatan Menggunakan fungsi yang suda di buat
    $semester   = semester($profil['tgl_masuk'], $profil['jumlah_semester']);
    $grade      = grade($profil['tgl_masuk'], $profil['jumlah_semester']);
    $angkatan   = angkatan($profil['tgl_masuk']);
    
    //Identifikasi Grade

    //Akhir Hitung Semester & Tahun
    $ID = @$_GET['ID'];
    $scure = @$_GET['Scure'];
    $check=md5(md5($ID).md5('qwerty12345'));
    if($scure==$check){     
    include"CetakStatus/cetakStatusSiswa.php";
    }else{
        include "view/Other/404.html";
    }
}elseif ($_GET['k'] == 'HistoryPrint') {
    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Print Riwayat Transaksi');
    include "View/Other/Loading.php";
    include "Controller/Bendahara/PengaturanData/DataSekolah/profilSekolahQuery.php";
    include "Controller/Bendahara/DaftarSiswa/ProfilSiswa/profilSiswaQuery.php";
    $profil = $profilSiswaQuery->fetch_array();
    $date = date("Y-m-d");
    //Identifikasi Semester, Tingkat, dan Angkatan Menggunakan fungsi yang suda di buat
    $semester   = semester($profil['tgl_masuk'], $profil['jumlah_semester']);
    $grade      = grade($profil['tgl_masuk'], $profil['jumlah_semester']);
    $angkatan   = angkatan($profil['tgl_masuk']);
    
    //Identifikasi Grade

    //Akhir Hitung Semester & Tahun
    $ID = @$_GET['ID'];
    $scure = @$_GET['Scure'];
    $check=md5(md5($ID).md5('qwerty12345'));
    if($scure==$check){     
    include"CetakStatus/cetakRiwayatTransaksi.php";
    }else{
        include "view/Other/404.html";
    }
}elseif($_GET['k'] == 'DebtPrint'){
    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Print Rekapitulasi Tunggakan');
    include "View/Other/Loading.php";
    include "Controller/Bendahara/PengaturanData/DataSekolah/profilSekolahQuery.php";
    include "Controller/Bendahara/DaftarSiswa/ProfilSiswa/profilSiswaQuery.php";
    $profil = $profilSiswaQuery->fetch_array();
    $date = date("Y-m-d");
    //Identifikasi Semester, Tingkat, dan Angkatan Menggunakan fungsi yang suda di buat
    $semester   = semester($profil['tgl_masuk'], $profil['jumlah_semester']);
    $grade      = grade($profil['tgl_masuk'], $profil['jumlah_semester']);
    $angkatan   = angkatan($profil['tgl_masuk']);
    
    //Identifikasi Grade

    //Akhir Hitung Semester & Tahun
    $ID = @$_GET['ID'];
    $scure = @$_GET['Scure'];
    $check=md5(md5($ID).md5('qwerty12345'));
    if($scure==$check){     
    include"CetakStatus/cetakRekapTunggakan.php";
    }else{
        include "view/Other/404.html";
    }
}elseif($_GET['k'] == 'StudentImport'){
    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Import Siswa');
    include "View/Other/Loading.php";
    include"ImportSiswa/importSiswa2.php";
}elseif($_GET['k'] == 'ClassManagement'){
    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Manajemen Kelas');
    require_once('View/Other/building.html');
}else{
    include "view/Other/404.html";
}

?>
