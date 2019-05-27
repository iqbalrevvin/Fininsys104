<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Sistem Informasi Keuangan Sekolah">
    <title>License Outdate</title>
    <!-- Favicon-->
    <link href="Assets/images/logo.png" rel="icon" type="image/gif"/>
    <!-- Google Fonts -->
    <link href="Assets/css/font/Roboto-Black.ttf" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

      <!-- Bootstrap Core Css -->
    <link href="Assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="Assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="Assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="Assets/css/style.css" rel="stylesheet">
</head>

<body class="login-page" style="background-image: : url('../../Assets/images/background3.jpg') ;">
    <div class="login-box">

        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="logo">
                        <img alt="Fininsys" style="display: block; margin-left: auto; margin-right: auto;" src="Assets/images/logo.png" height="100" width="100" />
                        <a href="javascript:void(0);"><b class="font-bold col-blue-grey">FININSYS</a>
                        <div class="msg">License Validation Management</div>
                    </div> 
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="number" class="form-control"  name="password" maxlength="16" minlength="16" placeholder="Masukan 16 Digit Lisensi" required>
                        </div>
                        <h6 class="col-red">Lisensi Tidak Sesuai / Sudah Habis, Silahkan Perbarui Lisensi!</h6>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="submit" name="submitLisensi" class="btn btn-block bg-teal waves-effect" value="Perbarui">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- Jquery Core Js -->
    <script src="Assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="Assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="Assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="Assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="Assets/js/admin.js"></script>
    <script src="Assets/js/pages/examples/sign-in.js"></script>

</body>
</html>
