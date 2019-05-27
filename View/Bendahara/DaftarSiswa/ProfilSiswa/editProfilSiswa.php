
<div class="body">
    <form id="form_advanced_validation" method="POST" enctype="multipart/form-data">
            <!--NAMA SISWA-->

    <input type="hidden" value="<?php echo $ID ?>" class="form-control" maxlength="50" id="idSiswa" minlength="3" required>
         <!--//-->

        <!--NAMA SISWA-->
        <h5>Perbarui Foto</h5>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="file" name="editFotoSiswa" class="btn bg-teal btn-block btn-sm waves-effect" required>
            </div>
            <div class="help-info">Piih File Foto Lalu Klik Tombol <b>"Perbarui Foto <?php echo $profil['nama_siswa'] ?>"</b></div>
        </div>
            <input type="submit" value="Perbarui Foto <?php echo $profil['nama_siswa'] ?>" name="submitEditFoto" 
                    class="btn bg-blue-grey btn-sm waves-effect">
        <!--//-->
        <?php
            if (isset($_POST['submitEditFoto'])){ 
            $targetDir          = "assets/images/pas-foto-siswa/";
            $nama_file_foto     = $_FILES['editFotoSiswa']['name'];
            $file_foto          = $_FILES['editFotoSiswa']['tmp_name'];
            $acak               = rand(1,99);
            $namaFile           = $acak."-".$nama_file_foto;
            $targetFile         = $targetDir.$namaFile;
            if (!$file_foto==""){
                unlink($targetDir.$profil['foto']);
            move_uploaded_file($file_foto,$targetFile);
            // Simpan ke Database
            $updateSiswa    = mysqli_query($db, "UPDATE siswa SET foto='$namaFile' WHERE idSiswa='$ID' ") 
            or die ($db->error);
            logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Update Foto Siswa');
            // Simpan di Folder Gambar
            echo"<script>alert('Foto Berhasil Di Perbarui !');history.go(-1);</script>";
            }else{
                echo"<script>alert('Mohon Pilih Dahulu File !');</script>";
            } 
            } 
        ?>
        <hr><hr></form>
        <!--NAMA SISWA-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" name="editNamaSiswa" value="<?php echo $profil['nama_siswa'] ?>" class="form-control" maxlength="50" id="editNamaSiswa" minlength="3" required>
                <label class="form-label">Nama Siswa*</label>
            </div>
            <div class="help-info">Min. 3, Max. 50 Karakter</div>
        </div>
        <!--//-->

        <!--Jenis Kelamin-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Jenis Kelamin</b></p>
                <select id="editJenisKelamin" class="form-control show-tick" data-live-search="true" required>
                        <option value="<?php echo $profil['jenis_kelamin'] ?>"><?php echo $profil['jenis_kelamin'] ?></option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="help-info">
                Pilih Jenis Kelamin Sesuai List Yang Di Sediakan
            </div>
        </div>
        <!--//-->

        <!--NIK-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" value="<?php echo $profil['no_idnt'] ?>" maxlength="16" minlength="16" 
                       onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                       name="number" id="editNikSiswa" class="form-control">
                <label class="form-label">Nomor Identitas / NIK*</label>
            </div>
            <div class="help-info">Contoh : 3205101507990007</div>
        </div>
        <!--//-->

        <!--NISN-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" maxlength="10" minlength="10" onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                                   name="editNisn" id="editNisnSiswa" class="form-control" 
                                   value="<?php echo $profil['nisn'] ?>" required>
                <label class="form-label">NISN(Nomor Induk Standar Nasional)*</label>
            </div>
            <div class="help-info">Contoh : 9992051371</div>
        </div>
        <!--//-->

        <!--NIPD-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" maxlength="9" minlength="9" onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                        id ="editNipdSiswa" class="form-control" 
                       value="<?php echo $profil['nipd'] ?>" required>
                <label class="form-label">NIPD(Nomor Induk Peserta Didik)*</label>
            </div>
            <div class="help-info">Contoh : 161710123</div>
        </div>
        <!--//-->

        <!--Tanggal Masuk Sekolah-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" id="editTglMasukSiswa" name="editMasuk" 
                        value="<?php echo $profil['tgl_masuk'] ?>" required>
                <label class="form-label">Tanggal Masuk Sekolah*</label>
            </div>
            <div class="help-info">YYYY-MM-DD format | Contoh : 2015-07-20</div>
        </div>
        <!--//-->

        <!--Status Pindahan-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Status Pindah Siswa</b></p>
                <select name="text" id="editStatusPindah" class="form-control show-tick" 
                        data-live-search="true" required>
                    <option value="<?php echo $profil['pindahan'] ?>"><?php echo $profil['pindahan'] ?></option>
                    <option value="YA">YA</option>
                    <option value="TIDAK">TIDAK</option>
                </select>
            </div>
            <div class="help-info">Pilih Status Pindah Siswa, Contoh : Tidak</div>
        </div>
        <!--//-->

        <!--Tanggal Pindah-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" id="editTglPindahSiswa" value="<?php echo $profil['tgl_pindah'] ?>">
                <label class="form-label">Tanggal Pindah Sekolah*</label>
            </div>
            <div class="help-info">Isi Jika Status Pindah Memilih <b>"YA"</b> | YYYY-MM-DD format | Contoh : 2016-07-20</div>
        </div>
        <!--//-->

        <!--Pindah Di Semester-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Pindah Di Semester</b></p>
                <select id="editPindahSemester" data-live-search="true" class="form-control show-tick" required>
                        <?php if($profil['pindah_di_semester'] !=NULL){ ?>
                    <option value="<?php echo $profil['pindah_di_semester'] ?>">
                        <?php echo $profil['pindah_di_semester'] ?>
                    </option>
                        <?php }else{ ?>
                    <option value="">
                       -- Pilih Pindah Di Semester --
                    </option>
                    <?php } ?>
                    <option value="1">Pindah Di Semester 1</option>
                    <option value="2">Pindah Di Semester 2</option>
                    <option value="3">Pindah Di Semester 3</option>
                    <option value="4">Pindah Di Semester 4</option>
                    <option value="5">Pindah Di Semester 5</option>
                    <option value="6">Pindah Di Semester 6</option>
                    <option value="7">Pindah Di Semester 7</option>
                    <option value="8">Pindah Di Semester 8</option>
                    <option value="">Kosongkan</option>
                </select>
            </div>
            <div class="help-info">
                Pilih Semester Di Saat Siswa Pindah | Kosongkang Jika Status Pindah Memilih <b>"TIDAK"</b></div>
            </div>
        <!--//-->

        <!--Program Studi-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Kelas</b></p>
                <select name="text" id="editProdiSiswa" class="form-control show-tick" 
                        data-live-search="true" required>
                    <option value="<?php echo $profil['nama_kelas'] ?>"><?php echo $profil['nama_kelas'] ?></option>
                        <?php 
                            include "Controller/Other/daftarKelasQuery.php";
                            while($kelas = mysqli_fetch_array($daftarKelas)){
                                echo "<option value='$kelas[nama_kelas]'>
                                    $kelas[nama_jurusan] | $kelas[nama_kelas]</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="help-info">Pilih Program Studi & Kelas Berdasarkan List</div>
        </div>
        <!--//-->

        <!--Tempat Lahir-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" maxlength="25" minlength="3" 
                        id="editTmpLahirSiswa" value="<?php echo $profil['tempat_lahir'] ?>" required>
                <label class="form-label">Tempat Lahir*</label>
            </div>
            <div class="help-info">Contoh : Garut</div>
        </div>
        <!--//-->

        <!--Tanggal Lahir-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" name="date" class="form-control" name="date" 
                       id="editTglLahirSiswa" value="<?php echo $profil['tgl_lahir'] ?>" required>
                <label class="form-label">Tanggal Lahir*</label>
            </div>
            <div class="help-info">YYYY-MM-DD format | Contoh : 2001-06-03</div>
        </div>
        <!--//-->

        <!--Agama-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Agama</b></p>
                <select name="agama" id="editAgamaSiswa" class="form-control show-tick" 
                        data-live-search="true" required>
                        <option value="<?php echo $profil['agama'] ?>"><?php echo $profil['agama'] ?></option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Budha">Budha</option>
                        <option value="Sesat">Sesat</option>
                </select>
            </div>
            <div class="help-info">
                Pilih Agama Sesuai List, Jika Agama Sesat Langsung keluarkan Siswa/i Tersebut
            </div>
        </div>
        <!--//-->

        <!--Alamat-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" maxlength="100" 
                       minlength="3" id="editAlamatSiswa" value="<?php echo $profil['alamat'] ?>" required>
                <label class="form-label">Alamat*</label>
            </div>
            <div class="help-info">
                Contoh : Jl. H. Abdurahman No. 40 / Kp. Tanggulun RT 001/RW 003
            </div>
        </div>
        <!--//-->

        <!--Desa-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Desa</b></p>
                <select id="editDesaSiswa" class="form-control show-tick" data-live-search="true" required>
                        <option value="<?php echo $profil['desa'] ?>"><?php echo $profil['desa'] ?></option>
                        <option value="">-- PIlih Desa--</option>
                        <?php
                            include "Controller/Other/pilihAlamatDesa.php"; 
                            while($desa = $dataDesa->fetch_object()): 
                        ?>
                            <option value="<?= $desa->nama_desa ?>"><?= $desa->nama_desa ?></option>
                        <?php endwhile; ?>
                </select>
            </div>
            <div class="help-info">Pilih Desa Berdasarkan List</div>
        </div>
        <!--//-->

        <!--Kecamatan-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Kecamatan</b></p>
                <select id="editKecSiswa" class="form-control show-tick" data-live-search="true" required>
                        <option value="<?php echo $profil['kecamatan'] ?>"><?php echo $profil['kecamatan'] ?></option>
                        <option value="">--Pilih Kecamatan--</option>
                        <?php
                            include "Controller/Other/pilihAlamatKecamatan.php"; 
                            while($kec = $dataKecamatan->fetch_object()): 
                        ?>
                            <option value="<?= $kec->nama_kecamatan ?>"><?= $kec->nama_kecamatan ?></option>
                        <?php endwhile; ?>
                </select>
            </div>
            <div class="help-info">Pilih Kecamatan Berdasarkan List</div>
        </div>
        <!--//-->

        <!--Kab/Kota-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Kabupaten</b></p>
                <select id="editKotaSiswa" class="form-control show-tick" data-live-search="true" required>
                        <option value="<?php echo $profil['kabupaten'] ?>"><?php echo $profil['kabupaten'] ?></option>
                        <option value="">--Pilih Kota/Kabupaten--</option>
                            <?php
                                include "Controller/Other/pilihAlamatKota.php"; 
                                while($kota = $dataKota->fetch_object()): 
                            ?>
                                <option value="<?= $kota->nama_kota ?>"><?= $kota->nama_kota ?></option>
                            <?php endwhile; ?>
                </select>
            </div>
            <div class="help-info">Pilih Kabupaten Berdasarkan List</div>
        </div>
        <!--//-->

        <!--Provinsi-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Provinsi</b></p>
                <select id="editProvSiswa" class="form-control show-tick" 
                        data-live-search="true" required>
                        <option value="<?php echo $profil['provinsi'] ?>"><?php echo $profil['provinsi'] ?></option>
                        <option value="">--Pilih Provinsi--</option>
                            <?php
                                include "COntroller/Other/pilihAlamatProvinsi.php"; 
                                while($prov = $dataProvinsi->fetch_object()): 
                            ?>
                                <option value="<?= $prov->nama_provinsi ?>"><?= $prov->nama_provinsi ?></option>
                            <?php endwhile; ?>
                </select>
            </div>
            <div class="help-info">Pilih Provinsi Berdasarkan List</div>
        </div>
        <!--//-->

        <!--HP/WA-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" name="number" class="form-control" onkeypress="return inputAngka(event)" 
                        maxlength="13" minlength="3" id="editHpSiswa" value="<?php echo $profil['no_telp'] ?>" required>
                <label class="form-label">No. Telp/HP/WA*</label>
            </div>
            <div class="help-info">Contoh : 081223142314</div>
        </div>
        <!--//-->

        <!--Email-->
        <div class="form-group form-float">
            <div class="form-line">

                <input type="email" id="editEmailSiswa" value="<?php echo $profil['email'] ?>" class="form-control">
                <label class="form-label">Email</label>
            </div>
            <div class="help-info">Contoh : iqbal.revvin@gmail.com</div>
        </div>
        <!--//-->

        <!--PIP-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>PIP Siswa</b></p>
                <select id="editPipSiswa" class="form-control show-tick" 
                        data-live-search="true" required>
                        <option value="<?php echo $profil['pip'] ?>"><?php echo $profil['pip'] ?></option>
                        <option value="YA">YA</option>
                        <option value="TIDAK">TIDAK</option>
                </select>
            </div>
            <div class="help-info">Pilih "YA" atau "TIDAK"</div>
        </div>
        <!--//-->
        <!--NAMA AYAH-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" value="<?php echo $profil['nama_ayah'] ?>" class="form-control" 
                                    maxlength="50" id="editNamaAyah" minlength="3">
                <label class="form-label">Nama Ayah</label>
            </div>
            <div class="help-info">Min. 3, Max. 50 Karakter</div>
        </div>
        <!--//-->
        <!--TAHUN LAHIR AYAH-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" value="<?php echo $profil['tahun_lahir_ayah'] ?>" maxlength="4" minlength="4" 
                       onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                       name="number" id="editThnLhrAyah" class="form-control">
                <label class="form-label">Tahun Lahir Ayah</label>
            </div>
            <div class="help-info">Contoh : 1970</div>
        </div>
        <!--//-->
        <!--PENDIDIKAN AYAH-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Pendidikan Ayah</b></p>
                <select id="editPendAyah" class="form-control show-tick" data-live-search="true" required>
                        <option value="<?php echo $profil['pendidikan_ayah'] ?>"><?php echo $profil['pendidikan_ayah'] ?></option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                </select>
            </div>
            <div class="help-info">Pilih Pendidikan Ayah Berdasarkan List</div>
        </div>
        <!--//-->
        <!--PEKERJAAN AYAH-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Pekerjaan Ayah</b></p>
                <select id="editPkjAyah" class="form-control show-tick" data-live-search="true" required>
                        <option value="<?php echo $profil['pekerjaan_ayah'] ?>">
                            <?php echo $profil['pekerjaan_ayah'] ?>
                        </option>
                        <option value="TB/SM">TIDAK BEKERJA/SUDAH MENINGGAL</option>
                        <option value="STB">SEDANG TIDAK BEKERJA</option>
                        <option value="PEDAGANG">PEDAGANG</option>
                        <option value="WIRASWASTA">WIRASWASTA</option>
                        <option value="PEGAWAI SWASTA">PEGAWAI SWASTA</option>
                        <option value="PEGAWAI HONORER">PEGAWAI HONORER</option>
                        <option value="PNS">PEGAWAI NEGERI SIPIL(PNS/POLISI/TNI/Dll.)</option>
                </select>
            </div>
            <div class="help-info">Pilih Pekerjaan Ayah Berdasarkan List</div>
        </div>
        <!--//-->
        <!--PENGHASILAN AYAH-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Penghasilan Ayah</b></p>
                <select id="editPengAyah" class="form-control show-tick" data-live-search="true" required>
                        <option value="<?php echo $profil['penghasilan_ayah'] ?>">
                            <?php echo $profil['penghasilan_ayah'] ?>
                        </option>
                        <option value="TB/SM">TIDAK BERPENGHASILAN</option>
                        <option value="500000-1000000">Rp.500.000, ~ Rp.1.000.000</option>
                        <option value="1000000-2000000">Rp.1.000.000, ~ Rp.2.000.000</option>
                        <option value="2000000-3000000">Rp.2.000.000, ~ Rp.3.000.000</option>
                        <option value="3000000-4000000">Rp.3.000.000, ~ Rp.4.000.000</option>
                        <option value="4000000-5000000">Rp.4.000.000, ~ Rp.5.000.000</option>
                        <option value=">5000000">Diatas Rp.5.000.000</option>
                </select>
            </div>
            <div class="help-info">Pilih Penghasilan Ayah Berdasarkan List</div>
        </div>
        <!--//-->
        <!--NAMA IBU-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" value="<?php echo $profil['nama_ibu'] ?>" class="form-control" 
                                    maxlength="50" id="editNamaIbu" minlength="3">
                <label class="form-label">Nama Abu</label>
            </div>
            <div class="help-info">Min. 3, Max. 50 Karakter</div>
        </div>
        <!--//-->
        <!--TAHUN LAHIR IBU-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" value="<?php echo $profil['tahun_lahir_ibu'] ?>" maxlength="4" minlength="4" 
                       onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                       name="number" id="editThnLhrIbu" class="form-control">
                <label class="form-label">Tahun Lahir Ibu</label>
            </div>
            <div class="help-info">Contoh : 1970</div>
        </div>
        <!--//-->
        <!--PENDIDIKAN IBU-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Pendidikan Ibu</b></p>
                <select id="editPendIbu" class="form-control show-tick" data-live-search="true" required>
                        <option value="<?php echo $profil['pendidikan_ibu'] ?>">
                            <?php echo $profil['pendidikan_ibu'] ?>
                        </option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                </select>
            </div>
            <div class="help-info">Pilih Pendidikan Ibu Berdasarkan List</div>
        </div>
        <!--//-->
        <!--PEKERJAAN IBU-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Pekerjaan Ibu</b></p>
                <select id="editPkjIbu" class="form-control show-tick" data-live-search="true" required>
                        <option value="<?php echo $profil['pekerjaan_ibu'] ?>">
                            <?php echo $profil['pekerjaan_ibu'] ?>
                        </option>
                        <option value="TB/SM">TIDAK BEKERJA/SUDAH MENINGGAL</option>
                        <option value="STB">SEDANG TIDAK BEKERJA</option>
                        <option value="PEDAGANG">PEDAGANG</option>
                        <option value="WIRASWASTA">WIRASWASTA</option>
                        <option value="PEGAWAI SWASTA">PEGAWAI SWASTA</option>
                        <option value="PEGAWAI HONORER">PEGAWAI HONORER</option>
                        <option value="PNS">PEGAWAI NEGERI SIPIL(PNS/POLISI/TNI/Dll.)</option>
                </select>
            </div>
            <div class="help-info">Pilih Pekerjaan Ibu Berdasarkan List</div>
        </div>
        <!--//-->
        <!--PENGHASILAN IBU-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Penghasilan Ibu</b></p>
                <select id="editPengIbu" class="form-control show-tick" data-live-search="true" required>
                        <option value="<?php echo $profil['penghasilan_ibu'] ?>">
                            <?php echo $profil['penghasilan_ibu'] ?>
                        </option>
                        <option value="TB/SM">TIDAK BERPENGHASILAN</option>
                        <option value="500000-1000000">Rp.500.000 ~ Rp.1.000.000</option>
                        <option value="1000000-2000000">Rp.1.000.000 ~ Rp.2.000.000</option>
                        <option value="2000000-3000000">Rp.2.000.000 ~ Rp.3.000.000</option>
                        <option value="3000000-4000000">Rp.3.000.000 ~ Rp.4.000.000</option>
                        <option value="4000000-5000000">Rp.4.000.000 ~ Rp.5.000.000</option>
                        <option value=">5000000">Diatas Rp.5.000.000</option>
                </select>
            </div>
            <div class="help-info">Pilih Penghasilan Ibu Berdasarkan List</div>
        </div>
        <!--//-->
        <div class="modal-footer">
            <button type="button" type="submit" id="bntEditSiswa" class="btn bg-blue-grey waves-effect">
                <i class="material-icons">save</i>
                <span>Perbarui</span><span id="loading2"></span>
            </button>
        </div>
    </form>
</div>

