<?php
@session_start();
//include "server/configdb.php";
$profilSekolahQuery = mysqli_query($db, "SELECT * FROM sekolah") or die ($db->error);
//$sekolah = mysqli_fetch_array($profilSekolahQuery);
$sekolah = $profilSekolahQuery->fetch_array();
?>