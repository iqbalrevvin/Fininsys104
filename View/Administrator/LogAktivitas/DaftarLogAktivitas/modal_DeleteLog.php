<!-- MODAL KONFIRMASI PASSWORD -->
<div class="modal fade" id="DeleteAllLog" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">KONFIRMASI KEAMANAN</h4>
            </div>
            <div class="card">
                <div class="body">
                    <!--MASUKAN PASSWORD-->
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="password" class="form-control" 
                                maxlength="50" id="pass1Log" minlength="1" required>
                        <label class="form-label">Password</label>
                    </div>
                </div>
                <!--KONFIRMASI PASSWORD-->
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="password" class="form-control" 
                                name="" maxlength="50" id="pass2Log" minlength="1" required>
                        <label class="form-label">Konfirmasi Password</label>
                    </div>
                </div>
                <!--//////////////////////////////////////////////////////////////////////////////-->
                <input type="hidden" class="form-control" value="<?= $session['pass'] ?>" maxlength="50" id="passconfirm" minlength="1" required>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>TUTUP</span>
                        </button>
                        <button type="button" id="btndelAllLog" class="btn bg-pink waves-effect">
                                <i class="material-icons">delete</i>
                                <span>HAPUS</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
