 <script type="text/javascript">
    $(document).ready(function(){
        date();
        uang();
        select();
        <?php 
        if(@$_GET['p'] == '')
        {

        }
        elseif(@$_GET['p'] == 'Transaction')
        { ?>
            uang();
            lookupPilihSiswa();
            TabelTransaksiBaru();
        <?php }elseif(@$_GET['p'] == 'ListTransaction'){ ?>
            listTransaction();
        <?php }elseif(@$_GET['p'] == 'StudentList'){ ?>
            masterDaftarSiswa();
            listSiswa();
        <?php }elseif(@$_GET['p'] == 'CashIn'){ ?>
            showKasMasuk();
        <?php }elseif(@$_GET['p'] == 'CashOut'){ ?>
            showKasKeluar();
        <?php }elseif(@$_GET['p'] == 'CashRecaps'){ ?>
            recapsCash();
            //showKasRekap();
        <?php }elseif(@$_GET['p'] == 'SpecialCash'){ ?>
            kasKhusus();
        <?php }elseif(@$_GET['k'] == 'Manage'){ ?>
            kelolaKasKhusus();
        <?php }elseif(@$_GET['p'] == 'SettFinancialMaster'){ ?>
            showMasterTransaksi();
        <?php }elseif(@$_GET['p'] == 'SettFinancialType'){ ?>
            showJnsTransaksi(); 
        <?php }elseif(@$_GET['p'] == 'SettCashIn'){ ?>
            JnsKasMsk();
        <?php }elseif(@$_GET['p'] == 'SettCashOut'){ ?>
            JnsKasKlr();
        <?php }elseif(@$_GET['p'] == 'DataStudyProgram'){ ?>
            showProgramStudi();
        <?php }elseif(@$_GET['p'] == 'DataClass'){ ?>
            showKelas();
        <?php }elseif(@$_GET['p'] == 'Village'){ ?>
            dataDesa();
        <?php }elseif(@$_GET['p'] == 'Districts'){ ?>
            dataKecamatan();
        <?php }elseif(@$_GET['p'] == 'City'){ ?>
            dataKota();
        <?php }elseif(@$_GET['p'] == 'Province'){ ?>
            dataProvinsi();
        <?php }elseif(@$_GET['p'] == 'UserData'){ ?>
            tabel_data_pengguna();
        <?php }elseif(@$_GET['p'] == 'UserAccountAdmin'){ ?>
            tabel_akun_pengguna();
        <?php }elseif(@$_GET['p'] == 'LogActivity'){ ?>
            tabel_log_aktivitas();
        <?php }else{ ?>  
        tabel_akun_siswa();
        <?php } ?>
        
        
        
       <?php include"Javascript/Ajax/Transaksi/transaksi.js";?>
       <?php include"Javascript/Ajax/PengaturanKeuangan/JenisTransaksi/jenisTransaksi.js";?>
       <?php include"Javascript/Ajax/PengaturanKeuangan/MasterTransaksi/masterTransaksi.js";?>
       <?php include"Javascript/Ajax/Siswa/siswa.js";?>
       <?php include"Javascript/Ajax/PengaturanData/ProfilAdmin/profilAdmin.js";?>
       <?php include"Javascript/Ajax/PengaturanData/DataSekolah/editDataSekolah.js"; ?>
       <?php include"Javascript/Ajax/PengaturanData/ProgramStudi/programStudi.js"; ?>
       <?php include"Javascript/Ajax/PengaturanData/DataKelas/dataKelas.js"; ?>
       <?php include"Javascript/Ajax/Kas/KasMasuk/kasMasuk.js"; ?>
       <?php include"Javascript/Ajax/Kas/KasKeluar/kasKeluar.js"; ?>
       <?php include"Javascript/Ajax/Kas/KasRekap/kasRekap.js"; ?>
       <?php include"Javascript/Ajax/PengaturanKeuangan/JenisKasMasuk/jenisKasMasuk.js"; ?>
       <?php include"Javascript/Ajax/PengaturanKeuangan/JenisKasKeluar/jenisKasKeluar.js"; ?>
       <?php include"Javascript/Ajax/KasKhusus/kasKhusus.js"; ?>
       <?php include"Javascript/Ajax/KasKhusus/Kelola/kasKelola.js"; ?>
       <?php include"Javascript/Ajax/Administrator/DataPengguna/dataPengguna.js"; ?>
       <?php include"Javascript/Ajax/Administrator/AkunPengguna/Admin/akunPengguna.js"; ?>
       <?php #include"WEBMASTER/AkunPengguna/Siswa/akunSiswa.js"; ?>
       <?php include"Javascript/Ajax/PengaturanData/DataAlamat/DataDesa/dataDesa.js"; ?>
       <?php include"Javascript/Ajax/PengaturanData/DataAlamat/DataKecamatan/dataKecamatan.js"; ?>
       <?php include"Javascript/Ajax/PengaturanData/DataAlamat/DataKota/dataKota.js"; ?>
       <?php include"Javascript/Ajax/PengaturanData/DataAlamat/DataProvinsi/dataProvinsi.js"; ?>
       <?php include"Javascript/Ajax/BackupDatabase/BackupDatabase.js"; ?>
       <?php include"Javascript/Ajax/LogAktivitas/logAktivitas.js"; ?>
       <?php include"Javascript/Ajax/TunggakanSiswa/tunggakanReguler.js"; ?>
       <?php include"Javascript/Ajax/TunggakanSiswa/tunggakanKhusus.js"; ?>

    //-----------TEMPAT PERCOBAAN AJAX SCRIPT-----------------------------------------------------

//-----------AKHIR TEMPAT PERCOBAAN AJAX SCRIPT-----------------------------------------------
      
});

