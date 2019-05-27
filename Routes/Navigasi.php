<!--HAK AKSES WEBMASTER-->
<!--DATA PENGGUNA (ADMIN) -->
<?php if(@$_SESSION['Administrator'] || @$_SESSION['KepalaSekolah']){ ?>
    <li class="header">Hak Akses <?= $namaLevel ?></li> 
<?php if(@$_GET['p'] == 'UserData'){?>
    <li class="active">
<?php }else{ ?>
    <li>
<?php } ?>
<a href="?p=UserData">
    <i class="material-icons">supervisor_account</i>
        <span>Data Pengguna(Admin)</span>
    </a>
</li>
<!--///////////////////////////////////DATA PENGGUNA (ADMIN) -->

<!--AKUN PENGGUNA -->
<?php if(@$_GET['p'] == 'UserAccountAdmin' || @$_GET['p'] == 'UserAccountStudent'){?>
    <li class="active">
<?php }else{ ?>
    <li>
<?php } ?>
        <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">account_box</i>
            <span>Akun Pengguna</span>
        </a>
        <ul class="ml-menu">
        <!--Akun Admin-->
        <?php if(@$_GET['p'] == 'UserAccountAdmin'){ ?>
            <li class="active">
        <?php }else{ ?>
            <li>
        <?php } ?>
                <a href="?p=UserAccountAdmin">Admin</a>
            </li>
        <!--////////////////-->
        <!--Akun Siswa-->
        <?php #if(@$_GET['p'] == 'UserAccountStudent'){?>
        <!--<li class="active">
            <?php #}else{ ?>
        <li>
            <?php #} ?>
            <a href="?p=UserAccountStudent">Siswa</a>
        </li>
        <!--////////////////-->
        </ul>
    </li>
<!--///////AKUN PENGGUNA -->


<!--Profil Admin-->
<?php if(@$_GET['p'] == 'AdminProfile'){?>
    <li class="active">
<?php }else{ ?>
    <li>
<?php } ?>
        <a href="?p=AdminProfile">
            <i class="material-icons">face</i>
            <span>Profil <?= $namaLevel ?></span>
        </a>
    </li>
<!--/////Profil Admin-->
<!--Log Aktivitas-->
<?php if(@$_GET['p'] == 'LogActivity'){?>
    <li class="active">
<?php }else{ ?>
    <li>
<?php } ?>
        <a href="?p=LogActivity">
            <i class="material-icons">local_activity</i>
            <span>Log Aktivitas</span>
        </a>
    </li>
<!--/////////////Log Aktivitas-->
<!--////////////////-->

<?php } else {} ?> 
<!--///////////////////////////////--> 

<!--HAK AKSES ADMIN BENDAHARA-->  
<li class="header">NAVIGASI MENU</li>
<!--Beranda-->
<?php if(@$_GET['p'] == ''){?>
    <li class="active">
<?php }else{ ?>
    <li>
<?php } ?>
        <a href="./">
            <i class="material-icons">home</i>
            <span>Beranda</span>
        </a>
    </li>
<!--///////////////////////////////-->

<!--TRANSAKSI PEMBAYARAN-->
<?php if(@$_GET['p'] == 'Transaction'){?>
    <li class="active">
<?php }else{ ?>
    <li>
<?php } ?>
        <a href="?p=Transaction">
            <i class="material-icons">account_balance_wallet</i>
                <span>Transaksi Pembayaran</span>
        </a>
    </li>
<!--///////////////////////////////-->

<!--MENU DAFTAR TRANSAKSI-->
<?php if(@$_GET['p'] == 'ListTransaction'){?>
    <li class="active">
<?php }else{ ?>
    <li>
<?php } ?>
        <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">list</i>
            <span>Dafar Transaksi</span>
        </a>
        <ul class="ml-menu">
        <!--DAFTAR TRANSAKSI-->
        <?php if(@$_GET['p'] == 'ListTransaction' AND @$_GET['k'] != 'importListTransaction'){ ?>
            <li class="active">
        <?php }else{ ?>
            <li>
        <?php } ?>
                <a href="?p=ListTransaction">Daftar Transaksi</a>
            </li>
        <!--///////////DAFTAR TRANSAKSI-->
        <?php if(@$_GET['k'] == 'importListTransaction'){ ?>
            <li class="active">
        <?php }else{ ?>
            <li>
        <?php } ?>
                <a href="?p=ListTransaction&k=importListTransaction">Import Data Transaksi</a>
            </li>
        </ul>
    </li>
