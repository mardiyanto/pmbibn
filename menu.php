<style>
/* CSS untuk styling tombol WhatsApp */
.whatsapp-button {
    position: fixed;
    top: 50%; /* Pusat vertikal */
    right: 20px; /* Jarak dari sisi kanan */
    transform: translateY(-50%); /* Pusat vertikal tepat ditengah */
    z-index: 1000; /* Menentukan urutan tumpukan (z-index) */
    background-color: #25d366; /* Warna latar belakang */
    padding: 10px;
    border-radius: 50%; /* Untuk membuatnya bulat */
    transition: transform 0.2s ease-in-out; /* Animasi saat dihover */
}

.whatsapp-button img {
    width: 40px; /* Ukuran ikon WhatsApp */
    height: 40px;
    display: block;
}
    </style>
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img class="img-fluid" src="tema/img/logo-tema.png" alt="">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') { echo 'active'; } ?>">Beranda</a>
            <a href="tentang.php" class="nav-item nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'tentang.php') { echo 'active'; } ?>">Tentang</a>
            <a href="jurusan.php" class="nav-item nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'jurusan.php') { echo 'active'; } ?>">Jurusan</a>
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Akademik</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="index.php#daftar"  class="dropdown-item">PMB</a>
                        <a href="http://103.126.172.193:82/index.php/login" target="_blank" class="dropdown-item">Siakad</a>
                        <a href="#" class="dropdown-item">Dosen Kami</a>
                        <a href="#" class="dropdown-item">Testimonial</a>
                    </div>
                </div> -->
                <a href="biaya.php" class="nav-item nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'biaya.php') { echo 'active'; } ?>">Biaya</a>
                <a href="hubungi.php" class="nav-item nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'hubungi.php') { echo 'active'; } ?>"">Hubungi Kami</a>
            </div>
            <a href="index.php#daftar" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <div class="whatsapp-button">
            <a href="https://api.whatsapp.com/send?phone=+6285769915056&text=Assalamu%20Alaikum%20Mohon%20informasi%20PMB IBN LAMPUNG" target="_blank">
            <img src="whatsapp-icon.png" alt="WhatsApp">
            </a>
    </div>