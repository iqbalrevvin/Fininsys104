
<div class="card" style="background-color: #FCFDFF;">
    <div class="body">
        <div class="four-zero-four">
            <div class="four-zero-four-container" >
                <div class="error-code">
                    <img src="Assets/images/backup.gif" alt="Fininsys | M. Iqbal Development" style="width:600px;height:250px;">
                </div>
                <br>
                <br>
                <br>
                <div class="error-message">Backup Database Fininsys</div>
                <div class="message">Lakukan backup database secara rutin untuk mengamankan data</div>
                <div class="message">Setelah melakukan backup download file hasil backup dan simpan di komputer lain dengan aman, lebih baik lagi jika disimpan di Cloud Storage seperti Google Drive, Dropbox, Dsb.</div>
                <div class="button-place">
                    <button class="btn bg-pink btn-sm waves-effect" id="btnBackup">
                        <i class="material-icons">backup</i>
                        <span class="font-bold">BACKUP DATABASE</span>
                    </button>
                    <button class="btn bg-teal btn-sm waves-effect" id="btnDownloadBackup">
                        <i class="material-icons">file_download</i>
                        <span class="font-bold">UNDUH HASIL BACKUP</span>
                    </button>
                    <button class="btn bg-blue btn-sm waves-effect" data-toggle="modal" data-target="#importDatabase" 
                            id="modal-color" data-color="blue">
                        <i class="material-icons">restore</i>
                        <span class="font-bold">RESTORE DATABASE</span>
                    </button>
                </div>
                <br>
                <div id="ketdownload"></div>
            </div>
        </div>
    </div>
</div>


<!-- Data Modal IMPORT-->
<div class="modal fade" id="importDatabase" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">IMPORT BACKUP DATABASE</h4>
            </div>
            <div class="card">
                <div class="body">
                    <!--NAMA JENIS KAS MASUK-->
                    <div class="input-group">
                        <div class="form-line">
                            <form action="Controller/Bendahara/Backup/importFile.php" class="dropzone">
                                <div class="dz-message">
                                    <div class="drag-icon-cph">
                                        <i class="material-icons">touch_app</i>
                                    </div>
                                    <h3>Klik Atau Tarik & Letakan File Hasil Download Backup Database Fininsys Disini!.</h3>
                                    <em>(Pastikan file adalah hasil download backup dari aplikasi fininsys serta sudah berextensi <strong>.sql.gz</strong>, Contoh : <b>Fininsys-Database-Backup_27-11-2018.sql.gz</b>)</em>
                                </div> 
                                <div class="fallback">
                                    <input name="file" type="file" id="fileImport" required/>
                                </div> 
                            </form>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                   
                        <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                                </button>
                            <button type="submit" id="btnImportDatabase" class="btn bg-blue waves-effect">
                                <i class="material-icons">save</i>
                                <span>Import</span>
                            </button>

                        </div>
                         <div id="ketImport"></div>
                </div>
            </div>
        </div>
    </div>
</div>

