<?php
 include 'koneksi.php';
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
if($_GET['m']=='home'){
}
elseif ($_GET['m'] == 'daftar') {
    $sesi = bin2hex(openssl_random_pseudo_bytes(32));
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    $mail = new PHPMailer(true);
    try {
        // Konfigurasi SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mardybest@ibnus.ac.id'; // Ganti dengan alamat email Anda
        $mail->Password = 'buda atny ysmy msgr'; // Ganti dengan password email Anda
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Set pengirim dan penerima
        $mail->setFrom('mardybest@ibnus.ac.id', 'IBN Lampung dr'); // Ganti dengan alamat email Anda dan nama Anda
        $mail->addAddress($_POST['email'], $_POST['nama']); // Alamat email penerima

        // Konten email
        $mail->isHTML(true);
        $mail->Subject = 'Konfirmasi Pendaftaran';
        $mail->Body = '<h1>Terimakasih sudah Mendaftar di Kampus IBN Lampung '.$_POST['nama'].'</h1><br>
        <p>silahkan gunakan email dan password untuk login di sistem kami, email= '.$_POST['email'].' password '.$_POST['password'].'</p>
       ';
        // Kirim email
        $mail->send();
        // Setelah email terkirim, lanjutkan dengan kueri MySQL
        $password = md5($_POST['password']);
       
        // Gunakan prepared statement atau sanitasi input untuk mencegah SQL Injection
        $no_daftar = mysqli_real_escape_string($koneksi, $_POST['no_daftar']);
        $program = mysqli_real_escape_string($koneksi, $_POST['program']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $query = "INSERT INTO daftar (no_daftar, program, nama, email, id_sesi, password) VALUES ('$no_daftar', '$program', '$nama', '$email', '$sesi', '$password')";
        mysqli_query($koneksi, $query);
        echo "<script>window.alert('Silahkan Lengkapi data dan cek email..... ');
        window.location=('proses.php?aksi=biodata&id=$no_daftar')</script>";
    } catch (Exception $e) {
        echo "Email tidak dapat dikirim. Pesan error: {$mail->ErrorInfo}";
    }
}
elseif ($_GET['m'] == 'inputbiodata') {
// reset password
}
?>