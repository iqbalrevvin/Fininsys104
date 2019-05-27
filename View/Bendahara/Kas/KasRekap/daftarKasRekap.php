<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DAFTAR <b>REKAPITULASI</b> KAS <?= $sekolah['nama_sekolah'] ?>
                </h2>
                <ul class="header-dropdown m-r--5">
                    <button class="btn bg-blue-grey waves-effect" id="modal-color" data-target="#statusKasRekap" 
                            data-color="teal" data-toggle="modal">
                        <i class="material-icons">warning</i>
                        <span>Status Kas</span>
                    </button>
                    <a href="?p=ReportRecaps">
                        <button class="btn bg-blue-grey waves-effect">
                            <i class="material-icons">assignment</i>
                            <span>Laporan</span>
                        </button>
                    </a>

                </ul>
            </div>
            <div class="body">
                <div class="">
                 <table id="recapsCash" class="table table-bordered table-striped table-hover display">
                        <thead class="font-bold font-12">
                            <tr>
                                <th>#</th>
                                <th>Kode Kas</th>
                                <th>Jenis Kas</th>
                                <th>Deskripsi</th>
                                <th>Petugas</th>
                                <th>Tanggal</th>
                                <th>Debit</th>
                                <th>Kredit</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tfoot class="font-bold font-11">
                            <tr>
                                <th>#</th>
                                <th>Kode Kas</th>
                                <th>Jenis Kas</th>
                                <th>Deskripsi</th>
                                <th>Petugas</th>
                                <th>Tanggal</th>
                                <th>Debit</th>
                                <th>Kredit</th>
                                <th>Hapus</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php include "modal_statusKasRekap.php"; ?>








