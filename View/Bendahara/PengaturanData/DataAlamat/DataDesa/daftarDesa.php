<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Daftar Alamat<b>(DESA)</b>
                </h2>
                <ul class="header-dropdown m-r--5">
                    <button class="btn bg-blue-grey waves-effect" data-color="red" 
                            data-toggle="modal" data-target="#addDesa">
                        <i class="material-icons">add</i>
                        <span>TAMBAH DATA DESA</span>
                    </button>
                </ul>
            </div>
            <div class="body">
                <!--<div class="table-responsive">
                </div>-->
                <div id="dataDesa"></div>
            </div>
        </div>
    </div>
    <?php include "modal_addDesa.php"; ?>