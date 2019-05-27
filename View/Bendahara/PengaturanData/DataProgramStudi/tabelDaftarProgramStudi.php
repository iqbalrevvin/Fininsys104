<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Daftar Program Studi <?php echo $sekolah['nama_sekolah'] ?> 
                </h2>
                <ul class="header-dropdown m-r--5">
                    <button class="btn bg-blue-grey waves-effect" data-color="red" 
                            data-toggle="modal" data-target="#addProgramStudi">
                        <i class="material-icons">add</i>
                        <span>Tambah Daftar Program Studi</span>
                    </button>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                 <table class="table table-bordered table-striped table-hover datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Program Studi</th>
                                <th>Singkatan Prodi</th>
                                <th>Jumlah Semester</th>
                                <th style="text-align: center; vertical-align: middle;">Act</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Program Studi</th>
                                <th>Singkatan Prodi</th>
                                <th>Jumlah Semester</th>
                                <th style="text-align: center; vertical-align: middle;">Act</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                $no = 1; 
                                while($prodi=$dftProgramStudiQuery->fetch_object()){
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><b><?= $prodi->nama_jurusan ?></b></td>
                                <td><?= $prodi->singkatan_jurusan ?></td>
                                <td><?= $prodi->jumlah_semester ?></td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <button type="button" class="btn bg-teal btn-xs waves-effect" 
                                            data-toggle="modal" data-target="#editProgramStudi<?php echo $prodi->idJurusan ?>">  
                                        <i class="material-icons">mode_edit</i>
                                    </button>
                                    <button type="button" class="btn bg-pink btn-xs waves-effect btnDelPS" 
                                            data-toggle="modal" data-delete="<?php echo $prodi->nama_jurusan ?>" 
                                            data-id="<?php echo $prodi->idJurusan ?>" 
                                            value="<?php echo $prodi->idJurusan ?>">  
                                            <i class="material-icons">remove_circle</i>
                                    </button>
                                </td>
                            </tr>
                            <?php include "modal_editProgramStudi.php"; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>









