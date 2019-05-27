 //Insert Kelas
       $(document).on('click', '#btnAddKelas', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            if($('#idJurusan').val()=="" || $('#namaKelas').val()==""){
                value_null()
                $("#loading").hide();
                $("#loading2").hide();
            }else{
            $('#addKelas').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove(); 
            $idJurusan          = $('#idJurusan').val();
            $namaKelas          = $('#namaKelas').val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanData/DataKelas/addKelas.php",
                    data: {
                        idJurusan           :$idJurusan,
                        namaKelas           :$namaKelas,
                        addClass            :1,
                    },               
                    success: function(result){
                        $("#ketKelas").html(result);
                        $("#ketKelas").show();
                        //inputSukses()
                        showKelas()
                        $("#loading").hide();
                    }
                });
            }
        });

       // Edit Kelas
       $(document).on('click', '.btnEditKelas', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            $id=$(this).val();
            if ($('#idJurusan'+$id).val()=="" || $('#namaKelas'+$id).val()==""){
                value_null()
                $("#loading").hide();
                $("#loading2").hide();
            }else{
            $('#editKelas'+$id).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $idJurusan          = $('#idJurusan'+$id).val();
            $namaKelas          = $('#namaKelas'+$id).val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanData/DataKelas/editKelas.php",
                    data: {
                        id                  :$id,
                        idJurusan           :$idJurusan,
                        namaKelas           :$namaKelas,
                        editClass           : 1,
                    },
                    success: function(result){
                        $("#ketKelas").html(result);
                        $("#ketKelas").show();
                        showKelas() 
                        $("#loading").hide();        
                    }
                });
            }
        });
       // Hapus Kelas
        $(document).on('click', '.btnDelKelas', function(){
        $id=$(this).val();
        var hapus = $(this).data('delete');
        swal({
        title: "Yakin Dengan Tindakan Ini?",
        text: "Data Kelas : \""+hapus+"\" Akan di Hapus dan Tidak Bisa Dikembalikan",
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
                            url: "Controller/Bendahara/PengaturanData/DataKelas/deleteKelas.php",
                            data: {
                                id: $id,
                                delClass: 1,
                            },
                            success: function(){
                                swal("Deleted!", "Data Kelas : \""+hapus+"\" Berhasil di Hapus", "success");
                                showKelas()
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