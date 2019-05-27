$(document).ready(function(){
    tabel_akun_pengguna();
//TAMPIL AKUN PENGGUNA
function tabel_akun_pengguna(){
        $.ajax({
            url: 'View/Administrator/AkunPengguna/Admin/tabelDaftarAkunPengguna.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#showTabelAkunPengguna').html(response);
            }
        });
    }

    // Edit DATA PENGGUNA ADMIN
       $(document).on('click', '.btnEditAkunPengguna', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            $id=$(this).val();
            if(
                $('#namaTampilan'+$id).val()=="" || $('#nikAkun'+$id).val()=="" || $('#username'+$id).val()==""){
                value_null()
                $("#loading").hide();
            }else{
            $('#editAkunAdmin'+$id).modal('hide');
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
                    url: "Controller/Administrator/AkunPengguna/Admin/editAkunPenggunaQr.php",
                    data: {
                        id                  :$id,
                        namaTampilan        :$namaTampilan,
                        nikAkun             :$nikAkun,
                        username            :$username,
                        level               :$level,
                        status              :$status,
                        online              :$online,
                        editAkunPengguna    :1,
                    },
                    success: function(response){
                        $("#loading").hide(); 
                        swal({
                            title: "DATA BERHASIL DI PERBARUI",
                            text: "Data Akun(Admin) Berhasil Di Perbarui",
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
            }
        });
     // RESET PASSWORD ADMIN
        $(document).on('click', '.btnResetPassAdmin', function(){
        $id=$(this).val();
        var reset = $(this).data('reset');
        var nip = $(this).data('nip');
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
                        $('#editAkunAdmin'+$id).modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
                        $("#deleteLoad").show().html("<img src='Assets/Images/load2.gif' width='40' height='40'>");
                        $.ajax({
                            type: "POST",
                            url: "Controller/Administrator/AkunPengguna/Admin/resetPasswordAdmin.php",
                            data: {
                                id              : $id,
                                nip             : nip,
                                resetPassAdmin  : 1,
                            },
                            success: function(){
                                $("#loading").hide();
                                $("#deleteLoad").hide();
                                swal({
                                    title: "PASSWORD BERHASIL DI RESET!",
                                    text: "Password & Username Default adalah NIP(\""+nip+"\")",
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
    });