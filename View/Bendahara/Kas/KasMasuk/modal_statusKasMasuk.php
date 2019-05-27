<!-- Data Modal -->
<div class="modal fade " id="statusKasMasuk" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Status Kas Masuk Bulan <?= getBulan(date('m')) ?>
                </h4>
            </div>
            <div class="card">
                <div class="body">
                    <span class ="font-13">
                        Jumlah Transaksi Masuk Bulan ini = <b><?= $transaksi->jumlah ?></b><br>
                        Jumlah Uang Masuk Hari Ini = <b>Rp.<?= number_format($uangMasukHari->jumlah) ?>.-</b><br>
                        Jumlah Uang Masuk Bulan Ini = <b>Rp.<?= number_format($uangMasukBulan->jumlah) ?>.-</b><br>
                        <hr>
                        Jumlah Uang Masuk Hari Kemarin = <b>Rp.<?= number_format($uangMasukKemarin->jumlah) ?>.-</b><br>
                        Jumlah Uang Masuk Bulan Kemarin = <b>Rp.<?= number_format($uangMasukBlnKemarin->jumlah) ?>.-</b><br>
                        <hr>
                        Perbandingan Pemasukan Antara Bulan Ini dan Kemarin = <b><?= number_format($perbandingan) ?>%</b><br>
                        *<i>Keterangan</i><br>
                        Pemasukan bulan ini terlihat <b><?= $keterangan ?></b> dibanding dengan bulan kemarin.
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