//--------------------------------------------------------DATA PAGE / CUSTOM------------------------------------------------------------------------------// 





//-----------/////////////////-----------------------------------------------



//-----------/////////////////-----------------------------------------------



//REDIRECT CTRL+U-----------------------------------------------------------------
function redirectCU(e) {
  if (e.ctrlKey && e.which == 85) {
    window.location.replace("https://instagram.com/iqbalrevvin");
    return false;
  }
}
document.onkeydown = redirectCU;
//-----------/////////////////-----------------------------------------------

document.addEventListener("contextmenu", function(e){
    e.preventDefault();
}, false);

function refresh() {
    window.location.reload();
}

//FUNGSI MODAL COLOR
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
//FUNGSI MODAL COLOR-------------------------------------------------------------------------------

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

 function date(){
 $('.datepicker').bootstrapMaterialDatePicker({
                    format: 'YYYY-MM-DD',
                    clearButton: true,
                    weekStart: 1,
                    time: false
                });
}
function select(){
    $('.selectpicker').selectpicker({
  size: 4
    });
}

 function password_wrong() {
    swal({
        title: "Password Lama Tidak Sesuai",
        text: "Isi Dengan Password Saat Ini!",
        type: "warning",
    });
    }

function password_not_matching() {
    swal({
        title: "Password Baru Tidak Sesuai",
        text: "Pastikan Password Baru dan Pengulangan Password Sesuai!",
        type: "warning",
    });
    }
    
        
    //Pop Up Jika Data Input Ada Yang Kosong
    function value_null() {
    swal({
        title: "Data Tidak Lengkap",
        text: "Isi Dengan Lengkap Setiap Kolom Entry Data!",
        type: "warning",
    });
    }
    function passFailed() {
    swal({
        title: "KONFIRMASI KEAMANAN GAGAL",
        text: "Password Tidak Sesuai / Kolom Input Belum di Isi",
        type: "warning",
    });
    }
    //POP UP Jika Tunggakan Sudah Lunas
    // Pop Up Jika Data Berhasil di Input
    function inputSukses() {
    swal("Proses Berhasil!", "Sistem Terhubung Ke Database", "success");
    }

    // Menampilkan Tabel Daftar KAS MASUK
    function showKasMasuk(){
        $.ajax({
            url: 'View/Bendahara/Kas/KasMasuk/showKasMasuk.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#showKasMasuk').html(response);
                $('.datatable').DataTable();
                date();
                select();
                uang();
            }
        });
    }
