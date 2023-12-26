
          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="../uploads/foto/<?php echo"$_SESSION[foto]";?>" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo"$_SESSION[nama]";?></h3>
                  <p class="text-muted text-center">Calon Mahasiswa Baru IBN Lampung</p>
                  <?php    $tebaru=mysqli_query($koneksi," SELECT * FROM daftar,jurusan WHERE daftar.id_jurusan=jurusan.id_jurusan AND  daftar.id_daftar=$_SESSION[id_daftar] ");
                       $t=mysqli_fetch_array($tebaru); ?>
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Jurusan</b> <a class="pull-right"><?php echo"$t[nama_jurusan]";?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Program Kuliah</b> <a class="pull-right"><?php echo"$t[program]";?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Jenis Kuliah</b> <a class="pull-right"><?php echo"$t[jenis]";?></a>
                    </li>
                  </ul>
                <?php  if($t['status']=='0'){
                    echo"<a href='#' class='btn btn-danger btn-block'><b>PENDAFTARAN DALAM PROSES</b></a>";
                     }
                   else if($t['status']=='1'){
                    echo"<a href='#' class='btn btn-success btn-block'><b>ANDA DI TERIMA</b></a>";
                   } else { 
                    echo"<a href='#' class='btn btn-warning btn-block'><b>ANDA TIDAK TERIMA</b></a>";
                      } ?>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Tentang Saya</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Sekolah Asal</strong>
                  <p class="text-muted">
                  <?php echo"$t[asal_sekolah]";?>
                  </p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> alamat Lengkap</strong>
                  <p class="text-muted"><?php echo"$t[alamat]";?></p>

                  <hr>

                  <strong><i class="fa fa-pencil margin-r-5"></i> Desa</strong>
                  <p>
                    <span class="label label-danger"><?php echo"$t[desa]";?></span>
                    <span class="label label-primary">Rt:<?php echo"$t[rt]";?> Rw:<?php echo"$t[rw]";?></span>
                    <span class="label label-success"><?php echo"$t[kecamatan]";?></span>
                    <span class="label label-info"><?php echo"$t[kota]";?></span>
                    <span class="label label-warning"><?php echo"$t[provinsi]";?></span>

                  </p>

                  <hr>

                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Keterangan</strong>
                  <p>Saya Mendaftar di IBN Lampung dengan jurusan <?php echo"$t[nama_jurusan]";?> Program kuliah yang saya pilih <?php echo"$t[program]";?> dan jenis kuliah yang saya pilih adalah <?php echo"$t[jenis]";?></p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Data</a></li>
                  <li><a href="#timeline" data-toggle="tab">Detail Orang Tua</a></li>
                  <li><a href="#settings" data-toggle="tab">Biaya</a></li>
                  <li><a href="#syarat" data-toggle="tab">Syarat Daftar</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
           
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
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>alamat : <?php echo"$t[alamat]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Desa :<?php echo"$t[desa]";?> </p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Kota/Kab :<?php echo"$t[kota]";?> </p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Kecamatan :<?php echo"$t[kecamatan]";?> </p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Provinsi :<?php echo"$t[provinsi]";?> </p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Asal Sekolah : <?php echo"$t[asal_sekolah]";?></p>
               
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Nama Ayah :<?php echo"$t[nama_ayah]";?> </p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Nama Ibu :<?php echo"$t[nama_ibu]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Pekerjaan Ayah:<?php echo"$t[pekerjaan_ayah]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Pekerjaan Ibu:<?php echo"$t[pekerjaan_ibu]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Pendidikan Ayah:<?php echo"$t[pendidikan_ayah]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Pendidikan Ibu:<?php echo"$t[pendidikan_ibu]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>HP/WA Ayah:<?php echo"$t[no_hp_ayah]";?></p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>HP/WA Ibu:<?php echo"$t[no_hp_ibu]";?></p>
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
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
                                <p class="text-primary mb-1">Biaya Pendaftaran <strong><?php echo "Rp." . number_format($t['biaya_3'], 0, ',', '.'); ?></strong></p>
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
                                <div class="text-center border-bottom p-4">
                                <p class="text-primary mb-1"><strong>Biaya Kuliah Belum Termasuk: </strong></p>
                      
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Biaya Kunjungan Industri 1 X</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Biaya Kuliah Kerja Nyata 1 X</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Biaya Kuliah Kerja Praktik 1 X</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Biaya Jurnal 1 X</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Biaya Skripsi/Tugas Akhir 1 X</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Biaya Yudisium 1 X</p>
                                <p class="border-bottom pb-3"><i class="fa fa-check text-primary me-3"></i>Biaya Wisuda 1 X</p>
                            </div>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="syarat">
                    <!-- The timeline -->
                
            <div class='row'>
                            <div class='col-lg-12'>
                                <div class='panel panel-default'>
                                   
                                    <div class='panel-body'>
                                    <?php  if($t['status_upload']=='0'){
                    echo"   <form id='form1'  method='post' action='edit.php?aksi=prosesupload&id_sesi=$t[id_sesi]' enctype='multipart/form-data'>
                    <div class='form-group'>
                    <label for='subject'>Ijasah/SKHU/Nilai Raport</label>
                    <input  type='file' class='form-control' name='ijazah'><br>  
                    <label for='subject'>Kartu Keluarga</label>
                    <input  type='file' class='form-control' name='kk'><br> 
                            <div class='modal-footer'>
                                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                                <button type='submit' class='btn btn-primary'>Save </button>
                     </div> 
                     </div>
                        </form>";
                     }
                   else if($t['status_upload']=='1'){
                    echo"<table class='table'>
                    <tr>
                      <td>FILE KK </td>
                      <td><a href='../uploads/kk/$t[kk]' class='btn btn-success'><b>Lihat</b></a></td>
                    </tr>
                    <tr>
                      <td>FILE IJAZAH </td>
                      <td><a href='../uploads/ijazah/$t[ijazah]' target='_blank' class='btn btn-success'><b>Lihat</b></a></td>
                    </tr>
                    <tr>
                      <td colspan='2'><a href='edit.php?aksi=ubahupload&id_sesi=$t[id_sesi]' target='_blank' class='btn btn-warning btn-block'><b>UBAH FILE</b></a></td>
                    </tr>
                  </table>";
                   } else { 
                    echo"<a href='#' class='btn btn-warning btn-block'><b>kesalahan sisstem kami</b></a>";
                      } ?>
         </div> </div></div></div>
           
                  </div><!-- /.tab-pane -->
                  <a class="btn btn-primary px-4 py-2" href="../cetak_daftar.php?id=<?php echo"$t[id_sesi]";?>" target="_blank">CETAK PENDAFTARAN</a>
                  <a class="btn btn-primary px-4 py-2" href="index.php?aksi=biodataupdate">RUBAH DATA</a>
                  <a class="btn btn-primary px-4 py-2" href="logout.php">LOGOUT</a>
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->
