<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
<?php require_once"../../../../../Controller/Bendahara/PengaturanData/DataAlamat/DataDesa/tabelDesaQuery.php"; ?>
<table class="table table-bordered table-striped table-hover datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Desa</th>
            <th style="text-align: center; vertical-align: middle;">Act</th>
        </tr>
    </thead>                              
    <tbody>
    	<?php
        	$no = 1; 
        	while($desa=$dataDesaQr->fetch_object()):
    	?>
    	<tr>
        	<td><?php echo $no++; ?></td>
        	<td><b><?= $desa->nama_desa ?></b></td>
        	<td style="text-align: center; vertical-align: middle;">
            	<button type="button" class="btn bg-teal btn-xs waves-effect" data-toggle="modal" data-target="#editDesa<?= $desa->idDesa ?>">  
                	<i class="material-icons">mode_edit</i>
            	</button>
            	<button type="button" class="btn bg-pink btn-xs waves-effect btnDelDesa" 
						data-toggle="modal" data-delete="<?= $desa->nama_desa ?>" 
                    	data-id="<?= $desa->idDesa ?>" value="<?= $desa->idDesa ?>">  
                	<i class="material-icons">remove_circle</i>
          		</button>
        	</td>
    	</tr>
    	<?php include "modal_editDesa.php"; ?>
    	<?php endwhile; ?>
	</tbody>
</table>
</div>
</div>
</div>
</div>