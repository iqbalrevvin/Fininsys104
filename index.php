<?php
@session_start();
#include "server/useragent.php";
    #if($mobileversion){ 
   //jika menggunakan browser versi mobile maka alihkan ke file web versi mobile anda 
    #header("location:./mobile");
    #}else{

//jika tidak versi mobile maka pakai versi standar 
include "Config/ConfigDB.php";
include "Config/Functions.php";
include "Config/FunctionMasterPage.php";

date_default_timezone_set('Asia/Jakarta');
$today = gmdate(date("Y-m-d"));

if(!@$_SESSION['Administrator'] AND !@$_SESSION['KepalaSekolah'] AND !@$_SESSION['Bendahara']){
        include "View/Login/Login.php";
    }else{
        include "Controller/Session.php";
if($session['online'] == 'off'){
        session_destroy();
        header("location:./");
    }
//-----------------------------//alihkan user ke halaman logout
//lOG Aktivitas ---------------
$idUsers    = $session['idUsers'];
$level      = $session['level'];
$namaTmpln  = $session['nama_tampilan'];
$tglAct     = date("Y-m-d");
$jamAct     = date("H:i:s");
$tglJamAct  = date("Y-m-d H:i:s");

?>
 
<!DOCTYPE html>
<html>
<head>
    <?php head(); ?>
</head>

<body class="theme-blue-grey" background="Assets/images/sativa.png">
    <?php navbar(); ?>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <?php leftsidebar_user(); ?>
        <!-- Menu NAVIGASI-->
        <?php navigasi(); ?>
        <!-- #Menu -->
        <?php footer(); ?>
    </aside>
    <!-- #END# Left Sidebar -->
    <section class="content">
        <div id="warningLogout"></div>
        <div id="iddle"></div>
        <?php routes(); ?>
    </section>
    <?php javascript(); ?>
</body>

</html>
<?php 
    }
#}
?>
