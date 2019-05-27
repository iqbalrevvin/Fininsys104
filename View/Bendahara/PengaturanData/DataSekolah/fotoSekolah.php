
<div class="body">
        <form id="form_advanced_validation" method="POST" enctype="multipart/form-data">
        <!--FOTO SEKOLAH-->
        <h5>Perbarui Foto Sekolah</h5>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="file" name="editFotoSekolah" class="btn bg-teal btn-block btn-sm waves-effect" required>
            </div>
            <div class="help-info">Piih File Foto Lalu Klik Tombol <b>"Perbarui Foto <?php echo $sekolah['nama_sekolah'] ?>"</b></div>
        </div>
            <input type="submit" value="Perbarui Foto <?php echo $sekolah['nama_sekolah'] ?>" name="submitFotoSekolah" 
                    class="btn bg-blue-grey btn-sm waves-effect">
        <!--//-->
        <?php
            if (isset($_POST['submitFotoSekolah'])){ 
            $targetDir          = "Assets/images/sekolah/";
            $nama_file_foto     = $_FILES['editFotoSekolah']['name'];
            $file_foto          = $_FILES['editFotoSekolah']['tmp_name'];
            $acak               = rand(1,99);
            $namaFile           = $acak."-".$nama_file_foto;
            $targetFile         = $targetDir.$namaFile;
            if (!$file_foto==""){
                unlink($targetDir.$sekolah['foto']);
            move_uploaded_file($file_foto,$targetFile);
            // Simpan ke Database
            $updateFotoSekolah    = mysqli_query($db, "UPDATE sekolah SET foto_sekolah='$namaFile' WHERE idSekolah = '1' ") or die ($db->error);
            // Simpan di Folder Gambar
            echo"<script>alert('Foto Sekolah Berhasil Di Perbarui!')</script>";
            echo"<script language='javascript'>document.location.href='?p=SchoolProfile';</script>";
            }else{
                echo"<script>alert('Mohon Pilih Dahulu File !');</script>";
            } 
            } 
        ?>
        </form>
        <hr>
        <form id="form_advanced_validation" method="POST" enctype="multipart/form-data">
        <!--LOGO SEKOLAH-->
        <h5>Perbarui Logo Sekolah</h5>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="file" name="editLogoSekolah" class="btn bg-teal btn-block btn-sm waves-effect" required>
            </div>
            <div class="help-info">Piih File Foto Lalu Klik Tombol <b>"Perbarui Logo <?php echo $sekolah['nama_sekolah'] ?>"</b></div>
        </div>
            <input type="submit" value="Perbarui Logo <?php echo $sekolah['nama_sekolah'] ?>" name="submitLogoSekolah" 
                    class="btn bg-blue-grey btn-sm waves-effect">
        <!--//-->
        <?php
            if (isset($_POST['submitLogoSekolah'])){ 
            $targetDir          = "Assets/images/sekolah/";
            $nama_file_foto     = $_FILES['editLogoSekolah']['name'];
            $file_foto          = $_FILES['editLogoSekolah']['tmp_name'];
            $acak               = rand(1,99);
            $namaFile           = $acak."-".$nama_file_foto;
            $targetFile         = $targetDir.$namaFile;
            if (!$file_foto==""){
                unlink($targetDir.$sekolah['foto']);
            move_uploaded_file($file_foto,$targetFile);
            // Simpan ke Database
            $updateSiswa    = mysqli_query($db, "UPDATE sekolah SET logo_sekolah = '$namaFile' WHERE idSekolah='1' ") or die ($db->error);
            // Simpan di Folder Gambar
                echo"<script>alert('Logo Sekolah Berhasil Di Perbarui!')</script>";
                echo"<script language='javascript'>document.location.href='?p=SchoolProfile';</script>";
            }else{
                echo"<script>alert('Mohon Pilih Dahulu File !');</script>";
            } 
            } 
        ?>
        </form>
        <hr>
        <!--LOGO SEKOLAH-->
        <form id="form_advanced_validation" method="POST" enctype="multipart/form-data">
        <h5>Perbarui Logo Dinas</h5>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="file" name="editLogoDinas" class="btn bg-teal btn-block btn-sm waves-effect" required>
            </div>
            <div class="help-info">Piih File Foto Lalu Klik Tombol <b>"Perbarui Logo Dinas"</b></div>
        </div>
            <input type="submit" value="Perbarui Logo Dinas" name="submitLogoDinas" 
                    class="btn bg-blue-grey btn-sm waves-effect">
        <!--//-->
        <?php
            if (isset($_POST['submitLogoDinas'])){ 
            $targetDir          = "Assets/images/sekolah/";
            $nama_file_foto     = $_FILES['editLogoDinas']['name'];
            $file_foto          = $_FILES['editLogoDinas']['tmp_name'];
            $acak               = rand(1,99);
            $namaFile           = $acak."-".$nama_file_foto;
            $targetFile         = $targetDir.$namaFile;
            if (!$file_foto==""){
                unlink($targetDir.$sekolah['logo_dinas']);
            move_uploaded_file($file_foto,$targetFile);
            // Simpan ke Database
            $updateSiswa    = mysqli_query($db, "UPDATE sekolah SET logo_dinas='$namaFile' WHERE idSekolah='1' ") or die ($db->error);
            // Simpan di Folder Gambar
                echo"<script>alert('Logo Dinas Berhasil Di Perbarui!')</script>";
                echo"<script language='javascript'>document.location.href='?p=SchoolProfile';</script>";
            }else{
                echo"<script>alert('Mohon Pilih Dahulu File !');</script>";
            } 
            } 
        ?>
        <hr><hr>
</form>
</div>