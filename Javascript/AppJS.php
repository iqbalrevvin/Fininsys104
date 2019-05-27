<?php if(@$_GET['p'] == ''){ ?>
<!--code here-->
<?php }elseif(@$_GET['p'] == 'UserData'){ ?>
  <script src="Javascript/Pengguna/dataPengguna.js"></script>
  <script src="Javascript/PengaturanData/profilAdmin.js"></script>
<?php }elseif(@$_GET['p'] == 'UserAccountAdmin'){ ?>
  <script src="Javascript/Pengguna/akunPengguna.js"></script>
<?php }elseif(@$_GET['p'] == 'LogActivity' || @$_GET['k'] == 'ListLog'){ ?>
    <script src="Javascript/LogAktivitas/logAktivitas.js"></script>
<?php }elseif(@$_GET['p'] == 'Transaction'){ ?>
	<script src="Javascript/Transaksi/transaksi.js"></script>
<?php }elseif(@$_GET['p'] == 'ListTransaction'){ ?>
	<script src="Javascript/DaftarTransaksi/daftarTransaksi.js"></script>
<?php }elseif(@$_GET['p'] == 'CashIn'){ ?>
	<script src="Javascript/ManejemenKas/KasMasuk/kasMasuk.js"></script>
<?php }elseif(@$_GET['p'] == 'CashOut'){ ?>
  <script src="Javascript/ManejemenKas/KasKeluar/kasKeluar.js"></script>
<?php }elseif(@$_GET['p'] == 'CashRecaps'){ ?>
  <script src="Javascript/ManejemenKas/KasRekap/kasRekap.js"></script>
<?php }elseif(@$_GET['p'] == 'SpecialCash'){ ?>
  <script src="Javascript/ManejemenKas/KasKhusus/kasKhusus.js"></script>
<?php }elseif(@$_GET['k'] == 'Manage'){ ?>
  <script src="Javascript/KasKhusus/kasKelola.js"></script>
<?php }elseif(@$_GET['p'] == 'StudentList'){ ?>
  <script src="Javascript/DaftarSiswa/daftarSiswa.js"></script>
<?php }elseif(@$_GET['p'] == 'SettFinancialMaster'){ ?>
  <script src="Javascript/PengaturanKeuangan/masterTransaksi.js"></script>
<?php }elseif(@$_GET['p'] == 'SettFinancialType'){ ?>
  <script src="Javascript/PengaturanKeuangan/jenisTransaksi.js"></script>
<?php }elseif(@$_GET['p'] == 'SettCashIn'){ ?>
  <script src="Javascript/PengaturanKeuangan/jenisKasMasuk.js"></script>
<?php }elseif(@$_GET['p'] == 'SettCashOut'){ ?>
<script src="Javascript/PengaturanKeuangan/jenisKasKeluar.js"></script>
<?php }elseif(@$_GET['p'] == 'ReportDebt'){ ?>
  <script src="Javascript/TunggakanSiswa/tunggakanReguler.js"></script>
<?php }elseif(@$_GET['p'] == 'ReportDebtSpecial'){ ?>
  <script src="Javascript/TunggakanSiswa/tunggakanKhusus.js"></script>
<?php }elseif(@$_GET['p'] == 'AdminProfile'){ ?>
    <script src="Javascript/PengaturanData/profilAdmin.js"></script>
<?php }elseif(@$_GET['p'] == 'SchoolProfile'){ ?>
    <script src="Javascript/PengaturanData/profilSekolah.js"></script>
<?php }elseif(@$_GET['p'] == 'DataStudyProgram'){ ?>
    <script src="Javascript/PengaturanData/dataProgramStudi.js"></script>
<?php }elseif(@$_GET['p'] == 'DataClass'){ ?>
    <script src="Javascript/PengaturanData/dataKelas.js"></script>
<?php }elseif(@$_GET['p'] == 'Village'){ ?>
    <script src="Javascript/PengaturanData/PengaturanAlamat/dataDesa.js"></script>
<?php }elseif(@$_GET['p'] == 'Districts'){ ?>
    <script src="Javascript/PengaturanData/PengaturanAlamat/dataKecamatan.js"></script>
<?php }elseif(@$_GET['p'] == 'City'){ ?>
    <script src="Javascript/PengaturanData/PengaturanAlamat/dataKota.js"></script>
<?php }elseif(@$_GET['p'] == 'Province'){ ?>
    <script src="Javascript/PengaturanData/PengaturanAlamat/dataProvinsi.js"></script>
<?php }elseif(@$_GET['p'] == 'BackupRestore'){ ?>
  <script src="Javascript/BackupRestore/backupRestore.js"></script>
<?php } ?>


