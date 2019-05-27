<?php 
    include "../../../../Config/configdb.php";
    include "../../../../Controller/Bendahara/Kas/KasKhusus/masterKasKhususQuery.php"; 
?>
        <div class="card">
            <div class="body">
                <div class="table-responsive">
                 <table class="table table-bordered table-striped table-hover datatable">
                        <thead>
                            <tr>
                                <th class="font-bold col-black">#</th>
                                <th class="font-bold col-black">Nama Master Kas Khusus</th>
                                <th class="font-bold col-black">Tahun</th>
                                <th class="font-bold col-black" style="text-align: center; vertical-align: middle;">Act</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="font-bold col-black">#</th>
                                <th class="font-bold col-black">Nama Master Kas Khusus</th>
                                <th class="font-bold col-black">Tahun</th>
                                <th class="font-bold col-black" style="text-align: center; vertical-align: middle;">Act</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                $no = 1; 
                                while($master=$masterKasKhususQr->fetch_object()) :

                                $scure= md5(md5($master->idMaster_kas).md5('qwerty12345'));
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><b><?= $master->nama_master_kas ?></b></td>
                                <td><b><?= $master->tahun_master_kas ?></b></td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <button type="button" class="btn bg-teal btn-xs waves-effect" 
                                            data-toggle="modal" data-target="#editMasterKasKhusus<?= $master->idMaster_kas ?>">  
                                            <i class="material-icons">mode_edit</i>
                                    </button>
                                    <button type="button" class="btn bg-pink btn-xs waves-effect btnDelMasterKasKhusus" 
                                            data-toggle="modal" data-delete="<?= $master->nama_master_kas ?>" 
                                            data-id="<?= $master->idMaster_kas ?>" 
                                            value="<?= $master->idMaster_kas ?>">  
                                            <i class="material-icons">remove_circle</i>
                                    </button>

                                    <a href="?p=SpecialCash&k=Manage&ID=<?= $master->idMaster_kas ?>&Scure=<?= $scure ?>">
                                    <button class="btn bg-blue btn-xs waves-effect" id="kelola" value="<?= $master->idMaster_kas ?>" onclick='kelolaKasKhusus();'>
                                            <i class="material-icons">attach_money</i>
                                            <span>Kelola</span>
                                    </button>
                                    </a>
                                </td>
                            </tr>
                            <?php include "modal_editMasterKasKhusus.php"; ?>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

