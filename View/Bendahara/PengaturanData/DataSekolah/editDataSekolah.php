
<div class="body">
    <form id="form_advanced_validation" method="POST" enctype="multipart/form-data">
            <!--NAMA SISWA-->
            
        <!--NAMA SEKOLAH-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" value="<?php echo $sekolah['nama_sekolah'] ?>" class="form-control" maxlength="50" id="editNamaSekolah" minlength="3" required>
                <label class="form-label">Nama Sekolah*</label>
            </div>
            <div class="help-info">Min. 3, Max. 50 Karakter</div>
        </div>
        <!--//-->

        <!--NAMA YAYASAN-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" value="<?php echo $sekolah['nama_yayasan'] ?>" class="form-control" maxlength="100" id="editNamaYayasan" minlength="3" required>
                <label class="form-label">Nama Yayasan*</label>
            </div>
            <div class="help-info">Min. 3, Max. 100 Karakter</div>
        </div>
        <!--//-->

        <!--NPSN-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="number" value="<?php echo $sekolah['npsn'] ?>" maxlength="8" minlength="8" 
                       onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                       id="editNPSN" class="form-control" rquired>
                <label class="form-label">NPSN / Nomor Pokok Sekolah Nasional*</label>
            </div>
            <div class="help-info">Contoh : 69753308</div>
        </div>
        <!--//-->

        <!--AKREDITASI-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" value="<?php echo $sekolah['akreditasi'] ?>" class="form-control" maxlength="1" id="editAkreditasi" minlength="1" pattern="[A-Z]+" required>
                <label class="form-label">Akreditasi*</label>
            </div>
            <div class="help-info">Contoh : "B"</div>
        </div>
        <!--//-->

        <!-- NO SK AKREDITASI-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" value="<?php echo $sekolah['no_sk_akreditasi'] ?>" class="form-control" maxlength="50" id="editSKAkreditasi" minlength="10" required>
                <label class="form-label">No. SK Akreditasi*</label>
            </div>
            <div class="help-info">Contoh : 02.00/443/BAP-SM/SK/XII/2014</div>
        </div>
        <!--//-->

        <!--JENJANG SEKOLAH-->
        <div class="form-group form-float">
            <div class="form-line">
                <p><b>Jenjang</b></p>
                <select id="editJenjang" class="form-control show-tick" 
                        data-live-search="true" required>
                        <option value="<?php echo $sekolah['jenjang'] ?>"><?php echo $sekolah['jenjang'] ?></option>
                        <option value="SD">Sekolah Dasar(SD)</option>
                        <option value="SMP">Sekolah Menengah Pertama(SMP)</option>
                        <option value="SMA">Sekolah Menengah Atas(SMA)</option>
                        <option value="SMK">Sekolah Menengah Kejuruan(SMK)</option>
                        <option value="SLB">Sekolah Luar Biasa(SLB)</option>
                </select>
            </div>
            <div class="help-info">
                Pilih Jenjang Sesuai List
            </div>
        </div>
        <!--//-->

        <!--Tahun Berdiri-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="number" maxlength="4" minlength="4" onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                                    id="editTahunBerdiri" class="form-control" 
                                   value="<?php echo $sekolah['tahun_berdiri'] ?>" required>
                <label class="form-label">Tahun Berdiri*</label>
            </div>
            <div class="help-info">Contoh : 2011</div>
        </div>
        <!--//-->

        <!--Provinsi-->
        <div class="form-group form-float">
            <div class="form-line">
            <p><b>Provinsi</b></p>
                <select name="prov" id="editProvSekolah" class="form-control show-tick" data-live-search="true" required>
                    <option value="<?= $sekolah['provinsi_sekolah'] ?>">
                        <?= $sekolah['provinsi_sekolah'] ?>
                    </option>
                    <?php
                    include "Controller/Other/pilihAlamatProvinsi.php"; 
                    while($prov = $dataProvinsi->fetch_object()): 
                    ?>
                    <option value="<?= $prov->nama_provinsi ?>"><?= $prov->nama_provinsi ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="help-info">Pilih Provinsi Berdasarkan List</div>
        </div>
        <!--//-->

        <!--Kab/Kota-->
        <div class="form-group form-float">
            <div class="form-line">
            <p><b>Kabupaten/Kota</b></p>
                <select name="kota" id="editKabSekolah" class="form-control show-tick" data-live-search="true" required>
                    <option value="<?= $sekolah['kabupaten_sekolah'] ?>">
                        <?= $sekolah['kabupaten_sekolah'] ?>
                    </option>
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

       <!--Kecamatan-->
        <div class="form-group form-float">
            <div class="form-line">
            <p><b>Kecamatan</b></p>
                <select name="kecamatan" id="editKecSekolah" class="form-control show-tick" data-live-search="true" required>
                    <option value="<?= $sekolah['kecamatan_sekolah'] ?>">
                        <?= $sekolah['kecamatan_sekolah'] ?>
                    </option>
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

        <!--Desa-->
        <div class="form-group form-float">
            <div class="form-line">
            <p><b>Kecamatan</b></p>
                <select name="desa" id="editDesaSekolah" class="form-control show-tick" data-live-search="true" required>
                    <option value="<?= $sekolah['desa_sekolah'] ?>">
                        <?= $sekolah['desa_sekolah'] ?>
                    </option>
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

        <!--KODE POS-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="number" value="<?php echo $sekolah['kode_pos'] ?>" maxlength="5" minlength="5" 
                       onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                       id="editKodePos" class="form-control">
                <label class="form-label">Kode POS*</label>
            </div>
            <div class="help-info">Contoh : 44153</div>
        </div>
        <!--//-->

        <!--Alamat-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" maxlength="100" 
                       minlength="3" id="editAlamatSekolah" value="<?php echo $sekolah['alamat_sekolah'] ?>" required>
                <label class="form-label">Alamat*</label>
            </div>
            <div class="help-info">
                Contoh : Jl. H. Abdurahman No. 40 / Kp. Tanggulun RT 001/RW 003
            </div>
        </div>
        <!--//-->

         <!--Email-->
        <div class="form-group form-float">
            <div class="form-line">

                <input type="email" id="editEmailSekolah" value="<?php echo $sekolah['email_sekolah'] ?>" class="form-control">
                <label class="form-label">Email</label>
            </div>
            <div class="help-info">Contoh : smkikakartika@gmail.com</div>
        </div>
        <!--//-->

        <!--HP/WA-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" name="number" class="form-control" onkeypress="return inputAngka(event)" 
                        maxlength="13" minlength="3" id="editHpSekolah" value="<?php echo $sekolah['telp_sekolah'] ?>" required>
                <label class="form-label">No. Telp Sekolah*</label>
            </div>
            <div class="help-info">Contoh : 081223142314</div>
        </div>
        <!--//-->

         <!--Email-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="url" id="editWebSekolah" value="<?php echo $sekolah['website_sekolah'] ?>" class="form-control">
                <label class="form-label">Alamat Website</label>
            </div>
            <div class="help-info">Awali Dengan : http://, https://, ftp:// Dsb. Contoh : https://smkikakartika.sch.id</div>
        </div>
        <!--//-->

       

        <div class="modal-footer">
            <button type="button" type="submit" id="btnEditSekolah" class="btn bg-blue-grey waves-effect">
                <i class="material-icons">save</i>
                <span>Perbarui</span><span id="loading2"></span>
            </button>
        </div>
    </form>
</div>

