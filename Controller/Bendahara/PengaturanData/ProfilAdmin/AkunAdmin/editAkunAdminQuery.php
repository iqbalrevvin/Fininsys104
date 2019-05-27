<?php
@session_start();
include "../../../../../Config/ConfigDB.php";
include "../../../../../Config/Functions.php";
include "../../../../Session.php";

//lOG Aktivitas ---------------
$idUsers    = $session['idUsers'];
$level      = $session['level'];
$namaTmpln  = $session['nama_tampilan'];
$tglAct     = date("Y-m-d");
$jamAct     = date("H:i:s");
$tglJamAct  = date("Y-m-d H:i:s");
//------------------------------------------

//EDIT NAMA TAMPILAN ADMIN	
if(isset($_POST['editNTAdmin'])){
    $idUser                        =$_POST['idUser'];
    $editNamaTmplnAdmin            =$_POST['editNamaTmplnAdmin'];
            
    $updateNamaTampilan = mysqli_query($db, "UPDATE users SET nama_tampilan = '$editNamaTmplnAdmin' 
                                                     WHERE no_idnt='$idUser' ") or die ($db->error);

    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit Nama Tampilan');
////////////////////////////////////
//EDIT USERNAME ADMIN
}elseif(isset($_POST['editUNAdmin'])){
    $idUser                         =$_POST['idUser'];
    $editUserNameAdmin              =$_POST['editUserNameAdmin'];
    //CEK APAKAH USERNAME SUDAH ADA YANG MENGGUNAKAN
    $cekUsername = mysqli_query($db, "SELECT * FROM users WHERE username = '$editUserNameAdmin'") or die ($db->error);
    if(mysqli_num_rows($cekUsername) > 0){
            ?>
            <script>
                swal("Username Tidak Tersedia !", "Username Sudah Ada Yang Menggunakan, Gunakan Username Lain!", "warning");
            </script>
            <?php 
    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Gagal Edit Username Dikarenakan Username Sudah Ada Yang Menggunakan');
    }else{        
    $updateNamaTampilan     = mysqli_query($db, "UPDATE users SET 
                                        username = '$editUserNameAdmin' WHERE no_idnt='$idUser' ") or die ($db->error);
            $update_off = mysqli_query($db, "UPDATE users SET online='off' WHERE no_idnt='$idUser'");
            if($idUser == $session['no_idnt']){
                echo"<script language='javascript'>alert('Username Berhasil Di Perbarui, Silahkan Login Kembali!')</script>";
                session_destroy();
                echo"<script language='javascript'>document.location.href='./';</script>";
            }else{
                echo"<script language='javascript'>alert('Username Pengguna Berhasil Diperbarui!')</script>";
            }
        logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit Username');
    }
////////////////////////////////////////////
//EDIT PASSWORD ADMIN
}elseif(isset($_POST['editPassAdmin'])){
            $idUser                     =$_POST['idUser'];
            $editPassBaruAdmin         =$_POST['editPassBaruAdmin'];
    

    $updateNamaTampilan     = mysqli_query($db, "UPDATE users SET 
                                        password = md5('$editPassBaruAdmin'), pass='$editPassBaruAdmin' WHERE no_idnt='$idUser' ") or die ($db->error);
            $update_off = mysqli_query($db, "UPDATE users SET online='off' WHERE no_idnt='$idUser'");
            if($idUser == $session['no_idnt']){
                echo"<script language='javascript'>alert('Password Berhasil Di Perbarui, Silahkan Login Kembali!')</script>";
                session_destroy();
                echo"<script language='javascript'>document.location.href='./';</script>";
            }else{
                echo"<script language='javascript'>alert('Password Pengguna Berhasil Diperbarui!')</script>";
            }
            logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit Password');
//////////////////////////////////////////////////////////
//EDIT NIK ADMIN
}elseif(isset($_POST['editNIKAdmin'])){
            $idUser                     =$_POST['idUser'];
            $editIdntAdmin              =$_POST['editIdntAdmin'];

    $cekNIK = mysqli_query($db, "SELECT * FROM users WHERE no_idnt='$editIdntAdmin'") or die ($db->error);
        if(mysqli_num_rows($cekNIK) > 0){
            echo"<script language='javascript'>alert('No. Identitas Sudah Ada Yang Menggunakan.')</script>";
        }else{
            $updateIdntUser         = mysqli_query($db, "UPDATE users SET no_idnt = '$editIdntAdmin' WHERE no_idnt='$idUser' ") or die ($db->error);
            $updateIdntAdmin        = mysqli_query($db, "UPDATE admin SET no_idnt = '$editIdntAdmin' WHERE no_idnt='$idUser' ") or die ($db->error);
            $update_off = mysqli_query($db, "UPDATE users SET online='off' WHERE no_idnt='$editIdntAdmin'");
            if($idUser == $session['no_idnt']){
                echo"<script language='javascript'>alert('No, Identitas Berhasil Di Perbarui, Silahkan Login Kembali!')</script>";
                session_destroy();
                echo"<script language='javascript'>document.location.href='./';</script>";
            }else{
                echo"<script language='javascript'>alert('Password Pengguna Berhasil Diperbarui!')</script>";
            }
        }
        logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit No. Identitas');
}
?>