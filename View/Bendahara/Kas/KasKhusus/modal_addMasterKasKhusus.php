<!-- Data Modal -->
<div class="modal fade" id="addMasterKasKhusus" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Master Kas Khusus</h4>
            </div>
            <div class="card">
                <div class="body">
                    <!--NAMA JENIS KAS MASUK-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" maxlength="50" id="namaMasterKasKhusus" minlength="10" 
                                   placeholder="Contoh: Ujian Nasional 2018, Prakerin 2018, Uang Pakain 2017, Dll." required>
                        </div>
                        <span class="input-group-addon">Nama Master Kas Khusus*</span>
                    </div>
                    <!--TAHUN MASTER KAS-->
                    <div class="input-group">
                        <div class="form-line">
                            <select id="thnMstrKas" data-live-search="true" required>
                                    <option value=''>-Tahun Kas-</option>
                                    <?php
                                        $mulai= date('Y') - 25;
                                        for($i = $mulai;$i<$mulai + 50;$i++){
                                            $sel = $i == date('Y') ? ' selected="selected"' : '';
                                            echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                        }
                                    ?>
                            </select>
                        </div>
                        <span class="input-group-addon">Tahun Kas*</span>
                    </div>
                    <!--////////////////////-->
                    <div class="modal-footer">
                        <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                                </button>
                            <button type="button" id="btnAddMasterKasKhusus" class="btn bg-blue-grey waves-effect">
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

