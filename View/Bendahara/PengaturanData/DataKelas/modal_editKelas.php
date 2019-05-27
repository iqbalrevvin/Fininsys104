<!-- Data Modal -->
<div class="modal fade" id="editKelas<?php echo $kelas->idKelas ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></span>Perbarui Kelas</h4>
            </div>
            <div class="card">
                <div class="body">
                    <div class="input-group">
                        <div class="form-line">
                            <!--PROGRAM STUDI-->
                            <select class="selectpicker" name="idJurusan" id="idJurusan<?php echo $kelas->idKelas ?>" data-live-search="true" required>
                                    <option value='<?php echo $kelas->idJurusan ?>'>
                                        <?php echo $kelas->nama_jurusan ?>
                                    </option>
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
                            <input type="text" class="form-control" maxlength="50" id="namaKelas<?php echo $kelas->idKelas ?>" 
                                        minlength="2" value="<?php echo $kelas->nama_kelas ?>" 
                                        placeholder="Contoh: TKJ-A, TB-A, TSM-B" required>
                        </div>
                        <span class="input-group-addon">Nama Kelas*</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                                </button>
                            <button type="button" value="<?php echo $kelas->idKelas ?>" 
                                    class="btnEditKelas btn bg-blue-grey waves-effect">
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

