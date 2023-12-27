<?php 
 include 'koneksi.php';
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

if($_GET['aksi']=='biodata'){ 
$tebaru=mysqli_query($koneksi," SELECT * FROM daftar,jurusan WHERE daftar.id_jurusan=jurusan.id_jurusan AND  daftar.id_sesi=$_GET[id] ");
$t=mysqli_fetch_array($tebaru); ?>
<div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Lengkapi Biodata <?php echo"$t[nama]"; ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Biodata <?php echo"$t[nama]"; ?> </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <!-- Carousel End -->


 <!-- Courses Start -->
 <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Biodata <?php echo"$t[nama]"; ?> dengan nomor daftar <?php echo"$t[no_daftar]"; ?> </h6>
                <h1 class="mb-5">Biodata <?php echo"$t[nama]"; ?> </h1>
            </div>
            <form method='post' action='int.php?m=inputbiodata&id_daftar=<?php echo"$t[id_daftar]"; ?>&id=<?php echo"$t[id_sesi]"; ?>'  enctype="multipart/form-data">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp kotak-border" data-wow-delay="0.1s">
                <h6 >A.Data Diri dan Pilihan Jurusan : </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  value="<?php echo"$t[nama]"; ?>" >
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control"  value="<?php echo"$t[email]"; ?>">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <label >Program Kuliah</label>
                                    <select class="form-selec" name="program">
                                        <option value="<?php echo"$t[program]"; ?>"><?php echo"$t[program]"; ?></option>
                                        <option value="normal">Normal</option>
                                        <option value="rpl">RPL 2 TAHUN</option>
                                    </select>
                            </div>
                            <?php 
                  if ($t['program'] === 'normal') {
                                 // Jika program yang dipilih adalah 'normal'
                                 // Lakukan tindakan yang sesuai di sini
                                 echo "<div class='col-6'>
                                 <label >Jurusan Kuliah</label>
                                     <select class='form-selec' name='id_jurusan' required>
                                         <option value='$t[id_jurusan]'>$t[nama_jurusan]</option>";
                                       $tebaru=mysqli_query($koneksi," SELECT * FROM jurusan ORDER BY id_jurusan DESC ");
                                            while ($x=mysqli_fetch_array($tebaru)){ 
                                            echo" <option value='$x[id_jurusan]'>$x[nama_jurusan]</option>";
                                            }
                                    echo" </select>
                                </div>";
                                echo "<div class='col-6'>
                                <label >Jenis Kuliah</label>
                                    <select class='form-selec' name='jenis' required>
                                        <option value='0'>--Pilih Jenis Kuliah--</option>
                                        <option value='reguler'>Reguler</option>
                                        <option value='kariawan'>Kariawan</option>
                                    </select>
                            </div>";
                                 // Anda dapat menambahkan logika tambahan sesuai kebutuhan
                             } else {
                                 // Tindakan untuk program lain
                                 echo "<div class='col-6'>
                                 <label >Jurusan Kuliah</label>
                                     <select class='form-selec' name='id_jurusan' required>
                                         <option value='$t[id_jurusan]'>$t[nama_jurusan]</option>";
                                       $tebaru=mysqli_query($koneksi," SELECT * FROM jurusan WHERE id_jurusan='1' ");
                                       while ($x=mysqli_fetch_array($tebaru)){ 
                                        echo" <option value='$x[id_jurusan]'>$x[nama_jurusan]</option>";
                                       }
                                    echo" </select>
                             </div>";
                             echo "<div class='col-6'>
                                 <label >Jenis Kuliah</label>
                                     <select class='form-selec' name='jenis' required>
                                         <option value='0'>--Pilih Jenis Kuliah--</option>
                                         <option value='kariawan'>Kariawan</option>
                                     </select>
                             </div>";
                             
                             }
                            ?>
                            
                           
                             <div class='col-6'>
                                 <label >Jenis Kelamin</label>
                                     <select class='form-selec' name='jenis_kelamin' required>
                                         <option value='0'>--Pilih Jenis Kelamin--</option>
                                         <option value='laki-laki'>Laki-Laki</option>
                                         <option value='perempuan'>Perempuan</option>
                                     </select>
                             </div>
                             <div class='col-6'>
                                 <label >Agama</label>
                                     <select class='form-selec' name='agama' required>
                                         <option value='tidak beragama'>--Pilih Jenis agama--</option>
                                         <option value='Islam'>Islam</option>
                                         <option value='Kristen'>Kristen</option>
                                         <option value='Protestan'>Protestan</option>
                                         <option value='Hindu'>Hindu</option>
                                         <option value='Budha'>Budha</option>
                                     </select>
                             </div>
                             <div class='col-6'>
                                 <label >Warga Negara</label>
                                     <select class='form-selec' name='warga_siswa' required>
                                         <option value='0'>--Pilih Jenis Kewarga Negaraan--</option>
                                         <option value='WNI'>Warga Negara Indonesia</option>
                                         <option value='WNA'>Warga Negara Asing</option>

                                     </select>
                             </div>
                             <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control"  name='nik' placeholder="NIK" required>
                                    <label for="email">NIK</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control"  name='nisn' placeholder="NISN" required>
                                    <label for="email">NISN</label>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name='no_hp' placeholder="Nomor WA/HP" required>
                                    <label for="name">Nomor WA/HP</label>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name='tempat_lahir' placeholder="Tempat Lahir" required>
                                    <label for="email">Tempat Lahir</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control"  name='tgl_lahir' placeholder="Tanggal Lahir" required>
                                    <label for="email">Tanggal Lahir</label>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name='asal_sekolah' placeholder="Asal Sekolah" required>
                                    <label for="email">Asal Sekolah</label>
                                </div>
                            </div>                           
                        </div>
              
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp kotak-border" data-wow-delay="0.3s">
                <h6 >B.Detail alamat Pendaftar </h6>
                        <div class="row g-3">
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name='desa' placeholder="Desa" required>
                                    <label for="email">Desa</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name='rt' placeholder="RT" required>
                                    <label for="email">RT</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name='rw' placeholder="RW" required>
                                    <label for="email">RW</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name='kecamatan' placeholder="Kecamatan" required>
                                    <label for="email">Kecamatan</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name='kota' placeholder="Kabupaten/Kota" required>
                                    <label for="email">Kabupaten/Kota</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name='provinsi' placeholder="Provinsi" required>
                                    <label for="email">Provinsi</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name='kode_pos' placeholder="Kode Pos" required>
                                    <label for="email">Kode Pos</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="file" class="form-control" name='foto' required>
                                    <label for="subject">Pas Foto 3x4</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" name='alamat' style="height: 150px" required></textarea>
                                    <label for="message">Alamat Lengkap</label>
                                </div>
                            </div>
                           
                        </div>
                   
                </div>

                <div class="col-lg-4 col-md-12 wow fadeInUp kotak-border"  data-wow-delay="0.5s">
                <h6 >C.Detail Orang Tua Pendaftar </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name='nama_ayah' placeholder="Nama Ayah" required>
                                    <label for="name">Nama Ayah</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name='nama_ibu' placeholder="Nama Ibu" required>
                                    <label for="email">Nama Ibu</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="pendidikan_ayah" placeholder="Pendidikan Ayah" required>
                                    <label for="subject">Pendidikan Ayah</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="pendidikan_ibu" placeholder="Pendidikan Ibu" required>
                                    <label for="subject">Pendidikan Ibu</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" required>
                                    <label for="subject">Pekerjaan Ayah</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" required>
                                    <label for="subject">Pekerjaan Ibu</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="penghasilan_ayah" placeholder="Penghasilan Ayah" required>
                                    <label for="subject">Penghasilan Ayah</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="penghasilan_ibu" placeholder="Penghasilan Ibu" required>
                                    <label for="subject">Penghasilan Ibu</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="no_hp_ayah" placeholder="HP/WA Ayah" required>
                                    <label for="subject">HP/WA Ayah</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="no_hp_ibu" placeholder="HP/WA" required>
                                    <label for="subject">HP/WA Ibu</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="transportasi" placeholder="Tranport Tasi Ke Kampus" required>
                                    <label for="subject">Tranport Tasi Ke Kampus</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">SIMPAN</button>
                            </div>
                        </div>
                 
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Courses End -->
<?php } ?>
<?php if($_GET['aksi']=='suksesdaftar'){ 
$tebaru=mysqli_query($koneksi," SELECT * FROM daftar,jurusan WHERE daftar.id_jurusan=jurusan.id_jurusan AND  daftar.id_sesi=$_GET[id] ");
$t=mysqli_fetch_array($tebaru); ?>
    <!-- <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Biaya Kuliah</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Biaya Kuliah Kami</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div> -->
<!-- Pricing Start -->
<div class="container-xxl py-5">
            <div class="container px-lg-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Biodata <?php echo"$t[nama]"; ?> dengan nomor daftar <?php echo"$t[no_daftar]"; ?> </h6>
                <h1 class="mb-5">Biodata <?php echo"$t[nama]"; ?> </h1>
            </div>
                <div class="row gy-5 gx-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="position-relative shadow rounded border-top border-5 border-primary">
                            <div class="d-flex align-items-center justify-content-center position-absolute top-0 start-50 translate-middle bg-primary rounded-circle" style="width: 45px; height: 45px; margin-top: -3px;">
                                <i class="fa fa-database text-white"></i>
                            </div>
                            <div class="text-center border-bottom p-4 pt-5">
                                <h4 class="fw-bold">BIODATA</h4>
                                <p class="mb-0"><?php echo"$t[nama]";?></p>
                            </div>
                                <?php 
                                 if ($t['program'] === 'normal') { ?>
                                <div class="text-center border-bottom p-4">
                                <p class="text-primary mb-1">Terimakasih sudah Mendaftar di Kampus IBN Lampung<strong> dengan memilih jurusan <?php echo"$t[nama_jurusan]";?> Dengan Biaya Kuliah Sebesar</strong></p>
                               <?php $total=$t['biaya_spp']/1;
                               ?>
                                <h1 class="mb-3">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">Rp.</small><?php echo "" . number_format($total, 0, ',', '.'); ?><small
                                        class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Semester</small>
                                </h1>
                                <p class="text-primary mb-1">Biaya Daftar Ulang <strong><?php echo "Rp." . number_format($t['biaya_2'], 0, ',', '.'); ?> DAPAT DI CICIL 2X</strong></p>
                            </div>    
                                    <?php  } else { ?>
                                        <div class="text-center border-bottom p-4">
                                <p class="text-primary mb-1">Terimakasih sudah Mendaftar di Kampus IBN Lampung<strong> dengan memilih jurusan <?php echo"$t[nama_jurusan]";?> Dengan Biaya Kuliah Sebesar</strong></p>
                                <h1 class="mb-3">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">Rp.</small>3.200.000<small
                                        class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Semester</small>
                                </h1>
                                <p class="text-primary mb-1">Biaya SKS <strong>Rp. 4O.000/SKS </strong></p>
                                <p class="text-primary mb-1">Biaya Daftar Ulang <strong><?php echo "Rp." . number_format($t['biaya_2'], 0, ',', '.'); ?> DAPAT DI CICIL 2X</strong></p>
                            </div>
                                    
                                    <?php }
                                ?>
                            
                            
                            <div class="p-4">
                            <img src="uploads/foto/<?php echo"$t[foto]";?>" width="321"   border="1">
                            </div>
							
							<div class="text-center border-bottom p-4">
                                <p class="text-primary mb-1"><strong>Biaya Kuliah Belum Termasuk: </strong></p>
                            </div>
							<div class="p-4">
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Biaya Kunjungan Industri 1 X</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Biaya Kuliah Kerja Nyata 1 X</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Biaya Kuliah Kerja Praktik 1 X</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Biaya Jurnal 1 X</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Biaya Skripsi/Tugas Akhir 1 X</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Biaya Yudisium 1 X</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Biaya Wisuda 1 X</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
					 <div class="position-relative shadow rounded border-top border-5 border-secondary">
                            <div class="d-flex align-items-center justify-content-center position-absolute top-0 start-50 translate-middle bg-primary rounded-circle" style="width: 45px; height: 45px; margin-top: -3px;">
                                <i class="fa fa-share-alt text-white"></i>
                            </div>
                            <div class="text-center border-bottom p-4 pt-5">
                                <h4 class="fw-bold">DETAIL DATA :</h4>
                                <p class="mb-0"><?php echo"$t[nama]";?></p>
                            </div>
                            <div class="p-4">
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Nama Lengkap : <?php echo"$t[nama]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>NIK : <?php echo"$t[nik]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>NISN : <?php echo"$t[nisn]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>WA/HP : <?php echo"$t[no_hp]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Nomor : <?php echo"$t[no_daftar]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Jurusan : <?php echo"$t[nama_jurusan]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Program : <?php echo"$t[program]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Jenis : <?php echo"$t[jenis]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>User Login : <?php echo"$t[email]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Password : <?php echo"$t[show_pass]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Tempat Lahir : <?php echo"$t[tempat_lahir]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Tanggal Lahir : <?php echo"$t[tgl_lahir]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Jenis Kelamin : <?php echo"$t[jenis_kelamin]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Agama : <?php echo"$t[agama]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Warganegara : <?php echo"$t[warga_siswa]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Asal Sekolah : <?php echo"$t[asal_sekolah]";?></p>
                            </div>
				
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
					    <div class="position-relative shadow rounded border-top border-5 border-primary">
                            <div class="d-flex align-items-center justify-content-center position-absolute top-0 start-50 translate-middle bg-primary rounded-circle" style="width: 45px; height: 45px; margin-top: -3px;">
                                <i class="fa fa-cog text-white"></i>
                            </div>
                            <div class="text-center border-bottom p-4 pt-5">
                                <h4 class="fw-bold">DETAIL ALAMAT DAN ORANG TUA</h4>
        
                            </div>
                            <div class="text-center border-bottom p-4">
                                <a class="btn btn-primary px-4 py-2" href="cetak_daftar.php?id=<?php echo"$t[id_sesi]";?>" target="_blank">CETAK PENDAFTARAN</a>
                                <a class="btn btn-primary px-4 py-2" href="proses.php?aksi=login&id=<?php echo"$t[id_sesi]";?>">LOGIN</a>
                            </div>
                            <div class="p-4">
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>alamat : <?php echo"$t[alamat]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Desa :<?php echo"$t[desa]";?> </p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Kota/Kab :<?php echo"$t[kota]";?> </p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Kecamatan :<?php echo"$t[kecamatan]";?> </p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Provinsi :<?php echo"$t[provinsi]";?> </p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Nama Ayah :<?php echo"$t[nama_ayah]";?> </p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Nama Ibu :<?php echo"$t[nama_ibu]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Pekerjaan Ayah:<?php echo"$t[pekerjaan_ayah]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Pekerjaan Ibu:<?php echo"$t[pekerjaan_ibu]";?></p>
                            </div>
                            <div class="text-center p-4">
                                <a class="btn btn-primary px-4 py-2" href="proses.php?aksi=biodataupdate&id=<?php echo"$t[id_sesi]";?>">RUBAH DATA</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pricing End -->
<?php } ?>

