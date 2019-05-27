<?php
@session_start();
$ID = @$_GET['ID'];
    require_once "View/Other/Loading.php";
    include"daftarAkunPengguna.php";
    include"modal_addAkunPengguna.php";

?>
