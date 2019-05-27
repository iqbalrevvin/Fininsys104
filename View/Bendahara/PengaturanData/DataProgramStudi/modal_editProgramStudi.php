<!-- Data Modal -->
<div class="modal fade" id="editProgramStudi<?php echo $prodi->idJurusan ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span  id="loading2"></span>Perbarui Program Studi</h4>
            </div>
            <div class="card">
                <div class="body">

                    <!--NAMA PROGRAM STUDI-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" maxlength="50" id="namaPS<?= $prodi->idJurusan ?>" 
                                        minlength="10" value="<?php echo $prodi->nama_jurusan ?>"
                                        placeholder="Contoh: Teknik Komputer Jaringan, Administrasi Perkantoran" required>
                        </div>
                        <span class="input-group-addon">Nama Program Studi*</span>
                    </div>

                    <!--SINGKATAN PROGRAM STUDI-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" maxlength="7" id="singkatanPS<?= $prodi->idJurusan ?>" 
                                   minlength="2" value="<?php echo $prodi->singkatan_jurusan ?>" placeholder="Contoh: TKJ, AP" required>
                        </div> 
                        <span class="input-group-addon">Nama Singkatan*</span>
                    </div>
                    <!--JUMLAH SEMESTER-->
                    <div class="input-group">
                        <div class="form-line">
                            <select class="selectpicker" id="jmlSemester<?= $prodi->idJurusan ?>" required>
                                    <option value='<?= $prodi->jumlah_semester ?>'><?= $prodi->jumlah_semester ?></option>
                                    <?php
                                        for($a=1; $a<=14; $a+=1){
                                            echo"<option value='$a'> $a </option>";
                                        }
                                    ?>
                            </select>
                        </div>
                        <span class="input-group-addon">Program Studi*</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                                </button>
                            <button type="button" value="<?php echo $prodi->idJurusan ?>" 
                                    class="btnEditPS btn bg-blue-grey waves-effect">
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

