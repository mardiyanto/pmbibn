<?php 
 include 'koneksi.php';
  date_default_timezone_set('Asia/Jakarta');
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>INSTITU BAKTI NUSANTARA LAMPUNG</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="tema/img/logoibn.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="tema/lib/animate/animate.min.css" rel="stylesheet">
    <link href="tema/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="tema/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="tema/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    <!-- Navbar Start -->
    <?php include "menu.php" ?>
    <!-- Navbar End -->
    <!-- Carousel Start -->
<?php include "slide.php";?>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Skilled Instructors</h5>
                            <p>Kampus Ibn menawarkan lebih dari sekadar pendidikan. Di sini, Anda akan belajar dari para ahli di bidangnya, memperoleh wawasan yang mendalam, dan merasakan pengajaran yang dipimpin oleh pengalaman praktis dan keahlian yang teruji.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3">Online Classes</h5>
                            <p>Kampus Ibn menyambut era baru pendidikan yang menghadirkan kemudahan akses melalui kelas online. Kami memahami kebutuhan akan pembelajaran yang fleksibel tanpa mengorbankan kualitas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home text-primary mb-4"></i>
                            <h5 class="mb-3">Branding Design</h5>
                            <p>Kampus kami bukan hanya tentang pembelajaran, tapi juga tentang menciptakan identitas. Di sini, kami mengasah bakat dan keterampilan dalam Branding Design untuk menciptakan merek yang kuat dan ikonik</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Digital Martketing</h5>
                            <p>Jadilah arsitek perubahan di era digital! Jurusan Digital Marketing di kampus kami adalah jembatan antara kreativitas dan teknologi, mempersiapkanmu menjadi ahli strategi pemasaran yang handal dalam ranah digital.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <section id="tentang">
    <!-- Contact Start -->
 <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">AYO BERGABUNG BERSAMA KAMI</h6>
                <h1 class="mb-5">Impian Anda Berada Di Tangan Anda Sendiri</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5>Pertanyaan Awal Dari Keberhasilan</h5>
                    <p class="mb-4">Pertayaan Anda Akan Kami Jawab Seputer Pendaftaran dan Biaya Untuk Kuliah Di IBN</p>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Office 1</h5>
                            <p class="mb-0">Jalan Labuhan Ratu Dua, Kec. Way Jepara, Kabupaten Lampung Timur, Lampung 34396</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Office 2</h5>
                            <p class="mb-0">Jalan Wisma Rini No 09 Pringsewu Lampung Indonesia</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">WA</h5>
                          <p class="mb-0"><a href="https://api.whatsapp.com/send/?phone=6281379601956&text&type=phone_number&app_absent=0" target="_blank" >0813-7960-1956</a></p>  
                          <p class="mb-0"><a href="https://api.whatsapp.com/send/?phone=6285382243655&text&type=phone_number&app_absent=0" target="_blank" class="mb-0">0853-8224-3655</a></p> 
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Email</h5>
                            <p class="mb-0">admin@ibnus.ac.id</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <iframe class="position-relative rounded w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13361.335047566321!2d104.96286509768683!3d-5.363665589757111!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e473268e8e194c1%3A0x98daa3984209b483!2sInstitut%20Bakti%20Nusantara%20(IBN)%20Pringsewu!5e0!3m2!1sid!2sid!4v1701527867662!5m2!1sid!2sid"
                        frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
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
                    <form method='post' action='int.php?m=daftar'>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="nama" placeholder="Nama Lengkap" required>
                                    <label for="name">Nama Lengkap</label>
                                </div>
                            </div>
                            <input type="hidden"  name="no_daftar" value="<?php echo"IBN/$i/$kode_jadi/$j"; ?>" placeholder="Email">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                <select class='form-control select2' style='width: 100%;' name='program' required>
                  <option value='0'>----Pilih Program Kuliah----</option>
                  <option value='normal'>Normal</option>      
            <option value='rpl'>RPL 2 TAHUN</option>
                </select>
                                    <label for="subject">Prgoram Kuliah</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="subject" name="password" placeholder="Password" required>
                                    <label for="subject">Password</label>
                                </div>
                            </div>
                            
                            <div class="col-6">
                                <button class="btn btn-primary w-100 py-3" type="submit">Daftar</button>
                            </div>
                            <div class="col-6">
                                <a href="" class="btn btn-primary w-100 py-3" >Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

</section>
    <!-- About End -->

    <?php include "jur.php" ?>
   


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Instructors</h6>
                <h1 class="mb-5">Expert Instructors</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="tema/img/miswan.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">MISWAN GUMANTI, M.B.A</h5>
                            <small>Bisnis Digital</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="tema/img/dimah.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">MUKODIMAH,M.T.I</h5>
                            <small>DATA MINING</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="tema/img/suyono.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">SUYONO, M.T.I</h5>
                            <small>WEB DESAIN</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="tema/img/trisna.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">TRINAWATI, M.Pd</h5>
                            <small>MANAJEMEN</small>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <?php include "testi.php" ?>
    <!-- Testimonial End -->
        

    <!-- Footer Start -->
    <?php include "bawah.php" ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="tema/lib/wow/wow.min.js"></script>
    <script src="tema/lib/easing/easing.min.js"></script>
    <script src="tema/lib/waypoints/waypoints.min.js"></script>
    <script src="tema/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="tema/js/main.js"></script>
</body>
