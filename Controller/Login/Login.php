<?php
include "Config/ConfigDB.php";
    if(@$_POST['login']) {
    $user = @mysqli_real_escape_string($db, $_POST['username']);
    $pass = @mysqli_real_escape_string($db, $_POST['password']);
    $sql = mysqli_query($db, "SELECT *
                            FROM users WHERE username = '$user' 
                            AND password = md5('$pass') ") or die ($db->error);
    $data = mysqli_fetch_array($sql);
    if($sql->num_rows > 0) {
        if($data['status'] == 'aktif') {
            if($data['level'] == '3')
            {
                if($data['online'] == 'on'){
                     echo"<script>alert('Akun Anda Sedang Login di Browser/Perangkat Lain, Hubungi Administrator Untuk Dapat Merubah Status Login Anda !');</script>";
                }else{
                    @$_SESSION['Bendahara'] = $data['no_idnt'];
                    @$_SESSION['loggedin_time'] = time();
                }
            }elseif($data['level'] == '2'){
                @$_SESSION['KepalaSekolah'] = $data['no_idnt'];
                @$_SESSION['loggedin_time'] = time();
            }elseif($data['level'] == '1'){
                @$_SESSION['Administrator'] = $data['no_idnt'];
            }else{
                echo"<script>alert('Anda Tidak Memiliki Izin Untuk Mengakses Sistem Ini!');</script>";
            }
            $update_on = mysqli_query($db, "UPDATE users SET online ='on' WHERE username = '$user'");
            ?><div class="alert bg-teal">
                <b>Login Berhasil, Mohon Tunggu</b> 
                <img src='Assets/images/loading.gif' align="middle" width='200' height='25'> 
            </div><?php
            ?><script>window.location='./';</script><?php
            } 
        elseif($data['status'] == 'nonaktif')  {
            echo '<div class="alert alert-warning">Login gagal, akun anda sedang tidak aktif, Hubungi Administrator untuk mengaktifkan akun</div>';
        }
    }else{
        echo '<div class="alert alert-danger">Login gagal, username / password salah, Coba lagi !!</div>';
    }

}
?>