<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DAFTAR KAS <b>MASUK</b> <?= $sekolah['nama_sekolah'] ?>
                </h2>
                <span class="font-11">Hanya Menampilkan Kas Masuk Bulan Ini, Keseluruhan Kas Masuk Terdapat Pada Menu <b>Rekapitulasi Kas</b></span>
                <ul class="header-dropdown m-r--5">
                    <button class="btn bg-teal waves-effect" data-color="red" 
                            data-toggle="modal" data-target="#addKasMasuk">
                        <i class="material-icons">add</i>
                        <span>Tambah Kas Masuk</span>
                    </button>
                    <button class="btn bg-blue-grey waves-effect" data-color="red" 
                            data-toggle="modal" data-target="#statusKasMasuk">
                        <i class="material-icons">warning</i>
                        <span>Status Kas</span>
                    </button>
                    <a href="?p=ReportCashIn">
                        <button class="btn bg-blue-grey waves-effect">
                            <i class="material-icons">assignment</i>
                            <span>Laporan</span>
                        </button>
                    </a>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                 <table class="table table-bordered table-striped table-hover datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Kas</th>
                                <th>Kas Masuk</th>
                                <th>Jenis Kas</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Petugas</th>
                                <th style="text-align: center; vertical-align: middle;">Act</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Kode Kas</th>
                                <th>Kas Masuk</th>
                                <th>Jenis Kas</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Petugas</th>
                                <th style="text-align: center; vertical-align: middle;">Act</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                
                                $no = 1;
                                while($kas=$dftKasQuery->fetch_object()) :
                            ?>
                            <tr>
                                <td><?= sprintf('%04d', $no++) ?></td>
                                <td><?= $kas->no_kas ?></td>
                                <td><b>Rp.<?= number_format($kas->jml_kas_masuk) ?>.-</b></td>
                                <td class="font-12"><b><?= $kas->nama_jenis_kas ?></b></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#desk<?= $kas->idKas ?>">
                                        <span class="font-12"><?= substr($kas->deskripsi,0,20) ?>...</span>
                                    </a>
                                </td>
                                <td><?= $kas->tgl_kas ?></td>
                                <td><?= $kas->petugas ?>...</td>
                                <td><button type="button" class="btn bg-teal btn-xs waves-effect" 
                                            data-toggle="modal" data-target="#editKasMasuk<?= $kas->idKas ?>">  
                                        <i class="material-icons">mode_edit</i>
                                    </button>
                                    <button type="button" class="btn bg-pink btn-xs waves-effect btnDelKasMasuk" 
                                            data-toggle="modal" data-delete="<?= $kas->no_kas ?>" 
                                            data-id="<?= $kas->idKas ?>" value="<?= $kas->idKas ?>">  
                                            <i class="material-icons">remove_circle</i>
                                    </button>
                                </td>
                            </tr>
                            <?php include "modal_deskripsi.php"; ?>
                            <?php include "modal_editKasMasuk.php"; ?>
                            <?php endwhile; ?>
                            <?php include "modal_statusKasMasuk.php"; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php
 /* $q=mysqli_query($db,"select distinct date_format(tgl_kas,'%b') as bulan from kas group by month(tgl_kas)");
 while($r=mysqli_fetch_array($q)){
    
    echo $r['bulan'];
    
 }
 $k=mysqli_query($db,"select sum(jml_kas_masuk) as msk from kas group by month(tgl_kas)");
    while($o=mysqli_fetch_array($k)){
        echo $o['msk'];
    }
*/
?>