function TabelTransaksiBaru(){
        $.ajax({
            url: 'View/Bendahara/Transaksi/TabelTransaksiBaru.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#show').html(response);
                $('.datatable').DataTable();
            }
        });
    }
    // Menampilkan Tabel Daftar KAS KELUAR
    function showKasKeluar(){
        $.ajax({
            url: 'View/Bendahara/Kas/KasKeluar/showKasKeluar.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(result){
                $('#showKasKeluar').html(result);
                $('.datatable').DataTable();
                date();
                select();
                uang();
            }
        });
    } 
    // Menampilkan Tabel Daftar KAS REKAP
    function showKasRekap(){
        $.ajax({
            url: 'admin/page/Kas/KasRekap/showKasRekap.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(result){
                $('#showKasRekap').html(result);
                $('.datatable').DataTable();
            }
        });
    } 
    //function showKasKeluar() {
        //$('#showKasKeluar').load('admin/page/Kas/KasKeluar/showKasKeluar.php');

    // Menampilkan Tabel Daftar Kelas
    function showKelas(){
        $.ajax({
            url: 'View/Bendahara/PengaturanData/DataKelas/showKelas.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#showKelas').html(response);
                $('.datatable').DataTable();
                select();
            }
        });
    }
    // Menampilkan Tabel Daftar Program Studi
    function showProgramStudi(){
        $.ajax({
            url: 'View/Bendahara/PengaturanData/DataProgramStudi/showProgramStudi.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#showProgramStudi').html(response);
                $('.datatable').DataTable();
                select();
            }
        });
    }
    // Menampilkan Tabel Data Desa
    function dataDesa(){
        $.ajax({
            url: 'View/Bendahara/PengaturanData/DataAlamat/DataDesa/tabelDataDesa.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#dataDesa').html(response);
                $('.datatable').DataTable();
            }
        });
    }
    function dataKecamatan(){
        $.ajax({
            url: 'View/Bendahara/PengaturanData/DataAlamat/DataKecamatan/tabelDataKecamatan.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#dataKecamatan').html(response);
                $('.datatable').DataTable();
            }
        });
    }
    function dataKota(){
        $.ajax({
            url: 'View/Bendahara/PengaturanData/DataAlamat/DataKota/tabelDataKota.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#dataKota').html(response);
                $('.datatable').DataTable();
            }
        });
    }
    function dataProvinsi(){
        $.ajax({
            url: 'View/Bendahara/PengaturanData/DataAlamat/DataProvinsi/tabelDataProvinsi.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#dataProvinsi').html(response);
                $('.datatable').DataTable();
            }
        });
    }
    // Menampilkan Tabel Jenis Transaksi
    function showMasterTransaksi(){
        $.ajax({
            url: 'View/Bendahara/PengaturanKeuangan/MasterPembayaran/showMasterTransaksi.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#showMasterTransaksi').html(response);
                $('.datatable').DataTable();
                select();
            }
        });
    }

    // Menampilkan Tabel Jenis Transaksi
    function showJnsTransaksi(){
        $.ajax({
            url: 'View/Bendahara/PengaturanKeuangan/JenisPembayaran/showJnsTransaksi.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#showJnsTransaksi').html(response);
                $('.datatable').DataTable();
                select();

            }
        });
    }
    function JnsKasMsk(){
        $.ajax({
            url: 'View/Bendahara/PengaturanKeuangan/JenisKasMasuk/tabelJenisKasMsk.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#showJnsKasMsk').html(response);
                $('.datatable').DataTable();
                select();
            }
        });
    }

    function JnsKasKlr(){
        $.ajax({
            url: 'View/Bendahara/PengaturanKeuangan/JenisKasKeluar/tabelJenisKasKlr.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#showJnsKasKlr').html(response);
                $('.datatable').DataTable();
                select();
            }
        });
    }
    function kasKhusus(){
        $.ajax({
            url: 'View/Bendahara/Kas/KasKhusus/tabelKasKhusus.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#showTabelKasKhusus').html(response);
                $('.datatable').DataTable();
            }
        });
    }

    function kelolaKasKhusus(){
        $.ajax({
            url: 'admin/page/KasKhusus/Kelola/tabelKelolaKasKhusus.php',
            type: 'GET',
            async: false,
            data:{
                show:1,
            },
            success: function(response){
                $('#showTabelKelolaKasKhusus').html(response);
                $('.datatable').DataTable();
            }
        });
    }

    // Menampilkan Tabel Transaksi Terbaru Setelah Input Data
    function listTransaction(){
        var dataTable = $('#lookup').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax":{
                        url :"Controller/Bendahara/DaftarTransaksi/loadListTransaction.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".lookup-error").html("");
                            $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#lookup_processing").css("display","none");     
                        }
                    }
                } );
    }

    function lookupPilihSiswa(){
        var dataTable = $('#lookupPilihSiswa').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax":{
                        url :"Controller/Bendahara/Transaksi/lookupPilihSiswa.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".lookup-error").html("");
                            $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#lookup_processing").css("display","none");     
                        }
                    }
                } );
        
    }
    function recapsCash(){
        var dataTable = $('#recapsCash').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax":{
                        url :"Controller/Bendahara/Kas/KasRekap/loadRecaps.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".recapsCash-error").html("");
                            $("#recapsCash").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#recapsCash_processing").css("display","none");     
                        }
                    }
                } );
    }
   /* function listTransaction(){
        $.ajax({
            url: 'admin/page/DaftarTransaksi/masterDaftarTransaksi.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#listTrans').html(response);
                $('.datatable').DataTable();
            }
        });
    } */
    
    // File Master Beranda yang di Load Menggunakan Javascript
    function masterDaftarSiswa(){
        $.ajax({
            url: 'View/Bendahara/DaftarSiswa/masterDaftarSiswa.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#daftarsiswa').html(response);
                $('.datatable').DataTable();
            }
        });
    }

