<!-- Data Modal -->
<div class="modal fade" id="editTrans<?php echo $transaksi['idTransaksi'] ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Perbarui Transaksi</h4>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <select name="" id="upd_PlhSiswa<?php echo $transaksi['idTransaksi'] ?>" 
                                    class="form-control show-tick" data-live-search="true" disabled>
                                <option value="<?php echo $transaksi['no_idnt'] ?>">
                                    <?php echo $transaksi['nama_siswa'] ?> | 
                                    <?php echo $transaksi['nipd'] ?> |
                                    <?php echo $transaksi['nama_jurusan'] ?>
                                </option>
                                <?php 
                                    include "../../../admin/query/daftar_siswa.php";
                                    while($dafsis = mysqli_fetch_array($daftar_siswa_qr)){
                                        echo "  <option value='$dafsis[no_idnt]'>
                                                    $dafsis[nama_siswa] | $dafsis[nipd] | $dafsis[no_idnt]
                                                </option> ";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">format_list_bulleted</i>
                            </span>
                            <select name="" id="upd_PlhJnsTrans<?php echo $transaksi['idTransaksi'] ?>" 
                                    class="form-control show-tick" data-live-search="true" disabled>
                                <option value="<?php echo $transaksi['idJenis_transaksi'] ?>">
                                    <?php echo $transaksi['nama_jenis_transaksi'] ?>
                                </option>
                                <?php 
                                    include "../../../admin/query/daftar_jenis_transaksi.php";
                                    while($JnsTrans = mysqli_fetch_array($jenis_transaksi_qr)){
                                        echo "  <option value='$JnsTrans[idJenis_transaksi]'>
                                                    $JnsTrans[nama_jenis_transaksi]
                                                </option> "; 
                                    }      
                                ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <div class="form-line">
                                <input type="text" onkeypress="return inputAngka(event)" value="<?php echo $transaksi['jumlah_bayar'] ?>" id ="upd_JmlByr<?php echo $transaksi['idTransaksi'] ?>" class="form-control" placeholder="Masukan Hanya Angka, Tanpa Titik(.)" required>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">Ket.</span>
                            <div class="form-line">
                                <input type="text" maxlength="50" minlength="0" id="keterangan<?= $transaksi['idTransaksi'] ?>" 
                                value="<?= $transaksi['ket_transaksi'] ?>" class="form-control" placeholder="Masukan Keterangan Transaksi" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!--<input class="btn btn-info" name="transaksi" id="addTransaksi" type="submit" value="Simpan" />-->
                <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                    <i class="material-icons">clear</i>
                        <span>Tutup</span>
                </button>
                <button type="button" value="<?php echo $transaksi['idTransaksi'] ?>" class="updateTransaksi btn bg-blue-grey waves-effect">
                    <i class="material-icons">save</i>
                    <span>Simpan</span>
                </button>
                <!--<button type="button" class="btn bg-blue-grey waves-effect">
                    <i class="material-icons">print</i>
                    <span>Cetak</span>
                </button>
                <button type="button" class="btn bg-blue-grey waves-effect" data-dismiss="modal">
                    <i class="material-icons">clear</i>
                    <span>Tutup</span>
                </button>-->    
            </div>
        </div>
    </div>
</div>
