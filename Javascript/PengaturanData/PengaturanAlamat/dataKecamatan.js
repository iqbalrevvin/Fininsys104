$(document).ready(function(){
dataKecamatan();
//TAMPIL DATA KECAMATAN
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
//TAMBAH DATA DESA
       $(document).on('click', '#btnAddKecamatan', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            if($('#namaKecamatan').val()==""){
                value_null()
                $("#loading").hide();
            }else{
            $('#addKecamatan').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove(); 
            $namaKecamatan          = $('#namaKecamatan').val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanData/DataAlamat/DataKecamatan/addKecamatanQuery.php",
                    data: {
                        namaKecamatan               :$namaKecamatan,
                        addDataKecamatan            :1,
                    },               
                    success: function(response){
                        inputSukses();
                        dataKecamatan();
                        $("#loading").hide();
                    }
                });
            }
        });
// Edit Desa
       $(document).on('click', '.btnEditKecamatan', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            $id=$(this).val();
            if ($('#namaKecamatan'+$id).val()==""){
                value_null()
                $("#loading").hide();
                $("#loading2").hide();
            }else{
            $('#editKecamatan'+$id).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $namaKecamatan          = $('#namaKecamatan'+$id).val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanData/DataAlamat/DataKecamatan/editKecamatanQuery.php",
                    data: {
                        id                              :$id,
                        namaKecamatan                   :$namaKecamatan,
                        editDataKecamatan               : 1,
                    },
                    success: function(response){
                        inputSukses()
                        dataKecamatan();
                        $("#loading").hide();        
                    }
                });
            }
        });
        // Hapus Desa
        $(document).on('click', '.btnDelKecamatan', function(){
        $id=$(this).val();
        var hapus = $(this).data('delete');
        swal({
        title: "Yakin Dengan Tindakan Ini?",
        text: "Data Kecamatan : \""+hapus+"\" Akan di Hapus dan Tidak Bisa Dikembalikan",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, Lanjutkan!",
        cancelButtonText: "Tidak, Kembali!",
        closeOnConfirm: false,
        closeOnCancel: false
        },      function (isConfirm) {
                    if (isConfirm) {
                        $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
                        $("#deleteLoad").show().html("<img src='Assets/Images/load2.gif' width='40' height='40'>");
                        $.ajax({
                            type: "POST",
                            url: "Controller/Bendahara/PengaturanData/DataAlamat/DataKecamatan/deleteKecamatanQuery.php",
                            data: {
                                id                  : $id,
                                delDataKecamatan    : 1,
                            },
                            success: function(){
                                swal("Deleted!", "Data Kecamatan : \""+hapus+"\" Berhasil di Hapus", "success");
                                dataKecamatan();
                                $("#loading").hide();
                                $("#deleteLoad").hide();
                            }
                        });
                    } else {
                        swal("Cancelled", "Tindakan di Batalkan :)", "error");
                        $("#loading").hide();
                        $("#deleteLoad").hide();
                    }
                });

            });
        });