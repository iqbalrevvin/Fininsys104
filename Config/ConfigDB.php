<?php
//$base_url = "fininsys104.smkikakartika.sch.id/";
$dbhost = 'smkikakartika.sch.id'; 
$dbuser = 'smkikaka';     // ini berlaku di xampp
$dbpass = 'Iqz220195';         // ini berlaku di xampp
$dbname = 'smkikaka_fininsys104';

$db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
// cek koneksi yang kita lakukan berhasil atau tidak
if ($db->connect_error) {
   // jika terjadi error, matikan proses dengan die() atau exit();
	require('View/Other/error-databaselokal.html');
   die($connect->connect_error);
}

if (!function_exists('base_url')) {
    function base_url($atRoot=FALSE, $atCore=FALSE, $parse=FALSE){
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];
            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf( $tmplt, $http, $hostname, $end );
        }
        else $base_url = 'http://localhost/';
        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }
        return $base_url;
    }
}
$base_url = "fininsys104.smkikakartika.sch.id/";
?>
