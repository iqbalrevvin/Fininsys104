<!-- Data Modal -->
<div class="modal fade" id="statusKasKelola" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Status Pengelolaan Kas Khusus
                </h4>
            </div>
                <div class="modal-body">
                    <span class ="font-13">
                        Jumlah Uang Masuk Hari Ini = <b>Rp.<?= number_format($hrIniMsk->jumlah) ?>.-</b><br>
                        Jumlah Uang Masuk Bulan Ini = <b>Rp.<?= number_format($blnIniMsk->jumlah) ?>.-</b><br>
                        <hr>
                        Jumlah Uang Keluar Hari Ini = <b>Rp.<?= number_format($hrIniKlr->jumlah) ?>.-</b><br>
                        Jumlah Uang Keluar Bulan Ini = <b>Rp.<?= number_format($blnIniKlr->jumlah) ?>.-</b><br>
                        <hr>
                        Perbandingan Antara Pemasukan dan Pengeluaran Hari Ini = <b><?= number_format($perbnHari) ?>%</b><br>
                        *<i>Keterangan</i><br>
                        Pengeluaran hari ini terlihat <b><?= $ketHari ?></b> dibanding dengan pemasukan hari ini.
                        <hr>
                        Perbandingan Antara Pemasukan dan Pengeluaran Bulan Ini = <b><?= number_format($perbnBln) ?>%</b><br>
                        *<i>Keterangan</i><br>
                        Pengeluaran bulan ini terlihat <b><?= $ketBln ?></b> dibanding dengan pemasukan bulan ini.
                    </span>
                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

