<?php  
$today = gmdate(date("Y-m-d"));
            if(@$_GET['p'] == '')
            {
                //Widgets
                //include "admin/page/beranda/widgets-beranda.php";
                //Transaksi Baru
                //include "admin/page/beranda/transaksi-baru-beranda.php";
                //Tabel-Transaksi-Terbaru
                //include "admin/query/beranda/tabel-transaksi-terbaru-query.php";
                //include "admin/page/beranda/tabel-transaksi-terbaru-beranda.php";
                include "View/Other/Loading.php";
                include "Controller/Bendahara/Beranda/Widgets.php";
                include "View/Bendahara/Beranda/Widgets-Beranda.php";
                include"View/Bendahara/Beranda/Homepage.php";
            }
            elseif(@$_GET['p'] == 'Transaction')
            {
                require_once"View/Bendahara/Transaksi/MasterTransaksi.php";
            }
            elseif(@$_GET['p'] == 'ListTransaction')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Daftar Transaksi');
                include "View/Other/Loading.php";
                #echo '<div id="listTrans"></div>';
                require_once"View/Bendahara/DaftarTransaksi/masterDaftarTransaksi.php";
            }
            elseif(@$_GET['p'] == 'CashIn')
            {
                require_once "View/Other/Loading.php";
                require_once "View/Bendahara/Kas/KasMasuk/masterKasMasuk.php";
            }
            elseif(@$_GET['p'] == 'CashOut')
            {
                require_once "View/Other/Loading.php";
                require_once "View/Bendahara/Kas/KasKeluar/masterKasKeluar.php";
            }
            elseif(@$_GET['p'] == 'CashRecaps')
            {
                require_once "View/Other/Loading.php";
                require_once "View/Bendahara/Kas/KasRekap/masterKasRekap.php";
            }
            elseif(@$_GET['p'] == 'SpecialCash')
            {
                require_once "View/Other/Loading.php";
                include "View/Bendahara/Kas/KasKhusus/masterKasKhusus.php";
            }
            elseif(@$_GET['p'] == 'StudentList')
            {
                //echo '<div id="daftarsiswa"></div>';
                require_once "View/Bendahara/DaftarSiswa/masterDaftarSiswa.php";
            }
            elseif(@$_GET['p'] == 'SettFinancialMaster')
            {
                require_once "View/Other/Loading.php";
                include "View/Bendahara/PengaturanKeuangan/MasterPembayaran/masterSettMaster.php";
            }
            elseif(@$_GET['p'] == 'SettFinancialType')
            {
                require_once "View/Other/Loading.php";
                include "View/Bendahara/PengaturanKeuangan/JenisPembayaran/masterSettPembayaran.php";
            }
            elseif(@$_GET['p'] == 'SettCashIn')
            {
                require_once "View/Other/Loading.php";
                include "View/Bendahara/PengaturanKeuangan/JenisKasMasuk/masterJenisKasMsk.php";
            }
            elseif(@$_GET['p'] == 'SettCashOut')
            {
                require_once "View/Other/Loading.php";
                include "View/Bendahara/PengaturanKeuangan/JenisKasKeluar/masterJenisKasKlr.php";
            }
            elseif(@$_GET['p'] == 'ReportCashIn')
            {
                
                require_once "View/Other/Loading.php";
                include "View/Bendahara/Laporan/LaporanKas/KasMasuk/ReportCashIn.php";
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Laporan Kas Masuk');
            }
            elseif(@$_GET['p'] == 'ReportCashOut')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Laporan Kas Keluar');
                require_once "View/Other/Loading.php";
                include "View/Bendahara/Laporan/LaporanKas/KasKeluar/ReportCashOut.php";
            }
            elseif(@$_GET['p'] == 'ReportRecaps')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Laporan Rekapitulasi Kas');
                require_once "View/Other/Loading.php";
                include "View/Bendahara/Laporan/LaporanKas/KasRekap/ReportRecaps.php";
            }
            elseif(@$_GET['p'] == 'ReportSpecialCash')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Laporan Kas Khusus');
                require_once "View/Other/Loading.php";
                include "View/Bendahara/Laporan/LaporanKas/KasKhusus/ReportSpecialCash.php";
            }
            elseif(@$_GET['p'] == 'ReportKeyword')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Laporan Berdasarkan Kata Kunci');
                require_once "View/Other/Loading.php";
                include "View/Bendahara/Laporan/LaporanPembayaran/ReportKeyword/reportKeyword.php";
            }
            elseif(@$_GET['p'] == 'ReportMasterType')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Laporan Berdasarkan Master Pembayaran');
                require_once "View/Other/Loading.php";
                include "View/Bendahara/Laporan/LaporanPembayaran/ReportMaster/ReportMaster.php";
            }
            elseif(@$_GET['p'] == 'ReportType')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Laporan Berdasarkan Jenis Pembayaran');
                require_once "View/Other/Loading.php";
                include "View/Bendahara/Laporan/LaporanPembayaran/ReportType/reportType.php";
            }
            elseif(@$_GET['p'] == 'ReportTime')
            {
                 logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Laporan Berdasarkan Tanggal');
                require_once "View/Other/Loading.php";
                include "View/Bendahara/Laporan/LaporanPembayaran/ReportTime/reportTime.php";
            }
            elseif(@$_GET['p'] == 'ReportDebt')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Laporan Tunggakan Siswa');
                require_once "View/Other/Loading.php";
                include "View/Bendahara/Laporan/LaporanPembayaran/ReportDebt/reportDebt.php";
            }
            elseif(@$_GET['p'] == 'ReportDebtSpecial')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Laporan Tunggakan Siswa');
                require_once "View/Other/Loading.php";
                include "View/Bendahara/Laporan/LaporanPembayaran/ReportDebtSpecial/reportDebtSpecial.php";
            }
            elseif(@$_GET['p'] == 'Analysis')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Analisa');
                include "loading.php";
                include "building.html";
            }
            elseif(@$_GET['p'] == 'AdminProfile')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Profil');
                require_once "View/Other/Loading.php";
                include "View/Bendahara/PengaturanData/ProfilAdmin/profilAdmin.php";
            }
            elseif(@$_GET['p'] == 'SchoolProfile')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Profil Sekolah');
                require_once "View/Other/Loading.php";
                include "View/Bendahara/PengaturanData/DataSekolah/profilSekolah.php";
            }
            elseif(@$_GET['p'] == 'DataStudyProgram')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Data Program Studi');
                require_once "View/Other/Loading.php";
                include "View/Bendahara/PengaturanData/DataProgramStudi/masterProgramStudi.php";
            }
            elseif(@$_GET['p'] == 'DataClass')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Data Kelas');
                require_once "View/Other/Loading.php";
                include "View/Bendahara/PengaturanData/DataKelas/masterKelas.php";
            }
            elseif(@$_GET['p'] == 'Village')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Daftar Alamat Desa');
                require_once "View/Other/Loading.php";
                include "View/Bendahara/PengaturanData/DataAlamat/DataDesa/masterDataDesa.php";
            }
            elseif(@$_GET['p'] == 'Districts')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Daftar Alamat Kecamatan');
                 require_once "View/Other/Loading.php";
                include "View/Bendahara/PengaturanData/DataAlamat/DataKecamatan/masterDataKecamatan.php";
            }
            elseif(@$_GET['p'] == 'City')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Daftar Alamat Kota');
                require_once "View/Other/Loading.php";
                include "View/Bendahara/PengaturanData/DataAlamat/DataKota/masterDataKota.php";
            }
            elseif(@$_GET['p'] == 'Province')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Daftar Alamat Provinsi');
                require_once "View/Other/Loading.php";
                require_once "View/Bendahara/PengaturanData/DataAlamat/DataProvinsi/masterDataProvinsi.php";
            }
            elseif(@$_GET['p'] == 'Changelogs')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Daftar Perubahan Sistem');
                require_once "View/Other/Loading.php";
                include "View/Bendahara/Changelogs/changelogs.php";
            }
            elseif(@$_GET['p'] == 'AppSettings')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Pengaturan Aplikasi');
                include "loading.php";
                include "building.html";
            }
            elseif(@$_GET['p'] == 'BackupRestore')
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Backup & Restore');
                require_once "View/Other/Loading.php";
                include "View/Bendahara/Backup/backup-interface.php";
            }
            //HAK AKSES WEBMASTER & KEPALA SEKOLAH-------------------------------------
            elseif(@$_GET['p'] == 'UserData'){
                    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Data Pengguna');
                    require_once "View/Other/Loading.php";
                    require_once "View/Administrator/DataPengguna/masterDataPengguna.php";
            }
            elseif(@$_GET['p'] == 'UserAccountAdmin'){
                    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Akun Pengguna');
                    require_once "View/Other/Loading.php";
                    include"View/Administrator/AkunPengguna/Admin/masterAkunPengguna.php";
            }
            elseif(@$_GET['p'] == 'UserAccountStudent'){
                    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Akun Siswa');
                    include "loading.php";
                    include"admin/WEBMASTER/Page/AkunPengguna/Siswa/masterAkunSiswa.php";
            }
            elseif(@$_GET['p'] == 'LogActivity')
            {
                    require_once "View/Other/Loading.php";
                    include"View/Administrator/LogAktivitas/masterLogAktivitas.php";
            }
            elseif(@$_GET['p'] == 'About')
            {
                    require_once "View/Other/Loading.php";
                    include"View/Bendahara/About/about.php";
            }
            //AKHIR HAK AKSES WEB MASTER & KEPALA SEKOLAH-------------------------------
            else
            {
                logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Halaman Tidak Valid');
                include "view/Other/404.html";
            }
        
        ?>