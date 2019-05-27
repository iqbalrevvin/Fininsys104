<!-- Data Modal -->
<div class="modal fade " id="editMasterTransaksi<?php echo $dftMaster['idMaster_transaksi'] ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span  id="loading2"></span>Perbarui Master Transaksi</h4>
            </div>
            <div class="card">
                <div class="body">
                    <form method="POST">
                    
                    <!--NAMA MASTER TRANSAKSI-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" value="<?= $dftMaster['nama_master_transaksi'] ?>" class="form-control" maxlength="50" 
                                        id="namaMasterTransaksi<?= $dftMaster['idMaster_transaksi'] ?>" 
                                        minlength="2" placeholder="Contoh: SPP-SD-2018, SPP-TK-2018, Dll." required>
                        </div>
                        <span class="input-group-addon">Nama Master Transaksi*</span>
                    </div>
                    <!--Program Studi-->
                    <div class="input-group">
                        <div class="form-line">
                            <select class="selectpicker" name="programStudi<?= $dftMaster['idJurusan'] ?>" 
                                    id="programStudi<?= $dftMaster['idMaster_transaksi'] ?>" data-live-search="true" required>
                                    <option value='<?= $dftMaster['idJurusan'] ?>'><?= $dftMaster['nama_jurusan'] ?></option>
                                    <?php 
                                        include "../../../../Controller/Other/daftarJurusanQuery.php";
                                        while($prodi = $daftarJurusan->fetch_object()){
                                            echo "<option value='$prodi->idJurusan'>
                                                <b>$prodi->nama_jurusan</b>
                                            </option>";
                                        }
                                    ?>
                            </select>
                        </div>
                        <span class="input-group-addon">Program Studi*</span>
                    </div>
                    <!--Tahun Angkatan-->
                    <div class="input-group">
                        <div class="form-line">
                            <select class="selectpicker" name="thnAngkatan" id="thnAngkatan<?= $dftMaster['idMaster_transaksi'] ?>" data-live-search="true" required><?= $dftMaster['tahun_angkatan'] ?></option>
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
                        <button type="button" value="<?php echo $dftMaster['idMaster_transaksi'] ?>" 
                                class="editMasterTransaksi btn bg-blue-grey waves-effect">
                            <i class="material-icons">save</i>
                            <span>Simpan</span>
                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

