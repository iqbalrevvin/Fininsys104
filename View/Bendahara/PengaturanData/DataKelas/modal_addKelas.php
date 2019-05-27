<!-- Data Modal -->
<div class="modal fade" id="addKelas" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span  id="loading2"></span>Tambah Program Studi</h4>
            </div>
            <div class="card">
                <div class="body">
                    <div class="input-group">
                        <div class="form-line">
                            <select class="selectpicker" name="idJurusan" id="idJurusan" data-live-search="true" required>
                                    <option value=''>--Pilih Program Studi--</option>
                                    <?php 
                                        include "../../../../Controller/Other/daftarJurusanQuery.php";
                                        while($prodi = $daftarJurusan->fetch_object()){
                                            echo "<option value='$prodi->idJurusan'>
                                                $prodi->nama_jurusan
                                    </option>";
                                        }
                                    ?>
                            </select>
                        </div>
                        <span class="input-group-addon">Program Studi*</span>
                    </div>
                    <!--NAMA KELAS-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" maxlength="50" id="namaKelas" 
                                        minlength="10" placeholder="Contoh: TKJ-A, TB-A, TSM-B" required>
                        </div>
                        <span class="input-group-addon">Nama Kelas*</span>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                                </button>
                            <button type="button" id="btnAddKelas" class="btn bg-blue-grey waves-effect">
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

