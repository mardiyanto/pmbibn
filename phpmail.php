<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Konfigurasi SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Ganti dengan host SMTP Anda
    $mail->SMTPAuth = true;
    $mail->Username = 'mardybest@ibnus.ac.id'; // Ganti dengan alamat email Anda
    $mail->Password = 'buda atny ysmy msgr'; // Ganti dengan kata sandi email Anda
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Set pengirim dan penerima
    $mail->setFrom('mardybest@ibnus.ac.id', 'Your Name'); // Ganti dengan alamat email Anda dan nama Anda
    $mail->addAddress('mardybest@gmail.com', 'Recipient Name'); // Alamat email penerima dan nama penerima

    // Konten email
    $mail->isHTML(true);
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body = 'This is a test email sent from PHPMailer.';

    // Kirim email
    $mail->send();
    
    echo 'Email telah berhasil dikirim!';
} catch (Exception $e) {
    echo "Email tidak dapat dikirim. Pesan error: {$mail->ErrorInfo}";
}
?>
