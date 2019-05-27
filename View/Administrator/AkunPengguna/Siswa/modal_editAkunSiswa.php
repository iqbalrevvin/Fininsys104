<!-- Data Modal -->
<div class="modal fade" id="editAkunSiswa<?= $user->no_idnt ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Akun Pengguna</h4>
            </div>
            <div class="card">
                <div class="modal-body">
                    <!--NAMA ADMIN-->
                        <div class="form-group form-float">
                            <div class="form-line success">
                                <input type="text" class="form-control" maxlength="50" id="namaTampilan<?= $user->no_idnt ?>" minlength="3" value="<?= $user->nama_tampilan ?>" required>
                                <label class="form-label">Nama Tampilan*</label>
                            </div>
                            <div class="help-info">Min. 3, Max. 50 Karakter</div>
                        </div>
                    <!--//-->
                    <!--NIK-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <input type="text" maxlength="16" minlength="16" onkeypress="return inputAngka(event)" pattern="[0-9]+" 
                                                name="number" id="nikAkun<?= $user->no_idnt ?>" class="form-control" value="<?= $user->no_idnt ?>" disabled>
                            <label class="form-label">Nomor Identitas / NIK*</label>
                        </div>
                        <div class="help-info">Contoh : 3205101507990007</div>
                    </div>
                    <!--//-->
    
                    <!--USERNAME-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <input type="text" class="form-control" name="tempatlahir" maxlength="25" minlength="3" id="username<?= $user->no_idnt ?>" value="<?= $user->username ?>" required>
                                <label class="form-label">Username*</label>
                        </div>
                        <div class="help-info">Min. 3, Max. 25 Karakter</div>
                    </div>
                    <!--//-->
                    <!--LEVEL HAK AKSES-->
                    <!--<div class="form-group form-float">
                        <div class="form-line success">
                            <select id="level<?= $user->no_idnt ?>" class="form-control show-tick" required>
                                <option value="<?= $user->level ?>"><?= LevelName($user->level) ?></option>
                                <option value="1">WebMaster</option>
                                <option value="2">Kepala Sekolah</option>
                                <option value="3">Bendahara</option>
                            </select>
                        </div>
                        <div class="help-info">
                            Pilih Level Berdasarkan List Yang Tersedia
                        </div>
                    </div>-->
                    <!--//-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <select id="status<?= $user->no_idnt ?>" class="form-control show-tick" required>
                                <option value="<?= $user->status ?>"><?= Aktivasi($user->status) ?></option>
                                <option value="aktif">Aktifkan</option>
                                <option value="nonaktif">Nonaktifkan</option>
                            </select>
                        </div>
                        <div class="help-info">
                            Pilih Aktivasi Akun Untuk Menentukan Akun Akftif Atau Tidak
                        </div>
                    </div>
                    <!--//-->
                    <div class="form-group form-float">
                        <div class="form-line success">
                            <select id="online<?= $user->no_idnt ?>" class="form-control show-tick" required>
                                <option value="<?= $user->online ?>"><?= online($user->online) ?></option>
                                <option value="on">Ubah Ke Online</option>
                                <option value="off">Ubah Ke Offline</option>
                            </select>
                        </div>
                        <div class="help-info">
                            Pilih Status Akun Apakah Akan Diubah Menjadi Online Atau Offline
                        </div>
                    </div>
                    <!--//-->
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                        <i class="material-icons">clear</i>
                        <span>Tutup</span>
                    </button>
                    <button class="btn bg-pink waves-effect btnResetPasSiswa"
                            data-toggle="modal" data-reset="<?= $user->nama_tampilan ?>" 
                            data-id="<?= $user->no_idnt ?>" data-nipd="<?= $data->nipd ?>" value="<?= $user->no_idnt ?>">
                            <i class="material-icons">refresh</i>
                            <span>Reset</span>
                    </button>
                    <button type="button" value="<?= $user->no_idnt ?>" class="btnEditAkunSiswa btn bg-teal waves-effect">
                        <i class="material-icons">save</i>
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
