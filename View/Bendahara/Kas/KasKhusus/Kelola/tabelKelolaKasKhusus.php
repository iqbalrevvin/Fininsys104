<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover datatable">
        <thead class="font-bold font-12">
            <tr>
                <th>#</th>
                <th>Kode Kas</th>
                <th>Jenis Kas</th>
                <th>Deskripsi</th>
                <th>Petugas</th>
                <th>Tanggal</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Act</th>
            </tr>
        </thead>
        <tfoot class="font-bold font-11">
            <tr>
                <th>#</th>
                <th>Kode Kas</th>
                <th>Jenis Kas</th>
                <th>Deskripsi</th>
                <th>Petugas</th>
                <th>Tanggal</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Act</th>
            </tr>
        </tfoot>
        <tbody class="font-12">
            <?php                    
                $no = 1;
                while($kas=$tbKelolaKasKhususQr->fetch_object()) :
                    #error_reporting(0);
                    $debit  = $kas->jml_kas_masuk;
                    $kredit = $kas->jml_kas_keluar;
                    #$saldo  += $debit - $kredit;
                    #$saldo2 = $saldo; */
            ?>
            <tr>
                <td><?= sprintf('%04d', $no++) ?></td>
                <td class="font-bold col-black"><?= $kas->no_kas ?></td>
                <td><?= $kas->nama_jenis_kas ?></td>
                <td>
                    <a href="#" id="modal-color3" data-color="grey" 
                       data-toggle="modal" data-target="#deskrip<?= $kas->idKas_khusus ?>">
                        <span class="font-12"><?= substr($kas->deskripsi,0,18) ?>...</span>
                    </a>
                </td>
                <td><?= $kas->petugas ?></td>
                <td><?= ubahTgl($kas->tgl_kas) ?></td>
                <td class="font-bold col-black">Rp.<?= number_format($debit) ?>.-</td>
                <td class="font-bold col-black">Rp.<?= number_format($kredit) ?>.-</td>
                <!--<td><?= number_format($saldo2) ?></td>-->
                <td>
                    <button type="button" class="btn bg-white btn-xs waves-effect" 
                            data-toggle="modal" data-target="#editKelolaKasKhusus<?= $kas->idKas_khusus ?>">  
                            <span class="font-bold font-12 col-teal">
                                <i class="material-icons">mode_edit</i>Edit
                            </span> 
                    </button>
                    <button class="btn bg-white btn-xs waves-effect btnDelKelolaKas"
                            data-toggle="modal" data-delete="<?= $kas->no_kas ?>" 
                            data-id="<?= $kas->idKas_khusus ?>" value="<?= $kas->idKas_khusus ?>">
                        <span class="font-bold font-12 col-red">
                            <i class="material-icons">delete_forever</i>Hapus
                        </span> 
                    </button>
                </td>
            </tr>
            <?php include "modal_deskripsiKelola.php"; ?>
            <?php include "modal_editKelolaKas.php"; ?>
            <?php endwhile; ?>
            <?php #include "modal_statusKasRekap.php"; ?>
        </tbody>
    </table>
</div>