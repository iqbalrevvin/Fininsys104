// BACKUP DATABASE
        $(document).on('click', '#btnBackup', function(){
        swal({
        title: "BACKUP DATABSE",
        text: "Database Fininsys Akan di Backup!",
        showCancelButton: true,
        confirmButtonColor: "#009688",
        confirmButtonText: "BACKUP",
        cancelButtonText: "BATALKAN",
        closeOnConfirm: false,
        closeOnCancel: false
        },      function (isConfirm) {
                    if (isConfirm) {
                        $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
                        $("#deleteLoad").show().html("<img src='Assets/Images/load2.gif' width='40' height='40'>");
                        $.ajax({
                            type: "POST",
                            url: "Controller/Bendahara/Backup/backup.php",
                            data: {
                                backup   : 1,
                            },
                            success: function(){
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

         //DOWNLOAD BACKUP
       $(document).on('click', '#btnDownloadBackup', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/Backup/downloadBackup.php",
                    data: {
                        downloadBackup: 1,
                    },
                    success: function(result){
                        $("#ketdownload").html(result);
                        $("#loading").hide();  
                    }
                });
            });