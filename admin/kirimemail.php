<?php
// Include file koneksi.php
include "../koneksi.php";
   
// Include PHPMailer autoloader
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Periksa apakah email ada di database
    $sql = "SELECT * FROM daftar WHERE email='$email'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        // Email ditemukan, lakukan proses reset password
        // Generate token reset password
        $token = bin2hex(openssl_random_pseudo_bytes(32)); // Contoh: menghasilkan token acak

        // Simpan token di database
        $sql_update_token = "UPDATE daftar SET token='$token' WHERE email='$email'";
        $koneksi->query($sql_update_token);

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
        $mail->Subject = 'Reset Password';
        $mail->isHTML(true);
        $mail->Body = 'Silakan klik tautan berikut untuk mereset password: <a href="' . $url . 'reset_password.php?email=' . $email . '&token=' . $token . '">Reset Password</a>';


        if ($mail->send()) {
            // Jika email terkirim, arahkan ke halaman konfirmasi
            echo "<script>window.alert('link Reset Sudah dikirim Ke $email silahkan cek email anda'); window.location=('index.php')</script>";
        } else {
            // Jika terjadi kesalahan dalam pengiriman email
            echo "<script>window.alert('Email tidak dapat dikirim. Kesalahan $mail->ErrorInfo'); window.location=('index.php')</script>";

        }
    } else {
        // Jika email tidak ditemukan
        echo "<script>window.alert('Email tidak ditemukan dalam database $email'); window.location=('index.php')</script>";
    }
}   
?>
