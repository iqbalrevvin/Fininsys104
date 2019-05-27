<div class="modal fade " id="delDataPengguna<?= $data->no_idnt ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Konfirmasi Keamanan</h4>
            </div>
            <form class="form-horizontal" id="formDelAdmin" method="POST">
            <div class="modal-body">
                <!--NAMA SISWA-->
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="password" class="form-control" 
                                maxlength="50" id="pass1<?= $data->no_idnt ?>" minlength="1" required>
                        <label class="form-label">Password</label>
                    </div>
                </div>
                <!--//-->
                <!--NIK-->
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="password" class="form-control" 
                                name="" maxlength="50" id="pass2<?= $data->no_idnt ?>" minlength="1" required>
                        <label class="form-label">Konfirmasi Password</label>
                    </div>
                </div>
            <div class="modal-footer">
                <!--<input class="btn btn-info" name="transaksi" id="addTransaksi" type="submit" value="Simpan" />-->
                <button type="button" class="btn bg-blue-grey waves-effect" data-dismiss="modal">
                    <i class="material-icons">clear</i>
                    <span>Batal</span>
                </button>
                <button type="button" value="<?= $data->no_idnt ?>" class="btn bg-red waves-effect btnDeleteDataPengguna"
                        data-delete="<?= $data->nama_admin ?>" data-id="<?= $data->no_idnt ?>" value="<?= $data->no_idnt ?>">
                    <i class="material-icons">remove_circle</i>
                    <span>Lanjutkan Hapus</span>
                </button>
                
                <!--<button type="button" class="btn bg-blue-grey waves-effect">
                    <i class="material-icons">print</i>
                    <span>Cetak</span>
                </button>
                -->    
            </div>
            </form>
        </div>
    </div>
</div>
