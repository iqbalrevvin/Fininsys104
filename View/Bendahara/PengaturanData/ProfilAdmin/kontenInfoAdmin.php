<div class="card">
            <div class="body">
                <?php if($admin['foto']==''){
                    GenderFoto($admin['jenis_kelamin']);
                }else{ ?>
                <img style="text-align: center" class="profile-user-img img-responsive img-thumbnail" 
                     src="Assets/images/admin/<?php echo $admin['foto'] ?>" 
                      width="300" height="300" alt="User profile picture">
                <?php } ?>
                <h4 style="text-align: center" class="profile-username text-center"><?php echo $admin['nama_admin'] ?></h4>
                <!--Identifikasi Jurusan-->
                <p class="text-muted text-center"><?= LevelName($admin['level']) ?>
                </p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>No. Induk</b> <span class="pull-right"><strong><?php echo $admin['no_induk'] ?></strong></span>
                        </li>
                        <li class="list-group-item">
                            <b>Status</b> <span class="pull-right"><strong><?php echo $admin['status'] ?></strong></span>
                        </li>
                    </ul>

                    <hr>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Alamat</strong>
                        <p class="text-muted font-12">
                            Dusun       : <?php echo $admin['alamat'] ?><br>
                            Desa        : <?php echo $admin['desa'] ?><br>
                            Kecamatan   : <?php echo $admin['kecamatan'] ?><br>
                            Kab/Kota    : <?php echo $admin['kabupaten'] ?><br>
                            Provinsi    : <?php echo $admin['provinsi'] ?><br>
                        </p>
                        <strong><i class="fa fa-book margin-r-5"></i> Identitas</strong>
                        <p class="text-muted font-12">
                            No. Identitas   : <?php echo $admin['no_idnt'] ?><br>
                            No. Induk       : <?php echo $admin['no_induk'] ?><br>
                            TTL             : <?php echo $admin['tempat_lahir'] ?>, <?php echo $admin['tgl_lahir'] ?><br>
                            No. Hp/WA       : <?php echo $admin['no_telp'] ?><br>
                            Email           : <?php echo $admin['email'] ?><br>
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