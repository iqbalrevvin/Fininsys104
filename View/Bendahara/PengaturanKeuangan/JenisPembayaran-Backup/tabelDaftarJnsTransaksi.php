<div id="resultJenisTransaksi"></div>
<div id="simpanBaruJnsTrans"></div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Daftar Jenis Transaksi
                </h2>
                <ul class="header-dropdown m-r--5">
                    <button class="btn bg-blue-grey waves-effect" data-color="red" 
                            data-toggle="modal" data-target="#addJnsTransaksi">
                        <i class="material-icons">add</i>
                        <span>Tambah Jenis Transaksi</span>
                    </button>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                 <table class="table table-bordered table-striped table-hover datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Jenis</th>
                                <th>Smt</th>
                                <th>Thn</th>
                                <th>Master</th>
                                <th>Prodi</th>               
                                <th>Kode</th>
                                <th>Tipe</th>
                                <th>Kewajiban</th>
                                <th style="text-align: center; vertical-align: middle;">Act</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Jenis</th>
                                <th>Smt</th>
                                <th>Thn</th>
                                <th>Master</th>
                                <th>Prodi</th>  
                                <th>Kode</th>
                                <th>Tipe</th>
                                <th>Kewajiban</th>
                                <th style="text-align: center; vertical-align: middle;">Act</th>
                            </tr>
                        </tfoot>
                        <tbody class="font-11">
                            <?php
                                
                                $no = 1;
                                while($dftJns = mysqli_fetch_array($dftJnsTransQuery)){
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><b class="col-black"><?= $dftJns['nama_jenis_transaksi'] ?></b></td>
                                <td style="text-align: center;"><?= $dftJns['set_semester'] ?></td>
                                <td><b><?= $dftJns['tahun_angkatan'] ?></b></td>
                                <td><b><?= $dftJns['nama_master_transaksi'] ?></b></td>
                                <td><b><?= $dftJns['nama_jurusan'] ?></b></td>
                                <td><?= $dftJns['kd_transaksi'] ?></td>
                                <?php if($dftJns['tipe_jenis_transaksi'] == 'REGULER'){ ?>
                                    <td><b class="col-cyan"><?= $dftJns['tipe_jenis_transaksi'] ?></b></td>
                                <?php }else{ ?>
                                    <td><b class="col-teal"><?= $dftJns['tipe_jenis_transaksi'] ?></b></td>
                                <?php } ?>
                                <td><b class="col-black">Rp.<?= number_format($dftJns['kewajiban']) ?>.-</b></td>
                                <td>
                                    <button type="button" class="btn bg-cyan btn-xs waves-effect" 
                                            data-toggle="modal" data-target="#deskJenPemb<?= $dftJns['idJenis_transaksi'] ?>">  
                                        <i class="material-icons">details</i>
                                    </button>
                                    <button type="button" class="btn bg-teal btn-xs waves-effect" 
                                            data-toggle="modal" data-target="#editJnsTransaksi<?= $dftJns['idJenis_transaksi'] ?>">  
                                        <i class="material-icons">mode_edit</i>
                                    </button>
                                    <button type="button" class="btn bg-pink btn-xs waves-effect delJnsTransaksi" 
                                            data-toggle="modal" data-delete="<?= $dftJns['nama_jenis_transaksi'] ?>" 
                                            data-id="<?= $dftJns['idJenis_transaksi'] ?>" 
                                            value="<?= $dftJns['idJenis_transaksi'] ?>">  
                                            <i class="material-icons">remove_circle</i>
                                    </button>
                                </td>
                            </tr>
                            <?php include "modal_editJnsTransaksi.php"; ?>
                            <?php include "modal_deskripsiJenisPembayaran.php"; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>









