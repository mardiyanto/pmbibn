<?php
include "koneksi.php";
// Include PHPMailer autoloader
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $token = $_POST['token'];
    $password = md5($_POST['password']); // Enkripsi password baru

    // Periksa apakah email ada di database
    $sql = "SELECT * FROM daftar WHERE email='$email'";
    $result = $koneksi->query($sql);
    $sql_update_password = "UPDATE daftar SET password='$password', token='',show_pass='$_POST[password]' WHERE email='$email' AND token='$token'";
    $koneksi->query($sql_update_password);
    if ($result->num_rows > 0) {
        // Email ditemukan, lakukan proses reset password
        // Generate token reset password
        $token = bin2hex(openssl_random_pseudo_bytes(32)); // Contoh: menghasilkan token acak

        
        // Kirim email ke pengguna dengan tautan reset password
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        // Konfigurasi SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Ganti dengan host SMTP Anda
        $mail->SMTPAuth = true;
        $mail->Username = 'mardybest@ibnus.ac.id'; // Ganti dengan email pengirim
        $mail->Password = 'buda atny ysmy msgr'; // Ganti dengan password email pengirim
        $mail->Port = 587; // Port SMTP (biasanya 587)
        $mail->SMTPSecure = 'tls'; // Jenis enkripsi (tls/ssl)

        // Siapkan email
        $mail->setFrom('mardybest@ibnus.ac.id', 'IBN LAMPUNG');
        $mail->addAddress($email);
        $mail->Subject = 'Password Baru PMB IBN LAMPUNG';
        $mail->isHTML(true);
        $mail->Body = '<h1>Terimakasih sudah Mendaftar di Kampus IBN Lampung </h1><br>
        <p>silahkan gunakan email dan password Baru untuk login di sistem kami, email= '.$_POST['email'].' password '.$_POST['password'].'</p>';


        if ($mail->send()) {
           // Simpan token di database
        

            echo "<script>window.alert('Password Baru Sudah dikirim Ke $email silahkan cek email anda'); window.location=('index.php')</script>";
        } else {
            // Jika terjadi kesalahan dalam pengiriman email
            echo "<script>window.alert('Email tidak dapat dikirim. Kesalahan $mail->ErrorInfo'); window.location=('index.php')</script>";
            echo 'Email tidak dapat dikirim. Kesalahan: ' . $mail->ErrorInfo;
        }
    } else {
        // Jika email tidak ditemukan
        echo "<script>window.alert('Email tidak ditemukan dalam database $email'); window.location=('index.php')</script>";
    }
}
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $email = $_POST['email'];
//     $token = $_POST['token'];
//     $password = md5($_POST['password']); // Enkripsi password baru

//     // Perbarui password dalam database
//     $sql_update_password = "UPDATE daftar SET password='$password', token='',show_pass='$_POST[password]' WHERE email='$email' AND token='$token'";
//     if ($koneksi->query($sql_update_password)) {
//         echo "<script>window.alert('Password berhasil direset. Silakan login dengan password baru Anda'); window.location=('index.php')</script>";
//         // Redirect ke halaman login jika diperlukan
//         // header("Location: login.php");
//     } else {
//         echo "<script>window.alert('Gagal mereset password'); window.location=('index.php')</script>";
//     }
// }
?>