<!--MENU DAFTAR TRANSAKSI///////////////////////////////-->

<!--MANAJEMEN KAS-->
<?php if(@$_GET['p'] == 'CashIn' || @$_GET['p'] == 'CashOut' || @$_GET['p'] == 'CashRecaps' 
        || @$_GET['p'] == 'SpecialCash'){ ?>
    <li class="active">
<?php }else{ ?>
    <li>
<?php } ?>
        <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">attach_money</i>
            <span>Manajemen Kas</span>
        </a>
        <ul class="ml-menu">
        <!--KAS MASUK-->
        <?php if(@$_GET['p'] == 'CashIn'){ ?>
            <li class="active">
        <?php }else{ ?>
            <li>
        <?php } ?>
                <a href="?p=CashIn">Kas Masuk</a>
            </li>
        <!--KAS MASUK/////-->
        <!--KAS KELUAR-->
        <?php if(@$_GET['p'] == 'CashOut'){?>
            <li class="active">
        <?php }else{ ?>
            <li>
        <?php } ?>
                <a href="?p=CashOut">Kas Keluar</a>
            </li>
        <!--/////KAS KELUAR-->
        <!--REKAPITULASI KAS-->
        <?php if(@$_GET['p'] == 'CashRecaps'){?>
            <li class="active">
        <?php }else{ ?>
            <li>
        <?php } ?>
                <a href="?p=CashRecaps">Rekapitulasi Kas</a>
            </li>
        <!--/////REKAPITULASI KAS-->
        <?php if(@$_GET['p'] == 'SpecialCash'){?>
            <li class="active">
                <?php }else{ ?>
            <li>
            <?php } ?>
                <a href="?p=SpecialCash">Kas Khusus</a>
            </li>               
        <!--////////////////REKAPITULASI KAS-->
        <!--<li>
            <a href="#">Manajemen Pas Foto</a>
        </li>-->
        </ul>
    </li>
<!--///////////////////////////////-->

