<div class="card">
                <div class="header">
                    <h2>
                        Riwayat Transaksi <?php echo $profil['nama_siswa'] ?>
                        <small>Riwayat Transaksi Siswa</small>
                    </h2>                
                </div>
                <div class="body table-responsive">
                    <table class="table table-bordered table-striped table-hover" 
                            style="width: 700px; height: 53px; margin-left: auto; margin-right: auto;" border="5">
                        <thead style="background-color:#e0ddf0;">
                            <tr >
                                <th style="vertical-align: middle; text-align: center;">#</th>
                                <th style="vertical-align: middle; text-align: center;">No Transaksi</th>
                                <th style="vertical-align: middle; text-align: center;">Jenis</th>
                                <th style="vertical-align: middle; text-align: center;">Tgl Trnsksi</th>
                                <th style="vertical-align: middle; text-align: center;">Jam Transaksi</th>
                                <th style="vertical-align: middle; text-align: center;">Jumlah</th>
                            </tr>
                        </thead>
                        <tfoot >
                            <tr>
                                <th style="vertical-align: middle; text-align: center;">#</th>
                                <th style="vertical-align: middle; text-align: center;" >No Transaksi</th>
                                <th style="vertical-align: middle; text-align: center;">Jenis</th>
                                <th style="vertical-align: middle; text-align: center;">Tgl Trnsksi</th>
                                <th style="vertical-align: middle; text-align: center;">Jam Transaksi</th>
                                <th style="vertical-align: middle; text-align: center;">
                                    <h5>Rp.<?php echo number_format($jumlah['jumlah']) ?>.-</h5>
                                </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            include "Controller/Bendahara/DaftarSiswa/ProfilSiswa/riwayatTransaksiQuery.php";
                            $no = 1;
                            while($rwy = mysqli_fetch_array($rwyTransQuery)){
                            $scure= md5(md5($rwy['no_transaksi']).md5('qwerty12345'));     
                            ?>
                            <tr style="vertical-align: middle; text-align: center;">
                                <td><?php echo $no++; ?></td>
                                <td>
                                    <a class="font-bold col-teal" href="?p=Transaction&k=Print&Inv=<?php echo $rwy['no_transaksi'] ?>&Scure=<?php echo $scure ?>"> 
                                        <?php echo $rwy['no_transaksi'] ?>
                                    </a>
                                </td>
                                <td><?php echo $rwy['nama_jenis_transaksi'] ?></td>
                                <td><?php echo $rwy['tgl_transaksi'] ?></td>
                                <td><?php echo $rwy['jam_transaksi'] ?></td>
                                <td><?php echo "<b>Rp.".number_format($rwy['jumlah_bayar']).",-</b>" ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
                                    