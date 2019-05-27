<?php  
@session_start();
include "../../Config/configDB.php";
include "../../Config/Functions.php"; 
include "../Session.php"; 
            ?><script language="javascript">alert("Sesi Waktu Anda Habis, Silahkan Login Kembali!")</script><?php 
            ?><script language="javascript">document.location.href='Controller/Logout/logout.php';</script><?php  
      if(isLoginSessionExpired()) {
      		if(@$_SESSION['Bendahara']){
      			$update_off = mysqli_query($db, "UPDATE users SET online='off' WHERE no_idnt='$_SESSION[Bendahara]'") or die ($db->error);
            ?><script language="javascript">alert("Sesi Waktu Anda Habis, Silahkan Login Kembali!")</script><?php 
            ?><script language="javascript">document.location.href='Controller/Logout/logout.php';</script><?php
            session_destroy();
      		}elseif(@$_SESSION['KepalaSekolah']){
      			$update_off = mysqli_query($db, "UPDATE users SET online='off' WHERE no_idnt='$_SESSION[KepalaSekolah]'") or die ($db->error);
            ?><script language="javascript">alert("Sesi Waktu Anda Habis, Silahkan Login Kembali!")</script><?php 
            ?><script language="javascript">document.location.href='Controller/Logout/logout.php';</script><?php
            session_destroy();
      		}elseif(@$_SESSION['Administrator']){
      			$update_off = mysqli_query($db, "UPDATE users SET online='off' WHERE no_idnt='$_SESSION[Administrator]'") or die ($db->error);
            ?><script language="javascript">alert("Sesi Waktu Anda Habis, Silahkan Login Kembali!")</script><?php 
            ?><script language="javascript">document.location.href='Controller/Logout/logout.php';</script><?php
            session_destroy();
      		}
        session_destroy();
        ?><script language="javascript">alert("Sesi Waktu Anda Habis, Silahkan Login Kembali!")</script><?php 
        ?><script language="javascript">document.location.href='Controller/Logout/logout.php';</script><?php
    }else{}
?>