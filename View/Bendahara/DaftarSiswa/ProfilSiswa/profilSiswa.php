<?php $scure= md5(md5($profil['idSiswa']).md5('qwerty12345')); ?>
<div class="row clearfix">
    <div class="col-md-3">
        <!--Informasi Siswa-->
        <?php include "kontenInfoSiswa.php"; ?>
        <div class="col-md-9">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <a href="?p=StudentList" class="btn bg-blue-grey waves-effect">
                        <i class="material-icons">keyboard_backspace</i>
                            <span>Kembali</span>
                        </a>
                        <div class="header">
                            <h2>
                                INFORMASI <?php echo $profil['nama_siswa'] ?>
                            </h2>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">home</i> Informasi Keuangan
                                    </a>
                                </li>
                                <!--<li role="presentation">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">face</i> Akun
                                    </a>
                                </li>-->
                                <li role="presentation">
                                    <a href="#messages_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">email</i> Pesan
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#settings_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">settings</i> Edit Biodata
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#logs_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">local_activity</i> Logs
                                    </a>
                                </li>
                            </ul>
                            <!-- INFORMASI DETAIL SISWA -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                    <!--INFORMASI KEUANGAN-->
                                    <div class="row clearfix">
                                        <?php 
                                            include "kontenTransaksiMasuk.php"; 
                                            include "kontenKewajibanPembayaran.php";
                                            include "kontenKewajibanPembayaranKhusus.php";
                                            include "kontenStatusPembayaran.php";
                                            #include "kontenStatusPembayaranKhusus.php";
                                            include "kontenRiwayatTransaksi.php";
                                        ?>
                                    </div>
                                    <!-- #END# Basic Table -->
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                    <b>Akun Pengguna Siswa - <span class="font-bold col-teal">Tunggu Pembaruan Selanjutnya</span></b>
                                    <p>
                                        Akun Pengguna Siswa adalah akun yang diberikan kepada siswa untuk dapat mengakses
                                        riwayat transaksi dan juga status pembayaran siswa tersebut.
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title">
                                    <b>Fitur Pesan - <span class="font-bold col-teal">Tunggu Pembaruan Selanjutnya</span></b>
                                    <p>
                                        Dengan fitur pesan, siswa dapat mengirim pesan kepada admin maupun sesama siswa yang sudah mempunyai akun.
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="settings_with_icon_title">
                                    <b>Edit Biodata <?php echo $profil['nama_siswa'] ?></b>
                                    <p>
                                        <?php include "editProfilSiswa.php"; ?>
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="logs_with_icon_title">
                                    <b>Log Aktivitas Siswa - <span class="font-bold col-teal">Tunggu Pembaruan Selanjutnya</span></b>
                                    <p>
                                     Melihat aktivitas yang dilakukan siswa dalam aplikasi.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->
        </div>
    </div>
</div>
