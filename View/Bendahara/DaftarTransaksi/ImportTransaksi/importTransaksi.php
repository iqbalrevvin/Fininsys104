<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2><b>IMPORT DATA TRANSAKSI</b></h2>
      </div>
      <div class="body">
        <div class="row clearfix">
          <div class="col-md-3">
            <div class="input-group">
              <form method="post" enctype="multipart/form-data" action="">
                <a href="Controller/Bendahara/DaftarTransaksi/exportExcelDaftarTransaksi.php">
                <button type="button" class="btn bg-blue-grey btn-block btn-sm waves-effect">
                <i class="material-icons">file_download</i>
                <span>Download Format Import</span>
                </button>
                </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="input-group">
                <input type="file" name="fileTransaksi" class="btn bg-indigo btn-block btn-sm waves-effect"></div>
            </div>
            <div class="col-md-3">
              <div class="input-group">
                <button type="submit" name="import" class="btn bg-teal btn-block btn-sm waves-effect">
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
            <h4>PROGRESS IMPORT DATA TRANSAKSI</h4>
          </div>
          <!-- Progress bar holder -->
          <div id="progress" style="width:100%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
          <!-- Progress information -->
          <div id="information" style="width"></div>
          <!-- /.row -->
          <!-- File Upload | Drag & Drop OR With Click & Choose -->

