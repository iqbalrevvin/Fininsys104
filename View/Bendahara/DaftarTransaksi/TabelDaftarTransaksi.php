<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Daftar Semua Transaksi Pembayaran
                </h2>
                <ul class="header-dropdown m-r--5">
                    <a href="Controller/Bendahara/DaftarTransaksi/exportExcelTransaksi.php">
                    <button class="btn btn-sm bg-teal waves-effect" data-color="red">
                        <i class="material-icons">grid_on</i>
                        <span>EXPORT KE EXCEL</span>
                    </button>
                    <a href="?p=ListTransaction&k=importListTransaction">
                        <button class="btn btn-sm bg-indigo waves-effect">
                            <i class="material-icons">import_export</i>
                            <span>IMPORT DAFTAR TRANSAKSI</span>
                        </button>
                    </a>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive font-12">
                 <table id="lookup" class="table table-bordered table-striped table-hover display">
                        <thead bgcolor="#eeeeee" align="center">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NIPD</th>
                                <th>Kelas</th>
                                <th>Jenis</th>
                                <th>No Trnsksi</th>
                                <th>Tgl Trnsksi</th>
                                <th>Jumlah</th>
                                <th>Hapus Data</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>










