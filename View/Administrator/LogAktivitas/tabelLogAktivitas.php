<?php
@session_start();
    include"../../../Config/configdb.php";
    include"../../../Config/Functions.php";
    include"../../../Controller/session.php";
    include"../../../Controller/Administrator/LogAktivitas/tabelLogAktivitasQuery.php";
?>
<table class="table table-bordered table-striped table-hover datatable">
    <thead class="font-12 font-bold">
        <tr>
            <th style="text-align: left; vertical-align: middle;">Pengguna</th>
            <th style="text-align: left; vertical-align: middle;">Level</th>
            <th style="text-align: left; vertical-align: middle;">Jam</th>
            <th style="text-align: left; vertical-align: middle;">Perangakat/Browser</th>
            <th style="text-align: left; vertical-align: middle;">Deskripsi Log</th>
        </tr>
    </thead>

    <tfoot class="font-12">
        <tr>
            <th style="text-align: left; vertical-align: middle;">Pengguna</th>
            <th style="text-align: left; vertical-align: middle;">Level</th>
            <th style="text-align: left; vertical-align: middle;">Jam</th>
            <th style="text-align: left; vertical-align: middle;">Perangakat/Browser</th>
            <th style="text-align: left; vertical-align: middle;">Deskripsi Log</th>
        </tr>
    </tfoot>
    <tbody class="font-11">
        <?php
            $no = 1;
            while($log = $logAktivitasQr->fetch_object()) :
                $textHapus = $log->deskripsi_log
        ?>
        <tr>

            <td style="text-align: left; vertical-align: middle;"><?= $log->nama_tampilan ?></td>
            <td style="text-align: left; vertical-align: middle;"><?= LevelName($log->level) ?></td>
            <td style="text-align: left; vertical-align: middle;"><b><?= $log->jam_aktivitas ?></b></td>
            <td style="text-align: left; vertical-align: middle;"><?= device($log->mac_address) ?></td>
            <?php if(preg_match("/hapus/i", $textHapus) || preg_match("/gagal/i", $textHapus)) { ?>
            <td style=""><b class="col-red"><?= $log->deskripsi_log ?></b></td> 
            <?php }else{ ?>
            <td style=""><b class="col-black"><?= $log->deskripsi_log ?></b></td>
            <?php } ?>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
