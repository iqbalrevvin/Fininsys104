<?php
@session_start();
    include"../../../../Config/ConfigDB.php";
    include"../../../../Config/Functions.php";
    include"../../../../Controller/Session.php";
    include"../../../../Controller/Administrator/AkunPengguna/Admin/tabelAkunPenggunaQuery.php";
?>
<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
    <thead class="font-13 font-bold">
        <tr>
            <th style="text-align: left; vertical-align: middle;">#</th>
            <th style="text-align: left; vertical-align: middle;">No. Identitas</th>
            <th style="text-align: left; vertical-align: middle;">Nama</th>
            <th style="text-align: left; vertical-align: middle;">Username</th>
            <th style="text-align: left; vertical-align: middle;">Level</th>
            <th style="text-align: left; vertical-align: middle;">Aktivasi</th>
            <th style="text-align: left; vertical-align: middle;">Status</th>
            <th style="text-align: center; vertical-align: middle;">Act</th>
        </tr>
    </thead>

    <tfoot class="font-13">
        <tr>
            <th style="text-align: left; vertical-align: middle;">#</th>
            <th style="text-align: left; vertical-align: middle;">No. Identitas</th>
            <th style="text-align: left; vertical-align: middle;">Nama</th>
            <th style="text-align: left; vertical-align: middle;">Username</th>
            <th style="text-align: left; vertical-align: middle;">Level</th>
            <th style="text-align: left; vertical-align: middle;">Aktivasi</th>
            <th style="text-align: left; vertical-align: middle;">Status</th>
            <th style="text-align: center; vertical-align: middle;">Act</th>
        </tr>
    </tfoot>

    <tbody class="font-13">
        <?php
            $no = 1;
            while($data = $AkunPenggunaQr->fetch_object()) :
            $secure= md5(md5($data->no_idnt).md5('qwerty12345'));
            $cekNIP = $db->query("SELECT no_induk FROM admin WHERE no_idnt = '$data->no_idnt'") or die($db->error);
            $nip = $cekNIP->fetch_object();
        ?>
        <tr>
            <td style="text-align: left; vertical-align: middle; width: 10px;"><?= $no++; ?></td>
            <td style="text-align: left; vertical-align: middle;"><?= $data->no_idnt ?></td>
            <td style="text-align: left; vertical-align: middle;">
                <a href="?p=UserData&k=UserProfile&ID=<?= $data->no_idnt ?>&Secure=<?= $secure ?>">
                    <b><?= $data->nama_tampilan ?></b>
                </a>
            </td>
            <td style="text-align: left; vertical-align: middle;"><?= $data->username ?></td>
            <td style="text-align: left; vertical-align: middle;"><?= LevelName($data->level) ?></td>
            <td style="text-align: left; vertical-align: middle;">
                <?= Aktivasi($data->status) ?>
            </td>
            <td style="text-align: left; vertical-align: middle;"><?= online($data->online) ?></td>
            <td style="width: 72px;">
                <button type="button" class="btn bg-teal btn-xs waves-effect" 
                        data-toggle="modal" id="modal-color2" data-color="teal" data-target="#editAkunAdmin<?= $data->no_idnt ?>">
                        <span><i class="material-icons">mode_edit</i>Edit </span> 
                </button>
                <input type="hidden" class="form-control" value="<?php echo $session['pass'] ?>" maxlength="50" id="passconfirm<?= $data->no_idnt ?>" minlength="1" required>                       
            </td> 
            <?php include "modal_editAkunPengguna.php"; ?>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>