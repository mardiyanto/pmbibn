<?php
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='home'){
include "profil.php";
}
elseif($_GET['aksi']=='ikon'){
include "../ikon.php";
}

elseif($_GET['aksi']=='pass'){
        $tebaru=mysqli_query($koneksi," SELECT * FROM daftar WHERE id_daftar=$_SESSION[id_daftar] ");
        $t=mysqli_fetch_array($tebaru);
        echo"
        <div class='row'>
                        <div class='col-lg-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>Edit Pasword login email : $t[email]
                                </div>
                                <div class='panel-body'>
        <form id='form1'  method='post' enctype='multipart/form-data' action='index.php?aksi=proseseditpassword&id_daftar=$t[id_daftar]'>
               <div class='form-grup'>
                <label>Pasword Baru</label>
                <input type='text' class='form-control'  name='password'/><br>
                <a href='index.php?aksi=home' class='btn btn-default' data-dismiss='modal'>kembali</a>
                                                    <button type='submit' class='btn btn-primary'>Save </button>
                                                </div> </div>
            </form></div> </div></div> 
        ";	
}
elseif($_GET['aksi']=='proseseditpassword'){
    $password = md5($_POST['password']);
    mysqli_query($koneksi,"UPDATE daftar SET password='$password', show_pass='$_POST[password]' WHERE id_daftar='$_GET[id_daftar]'");
    echo "<script>window.alert('update password berhasil'); window.location=('index.php?aksi=home')</script>"; 
}
///////////////////////////////////////////////////////////////////////////////////////////////////  
elseif($_GET['aksi']=='biodataupdate'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM daftar,jurusan WHERE daftar.id_jurusan=jurusan.id_jurusan AND  daftar.id_daftar=$_SESSION[id_daftar]");
    $t=mysqli_fetch_array($tebaru); 
    echo"
    <form id='form1'  method='post' enctype='multipart/form-data' action='edit.php?aksi=proseseditbiodata&id_sesi=$t[id_sesi]'>
    <div class='row'>
    <div class='col-md-3'>
    <!-- Profile Image -->
    <div class='box box-primary'>
      <div class='box-body box-profile'>
      
        <img class='img-responsive' src='../uploads/foto/$t[foto]' alt='User profile picture'>
        <h3 class='profile-username text-center'>$t[nama]</h3>
        <label for='subject'>Pas Foto 3x4</label>
        <input  type='file' class='form-control' name='foto'><br>                     
        <div class='form-group'>
        <label >Program Kuliah</label>
        <select class='form-control select2' name='program' style='width: 100%;'>
            <option value='$t[program]'>$t[program]</option>
            <option value='normal'>Normal</option>
            <option value='rpl'>RPL 2 TAHUN</option>
        </select></div>";
        if ($t['program'] === 'normal') {
            // Jika program yang dipilih adalah 'normal'
            // Lakukan tindakan yang sesuai di sini
            echo " <div class='form-group'>
            <label >Jurusan Kuliah</label>
                <select class='form-control select2' name='id_jurusan' style='width: 100%;' required>
                    <option value='$t[id_jurusan]'>$t[nama_jurusan]</option>";
                $tebaru=mysqli_query($koneksi," SELECT * FROM jurusan ORDER BY id_jurusan DESC ");
                    while ($x=mysqli_fetch_array($tebaru)){ 
                    echo" <option value='$x[id_jurusan]'>$x[nama_jurusan]</option>";
                    }
            echo" </select></div>";
        echo " <div class='form-group'>
        <label >Jenis Kuliah</label>
            <select class='form-control select2' name='jenis' style='width: 100%;' required>
                <option value='$t[jenis]'>$t[jenis]</option>
                <option value='reguler'>Reguler</option>
                <option value='kariawan'>Kariawan</option>
            </select></div>";
            // Anda dapat menambahkan logika tambahan sesuai kebutuhan
        } else {
            // Tindakan untuk program lain
            echo "<div class='form-group'>
            <label >Jurusan Kuliah</label>
                <select class='form-control select2' name='id_jurusan' style='width: 100%;' required>
                <option value='$t[id_jurusan]'>$t[nama_jurusan]</option>";
                $tebaru=mysqli_query($koneksi," SELECT * FROM jurusan WHERE id_jurusan='1' ");
                while ($x=mysqli_fetch_array($tebaru)){ 
                echo" <option value='$x[id_jurusan]'>$x[nama_jurusan]</option>";
                }
            echo" </select></div>";
        echo "<div class='form-group'>
               <label >Jenis Kuliah</label>
                <select class='form-control select2' name='jenis' style='width: 100%;' required>
                <option value='$t[jenis]'>$t[jenis]</option>
                    <option value='kariawan'>Kariawan</option>
                </select></div>";
        }  
            echo"
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->

        <div class='col-lg-3'>
            <div class='panel panel-default'>
                <div class='panel-heading'>EDIT
                </div>
                    <div class='panel-body'>
                            <div class='form-grup'>
                            <label for='name'>Nama</label>
                            <input type='text' class='form-control' value='$t[nama]' name='nama'><br>
                            <label for='name'>NIK</label>
                            <input type='text' class='form-control' value='$t[nik]' name='nik'><br>
                            <label for='name'>NISN</label>
                            <input type='text' class='form-control' value='$t[nisn]' name='nisn'><br>
                            <label for='name'>Nomor WA/HP</label>
                            <input type='number' class='form-control' name='no_hp' value='$t[no_hp]' required><br>
                            <div class='form-group'>
                            <label >Jenis Kelamin</label>
                            <select class='form-control select2' name='jenis_kelamin' style='width: 100%;' required>
                                <option value='$t[jenis_kelamin]'>$t[jenis_kelamin]</option>
                                <option value='laki-laki'>Laki-Laki</option>
                                <option value='perempuan'>Perempuan</option>
                            </select></div>
                            <div class='form-group'>
                        <label >Agama</label>
                            <select class='form-control select2' name='agama' style='width: 100%;' required>
                                <option value='$t[agama]'>$t[agama]</option>
                                <option value='Islam'>Islam</option>
                                <option value='Kristen'>Kristen</option>
                                <option value='Protestan'>Protestan</option>
                                <option value='Hindu'>Hindu</option>
                                <option value='Budha'>Budha</option>
                            </select></div>
                            <div class='form-group'>
                        <label >Warga Negara</label>
                            <select class='form-control select2' name='warga_siswa' style='width: 100%;' required>
                                <option value='$t[warga_siswa]'>$t[warga_siswa]</option>
                                <option value='WNI'>Warga Negara Indonesia</option>
                                <option value='WNA'>Warga Negara Asing</option>
                            </select> </div>
                            <label for='email'>Tempat Lahir</label>
                            <input type='text' class='form-control' name='tempat_lahir' value='$t[tempat_lahir]' required><br>
                            <label for='email'>Tanggal Lahir</label>
                            <input type='date' class='form-control'  name='tgl_lahir' value='$t[tgl_lahir]' required><br>
                            
                                    
                             </div> 
                 
                    </div> 
            </div> 
         </div>
         <div class='col-lg-3'>
         <div class='panel panel-default'>
             <div class='panel-heading'>EDIT
             </div>
                 <div class='panel-body'>
                         <div class='form-grup'>
                         <label for='email'>Asal Sekolah</label>
                            <input type='text' class='form-control'  name='asal_sekolah' value='$t[asal_sekolah]' required><br>
                            <label for='email'>Desa</label>
                            <input type='text' class='form-control'  name='desa' value='$t[desa]' required><br>
                            <label for='email'>RT</label>
                            <input type='text' class='form-control'  name='rt' value='$t[rt]' required><br>
                            <label for='email'>RW</label>
                            <input type='text' class='form-control'  name='rw' value='$t[rw]' required><br>
                            <label for='email'>Kecamatan</label>
                            <input type='text' class='form-control'  name='kecamatan' value='$t[kecamatan]' required><br>
                            <label for='email'>Kabupaten/Kota</label>
                            <input type='text' class='form-control'  name='kota' value='$t[kota]' required><br>
                            <label for='email'>Provinsi</label>
                            <input type='text' class='form-control'  name='provinsi' value='$t[provinsi]' required><br>
                            <label for='email'>Kode Pos</label>
                            <input type='text' class='form-control'  name='kode_pos'  value='$t[kode_pos]' required><br>
                            <label for='message'>Alamat Lengkap</label>
                            <textarea class='form-control' placeholder='Leave a message here' name='alamat' style='height: 150px' required>$t[alamat]</textarea>
                        
                          </div> 
              
                 </div> 
         </div> 
      </div>
      <div class='col-lg-3'>
      <div class='panel panel-default'>
          <div class='panel-heading'>EDIT
          </div>
              <div class='panel-body'>
                      <div class='form-grup'>
                      <label for='name'>Nama Ayah</label>
                      <input type='text' class='form-control' name='nama_ayah' value='$t[nama_ayah]' required><br>
                      <label for='email'>Nama Ibu</label>
                      <input type='text' class='form-control' name='nama_ibu' value='$t[nama_ibu]' required><br>
                      <label for='subject'>Pendidikan Ayah</label>
                      <input type='text' class='form-control' name='pendidikan_ayah' value='$t[pendidikan_ayah]' required><br>
                      <label for='subject'>Pendidikan Ibu</label>
                      <input type='text' class='form-control' name='pendidikan_ibu' value='$t[pendidikan_ibu]' required><br>
                      <label for='subject'>Pekerjaan Ayah</label>
                      <input type='text' class='form-control' name='pekerjaan_ayah' value='$t[pekerjaan_ayah]' required><br>
                      <label for='subject'>Pekerjaan Ibu</label>
                      <input type='text' class='form-control' name='pekerjaan_ibu' value='$t[pekerjaan_ibu]'  required><br>
                       <label for='subject'>Penghasilan Ayah</label>
                      <input type='text' class='form-control' name='penghasilan_ayah' value='$t[penghasilan_ayah]' required><br>
                      <label for='subject'>Penghasilan Ibu</label>
                      <input type='text' class='form-control' name='penghasilan_ibu' value='$t[penghasilan_ibu]' required><br>
                      <label for='subject'>HP/WA Ayah</label>
                      <input type='number' class='form-control' name='no_hp_ayah' value='$t[no_hp_ayah]'  required><br>
                      <label for='subject'>HP/WA Ibu</label>
                      <input type='number' class='form-control' name='no_hp_ibu' value='$t[no_hp_ibu]' required><br>
                      <label for='subject'>Tranport Tasi Ke Kampus</label>
                      <input type='text' class='form-control' name='transportasi' value='$t[transportasi]' required><br>
                          <a href='index.php?aksi=kecamatan' class='btn btn-default' data-dismiss='modal'>kembali</a>
                          <button type='submit' class='btn btn-primary'>Save </button>
                       </div> 
           
              </div> 
      </div> 
   </div>
    </div>
    </form>
    ";	
}
///////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='jurusan'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM daftar,jurusan WHERE daftar.id_jurusan=jurusan.id_jurusan AND  daftar.id_daftar=$_SESSION[id_daftar] ");
    $t=mysqli_fetch_array($tebaru); 
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>EDIT
                            </div>
                            <div class='panel-body'>
    <form id='form1'  method='post' enctype='multipart/form-data' action='edit.php?aksi=proseseditjurusan&id_sesi=$_GET[id_sesi]'>

           <div class='form-grup'>";
           if ($t['program'] === 'normal') {
            // Jika program yang dipilih adalah 'normal'
            // Lakukan tindakan yang sesuai di sini
            echo " <div class='form-group'>
            <label >Jurusan Kuliah</label>
                <select class='form-control select2' name='id_jurusan' style='width: 100%;' required>
                    <option value='$t[id_jurusan]'>$t[nama_jurusan]</option>";
                $tebaru=mysqli_query($koneksi," SELECT * FROM jurusan ORDER BY id_jurusan DESC ");
                    while ($x=mysqli_fetch_array($tebaru)){ 
                    echo" <option value='$x[id_jurusan]'>$x[nama_jurusan]</option>";
                    }
            echo" </select></div>
            
        <div class='form-group'>
        <label >Jenis Kuliah</label>
            <select class='form-control select2' name='jenis' style='width: 100%;' required>
                <option value='$t[jenis]'>$t[jenis]</option>
                <option value='reguler'>Reguler</option>
                <option value='kariawan'>Kariawan</option>
            </select></div>";
            // Anda dapat menambahkan logika tambahan sesuai kebutuhan
        } else {
            // Tindakan untuk program lain
            echo "<div class='form-group'>
            <label >Jurusan Kuliah</label>
                <select class='form-control select2' name='id_jurusan' style='width: 100%;' required>
                <option value='$t[id_jurusan]'>$t[nama_jurusan]</option>";
                $tebaru=mysqli_query($koneksi," SELECT * FROM jurusan WHERE id_jurusan='1' ");
                while ($x=mysqli_fetch_array($tebaru)){ 
                echo" <option value='$x[id_jurusan]'>$x[nama_jurusan]</option>";
                }
                echo" </select></div>
            
            <div class='form-group'>
                <label >Jenis Kuliah</label>
                    <select class='form-control select2' name='jenis' style='width: 100%;' required>
                        <option value='$t[jenis]'>$t[jenis]</option>
                        <option value='kariawan'>Kariawan</option>
                    </select></div>";
            } echo"<br>
            <a href='index.php?aksi=desa' class='btn btn-default' data-dismiss='modal'>kembali</a>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div> </div>
        </form></div> </div></div> 
    ";	
}

 /////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='upload'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM daftar,jurusan WHERE daftar.id_jurusan=jurusan.id_jurusan AND  daftar.id_daftar=$_SESSION[id_daftar] ");
    $t=mysqli_fetch_array($tebaru); 
            echo"
            <div class='row'>
            <div class='col-md-3'>
            <!-- Profile Image -->
            <div class='box box-primary'>
              <div class='box-body box-profile'>
              
                <img class='img-responsive' src='../uploads/foto/$t[foto]' alt='User profile picture'>
                <h3 class='profile-username text-center'>$t[nama]</h3>
                <label for='subject'>Pas Foto 3x4</label>
                <input  type='file' class='form-control' name='foto'><br>                     
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- /.col -->

                            <div class='col-lg-9'>
                                <div class='panel panel-default'>
                                    <div class='panel-heading'>EDIT 
                                    </div>
                                    <div class='panel-body'>";
                                    if($t['status_upload']=='0'){
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
                                          <td><a href='../uploads/kk/$t[kk]' target='_blank' class='btn btn-success'><b>Lihat</b></a></td>
                                        </tr>
                                        <tr>
                                          <td>FILE IJAZAH </td>
                                          <td><a href='../uploads/ijazah/$t[ijazah]' target='_blank' class='btn btn-success'><b>Lihat</b></a></td>
                                        </tr>
                                        <tr>
                                          <td colspan='2'><a href='edit.php?aksi=ubahupload&id_sesi=$t[id_sesi]' class='btn btn-warning btn-block'><b>UBAH FILE</b></a></td>
                                        </tr>
                                      </table>";
                                       } else { 
                                        echo"<a href='#' class='btn btn-warning btn-block'><b>kesalahan sisstem kami</b></a>";
                                          } echo"
            </div> </div></div></div>
            ";
}
?>