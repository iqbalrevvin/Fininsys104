 $(document).ready(function() {
    listSiswa();
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
                    $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
                    $("#deleteLoad").show().html("<img src='Assets/images/load2.gif' width='40' height='40'>");
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
                        $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
                        $("#deleteLoad").show().html("<img src='Assets/images/load2.gif' width='40' height='40'>");
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


     //Insert Siswa Baru
       $(document).on('click', '#bntAddSiswa', function(){
            $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
            $("#loading2").show().html("<img src='Assets/images/load2.gif' width='40' height='40'>");
            if ($('#namaSiswa').val()=="" || $('#nisnSiswa').val()=="" || $('#nikSiswa').val()=="" 
                || $('#nipdSiswa').val()=="" || $('#tglMasukSiswa').val()==""  || $('#jenisKelamin').val()=="" 
                || $('#prodiSiswa').val()==""){
                value_null()
                $("#loading").hide();
                $("#loading2").hide();
            }else{
            $('#modalAddSiswa').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove(); 
            $namaSiswa      =$('#namaSiswa').val();
            $jenisKelamin   =$('#jenisKelamin').val();
            $nikSiswa       =$('#nikSiswa').val();
            $nisnSiswa      =$('#nisnSiswa').val();
            $nipdSiswa      =$('#nipdSiswa').val();
            $tglMasukSiswa  =$('#tglMasukSiswa').val();
            $prodiSiswa     =$('#prodiSiswa').val();
            $tmpLahirSiswa  =$('#tmpLahirSiswa').val();
            $tglLahirSiswa  =$('#tglLahirSiswa').val();
            $agamaSiswa     =$('#agamaSiswa').val();
            $alamatSiswa    =$('#alamatSiswa').val();
            $desaSiswa      =$('#desaSiswa').val();
            $kecSiswa       =$('#kecSiswa').val();
            $kotaSiswa      =$('#kotaSiswa').val();
            $provSiswa      =$('#provSiswa').val();
            $hpSiswa        =$('#hpSiswa').val();
            $emailSiswa     =$('#emailSiswa').val();
            $pipSiswa       =$('#pipSiswa').val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/DaftarSiswa/addSiswaQuery.php",
                    data: {
                        namaSiswa       :$namaSiswa,
                        jeniskelamin    :$jenisKelamin,
                        nikSiswa        :$nikSiswa,
                        nisnSiswa       :$nisnSiswa,
                        nipdSiswa       :$nipdSiswa,
                        tglMasukSiswa   :$tglMasukSiswa,
                        prodiSiswa      :$prodiSiswa,
                        tmpLahirSiswa   :$tmpLahirSiswa,
                        tglLahirSiswa   :$tglLahirSiswa,
                        agamaSiswa      :$agamaSiswa,
                        alamatSiswa     :$alamatSiswa,
                        desaSiswa       :$desaSiswa,
                        kecSiswa        :$kecSiswa,
                        kotaSiswa       :$kotaSiswa,
                        provSiswa       :$provSiswa,
                        hpSiswa         :$hpSiswa,
                        emailSiswa      :$emailSiswa,
                        pipSiswa        :$pipSiswa,
                        addSiswa        :1,
                    },               
                    success: function(response){
                        $("#loading").hide(); 
                        swal({
                            title: "DATA BERHASIL DITAMBAHKAN",
                            text: "Data Siswa Berhasil Di Ditambahkan",
                            type: "success",
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,
                        }, function () {
                                setTimeout(function () {
                                    refresh();
                                }, 1500);
                            });    
                    }
                });
            }
        });
       //Hapus Siswa
       $(document).on('click', '.deleteSiswa', function(){
        $id=$(this).val();
        $pass1=$('#pass1'+$id).val();
        $pass2=$('#pass2'+$id).val();
        //////////////////////////////////////////////////////////////////////////////
        var passconfirm = $('#passconfirm'+$id).val();
        if ($pass1!=passconfirm || $pass2!=passconfirm ){
            passFailed();
        }else{
        $('#delSiswa'+$id).modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        var namasiswa = $(this).data('delete');
        swal({
        title: "KONFIRMASI HAPUS SISWA",
        text: "Data Siswa Beserta Data Transaksi Atas Nama : \""+namasiswa+"\" Akan Di Hapus Secara Permanen ",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Lanjutkan, Hapus",
        cancelButtonText: "Batalkan",
        closeOnConfirm: false,
        closeOnCancel: false
        },      function (isConfirm) {
                    if (isConfirm) {
                        $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
                        $("#deleteLoad").show().html("<img src='Assets/images/load2.gif' width='40' height='40'>");
                        $.ajax({
                            type: "POST",
                            url: "Controller/Bendahara/DaftarSiswa/deleteSiswaQuery.php",
                            data: {
                                idSiswa: $id,
                                delSiswa: 1,
                            },
                            success: function(response){
                                $("#loading").hide(); 
                                swal({
                                    title: "DATA BERHASIL DIHAPUS",
                                    text: "Data Siswa Berhasil Dihapus",
                                    type: "success",
                                    closeOnConfirm: false,
                                    showLoaderOnConfirm: true,
                                }, function () {
                                        setTimeout(function () {
                                            refresh();
                                        }, 1500);
                                    });    
                            }
                        });
                    } else {
                        swal("Cancelled", "Tindakan di Batalkan :)", "error");
                        $("#loading").hide();
                        $("#deleteLoad").hide();
                    }
                });
                }
            });

       //Edit Data Siswa
       $(document).on('click', '#bntEditSiswa', function(){
            $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
            $("#loading2").show().html("<img src='Assets/images/load2.gif' width='40' height='40'>");
            if ($('#editNamaSiswa').val()=="" || $('#editNisnSiswa').val()=="" || $('#editNikSiswa').val()=="" 
                || $('#editNipdSiswa').val()=="" || $('#editTglMasukSiswa').val()==""  || $('#editJenisKelamin').val()=="" 
                || $('#editProdiSiswa').val()==""  ){
                value_null()
                $("#loading").hide();
                $("#loading2").hide();
            }else{
            $idSiswa            =$('#idSiswa').val();
            $editNamaSiswa      =$('#editNamaSiswa').val();
            $editJenisKelamin   =$('#editJenisKelamin').val();
            $editNikSiswa       =$('#editNikSiswa').val();
            $editNisnSiswa      =$('#editNisnSiswa').val();
            $editNipdSiswa      =$('#editNipdSiswa').val();
            $editTglMasukSiswa  =$('#editTglMasukSiswa').val();
            $editStatusPindah   =$('#editStatusPindah').val();
            $editTglPindahSiswa =$('#editTglPindahSiswa').val();
            $editPindahSemester =$('#editPindahSemester').val();
            $editProdiSiswa     =$('#editProdiSiswa').val();
            $editTmpLahirSiswa  =$('#editTmpLahirSiswa').val(); 
            $editTglLahirSiswa  =$('#editTglLahirSiswa').val();
            $editAgamaSiswa     =$('#editAgamaSiswa').val();
            $editAlamatSiswa    =$('#editAlamatSiswa').val();
            $editDesaSiswa      =$('#editDesaSiswa').val();
            $editKecSiswa       =$('#editKecSiswa').val();
            $editKotaSiswa      =$('#editKotaSiswa').val();
            $editProvSiswa      =$('#editProvSiswa').val();
            $editHpSiswa        =$('#editHpSiswa').val();
            $editEmailSiswa     =$('#editEmailSiswa').val();
            $editPipSiswa       =$('#editPipSiswa').val();
            $editNamaAyah       =$('#editNamaAyah').val();
            $editThnLhrAyah     =$('#editThnLhrAyah').val();
            $editPendAyah       =$('#editPendAyah').val();
            $editPkjAyah        =$('#editPkjAyah').val();
            $editPengAyah       =$('#editPengAyah').val();
            $editNamaIbu        =$('#editNamaIbu').val();
            $editThnLhrIbu      =$('#editThnLhrIbu').val();
            $editPendIbu        =$('#editPendIbu').val();
            $editPkjIbu         =$('#editPkjIbu').val();
            $editPengIbu        =$('#editPengIbu').val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/DaftarSiswa/editSiswaQuery.php",
                    data: {
                        idSiswa                 :$idSiswa,
                        editNamaSiswa           :$editNamaSiswa,
                        editJenisKelamin        :$editJenisKelamin,
                        editNikSiswa            :$editNikSiswa,
                        editNisnSiswa           :$editNisnSiswa,
                        editNipdSiswa           :$editNipdSiswa,
                        editStatusPindah        :$editStatusPindah,
                        editTglPindahSiswa      :$editTglPindahSiswa,
                        editTglMasukSiswa       :$editTglMasukSiswa,
                        editPindahSemester      :$editPindahSemester,
                        editProdiSiswa          :$editProdiSiswa,
                        editTmpLahirSiswa       :$editTmpLahirSiswa, 
                        editTglLahirSiswa       :$editTglLahirSiswa,
                        editAgamaSiswa          :$editAgamaSiswa,
                        editAlamatSiswa         :$editAlamatSiswa,
                        editDesaSiswa           :$editDesaSiswa,
                        editKecSiswa            :$editKecSiswa,
                        editKotaSiswa           :$editKotaSiswa,
                        editProvSiswa           :$editProvSiswa,
                        editHpSiswa             :$editHpSiswa,
                        editEmailSiswa          :$editEmailSiswa,
                        editPipSiswa            :$editPipSiswa,
                        editNamaAyah            :$editNamaAyah,
                        editThnLhrAyah          :$editThnLhrAyah,
                        editPendAyah            :$editPendAyah,
                        editPkjAyah             :$editPkjAyah,
                        editPengAyah            :$editPengAyah,
                        editNamaIbu             :$editNamaIbu,
                        editThnLhrIbu           :$editThnLhrIbu,
                        editPendIbu             :$editPendIbu,
                        editPkjIbu              :$editPkjIbu,
                        editPengIbu             :$editPengIbu,
                        editSiswa               :1,
                    },               
                    success: function(response){
                        $("#loading").hide(); 
                        swal({
                            title: "DATA BERHASIL DI PERBARUI",
                            text: "Data Siswa Berhasil Di Perbarui",
                            type: "success",
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,
                        }, function () {
                                setTimeout(function () {
                                    refresh();
                                }, 1500);
                            });    
                    }
                });
            }
        });

