$(document).ready(function() {
    // BACKUP DATABASE
    $(document).on('click', '#btnBackup', function() {
        swal({
            title: "BACKUP DATABSE",
            text: "Database Fininsys Akan di Backup!",
            showCancelButton: true,
            confirmButtonColor: "#009688",
            confirmButtonText: "BACKUP",
            cancelButtonText: "BATALKAN",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
                $("#deleteLoad").show().html("<img src='Assets/images/load2.gif' width='40' height='40'>");
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/Backup/backupDatabase.php",
                    data: {
                        backup: 1,
                    },
                    success: function() {
                        $("#loading").hide();
                        $("#deleteLoad").hide();
                        swal({
                            title: "BACKUP BERHASIL",
                            text: "Database Fininsys Berhasil Di Backup, Silahkan Klik Tombol ''UNDUH HASIL BACKUP''",
                            type: "success",
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,
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

    //DOWNLOADDATABASE FININSYS
    $(document).on('click', '#btnDownloadBackup', function() {
        $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
        $.ajax({
            type: "POST",
            url: "Controller/Bendahara/Backup/downloadBackup.php",
            data: {
                downloadBackup: 1,
            },
            success: function(result) {
                $("#ketdownload").html(result);
                $("#loading").hide();
            }
        });
    });

    // IMPORT DATABASE
    $(document).on('click', '#btnImportDatabase', function() {

        if ($('#fileImport').val() == "") {
            swal("FILE DATABASE TIDAK ADA !", "Mohon Pilih Dahulu File Yang Akan Di Import!", "warning");
        } else {
            swal({
                title: "IMPORT DATABSE",
                text: "Yakin untuk melakukan RESTORE Database? ",
                showCancelButton: true,
                confirmButtonColor: "#009688",
                confirmButtonText: "IMPORT",
                cancelButtonText: "BATALKAN",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
                    $.ajax({
                        type: "POST",
                        url: "Controller/Bendahara/Backup/importProses.php",
                        data: {
                            prosesImport: 1,
                        },
                        success: function(result) {
                $("#ketImport").html(result);
                $("#loading").hide();
            }
                    });
                } else {
                    swal("Cancelled", "Tindakan di Batalkan :)", "error");
                    $("#loading").hide();
                }
            });
        }
    });


});