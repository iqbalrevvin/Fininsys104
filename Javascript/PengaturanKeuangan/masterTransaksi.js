$(document).ready(function() {
    showMasterTransaksi();
//FUNGSI MASTER TRANSAKSI
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
//--FUNGSI MASTER TRANSAKSI-----------------------------------------------------------------------------------
//Insert Master Transaksi Baru
       $(document).on('click', '#bntAddMasterTransaksi', function(){
            $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
            if($('#namaMasterTransaksi').val()=="" || $('#programStudi').val()=="" || $('#thnAngkatan').val()==""){
                value_null()
                $("#loading").hide();
            }else{
            $('#addMasterTransaksi').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove(); 
            $namaMasterTransaksi        = $('#namaMasterTransaksi').val();
            $programStudi               = $('#programStudi').val();
            $thnAngkatan                = $('#thnAngkatan').val();

                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanKeuangan/DaftarMasterTransaksi/addMasterTransaksiQuery.php",
                    data: {
                        namaMasterTransaksi     :$namaMasterTransaksi,
                        programStudi            :$programStudi,
                        thnAngkatan             :$thnAngkatan,
                        addMaster               :1,
                    },               
                    success: function(result){
                        $("#ketMasterTransaksi").html(result);
                        $("#ketMasterTransaksi").show();
                        showMasterTransaksi()
                        $("#loading").hide();
                    }
                });
            }
        });

       // Edit Master Transaksi Terbaru
       $(document).on('click', '.editMasterTransaksi', function(){
            $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
            $("#loading2").show().html("<img src='Assets/images/load2.gif' width='40' height='40'>");
            $id=$(this).val();
            if ($('#namaMasterTransaksi'+$id).val()=="" || $('#programStudi'+$id).val()=="" || $('#thnAngkatan'+$id).val()==""){
                value_null()
                $("#loading").hide();
                $("#loading2").hide();
            }
            else{
            $('#editMasterTransaksi'+$id).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $namaMasterTransaksi        =$('#namaMasterTransaksi'+$id).val();
            $programStudi               =$('#programStudi'+$id).val();
            $thnAngkatan                =$('#thnAngkatan'+$id).val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanKeuangan/DaftarMasterTransaksi/editMasterTransaksiQuery.php",
                    data: {
                        id                      : $id,
                        namaMasterTransaksi     : $namaMasterTransaksi,
                        programStudi            : $programStudi,
                        thnAngkatan             : $thnAngkatan,
                        editMaster              : 1,
                    },
                    success: function(result){
                        $("#ketMasterTransaksi").html(result);
                        $("#ketMasterTransaksi").show();
                        showMasterTransaksi()
                        $("#loading").hide();
                        $("#loading2").hide();
                        
                    }
                });
            }
        });

       // Hapus Master Transaksi Terbaru
        $(document).on('click', '.delMasterTransaksi', function(){
        $id=$(this).val();
        var hapus = $(this).data('delete');
        swal({
        title: "Yakin Dengan Tindakan Ini?",
        text: "Nama Master Transaksi : \""+hapus+"\" Akan di Hapus dan Tidak Bisa Dikembalikan",
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
                            url: "Controller/Bendahara/PengaturanKeuangan/DaftarMasterTransaksi/deleteMasterTransaksiQuery.php",
                            data: {
                                id: $id,
                                delMasterTransaksi: 1,
                            },
                            success: function(){
                                swal("Deleted!", "Nama Master Transaksi : \""+hapus+"\" Berhasil di Hapus", "success");
                                showMasterTransaksi();
                                $("#loading").hide();
                                $("#loading2").hide();
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