//------------DAFTAR SISWA DATATABLES SERVERSIDE-----------------------------------------------------
    function listSiswa(){
        var dataTable = $('#lookupSiswa').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "columnDefs": [ {
                          "targets": 0,
                          "orderable": false,
                          "searchable": true
                           
                        } ],
                    "ajax":{
                        url :"Controller/Bendahara/DaftarSiswa/loadLookupSiswa.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".lookupSiswa-error").html("");
                            $("#lookupSiswa").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#lookupSiswa_processing").css("display","none");     
                        }
                    }
                } );
                $('#BtnDelSiswa').on("click", function(){ // triggering delete one by one
                    $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
                    $("#deleteLoad").show().html("<img src='Assets/Images/load2.gif' width='40' height='40'>");
                    $pass1=$('#pass1').val();
                    $pass2=$('#pass2').val();
                    //////////////////////////////////////////////////////////////////////////////
                    var passconfirm = $('#passconfirm').val();
                    if ($pass1!=passconfirm || $pass2!=passconfirm ){
                        passFailed();
                        $("#loading").hide();
                        $("#deleteLoad").hide();
                    }
                    else if( $('.delCheckRowSiswa:checked').length > 0 ){  // at-least one checkbox checked
                        $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
                        $("#deleteLoad").show().html("<img src='Assets/Images/load2.gif' width='40' height='40'>");
                        var ids = [];
                        $('.delCheckRowSiswa').each(function(){
                            if($(this).is(':checked')) { 
                                ids.push($(this).val());
                            }
                        });

                        var ids_string = ids.toString();  // array to string conversion 
                        $.ajax({
                            type: "POST",
                            url: "Controller/Bendahara/DaftarSiswa/deleteSiswaQuery.php",
                            data: {data_ids:ids_string},
                            success: function(result) {
                                dataTable.draw(); // redrawing datatable
                                $('#delSiswa').modal('hide');
                                $("#formDelSiswa")[0].reset();
                                $('body').removeClass('modal-open');
                                $('.modal-backdrop').remove();
                                swal("BERHASIL HAPUS DATA", "Data Siswa Berhasil Di Hapus", "warning");
                                $("#loading").hide();
                                $("#deleteLoad").hide();
                            },
                            async:false
                        });
                    }else{
                        swal("GAGAL", "Pilih Dahulu Siswa Yang Ingin Dihapus! :)", "warning");
                        $("#loading").hide();
                        $("#deleteLoad").hide();
                    }
                }); 
            
                $("#AllCheckSiswa").on('click',function() { // bulk checked
                    var status = this.checked;
                    $(".delCheckRowSiswa").each(function() {
                        $(this).prop("checked",status);
                    });
                });
    }
