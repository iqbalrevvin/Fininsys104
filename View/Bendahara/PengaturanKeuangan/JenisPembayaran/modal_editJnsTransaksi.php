<!-- Data Modal -->
<div class="modal fade " id="editJnsTransaksi<?php echo $dftJns['idJenis_transaksi'] ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Perbarui Jenis Transaksi</h4>
            </div>
            <div class="card">
                <div class="body">
                    <form method="POST">
                    <!--SETTING MASTER TRANSAKSI-->
                    <div class="input-group">
                        <div class="form-line">
                            <select id="idMasterTrans<?php echo $dftJns['idJenis_transaksi'] ?>" class="selectpicker" data-live-search="true" required>
                                    <option value="<?php echo $dftJns['idMaster_transaksi'] ?>">
                                        <?php echo $dftJns['nama_master_transaksi'] ?> || <?= $dftJns['nama_jurusan'] ?> || <?= $dftJns['tahun_angkatan'] ?>
                                    </option>
                                        <?php 
                                        include "../../../../Controller/Other/pilih_master_transaksi.php";
                                        while($master = mysqli_fetch_array($master_transaksi_qr)){
                                            echo "<option value='$master[idMaster_transaksi]' data-subtext='$master[tahun_angkatan]'>
                                                $master[nama_master_transaksi] || $master[nama_jurusan]
                                    </option>";
                                            /*echo "  <option value='$dafsis[no_idnt]'>
                                                $dafsis[nama_siswa] | $dafsis[nipd] | $dafsis[no_idnt]
                                    </option> ";*/
                                        }
                                    ?>
                            </select>
                        </div>
                        <span class="input-group-addon">Master Transaksi*</span>
                    </div>

                    <!--SETTING TIPE TRANSAKSI-->
                    <div class="input-group">
                        <div class="form-line">
                            <select id="tipeJenisTransaksi<?= $dftJns['idJenis_transaksi'] ?>" class="selectpicker" data-live-search="true" required>
                                <option value="<?= $dftJns['tipe_jenis_transaksi'] ?>">
                                    <?= $dftJns['tipe_jenis_transaksi'] ?>
                                </option>
                                <option value="REGULER">REGULER</option>
                                <option value="KHUSUS">KHUSUS</option>
                            </select>
                        </div>
                        <span class="input-group-addon">Tipe Jenis Transaksi*</span>
                    </div>
                    <!--KODE TRANSAKSI-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" value="<?php echo $dftJns['kd_transaksi'] ?>" class="form-control" maxlength="4" 
                                        id="kdTransaksi<?php echo $dftJns['idJenis_transaksi'] ?>" 
                                        minlength="2" placeholder="Contoh: UTS1, PRK1, SPP1" required>
                        </div>
                        <span class="input-group-addon">Kode Transaksi*</span>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" value="<?php echo $dftJns['nama_jenis_transaksi'] ?>" class="form-control" maxlength="50" 
                                       id="namaTransaksi<?php echo $dftJns['idJenis_transaksi'] ?>" 
                                       minlength="2" placeholder="Contoh: Praktikum 1, Praktikum 1, UTS 1" required>
                        </div> 
                        <span class="input-group-addon">Nama Transaksi*</span>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            <select id="semesterTransaksi<?php echo $dftJns['idJenis_transaksi'] ?>" class="selectpicker" 
                                     data-live-search="true" required>
                                <option value="<?php echo $dftJns['set_semester'] ?>">
                                    Setting Di Semester <?php echo $dftJns['set_semester'] ?>
                                </option>
                                <option value="1">Setting Di Semester 1</option>
                                <option value="2">Setting Di Semester 2</option>
                                <option value="3">Setting Di Semester 3</option>
                                <option value="4">Setting Di Semester 4</option>
                                <option value="5">Setting Di Semester 5</option>
                                <option value="6">Setting Di Semester 6</option>
                                <option value="7">Setting Di Semester 7</option>
                                <option value="8">Setting Di Semester 8</option>
                                <option value="9">Setting Di Semester 9</option>
                                <option value="10">Setting Di Semester 10</option>
                                <option value="11">Setting Di Semester 11</option>
                                <option value="12">Setting Di Semester 12</option>
                                <option value="13">Setting Di Semester 13</option>
                                <option value="14">Setting Di Semester 14</option>
                            </select>
                        </div>
                        <span class="input-group-addon">Sett Di Semester*</span>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                                       value="<?php echo $dftJns['kewajiban'] ?>" class="form-control" maxlength="8" 
                                       id="kewajiban<?php echo $dftJns['idJenis_transaksi'] ?>" 
                                       placeholder="Masukan Hanya Angka | Contoh: 100000" minlength="4" required>
                        </div>
                        <span class="input-group-addon">Jml Kewajiban*</span>
                    </div>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" value="<?php echo $dftJns['keterangan_transaksi'] ?>" class="form-control" maxlength="75" 
                                       id="keteranganTransaksi<?php echo $dftJns['idJenis_transaksi'] ?>" 
                                       minlength="2" placeholder="Contoh: Kewajiban Di Semester 1" required>
                            </div>
                            <span class="input-group-addon">Keterangan*</span>
                        </div>
                        <!--//-->
                        <div class="modal-footer">
                            <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                            </button>
                            <button type="button" value="<?php echo $dftJns['idJenis_transaksi'] ?>" 
                                    class="editJenisTransaksi btn bg-teal waves-effect">
                                <i class="material-icons">save</i>
                                <span>Perbarui</span>
                            </button>
                            <button type="button" value="<?php echo $dftJns['idJenis_transaksi'] ?>" 
                                    class="simpanJenisTransaksi btn bg-orange waves-effect">
                                <i class="material-icons">save</i>
                                <span>Tambahkan Baru</span>
                            </button>
                        </div>
                        <span class="font-bold font-11">
                            *Simpan baru berfungsi untuk menjadikan hasil perubahan sebagai data jenis transaksi baru
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