<script type="text/javascript">
date();
select();
iddleTime();




//IDDLE TIME
function iddleTime(){
$.sessionTimeout({

        logoutUrl: 'Controller/Logout/Logout.php',
        redirUrl: 'Controller/Logout/Logout.php',
        warnAfter: 190000,
        redirAfter: 200000,
        countdownBar: true
    });
}

//---------------

$('#cetak').on("click", function () {
  $('#invoice').printThis({
    base: '<?php $baseUrl; ?>',
  });
});
$(document).on('click', '#isi', function(){
    $id=$(this).val();
    // aksi ketika tombol cetak ditekan
    $('#cetak'+$id).bind("click", function(event) {
        // cetak data pada area <div id="#data-mahasiswa"></div>
        $('#invoice'+$id).printThis({
            base: '<?php $baseUrl; ?>',
        });
    });
});


/*var options = { mode : 'popup', popClose : false, popHt: 800, popWd: 900, strict: undefined, popTitle:'Cetak Dokumen'};
 $('#cetak').click(function(){
    $('#invoice').printArea(options);
});*/

/*FUNSI PRINT
(function($) {
        // fungsi dijalankan setelah seluruh dokumen ditampilkan
        $(document).ready(function(e) {
            $(document).on('click', '#isi', function(){
                $id=$(this).val();
                // aksi ketika tombol cetak ditekan
                $('#cetak'+$id).bind("click", function(event) {
                    // cetak data pada area <div id="#data-mahasiswa"></div>
                    $('#invoice'+$id).printArea();
                });
            });
            $('#cetak').bind("click", function(event) {
                    // cetak data pada area <div id="#data-mahasiswa"></div>
                    $('#invoice').printArea();
                });
        });
    }) (jQuery); */
