
<?php
 include 'koneksi.php';
// Contoh logika untuk mengembalikan opsi jurusan
if ($_POST['program'] == 'normal') {
    $tebaru=mysqli_query($koneksi," SELECT * FROM jurusan  ");
    while ($t=mysqli_fetch_array($tebaru)){ 
     echo" <option value='$t[id_jurusan]'>$t[nama_jurusan]</option>";
    }
} elseif ($_POST['program'] == 'rpl') {
    $tebaru=mysqli_query($koneksi," SELECT * FROM jurusan WHERE id_jurusan='1' ");
    while ($t=mysqli_fetch_array($tebaru)){ 
     echo" <option value='$t[id_jurusan]'>$t[nama_jurusan]</option>";
    }
} else {
    echo "<option value='0'>----Pilih Jurusan----</option>";
}
?>
