<!-- Data Modal -->
<div class="modal fade" id="editdataAdmin<?= $data->no_idnt ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Pengguna</h4>
            </div>
            <div class="card">
                <div class="modal-body">
                    <!--NAMA ADMIN-->
                        <div class="form-group form-float">
                            <div class="form-line success">
                                <input type="text" class="form-control" maxlength="50" id="namaAdmin<?= $data->no_idnt ?>" minlength="3" value="<?= $data->nama_admin ?>" required>
                                <label class="form-label">Nama Admin*</label>
                            </div>
                            <div class="help-info">Min. 3, Max. 50 Karakter</div>
                        </div>
                    <!--//-->
                    <!--NIK-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <input type="text" maxlength="16" minlength="16" onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                                                name="number" id ="nikAdmin<?= $data->no_idnt ?>" class="form-control" value="<?= $data->no_idnt ?>" disabled>
                            <label class="form-label">Nomor Identitas / NIK*</label>
                        </div>
                        <div class="help-info">Contoh : 3205101507990007</div>
                    </div>
                    <!--//-->
                    <!--NO INDUK-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <input type="text" maxlength="18" minlength="6" onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                                                name="nipAdmin" id="nipAdmin<?= $data->no_idnt ?>" class="form-control" value="<?= $data->no_induk ?>" required>
                            <label class="form-label">NIP/NIY*</label>
                        </div>
                        <div class="help-info">Contoh : 0413011 / 198609262015051001</div>
                    </div>
                    <!--//-->
                    <!--Jenis Kelamin-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <select name="jenisKelamin" id="jkAdmin<?= $data->no_idnt ?>" class="form-control show-tick" required>
                                <option value="<?= $data->jenis_kelamin ?>"><?= $data->jenis_kelamin ?></option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="help-info">
                            Pilih Jenis Kelamin Sesuai List Yang Di Sediakan
                        </div>
                    </div>
                    <!--//-->
                    <!--Tempat Lahir-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <input type="text" class="form-control" name="tempatlahir" maxlength="25" minlength="3" id="tmpLahir<?= $data->no_idnt ?>" value="<?= $data->tempat_lahir ?>" required>
                                <label class="form-label">Tempat Lahir*</label>
                        </div>
                        <div class="help-info">Contoh : Garut / Bandung</div>
                    </div>
                    <!--//-->
                    <!--TANGGAL LAHIR-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <input type="text" id="tglLahirAdmin<?= $data->no_idnt ?>" class="form-control datepicker" placeholder="Tanggal Lahir..." value="<?= $data->tgl_lahir ?>" required>
                        </div>
                    </div>
                    <!--Agama-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <select name="agama" id="agamaAdmin<?= $data->no_idnt ?>" class="form-control show-tick" data-live-search="true" required>
                                <option value="<?= $data->agama ?>"><?= $data->agama ?></option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Budha">Budha</option>
                                <option value="Sesat">Sesat</option>
                            </select>
                        </div>
                        <div class="help-info">
                            Pilih Agama Sesuai List!
                        </div>
                    </div>
                    <!--//-->
                    <!--Tempat Lahir-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <textarea type="text" class="form-control" name="alamatAdmin" maxlength="100" minlength="3" id="alamatAdmin<?= $data->no_idnt ?>"><?= $data->alamat ?></textarea>
                            <label class="form-label">Alamat*</label>
                        </div>
                        <div class="help-info">Contoh : Jl. H. Abdurahman No. 40 Ds. Tanggulun Kec. Kadungora . . . </div>
                    </div>
                    <!--//-->
                    <!--Desa-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <select name="desa" id="desaAdmin<?= $data->no_idnt ?>" class="form-control show-tick" data-live-search="true" required>
                                <option value="<?= $data->desa ?>"><?= $data->desa ?></option>
                                <?php
                                    include "../../../Controller/Other/pilihAlamatDesa.php"; 
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
                        <div class="form-line success">
                            <select name="kecamatan" id="kecAdmin<?= $data->no_idnt ?>" class="form-control show-tick" data-live-search="true" required>
                                <option value="<?= $data->kecamatan ?>"><?= $data->kecamatan ?></option>
                                <?php
                                    include "../../../Controller/Other/pilihAlamatKecamatan.php"; 
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
                        <div class="form-line success">
                            <select name="kota" id="kotaAdmin<?= $data->no_idnt ?>" class="form-control show-tick" data-live-search="true" required>
                                <option value="<?= $data->kabupaten ?>"><?= $data->kabupaten ?></option>
                               <?php
                                    include "../../../Controller/Other/pilihAlamatKota.php"; 
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
                        <div class="form-line success">
                            <select name="prov" id="provAdmin<?= $data->no_idnt ?>" class="form-control show-tick" data-live-search="true" required>
                                <option value="<?= $data->provinsi ?>"><?= $data->provinsi ?></option>
                               <?php
                                    include "../../../Controller/Other/pilihAlamatProvinsi.php"; 
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
                        <div class="form-line success">
                            <input type="text" class="form-control" name="nohp" onkeypress="return inputAngka(event)" maxlength="13" 
                                   minlength="3" id="hpAdmin<?= $data->no_idnt ?>" value="<?= $data->no_telp ?>" required>
                                <label class="form-label">No. Telp/HP/WA*</label>
                        </div>
                        <div class="help-info">Contoh : 081223142314</div>
                    </div>
                    <!--//-->
                    <!--Email-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <input type="email" maxlength="50" minlength="3" id="emailAdmin<?= $data->no_idnt ?>" class="form-control" name="email" value="<?= $data->email ?>" required>
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
                    <button type="button" value="<?= $data->no_idnt ?>" class="btnEditDataPengguna btn bg-teal waves-effect">
                        <i class="material-icons">save</i>
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