//FUNSI PRINT-----------------------------------------------------------------
//FUNGSI HURUF KECIL SAAT MEMASUKAN USERNAME
 $("#editUserNameAdmin").on({
    keydown: function(e) {
    if (e.which === 32)
        return false;
  },
  keyup: function(){
    this.value = this.value.toLowerCase();
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});
//-----------------------------------------------------

//TOMBOL RELOAD
$(document).on('click', '#btnReload', function(){
    $("#deleteLoad").show().html("<img src='Assets/Images/load2.gif' width='40' height='40'>");
});

//TOMBOL RELOAD--------------------------------------------------------------------------
//FUNGSI NOTIF
  $(function () {
    $('.jsdemo-notification-info button').on('click', function () {
        var placementFrom = $(this).data('placement-from');
        var placementAlign = $(this).data('placement-align');
        var animateEnter = $(this).data('animate-enter');
        var animateExit = $(this).data('animate-exit');
        var colorName = $(this).data('color-name');
        var text = $(this).data('text');

        showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit);
    });
});
//FUNGSI NOTIF-------------------------------------------------------------------------------------------
$(function () {
    $('#modal-color').on('click', function () {
        var color = $(this).data('color');
        $('.modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('.modal fade').modal('show');
    });
});
$(function () {
    $('#modal-color2').on('click', function () {
        var color = $(this).data('color');
        $('.modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('.modal fade').modal('show');
    });
});
$(function () {
    $('#modal-color3').on('click', function () {
        var color = $(this).data('color');
        $('.modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('.modal fade').modal('show');
    });
});

//Pop Up Jika Data Berhasil di Input
    function inputSukses() {
    swal("Proses Berhasil!", "Sistem Terhubung Ke Database", "success");
    }
//Pop Up Jika Data Berhasil di Input------------------------------------

//TAMPIL JIKA PASSWORD LAMA TIDAK SESUAI SAAT EDIT AKUN PENGGUNA
 function password_wrong() {
    swal({
        title: "Password Lama Tidak Sesuai",
        text: "Isi Dengan Password Saat Ini!",
        type: "warning",
    });
    }

//TAMPIL JIKA PASSWORD BARU TIDAK SESUAI DENGAN PENGULANGAN SAAT EDIT AKUN PENGGUNA
function password_not_matching() {
    swal({
        title: "Password Baru Tidak Sesuai",
        text: "Pastikan Password Baru dan Pengulangan Password Sesuai!",
        type: "warning",
    });
    }

//PASS FAILED
function passFailed() {
    swal({
        title: "KONFIRMASI KEAMANAN GAGAL",
        text: "Password Tidak Sesuai / Kolom Input Belum di Isi",
        type: "warning",
    });
}
//PASS FAILED--------------------------------------------------------------------

// Fungsi Input HANYA ANGKA
function inputAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
}
//Fungsi Input HANYA ANGKA--------------------------------------------------------------------------------------

//Pop Up Jika Data Input Ada Yang Kosong
    function value_null() {
        swal({
            title: "Data Tidak Lengkap",
            text: "Isi Dengan Lengkap Setiap Kolom Entry Data!",
            type: "warning",
        });
    }
//------------Pop Up Jika Data Input Ada Yang Kosong

//TAMPIL TANGGAL
function date(){
 $('.datepicker').bootstrapMaterialDatePicker({
                    format: 'YYYY-MM-DD',
                    clearButton: true,
                    weekStart: 1,
                    time: false
                });
}
//TAMPIL TANGGAL----------------------------------------------------

//TAMPIL SELECT DROPDOWN
function select(){
    $('.selectpicker').selectpicker({
  size: 4
    });
}
//TAMPIL SELECT DROPDOWN--------------------------------------------------

//FUNSI REFRESH
function refresh() {
    window.location.reload();
}
//FUNSI REFRESH--------------------------------------------------------------------

//REDIRECT CTRL+U-----------------------------------------------------------------
function redirectCU(e) {
  if (e.ctrlKey && e.which == 85) {
    window.location.replace("https://instagram.com/iqbalrevvin");
    return false;
  }
}
document.onkeydown = redirectCU;
//-----------/////////////////-----------------------------------------------

//FORMAT RUPIAH
uang();
function uang(){
        var moneyFormat = wNumb({
            mark: '',
            decimals: 0,
            thousand: ',',
            prefix: 'Entry | Rp. ',
            suffix: '.-'
        });
        var moneyFormatKas = wNumb({
            mark: '',
            decimals: 0,
            thousand: ',',
            prefix: 'Jumlah Kas Masuk : Rp. ',
            suffix: '.-'
        });
        var moneyFormatKasKeluar = wNumb({
            mark: '',
            decimals: 0,
            thousand: ',',
            prefix: 'Jumlah Kas Keluar : Rp. ',
            suffix: '.-'
        });
        $('#txt_JmlByr').on('input', function() {
            $('#hasil-matauang').html( moneyFormat.to( parseInt($(this).val()) ) );
        });
        $('#jmlKasMasuk').on('input', function() {
            $('#convertKas').html( moneyFormatKas.to( parseInt($(this).val()) ) );
         });
        $('#jmlKasKeluar').on('input', function() {
            $('#convertKasKlr').html( moneyFormatKasKeluar.to( parseInt($(this).val()) ) );
        });
        $('#jmlKelolaKasMasuk').on('input', function() {
            $('#convertKelolaKasMasuk').html( moneyFormatKas.to( parseInt($(this).val()) ) );
        });
        $('#jmlKelolaKasKeluar').on('input', function() {
            $('#convertKelolaKasKeluar').html( moneyFormatKas.to( parseInt($(this).val()) ) );
        });

}
//----//FORMAT RUPIAH
</script>