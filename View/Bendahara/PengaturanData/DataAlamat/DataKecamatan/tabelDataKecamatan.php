<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
<?php require_once"../../../../../Controller/Bendahara/PengaturanData/DataAlamat/DataKecamatan/tabelKecamatanQuery.php"; ?>
<table class="table table-bordered table-striped table-hover datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Kecamatan</th>
            <th style="text-align: center; vertical-align: middle;">Act</th>
        </tr>
    </thead>                              
    <tbody>
    	<?php
        	$no = 1; 
        	while($kec=$dataKecamatanQr->fetch_object()):
    	?>
    	<tr>
        	<td><?= $no++; ?></td>
        	<td><b><?= $kec->nama_kecamatan ?></b></td>
        	<td style="text-align: center; vertical-align: middle;">
            	<button type="button" class="btn bg-teal btn-xs waves-effect" data-toggle="modal" data-target="#editKecamatan<?= $kec->idKecamatan ?>">
                	<i class="material-icons">mode_edit</i>
            	</button>
            	<button type="button" class="btn bg-pink btn-xs waves-effect btnDelKecamatan" 
						data-toggle="modal" data-delete="<?= $kec->nama_kecamatan ?>" 
                    	data-id="<?= $kec->idKecamatan ?>" value="<?= $kec->idKecamatan ?>">  
                	<i class="material-icons">remove_circle</i>
          		</button>
        	</td>
    	</tr>
    	<?php include "modal_editKecamatan.php"; ?>
    	<?php endwhile; ?>
	</tbody>
</table>
</div>
</div>
</div>
</div>