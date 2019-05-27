$(document).ready(function() {
    //Edit Data Admin
    $(document).on('click', '#bntEditAdmin', function() {
        $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
        $("#loading2").show().html("<img src='Assets/images/load2.gif' width='40' height='40'>");
        if ($('#editNamaAdmin').val() == "" || $('#editNipAdmin').val() == "" || $('#editNikAdmin').val() == "" ||
            $('#editJenisKelamin').val() == "") {
            value_null()
            $("#loading").hide();
            $("#loading2").hide();
        } else {
            var placementFrom = 'top';
            var placementAlign = 'center';
            var animateEnter = 'animated bounceInUp';
            var animateExit = 'animated bounceOutUp';
            var colorName = 'bg-teal';
            var text = 'Biodata Pengguna/Admin Berhasil Diperbarui!';
            $idAdmin = $('#idAdmin').val();
            $editNamaAdmin = $('#editNamaAdmin').val();
            $editJenisKelamin = $('#editJenisKelamin').val();
            $editNikAdmin = $('#editNikAdmin').val();
            $editNipAdmin = $('#editNipAdmin').val();
            $editTmpLahirAdmin = $('#editTmpLahirAdmin').val();
            $editTglLahirAdmin = $('#editTglLahirAdmin').val();
            $editAgamaAdmin = $('#editAgamaAdmin').val();
            $editAlamatAdmin = $('#editAlamatAdmin').val();
            $editDesaAdmin = $('#editDesaAdmin').val();
            $editKecAdmin = $('#editKecAdmin').val();
            $editKotaAdmin = $('#editKotaAdmin').val();
            $editProvAdmin = $('#editProvAdmin').val();
            $editHpAdmin = $('#editHpAdmin').val();
            $editEmailAdmin = $('#editEmailAdmin').val();
            $.ajax({
                type: "POST",
                url: "Controller/Bendahara/PengaturanData/ProfilAdmin/editBiodataAdmin.php",
                data: {
                    idAdmin: $idAdmin,
                    editNamaAdmin: $editNamaAdmin,
                    editJenisKelamin: $editJenisKelamin,
                    editNikAdmin: $editNikAdmin,
                    editNipAdmin: $editNipAdmin,
                    editTmpLahirAdmin: $editTmpLahirAdmin,
                    editTglLahirAdmin: $editTglLahirAdmin,
                    editAgamaAdmin: $editAgamaAdmin,
                    editAlamatAdmin: $editAlamatAdmin,
                    editDesaAdmin: $editDesaAdmin,
                    editKecAdmin: $editKecAdmin,
                    editKotaAdmin: $editKotaAdmin,
                    editProvAdmin: $editProvAdmin,
                    editHpAdmin: $editHpAdmin,
                    editEmailAdmin: $editEmailAdmin,
                    editAdmin: 1,
                },
                success: function(response) {
                    showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit);
                    $("#loading").hide();
                    $("#loading2").hide();
                    swal({
                        title: "DATA BERHASIL DI PERBARUI",
                        text: "Biodata Pengguna/Admin Berhasil Di Perbarui",
                        type: "success",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    }, function() {
                        setTimeout(function() {
                            refresh();
                        }, 1500);
                    });

                }
            });
        }
    });

    //Edit Nama Tampilan            
    $(document).on('click', '#btnNamaTmplnAdmin', function() {
        $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
        $("#loading2").show().html("<img src='Assets/images/load2.gif' width='40' height='40'>");
        if ($('#editNamaTmplnAdmin').val() == "") {
            value_null()
            $("#loading").hide();
            $("#loading2").hide();
        } else {
            var placementFrom = 'top';
            var placementAlign = 'center';
            var animateEnter = 'animated bounceInUp';
            var animateExit = 'animated bounceOutUp';
            var colorName = 'bg-blue';
            var text = 'Nama Tampilan Berhasil Di Perbarui!';

            $idUser = $('#idUser').val();
            $editNamaTmplnAdmin = $('#editNamaTmplnAdmin').val();

            $.ajax({
                type: "POST",
                url: "COntroller/Bendahara/PengaturanData/ProfilAdmin/AkunAdmin/editAkunAdminQuery.php",
                data: {
                    idUser: $idUser,
                    editNamaTmplnAdmin: $editNamaTmplnAdmin,
                    editNTAdmin: 1,
                },
                success: function(response) {
                    //$("#addTrans")[0].reset();
                    $("#loading").hide();
                    $("#loading2").hide();
                    showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit);
                }
            });
        }
    });

    //Edit Username           
    $(document).on('click', '#bntEditUsernameAdmin', function() {
        $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
        $("#loading2").show().html("<img src='Assets/images/load2.gif' width='40' height='40'>");
        if ($('#editUserNameAdmin').val() == "") {
            value_null()
            $("#loading").hide();
            $("#loading2").hide();
        } else {
            $idUser = $('#idUser').val();
            $editUserNameAdmin = $('#editUserNameAdmin').val();
            $.ajax({
                type: "POST",
                url: "Controller/Bendahara/PengaturanData/ProfilAdmin/AkunAdmin/editAkunAdminQuery.php",
                data: {
                    idUser: $idUser,
                    editUserNameAdmin: $editUserNameAdmin,
                    editUNAdmin: 1,
                },
                success: function(result) {
                    //$("#addTrans")[0].reset();
                    $("#loading").hide();
                    $("#loading2").hide();
                    $("#username").html(result);
                }
            });
        }
    });
    //Edit Password           
    $(document).on('click', '#bntEditPasswordAdmin', function() {
        $("#loading").show().html("<img src='load.gif' width='250' height='50' >");
        $("#loading2").show().html("<img src='load2.gif' width='40' height='40'>");
        if ($('#editPassLamaAdmin').val() != $('#dataPassLama').val()) {
            password_wrong()
            $("#loading").hide();
            $("#loading2").hide();
        } else if ($('#editPassLamaAdmin').val() == '') {
            value_null()
            $("#loading").hide();
            $("#loading2").hide();
        } else if ($('#editPassBaruAdmin').val() != $('#editPassBaruAdmin2').val()) {
            password_not_matching()
            $("#loading").hide();
            $("#loading2").hide();
        } else {
            var placementFrom = 'top';
            var placementAlign = 'center';
            var animateEnter = 'animated bounceInUp';
            var animateExit = 'animated bounceOutUp';
            var colorName = 'bg-blue';
            var text = 'Password Berhasil di Perbarui!, Silahkan Logout dan Login Dengan Password Baru';

            $idUser = $('#idUser').val();
            $editPassBaruAdmin = $('#editPassBaruAdmin').val();

            $.ajax({
                type: "POST",
                url: "Controller/Bendahara/PengaturanData/ProfilAdmin/AkunAdmin/editAkunAdminQuery.php",
                data: {
                    idUser: $idUser,
                    editPassBaruAdmin: $editPassBaruAdmin,
                    editPassAdmin: 1,
                },
                success: function(result) {
                    //$("#addTrans")[0].reset();
                    $("#loading").hide();
                    $("#loading2").hide();
                    showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit);
                    $("#username").html(result);
                }
            });
        }
    });

    //Edit No. Identitas        
    $(document).on('click', '#bntEditIdntAdmin', function() {
        $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
        $("#loading2").show().html("<img src='Assets/images/load2.gif' width='40' height='40'>");
        if ($('#editIdntAdmin').val() == "") {
            value_null()
            $("#loading").hide();
            $("#loading2").hide();
        } else {

            $idUser = $('#idUser').val();
            $editIdntAdmin = $('#editIdntAdmin').val();

            $.ajax({
                type: "POST",
                url: "Controller/Bendahara/PengaturanData/ProfilAdmin/AkunAdmin/editAkunAdminQuery.php",
                data: {
                    idUser: $idUser,
                    editIdntAdmin: $editIdntAdmin,
                    editNIKAdmin: 1,
                },
                success: function(result) {
                    $("#username").html(result);
                    //$("#addTrans")[0].reset();
                    $("#loading").hide();
                    $("#loading2").hide();
                }
            });
        }
    });
});