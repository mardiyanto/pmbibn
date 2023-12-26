<?php
  include '../koneksi.php';
  date_default_timezone_set('Asia/Jakarta');
  session_start();
  if($_SESSION['status'] != "user"){
    header("location:../index.php#daftar");
  }
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='proseseditbiodata'){
	$program = $_POST['program'];
    $sesi = $_GET['id'];
    $id_jurusan = $_POST['id_jurusan'];

    // Cek apakah ada file gambar yang diunggah
    if (!empty($_FILES['foto']['name'])) {
// Menghapus gambar lama sebelum mengunggah yang baru
        $query_select = "SELECT foto FROM daftar WHERE id_sesi='$_GET[id_sesi]'";
        $result_select = mysqli_query($koneksi, $query_select);

        if ($result_select) {
            $row = mysqli_fetch_assoc($result_select);
            $old_photo = $row['foto'];
            unlink("../uploads/foto/" . $old_photo); // Hapus gambar lama
        }
        // Unggah gambar baru
        $rand = rand();
        $allowed = ['gif', 'png', 'jpg', 'jpeg'];
        $filename = $_FILES['foto']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (!in_array($ext, $allowed)) {
            echo "<script>window.alert('Maaf, hanya format JPG, JPEG, PNG & GIF yang diizinkan. '); window.location=('index.php?aksi=biodataupdate')</script>";
            exit;
        }

        $targetDir = '../uploads/foto/';
        $targetFile = $targetDir . $rand . '_' . $filename;

        if (!move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
            echo "<script>window.alert('Maaf, terjadi kesalahan saat mengunggah file.'); window.location=('index.php?aksi=biodataupdate')</script>";
            exit;
        }

        $x = $rand . '_' . $filename;
        mysqli_query($koneksi,"UPDATE daftar SET foto='$x', nama='$_POST[nama]', program='$_POST[program]', id_jurusan='$_POST[id_jurusan]', jenis='$_POST[jenis]', jenis_kelamin='$_POST[jenis_kelamin]', 
        agama='$_POST[agama]', warga_siswa='$_POST[warga_siswa]', nik='$_POST[nik]', nisn='$_POST[nisn]', no_hp='$_POST[no_hp]', tempat_lahir='$_POST[tempat_lahir]', 
        tgl_lahir='$_POST[tgl_lahir]', asal_sekolah='$_POST[asal_sekolah]', desa='$_POST[desa]', rt='$_POST[rt]', rw='$_POST[rw]', kecamatan='$_POST[kecamatan]',kota='$_POST[kota]', 
        provinsi='$_POST[provinsi]', kode_pos='$_POST[kode_pos]', alamat='$_POST[alamat]', nama_ayah='$_POST[nama_ayah]', nama_ibu='$_POST[nama_ibu]', pendidikan_ayah='$_POST[pendidikan_ayah]',pendidikan_ibu='$_POST[pendidikan_ibu]',
        pekerjaan_ayah='$_POST[pekerjaan_ayah]', pekerjaan_ibu='$_POST[pekerjaan_ibu]', penghasilan_ibu='$_POST[penghasilan_ibu]', no_hp_ayah='$_POST[no_hp_ayah]', no_hp_ibu='$_POST[no_hp_ibu]', transportasi='$_POST[transportasi]',penghasilan_ayah='$_POST[penghasilan_ayah]' 
        WHERE id_sesi='$_GET[id_sesi]'");
        echo "<script>window.alert('update biodata berhasil'); window.location=('index.php?aksi=home')</script>";
    } else {
        // Jika tidak ada file yang diunggah
        mysqli_query($koneksi,"UPDATE daftar SET  nama='$_POST[nama]', program='$_POST[program]', id_jurusan='$_POST[id_jurusan]', jenis='$_POST[jenis]', jenis_kelamin='$_POST[jenis_kelamin]', 
        agama='$_POST[agama]', warga_siswa='$_POST[warga_siswa]', nik='$_POST[nik]', nisn='$_POST[nisn]', no_hp='$_POST[no_hp]', tempat_lahir='$_POST[tempat_lahir]', 
        tgl_lahir='$_POST[tgl_lahir]', asal_sekolah='$_POST[asal_sekolah]', desa='$_POST[desa]', rt='$_POST[rt]', rw='$_POST[rw]', kecamatan='$_POST[kecamatan]',kota='$_POST[kota]', 
        provinsi='$_POST[provinsi]', kode_pos='$_POST[kode_pos]', alamat='$_POST[alamat]', nama_ayah='$_POST[nama_ayah]', nama_ibu='$_POST[nama_ibu]', pendidikan_ayah='$_POST[pendidikan_ayah]',pendidikan_ibu='$_POST[pendidikan_ibu]',
        pekerjaan_ayah='$_POST[pekerjaan_ayah]', pekerjaan_ibu='$_POST[pekerjaan_ibu]', penghasilan_ibu='$_POST[penghasilan_ibu]', no_hp_ayah='$_POST[no_hp_ayah]', no_hp_ibu='$_POST[no_hp_ibu]', transportasi='$_POST[transportasi]',penghasilan_ayah='$_POST[penghasilan_ayah]' 
        WHERE id_sesi='$_GET[id_sesi]'");
        echo "<script>window.alert('update biodata berhasil'); window.location=('index.php?aksi=home')</script>";
    }
}
elseif($_GET['aksi']=='proseseditjurusan'){
	mysqli_query($koneksi,"UPDATE daftar SET  program='$_POST[program]', id_jurusan='$_POST[id_jurusan]' WHERE id_sesi='$_GET[id_sesi]'");
	echo "<script>window.alert('update biodata berhasil'); window.location=('index.php?aksi=home')</script>";
}
elseif ($_GET['aksi'] == 'prosesupload') {
	$query_select = "SELECT kk,ijazah FROM daftar WHERE id_sesi='$_GET[id_sesi]'";
        $result_select = mysqli_query($koneksi, $query_select);

        if ($result_select) {
            $row = mysqli_fetch_assoc($result_select);
            $old_photo = $row['kk'];
            unlink("../uploads/kk/" . $old_photo); // Hapus gambar lama
			$old_photo1 = $row['ijazah'];
            unlink("../uploads/ijazah/" . $old_photo2); // Hapus gambar lama
        }
    $rand = rand();
    $allowed =  array('gif', 'png', 'pdf', 'jpg', 'jpeg');
    $filename = $_FILES['kk']['name'];
    $filename1 = $_FILES['ijazah']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $ext1 = pathinfo($filename1, PATHINFO_EXTENSION);

    if (!in_array($ext, $allowed) || !in_array($ext1, $allowed)) {
        echo "<script>window.alert('Maaf, hanya format JPG, JPEG, PDF, PNG & GIF yang diizinkan. '); window.location=('index.php?aksi=upload')</script>";
    } else {
        move_uploaded_file($_FILES['kk']['tmp_name'], '../uploads/kk/' . $rand . '_' . $filename);
        $kk = $rand . '_' . $filename;
        move_uploaded_file($_FILES['ijazah']['tmp_name'], '../uploads/ijazah/' . $rand . '_' . $filename1);
        $ijazah = $rand . '_' . $filename1;
        mysqli_query($koneksi, "UPDATE daftar SET ijazah='$ijazah', kk='$kk', status_upload='1' WHERE id_sesi='$_GET[id_sesi]'");
        echo "<script>window.alert('upload berhasil'); window.location=('index.php?aksi=home')</script>";
    }
}
elseif ($_GET['aksi'] == 'ubahupload') {
	mysqli_query($koneksi, "UPDATE daftar SET status_upload='0' WHERE id_sesi='$_GET[id_sesi]'");
	echo "<script>window.alert('upload berhasil'); window.location=('index.php?aksi=upload')</script>";
}


?>