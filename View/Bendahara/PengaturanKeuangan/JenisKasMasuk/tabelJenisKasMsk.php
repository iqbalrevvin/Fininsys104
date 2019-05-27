<?php 
    include "../../../../Config/ConfigDB.php";
    include "../../../../Controller/Bendahara/PengaturanKeuangan/JenisKasMasuk/tabelJenisKasMsk.php"; 
?>
        <div class="card">
            <div class="body">
                <div class="table-responsive">
                 <table class="table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="font-bold col-black">Nama Jenis Kas</th>
                            <th style="text-align: center; vertical-align: middle;">Act</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th class="font-bold col-black">Nama Jenis Kas</th>
                            <th style="text-align: center; vertical-align: middle;">Act</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $no = 1; 
                            while($jenisKas=$dftJnsKasMskQr->fetch_object()) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><b><?= $jenisKas->nama_jenis_kas ?></b></td>
                            <td style="text-align: center; vertical-align: middle;">
                                <button type="button" class="btn bg-teal btn-xs waves-effect" 
                                        data-toggle="modal" data-target="#editJnsKasMsk<?= $jenisKas->idJenis_kas ?>">  
                                        <i class="material-icons">mode_edit</i>
                                </button>
                                <button type="button" class="btn bg-pink btn-xs waves-effect btnDelJnsKasMsk" 
                                        data-toggle="modal" data-delete="<?= $jenisKas->nama_jenis_kas ?>" 
                                        data-id="<?= $jenisKas->idJenis_kas ?>" 
                                        value="<?= $jenisKas->idJenis_kas ?>">  
                                        <i class="material-icons">remove_circle</i>
                                </button>
                            </td>
                        </tr>
                        <?php include "modal_editJenisKasMsk.php"; ?>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>










