<div class="card">
    <div class="header">
        <h2>
            Status Rekapitulasi Tunggakan Khusus
            <small>Rekapitulasi Semua Tunggakan Khusus & Kewajiban Yg Sudah Selesai</small>
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
                    $kewajibanQuery = mysqli_query($db, "SELECT * FROM jenis_transaksi_khusus JOIN jenis_transaksi
                                                        ON jenis_transaksi_khusus.idJenis_transaksi = jenis_transaksi.idJenis_transaksi 
                                                        JOIN master_transaksi 
                                                        ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                                                        WHERE jenis_transaksi_khusus.no_idnt = '$profil[no_idnt]'
                                                        ORDER BY set_semester"); 
                                
                    while($kewajiban = mysqli_fetch_array($kewajibanQuery)){
                ?>
                <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?php echo $kewajiban['nama_jenis_transaksi'] ?></td>
                    <!--Jumlah yang sudah dibayar berdasarkan semester -->
                    <?php
                        $total=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah FROM transaksi WHERE no_idnt = '$profil[no_idnt]'
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
                            $jenisKewajibanQuery = mysqli_query($db, "SELECT * FROM jenis_transaksi_khusus JOIN jenis_transaksi
                                                        ON jenis_transaksi_khusus.idJenis_transaksi = jenis_transaksi.idJenis_transaksi 
                                                        WHERE jenis_transaksi_khusus.no_idnt = '$profil[no_idnt]'
                                                        ORDER BY set_semester");
                            $jenisKewajiban = mysqli_fetch_array($jenisKewajibanQuery);
                            $total=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah FROM transaksi WHERE no_idnt = '$profil[no_idnt]' 
                                                        AND idJenis_transaksi = '$jenisKewajiban[idJenis_transaksi]' ");
                            $jumlah=mysqli_fetch_array($total);
                        ?>
                        Jumlah Kewajiban Yg Masuk : <b>Rp.<?php echo number_format($jumlah['jumlah']) ?>.-</b>
                    </td>
                </tr>
                <!--Jumlah Kewajiban Yang Harus Dibayar -->
                <tr>
                    <td style="text-align: left; vertical-align: middle;" colspan="5">
                        <?php
                            $jmlKwjbnQuery=mysqli_query($db, "select SUM(kewajiban) AS jmlKwjbn 
                                                        FROM jenis_transaksi_khusus JOIN jenis_transaksi
                                                        ON jenis_transaksi_khusus.idJenis_transaksi = jenis_transaksi.idJenis_transaksi 
                                                        WHERE jenis_transaksi_khusus.no_idnt = '$profil[no_idnt]'"); 
                            $jmlKwjbn=mysqli_fetch_array($jmlKwjbnQuery);
                            $jmlKewajiban = $jmlKwjbn['jmlKwjbn'];
                        ?>
                        Jumlah Kewajiban Yg Harus di Penuhi: 
                        <b>Rp.<?php echo number_format($jmlKewajiban) ?>.-</b>
                    </td>
                </tr>
                <tr class="font-bold" style="background-color: #e0ddf0;">
                    <td style="text-align: left; vertical-align: middle;" colspan="5">
                        <?php 
                            $tunggakan =  $jumlah['jumlah'] - $jmlKewajiban;
                            if($tunggakan<0){ 
                        ?>
                        Tunggakan Keseluruhan  : 
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