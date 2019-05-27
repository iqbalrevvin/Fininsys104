<div class="modal fade" id="modalAddSiswa" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
<!-- Advanced Form Example With Validation -->
<!-- Advanced Validation -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>TAMBAH SISWA (Data Wajib Siswa)</h2>
                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" method="POST">
                                <!--NAMA SISWA-->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" 
                                                name="" maxlength="50" id="namaSiswa" minlength="3" required>
                                        <label class="form-label">Nama Siswa*</label>
                                    </div>
                                    <div class="help-info">Min. 3, Max. 50 Karakter</div>
                                </div>
                                <!--//-->

                                <!--Jenis Kelamin-->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="jenisKelamin" id="jenisKelamin" 
                                                class="form-control show-tick" data-live-search="true" required>
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

                                <!--NIK-->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" maxlength="16" minlength="16" 
                                                onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                                                name="number" id="nikSiswa" class="form-control" required>
                                        <label class="form-label">Nomor Identitas / NIK*</label>
                                    </div>
                                    <div class="help-info">Contoh : 3205101507990007</div>
                                </div>
                                <!--//-->

                                <!--NISN-->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" maxlength="10" minlength="10" 
                                                onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                                                name="nisn" id="nisnSiswa" class="form-control" required>
                                        <label class="form-label">NISN(Nomor Induk Standar Nasional)*</label>
                                    </div>
                                    <div class="help-info">Contoh : 9992051371</div>
                                </div>
                                <!--//-->

                                <!--NIPD-->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" maxlength="9" minlength="9" 
                                                onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                                                name="nipd" id ="nipdSiswa" class="form-control" required>
                                        <label class="form-label">NIPD(Nomor Induk Peserta Didik)*</label>
                                    </div>
                                    <div class="help-info">Contoh : 161710123</div>
                                </div>
                                <!--//-->

                                <!--Tanggal Masuk Sekolah-->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="tglMasukSiswa" name="date" required>
                                        <label class="form-label">Tanggal Masuk Sekolah*</label>
                                    </div>
                                    <div class="help-info">YYYY-MM-DD format | Contoh : 2015-07-20</div>
                                </div>
                                <!--//-->

                                <!--Program Studi-->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="text" id="prodiSiswa" class="form-control show-tick" 
                                                data-live-search="true" required>
                                            <option value="">--Kelas*--</option>
                                                <?php 
                                                    include "Controller/Other/daftarKelasQuery.php";
                                                    while($kelas = mysqli_fetch_array($daftarKelas)){
                                                        echo "<option value='$kelas[nama_kelas]'>
                                                            $kelas[nama_jurusan] | $kelas[nama_kelas]</option>";
                                                }
                                                ?>
                                        </select>
                                        <label class="form-label">Program Studi</label>
                                    </div>
                                    <div class="help-info">Pilih Kelas Berdasarkan List</div>
                                </div>
                                <!--//-->

                                <!--Tempat Lahir-->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="tempatlahir" 
                                                maxlength="25" minlength="3" id="tmtmpLahirSiswa" required>
                                        <label class="form-label">Tempat Lahir*</label>
                                    </div>
                                    <div class="help-info">Contoh : Garut</div>
                                </div>
                                <!--//-->

                                <!--Tanggal Lahir-->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="date" class="form-control" 
                                                name="date" id="tglLahirSiswa" required>
                                        <label class="form-label">Tanggal Lahir*</label>
                                    </div>
                                    <div class="help-info">YYYY-MM-DD format | Contoh : 2001-06-03</div>
                                </div>
                                <!--//-->

                                <!--Agama-->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="agama" id="agamaSiswa" 
                                                class="form-control show-tick" data-live-search="true" required>
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
                                        Pilih Agama Sesuai List, Jika Agama Sesat Langsung keluarkan Siswa/i Tersebut
                                    </div>
                                </div>
                                <!--//-->

                                <!--Alamat-->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="alamat" maxlength="100" 
                                                minlength="3" id="alamatSiswa" required>
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
                                        <select name="desa" id="desaSiswa" 
                                                class="form-control show-tick" data-live-search="true" required>
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
                                    <div class="form-line">
                                        <select name="kecamatan" id="kecSiswa" 
                                                class="form-control show-tick" data-live-search="true" required>
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
                                    <div class="form-line">
                                        <select name="kota" id="kotaSiswa" 
                                                class="form-control show-tick" data-live-search="true" required>
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
                                    <div class="form-line">
                                        <select name="prov" id="provSiswa" 
                                                class="form-control show-tick" data-live-search="true" required>
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
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nohp" 
                                                onkeypress="return inputAngka(event)" maxlength="13" 
                                                minlength="3" id="hpSiswa" required>
                                        <label class="form-label">No. Telp/HP/WA*</label>
                                    </div>
                                    <div class="help-info">Contoh : 081223142314</div>
                                </div>
                                <!--//-->

                                <!--Email-->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" id="emailSiswa" class="form-control" name="email">
                                        <label class="form-label">Email</label>
                                    </div>
                                    <div class="help-info">Contoh : iqbal.revvin@gmail.com</div>
                                </div>
                                <!--//-->

                                <!--PIP-->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="pip" id="pipSiswa"
                                                class="form-control show-tick" data-live-search="true" required>
                                                <option value="">--Menerima PIP--</option>
                                                <option value="YA">YA</option>
                                                <option value="TIDAK">TIDAK</option>
                                        </select>
                                        <label class="form-label">Kabupaten</label>
                                    </div>
                                    <div class="help-info">Pilih "YA" atau "TIDAK"</div>
                                </div>
                                <!--//-->
                                <hr>
                                <div class="modal-footer">
                                <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                                </button>
                                <button type="button" type="submit" id="bntAddSiswa" class="btn bg-blue-grey waves-effect">
                                        <i class="material-icons">save</i>
                                        <span>Simpan</span>
                                </button>
                                </div>
                         </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Validation -->
            
        </div>
    </div>

