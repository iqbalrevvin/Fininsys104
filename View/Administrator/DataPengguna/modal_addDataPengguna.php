<!-- Data Modal -->
<div class="modal fade" id="AddDataPengguna" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Pengguna</h4>
            </div>
            <div class="card">
                <div class="modal-body">
                    <!--NAMA ADMIN-->
                        <div class="form-group form-float">
                            <div class="form-line success">
                                <input type="text" class="form-control" name="namaAdmin" maxlength="50" id="namaAdmin" minlength="3" required>
                                <label class="form-label">Nama Admin*</label>
                            </div>
                            <div class="help-info">Min. 3, Max. 50 Karakter</div>
                        </div>
                    <!--//-->
                    <!--NIK-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <input type="text" maxlength="16" minlength="16" onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                                                name="number" id ="nikAdmin" class="form-control" required>
                            <label class="form-label">Nomor Identitas / NIK*</label>
                        </div>
                        <div class="help-info">Contoh : 3205101507990007</div>
                    </div>
                    <!--//-->
                    <!--NO INDUK-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <input type="text" maxlength="18" minlength="6" onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                                                name="nipAdmin" id="nipAdmin" class="form-control" required>
                            <label class="form-label">NIP/NIY*</label>
                        </div>
                        <div class="help-info">Contoh : 0413011 / 198609262015051001</div>
                    </div>
                    <!--//-->
                    <!--Jenis Kelamin-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <select name="jenisKelamin" id="jkAdmin" class="form-control show-tick" required>
                                <option value="">--Jenis Kelamin*--</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <label class="form-label">Jenis Kelamin</label>
                        </div>
                        <div class="help-info">
                            Pilih Jenis Kelamin Sesuai List Yang Di Sediakan
                        </div>
                    </div>
                    <!--//-->
                    <!--Tempat Lahir-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <input type="text" class="form-control" name="tempatlahir" maxlength="25" minlength="3" id="tmpLahir" required>
                                <label class="form-label">Tempat Lahir*</label>
                        </div>
                        <div class="help-info">Contoh : Garut / Bandung</div>
                    </div>
                    <!--//-->
                    <!--TANGGAL LAHIR-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <input type="text" id="tglLahirAdmin" class="form-control datepicker" placeholder="Tanggal Lahir..." required>
                        </div>
                    </div>
                    <!--Agama-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <select name="agama" id="agamaAdmin" class="form-control show-tick" data-live-search="true" required>
                                <option value="">--Agama*--</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katolik">Katolik</option>
                                <option value="budha">Budha</option>
                                <option value="sesat">Sesat</option>
                            </select>
                            <label class="form-label">Agama</label>
                        </div>
                        <div class="help-info">
                            Pilih Agama Sesuai List!
                        </div>
                    </div>
                    <!--//-->
                    <!--Tempat Lahir-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <textarea type="text" class="form-control" name="alamatAdmin" maxlength="100" minlength="3" id="alamatAdmin" required></textarea>
                            <label class="form-label">Alamat*</label>
                        </div>
                        <div class="help-info">Contoh : Jl. H. Abdurahman No. 40 Ds. Tanggulun Kec. Kadungora . . . </div>
                    </div>
                    <!--//-->
                    <!--Desa-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                             <select name="desa" id="desaAdmin" class="form-control show-tick" data-live-search="true" required>
                                    <option value="">--Desa--</option>
                                        <?php
                                            include "Controller/Other/pilihAlamatDesa.php"; 
                                            while($desa = $dataDesa->fetch_object()): 
                                        ?>
                                    <option value="<?= $desa->nama_desa ?>"><?= $desa->nama_desa ?></option>
                                        <?php endwhile; ?>
                            </select>
                            <label class="form-label">Desa</label>
                        </div>
                        <div class="help-info">Pilih Desa Berdasarkan List</div>
                    </div>
                    <!--//-->
                    <!--Kecamatan-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <select name="kecamatan" id="kecAdmin" class="form-control show-tick" data-live-search="true" required>
                                <option value="">--Kecamatan--</option>
                                <?php
                                    include "Controller/Other/pilihAlamatKecamatan.php"; 
                                    while($kec = $dataKecamatan->fetch_object()): 
                                ?>
                                    <option value="<?= $kec->nama_kecamatan ?>"><?= $kec->nama_kecamatan ?></option>
                                <?php endwhile; ?>
                            </select>
                            <label class="form-label">Kecamatan</label>
                        </div>
                        <div class="help-info">Pilih Kecamatan Berdasarkan List</div>
                    </div>
                    <!--//-->
                    <!--Kab/Kota-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <select name="kota" id="kotaAdmin" class="form-control show-tick" data-live-search="true" required>
                                <option value="">--Kota/Kabupaten--</option>
                                <?php
                                    include "Controller/Other/pilihAlamatKota.php"; 
                                    while($kota = $dataKota->fetch_object()): 
                                ?>
                                <option value="<?= $kota->nama_kota ?>"><?= $kota->nama_kota ?></option>
                                <?php endwhile; ?>
                            </select>
                            <label class="form-label">Kabupaten</label>
                        </div>
                        <div class="help-info">Pilih Kabupaten Berdasarkan List</div>
                    </div>
                    <!--//-->
                    <!--Provinsi-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <select name="prov" id="provAdmin" class="form-control show-tick" data-live-search="true" required>
                                <option value="">--Provinsi--</option>
                                    <?php
                                        include "Controller/Other/pilihAlamatProvinsi.php"; 
                                        while($prov = $dataProvinsi->fetch_object()): 
                                    ?>
                                <option value="<?= $prov->nama_provinsi ?>"><?= $prov->nama_provinsi ?></option>
                                    <?php endwhile; ?>
                            </select>
                            <label class="form-label">Provinsi</label>
                        </div>
                        <div class="help-info">Pilih Provinsi Berdasarkan List</div>
                    </div>
                    <!--//-->
                    <!--HP/WA-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <input type="text" class="form-control" name="nohp" onkeypress="return inputAngka(event)" maxlength="13" 
                                   minlength="3" id="hpAdmin" required>
                                <label class="form-label">No. Telp/HP/WA*</label>
                        </div>
                        <div class="help-info">Contoh : 081223142314</div>
                    </div>
                    <!--//-->
                    <!--Email-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <input type="email" maxlength="50" minlength="3" id="emailAdmin" class="form-control" name="email">
                            <label class="form-label">Email</label>
                        </div>
                        <div class="help-info">Contoh : iqbal.revvin@gmail.com</div>
                    </div>
                    <!--//-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                        <i class="material-icons">clear</i>
                        <span>Tutup</span>
                    </button>
                    <button type="submit" name="btnAddDataPengguna" id="btnAddDataPengguna" class="btn bg-teal waves-effect">
                        <i class="material-icons">save</i>
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
