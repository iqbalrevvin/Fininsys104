$(document).ready(function(){
    dataKota();
//TAMPIL DATA KOTA
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

    //TAMBAH DATA DESA
       $(document).on('click', '#btnAddKota', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            if($('#namaKota').val()==""){
                value_null()
                $("#loading").hide();
            }else{
            $('#addKota').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove(); 
            $namaKota          = $('#namaKota').val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanData/DataAlamat/DataKota/addKotaQuery.php",
                    data: {
                        namaKota               :$namaKota,
                        addDataKota            :1,
                    },               
                    success: function(response){
                        inputSukses();
                        dataKota();
                        $("#loading").hide();
                    }
                });
            }
        });
// Edit Desa
       $(document).on('click', '.btnEditKota', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            $id=$(this).val();
            if ($('#namaKota'+$id).val()==""){
                value_null()
                $("#loading").hide();
                $("#loading2").hide();
            }else{
            $('#editKota'+$id).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $namaKota          = $('#namaKota'+$id).val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanData/DataAlamat/DataKota/editKotaQuery.php",
                    data: {
                        id                         :$id,
                        namaKota                   :$namaKota,
                        editDataKota               :1,
                    },
                    success: function(response){
                        inputSukses()
                        dataKota();
                        $("#loading").hide();        
                    }
                });
            }
        });
        // Hapus Desa
        $(document).on('click', '.btnDelKota', function(){
        $id=$(this).val();
        var hapus = $(this).data('delete');
        swal({
        title: "Yakin Dengan Tindakan Ini?",
        text: "Data Kota : \""+hapus+"\" Akan di Hapus dan Tidak Bisa Dikembalikan",
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
                            url: "Controller/Bendahara/PengaturanData/DataAlamat/DataKota/deleteKotaQuery.php",
                            data: {
                                id                  : $id,
                                delDataKota         : 1,
                            },
                            success: function(){
                                swal("Deleted!", "Data Kota : \""+hapus+"\" Berhasil di Hapus", "success");
                                dataKota();
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