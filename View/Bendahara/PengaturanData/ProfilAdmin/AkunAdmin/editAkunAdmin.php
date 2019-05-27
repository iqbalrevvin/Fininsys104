
<div class="body">
    <form id="form_advanced_validation" method="POST" enctype="multipart/form-data">
            <!--NAMA SISWA-->

    <input type="hidden" value="<?php echo $admin['no_idnt'] ?>" class="form-control" maxlength="50" id="idUser" minlength="3" required>
    <input type="hidden" value="<?php echo $admin['pass'] ?>" class="form-control" maxlength="50" id="dataPassLama" minlength="3" required>
    <!--//-->

        <h5>Perbarui Nama Tampilan</h5>
         <!--NAMA TAMPILAN-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" value="<?php echo $admin['nama_tampilan'] ?>" class="form-control" maxlength="50" id="editNamaTmplnAdmin" minlength="3" required>
                <label class="form-label">Nama Tampilan*</label>
            </div>
            <div class="help-info">Min. 3, Max. 50 Karakter</div>
        </div>
        <div class="modal-footer">
            <button type="button" type="submit" id="btnNamaTmplnAdmin" class="btn bg-blue-grey waves-effect">
                <i class="material-icons">save</i>
                <span>Perbarui Nama Tampilan</span><span id="loading2"></span>
            </button>
        </div>
        <!--//-->
        <hr>
        <h5>Perbarui Username</h5>
            <!--USER NAME-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" value="<?php echo $admin['username'] ?>" class="form-control" maxlength="50" id="editUserNameAdmin" minlength="3" required>
                <label class="form-label">Username*</label>
            </div>
            <div id="username"></div>
            <div class="help-info">Min. 3, Max. 50 Karakter</div>
        </div>
        <div class="modal-footer">
            <button type="button" type="submit" id="bntEditUsernameAdmin" class="btn bg-blue-grey waves-effect">
                <i class="material-icons">save</i>
                <span>Perbarui Username</span><span id="loading2"></span>
            </button>
        </div>
        <!--//-->
        <hr>
        <h5>Perbarui Password</h5>
        <!--Password Lama-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" value="" class="form-control" maxlength="50" id="editPassLamaAdmin" minlength="3" required>
                <label class="form-label">Password Lama*</label>
            </div>
            <div class="help-info">Min. 3, Max. 50 Karakter</div>
        </div>
        <!--Password Baru-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="password" value="" class="form-control" maxlength="50" id="editPassBaruAdmin" minlength="3" required>
                <label class="form-label">Password Baru*</label>
            </div>
            <div class="help-info">Min. 3, Max. 50 Karakter</div>

        </div>
        <!--Ulangi Password Baru-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="password" value="" class="form-control" maxlength="50" id="editPassBaruAdmin2" minlength="3" required>
                <label class="form-label">Ulangi Password Baru*</label>
            </div>
            <div class="help-info">Min. 3, Max. 50 Karakter</div>
        </div>
        <div class="modal-footer">
            <button type="button" type="submit" id="bntEditPasswordAdmin" class="btn bg-blue-grey waves-effect">
                <i class="material-icons">save</i>
                <span>Perbarui Password</span>
            </button>
        </div>
         <h5>Perbarui No. Identitas</h5>
            <!--USER NAME-->
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" value="<?php echo $admin['no_idnt'] ?>" class="form-control" maxlength="50" id="editIdntAdmin" minlength="3" required>
                <label class="form-label">No. Identitas/NIK*</label>
            </div>
            <div id="username"></div>
            <div class="help-info">Contoh : 3205101507990007</div>
        </div>
        <div class="modal-footer">
            <button type="button" type="submit" id="bntEditIdntAdmin" class="btn bg-blue-grey waves-effect">
                <i class="material-icons">save</i>
                <span>Perbarui No. Identitas</span>
            </button>
        </div>
        <!--//-->
        <!--//-->
    </form>
</div>

