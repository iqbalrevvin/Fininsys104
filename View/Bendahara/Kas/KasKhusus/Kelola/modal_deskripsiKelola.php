<!-- Data Modal -->
<div class="modal fade" id="deskrip<?= $kas->idKas_khusus ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Deskripsi Kas
                </h4>
            </div>
                <div class="modal-body">
                    <span class="font-bold font-13">
                        "<?= $kas->deskripsi ?>"
                    </span> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                            <i class="material-icons">clear</i>
                            <span>Tutup</span>
                    </button>
                </div>
        </div>
    </div>
</div>

