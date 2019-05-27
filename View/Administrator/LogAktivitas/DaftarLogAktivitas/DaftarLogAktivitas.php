<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DAFTAR LOG AKTIVITAS SISTEM
                </h2>
                <ul class="header-dropdown m-r--5">
                    <a href="?p=LogActivity">
                        <button class="btn btn-sm bg-blue-grey waves-effect" >
                            <i class="material-icons">keyboard_backspace</i>
                            <span>Kembali</span>
                        </button>
                    </a>
                        <button class="btn btn-sm bg-pink waves-effect" id="modal-color" data-target="#DeleteAllLog" 
                                data-color="pink" data-toggle="modal" >
                            <i class="material-icons">delete</i>
                            <span>HAPUS SEMUA DATA LOG</span>
                        </button>
                    <!--<a href="?p=LogActivity&k=ReportLog">
                        <button class="btn btn-sm bg-indigo waves-effect">
                            <i class="material-icons">assignment</i>
                            <span>LAPORAN LOG</span>
                        </button>
                    </a>-->
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <?php include "TabelLogAktivitas.php"; ?>
                    <?php include "modal_DeleteLog.php"; ?>
                </div>
            </div>
        </div>
    </div>
</div>
