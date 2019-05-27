<?php function head(){ ?>
	<meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Sistem Informasi Keuangan Sekolah">
    <title>FININSYS</title>
    <!-- Favicon-->
    <link href='<?= base_url(); ?>Assets/images/logo.png' rel='icon' type='image/gif'/>
    <!-- Google Fonts -->
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">-->
    <!--<link href="assets/css/font/Roboto-Black.ttf" rel="stylesheet" type="text/css">-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="<?= base_url(); ?>Assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="<?= base_url(); ?>Assets/plugins/node-waves/waves.css" rel="stylesheet" />
     <!-- Animation Css -->
    <link href="<?= base_url(); ?>Assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?= base_url(); ?>Assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <!-- Multi Select Css -->
    <link href="<?= base_url(); ?>Assets/plugins/multi-select/css/multi-select.css" rel="stylesheet" />
     <!-- Bootstrap Select Css -->
    <link href="<?= base_url(); ?>Assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Sweet Alert Css -->
    <link href="<?= base_url(); ?>Assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Dropzone Css -->
    <link href="<?= base_url(); ?>Assets/plugins/dropzone/dropzone.css" rel="stylesheet">
    <link href="<?= base_url(); ?>Assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.colVis.css" rel="stylesheet">
    <link href="<?= base_url(); ?>Assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- ss yang digunakan tampilkan ketika dalam mode print -->
    <link  href="<?= base_url(); ?>Assets/plugins/printThis/printThis.css" rel="stylesheet" media="print" />
    <!-- Custom Css -->
    <link href="<?= base_url(); ?>Assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url(); ?>Assets/css/themes/theme-blue-grey.min.css" rel="stylesheet" />
<?php } ?>

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<?php function navbar(){ ?>
<!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <form type="POST">
            <input type="hidden" name="p" value="Search" placeholder="CARI SISWA">
            <input type="text" name="data" placeholder="CARI SISWA (tekan ENTER setelah mengetik!)">
        </form>
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="./">FININSYS V1.0.4 | SMK IKA KARTIKA <span id="deleteLoad"></span></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <!--<li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>-->
                    <li><a href="#" id="btnReload" onClick="window.location.reload()"><i class="material-icons">refresh</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <!--<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>-->
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <!-- #END# Tasks -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
<?php } ?>

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<?php function leftsidebar_user(){ ?>
	<?php include "Config/ConfigDB.php"; ?>
	<?php include "Controller/Session.php"; ?>
	<!-- User Info -->
        <div class="user-info">
            <div class="image">
                <?php 
                    if($session['foto'] == ''){
                        if ($jk->jenis_kelamin == 'L') {
                            ?><img src="Assets/images/admin/admin-L.png" width="40" height="50" alt="User" /><?php
                        }else{
                            ?><img src="Assets/images/admin/admin-P.png" width="40" height="50" alt="User" /><?php
                        }
                    }else{ ?>
                        <img src="Assets/images/admin/<?= $session['foto'] ?>" width="40" height="50" alt="User" />
                <?php } ?>
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $namaTampilan ?>
                </div>
                <div class="email"><?= $idnt ?> | <?= $namaLevel ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="?p=AdminProfile"><i class="material-icons">person</i>Profil</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="Controller/Logout/Logout.php"><i class="material-icons">power_settings_new</i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
<?php } ?>

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<?php function navigasi(){ ?>
	<div class="menu">
            <ul class="list">
                <?php include "Config/ConfigDB.php"; ?>
                <?php include "Controller/Session.php"; ?>
                <?php include "Routes/Navigasi.php"; ?>
            </ul>
        </div>
<?php } ?>

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<?php function footer(){ ?>
	<div class="legal">
            <div id="loading"></div>
            <div class="copyright">
                &copy; 2018 <a href="javascript:void(0);">FININSYS | SMK IKA KARTIKA</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.4
            </div>
        </div>
        <!-- #Footer -->
<?php } ?>

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<?php function routes(){ 
	include "Config/ConfigDB.php";
    include "Controller/Session.php";
    $idUsers    = $session['idUsers'];
	$level      = $session['level'];
	$namaTmpln  = $session['nama_tampilan'];
	$tglAct     = date("Y-m-d");
	$jamAct     = date("H:i:s");
	$tglJamAct  = date("Y-m-d H:i:s");
	$mac = $_SERVER['HTTP_USER_AGENT'];
	include "Routes/Url.php";
}
?> 

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<?php 
	function javascript(){
		include "Javascript/linkScript.php";
	} 
?>