<?php
  if(isset($_POST['import'])){
  //if($_REQUEST['k']=="upload"){
  // menggunakan class phpExcelReader
    if(empty(@$_FILES['fileTransaksi']['tmp_name'])){ ?>
      <div class="alert bg-pink alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <p> Mohon Pilih File Terlebih Dahulu, Dan Pastikan File Berformat/Extensi .xls/Excel2003.</p> 
      </div>
<?php }else{
  include "excel_reader2.php";
  // membaca file excel yang diupload
  $data = new Spreadsheet_Excel_Reader($_FILES['fileTransaksi']['tmp_name']);


  // membaca jumlah baris dari data excel
  $baris = $data->rowcount($sheet_index=0);
  // nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
  $sukses = 0;
  $gagal = 0;

  echo "<br><table>";

  //$query0 = "TRUNCATE TABLE cbt_siswa";
		  //$hasil0 = mysql_query($query0);

for ($i=2; $i<=$baris; $i++)
{
   // MEMBACA DATA FIELD (kolom ke-1 FIELD)
  $fieldz             = $data->val($i, 1);
  // membaca KONTEN (kolom ke-2 R)
  $namaSiswa          = $data->val($i, 1);
  $nik                = $data->val($i, 2);
  $angkatan           = $data->val($i, 3);
  $noTransaksi   	    = $data->val($i, 4);
  $jenisTransaksi     = $data->val($i, 5);
  $tglTransaksi       = $data->val($i, 6);
  $jamTransaksi       = $data->val($i, 7);
  $jmlPembayaran      = @mysqli_real_escape_string($db,$data->val($i, 8));
  $petugas            = $data->val($i, 9);
  $revisi             = $data->val($i, 10);
  $keterangan         = $data->val($i, 11);
  

	  $ceknik  = $db->query("SELECT no_idnt, nama_siswa FROM siswa WHERE no_idnt = '$nik'") or die ($db->error);
    $statusnik = mysqli_num_rows($ceknik);
    $cekJnsTransaksi = $db->query("SELECT nama_jenis_transaksi FROM jenis_transaksi 
                                  WHERE nama_jenis_transaksi =  '$jenisTransaksi'") or die ($db->error);
    $valJnsTransaksi = mysqli_num_rows($cekJnsTransaksi);

    $cekNoTransaksi = $db->query("SELECT no_transaksi FROM transaksi WHERE no_transaksi = '$noTransaksi'") 
                      or die ($db->error);
    $valNoTransaksi = mysqli_num_rows($cekNoTransaksi);

    if($namaSiswa==""){
      echo "<tr><td>&nbsp;Gagal Import Transaksi&nbsp;&nbsp;</td><td><font color=red> Nama Kosong</font> Pastikan Nama Siswa Tidak Kosong!</td> </tr>";
        $gagal++;
    }elseif($nik==""){
      echo "<tr><td>&nbsp;Gagal Import Transaksi Dari <b>$namaSiswa</b>&nbsp;&nbsp;</td><td><font color=red> <b>NIK/NO. IDENTITAS</b></font> Tidak Boleh Kosong</td> </tr>";
        $gagal++;
    }elseif($angkatan==""){
      echo "<tr><td>&nbsp;Gagal Import Transaksi Dari <b>$namaSiswa</b>&nbsp;&nbsp;</td><td><font color=red> <b>TAHUN ANGKATAN</b></font> Tidak Boleh Kosong</td> </tr>";
        $gagal++;
    }elseif($jenisTransaksi==""){
      echo "<tr><td>&nbsp;Gagal Import Transaksi Dari <b>$namaSiswa</b>&nbsp;&nbsp;</td><td><font color=red> <b>Jenis Transaksi</b></font> Tidak Boleh Kosong</td> </tr>";
        $gagal++;
    }elseif($statusnik==0){ 
  	  echo "<tr><td>&nbsp;Gagal Import Transaksi Dari <b>$namaSiswa</b>&nbsp;&nbsp;</td><td><font color=red> NIK $nik</font> Tidak Ada Dalam Daftar Siswa</td> </tr>";
        $gagal++;
    }elseif(strlen($nik) != 16){ 
      echo "<tr><td>&nbsp;Gagal Import Transaksi Dari <b>$namaSiswa</b>&nbsp;&nbsp;</td><td><font color=red> NIK $nik</font> Tidak 16 Digit</td> </tr>";
        $gagal++;
    }elseif($valJnsTransaksi<1){
      echo "<tr><td>&nbsp;Gagal Import Transaksi Dari <b>$namaSiswa</b>&nbsp;&nbsp;</td><td><font color=red> <b>Jenis Transaksi $jenisTransaksi</b></font> Tidak Tersedia & Belum Di Atur</td> </tr>";
        $gagal++;
    }elseif($tglTransaksi==""){
      echo "<tr><td>&nbsp;Gagal Import Transaksi Dari <b>$namaSiswa</b>&nbsp;&nbsp;</td><td><font color=red> <b>Tanggal Transaksi</b></font> Tidak Boleh Kosong</td> </tr>";
        $gagal++;
    }elseif($jamTransaksi==""){
      echo "<tr><td>&nbsp;Gagal Import Transaksi Dari <b>$namaSiswa</b>&nbsp;&nbsp;</td><td><font color=red> <b>Jam Transaksi</b></font> Tidak Boleh Kosong</td> </tr>";
        $gagal++;
    }elseif($jmlPembayaran==""){
      echo "<tr><td>&nbsp;Gagal Import Transaksi Dari <b>$namaSiswa</b>&nbsp;&nbsp;</td><td><font color=red> <b>Jumlah Pembayaran</b></font> Tidak Boleh Kosong</td> </tr>";
        $gagal++;
    }elseif($petugas==""){
      echo "<tr><td>&nbsp;Gagal Import Transaksi Dari <b>$namaSiswa</b>&nbsp;&nbsp;</td><td><font color=red> <b>Petugas</b></font> Tidak Boleh Kosong</td> </tr>";
        $gagal++;
    }else{
      // setelah data dibaca, sisipkan ke dalam tabel SISWA
  
      $dataJnsTransaksiSQL = $db->query("SELECT * FROM jenis_transaksi JOIN master_transaksi 
                                         ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                                         WHERE jenis_transaksi.nama_jenis_transaksi = '$jenisTransaksi' 
                                         AND master_transaksi.tahun_angkatan = '$angkatan'");
      $dataJenisTransaksi = $dataJnsTransaksiSQL->fetch_object();
      $idJenisTransaksi = $dataJenisTransaksi->idJenis_transaksi;
      $sql = "INSERT INTO transaksi (idTransaksi, idJenis_transaksi, no_transaksi, no_idnt, tgl_transaksi, 
                                jam_transaksi, jumlah_bayar, petugas, revisi, ket_transaksi)
              VALUES ('', '$idJenisTransaksi', '$noTransaksi', '$nik', '$tglTransaksi', '$jamTransaksi', '$jmlPembayaran', '$petugas', '$revisi', '$keterangan')";
      $insertTransaksi = $db->query($sql) or die ($db->error);

  echo "<tr>
          <td>&nbsp;Berhasil Import Data Transaksi Dari : <b>$namaSiswa</b>&nbsp;&nbsp;</td>
          <td><font color=green> Jenis Transaksi : $jenisTransaksi</font></td>
          <td>|</td>
          <td><font color=green> Jumlah Bayar : ".number_format($jmlPembayaran)."</font> </td> 
        </tr>";
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

            



