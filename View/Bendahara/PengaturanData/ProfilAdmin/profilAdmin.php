<?php
    include"Controller/Bendahara/PengaturanData/ProfilAdmin/profilAdminQuery.php";
    $admin = mysqli_fetch_array($profilAdminQuery);
?>
<div class="row clearfix">
    <div class="col-md-3">
        <!--Informasi Siswa-->
        <?php 
            
            include "kontenInfoAdmin.php";
        ?>
        <div class="col-md-9">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <button class="btn bg-blue-grey waves-effect" onClick="history.back();">
                            <i class="material-icons">keyboard_backspace</i>
                            <span>Kembali</span>
                        </button>
                        <div class="header">
                            <h2>
                                Informasi <?php echo $admin['nama_admin'] ?>
                            </h2>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#settings_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">settings</i> Biodata
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">face</i> Akun
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
                                <div role="tabpanel" class="tab-pane fade in active" id="settings_with_icon_title">
                                    <b>Biodata <?php echo $admin['nama_admin'] ?></b>
                                    <p>
                                        <?php include "editBiodataAdmin.php"; ?>
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                    <b>Akun <?php echo $admin['nama_admin'] ?></b>
                                    <p>
                                        <?php include "AkunAdmin/editAkunAdmin.php"; ?>
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="logs_with_icon_title">
                                    <b>Log Aktivitas - <span class="font-bold col-teal">Tunggu Pembaruan Selanjutnya</span></b>
                                    <p>
                                     Melihat aktivitas yang dilakukan dalam aplikasi.
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
