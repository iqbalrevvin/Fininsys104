<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Daftar Master Transaksi
                </h2>
                <ul class="header-dropdown m-r--5">
                    <button class="btn bg-blue-grey waves-effect" data-color="red" 
                            data-toggle="modal" data-target="#addMasterTransaksi">
                        <i class="material-icons">add</i>
                        <span>Tambah Master Transaksi</span>
                    </button>
                </ul>
            </div>
            <div class="body" id="ketMasterTransaksi">
                <div class="table-responsive">
                 <table class="table table-bordered table-striped table-hover datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center; vertical-align: middle;">#</th>
                                <th>Nama Master Transaksi</th>
                                <th>Program Studi</th>
                                <th>Tahun Angkatan</th>
                                <th style="text-align: center; vertical-align: middle;">Act</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="text-align: center; vertical-align: middle;">#</th>
                                <th>Nama Master Transaksi</th>
                                <th>Program Studi</th>
                                <th>Tahun Angkatan</th>
                                <th style="text-align: center; vertical-align: middle;">Act</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                $no = 1;
                                while($dftMaster = mysqli_fetch_array($dftMasterTransQuery)){
                            ?>
                            <tr>
                                <td style="text-align: center; vertical-align: middle;"><?php echo $no++; ?></td>
                                <td><b><?= $dftMaster['nama_master_transaksi'] ?></b></td>
                                <td><b><?= $dftMaster['nama_jurusan'] ?></b></td>
                                <td><b><?= $dftMaster['tahun_angkatan'] ?></b></td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <button type="button" class="btn bg-teal btn-xs waves-effect" 
                                            data-toggle="modal" 
                                            data-target="#editMasterTransaksi<?php echo $dftMaster['idMaster_transaksi'] ?>">  
                                        <i class="material-icons">mode_edit</i>
                                    </button>
                                    <button type="button" class="btn bg-pink btn-xs waves-effect delMasterTransaksi" 
                                            data-toggle="modal" data-delete="<?php echo $dftMaster['nama_master_transaksi'] ?>" 
                                            data-id="<?php echo $dftMaster['idMaster_transaksi'] ?>" 
                                            value="<?php echo $dftMaster['idMaster_transaksi'] ?>">  
                                            <i class="material-icons">remove_circle</i>
                                    </button>
                                </td>
                            </tr>
                            <?php include "modal_editMasterTransaksi.php"; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>









