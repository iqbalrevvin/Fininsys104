 $(document).ready(function() {
    listTransaction();
    function listTransaction(){
        var dataTable = $('#lookup').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    select: true,
                    "ajax":{
                        url :"Controller/Bendahara/DaftarTransaksi/loadListTransaction.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".lookup-error").html("");
                            $("#lookup").append('<tbody class="table-bordered"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#lookup_processing").css("display","none");     
                        }
                    },
                } );
    }
    // Array to track the ids of the details displayed rows
  


    
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

 });