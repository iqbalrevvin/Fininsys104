<?php
@session_start();
    include"../../../../../server/configdb.php";
    include"../../../../../server/Functions.php";
    include"../../../../../admin/query/session.php";
    include"../../../../../admin/WEBMASTER/Query/AkunPengguna/Siswa/tabelAkunSiswaQuery.php";
?>
<table class="table table-bordered table-striped table-hover datatable">

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
            while($data = $akunSiswaQr->fetch_object()) :
            $secure= md5(md5($data->no_idnt).md5('qwerty12345'));
        ?>
        <tr>
            <td style="text-align: left; vertical-align: middle; width: 10px;"><?= $no++; ?></td>
            <td style="text-align: left; vertical-align: middle;"><?= $data->no_idnt ?></td>
            <td style="text-align: left; vertical-align: middle;">
                <a href="?p=UserData&k=UserProfile&ID=<?= $data->no_idnt ?>&Secure=<?= $secure ?>">
                    <b><?= $data->nama_siswa ?></b>
                </a>
            </td>
            <?php 
                $users = $db->query("SELECT * FROM users WHERE no_idnt = '$data->no_idnt'") or die ($db->error);
                $cekAkun = $users->num_rows;
                $user = $users->fetch_object();
                if($cekAkun < 1){ ?>
                    <td style="text-align: left; vertical-align: middle;">-</td>
                    <td style="text-align: left; vertical-align: middle;">-</td>
                    <td style="text-align: left; vertical-align: middle;"><b>-</b></td>
                    <td style="text-align: left; vertical-align: middle;"><b>-</b></td>
                    <td style="width: 72px;">
                    <button type="button" class="btn bg-pink btn-xs waves-effect" 
                            data-toggle="modal" id="modal-color2" data-color="teal" data-target="">
                            <span><i class="material-icons">mode_edit</i> BUAT </span> 
                    </button>
                    <input type="hidden" class="form-control" value="<?php echo $session['pass'] ?>" maxlength="50" id="passconfirm<?= $data->no_idnt ?>" minlength="1" required>                       
            </td>
            <?php }else{ ?>
                    <td style="text-align: left; vertical-align: middle;"><?= $user->username ?></td>
                    <td style="text-align: left; vertical-align: middle;"><?= LevelName($user->level) ?></td>
                    <td style="text-align: left; vertical-align: middle;">
                        <?= Aktivasi($user->status) ?>
                    </td>
                    <td style="text-align: left; vertical-align: middle;"><?= online($user->online) ?></td>
                    <td style="width: 72px;">
                    <button type="button" class="btn bg-teal btn-xs waves-effect" 
                            data-toggle="modal" id="modal-color2" data-color="teal" data-target="#editAkunSiswa<?= $user->no_idnt ?>">
                            <span><i class="material-icons">mode_edit</i> UBAH </span> 
                    </button>
                    <input type="hidden" class="form-control" value="<?php echo $session['pass'] ?>" maxlength="50" id="passconfirm<?= $data->no_idnt ?>" minlength="1" required>                       
            </td> 
            <?php } ?>
            <?php include "modal_editAkunSiswa.php"; ?>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>