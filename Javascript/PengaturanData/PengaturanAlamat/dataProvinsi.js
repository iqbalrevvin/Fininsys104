$(document).ready(function(){    
dataProvinsi();
//TAMPIL DATA PROVINSI
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

    //TAMBAH DATA DESA
       $(document).on('click', '#btnAddProvinsi', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            if($('#namaProvinsi').val()==""){
                value_null()
                $("#loading").hide();
            }else{
            $('#addProvinsi').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove(); 
            $namaProvinsi          = $('#namaProvinsi').val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanData/DataAlamat/DataProvinsi/addProvinsiQuery.php",
                    data: {
                        namaProvinsi               :$namaProvinsi,
                        addDataProvinsi            :1,
                    },               
                    success: function(response){
                        inputSukses();
                        dataProvinsi();
                        $("#loading").hide();
                    }
                });
            }
        });
// Edit Desa
       $(document).on('click', '.btnEditProvinsi', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            $id=$(this).val();
            if ($('#namaProvinsi'+$id).val()==""){
                value_null()
                $("#loading").hide();
                $("#loading2").hide();
            }else{
            $('#editProvinsi'+$id).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $namaProvinsi          = $('#namaProvinsi'+$id).val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanData/DataAlamat/DataProvinsi/editProvinsiQuery.php",
                    data: {
                        id                         :$id,
                        namaProvinsi               :$namaProvinsi,
                        editDataProvinsi           :1,
                    },
                    success: function(response){
                        inputSukses()
                        dataProvinsi();
                        $("#loading").hide();        
                    }
                });
            }
        });
        // Hapus Desa
        $(document).on('click', '.btnDelProvinsi', function(){
        $id=$(this).val();
        var hapus = $(this).data('delete');
        swal({
        title: "Yakin Dengan Tindakan Ini?",
        text: "Data Provinsi : \""+hapus+"\" Akan di Hapus dan Tidak Bisa Dikembalikan",
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
                            url: "Controller/Bendahara/PengaturanData/DataAlamat/DataProvinsi/deleteProvinsiQuery.php",
                            data: {
                                id                  : $id,
                                delDataProvinsi     : 1,
                            },
                            success: function(){
                                swal("Deleted!", "Data Provinsi : \""+hapus+"\" Berhasil di Hapus", "success");
                                dataProvinsi();
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