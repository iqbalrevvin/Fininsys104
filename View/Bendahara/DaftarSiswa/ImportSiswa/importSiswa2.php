<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2><b>IMPORT DATA SISWA</b></h2>
      </div>
      <div class="body">
        <div class="row clearfix">
          <div class="col-md-3">
            <div class="input-group">
              <form method="post" enctype="multipart/form-data" action="">
                <a href="View/Bendahara/DaftarSiswa/ImportSiswa/Format-Import_Siswa.xls">
                <button type="button" class="btn bg-blue-grey btn-block btn-sm waves-effect">
                <i class="material-icons">file_download</i>
                <span>Download Format</span>
                </button>
                </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="input-group">
                <input type="file" name="userfile" class="btn bg-indigo btn-block btn-sm waves-effect"></div>
            </div>
            <div class="col-md-3">
              <div class="input-group">
                <button type="submit" name="preview" class="btn bg-teal btn-block btn-sm waves-effect">
                <i class="material-icons">import_export</i>
                <span>Proses</span>
                </button>
              </div>
            </div>
            <div class="col-md-3">
              <div class="input-group">
                <div class="row clearfix jsdemo-notification-info">
                  <button type="button" data-text="Import Dengan File Format .xls/Excel 2003" class="btn bg-cyan btn-block waves-effect" data-placement-from="top" data-placement-align="center" data-animate-enter="animated bounceInUp" data-animate-exit="animated bounceOutUp" data-color-name="bg-teal">
                  <i class="material-icons">info</i>
                  <span>Keterangan</span>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>Progress Import Siswa</h4>
          </div>
          <!-- Progress bar holder -->
          <div id="progress" style="width:100%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
          <!-- Progress information -->
          <div id="information" style="width"></div>
          <!-- /.row -->
          <!-- File Upload | Drag & Drop OR With Click & Choose -->

