<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DAFTAR SISWA
                </h2>

                <ul class="header-dropdown m-r--5">
                    <button class="btn bg-blue-grey waves-effect" 
                            data-toggle="modal" data-target="#modalAddSiswa">
                        <i class="material-icons">add</i>
                        <span>Tambah Siswa</span>
                    </button>
                    <a href="?p=StudentList&k=StudentImport">
                        <button class="btn bg-teal waves-effect">
                            <i class="material-icons">import_export</i>
                            <span>Import Siswa</span>
                        </button>
                    </a>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th style="text-align: left; vertical-align: middle;">#</th>
                                <th style="text-align: left; vertical-align: middle;">Nama</th>
                                <th style="text-align: center; vertical-align: middle;">NIK</th>
                                <th style="text-align: center; vertical-align: middle;">NIPD</th>
                                <th style="text-align: center; vertical-align: middle;">Smstr</th>
                                <th style="text-align: center; vertical-align: middle;">Kelas</th>
                                <th style="text-align: center; vertical-align: middle;">Tgl-Lahir</th>
                                <th style="text-align: center; vertical-align: middle;">Usia</th>
                                <th style="text-align: center; vertical-align: middle;">Act</th>
                                
                            </tr>
                        </thead>
                         <tfoot>
                            <tr>
                                <th style="text-align: left; vertical-align: middle;">#</th>
                                <th style="text-align: left; vertical-align: middle;">Nama</th>
                                <th style="text-align: center; vertical-align: middle;">NIK</th>
                                <th style="text-align: center; vertical-align: middle;">NIPD</th>
                                <th style="text-align: center; vertical-align: middle;">Smstr</th>
                                <th style="text-align: center; vertical-align: middle;">Kelas</th>
                                <th style="text-align: center; vertical-align: middle;">Tgl-Lahir</th>
                                <th style="text-align: center; vertical-align: middle;">Usia</th>
                                <th style="text-align: center; vertical-align: middle;">Act</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                $no = 1;
                                while($dftSiswa = mysqli_fetch_array($daftarSiswaQuery)){
                                    $scure= md5(md5($dftSiswa['idSiswa']).md5('qwerty12345'));
                                ?>
                        <tr>
                                <td style="text-align: center; vertical-align: middle;"><?php echo $no++ ?></td>
                                <td style="text-align: left; vertical-align: middle;">
                                    <a href="?p=StudentList&k=Profile&ID=<?= $dftSiswa['idSiswa'] ?>&Scure=<?php echo $scure ?>">
                                        <b><?php echo $dftSiswa['nama_siswa'] ?></b>
                                    </a>
                                </td>
                                <td style="text-align: center; vertical-align: middle;"><?= $dftSiswa['no_idnt'] ?></td>
                                <td style="text-align: center; vertical-align: middle;"><?= $dftSiswa['nipd'] ?></td>
                                <td style="text-align: center; vertical-align: middle;">   
                                    <?= semester($dftSiswa['tgl_masuk'], $dftSiswa['jumlah_semester']) ?>
                                </td>
                                <td style="text-align: center; vertical-align: middle;"><?= $dftSiswa['kelas'] ?></td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <?= tgl_indo($dftSiswa['tgl_lahir']) ?>
                                </td>
                                <td style="text-align: center; vertical-align: middle;"><?php echo usia($dftSiswa['tgl_lahir']) ?></td>
                                <td>
                                    <button type="button" class="btn btn-default waves-effect" 
                                            data-toggle="modal" data-target="#delSiswa<?php echo $dftSiswa['no_idnt'] ?>">  
                                            <i class="material-icons">remove_circle</i>
                                            <span class="font-bold col-pink">Hapus</span>
                                    </button>
                                    <input type="hidden" class="form-control"
                                            value="<?php echo $session['pass'] ?>" maxlength="50" id="passconfirm<?php echo $dftSiswa['no_idnt'] ?>" minlength="1" required>
                                </td>

                                <?php include "DeleteSiswa/modalDeleteSiswa.php" ?>
                        </tr>
                            <?php } ?>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>








                        