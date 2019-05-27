$(document).ready(function(){
	 tabel_log_aktivitas();
	 //TAMPIL TABEL LOG AKTIVITAS
	function tabel_log_aktivitas(){
    	var auto_refresh = setInterval(
    	function () {
       		$('#tabelLogAktivitas').load('View/Administrator/LogAktivitas/tabelLogAktivitas.php');
    	}, 1000); // refresh setiap Detik Yang Di Tentukan
	}
	
//Hapus SEMUA LOG AKTIVITAS
       $(document).on('click', '#btndelAllLog', function(){
        $pass1=$('#pass1Log').val();
        $pass2=$('#pass2Log').val();
        //////////////////////////////////////////////////////////////////////////////
        var passconfirm = $('#passconfirm').val();
        if ($pass1!=passconfirm || $pass2!=passconfirm ){
            passFailed();
        }else{
        $('#DeleteAllLog').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        swal({
        title: "KONFIRMASI PENGOSONGAN DATA LOG",
        text: "Semua Data Log Aktivitas Akan Di Hapus Secara Permanen, Disarankan Lakukan Dahulu Laporan Log!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Lanjutkan, Hapus",
        cancelButtonText: "Batalkan",
        closeOnConfirm: false,
        closeOnCancel: false
        },      function (isConfirm) {
                    if (isConfirm) {
                        $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
                        $("#deleteLoad").show().html("<img src='Assets/Images/load2.gif' width='40' height='40'>");
                        $.ajax({
                            type: "POST",
                            url: "Controller/Administrator/LogAktivitas/DaftarLogAktivitas/HapusSemuaLogAktivitas.php",
                            data: {
                                delLog: 1,
                            },
                            success: function(){
                                $("#loading").hide();
                                $("#deleteLoad").hide();
                                swal({
                                    title: "DATA LOG AKTIVITAS BERHASIL DI HAPUS",
                                    text: "Semua Data Log Aktivitas Berhasil Dihapus Secara Permanen",
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
                        swal({
                            title: "TINDAKAN DIBATALKAN",
                            text: "",
                            type: "error",
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,
                                },  function () {
                                        setTimeout(function () {
                                        refresh();
                                    }, 1000);
                            });  

                    }
                });
                }
            });


	
});