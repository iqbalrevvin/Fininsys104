$(document).ready(function() {
// Hapus Kelola Kas Khusus
        $(document).on('click', '.btnDelKelolaKas', function(){
        $id=$(this).val();
        var hapus = $(this).data('delete');
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
                            url: "Controller/Bendahara/Kas/KasKhusus/Kelola/delKelolaKasQr.php",
                            data: {
                                id              : $id,
                                delKasKhusus     : 1,
                            },
                            success: function(){
                                swal("Deleted!", "Data Kas Dengan No. Transaksi : \""+hapus+"\" Berhasil di Hapus", "success");
                                $("#loading").hide();
                                $("#deleteLoad").hide();
                                refresh();
                            }
                        });
                    } else {
                        swal("Cancelled", "Tindakan di Batalkan :)", "error");
                        $("#loading").hide();
                        $("#deleteLoad").hide();
                    }
                });
            });

        // EDIT KAS KELOLA
       $(document).on('click', '.btnUpdateKasKelola', function(){
            $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
            $id=$(this).val();
            if ($('#jmlKelolaMasuk'+$id).val()=="" && $('#jmlKelolaKeluar'+$id).val()==""){
                swal("Gagal !","Kas Masuk dan Kas Keluar Tidak Boleh Di Kosongkan, Isikan Dengan Angka 0!", "error");
                $("#loading").hide();
            }else if($('#jmlKelolaMasuk'+$id).val()==""){
                swal("Gagal !","Kas Masuk Tidak Boleh Di Kosongkan, Isikan Dengan Angka 0!", "error");
                $("#loading").hide();
            }else if($('#jmlKelolaKeluar'+$id).val()==""){
                swal("Gagal !","Kas Keluar Tidak Boleh Di Kosongkan, Isikan Dengan Angka 0!", "error");
                $("#loading").hide();
            }else if ($('#jmlKelolaMasuk'+$id).val()!="0" && $('#jmlKelolaKeluar'+$id).val()!="0"){
                swal("Gagal !","Kas Masuk dan Kas Keluar Tidak Boleh Terisi, Tentukan Salah Satu Dengan Angka 0!", "error");
                $("#loading").hide();
            }else if ($('#jmlKelolaMasuk'+$id).val()=="0" && $('#jmlKelolaKeluar'+$id).val()=="0"){
                swal("Gagal !","Kas Masuk dan Kas Keluar Tidak Boleh '0', Tentukan Salah Satu Dengan Selain Angka 0!", "error");
                $("#loading").hide();
            }
            else{
                
                    $('#editKelolaKasKhusus'+$id).modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $idMasterKas=$('#idMasterKas'+$id).val();
                    $namaMaster=$('#namaMaster'+$id).val();
                    $idJnsKasKelola=$('#idJnsKasKelola'+$id).val();
                    $tglKasKelola=$('#tglKasKelola'+$id).val();
                    $jmlKelolaMasuk=$('#jmlKelolaMasuk'+$id).val();
                    $jmlKelolaKeluar=$('#jmlKelolaKeluar'+$id).val();
                    $deskripsi=$('#deskripsi'+$id).val();
                        $.ajax({
                            type: "POST",
                            url: "Controller/Bendahara/Kas/KasKhusus/Kelola/editKelolaKasQr.php",
                            data: {
                                id              :$id,
                                idMasterKas     :$idMasterKas,
                                namaMaster      :$namaMaster,
                                idJnsKasKelola  :$idJnsKasKelola,
                                tglKasKelola    :$tglKasKelola,
                                jmlKelolaMasuk  :$jmlKelolaMasuk,
                                jmlKelolaKeluar :$jmlKelolaKeluar,
                                deskripsi       :$deskripsi,
                                editKelolaKas   :1,
                            },
                            success: function(result){
                                $("#kelolaKas").html(result);
                                
                                setTimeout(function () {
                                    $("#loading").hide();
                                    refresh();
                                }, 2000);
 
                    }
                        });
 
            }
        });
       
});