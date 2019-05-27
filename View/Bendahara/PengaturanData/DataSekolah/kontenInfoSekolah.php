<div class="card">
            <div class="body">
                <?php if($sekolah['foto_sekolah']==''){ ?>
                    <img style="width:250px; height:250px;" class="profile-user-img img-responsive img-thumbnail" 
                                src="Assets/images/sekolah/sekolah-default.png" 
                                align="center" width="500" height="100" alt="School picture">
                <?php }else{ ?>
                <img style="text-align: center" class="profile-user-img img-responsive img-thumbnail" 
                     src="Assets/images/sekolah/<?php echo $sekolah['foto_sekolah'] ?>" 
                      width="300" height="300" alt="User profile picture">
                <?php } ?>
                <h4 style="text-align: center" class="profile-username text-center"><?php echo $sekolah['nama_sekolah'] ?></h4>
                <!--Identifikasi Jurusan-->
                <p class="text-muted text-center"><?php echo $sekolah['nama_yayasan'] ?></p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>NPSN</b> <span class="pull-right"><strong><?php echo $sekolah['npsn'] ?></strong></span>
                        </li>
                        <li class="list-group-item">
                            <b>Jenjang</b> <span class="pull-right"><strong><?php echo $sekolah['jenjang'] ?></strong></span>
                        </li>
                        <li class="list-group-item">
                            <b>Akreditasi</b> <span class="pull-right"><strong>"<?php echo $sekolah['akreditasi'] ?>"</strong></span>
                        </li>
                    </ul>

                    <hr>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Identitas Sekolah</strong>
                        <p class="text-muted font-12">
                            Nama Yayasan        : <?php echo $sekolah['nama_yayasan'] ?><br>
                            Nama Sekolah        : <?php echo $sekolah['nama_sekolah'] ?><br>
                            NPSN                : <?php echo $sekolah['npsn'] ?><br>
                            Akreditasi          : <?php echo $sekolah['akreditasi'] ?><br>
                            No. Akreditasi      : (<?php echo $sekolah['no_sk_akreditasi'] ?>)<br>
                            Jenjang             : <?php echo $sekolah['jenjang'] ?><br>
                            Tahun Berdiri       : <?php echo $sekolah['tahun_berdiri'] ?><br>
                        </p>
                        <strong><i class="fa fa-book margin-r-5"></i> Kontak Sekolah</strong>
                        <p class="text-muted font-12">
                            No. Telp        : <?php echo $sekolah['telp_sekolah'] ?><br>
                            Email           : <?php echo $sekolah['email_sekolah'] ?><br>
                            Website         : <a href="<?php echo $sekolah['website_sekolah'] ?>"><?php echo $sekolah['website_sekolah'] ?></a><br>
                           
                        </p>
                        <strong><i class="fa fa-book margin-r-5"></i> Alamat</strong>
                        <p class="text-muted font-12">
                            Alamat       : <?php echo $sekolah['alamat_sekolah'] ?><br>
                            Desa        : <?php echo $sekolah['desa_sekolah'] ?><br>
                            Kecamatan   : <?php echo $sekolah['kecamatan_sekolah'] ?><br>
                            Kab/Kota    : <?php echo $sekolah['kabupaten_sekolah'] ?><br>
                            Provinsi    : <?php echo $sekolah['provinsi_sekolah'] ?><br>
                            Kode Pos    : <?php echo $sekolah['kode_pos'] ?><br>
                        </p>
                        <strong><i class="fa fa-book margin-r-5"></i> Logo Sekolah</strong>
                        <p class="text-muted font-12">
                            <img style="text-align: center" class="profile-user-img img-responsive img-thumbnail" 
                                 src="Assets/images/sekolah/<?php echo $sekolah['logo_sekolah'] ?>" 
                                 width="300" height="300" alt="User profile picture">
                        </p>
                        <strong><i class="fa fa-book margin-r-5"></i> Logo Dinas</strong>
                        <p class="text-muted font-12">
                            <img style="text-align: center" class="profile-user-img img-responsive img-thumbnail" 
                                 src="Assets/images/sekolah/<?php echo $sekolah['logo_dinas'] ?>" 
                                 width="300" height="300" alt="User profile picture">
                        </p>
                        
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- About Me Box -->
        <!-- /.box -->
        </div>