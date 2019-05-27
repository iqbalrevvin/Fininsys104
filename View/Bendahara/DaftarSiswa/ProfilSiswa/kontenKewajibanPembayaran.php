<div class="card">
    <div class="header">
        <h2>
            Kewajiban Pembayaran Reguler
            <?php if($profil['pindahan'] == 'YA'){ ?>
            <small>
                Rekapitulasi Kewajiban Pembayaran Siswa Ke Sekolah Hingga Semester <?php echo $profil['pindah_di_semester'] ?>
            </small>
            <?php }else{ ?>
            <small>
                Rekapitulasi Kewajiban Pembayaran Siswa Ke Sekolah Hingga Semester <?php echo $semester ?>
            </small>
            <?php } ?>
        </h2>    
    </div>
    <div class="body table-responsive">
        <table class="table table-bordered table-striped table-hover" 
               style="width: 700px; height: 53px; margin-left: auto; margin-right: auto;" border="5">
            <thead style="background-color:#e0ddf0;">
                <tr>
                    <th>#</th>
                    <th>Jenis</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>         
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
                                                            AND '$semester' AND idJurusan = '$profil[idJurusan]'
                                                            AND tahun_angkatan = '$angkatan'
                                                            AND tipe_jenis_transaksi = 'REGULER'
                                                            ORDER BY set_semester ");
                }else{
                    $kewajibanQuery = mysqli_query($db, "SELECT * FROM jenis_transaksi 
                                                        JOIN master_transaksi 
                                                        ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                                                            WHERE set_semester BETWEEN '1'
                                                            AND '$semester' AND idJurusan = '$profil[idJurusan]'
                                                            AND tahun_angkatan = '$angkatan'
                                                            AND tipe_jenis_transaksi = 'REGULER'
                                                            ORDER BY set_semester ");
                }
                while($kewajiban = mysqli_fetch_array($kewajibanQuery)){
                ?>
                <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?php echo $kewajiban['nama_jenis_transaksi'] ?></td>
                    <td><?php echo $kewajiban['keterangan_transaksi'] ?></td>
                    <td><strong>Rp.<?php echo number_format($kewajiban['kewajiban']) ?>.-</strong></td>            
                </tr>             
                <?php } ?>
                <tr class="font-bold" style="background-color: #e0ddf0;">
                    <td style="text-align: left; vertical-align: middle;" colspan="3">
                        Jumlah Kewajiban Reguler Yg Harus Di Penuhi Hingga Semester <?php echo $semester ?>
                    </td>
                    <?php
                    //Kewajiban Yang Harus DI bayar
                    if($profil['pindahan'] == 'YA'){ 
                        $jmlKwjbnQuery=mysqli_query($db, "select SUM(kewajiban) AS jmlKwjbn 
                                                        FROM jenis_transaksi JOIN master_transaksi 
                                                        ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi 
                                                        WHERE set_semester between '$profil[pindah_di_semester]' 
                                                        and '$semester' AND idJurusan = '$profil[idJurusan]'
                                                        AND tipe_jenis_transaksi = 'REGULER'
                                                        AND tahun_angkatan = '$angkatan'");
                    }else{
                        $jmlKwjbnQuery=mysqli_query($db, "select SUM(kewajiban) AS jmlKwjbn 
                                                        FROM jenis_transaksi JOIN master_transaksi 
                                                        ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi WHERE 
                                                        set_semester between '1' and '$semester' AND idJurusan = '$profil[idJurusan]'
                                                        AND tipe_jenis_transaksi = 'REGULER'
                                                        AND tahun_angkatan = '$angkatan'");
                    }
                        $jmlKwjbn=mysqli_fetch_array($jmlKwjbnQuery);
                        $jmlKewajiban = $jmlKwjbn['jmlKwjbn'];
                    ?>
                    <td>
                        <h4>Rp.<?php echo number_format($jmlKewajiban) ?>.-</h4>
                    </td>
                </tr>
                <tr class="font-bold" style="background-color: #e0ddf0;">
                    <td style="text-align: left; vertical-align: middle;" colspan="3">
                        Jumlah Kewajiban Reguler Yg Sudah Di Penuhi Hingga Semester <?php echo $semester ?>
                    </td>
                    <?php
                    //Kewajiban Yang Sudah Bayar
                        $jmlKewajiban = $jmlKwjbn['jmlKwjbn'];
                        if($profil['pindahan'] == 'YA'){
                            $total=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah 
                                                        FROM transaksi JOIN jenis_transaksi 
                                                        ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi 
                                                        WHERE set_semester between '$profil[pindah_di_semester]' AND '$semester' AND transaksi.no_idnt = '$profil[no_idnt]'");
                            
                        }else{
                            $total=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah 
                                                        FROM transaksi JOIN jenis_transaksi 
                                                        ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi 
                                                        WHERE tipe_jenis_transaksi = 'REGULER' AND set_semester between '1' AND '$semester' AND transaksi.no_idnt = '$profil[no_idnt]'");
                        }
                                    
                        $jumlah=mysqli_fetch_array($total);
                        $jumlahBayar = $jumlah['jumlah'];
                        ?>
                        <td>
                            <h4>Rp.<?php echo number_format($jumlahBayar) ?>.-</h4>
                        </td>
                        </tr> 
                        <tr class="font-bold" style="background-color: #e0ddf0;">
                        <td style="text-align: left; vertical-align: middle;" colspan="3">
                            Jumlah Tunggakan Hingga Semester <?php echo $semester ?>
                        </td>
                                <td>
                                        <?php 
                                            $tunggakansmstr = $jmlKewajiban-$jumlahBayar;
                                            if($tunggakansmstr>0){ 
                                        ?>
                                    <h4 class="font-bold col-pink">
                                        Rp.<?php echo number_format($tunggakansmstr) ?>.-
                                    </h4>
                                        <?php }else{ ?>
                                    <h4 class="font-bold col-teal">
                                        Rp.0.- / Selesai
                                    </h4>
                                        <?php } ?>
                                </td>
                            </tr>                   
                        </tbody>
                    </table>
                </div>
            </div>