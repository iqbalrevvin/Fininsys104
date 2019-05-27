<!-- Data Modal -->
<div class="modal fade" id="modalAddPembayaranKhusus" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Jenis Pembayaran Khusus</h4>
            </div>
            <div class="card">
                <div class="body">

                     <!--SETTING MASTER TRANSAKSI-->
                    <div class="input-group">
                        <div class="form-line">
                            <select name="idMasterTrans" class="selectpicker" id="idJenisTrans" data-live-search="true" required>
                                    <option value=''>--Pilih Jenis Transaksi--</option>
                                    <?php 
                                        include "Controller/Other/pilihJenisTransaksiKhusus.php";
                                        while($jenis = mysqli_fetch_array($jenis_transaksi_khusus_qr)){
                                            echo "<option value='$jenis[idJenis_transaksi]' 
                                                    data-subtext='$jenis[tahun_angkatan] | Rp. ".number_format($jenis[kewajiban]).".-'>
                                                $jenis[nama_jenis_transaksi]
                                    </option>";
                                        }
                                    ?>
                            </select>
                        </div>
                        <span class="input-group-addon">Jenis Transaksi Khusus*</span>
                    </div>
                    <!--Tahun Angkatan-->
                    <div class="input-group">
                        <div class="form-line">
                            <select class="selectpicker" name="thnPembayaran" id="thnPembayaran" data-live-search="true" required>
                                <option value=''>--Pilih Tahun Pembayaran--</option>
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
                        <span class="input-group-addon">Tahun Pembayaran*</span>
                    </div>
                    <!--//-->
                        <div class="modal-footer">
                        <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                                </button>
                            <button type="button" value="<?= $profil['no_idnt'] ?>" id="bntAddJnsTransaksiKhusus" class="btn bg-blue-grey waves-effect" >
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