<?php if($_GET['aksi']=='biodataupdate'){ 
$tebaru=mysqli_query($koneksi," SELECT * FROM daftar,jurusan WHERE daftar.id_jurusan=jurusan.id_jurusan AND  daftar.id_sesi=$_GET[id] ");
$t=mysqli_fetch_array($tebaru); ?>
<div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Lengkapi Biodata <?php echo"$t[nama]"; ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Biodata <?php echo"$t[nama]"; ?> </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <!-- Carousel End -->


 <!-- Courses Start -->
 <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Biodata <?php echo"$t[nama]"; ?> dengan nomor daftar <?php echo"$t[no_daftar]"; ?> </h6>
                <h1 class="mb-5">Biodata <?php echo"$t[nama]"; ?> </h1>
            </div>
            <form method='post' action='int.php?m=proseseditbiodata&id_daftar=<?php echo"$t[id_daftar]"; ?>&id=<?php echo"$t[id_sesi]"; ?>'  enctype="multipart/form-data">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp kotak-border" data-wow-delay="0.1s">
                <h6 >A.Data Diri dan Pilihan Jurusan : </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  value="<?php echo"$t[nama]"; ?>" >
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control"  value="<?php echo"$t[email]"; ?>">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <label >Program Kuliah</label>
                                    <select class="form-selec" name="program">
                                        <option value="<?php echo"$t[program]"; ?>"><?php echo"$t[program]"; ?></option>
                                        <option value="normal">Normal</option>
                                        <option value="rpl">RPL 2 TAHUN</option>
                                    </select>
                            </div>
                            
                            <?php 
                  if ($t['program'] === 'normal') {
                                 // Jika program yang dipilih adalah 'normal'
                                 // Lakukan tindakan yang sesuai di sini
                                 echo "<div class='col-6'>
                                 <label >Jurusan Kuliah</label>
                                     <select class='form-selec' name='id_jurusan' required>
                                         <option value='$t[id_jurusan]'>$t[nama_jurusan]</option>";
                                       $tebaru=mysqli_query($koneksi," SELECT * FROM jurusan ORDER BY id_jurusan DESC ");
                                            while ($x=mysqli_fetch_array($tebaru)){ 
                                            echo" <option value='$x[id_jurusan]'>$x[nama_jurusan]</option>";
                                            }
                                    echo" </select>
                                </div>";
                                echo "<div class='col-6'>
                                <label >Jenis Kuliah</label>
                                    <select class='form-selec' name='jenis' required>
                                        <option value='$t[jenis]'>$t[jenis]</option>
                                        <option value='reguler'>Reguler</option>
                                        <option value='kariawan'>Kariawan</option>
                                    </select>
                            </div>";
                                 // Anda dapat menambahkan logika tambahan sesuai kebutuhan
                             } else {
                                 // Tindakan untuk program lain
                                 echo "<div class='col-6'>
                                 <label >Jurusan Kuliah</label>
                                     <select class='form-selec' name='id_jurusan' required>
                                     <option value='$t[id_jurusan]'>$t[nama_jurusan]</option>";
                                       $tebaru=mysqli_query($koneksi," SELECT * FROM jurusan WHERE id_jurusan='1' ");
                                       while ($x=mysqli_fetch_array($tebaru)){ 
                                        echo" <option value='$x[id_jurusan]'>$x[nama_jurusan]</option>";
                                       }
                                    echo" </select>
                             </div>";
                             echo "<div class='col-6'>
                                 <label >Jenis Kuliah</label>
                                     <select class='form-selec' name='jenis' required>
                                     <option value='$t[jenis]'>$t[jenis]</option>
                                         <option value='kariawan'>Kariawan</option>
                                     </select>
                             </div>";
                             
                             }
                            ?>
                            
                           
                             <div class='col-6'>
                                 <label >Jenis Kelamin</label>
                                     <select class='form-selec' name='jenis_kelamin' required>
                                         <option value="<?php echo"$t[jenis_kelamin]"; ?>"><?php echo"$t[jenis_kelamin]"; ?></option>
                                         <option value='laki-laki'>Laki-Laki</option>
                                         <option value='perempuan'>Perempuan</option>
                                     </select>
                             </div>
                             <div class='col-6'>
                                 <label >Agama</label>
                                     <select class='form-selec' name='agama' required>
                                         <option value="<?php echo"$t[agama]"; ?>"><?php echo"$t[agama]"; ?></option>
                                         <option value='Islam'>Islam</option>
                                         <option value='Kristen'>Kristen</option>
                                         <option value='Protestan'>Protestan</option>
                                         <option value='Hindu'>Hindu</option>
                                         <option value='Budha'>Budha</option>
                                     </select>
                             </div>
                             <div class='col-6'>
                                 <label >Warga Negara</label>
                                     <select class='form-selec' name='warga_siswa' required>
                                         <option value="<?php echo"$t[warga_siswa]"; ?>"><?php echo"$t[warga_siswa]"; ?></option>
                                         <option value='WNI'>Warga Negara Indonesia</option>
                                         <option value='WNA'>Warga Negara Asing</option>

                                     </select>
                             </div>
                             <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control"  name='nik' value="<?php echo"$t[nik]"; ?>" >
                                    <label for="email">NIK</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control"  name='nisn' value="<?php echo"$t[nisn]"; ?>" required>
                                    <label for="email">NISN</label>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name='no_hp' value="<?php echo"$t[no_hp]"; ?>" required>
                                    <label for="name">Nomor WA/HP</label>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name='tempat_lahir' value="<?php echo"$t[tempat_lahir]"; ?>" required>
                                    <label for="email">Tempat Lahir</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control"  name='tgl_lahir' value="<?php echo"$t[tgl_lahir]"; ?>" required>
                                    <label for="email">Tanggal Lahir</label>
                                </div>
                            </div> 
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name='asal_sekolah' value="<?php echo"$t[asal_sekolah]"; ?>" required>
                                    <label for="email">Asal Sekolah</label>
                                </div>
                            </div>                           
                        </div>
              
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp kotak-border" data-wow-delay="0.3s">
                <h6 >B.Detail alamat Pendaftar </h6>
                        <div class="row g-3">
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name='desa' value="<?php echo"$t[desa]"; ?>" required>
                                    <label for="email">Desa</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name='rt' value="<?php echo"$t[rt]"; ?>" required>
                                    <label for="email">RT</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name='rw' value="<?php echo"$t[rw]"; ?>" required>
                                    <label for="email">RW</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name='kecamatan' value="<?php echo"$t[kecamatan]"; ?>" required>
                                    <label for="email">Kecamatan</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name='kota' value="<?php echo"$t[kota]"; ?>" required>
                                    <label for="email">Kabupaten/Kota</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name='provinsi' value="<?php echo"$t[provinsi]"; ?>" required>
                                    <label for="email">Provinsi</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name='kode_pos'  value="<?php echo"$t[kode_pos]"; ?>" required>
                                    <label for="email">Kode Pos</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="file" class="form-control" name='foto'>
                                    <label for="subject">Pas Foto 3x4</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" name='alamat' style="height: 150px" required><?php echo"$t[alamat]"; ?></textarea>
                                    <label for="message">Alamat Lengkap</label>
                                </div>
                            </div>
                           
                        </div>
                   
                </div>

                <div class="col-lg-4 col-md-12 wow fadeInUp kotak-border" data-wow-delay="0.5s">
                <h6 >C.Detail Orang Tua Pendaftar </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name='nama_ayah' value="<?php echo"$t[nama_ayah]"; ?>" required>
                                    <label for="name">Nama Ayah</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name='nama_ibu' value="<?php echo"$t[nama_ibu]"; ?>" required>
                                    <label for="email">Nama Ibu</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="pendidikan_ayah" value="<?php echo"$t[pendidikan_ayah]"; ?>" required>
                                    <label for="subject">Pendidikan Ayah</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="pendidikan_ibu" value="<?php echo"$t[pendidikan_ibu]"; ?>" required>
                                    <label for="subject">Pendidikan Ibu</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="pekerjaan_ayah" value="<?php echo"$t[pekerjaan_ayah]"; ?>" required>
                                    <label for="subject">Pekerjaan Ayah</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="pekerjaan_ibu" value="<?php echo"$t[pekerjaan_ibu]"; ?>"  required>
                                    <label for="subject">Pekerjaan Ibu</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="penghasilan_ayah" value="<?php echo"$t[penghasilan_ayah]"; ?>" required>
                                    <label for="subject">Penghasilan Ayah</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="penghasilan_ibu" value="<?php echo"$t[penghasilan_ibu]"; ?>" required>
                                    <label for="subject">Penghasilan Ibu</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="no_hp_ayah" value="<?php echo"$t[no_hp_ayah]"; ?>"  required>
                                    <label for="subject">HP/WA Ayah</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="no_hp_ibu" value="<?php echo"$t[no_hp_ibu]"; ?>" required>
                                    <label for="subject">HP/WA Ibu</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="transportasi" value="<?php echo"$t[transportasi]"; ?>" required>
                                    <label for="subject">Tranport Tasi Ke Kampus</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">SIMPAN</button>
                            </div>
                        </div>
                 
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Courses End -->
<?php } ?>

