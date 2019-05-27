  //Insert Program Studi
       $(document).on('click', '#btnAddPS', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            $("#loading2").show().html("<img src='Assets/Images/load2.gif' width='40' height='40'>");
            if($('#namaPS').val()=="" || $('#singkatanPS').val()=="" || $('#jmlSemester').val()==""){
                value_null()
                $("#loading").hide();
                $("#loading2").hide();
            }else{
            $('#addProgramStudi').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove(); 
            $namaPS          = $('#namaPS').val();
            $singkatanPS     = $('#singkatanPS').val();
            $jmlSemester     = $('#jmlSemester').val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanData/ProgramStudi/addProgramStudi.php",
                    data: {
                        namaPS           :$namaPS,
                        singkatanPS      :$singkatanPS,
                        jmlSemester      :$jmlSemester,
                        addProgramStudi  :1,
                    },               
                    success: function(response){
                        inputSukses()
                        showProgramStudi()
                        $("#loading").hide();
                        $("#loading2").hide();
                    }
                });
            }
        });
 // Edit Program Studi
       $(document).on('click', '.btnEditPS', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            $("#loading2").show().html("<img src='Assets/Images/load2.gif' width='40' height='40'>");
            $id=$(this).val();
            if ($('#namaPS'+$id).val()=="" || $('#singkatanPS'+$id).val()=="" || $('#jmlSemester'+$id).val()==""){
                value_null()
                $("#loading").hide();
                $("#loading2").hide();
            }else{
            $('#editProgramStudi'+$id).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $namaPS          = $('#namaPS'+$id).val();
            $singkatanPS     = $('#singkatanPS'+$id).val();
            $jmlSemester     = $('#jmlSemester'+$id).val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanData/ProgramStudi/editProgramStudi.php",
                    data: {
                        id                  :$id,
                        namaPS              :$namaPS,
                        singkatanPS         :$singkatanPS,
                        jmlSemester         :$jmlSemester,
                        editPS              : 1,
                    },
                    success: function(response){
                        inputSukses()
                        showProgramStudi()
                        $("#loading").hide();
                        $("#loading2").hide();
                        
                    }
                });
            }
        });

       // Hapus Program Studi
        $(document).on('click', '.btnDelPS', function(){
        $id=$(this).val();
        var hapus = $(this).data('delete');
        swal({
        title: "Yakin Dengan Tindakan Ini?",
        text: "Nama Program Studi : \""+hapus+"\" Akan di Hapus dan Tidak Bisa Dikembalikan",
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
                            url: "Controller/Bendahara/PengaturanData/ProgramStudi/deleteProgramStudi.php",
                            data: {
                                id: $id,
                                delPS: 1,
                            },
                            success: function(){
                                swal("Deleted!", "Nama Program Studi : \""+hapus+"\" Berhasil di Hapus", "success");
                                showProgramStudi()
                                $("#loading").hide();
                                $("#loading2").hide();
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