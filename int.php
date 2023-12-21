<?php
 include 'koneksi.php';
if($_GET['aksi']=='home'){
}
elseif($_GET['m']=='daftar'){
    $password = md5($_POST['password']);
    mysqli_query($koneksi,"insert into daftar (no_daftar,program,nama,email,password) values ('$_POST[no_daftar]','$_POST[program]','$_POST[nama]','$_POST[email]','$password')");  
    echo "<script>window.alert('Kami Akan Segera Memprosesnya dalam waktu 1 x 24 jam Terimakasih Banyak..... ');
    window.location=('index.php')</script>";
}
?>