<?php if($_GET['aksi']=='login'){ 
$tebaru=mysqli_query($koneksi," SELECT * FROM daftar WHERE id_sesi=$_GET[id] ");
$t=mysqli_fetch_array($tebaru); ?> 

<div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Form Login</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Form Login Calon Mahasiswa </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
 <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Login Calon Mahasiswa</h6>
                <h1 class="mb-5">Silahkan Login, jika lupa password silahkan klik lupapassword </h1>
            </div>
            <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form login -->
        <form action='int.php?m=login' method='post'>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo"$t[email]"; ?>" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo"$t[show_pass]"; ?>" id="exampleInputPassword1" required>
          </div>
       
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="proses.php?akasi=lupapass" class="btn btn-danger">Lupa Password</a>
        </form>
      </div>
    </div>
        </div>
    </div>
    <!-- Courses End -->
<?php } ?>
<?php if($_GET['aksi']=='daftar'){ 
$tebaru=mysqli_query($koneksi," SELECT * FROM daftar WHERE id_sesi=$_GET[id] ");
$t=mysqli_fetch_array($tebaru); ?> 
<div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Form Daftar</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Form Pendaftaran Calon Mahasiswa Baru IBN Lampung</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
 </div>
    <!-- Header End -->
 <!-- Pricing Start -->
 <div class="container-xxl py-5">
            <div class="container px-lg-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Pendaftaran Mahasiswa</h6>
                <h1 class="mb-5">Formulir Pendaftaran</h1>
            </div>
                <div class="row gy-5 gx-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="position-relative shadow rounded border-top border-5 border-primary">
                            <div class="d-flex align-items-center justify-content-center position-absolute top-0 start-50 translate-middle bg-primary rounded-circle" style="width: 45px; height: 45px; margin-top: -3px;">
                                <i class="fa fa-share-alt text-white"></i>
                            </div>
                            <div class="text-center border-bottom p-4 pt-5">
                                <h4 class="fw-bold">FORMULIR PENDAFTARAN</h4>
                            </div>
                            <div class="modal-body">
                            <?php  $i = date("Ymd");
$j = gmdate('H:i:s',time()+60*60*7);   
$sql = @mysqli_query($koneksi, 'SELECT RIGHT(id_daftar ,3) AS id_daftar  FROM daftar ORDER BY id_daftar DESC LIMIT 1') or die('Error : '.mysql_error());
 $num = mysqli_num_rows($sql);
 if($num <> 0)
 {
 $data = mysql_fetch_array($sql);
 $kode = $data['id_daftar'] + 1;
 }else
 {
 $kode = 1;
 }
 //mulai bikin kode
 $bikin_kode = str_pad($kode, 3, "0", STR_PAD_LEFT);
 $kode_jadi = "$bikin_kode"; ?>
                                <form action='int.php?m=daftar' method='post'>
                                <input type="hidden"  name="no_daftar" value="<?php echo"IBN/$i/$kode_jadi/$j"; ?>" placeholder="Email">
                                <input type="hidden"  name="id_daftar" value="<?php echo"$i"; ?>" placeholder="Email">
                                 <div class="mb-3">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="nama" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="email" aria-describedby="emailHelp" required>
                                    </div>
                                    <div class="mb-3">
                                            <label for="subject">Program Kuliah (*default Normal*)</label>
                                            <select class='form-control select2' style='width: 100%;' name='program' id='program' required>
                                            <option value='normal'>----Pilih Program Kuliah----</option>
                                            <option value='normal'>Normal</option>
                                            <option value='rpl'>RPL 2 TAHUN</option>
                                            </select>
                                   </div>
                                   <div class="mb-3">
                                            <label for="subject">Jurusan (*default sistem informasi*)</label>
                                            <select class='form-control select2' style='width: 100%;' name='jurusan' id='jurusan' required>
                                                <option value='1'>----Pilih Jurusan----</option>
                                            </select>
                                   </div>
                               
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password"  id="exampleInputPassword1" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                              </div>
                              <div class="p-4">
                                <p class="border-bottom pb-3 text-center">Note : anda dapat merubah jurusan dan program kuliah jika sudah melengkapi data , lalu login, anda dapat merubah data anda</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
					 <div class="position-relative shadow rounded border-top border-5 border-secondary">
                            <div class="d-flex align-items-center justify-content-center position-absolute top-0 start-50 translate-middle bg-primary rounded-circle" style="width: 45px; height: 45px; margin-top: -3px;">
                                <i class="fa fa-share-alt text-white"></i>
                            </div>
                            <div class="text-center border-bottom p-4 pt-5">
                                <h4 class="fw-bold">PROGRAM RPL 2 Tahun</h4>
                                <p class="mb-0">Program Kuliah Hanya 2 Tahun</p>
                            </div>
                            <div class="text-center border-bottom p-4">
                                <p class="text-primary mb-1">Program ini hanya untuk anda yang mempunyai pengelaman kerja lebih dari 2 tahun,<strong>Cocok untuk anda yang sibuk dengan kerja, untuk jenjang kenaikan pangkat di tempat kerja anda tanpa ribet kuliah</strong></p>
                                <h1 class="mb-3">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">Hanya</small>2 Tahun<small
                                        class="align-bottom" style="font-size: 16px; line-height: 40px;"> Selesai</small>
                                </h1>
                                <button type="button" class="btn btn-primary px-4 py-2" data-bs-toggle="modal" data-bs-target="#myModalrpl">SYARAT DAN KETENTUAN</button>
                            </div>
                            <div class="p-4">
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Jurusan hanya Sistem Informasi gelar (S.Kom)</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>kulian online dan Ofline</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Kami menyesuikan waktu anda</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Anda dapat memilih metode belajar dalam kuliah</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
					    <div class="position-relative shadow rounded border-top border-5 border-primary">
                            <div class="d-flex align-items-center justify-content-center position-absolute top-0 start-50 translate-middle bg-primary rounded-circle" style="width: 45px; height: 45px; margin-top: -3px;">
                                <i class="fa fa-cog text-white"></i>
                            </div>
                            <div class="text-center border-bottom p-4 pt-5">
                                <h4 class="fw-bold">PROGRAM KULIAH NORMAL</h4>
                                <p class="mb-0">Program Kuliah 4 Tahun (S1) & 3 Tahun (D3)</p>
                            </div>
                            <div class="text-center border-bottom p-4">
                                <p class="text-primary mb-1">Program ini khusus anda yang sudah lulus SMA Sederajat,<strong>Program kuliah ini merupakan program normal kuliah selama 8 semester (S1) dan 6 Semester (D3) </strong></p>
                                <h1 class="mb-3">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">Kelas</small> Reguler<small
                                        class="align-bottom" style="font-size: 16px; line-height: 40px;"> dan Kariawan</small>
                                </h1>
                                <button type="button" class="btn btn-primary px-4 py-2" data-bs-toggle="modal" data-bs-target="#myModal">SYARAT DAN KETENTUAN</button>
                            </div>
                            <div class="p-4">
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>kulian online dan Ofline (Kelas Kariawan)</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Kuliah Offline (Kelas Reguler)</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Anda dapat memilih metode belajar dalam kuliah (Kelas Kariawan)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pricing End -->  
  <!--model Normal-->
  <div class="modal fade show" id="myModalrpl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">SYARAT</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                           <div class="p-4">
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Mendaftar dan Melengkapi Data</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Login di sistem Kami</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Upload Berkas :</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>1.IJAZAH TERAKHIR</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>2.Kartu Keluarga</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>3.PAS FOTO 4X6</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>4.Surat Keterangan Kerja (SK) Minimal 3 Tahun/Lebih dari instansi tempat kerja sebelumya atau sekarang </p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Cetak Berkas Pendaftaran dan Membayar Biaya Pendaftaran</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Biaya Pedaftaran S1 (Rp.300.000) & D3 (Rp.200.000) </p>
                            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  <!--model RPL -->
  <div class="modal fade show" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">SYARAT</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                           <div class="p-4">
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Mendaftar dan Melengkapi Data</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Login di sistem Kami</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Upload Berkas IJAZAH/SKHU, KK DAN FOTO 4X6</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Cetak Berkas Pendaftaran dan Membayar Biaya Pendaftaran</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Biaya Pedaftaran S1 (Rp.300.000) & D3 (Rp.200.000) </p>
                            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>