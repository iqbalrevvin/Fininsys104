<div class="card">
            <div class="body">
                <?php if($profil['foto']==''){
                            if($profil['jenis_kelamin']=='L'){ ?>
                            <img style="width:250px; height:250px;" class="profile-user-img img-responsive img-circle" 
                                src="assets/images/pas-foto-siswa/user-L.png" 
                                align="center" width="300" height="300" alt="User profile picture">
                            <?php }else{?>
                                <img style="width:250px; height:250px;" class="profile-user-img img-responsive img-circle" 
                                src="assets/images/pas-foto-siswa/user-P.png" 
                                align="center" width="300" height="300" alt="User profile picture">
                            <?php } ?>

                <?php }else{ ?>
                <img style="text-align: center" class="profile-user-img img-responsive img-thumbnail" 
                     src="assets/images/pas-foto-siswa/<?php echo $profil['foto'] ?>" 
                      width="300" height="300" alt="User profile picture">
                <?php } ?>
                <h4 style="text-align: center" class="profile-username text-center"><?php echo $profil['nama_siswa'] ?></h4>
                <!--Identifikasi Jurusan-->
                <p class="text-muted text-center"><?php echo $profil['nama_jurusan'] ?></p>
                <p class="text-muted text-center"><?php echo $profil['nama_kelas'] ?></p>
                    <ul class="list-group list-group-unbordered">
                            <?php if($profil['pindahan'] == 'YA'){ ?>
                        <li class="list-group-item">
                            <b>Status</b> <span class="pull-right"><strong class="font-bold col-teal">Pindahan</strong></span>
                        </li>
                            <?php }else{} ?> 
                        <li class="list-group-item">
                            <b>Tingkat</b> <span class="pull-right"><strong><?php echo $grade ?></strong></span>
                        </li>
                        <li class="list-group-item">
                            <b>Semester</b> <span class="pull-right"><strong><?php echo $semester ?></strong></span>
                        </li>
                        <li class="list-group-item">
                            <b>Thn Angkatan</b> <span class="pull-right"><strong><?php echo $angkatan ?></strong></span>
                        </li>
                    </ul>
                    
                    <a class="btn bg-blue-grey btn-raised btn-block" 
                        href="?p=StudentList&k=StatusPrint&ID=<?php echo $profil['idSiswa'] ?>&Scure=<?php echo $scure ?>">
                            <i class="material-icons">print</i>
                            <span>Status Pembayaran</span> 
                    </a>
                    <a class="btn bg-grey btn-raised btn-block" 
                        href="?p=StudentList&k=HistoryPrint&ID=<?php echo $profil['idSiswa'] ?>&Scure=<?php echo $scure ?>">
                            <i class="material-icons">print</i>
                            <span>Riwayat Transaksi</span> 
                    </a>
                    <a class="btn bg-brown btn-raised btn-block" 
                        href="?p=StudentList&k=DebtPrint&ID=<?php echo $profil['idSiswa'] ?>&Scure=<?php echo $scure ?>">
                            <i class="material-icons">print</i>
                            <span>Rekap Tunggakan</span> 
                    </a>
                    <hr>
                    <!-- /.box-header -->
                    <div class="box-body">
                            <?php if($profil['pindahan'] == 'YA'){ ?>
                        <strong><i class="fa fa-book margin-r-5"></i> Status Pindahan</strong>
                        <p class="text-muted font-12">
                            Pindah Di Semester : <?php echo $profil['pindah_di_semester'] ?><br>
                            Tanggal Pindah     : <?php echo tgl_indo($profil['tgl_pindah']) ?><br>
                        </p>
                        <?php }else{} ?>
                        <strong><i class="fa fa-book margin-r-5"></i> Alamat</strong>
                        <p class="text-muted font-12">
                            Dusun       : <?php echo $profil['alamat'] ?><br>
                            Desa        : <?php echo $profil['desa'] ?><br>
                            Kecamatan   : <?php echo $profil['kecamatan'] ?><br>
                            Kab/Kota    : <?php echo $profil['kabupaten'] ?><br>
                            Provinsi    : <?php echo $profil['provinsi'] ?><br>
                        </p>
                        <strong><i class="fa fa-book margin-r-5"></i> Identitas</strong>
                        <p class="text-muted font-12">
                            No. Identitas   : <?php echo $profil['no_idnt'] ?><br>
                            NISN            : <?php echo $profil['nisn'] ?><br>
                            NIPD            : <?php echo $profil['nipd'] ?><br>
                            TTL             : <?php echo $profil['tempat_lahir'] ?>, <?php echo $profil['tgl_lahir'] ?><br>
                            No. Hp/WA       : <?php echo $profil['no_telp'] ?><br>
                            Email           : <?php echo $profil['email'] ?><br>
                        </p>
                        <strong><i class="fa fa-book margin-r-5"></i> Data Ayah</strong>
                        <p class="text-muted font-12">

                            <?php if($profil['nama_ayah']==''){ ?>
                            Nama Ayah   : <i class="font-10">Nama Ayah Belum Di Isi</i><br>
                            <?php }else{ ?>
                            Nama Ayah   : <?php echo $profil['nama_ayah'] ?><br>
                            <?php } ?>

                            <?php if($profil['tahun_lahir_ayah']==''){ ?>
                            Tahun Lahir   : <i class="font-10">Thn Lhr Ayah Blm Di Isi</i><br>
                            <?php }else{ ?>
                            Tahun Lahir : <?php echo $profil['tahun_lahir_ayah'] ?><br>
                            <?php } ?>

                            <?php if($profil['pendidikan_ayah']==''){ ?>
                            Pendidikan  : <i class="font-10">Pndkn Ayah Blm Di Isi</i><br>
                            <?php }else{ ?>
                            Pendidikan  : <?php echo $profil['pendidikan_ayah'] ?><br>
                            <?php } ?>

                            <?php if($profil['pekerjaan_ayah']==''){ ?>
                            Pekerjaan   : <i class="font-10">Pkrjn Ayah Blm Di Isi</i><br>
                            <?php }else{ ?>
                            Pekerjaan   : <?php echo $profil['pekerjaan_ayah'] ?><br>
                            <?php } ?>

                            <?php if($profil['penghasilan_ayah']==''){ ?>
                            Penghasilan : <i class="font-10">Pnghsln Ayah Blm Di Isi</i><br>
                            <?php }else{ ?>
                            Penghasilan : <?php echo $profil['penghasilan_ayah'] ?><br>
                            <?php } ?>
                        </p>
                        <strong><i class="fa fa-book margin-r-5"></i> Data Ibu</strong>
                        <p class="text-muted font-12">
                            <?php if($profil['nama_ibu']==''){ ?>
                            Nama Ibu   : <i class="font-10">Nama ibu Belum Di Isi</i><br>
                            <?php }else{ ?>
                            Nama Ibu   : <?php echo $profil['nama_ibu'] ?><br>
                            <?php } ?>

                            <?php if($profil['tahun_lahir_ibu']==''){ ?>
                            Tahun Lahir : <i class="font-10">Thn Lhr ibu Blm Di Isi</i><br>
                            <?php }else{ ?>
                            Tahun Lahir : <?php echo $profil['tahun_lahir_ibu'] ?><br>
                            <?php } ?>

                            <?php if($profil['pendidikan_ibu']==''){ ?>
                            Pendidikan  : <i class="font-10">Pndkn ibu Blm Di Isi</i><br>
                            <?php }else{ ?>
                            Pendidikan  : <?php echo $profil['pendidikan_ibu'] ?><br>
                            <?php } ?>

                            <?php if($profil['pekerjaan_ibu']==''){ ?>
                            Pekerjaan   : <i class="font-10">Pkrjn ibu Blm Di Isi</i><br>
                            <?php }else{ ?>
                            Pekerjaan   : <?php echo $profil['pekerjaan_ibu'] ?><br>
                            <?php } ?>

                            <?php if($profil['penghasilan_ibu']==''){ ?>
                            Penghasilan : <i class="font-10">Pnghsln ibu Blm Di Isi</i><br>
                            <?php }else{ ?>
                            Penghasilan   : <span class="font-12"><?php echo $profil['penghasilan_ibu'] ?></span><br>
                            <?php } ?>
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