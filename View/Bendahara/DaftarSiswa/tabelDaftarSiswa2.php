<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DAFTAR SISWA
                </h2>

                <ul class="header-dropdown m-r--5">
                    <button class="btn bg-blue-grey waves-effect" data-color="red" 
                            data-toggle="modal" data-target="#modalAddSiswa">
                        <i class="material-icons">add</i>
                        <span>Tambah Siswa</span>
                    </button>

                    <a href="?p=StudentList&k=StudentImport">
                        <button class="btn bg-teal waves-effect">
                            <i class="material-icons">import_export</i>
                            <span>Import Siswa</span>
                        </button>
                    </a>
                    <button type="button" class="btn bg-pink waves-effect" data-toggle="modal" data-target="#delSiswa">  
                            <i class="material-icons">remove_circle</i>
                            <span>Hapus Siswa</span>
                    </button>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table id="lookupSiswa" class="table table-bordered table-striped table-hover display">
                        <thead>
                            <tr>
                                <th style="text-align: left; vertical-align: middle;">
                                    <input type="checkbox" id="AllCheckSiswa" class="filled-in chk-col-pink"/>
                                    <label for="AllCheckSiswa"></label> 
                                </th>
                                <th style="text-align: left; vertical-align: middle;">Nama</th>
                                <th style="text-align: center; vertical-align: middle;">NIK</th>
                                <th style="text-align: center; vertical-align: middle;">NIPD</th>
                                <th style="text-align: center; vertical-align: middle;">Smt</th>
                                <th style="text-align: center; vertical-align: middle;">Tkt</th>
                                <th style="text-align: center; vertical-align: middle;">Kelas</th>
                                <th style="text-align: center; vertical-align: middle;">Tgl-Lahir</th>
                            </tr>
                        </thead>
                         <tfoot>
                            <tr>
                                <th style="text-align: left; vertical-align: middle;">#</th>
                                <th style="text-align: left; vertical-align: middle;">Nama</th>
                                <th style="text-align: center; vertical-align: middle;">NIK</th>
                                <th style="text-align: center; vertical-align: middle;">NIPD</th>
                                <th style="text-align: center; vertical-align: middle;">Smt</th>
                                <th style="text-align: center; vertical-align: middle;">Tkt</th>
                                <th style="text-align: center; vertical-align: middle;">Kelas</th>
                                <th style="text-align: center; vertical-align: middle;">Tgl-Lahir</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <?php include "DeleteSiswa/modalDeleteSiswa.php" ?>
            </div>
        </div>
    </div>
</div>





                        