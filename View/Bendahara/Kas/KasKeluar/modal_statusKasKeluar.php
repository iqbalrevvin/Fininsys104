<!-- Data Modal -->
<div class="modal fade " id="statusKasKeluar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Status Kas Keluar Bulan <?= getBulan(date('m')) ?>
                </h4>
            </div>
            <div class="card">
                <div class="body">
                    <span class ="font-13">
                        Jumlah Transaksi Keluar Bulan ini = <b><?= $transaksi->jumlah ?></b><br>
                        Jumlah Uang Keluar Hari Ini = <b>Rp.<?= number_format($uangKlrHari->jumlah) ?>.-</b><br>
                        Jumlah Uang Keluar Bulan Ini = <b>Rp.<?= number_format($uangKlrBulan->jumlah) ?>.-</b><br>
                        <hr>
                        Jumlah Uang Keluar Hari Kemarin = <b>Rp.<?= number_format($uangKlrKemarin->jumlah) ?>.-</b><br>
                        Jumlah Uang Keluar Bulan Kemarin = <b>Rp.<?= number_format($uangKlrBlnKemarin->jumlah) ?>.-</b><br>
                        <hr>
                        Perbandingan Pengeluaran Antara Bulan Ini dan Kemarin = <b><?= number_format($perbandingan) ?>%</b><br>
                        *<i>Keterangan</i><br>
                        Pengeluaran bulan ini terlihat <b><?= $keterangan ?></b> dibanding dengan bulan kemarin.
                    </span>

                        <div class="modal-footer">
                            <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                <i class="material-icons">clear</i>
                                <span>Tutup</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