<!--Daftar Siswa-->
<?php if(@$_GET['p'] == 'StudentList'){ ?>
                    <li class="active">
                    <?php }else{ ?>
                    <li>
                    <?php } ?>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">group</i>
                            <span>Siswa</span>
                        </a>
                         <ul class="ml-menu">
                         	<!--DAFTAR SISWA-->
                            <?php if(@$_GET['p'] == 'StudentList' AND @$_GET['k'] != 'StudentImport' AND @$_GET['k'] != 'ClassManagement'){ ?>
                            <li class="active">
                            <?php }else{ ?>
                            <li>
                            <?php } ?>
                                <a href="?p=StudentList">Daftar Siswa</a>
                            </li>
                            <!--IMPORT SISWA-->
                            <?php if(@$_GET['k'] == 'StudentImport'){?>
                            <li class="active">
                                <?php }else{ ?>
                            <li>
                            <?php } ?>
                                <a href="?p=StudentList&k=StudentImport">Import Data Siswa</a>
                            </li>
                            <!--/////-->
                            <!--MANAJEMEN KELAS-->
                            <?php if(@$_GET['k'] == 'ClassManagement'){?>
                            <li class="active">
                                <?php }else{ ?>
                            <li>
                            <?php } ?>
                                <a href="?p=StudentList&k=ClassManagement">Manajemen Kelas</a>
                            </li>
                            <!--/////-->
                            <!--<li>
                                <a href="#">Manajemen Pas Foto</a>
                            </li>-->
                        </ul>
                    </li>
                    <!--///////////////////////////////-->
                    <!--Pengaturan Transaksi-->
                    <?php 
                        if(@$_GET['p'] == 'SettFinancialType' || @$_GET['p'] == 'SettCashOut' || @$_GET['p'] == 'SettCashIn' || @$_GET['p'] == 'SettFinancialMaster'){
                    ?>
                    <li class="active">
                    <?php }else{ ?>
                    <li>
                    <?php } ?>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_balance</i>
                            <span>Pengaturan Keuangan</span>
                        </a>
                        <ul class="ml-menu">
                        <?php if(@$_GET['p'] == 'SettFinancialMaster'){ ?>
                            <li class="active">
                            <?php }else{ ?>
                            <li>
                            <?php } ?>
                                <a href="?p=SettFinancialMaster">Master Transaksi Pembayaran</a>
                            </li>
                            <!--///////-->
                            <?php if(@$_GET['p'] == 'SettFinancialType'){ ?>
                            <li class="active">
                            <?php }else{ ?>
                            <li>
                            <?php } ?>
                                <a href="?p=SettFinancialType">Jenis Transaksi Pembayaran</a>
                            </li>
                             <!--/////-->
                            <?php if(@$_GET['p'] == 'SettCashIn'){ ?>
                            <li class="active">
                            <?php }else{ ?>
                            <li>
                            <?php } ?>
                                <a href="?p=SettCashIn">Jenis Kas Masuk</a>
                            </li>
                            <!--/////-->
                            <?php if(@$_GET['p'] == 'SettCashOut'){ ?>
                            <li class="active">
                            <?php }else{ ?>
                            <li>
                            <?php } ?>
                                <a href="?p=SettCashOut">Jenis Kas Keluar</a>
                            </li>
                           
                        </ul>
                    </li>
                    <!--///////////////////////////////-->
                    <!--LAPORAN-->
                    <?php 
                        if(@$_GET['p'] == 'ReportType' || @$_GET['p'] == 'ReportTime' || @$_GET['p'] == 'ReportMasterType'|| @$_GET['p'] == 'ReportDebt' || @$_GET['p'] == 'ReportDebtSpecial' || @$_GET['p'] == 'ReportCashIn' || @$_GET['p'] == 'ReportCashOut' || @$_GET['p'] == 'ReportRecaps' || @$_GET['p'] == 'ReportSpecialCash' || @$_GET['p'] == 'ReportKeyword'){
                        ?>
                    <li class="active">
                        <?php }else{ ?>
                    <li>
                        <?php } ?>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Laporan</span>
                        </a>
                        <ul class="ml-menu">
                                <?php 
                                    if(@$_GET['p'] == 'ReportType' || @$_GET['p'] == 'ReportTime' || @$_GET['p'] == 'ReportMasterType'|| @$_GET['p'] == 'ReportDebt' || @$_GET['p'] == 'ReportDebtSpecial' || @$_GET['p'] == 'ReportKeyword'){
                                ?>
                            <li class="active">
                                    <?php }else{ ?>
                            <li>
                                    <?php } ?>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Laporan Pembayaran Siswa</span>
                                </a>
                                <ul class="ml-menu">
                                <!--LAPORAN BERDASARKAN KEYWORD-->
                                <?php 
                                        if(@$_GET['p'] == 'ReportKeyword'){
                                        ?>
                                    <li class="active">
                                            <?php }else{ ?>
                                    <li>
                                            <?php } ?>
                                        <a href="?p=ReportKeyword">Klasifikasi Kata Kunci</a>
                                    </li>
                                <!--LAPORAN KLASIFIKASI MASTER TRANSAKSI-->
                                        <?php 
                                        if(@$_GET['p'] == 'ReportMasterType'){
                                        ?>
                                    <li class="active">
                                            <?php }else{ ?>
                                    <li>
                                            <?php } ?>
                                        <a href="?p=ReportMasterType">Klasifikasi Master transaksi</a>
                                    </li>
                                <!--LAPORAN KLASIFIKASI JENIS TRANSAKSI-->
                                            <?php 
                                            if(@$_GET['p'] == 'ReportType'){
                                            ?>
                                    <li class="active">
                                            <?php }else{ ?>
                                    <li>
                                            <?php } ?>
                                        <a href="?p=ReportType">Klasifikasi Jenis transaksi</a>
                                    </li>
                                <!--LAPORAN KLASIFIKASI TANGGAL-->
                                            <?php 
                                            if(@$_GET['p'] == 'ReportTime'){
                                            ?>
                                    <li class="active">
                                            <?php }else{ ?>
                                    <li>
                                            <?php } ?>
                                        <a href="?p=ReportTime">Klasifikasi Tanggal</a>
                                    </li>
                                <!--LAPORAN TUNGGAKAN SISWA REGULER-->
                                            <?php 
                                                if(@$_GET['p'] == 'ReportDebt'){
                                                ?>
                                    <li class="active">
                                            <?php }else{ ?>
                                    <li>
                                            <?php } ?>
                                        <a href="?p=ReportDebt">Tunggakan Reguler</a>
                                    </li>
                                    <!--LAPORAN TUNGGAKAN SISWA REGULER-->
                                            <?php 
                                                if(@$_GET['p'] == 'ReportDebtSpecial'){
                                                ?>
                                    <li class="active">
                                            <?php }else{ ?>
                                    <li>
                                            <?php } ?>
                                        <a href="?p=ReportDebtSpecial">Tunggakan Khusus</a>
                                    </li>
                                </ul>
                            </li>
                                <?php 
                                    if(@$_GET['p'] == 'ReportCashIn' || @$_GET['p'] == 'ReportCashOut' || @$_GET['p'] == 'ReportRecaps' || @$_GET['p'] == 'ReportSpecialCash'){
                                ?>
                            <li class="active">
                                    <?php }else{ ?>
                            <li>
                                    <?php } ?>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Laporan Kas Sekolah</span>
                                </a>
                                <ul class="ml-menu">
                                <!--LAPORAN KAS MASUK-->
                                            <?php 
                                                if(@$_GET['p'] == 'ReportCashIn'){
                                                ?>
                                    <li class="active">
                                            <?php }else{ ?>
                                    <li>
                                            <?php } ?>
                                        <a href="?p=ReportCashIn">Laporan Kas Masuk</a>
                                    </li>
                                <!--LAPORAN LAPORAN KAS KELUAR-->
                                            <?php 
                                            if(@$_GET['p'] == 'ReportCashOut'){
                                            ?>
                                    <li class="active">
                                            <?php }else{ ?>
                                    <li>
                                            <?php } ?>
                                        <a href="?p=ReportCashOut">Laporan Kas Keluar</a>
                                    </li>
                                        <!--LAPORAN REKAPITULASI KAS-->
                                            <?php 
                                            if(@$_GET['p'] == 'ReportRecaps'){
                                            ?>
                                    <li class="active">
                                            <?php }else{ ?>
                                    <li>
                                            <?php } ?>
                                        <a href="?p=ReportRecaps">Laporan Rekapitulasi Kas</a>
                                    </li>
                                <!--LAPORAN KAS KHUSUS-->
                                            <?php 
                                            if(@$_GET['p'] == 'ReportSpecialCash'){
                                            ?>
                                    <li class="active">
                                            <?php }else{ ?>
                                    <li>
                                            <?php } ?>
                                        <a href="?p=ReportSpecialCash">Laporan Kas Khusus</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <?php 
                        if(@$_GET['p'] == 'AdminProfile' || @$_GET['p'] == 'SchoolProfile' || @$_GET['p'] == 'DataStudyProgram'|| @$_GET['p'] == 'DataClass' || @$_GET['p'] == 'Village' || @$_GET['p'] == 'Districts' || @$_GET['p'] == 'City' || @$_GET['p'] == 'Province'){
                    ?>
                    <li class="active">
                        <?php }else{ ?>
                    <li>
                        <?php } ?>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_box</i>
                            <span>Pengaturan Data</span>
                        </a>
                        <ul class="ml-menu">
                        <!--Profil Admin-->
                            <?php 
                                if(@$_GET['p'] == 'AdminProfile'){
                                ?>
                            <li class="active">
                                <?php }else{ ?>
                            <li>
                                <?php } ?>
                                <a href="?p=AdminProfile">Profil Admin</a>
                            </li>
                        <!--///////////-->
                        <!--Profil Sekolah-->
                                <?php 
                                if(@$_GET['p'] == 'SchoolProfile'){
                                ?>
                            <li class="active">
                                <?php }else{ ?>
                            <li>
                                <?php } ?>
                                <a href="?p=SchoolProfile">Data Sekolah</a>
                            </li>
                        <!--////////////-->
                        <!--Data Program Studi-->
                            <?php 
                                if(@$_GET['p'] == 'DataStudyProgram'){
                                ?>
                            <li class="active">
                                <?php }else{ ?>
                            <li>
                                <?php } ?>
                                <a href="?p=DataStudyProgram">Data Program Studi</a>
                            </li>
                        <!--/////////////-->
                        <!--Data Kelas-->
                            <?php 
                                if(@$_GET['p'] == 'DataClass'){
                                ?>
                            <li class="active">
                                <?php }else{ ?>
                            <li>
                                <?php } ?>
                                <a href="?p=DataClass">Data Kelas</a>
                            </li>
                            <!--/////////////-->
                            <!--Data Alamat-->
                            <?php 
                                if(@$_GET['p'] == 'Village' || @$_GET['p'] == 'Districts' 
                                    || @$_GET['p'] == 'City' || @$_GET['p'] == 'Province'){
                                ?>
                            <li class="active">
                                <?php }else{ ?>
                            <li>
                                <?php } ?>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Data Alamat</span>
                        </a>
                        <ul class="ml-menu">
                            <!--Data Desa-->
                            <?php 
                                if(@$_GET['p'] == 'Village'){
                                ?>
                            <li class="active">
                                <?php }else{ ?>
                            <li>
                                <?php } ?>
                                <a href="?p=Village">
                                    <span>Data Desa</span>
                                </a>
                            </li>
                            <!--Data Kecamatan-->
                            <?php 
                                if(@$_GET['p'] == 'Districts'){
                                ?>
                            <li class="active">
                                <?php }else{ ?>
                            <li>
                                <?php } ?>
                                <a href="?p=Districts">
                                    <span>Data Kecamatan</span>
                                </a>
                            </li>
                            <!--Data Kota/Kabupaten-->
                            <?php 
                                if(@$_GET['p'] == 'City'){
                                ?>
                            <li class="active">
                                <?php }else{ ?>
                            <li>
                                <?php } ?>
                                <a href="?p=City">
                                    <span>Data Kota/Kabupaten</span>
                                </a>
                            </li>
                            <!--Data Provinsi-->
                            <?php 
                                if(@$_GET['p'] == 'Province'){
                                ?>
                            <li class="active">
                                <?php }else{ ?>
                            <li>
                                <?php } ?>
                                <a href="?p=Province">
                                    <span>Data Provinsi</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                        </ul>
                    </li>
                    <!--
                        <?php 
                        if(@$_GET['p'] == 'AppSettings'){
                        ?>
                    <li class="active">
                        <?php }else{ ?>
                    <li>
                        <?php } ?>
                        <a href="?p=AppSettings">
                            <i class="material-icons">settings_applications</i>
                            <span>Pengaturan Aplikasi</span>
                        </a>
                    </li>
                    -->
                    <?php 
                        if(@$_GET['p'] == 'BackupRestore'){
                        ?>
                    <li class="active">
                        <?php }else{ ?>
                    <li>
                        <?php } ?>
                        <a href="?p=BackupRestore">
                            <i class="material-icons">settings_backup_restore</i>
                            <span>Backup & Restore</span>
                        </a>
                    </li>
                    <?php 
                        if(@$_GET['p'] == 'Changelogs'){
                        ?>
                    <li class="active">
                        <?php }else{ ?>
                    <li>
                        <?php } ?>
                        <a href="?p=Changelogs">
                            <i class="material-icons">update</i>
                            <span>Data Pembaruan</span>
                        </a>
                    </li>
                    <?php 
                        if(@$_GET['p'] == 'About'){
                        ?>
                    <li class="active">
                        <?php }else{ ?>
                    <li>
                        <?php } ?>
                        <a href="?p=About">
                            <i class="material-icons">contact_phone</i>
                            <span>About & Contact</span>
                        </a>
                    </li>
                    <li>
                        <a href="Controller/Logout/Logout.php">
                            <i class="material-icons">power_settings_new</i>
                            <span>Logout</span>
                        </a>
                    </li>