<!-- Data Modal -->
<div class="modal fade" id="addProgramStudi" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span  id="loading2"></span>Tambah Program Studi</h4>
            </div>
            <div class="card">
                <div class="body">

                    <!--NAMA PROGRAM STUDI-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" maxlength="50" id="namaPS" 
                                        minlength="10" placeholder="Contoh: Teknik Komputer Jaringan, Administrasi Perkantoran" required>
                        </div>
                        <span class="input-group-addon">Nama Program Studi*</span>
                    </div>

                    <!--SINGKATAN PROGRAM STUDI-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" maxlength="7" id="singkatanPS" 
                                   minlength="2" placeholder="Contoh: TKJ, AP" required>
                        </div> 
                        <span class="input-group-addon">Nama Singkatan*</span>
                    </div>
                    <!--JUMLAH SEMESTER-->
                    <!--<div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" maxlength="2" id="jmlSemester" 
                                   minlength="1" placeholder="Contoh: 1, 2, 3, 4, 5, Dst." required>
                        </div> 
                        <span class="input-group-addon">Jumlah Semester*</span>
                    </div>-->
                    <!--JUMLAH SEMESTER-->
                    <div class="input-group">
                        <div class="form-line">
                            <select class="selectpicker" id="jmlSemester" required>
                                    <option value=''>--Pilih Jumlah Semester--</option>
                                    <?php
                                        for($a=1; $a<=14; $a+=1){
                                            echo"<option value='$a'> $a </option>";
                                        }
                                    ?>
                            </select>
                        </div>
                        <span class="input-group-addon">Program Studi*</span>
                    </div>
                    <!--///////////////////////////////////////////////////////////////////////////////////////////////-->
                    <div class="modal-footer">
                        <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                                </button>
                            <button type="button" id="btnAddPS" class="btn bg-blue-grey waves-effect">
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

