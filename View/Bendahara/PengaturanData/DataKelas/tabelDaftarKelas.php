<div id="ketKelas"></div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Daftar Kelas <?php echo $sekolah['nama_sekolah'] ?> 
                </h2>
                <ul class="header-dropdown m-r--5">
                    <button class="btn bg-blue-grey waves-effect" data-color="red" 
                            data-toggle="modal" data-target="#addKelas">
                        <i class="material-icons">add</i>
                        <span>Tambah Kelas Baru</span>
                    </button>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                 <table class="table table-bordered table-striped table-hover datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kelas</th>
                                <th>Program Studi</th>
                                <th style="text-align: center; vertical-align: middle;">Act</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Kelas</th>
                                <th>Program Studi</th>
                                <th style="text-align: center; vertical-align: middle;">Act</th>
                            </tr>
                        </tfoot>
                        
                        <tbody>
                            <?php
                                $no = 1; 
                                while($kelas=$dftKelasQuery->fetch_object()):
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><b><?php echo $kelas->nama_kelas ?></b></td>
                                <td><?php echo $kelas->nama_jurusan ?></td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <button type="button" class="btn bg-teal btn-xs waves-effect" 
                                            data-toggle="modal" data-target="#editKelas<?php echo $kelas->idKelas ?>">  
                                        <i class="material-icons">mode_edit</i>
                                    </button>
                                    <button type="button" class="btn bg-pink btn-xs waves-effect btnDelKelas" 
                                            data-toggle="modal" data-delete="<?php echo $kelas->nama_kelas ?>" 
                                            data-id="<?php echo $kelas->idKelas ?>" 
                                            value="<?php echo $kelas->idKelas ?>">  
                                            <i class="material-icons">remove_circle</i>
                                    </button>
                                </td>
                            </tr>
                            <?php include "modal_editKelas.php"; ?>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>









