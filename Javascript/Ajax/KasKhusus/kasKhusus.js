 
       //Insert Master Kas Khusus
       $(document).on('click', '#btnAddMasterKasKhusus', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            if($('#namaMasterKasKhusus').val()=="" || $('#thnMstrKas').val()==""){
                value_null()
                $("#loading").hide();
            }else{
            $('#addMasterKasKhusus').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove(); 
            $namaMasterKasKhusus          = $('#namaMasterKasKhusus').val();
            $tahunKasKhusus               = $('#thnMstrKas').val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/Kas/KasKhusus/addMasterKasKhusus.php",
                    data: {
                        namaMasterKasKhusus           :$namaMasterKasKhusus,
                        thnMstrKas                    :$tahunKasKhusus,
                        addMtrKasKhusus               :1,
                    },               
                    success: function(response){
                        swal("Tambah Data Master Berhasil !", "Tambah Data Master Kas Khusus Berhasil!", "success");
                        kasKhusus();
                        $("#loading").hide();
                    }
                });
            }
        });

       // Edit Jenis Kas Khusus
       $(document).on('click', '.btnEditMasterKasKhusus', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            $id=$(this).val();
            if ($('#namaMasterKasKhusus'+$id).val()==""){
                value_null()
                $("#loading").hide();
            }else{
            $('#editMasterKasKhusus'+$id).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();

            $namaMasterKasKhusus          = $('#namaMasterKasKhusus'+$id).val();

                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/Kas/KasKhusus/editMasterKasKhusus.php",
                    data: {
                        id                  :$id,
                        namaMasterKasKhusus :$namaMasterKasKhusus,
                        editMtrKasKhusus    :1,
                    },
                    success: function(response){
                        swal("Edit Data Master Berhasil !", "Data Master Kas Khusus Berhasil Di Perbarui!", "success");
                        kasKhusus();
                        $("#loading").hide();
                        
                    }
                });
            }
        });

       // Hapus Master Kas Khusus
        $(document).on('click', '.btnDelMasterKasKhusus', function(){
        $id=$(this).val();
        var hapus = $(this).data('delete');
        swal({
        title: "Yakin Dengan Tindakan Ini?",
        text: "Nama Master Kas : \""+hapus+"\" Akan di Hapus dan Tidak Bisa Dikembalikan, Jika Ada Data Yg Berhubungan Dengan Master Kas "+hapus+" Maka Data Tidak Dapat Di Hapus",
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
                            url: "Controller/Bendahara/Kas/KasKhusus/deleteMasterKasKhusus.php",
                            data: {
                                id              : $id,
                                delMtrKasKhusus : 1,
                            },
                            success: function(){
                                swal("Deleted!", "Nama Master Kas Khusus : \""+hapus+"\" Berhasil di Hapus", "success");
                                kasKhusus();
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
      