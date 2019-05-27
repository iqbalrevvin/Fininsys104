<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <?php require_once"../../../../../Controller/Bendahara/PengaturanData/DataAlamat/DataProvinsi/tabelProvinsiQuery.php"; ?>
                <table class="table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Provinsi</th>
                            <th style="text-align: center; vertical-align: middle;">Act</th>
                        </tr>
                    </thead>                              
                    <tbody>
    	               <?php
        	               $no = 1; 
        	               while($prov=$dataProvinsiQr->fetch_object()):
    	               ?>
    	               <tr>
        	               <td><?= $no++; ?></td>
        	               <td><b><?= $prov->nama_provinsi ?></b></td>
        	               <td style="text-align: center; vertical-align: middle;">
            	               <button type="button" class="btn bg-teal btn-xs waves-effect" data-toggle="modal" 
                                        data-target="#editProvinsi<?= $prov->idProvinsi ?>">
                	                   <i class="material-icons">mode_edit</i>
            	               </button>
            	               <button type="button" class="btn bg-pink btn-xs waves-effect btnDelProvinsi" 
						                  data-toggle="modal" data-delete="<?= $prov->nama_provinsi ?>" 
                    	                   data-id="<?= $prov->idProvinsi ?>" value="<?= $prov->idProvinsi ?>">  
                	                   <i class="material-icons">remove_circle</i>
          		                </button>
        	               </td>
    	                   </tr>
    	                   <?php include "modal_editProvinsi.php"; ?>
    	                   <?php endwhile; ?>
	               </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
