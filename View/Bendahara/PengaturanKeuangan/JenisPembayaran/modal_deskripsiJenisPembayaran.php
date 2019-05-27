<!-- Data Modal -->
<div class="modal fade" id="deskJenPemb<?= $dftJns['idJenis_transaksi'] ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Detail Jenis Pembayaran
                </h4>
            </div>
                <div class="body">
                    <span class="font-13">
                        Master Transaksi            : <b><?= $dftJns['nama_master_transaksi'] ?></b><br>
                        Tahun Angkatan              : <b><?= $dftJns['tahun_angkatan'] ?></b><br>
                        Program Studi               : <b><?= $dftJns['nama_jurusan'] ?></b><br>
                        Kode Transaksi              : <?= $dftJns['kd_transaksi'] ?><br>
                        Tipe Transaksi              : <b><?= $dftJns['tipe_jenis_transaksi'] ?></b><br>
                        Nama Transaksi              : <b><?= $dftJns['nama_jenis_transaksi'] ?></b><br>
                        Setting Semester            : <?= $dftJns['set_semester'] ?><br>
                        Kewajiban Transaksi         : <b>Rp.<?= number_format($dftJns['kewajiban']) ?>.-</b><br>
                        Keterangan Jenis Transaksi  : "<?= $dftJns['keterangan_transaksi'] ?>"
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

