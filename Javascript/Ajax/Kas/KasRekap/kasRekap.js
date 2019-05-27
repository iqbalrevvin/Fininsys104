// Hapus Kas Rekap
 /*       $(document).on('click', '.btnDelKasRekap', function(){
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
                        $("#loading").show().html("<img src='load.gif' width='250' height='50' >");
                        $("#deleteLoad").show().html("<img src='load2.gif' width='40' height='40'>");
                        $.ajax({
                            type: "POST",
                            url: "admin/query/Kas/KasRekap/deleteKasRekap.php",
                            data: {
                                id              : $id,
                                delKasRekap     : 1,
                            },
                            success: function(){
                                swal("Deleted!", "Data Kas Dengan No. Transaksi : \""+hapus+"\" Berhasil di Hapus", "success");
                                showKasRekap();
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
*/
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
                        $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
                        $("#deleteLoad").show().html("<img src='Assets/Images/load2.gif' width='40' height='40'>");
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