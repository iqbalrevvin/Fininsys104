<?php
@session_start();
if(@$_SESSION['Bendahara'] | @$_SESSION['KepalaSekolah'] | @$_SESSION['Administrator'] ) {
    echo "<script>window.location='./';</script>";
} else {
  require_once('Config/identitasSekolah.php'); 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Sistem Informasi Keuangan Sekolah">
    <title>FININSYS</title>
    <!-- Favicon-->
    <link href='icon.png' rel='icon' type='image/png'/>
    <!-- Google Fonts -->
    <link href="<?= base_url(); ?>Assets/css/font/Roboto-Black.ttf" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

      <!-- Bootstrap Core Css -->
    <link href="<?= base_url(); ?>Assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url(); ?>Assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url(); ?>Assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url(); ?>Assets/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="card">
            <div class="body">
            <?php include "Controller/Login/Login.php"; ?>
                <form id="sign_in" method="POST">
                    <div class="logo">
                        <img alt="Fininsys" style="display: block; margin-left: auto; margin-right: auto;" src="<?= base_url(); ?>Assets/images/logo.png" height="100" width="100" />
                        <a href="javascript:void(0);"><b class="font-bold col-blue-grey">FININSYS</a>
                        <div class="msg">Sign In To Financial Information System</div>
                    </div> 
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <input type="submit" name="login" class="btn btn-block bg-teal waves-effect" 
                                    value="Masuk">
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <!--<div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>-->
                    </div>
                </form>
            </div>
        </div>
        <div class="logo">
            <small class="col-blue-grey"><?= alamatSekolah() ?><br> 
            <?= namaSekolah() ?><br>
            Fininsys © <?= date('Y'); ?> All Rights Reserved</small>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?= base_url(); ?>Assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url(); ?>Assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url(); ?>Assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= base_url(); ?>Assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?= base_url(); ?>Assets/js/admin.js"></script>
    <script src="<?= base_url(); ?>Assets/js/pages/examples/sign-in.js"></script>
</body>
</html>
<?php } ?>