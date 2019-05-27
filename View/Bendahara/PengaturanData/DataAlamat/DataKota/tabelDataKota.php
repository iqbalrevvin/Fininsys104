<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <?php require_once"../../../../../Controller/Bendahara/PengaturanData/DataAlamat/DataKota/tabelKotaQuery.php"; ?>
                <table class="table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kota</th>
                            <th style="text-align: center; vertical-align: middle;">Act</th>
                        </tr>
                    </thead>                              
                    <tbody>
    	               <?php
        	               $no = 1; 
        	               while($kota=$dataKotaQr->fetch_object()):
    	               ?>
    	               <tr>
        	               <td><?= $no++; ?></td>
        	               <td><b><?= $kota->nama_kota ?></b></td>
        	               <td style="text-align: center; vertical-align: middle;">
            	               <button type="button" class="btn bg-teal btn-xs waves-effect" data-toggle="modal" 
                                        data-target="#editKota<?= $kota->idKota ?>">
                	                   <i class="material-icons">mode_edit</i>
            	               </button>
            	               <button type="button" class="btn bg-pink btn-xs waves-effect btnDelKota" 
						                  data-toggle="modal" data-delete="<?= $kota->nama_kota ?>" 
                    	                   data-id="<?= $kota->idKota ?>" value="<?= $kota->idKota ?>">  
                	                   <i class="material-icons">remove_circle</i>
          		                </button>
        	               </td>
    	                   </tr>
    	                       <?php include "modal_editKota.php"; ?>
    	                       <?php endwhile; ?>
	               </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
