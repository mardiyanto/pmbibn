<?php 
 include 'koneksi.php';
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

if($_GET['aksi']=='biodata'){ 
$tebaru=mysqli_query($koneksi," SELECT * FROM daftar WHERE id_daftar=$_GET[id] ");
$t=mysqli_fetch_array($tebaru); ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/js/select2.min.js"></script>

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
            <form method='post' action='int.php?m=inputbiodata'>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
               
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
                                        <option value="0"><?php echo"$t[program]"; ?></option>
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
                                     <select class='form-selec' name='id_jurusan'>
                                         <option value='0'>--Pilih Jurusan--</option>";
                                       $tebaru=mysqli_query($koneksi," SELECT * FROM jurusan ORDER BY id_jurusan DESC ");
     while ($t=mysqli_fetch_array($tebaru)){ 
                                        echo" <option value='$t[id_jurusan]'>$t[nama_jurusan]</option>";
     }
                                    echo" </select>
                             </div>";
                                 // Anda dapat menambahkan logika tambahan sesuai kebutuhan
                             } else {
                                 // Tindakan untuk program lain
                                 echo "<div class='col-6'>
                                 <label >Jurusan Kuliah</label>
                                     <select class='form-selec' name='id_jurusan'>
                                         <option value='0'>--Pilih Jurusan--</option>";
                                       $tebaru=mysqli_query($koneksi," SELECT * FROM jurusan WHERE id_jurusan='1' ");
     while ($t=mysqli_fetch_array($tebaru)){ 
                                        echo" <option value='$t[id_jurusan]'>$t[nama_jurusan]</option>";
                                    }
                                    echo" </select>
                             </div>";
                             
                             }
                            ?>
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                           
                        </div>
              
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
              
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                   
                </div>

                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
             
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                 
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Courses End -->
<?php } ?>
<?php if($_GET['aksi']=='biaya'){ ?>
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
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
    </div>
<!-- Pricing Start -->
<div class="container-xxl py-5">
            <div class="container px-lg-5">

                <div class="row gy-5 gx-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="position-relative shadow rounded border-top border-5 border-primary">
                            <div class="d-flex align-items-center justify-content-center position-absolute top-0 start-50 translate-middle bg-primary rounded-circle" style="width: 45px; height: 45px; margin-top: -3px;">
                                <i class="fa fa-database text-white"></i>
                            </div>
                            <div class="text-center border-bottom p-4 pt-5">
                                <h4 class="fw-bold">D3 MANAJEMEN INFORMATIKA GELAR (Amd.Kom)</h4>
                                <p class="mb-0">AYO KULIAH DI IBN DENGAN BIAYA MURAH DAPAT DI CICIL</p>
                            </div>
                            <div class="text-center border-bottom p-4">
                                <p class="text-primary mb-1">Kuliah /Semester sampai selesai total biaya Rp.25,250,000.00  - <strong>Diskon UP TO 57% Hanya Bayar Rp. 10.800.000</strong></p>
                                <h1 class="mb-3">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">Rp.</small>300.000<small
                                        class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Bulan</small>
                                </h1>
                                <a class="btn btn-primary px-4 py-2" href="https://daftar.ibnus.ac.id" target="_blank">DAFTAR SEKARANG</a>
								<p class="text-primary mb-1">Biaya Daftar Ulang <strong>Rp.2.500.000 GELOMBANG 1 DAPAT DI CICIL 2X</strong></p>
								<p class="text-primary mb-1">Biaya Daftar Ulang <strong>Rp.3.000.000 GELOMBANG 2 DAPAT DI CICIL 2X</strong></p>
                            </div>
                            <div class="p-4">
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>GEL. 2 : 25 FEBUARI - 03 APRIL 2023</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>SPP Rp.300.000 /Bulan</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>GEL.3 : 11 APRIL - 25 MEI 2023</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>SPP Rp.350.000 /Bulan</p>
                            </div>
							
							<div class="text-center border-bottom p-4">
                                <p class="text-primary mb-1"><strong>Biaya Kuliah Belum Termasuk: </strong></p>
                            </div>
							<div class="p-4">
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Kunjungan Industri Rp.2.500.000 1 X</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>BIAYA WISUDA Rp.2.000.000 1 X</p>
                  
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
					 <div class="position-relative shadow rounded border-top border-5 border-secondary">
                            <div class="d-flex align-items-center justify-content-center position-absolute top-0 start-50 translate-middle bg-primary rounded-circle" style="width: 45px; height: 45px; margin-top: -3px;">
                                <i class="fa fa-share-alt text-white"></i>
                            </div>
                            <div class="text-center border-bottom p-4 pt-5">
                                <h4 class="fw-bold">S1 SISTEM INFORMASI GELAR(S.Kom)</h4>
                                <p class="mb-0">AYO KULIAH DI IBN DENGAN BIAYA MURAH DAPAT DI CICIL</p>
                            </div>
                            <div class="text-center border-bottom p-4">
                                <p class="text-primary mb-1">Kuliah /Semester sampai selesai total biaya Rp.39,750,000.00  - <strong>Diskon UP TO 40% Hanya Bayar Rp. 10.800.000</strong></p>
                                <h1 class="mb-3">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">Rp.</small>500.000<small
                                        class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Bulan</small>
                                </h1>
                                <a class="btn btn-primary px-4 py-2" href="https://daftar.ibnus.ac.id" target="_blank">DAFTAR SEKARANG</a>
								<p class="text-primary mb-1">Biaya Daftar Ulang <strong>Rp.2.500.000 GELOMBANG 1 DAPAT DI CICIL 2X</strong></p>
								<p class="text-primary mb-1">Biaya Daftar Ulang <strong>Rp.3.000.000 GELOMBANG 2 DAPAT DI CICIL 2X</strong></p>
                            </div>
                            <div class="p-4">
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>GEL. 2 : 25 FEBUARI - 03 APRIL 2023</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>SPP Rp.500.000 /Bulan</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>GEL.3 : 11 APRIL - 25 MEI 2023</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>SPP Rp.600.000 /Bulan</p>
                            </div>
							
							<div class="text-center border-bottom p-4">
                                <p class="text-primary mb-1"><strong>Biaya Kuliah Belum Termasuk: </strong></p>
                            </div>
							<div class="p-4">
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Kunjungan Industri Rp.2.500.000 1 X</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>BIAYA WISUDA Rp.2.000.000 1 X</p>
                  
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
					    <div class="position-relative shadow rounded border-top border-5 border-primary">
                            <div class="d-flex align-items-center justify-content-center position-absolute top-0 start-50 translate-middle bg-primary rounded-circle" style="width: 45px; height: 45px; margin-top: -3px;">
                                <i class="fa fa-cog text-white"></i>
                            </div>
                            <div class="text-center border-bottom p-4 pt-5">
                                <h4 class="fw-bold">S1 BISNIS DIGITAL & S1 MANAJEMEN </h4>
                                <p class="mb-0">AYO KULIAH DI IBN DENGAN BIAYA MURAH DAPAT DI CICIL</p>
                            </div>
                            <div class="text-center border-bottom p-4">
                                <p class="text-primary mb-1">Kuliah /Semester sampai selesai total biaya Rp.48.250.000 - <strong>Diskon UP TO 50% Hanya Bayar Rp.25.000.000</strong></p>
                                <h1 class="mb-3">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">Rp.</small>520.000<small
                                        class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Bulan</small>
                                </h1>
                                <a class="btn btn-primary px-4 py-2" href="https://daftar.ibnus.ac.id" target="_blank">DAFTAR SEKARANG</a>
								<p class="text-primary mb-1">Biaya Daftar Ulang <strong>Rp.2.500.000 GELOMBANG 1 DAPAT DI CICIL 2X</strong></p>
								<p class="text-primary mb-1">Biaya Daftar Ulang <strong>Rp.2.500.000 GELOMBANG 2 DAPAT DI CICIL 2X</strong></p>
                            </div>
                            <div class="p-4">
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>GEL. 2 : 25 FEBUARI - 03 APRIL 2023</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>SPP Rp.520.000 /Bulan</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>GEL.3 : 11 APRIL - 25 MEI 2023</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>SPP Rp.625.000 /Bulan</p>
                            </div>
							
							<div class="text-center border-bottom p-4">
                                <p class="text-primary mb-1"><strong>Biaya Kuliah Belum Termasuk: </strong></p>
                            </div>
							<div class="p-4">
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Kunjungan Industri Rp.2.500.000 1 X</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>BIAYA WISUDA Rp.2.000.000 1 X</p>
                  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pricing End -->

<?php } ?>