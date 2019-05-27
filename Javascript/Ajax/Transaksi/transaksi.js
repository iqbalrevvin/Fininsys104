 //Insert Transaksi Baru
       $(document).on('click', '#addTransaksi', function(){
            $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
            $("#loading2").show().html("<img src='Assets/images/load2.gif' width='40' height='40'>");
            document.body.className = document.body.className.replace("Normal", "Wait");
            if ($('#txt_JmlByr').val()=="" || $('#txt_PlhSiswa').val()=="" || $('#txt_PlhJnsTrans').val()==""){
                value_null()
                $("#loading").hide();
                $("#loading2").hide();
            }
            else{
            $JmlByr=$('#txt_JmlByr').val();
            $PlhSiswa=$('#txt_PlhSiswa').val();
            $PlhJnsTrans=$('#txt_PlhJnsTrans').val();
            $ketTransaksi=$('#txt_keterangan').val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/Transaksi/InputTransaksiBaru-Backup.php",
                    data: {
                        txt_JmlByr: $JmlByr,
                        txt_PlhSiswa: $PlhSiswa,
                        txt_PlhJnsTrans: $PlhJnsTrans,
                        txt_keterangan: $ketTransaksi,
                        add: 1,
                    },
                    success: function(result){
                        $("#keterangan").html(result);
                        $("#keterangan").show();
                        TabelTransaksiBaru();
                        $("#addTrans")[0].reset();
                        $("#loading").hide();
                        $("#loading2").hide();
                        document.body.className = document.body.className.replace("Wait", "Normal");
                        
                    }
                });
            }
        });
       // Edit Transaksi Terbaru
       $(document).on('click', '.updateTransaksi', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            $("#loading2").show().html("<img src='Assets/Images/load2.gif' width='40' height='40'>");
            $uid=$(this).val();
            if ($('#upd_PlhSiswa'+$uid).val()=="" || $('#upd_PlhJnsTrans'+$uid).val()=="" || $('#upd_JmlByr'+$uid).val()==""){
                value_null()
                $("#loading").hide();
                $("#loading2").hide();
            }
            else{
            $('#editTrans'+$uid).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $PlhSiswa=$('#upd_PlhSiswa'+$uid).val();
            $PlhJnsTrans=$('#upd_PlhJnsTrans'+$uid).val();
            $JmlByr=$('#upd_JmlByr'+$uid).val();
            $ketTransaksi=$('#keterangan'+$uid).val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/Transaksi/UpdateTransaksiBaru.php",
                    data: {
                        id: $uid,
                        PlhSiswa: $PlhSiswa,
                        PlhJnsTrans: $PlhJnsTrans,
                        JmlByr: $JmlByr,
                        keterangan: $ketTransaksi,
                        edit: 1,
                    },
                    success: function(result){
                        $("#keterangan").html(result);
                        $("#keterangan").show();
                        TabelTransaksiBaru();
                        $("#loading").hide();
                        $("#loading2").hide();  
                        //
                    }
                });
            }
        });

       //Hapus Transaksi
       $(document).on('click', '.delete', function(){
        $id=$(this).val();
        var trans = $(this).data('transaksi');
        swal({
        title: "Yakin Dengan Tindakan Ini?",
        text: "Nomor Transaksi : \""+trans+"\" Akan di Hapus dan Tidak Bisa Dikembalikan",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, Lanjutkan!",
        cancelButtonText: "Tidak, Kembali!",
        closeOnConfirm: false,
        closeOnCancel: false
        },      
        function (isConfirm) {
                    if (isConfirm) {
                        $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
                        $("#deleteLoad").show().html("<img src='Assets/Images/load2.gif' width='40' height='40'>");
                        $.ajax({
                            type: "POST",
                            url: "Controller/Bendahara/Transaksi/HapusTransaksiBaru.php",
                            data: {
                                id: $id,
                                del: 1,
                            },
                            success: function(){
                                swal("Deleted!", "Nomor Transaksi : \""+trans+"\" Berhasil di Hapus", "success");
                                TabelTransaksiBaru();
                                $("#keterangan").hide();
                                $("#loading").hide();
                                $("#deleteLoad").hide();
                            }
                        });
                    } else {
                        swal("Cancelled", "Tindakan di Batalkan :)", "error");
                        $("#loading").hide();
                        $("#loading2").hide();
                        $("#deleteLoad").hide();
                    }
                });

            });

       //HAPUS TRANSAKSI DAFTAR TRANSAKSI
       $(document).on('click', '.delTransaction', function(){
        $id2=$(this).val();
        var trans = $(this).data('transaksi2');
        swal({
        title: "Yakin Dengan Tindakan Ini?",
        text: "Nomor Transaksi : \""+trans+"\" Akan di Hapus dan Tidak Bisa Dikembalikan",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, Lanjutkan!",
        cancelButtonText: "Tidak, Kembali!",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function (isConfirm) {
                    if (isConfirm) {
                        $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
                        $("#deleteLoad").show().html("<img src='Assets/Images/load2.gif' width='40' height='40'>");
                        $.ajax({
                            type: "POST",
                            url: "Controller/Bendahara/Transaksi/HapusTransaksiBaru.php",
                            data: {
                                id: $id2,
                                del: 1,
                            },
                            success: function(){
                                $("#loading").hide();
                                $("#loading2").hide();
                                $("#deleteLoad").hide();
                                swal({
                                    title: "DATA TRANSAKSI BERHASIL DI HAPUS",
                                    text: "Data Transaksi : \""+trans+"\" Berhasil di Hapus",
                                    type: "success",
                                    closeOnConfirm: false,
                                    showLoaderOnConfirm: true,
                                },  function () {
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
//--------------------------------------------------------------------------------------------------------------

//PILIH SISWA DI HALAMAN TRANSAKSI PEMBAYARAN SISWA
$(document).on('click', '#btnPilihSiswa', function (e) {
    document.getElementById("txt_PlhSiswa").value = $(this).attr('data-idsiswa');
    $('#modalPilihSiswa').modal('hide');
 });
$(document).on('click', '#btnPilihSiswa', function (e) {
    document.getElementById("txt_namasiswa").value = $(this).attr('data-namasiswa');
    $('#modalPilihSiswa').modal('hide');
 });
$(document).on('click', '#btnPilihSiswa', function (e) {
    $("#load_jenisTransaksi").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
    $siswa             = $('#txt_PlhSiswa').val();
    $.ajax({
        url: "Controller/Bendahara/Transaksi/lookup_jenisTransaksi.php",
        async: false,
        data: {
            siswa           :$siswa,
            show : 1,
        }, 
        success: function(result){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#lookup_pilihJenisTransaksi").html(result);
            $("#lookup_pilihJenisTransaksi").show();
            $("#load_jenisTransaksi").hide();
        }
    });
    $('#modalPilihSiswa').modal('hide');
 });

//-----------PILIH JENIS TRANSAKSI BERDASARKAN PILIHAN SISWA-----------------------------------------------
$(document).on('click', '.pilih', function (e) {
    document.getElementById("txt_PlhJnsTrans").value = $(this).attr('data-jenis');
    $('#modalPilih').modal('hide');
 });
$(document).on('click', '.pilih', function (e) {
    document.getElementById("txt_namajenis").value = $(this).attr('data-namajenis');
    $('#modalPilih').modal('hide');
 });
//-----------/////////////////-----------------------------------------------
//-----------/////////////////-----------------------------------------------


