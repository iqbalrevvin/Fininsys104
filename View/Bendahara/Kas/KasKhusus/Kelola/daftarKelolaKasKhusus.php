<?php
    $master=$masterKasKhususQr->fetch_object();

?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><div id="kelolaKas"></div>
                <h2>
                    PENGELOLAAN KAS <b><?= $master->nama_master_kas ?></b> <?= $sekolah['nama_sekolah'] ?>
                </h2>
                <ul class="header-dropdown m-r--5">
                    <a href="?p=SpecialCash">
                    <button class="btn bg-blue-grey waves-effect" onClick="history.back();">
                            <i class="material-icons">keyboard_backspace</i>
                            <span>Kembali</span>
                    </button>
                    </a>
                    <button type="button" class="btn bg-blue waves-effect dropdown-toggle" 
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">attach_money</i>
                                <span>Kelola</span><span class="caret"></span>
                    </button>
                        <ul class="dropdown-menu">
                            <li><a data-toggle="modal" id="modal-color" data-color="teal" data-target="#addDebitKasKhusus">Transaksi Masuk</a></li>
                            <li><a data-toggle="modal" id="modal-color2" data-color="red" data-target="#addKreditKasKhusus">Transaksi Keluar</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a data-toggle="modal" id="modal-color2" data-color="teal" data-target="#statusKasKelola">Status Kas</a></li>
                            <li><a href="?p=ReportSpecialCash">Laporan</a></li>
                        </ul>
                </ul>
            </div>
            <div class="body">
            <?php include "tabelKelolaKasKhusus.php"; ?>
            <?php include"modal_statusKasKelola.php" ?>
            </div>
        </div>
    </div>
</div>