//-----------------------------------------------------------------------------------------------------------------

    function tabel_data_pengguna(){
        $.ajax({
            url: 'View/Administrator/DataPengguna/tabelDaftarDataPengguna.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#showTabelDataPengguna').html(response);
            }
        });
    }
    function tabel_akun_pengguna(){
        $.ajax({
            url: 'View/Administrator/AkunPengguna/Admin/tabelDaftarAkunPengguna.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#showTabelAkunPengguna').html(response);
            }
        });
    }
    function tabel_akun_siswa(){
        $.ajax({
            url: 'admin/WEBMASTER/Page/AkunPengguna/siswa/tabelAkunSiswa.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#showTabelAkunSiswa').html(response);
                $('.datatable').DataTable();
            }
        });
    }
    /*function tabel_log_aktivitas(){
        $.ajax({
            url: 'admin/WEBMASTER/Page/LogAktivitas/tabelLogAktivitas.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#tabelLogAktivitas').html(response);
                $('.datatable').DataTable();
            }
        });
    }*/
    function tabel_log_aktivitas(){
        var auto_refresh = setInterval(
        function () {
            $('#tabelLogAktivitas').load('View/Administrator/LogAktivitas/tabelLogAktivitas.php');
        }, 1000); // refresh setiap Detik Yang Di Tentukan
    }
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
    }) (jQuery);
//FUNGSI MENAMPILKAN MATA UANG ONKEYPRESS
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
////////////////////////
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

       
  function notif(colorName, text, placementFrom, placementAlign, animateEnter, animateExit) {
    if (colorName === null || colorName === '') { colorName = 'bg-black'; }
    if (text === null || text === '') { text = 'Turning standard Bootstrap alerts'; }
    if (animateEnter === null || animateEnter === '') { animateEnter = 'animated fadeInDown'; }
    if (animateExit === null || animateExit === '') { animateExit = 'animated fadeOutUp'; }
    var allowDismiss = true;

    $.notify({
        message: text
    },
        {
            type: colorName,
            allow_dismiss: allowDismiss,
            newest_on_top: true,
            timer: 1000,
            placement: {
                from: placementFrom,
                align: placementAlign
            },
            animate: {
                enter: animateEnter,
                exit: animateExit
            },
            template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });
}
// Fungsi Input Jumlah Bayar Hanya Bisa Angka
function inputAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }

var auto_refresh = setInterval(
    function () {
       $('#iddle').load('Controller/Login/cekIddle.php');
    }, 1000); // refresh setiap Detik Yang Di Tentukan
/*var auto_refresh = setInterval(
    function () {
       $('#warningLogout').load('login/warningLogout.php');
    }, 150000); // refresh setiap Detik Yang Di Tentukan
*/

</script>
    <!-- Bootstrap Core Js -->