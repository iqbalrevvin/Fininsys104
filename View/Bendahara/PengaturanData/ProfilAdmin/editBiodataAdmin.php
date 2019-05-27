
<div class="body">
    <form id="form_advanced_validation" method="POST" enctype="multipart/form-data">
            <!--NAMA SISWA-->
    <input type="hidden" value="<?php echo $admin['idAdmin'] ?>" class="form-control" maxlength="50" id="idAdmin" minlength="3" required>
         <!--//-->

        <!--NAMA SISWA-->
        <h5>Perbarui Foto</h5>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="file" name="editFotoAdmin" class="btn bg-teal btn-block btn-sm waves-effect" required>
            </div>
            <div class="help-info">Piih File Foto Lalu Klik Tombol <b>"Perbarui Foto <?php echo $admin['nama_admin'] ?>"</b></div>
        </div>
            <input type="submit" value="Perbarui Foto <?php echo $admin['nama_admin'] ?>" name="submitEditFoto" 
                    class="btn bg-blue-grey btn-sm waves-effect">
        <!--//-->
        <?php
            if (isset($_POST['submitEditFoto'])){ 
            $targetDir          = "Assets/images/admin/";
            $nama_file_foto     = $_FILES['editFotoAdmin']['name'];
            $file_foto          = $_FILES['editFotoAdmin']['tmp_name'];
            $acak               = rand(1,99);
            $namaFile           = $acak."-".$nama_file_foto;
            $targetFile         = $targetDir.$namaFile;
            if (!$file_foto==""){
                unlink($targetDir.$admin['foto']);
            move_uploaded_file($file_foto,$targetFile);
            // Simpan ke Database
            $updateFoto    = mysqli_query($db, "UPDATE users SET foto='$namaFile' WHERE no_idnt='$admin[no_idnt]' ") or die ($db->error);
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
                <input type="text" name="editNamaAdmin" value="<?php echo $admin['nama_admin'] ?>" class="form-control" maxlength="50" id="editNamaAdmin" minlength="3" required>
                <label class="form-label">Nama Admin*</label>
            </div>
            <div class="help-info">Min. 3, Max. 50 Karakter</div>
        </div>
        <!--//-->

        <!--Jenis Kelamin-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Jenis Kelamin</b></p>
                <select id="editJenisKelamin" class="form-control show-tick" data-live-search="true" required>
                        <option value="<?php echo $admin['jenis_kelamin'] ?>"><?php echo $admin['jenis_kelamin'] ?></option>
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
                <input type="text" value="<?php echo $admin['no_idnt'] ?>" maxlength="16" minlength="16" 
                       onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                       name="number" id="editNikAdmin" class="form-control" disabled>
                <label class="form-label">Nomor Identitas / NIK*</label>
            </div>
            <div class="help-info">(Untuk Perubahan Identitas Terdapat Pada Bagian <b>Akun</b>)Contoh : 3205101507990007</div>
        </div>
        <!--//-->

        <!--NISN-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" maxlength="10" minlength="10" onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                                   name="editNipAdmin" id="editNipAdmin" class="form-control" 
                                   value="<?php echo $admin['no_induk'] ?>" required>
                <label class="form-label">No. Induk*</label>
            </div>
            <div class="help-info">Contoh : 0413012</div>
        </div>
        <!--//-->

        <!--Tempat Lahir-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" maxlength="25" minlength="3" 
                        id="editTmpLahirAdmin" value="<?php echo $admin['tempat_lahir'] ?>" required>
                <label class="form-label">Tempat Lahir*</label>
            </div>
            <div class="help-info">Contoh : Garut</div>
        </div>
        <!--//-->

        <!--Tanggal Lahir-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" name="date" class="form-control" name="date" 
                       id="editTglLahirAdmin" value="<?php echo $admin['tgl_lahir'] ?>" required>
                <label class="form-label">Tanggal Lahir*</label>
            </div>
            <div class="help-info">YYYY-MM-DD format | Contoh : 2001-06-03</div>
        </div>
        <!--//-->

        <!--Agama-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Agama</b></p>
                <select name="agama" id="editAgamaAdmin" class="form-control show-tick" 
                        data-live-search="true" required>
                        <option value="<?php echo $admin['agama'] ?>"><?php echo $admin['agama'] ?></option>
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
                       minlength="3" id="editAlamatAdmin" value="<?php echo $admin['alamat'] ?>" required>
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
                <select id="editDesaAdmin" class="form-control show-tick" data-live-search="true" required>
                        <option value="<?php echo $admin['desa'] ?>"><?php echo $admin['desa'] ?></option>
                        <option value="Tanggulun">Tanggulun</option>
                        <option value="Mekar Bakti">Mekar Bakti</option>
                        <option value="Cigadog">Cigadog</option>
                        <option value="Harumansari">Harumansari</option>
                        <option value="Cibiuk">Cibiuk</option>  
                        <option value="Cibiuk">Kadungora</option>
                </select>
            </div>
            <div class="help-info">Pilih Desa Berdasarkan List</div>
        </div>
        <!--//-->

        <!--Kecamatan-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Kecamatan</b></p>
                <select id="editKecAdmin" class="form-control show-tick" data-live-search="true" required>
                        <option value="<?php echo $admin['kecamatan'] ?>"><?php echo $admin['kecamatan'] ?></option>
                        <option value="Kadungora">Kadungora</option>
                        <option value="Leles">Leles</option>
                        <option value="Nagreg">Nagreg</option>
                        <option value="Cibiuk">Cibiuk</option>
                </select>
            </div>
            <div class="help-info">Pilih Kecamatan Berdasarkan List</div>
        </div>
        <!--//-->

        <!--Kab/Kota-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Kabupaten</b></p>
                <select id="editKotaAdmin" class="form-control show-tick" data-live-search="true" required>
                        <option value="<?php echo $admin['kabupaten'] ?>"><?php echo $admin['kabupaten'] ?></option>
                        <option value="Garut">Garut</option>
                        <option value="Bandung">Bandung</option>
                </select>
            </div>
            <div class="help-info">Pilih Kabupaten Berdasarkan List</div>
        </div>
        <!--//-->

        <!--Provinsi-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Provinsi</b></p>
                <select id="editProvAdmin" class="form-control show-tick" 
                        data-live-search="true" required>
                        <option value="<?php echo $admin['provinsi'] ?>"><?php echo $admin['provinsi'] ?></option>
                        <option value="Jawa Barat">Jawa Barat</option>
                </select>
            </div>
            <div class="help-info">Pilih Provinsi Berdasarkan List</div>
        </div>
        <!--//-->

        <!--HP/WA-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" name="number" class="form-control" onkeypress="return inputAngka(event)" 
                        maxlength="13" minlength="3" id="editHpAdmin" value="<?php echo $admin['no_telp'] ?>" required>
                <label class="form-label">No. Telp/HP/WA*</label>
            </div>
            <div class="help-info">Contoh : 081223142314</div>
        </div>
        <!--//-->

        <!--Email-->
        <div class="form-group form-float">
            <div class="form-line">

                <input type="email" id="editEmailAdmin" value="<?php echo $admin['email'] ?>" class="form-control">
                <label class="form-label">Email</label>
            </div>
            <div class="help-info">Contoh : iqbal.revvin@gmail.com</div>
        </div>
        <!--//-->

        <div class="modal-footer">
            <button type="button" type="submit" id="bntEditAdmin" class="btn bg-blue-grey waves-effect">
                <i class="material-icons">save</i>
                <span>Perbarui</span><span id="loading2"></span>
            </button>
        </div>
    </form>
</div>

