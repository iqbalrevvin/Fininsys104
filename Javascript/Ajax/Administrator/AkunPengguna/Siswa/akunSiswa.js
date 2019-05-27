// Edit DATA PENGGUNA SISWA
       $(document).on('click', '.btnEditAkunSiswa', function(){
            $("#loading").show().html("<img src='load.gif' width='250' height='50' >");
            $id=$(this).val();
            if(
                $('#namaTampilan'+$id).val()=="" || $('#nikAkun'+$id).val()=="" || $('#username'+$id).val()==""){
                value_null()
                $("#loading").hide();
            }else{
            $('#editAkunSiswa'+$id).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $namaTampilan               = $('#namaTampilan'+$id).val();
            $nikAkun                    = $('#nikAkun'+$id).val();
            $username                   = $('#username'+$id).val();
            $level                      = $('#level'+$id).val();
            $status                     = $('#status'+$id).val();
            $online                      = $('#online'+$id).val();
                $.ajax({
                    type: "POST",
                    url: "admin/WEBMASTER/Query/AkunPengguna/Siswa/editAkunSiswaQr.php",
                    data: {
                        id                  :$id,
                        namaTampilan        :$namaTampilan,
                        nikAkun             :$nikAkun,
                        username            :$username,
                        status              :$status,
                        online              :$online,
                        editAkunSiswa       :1,
                    },
                    success: function(response){
                        $("#loading").hide(); 
                        tabel_akun_siswa();
                        swal("STATUS DI RUBAH", "Status Akun Siswa Berhasil Diperbarui", "success");                        
                    }
                });
            }
        });
       // RESET PASSWORD SISWA
        $(document).on('click', '.btnResetPasSiswa', function(){
        $id=$(this).val();
        var reset = $(this).data('reset');
        var nipd = $(this).data('nipd');
        swal({
        title: "RESET AKUN ?",
        text: "Username & Password Dari Akun : (\""+reset+"\") Akan Di Reset!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, Lanjutkan!",
        cancelButtonText: "Tidak, Kembali!",
        closeOnConfirm: false,
        closeOnCancel: false
        },      function (isConfirm) {
                    if (isConfirm) {
                        $('#editAkunSiswa'+$id).modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        $("#loading").show().html("<img src='load.gif' width='250' height='50' >");
                        $("#deleteLoad").show().html("<img src='load2.gif' width='40' height='40'>");
                        $.ajax({
                            type: "POST",
                            url: "admin/WEBMASTER/Query/AkunPengguna/Siswa/resetPasswordSiswa.php",
                            data: {
                                id              : $id,
                                nipd            : nipd,
                                resetPassSiswa  : 1,
                            },
                            success: function(){
                                $("#loading").hide();
                                $("#deleteLoad").hide();
                                swal({
                                    title: "PASSWORD BERHASIL DI RESET!",
                                    text: "Password & Username Default adalah NIPD(\""+nipd+"\")",
                                    type: "success",
                                    closeOnConfirm: false,
                                    showLoaderOnConfirm: true,
                                }, function () {
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