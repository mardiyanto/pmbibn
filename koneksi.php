<?php
error_reporting(0); 
$server = "154.41.240.103";
$username = "u678317871_pmbibn";
$password = "M4rd1best";
$database = "u678317871_pmbibn";
// Koneksi dan memilih database di server
$koneksi = mysqli_connect($server,$username,$password) or die("Koneksi gagal");
mysqli_select_db($koneksi,$database) or die("Database tidak bisa dibuka");
$kontak_kami=mysqli_query($koneksi,"SELECT * FROM profil WHERE id_profil ='1'");
$k_k=mysqli_fetch_array($kontak_kami);
?>