<?php
if(isset($_POST['preview'])){
//if($_REQUEST['k']=="upload"){
// menggunakan class phpExcelReader
  if (empty(@$_FILES['userfile']['tmp_name'])){ ?>
    <div class="alert bg-pink alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <p> Mohon Pilih File Terlebih Dahulu, Dan Pastikan File Berformat/Extensi .xls/Excel2003.</p> 
    </div>
<?php
}else{


include "excel_reader2.php";
// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);


// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);
// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;

echo "<br><table>";

for ($i=3; $i<=$baris; $i++)
{
  // MEMBACA DATA FIELD (kolom ke-1 FIELD)
  $fieldz         = $data->val($i, 1);
  // membaca KONTEN (kolom ke-2 R)
  $nik 	          = $data->val($i, 1);
  $tglmasuk  	    = $data->val($i, 2);
  $pindahan   	  = $data->val($i, 3);
  $tglPindah      = $data->val($i, 4);
  $pndhDiSmstr    = $data->val($i, 5);
  $kelas          = $data->val($i, 6);
  $namaSiswa      = @mysqli_real_escape_string($db,$data->val($i, 7));
  $jk             = $data->val($i, 8);
  $nisn           = $data->val($i, 9);
  $nipd           = $data->val($i, 10);
  $tmpLahir       = $data->val($i, 11);
  $tglLahir       = $data->val($i, 12);
  $agama          = $data->val($i, 13);
  $alamat         = $data->val($i, 14);
  $desa           = $data->val($i, 15);
  $kecamatan      = $data->val($i, 16);
  $kabupaten      = $data->val($i, 17);
  $provinsi       = $data->val($i, 18);
  $noTelp         = $data->val($i, 19);
  $email          = $data->val($i, 20);
  $foto           = $data->val($i, 21);
  $pip            = $data->val($i, 22);
  $namaAyah       = @mysqli_real_escape_string($data->val($i, 23));
  $thnLahirAyah   = $data->val($i, 24);
  $pndAyah        = $data->val($i, 25);
  $pkjAyah        = $data->val($i, 26);
  $phslAyah       = $data->val($i, 27);
  $namaIbu        = @mysqli_real_escape_string($db,$data->val($i, 28));
  $thnLhrIbu      = $data->val($i, 29);
  $pndIbu         = $data->val($i, 30);
  $pkjIbu         = $data->val($i, 31);
  $phslIbu        = $data->val($i, 32);
  $tglInput       = $data->val($i, 33);

	  $ceknik  = mysqli_query($db, "SELECT no_idnt, nama_siswa FROM siswa WHERE no_idnt = '$nik'") or die ($db->error);
    $nikganda = mysqli_num_rows($ceknik);
    $cekkelas  = mysqli_query($db, "SELECT nama_kelas FROM kelas WHERE nama_kelas = '$kelas'") or die ($db->error);
    $valkelas = mysqli_num_rows($cekkelas);
    if($nik==""){
      echo "<tr><td>&nbsp;Gagal Insert data Siswa <b>$namaSiswa</b>&nbsp;&nbsp;</td><td><font color=red> NIK Kosong</font> Pastikan NIK Siswa Tidak Kosong!</td> </tr>";
    }elseif($nikganda>0){ 
  	  echo "<tr><td>&nbsp;Gagal Insert data Siswa <b>$namaSiswa</b>&nbsp;&nbsp;</td><td><font color=red> NIK $nik</font> Sudah Ada</td> </tr>";
      $gagal++;
    }elseif(strlen($nik) != 16){ 
      echo "<tr><td>&nbsp;Gagal Insert data Siswa <b>$namaSiswa</b>&nbsp;&nbsp;</td><td><font color=red> NIK $nik</font> Tidak 16 Digit</td> </tr>";
    }elseif($valkelas<1){
      echo "<tr><td>&nbsp;Gagal Insert data Siswa <b>$namaSiswa</b>&nbsp;&nbsp;</td><td><font color=red> Kelas $kelas</font> Tidak Tersedia & Belum Di Atur</td> </tr>";
    }else{
      // setelah data dibaca, sisipkan ke dalam tabel SISWA
        
$insertsiswa = mysqli_query($db , "INSERT INTO siswa 
                                  (
                                    idSiswa, no_idnt, tgl_masuk, pindahan, tgl_pindah, pindah_di_semester, kelas, nama_siswa, jenis_kelamin, nisn,
                                    nipd, tempat_lahir, tgl_lahir, agama, alamat, desa, kecamatan, kabupaten, provinsi, no_telp,
                                    email, foto, pip, nama_ayah, tahun_lahir_ayah, pendidikan_ayah, pekerjaan_ayah, penghasilan_ayah,
                                    nama_ibu, tahun_lahir_ibu, pendidikan_ibu, pekerjaan_ibu, penghasilan_ibu, tgl_daftar
                                  )
                                  VALUES
                                  ('', '$nik', '$tglmasuk', '$pindahan', '$tglPindah', '$pndhDiSmstr', '$kelas', '$namaSiswa', '$jk', '$nisn',
                                   '$nipd', '$tmpLahir','$tglLahir','$agama','$alamat','$desa','$kecamatan', '$kabupaten', '$provinsi', '$noTelp', 
                                    '$email', '$foto', '$pip', '$namaAyah', '$thnLahirAyah', '$pndAyah', '$pkjAyah', '$phslAyah',
                                    '$namaIbu', '$thnLhrIbu', '$pndIbu', '$pkjIbu', '$phslIbu', '$tglInput'
                                  )") or die ($db->error);
echo "<tr><td>&nbsp;Berhasil Import Data Siswa Ke Database, Nama : <b>$namaSiswa</b>&nbsp;&nbsp;</td><td><font color=green> NIK : $nik</font> </td> </tr>";
  $sukses++;
}
  //if ($hasil) $sukses++;
  //else $gagal++;
    

   // end if !str_replace

  
			// Calculate the percentation
			$percent = intval($i/$baris * 100)."%";
    
    // Javascript for updating the progress bar and information
    echo '<script src = "Assets/js/jquery-3.1.1.js"></script><script src="Assets/plugins/jquery/jquery.min.js"></script>
    <script language="javascript">
    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-image:url(Assets/images/pbar-ani1.gif);\">&nbsp;</div>";
    document.getElementById("information").innerHTML="  Proses Entri : '.$nik.' ... <b>'.$i.'</b> row(s) of <b>'. $baris.'</b> processed.";
    
    </script>';
// This is for the buffer achieve the minimum size in order to flush data
    echo str_repeat(' ',1024*64);
    

// Send output to browser immediately
    flush();
// Tell user that the process is completed
   echo '<script language="javascript">document.getElementById("information").innerHTML="&nbsp; <b>Proses update database Siswa : Selesai</b>"</script>';
  
  }
  ?>
<div class="progress" style="width:100%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px">
    <div class="progress-bar bg-teal progress-bar-striped active" role="progressbar" 
       aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width:100%;">
        <?php
          echo "<b class='col-yellow'>Jumlah Data Berhasil Masuk Ke Database : ".$sukses."<b>";
        ?>

    <?php
        if($gagal>0){
              echo "<b class='col-amber'>Jumlah Data Gagal Masuk Ke Database : ".$gagal."</b>";
        }
    }
}

  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah

  echo "</table>";
// tampilan status sukses dan gagal
?>

</div>
<!-- /.col-lg-4 -->         
</div>
<!-- /.row -->
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UPLOAD FILE FOTO SISWA - DRAG & DROP OR WITH CLICK & CHOOSE
                                <!--<small>Taken from <a href="http://www.dropzonejs.com/" target="_blank">www.dropzonejs.com</a></small>-->
                            </h2>
                        </div>
                        <div class="body">
                            <form action="Controller/Bendahara/DaftarSiswa/uplFotoQuery.php" class="dropzone">
                                <div class="dz-message">
                                    <div class="drag-icon-cph">
                                        <i class="material-icons">touch_app</i>
                                    </div>
                                    <h3>Tarik & Letakan File Foto Siswa Di Sini.</h3>
                                    <em>(Pastikan Nama File Sama Dengan Yang Di Tuliskan Di <strong>Ms. Excel</strong> Import.)</em>
                                </div> 
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
            



