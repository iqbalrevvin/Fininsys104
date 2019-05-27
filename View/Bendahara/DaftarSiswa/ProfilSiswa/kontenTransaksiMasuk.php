<div class="card">
    <div class="header">
        <h2>
            Transaksi Masuk
                <small>Rekapitulasi Transaksi Masuk Ke Sekolah HIngga Semester <?php echo $semester ?> </small>
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
                    $TransaksiMasukQuery = mysqli_query($db, "SELECT DISTINCT transaksi.idJenis_transaksi, 
                                                                                  jenis_transaksi.idJenis_transaksi,
                                                                                  jenis_transaksi.nama_jenis_transaksi,
                                                                                  jenis_transaksi.keterangan_transaksi 
                                                                  FROM transaksi 
                                                                  JOIN jenis_transaksi 
                                                                  ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi
                                                                  WHERE no_idnt = '$profil[no_idnt]' ORDER BY set_semester
                                                                  ") or die ($db->error);
                    while ($TrnsMsk = mysqli_fetch_array($TransaksiMasukQuery)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $no++; ?></th>
                        <td><?php echo $TrnsMsk['nama_jenis_transaksi'] ?></td>
                        <td><?php echo $TrnsMsk['keterangan_transaksi'] ?></td>
                        <!--Identifikasi Jumlah Pembayaran PerJenis Transaksi-->
                            <?php
                            $total=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah 
                                                          FROM transaksi 
                                                          WHERE no_idnt = '$profil[no_idnt]' 
                                                          AND idJenis_transaksi = '$TrnsMsk[idJenis_transaksi]' ");
                            $jumlah=mysqli_fetch_array($total);
                            ?>
                        <td>
                            <strong>Rp.<?php echo number_format($jumlah['jumlah']) ?>.-</strong>
                        </td>
                        </tr>
                            <?php } ?>
                        <tr class="font-bold" style="background-color: #e0ddf0;">
                            <?php
                            $total=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah 
                                                          FROM transaksi WHERE no_idnt = '$profil[no_idnt]'");
                            $jumlah=mysqli_fetch_array($total);
                            ?>
                        <td style="text-align: center; vertical-align: middle;" colspan="3">
                            Jumlah Kewajiban Yg Sudah Di Penuhi
                        </td>
                        <td>
                            <u>
                                <h4><strong>Rp.<?php echo number_format($jumlah['jumlah']) ?>.-</strong></h4>
                            </u>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>