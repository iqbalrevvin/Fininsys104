<!-- Data Modal -->
<div class="modal fade" id="addMasterTransaksi" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Master Transaksi</h4>
            </div>
            <div class="card">
                <div class="body">
                    <!--NAMA MASTER TRANSAKSI-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" maxlength="50" id="namaMasterTransaksi" 
                                        minlength="2" placeholder="Contoh: SPP-SD-2018, SPP-TK-2018, Dll." required>
                        </div>
                        <span class="input-group-addon">Nama Master Transaksi*</span>
                    </div>
                    <!--Program Studi-->
                    <div class="input-group">
                        <div class="form-line">
                            <select class="selectpicker" name="programStudi" id="programStudi" data-live-search="true" required>
                                    <option value=''>--Pilih Program Studi--</option>
                                    <?php 
                                        include "../../../../Controller/Other/daftarJurusanQuery.php";
                                        while($prodi = $daftarJurusan->fetch_object()){
                                            echo "<option value='$prodi->idJurusan'>
                                                $prodi->nama_jurusan
                                    </option>";
                                        }
                                    ?>
                            </select>
                        </div>
                        <span class="input-group-addon">Program Studi*</span>
                    </div>
                    <!--//-->
                    <!--Tahun Angkatan-->
                    <div class="input-group">
                        <div class="form-line">
                            <select class="selectpicker" name="thnAngkatan" id="thnAngkatan" data-live-search="true" required>
                                <option value=''>--Pilih Tahun Angkatan--</option>
                                    <?php
                                        $thn_skr = date('Y');
                                        for ($x = $thn_skr; $x >= 2010; $x--) {
                                            ?>
                                                <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                            <?php
                                        }
                                    ?>
                            </select>
                        </div>
                        <span class="input-group-addon">Tahun Angkatan*</span>
                    </div>
                    <!--//-->
                        <!--//-->
                        <div class="modal-footer">
                        <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                                </button>
                            <button type="button" id="bntAddMasterTransaksi" class="btn bg-blue-grey waves-effect">
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

