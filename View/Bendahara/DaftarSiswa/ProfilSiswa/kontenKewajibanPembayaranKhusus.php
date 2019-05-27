<div class="card">
    <div class="header">
        <h2>
            Kewajiban Pembayaran <b>Khusus / Tambahan</b>
            <?php if($profil['pindahan'] == 'YA'){ ?>
            <small>
                Rekapitulasi Kewajiban Pembayaran <b>Khusus / Tambahan</b> Siswa Ke Sekolah
            </small>
            <?php }else{ ?>
            <small>
                Rekapitulasi Kewajiban Pembayaran <b>Khusus / Tambahan</b> Siswa Ke Sekolah 
            </small>
            <?php } ?>
        </h2>  
        <button type="button" class="btn bg-teal btn-xs waves-effect" data-toggle="modal" data-target="#modalAddPembayaranKhusus">
            <i class="material-icons">note_add</i>
            <span>Tambah Pembayaran Khusus</span>
        </button>
        <?php include "modal_addPembayaranKhusus.php"; ?>
    </div>
    <div class="body table-responsive">
        <table class="table table-bordered table-striped table-hover" 
               style="width: 700px; height: 53px; margin-left: auto; margin-right: auto;" border="5">
            <thead style="background-color:#e0ddf0;">
                <tr>
                    <th style="text-align: center; vertical-align: middle;">Act</th> 
                    <th>No.</th>
                    <th>Jenis</th>
                    <th>Keterangan</th>
                    <th>Tahun</th>
                    <th>Jumlah</th> 
                           
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $kewajibanQuery = mysqli_query($db, "SELECT * FROM jenis_transaksi_khusus JOIN jenis_transaksi
                                                    ON jenis_transaksi_khusus.idJenis_transaksi = jenis_transaksi.idJenis_transaksi
                                                    JOIN master_transaksi 
                                                    ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi 
                                                    WHERE no_idnt = '$profil[no_idnt]' ORDER BY idJenis_transaksi_khusus");

                while($kewajiban = mysqli_fetch_array($kewajibanQuery)){
                ?>
                <tr>
                    <td style="text-align: center; vertical-align: middle;">
                        <button type="button" class="btn bg-red btn-xs waves-effect delJenisTransaksiKhusus" data-toggle="modal" 
                                data-delete="<?= $kewajiban['nama_jenis_transaksi'] ?>"
                                value="<?= $kewajiban['idJenis_transaksi_khusus'] ?>">
                            <i class="material-icons">delete_sweep</i>
                        </button>
                    </td>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?= $kewajiban['nama_jenis_transaksi'] ?></td>
                    <td><?= $kewajiban['keterangan_transaksi'] ?></td>
                    <td><?= $kewajiban['tahun_pembayaran'] ?></td>
                    <td><strong>Rp.<?php echo number_format($kewajiban['kewajiban']) ?>.-</strong></td>   
                </tr>             
                <?php } ?>
                <tr class="font-bold" style="background-color: #e0ddf0;">
                    <td style="text-align: left; vertical-align: middle;" colspan="5">
                        Jumlah Kewajiban <b>Khusus / Tambahan</b> Yg Harus Di Penuhi
                    </td>
                    <?php
                        $jmlKwjbnQuery=mysqli_query($db, "select SUM(kewajiban) AS jmlKwjbn 
                                                        FROM jenis_transaksi_khusus JOIN jenis_transaksi
                                                        ON jenis_transaksi_khusus.idJenis_transaksi = jenis_transaksi.idJenis_transaksi 
                                                        JOIN master_transaksi 
                                                        ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi WHERE 
                                                        no_idnt = '$profil[no_idnt]' ORDER BY set_semester");
                        $jmlKwjbn=mysqli_fetch_array($jmlKwjbnQuery);
                        $jmlKewajiban = $jmlKwjbn['jmlKwjbn'];
                    ?>
                    <td>
                        <h4>Rp.<?php echo number_format($jmlKewajiban) ?>.-</h4>
                    </td>
                </tr>
                <tr class="font-bold" style="background-color: #e0ddf0;">
                    <td style="text-align: left; vertical-align: middle;" colspan="5">
                        Jumlah Kewajiban <b>Khusus / Tambahan</b> Yg Sudah Di Penuhi
                    </td>
                    <?php
                    //Kewajiban Yang Sudah Bayar

                            $total = $db->query("SELECT sum(jumlah_bayar) AS jumlah FROM transaksi 
                                                JOIN jenis_transaksi 
                                                ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi
                                                WHERE transaksi.no_idnt = '$profil[no_idnt]' 
                                                AND jenis_transaksi.tipe_jenis_transaksi = 'KHUSUS'") or die ($db->error);
                            $jumlah = $total->fetch_object();
                            $jumlahBayar = $jumlah->jumlah;
                        ?>
                        <td>
                            <h4>Rp.<?php echo number_format($jumlahBayar) ?>.-</h4>
                        </td>
                        </tr> 
                        <?php 
                            $tunggakansmstr = $jumlahBayar-$jmlKewajiban;
                        ?>
                        <tr class="font-bold" style="background-color: #e0ddf0;">
                        <td style="text-align: left; vertical-align: middle;" colspan="5">
                            <?php if($tunggakansmstr>0){ ?> 
                            Jumlah Simpanan Di Kewajiban <b>Khusus / Tambahan</b>
                            <?php }else{ ?>
                            Jumlah Tunggakan Kewajiban <b>Khusus / Tambahan</b>
                            <?php } ?>
                        </td>
                                <td>
                                        <?php 
                                            $tunggakansmstr = $jumlahBayar-$jmlKewajiban;
                                            if($tunggakansmstr>0){ 
                                        ?>
                                    <h4 class="font-bold col-teal">
                                        Rp.<?php echo number_format($tunggakansmstr) ?>.-
                                    </h4>
                                        <?php }else{ ?>
                                    <h4 class="font-bold col-teal">
                                        <b class="font-bold col-pink">Rp.<?php echo number_format($tunggakansmstr) ?>.-</b>
                                    </h4>
                                        <?php } ?>
                                </td>
                            </tr>                   
                        </tbody>
                    </table>
                </div>
            </div>