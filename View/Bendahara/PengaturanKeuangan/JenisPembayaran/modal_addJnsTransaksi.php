<!-- Data Modal -->
<div class="modal fade" id="addJnsTransaksi" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Jenis Transaksi</h4>
            </div>
            <div class="card">
                <div class="body">

                     <!--SETTING MASTER TRANSAKSI-->
                    <div class="input-group">
                        <div class="form-line">
                            <select name="idMasterTrans" class="selectpicker" id="idMasterTrans" data-live-search="true" required>
                                    <option value=''>--Pilih Master Transaksi--</option>
                                    <?php 
                                        include "../../../../Controller/Other/pilih_master_transaksi.php";
                                        while($master = $master_transaksi_qr->fetch_object()){
                                            echo "<option value='$master->idMaster_transaksi' data-subtext='$master->tahun_angkatan'>
                                                $master->nama_master_transaksi || $master->nama_jurusan
                                    </option>";
                                        }
                                    ?>
                            </select>
                        </div>
                        <span class="input-group-addon">Master Transaksi*</span>
                    </div>
                    <!--SETTING TIPE TRANSAKSI-->
                    <div class="input-group">
                        <div class="form-line">
                            <select id="tipeJenisTransaksi" class="selectpicker" data-live-search="true" required>
                                <option value="">
                                    Tipe Jenis Transaksi
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
                            <input type="text" class="form-control" maxlength="4" id="kdTransaksi" 
                                        minlength="2" placeholder="Contoh: UTS1, PRK1, SPP1" required>
                        </div>
                        <span class="input-group-addon">Kode Transaksi*</span>
                    </div>

                    <!--NAMA TRANSAKSI-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" maxlength="50" id="namaTransaksi" 
                                   minlength="2" placeholder="Contoh: Praktikum 1, Praktikum 1, UTS 1" required>
                        </div> 
                        <span class="input-group-addon">Nama Transaksi*</span>
                    </div>
                    <!--SETTING SEMESTER-->
                    <div class="input-group">
                        <div class="form-line">
                            <select id="semesterTransaksi" class="selectpicker" data-live-search="true" required>
                                <option value="">
                                    Setting Di Semester
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
                    <!--SETTING JUMLAH KEWAJIBAN-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" onkeypress="return inputAngka(event)" pattern="[0-9]+" class="form-control" maxlength="8" 
                                       id="kewajiban" placeholder="Masukan Hanya Angka | Contoh: 100000" minlength="4" required>
                        </div>
                        <span class="input-group-addon">Jml Kewajiban*</span>
                    </div>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" class="form-control" maxlength="75" 
                                       id="keteranganTransaksi" minlength="2" placeholder="Contoh: Ujian Tengah Semester 1 / Kewajiban Di Semester 1" required>
                            </div>
                            <span class="input-group-addon">Keterangan*</span>
                        </div>
                        <!--//-->
                        <div class="modal-footer">
                        <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                                </button>
                            <button type="button" id="bntAddJnsTransaksi" class="btn bg-blue-grey waves-effect">
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

