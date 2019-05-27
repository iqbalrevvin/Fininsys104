<?php #include "admin/query/beranda/widgetsBerandaQuery.php" ?>
<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
        <div class="info-box bg-teal hover-expand-effect">
            <a href="?p=ListTransaction">
            <div class="icon">
                <i class="material-icons">playlist_add_check</i>
            </div>
            </a>
            <div class="content">
                <div class="text"><span class="font-11">Jumlah Transaksi Bulan Ini</span></div>
                <div class="number count-to" data-from="0" data-to="<?php echo $jmlTransaksi ?>" data-speed="5500" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
        <div class="info-box bg-teal hover-expand-effect">
            <a href="?p=ListTransaction">
            <div class="icon">
                <i class="material-icons">forum</i>
            </div>
            </a>
            <div class="content">
                <div class="text">Transaksi Bulan Ini</div>
                <div class="number count-to" data-from="0" data-to="<?php echo $bulan['transBulan'] ?>" data-speed="4000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
        <div class="info-box bg-teal hover-expand-effect">
            <a href="?p=Transaction">
            <div class="icon">
                <i class="material-icons">help</i>
            </div>
            </a>
            <div class="content">
                <div class="text">Transaksi Hari Ini</div>
                <div class="number count-to" data-from="0" data-to="<?php echo $hari['transHari'] ?>" data-speed="3000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
        <div class="info-box bg-teal hover-expand-effect">
            <a href="?p=StudentList">
            <div class="icon">
                <i class="material-icons">person_add</i>
            </div>
            </a>
            <div class="content">
                <div class="text">Jumlah Siswa</div>
                <div class="number count-to" data-from="0" data-to="<?php echo $jmlSiswa ?>" data-speed="2000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
</div>