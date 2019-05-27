<div class="card">
                <div class="header">
                    <h2>
                        Status Rekapitulasi Tunggakan Reguler
                        <small>Rekapitulasi Semua Tunggakan Reguler & Kewajiban Yg Sudah Selesai</small>
                    </h2>                
                </div>
                <div class="body table-responsive">
                    <table class="table table-bordered table-striped table-hover" 
                            style="width: 700px; height: 53px; margin-left: auto; margin-right: auto;" border="5">
                        <thead style="background-color:#e0ddf0;">
                            <tr>
                                <th>#</th>
                                <th>Jenis</th>
                                <th>Masuk</th>
                                <th>Kewajiban</th>
                                <th>Status</th>           
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                $no = 1;
                                if($profil['pindahan'] == 'YA'){ 
                                $kewajibanQuery = mysqli_query($db, "SELECT * FROM jenis_transaksi 
                                                        JOIN master_transaksi 
                                                        ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                                                            WHERE set_semester BETWEEN '$profil[pindah_di_semester]'
                                                            AND '$profil[jumlah_semester]' AND idJurusan = '$profil[idJurusan]'
                                                            AND tahun_angkatan = '$angkatan'
                                                            AND tipe_jenis_transaksi = 'REGULER'
                                                            ORDER BY set_semester ");
                                }else{
                                   $kewajibanQuery = mysqli_query($db, "SELECT * FROM jenis_transaksi 
                                                        JOIN master_transaksi 
                                                        ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                                                            WHERE set_semester BETWEEN '1'
                                                            AND '$profil[jumlah_semester]' AND idJurusan = '$profil[idJurusan]'
                                                            AND tahun_angkatan = '$angkatan'
                                                            AND tipe_jenis_transaksi = 'REGULER'
                                                            ORDER BY set_semester "); 
                                }
                                while($kewajiban = mysqli_fetch_array($kewajibanQuery)){
                                ?>
                            <tr>
                                <th scope="row"><?php echo $no++ ?></th>
                                <td><?php echo $kewajiban['nama_jenis_transaksi'] ?></td>
                                <!--Jumlah yang sudah dibayar berdasarkan semester -->
                                    <?php
                                    
                                    $total=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah 
                                                          FROM transaksi 
                                                          WHERE no_idnt = '$profil[no_idnt]'
                                                          AND idJenis_transaksi = '$kewajiban[idJenis_transaksi]'");
                                        $jumlah=mysqli_fetch_array($total);
                                    ?>
                                    <?php if($jumlah['jumlah']==''){ ?>
                                <td>Rp. 0,-</td> 
                                    <?php }else{ ?>  
                                <td><strong>Rp.<?php echo number_format($jumlah['jumlah']) ?>.-</strong></td>
                                    <?php } ?>
                                    <!--Jumlah Kewajiban yang harus dibayar berdasarkan semester -->
                                <td>Rp.<?php echo number_format($kewajiban['kewajiban']) ?>.-</td>
                                    <!--Status Pembayaran-->
                                    <?php if($jumlah['jumlah']>=$kewajiban['kewajiban']){ ?>
                                <td class="font-bold col-teal">Selesai</td>    
                                    <?php }else{ ?>
                                <td class="font-bold col-pink">Belum Selesai</td>  
                                    <?php } ?>
                            </tr>
                                <?php } ?>
                                <!--Jumlah Semua Transaksi Yang Masuk -->
                            <tr>
                                <td style="text-align: left; vertical-align: middle;" colspan="5">
                                    <?php
                                        $jenisQuery = mysqli_query($db, "SELECT * FROM transaksi JOIN jenis_transaksi 
                                                        ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi
                                                        JOIN master_transaksi 
                                                        ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                                                            WHERE idJurusan = '$profil[idJurusan]'
                                                            AND tahun_angkatan = '$angkatan'
                                                            AND tipe_jenis_transaksi = 'REGULER'
                                                            ORDER BY transaksi.idJenis_transaksi DESC");
                                        $jenis = mysqli_fetch_array($jenisQuery);
                                        $total=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah 
                                                                    FROM transaksi WHERE no_idnt = '$profil[no_idnt]' 
                                                                    AND idJenis_transaksi BETWEEN '1' 
                                                                    AND '$jenis[idJenis_transaksi]' 
                                                                    ");
                                        $jumlah=mysqli_fetch_array($total);
                                        ?>
                                    Jumlah Kewajiban Reguler Yg Masuk : <b>Rp.<?php echo number_format($jumlah['jumlah']) ?>.-</b>
                                </td>
                            </tr>
                    <!--Jumlah Kewajiban Yang Harus Dibayar -->
                            <tr>
                                <td style="text-align: left; vertical-align: middle;" colspan="5">
                                    <?php
                                        if($profil['pindahan'] == 'YA'){ 
                                            $jmlKwjbnQuery=mysqli_query($db, "select SUM(kewajiban) AS jmlKwjbn 
                                                        FROM jenis_transaksi JOIN master_transaksi 
                                                        ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                                                        WHERE set_semester BETWEEN '$profil[pindah_di_semester]'
                                                        AND '$profil[jumlah_semester]' 
                                                        AND master_transaksi.idJurusan = '$profil[idJurusan]'
                                                        AND tahun_angkatan = '$angkatan'
                                                        AND tipe_jenis_transaksi = 'REGULER' ");
                                        }else{
                                           $jmlKwjbnQuery=mysqli_query($db, "select SUM(kewajiban) AS jmlKwjbn 
                                                        FROM jenis_transaksi JOIN master_transaksi 
                                                        ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                                                        WHERE set_semester BETWEEN '1'
                                                        AND '$profil[jumlah_semester]' 
                                                        AND master_transaksi.idJurusan = '$profil[idJurusan]' 
                                                        AND tahun_angkatan = '$angkatan'
                                                        AND tipe_jenis_transaksi = 'REGULER'"); 
                                        }
                                        $jmlKwjbn=mysqli_fetch_array($jmlKwjbnQuery);
                                        $jmlKewajiban = $jmlKwjbn['jmlKwjbn'];
                                        ?>
                                    Jumlah Kewajiban Reguler Yg Harus di Penuhi: 
                                    <b>Rp.<?php echo number_format($jmlKewajiban) ?>.-</b>
                                </td>
                            </tr>
                            <tr class="font-bold" style="background-color: #e0ddf0;">
                                <td style="text-align: left; vertical-align: middle;" colspan="5">
                                        <?php 
                                            $tunggakan =  $jumlah['jumlah'] - $jmlKewajiban;
                                            if($tunggakan<0){ 
                                        ?>
                                    Tunggakan Reguler Keseluruhan  : 
                                    <b class="font-bold col-pink">Rp.<?php echo number_format($tunggakan) ?>.-</b>
                                        <?php }else{ ?>
                                    Simpanan    :
                                    <b class="font-bold col-teal">Rp.<?php echo number_format($tunggakan) ?>.-</b>
                                        <?php } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>