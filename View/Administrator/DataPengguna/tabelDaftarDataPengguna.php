<?php
@session_start();

    include"../../../Config/ConfigDB.php";
    include"../../../Config/Functions.php";
    include"../../../Controller/Session.php";
    include"../../../Controller/Administrator/DataPengguna/tabelDataPenggunaQuery.php";

?>
<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
    <thead class="font-12 font-bold">
        <tr>
            <th style="text-align: left; vertical-align: middle;">#</th>
            <th style="text-align: left; vertical-align: middle;">No. Identitas</th>
            <th style="text-align: left; vertical-align: middle;">Nama</th>
            <th style="text-align: left; vertical-align: middle;">No. Induk</th>
            <th style="text-align: left; vertical-align: middle;">JK</th>
            <th style="text-align: left; vertical-align: middle;">Tempat Tgl Lahir</th>
            <th style="text-align: left; vertical-align: middle;">No. Telp</th>
            <th style="text-align: center; vertical-align: middle;">Act</th>
        </tr>
    </thead>

    <tfoot class="font-12">
        <tr>
            <th style="text-align: left; vertical-align: middle;">#</th>
            <th style="text-align: left; vertical-align: middle;">No. Identitas</th>
            <th style="text-align: left; vertical-align: middle;">Nama</th>
            <th style="text-align: left; vertical-align: middle;">No. Induk</th>
            <th style="text-align: left; vertical-align: middle;">JK</th>
            <th style="text-align: left; vertical-align: middle;">Tempat Tgl Lahir</th>
            <th style="text-align: left; vertical-align: middle;">No. Telp</th>
            <th style="text-align: center; vertical-align: middle;">Act</th>
        </tr>
    </tfoot>

    <tbody class="font-12">
        <?php
            $no = 1;
            while($data = $dataPenggunaQr->fetch_object()) :
            $secure= md5(md5($data->no_idnt).md5('qwerty12345'));
        ?>
        <tr>
            <td style="text-align: left; vertical-align: middle; width: 10px;"><?= $no++; ?></td>
            <td style="text-align: left; vertical-align: middle;"><?= $data->no_idnt ?></td>
            <td style="text-align: left; vertical-align: middle;">
                <a href="?p=UserData&k=UserProfile&ID=<?= $data->no_idnt ?>&Secure=<?= $secure ?>">
                    <b><?= $data->nama_admin ?></b>
                </a>
            </td>
            <td style="text-align: left; vertical-align: middle;"><?= $data->no_induk ?></td>
            <td style="text-align: left; vertical-align: middle;"><?= $data->jenis_kelamin ?></td>
            <td style="text-align: left; vertical-align: middle;">
                <?= $data->tempat_lahir ?>, <?= ubahTgl($data->tgl_lahir) ?>
            </td>
            <td style="text-align: left; vertical-align: middle;"><?= $data->no_telp ?></td>
            <td style="width: 72px;">
                <button type="button" class="btn bg-teal btn-xs waves-effect" 
                        data-toggle="modal" id="modal-color2" data-color="pink" data-target="#editdataAdmin<?= $data->no_idnt ?>">  
                        <i class="material-icons">mode_edit</i>
                </button>
                <button type="button" class="btn bg-pink btn-xs waves-effect" data-toggle="modal" data-target="#delDataPengguna<?= $data->no_idnt ?>">
                    <i class="material-icons">remove_circle</i>
                </button> 
                <input type="hidden" class="form-control" value="<?php echo $session['pass'] ?>" maxlength="50" id="passconfirm<?= $data->no_idnt ?>" minlength="1" required>                       
            </td> 
            <?php include "modal_editDataPengguna.php"; ?>
            <?php include "modal_deleteDataPengguna.php" ?> 
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>