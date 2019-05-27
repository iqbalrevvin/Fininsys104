$(document).ready(function(){
dataDesa();
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
//TAMBAH DATA DESA
       $(document).on('click', '#btnAddDesa', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            if($('#namaDesa').val()==""){
                value_null()
                $("#loading").hide();
            }else{
            $('#addDesa').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove(); 
            $namaDesa          = $('#namaDesa').val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanData/DataAlamat/DataDesa/addDesaQuery.php",
                    data: {
                        namaDesa            :$namaDesa,
                        addDataDesa         :1,
                    },               
                    success: function(response){
                        inputSukses();
                        dataDesa();
                        $("#loading").hide();
                    }
                });
            }
        });
// Edit Desa
       $(document).on('click', '.btnEditDesa', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            $id=$(this).val();
            if ($('#namaDesa'+$id).val()==""){
                value_null()
                $("#loading").hide();
                $("#loading2").hide();
            }else{
            $('#editDesa'+$id).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $namaDesa          = $('#namaDesa'+$id).val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanData/DataAlamat/DataDesa/editDesaQuery.php",
                    data: {
                        id                      :$id,
                        namaDesa                :$namaDesa,
                        editDataDesa            : 1,
                    },
                    success: function(response){
                        inputSukses()
                        dataDesa();
                        $("#loading").hide();        
                    }
                });
            }
        });
        // Hapus Desa
        $(document).on('click', '.btnDelDesa', function(){
        $id=$(this).val();
        var hapus = $(this).data('delete');
        swal({
        title: "Yakin Dengan Tindakan Ini?",
        text: "Data Desa : \""+hapus+"\" Akan di Hapus dan Tidak Bisa Dikembalikan",
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
                            url: "Controller/Bendahara/PengaturanData/DataAlamat/DataDesa/deleteDesaQuery.php",
                            data: {
                                id          : $id,
                                delDataDesa : 1,
                            },
                            success: function(){
                                swal("Deleted!", "Data Desa : \""+hapus+"\" Berhasil di Hapus", "success");
                                dataDesa();
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