//TAMBAH TRANSAKSI KHUSUS SISWA
$(document).on('click', '#bntAddJnsTransaksiKhusus', function(){
    $id=$(this).val();
    $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
    if ($('#idJenisTrans').val()=="" || $('#thnPembayaran').val()==""){
        value_null()
        $("#loading").hide();
    }else{
        $idSiswa            =$id;
        $idJenisTrans       =$('#idJenisTrans').val();
        $thnPembayaran      =$('#thnPembayaran').val();
        $.ajax({
        type: "POST",
        url: "Controller/Bendahara/DaftarSiswa/ProfilSiswa/addJenisPembayaranKhususQr.php",
        data: {
            idSiswa                         :$idSiswa,
            idJenisTrans                    :$idJenisTrans,
            thnPembayaran                   :$thnPembayaran,
            addJenisPembayaranKhususSiswa   :1,
        },               
        success: function(response){
            $("#loading").hide(); 
            swal({
                title: "DATA BERHASIL DI PROSES",
                text: "Data Transaksi Khusus Untuk Siswa Ini Berhasil Di Tambahkan",
                type: "success",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function () {
                    setTimeout(function () {
                        refresh();
                    }, 1500);
                });    
        }
    });
}
        });

 // Hapus Master Transaksi Terbaru
        $(document).on('click', '.delJenisTransaksiKhusus', function(){
        $id=$(this).val();
        var hapus = $(this).data('delete');
        swal({
        title: "Yakin Dengan Tindakan Ini?",
        text: "Jenis Transaksi Khusus : \""+hapus+"\" Akan di Hapus Dari Siswa Ini dan Tidak Bisa Dikembalikan",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, Lanjutkan!",
        cancelButtonText: "Tidak, Kembali!",
        closeOnConfirm: false,
        closeOnCancel: false
        },      function (isConfirm) {
                    if (isConfirm) {
                        $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
                        $("#deleteLoad").show().html("<img src='Assets/images/load2.gif' width='40' height='40'>");
                        $.ajax({
                            type: "POST",
                            url: "Controller/Bendahara/DaftarSiswa/ProfilSiswa/deleteJenisPembayaranKhususQr.php",
                            data: {
                                id: $id,
                                delJenisTransaksiKhusus: 1,
                            },
                            success: function(response){ 
                                swal({
                                    title: "DATA BERHASIL DI HAPUS",
                                    text: "Jenis Transaksi Khusus : \""+hapus+"\" Dari Siswa Ini Berhasil Dihapus",
                                    type: "success",
                                    closeOnConfirm: false,
                                    showLoaderOnConfirm: true,
                                }, function () {
                                        setTimeout(function () {
                                            refresh();
                                        }, 1500);
                                    });    
                            }
                        });
                    } else {
                        swal("Cancelled", "Tindakan di Batalkan :)", "error");
                        $("#loading").hide();
                        $("#deleteLoad").hide();
                    }
                });

            });
//-----------------------------------------------------------------------------------------------------------------
});