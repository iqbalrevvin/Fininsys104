$(document).ready(function() {
	recapsCash();
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

    $(document).on('click', '.btnDelKasRekap', function(){
        $id=$(this).val();
        var hapus = $(this).data('delete');
        var placementFrom = 'top';
        var placementAlign = 'center';
        var animateEnter = 'animated bounceInUp';
        var animateExit = 'animated bounceOutUp';
        var colorName = 'bg-teal';
        var text = 'Data Transaksi Kas Berhasil Dihapus!, Silahkan Klik Tombol Reload Di Sebelah Kanan Atas Untuk Mengaktifkan Kembali Datatable!';
        swal({
        title: "Yakin Dengan Tindakan Ini?",
        text: "Data Kas Dengan No. Transaksi : \""+hapus+"\" Akan di Hapus dan Tidak Bisa Dikembalikan",
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
                            url: "Controller/Bendahara/Kas/KasRekap/deleteKasRekap.php",
                            data: {
                                id              : $id,
                                delKasRekap     : 1,
                            },
                            success: function(){
                                $("#loading").hide();
                                $("#deleteLoad").hide();
                                swal({
                                    title: "DATA KAS BERHASIL DI HAPUS",
                                    text: "Data Kas Dengan No. Transaksi : \""+hapus+"\" Berhasil di Hapus",
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
});