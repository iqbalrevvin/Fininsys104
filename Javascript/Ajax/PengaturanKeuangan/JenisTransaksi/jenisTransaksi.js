        //Insert Jenis Transaksi Baru
       $(document).on('click', '#bntAddJnsTransaksi', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            if($('#idMasterTrans').val()=="" || $('#kdTransaksi').val()=="" || $('#namaTransaksi').val()=="" 
                || $('#semesterTransaksi').val()=="" || $('#kewajiban').val()=="" 
                || $('#keteranganTransaksi').val()=="" || $('#tipeJenisTransaksi').val()==""){
                value_null()
                $("#loading").hide();
            }else{
            $('#addJnsTransaksi').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove(); 
            $idMasterTrans        = $('#idMasterTrans').val();
            $kdTransaksi            = $('#kdTransaksi').val();
            $namaTransaksi          = $('#namaTransaksi').val();
            $semesterTransaksi      = $('#semesterTransaksi').val();
            $kewajiban              = $('#kewajiban').val();
            $keteranganTransaksi    = $('#keteranganTransaksi').val(); 
            $tipeJenisTransaksi     = $('#tipeJenisTransaksi').val(); 
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanKeuangan/DaftarJenisTransaksi/addJnsTransaksiQuery.php",
                    data: {
                        idMasterTrans           :$idMasterTrans,
                        kdTransaksi             :$kdTransaksi,
                        namaTransaksi           :$namaTransaksi,
                        semesterTransaksi       :$semesterTransaksi,
                        kewajiban               :$kewajiban,
                        keteranganTransaksi     :$keteranganTransaksi,
                        tipeJenisTransaksi      :$tipeJenisTransaksi,
                        addJenis                :1,
                    },               
                    success: function(result){
                        $("#resultJenisTransaksi").html(result);
                        $("#resultJenisTransaksi").show();
                        //inputSukses()
                        showJnsTransaksi()
                        $("#loading").hide();
                        $("#loading2").hide();
                    }
                });
            }
        });
        // Hapus Jenis Transaksi Terbaru
        $(document).on('click', '.delJnsTransaksi', function(){
        $id=$(this).val();
        var hapus = $(this).data('delete');
        swal({
        title: "Yakin Dengan Tindakan Ini?",
        text: "Nama Jenis Transaksi : \""+hapus+"\" Serta Data Transaksi Masuk Yang Berhubungan dengan "+hapus+" Akan di Hapus dan Tidak Bisa Dikembalikan",
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
                            url: "Controller/Bendahara/PengaturanKeuangan/DaftarJenisTransaksi/deleteJnsTransaksiQuery.php",
                            data: {
                                id: $id,
                                delJnsTransaksi: 1,
                            },
                            success: function(){
                                swal("Deleted!", "Nama Jenis Transaksi : \""+hapus+"\" Berhasil di Hapus", "success");
                                showJnsTransaksi();
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

        // Edit Jenis Transaksi Terbaru
       $(document).on('click', '.editJenisTransaksi', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            $id=$(this).val();
            if ($('#kdTransaksi'+$id).val()=="" || $('#idMasterTrans'+$id).val()=="" || $('#namaTransaksi'+$id).val()=="" 
                || $('#semesterTransaksi'+$id).val()=="" || $('#kewajiban'+$id).val()==""
                || $('#keteranganTransaksi'+$id).val()=="" || $('#tipeJenisTransaksi'+$id).val()==""){
                value_null()
                $("#loading").hide();
            }
            else{
            $('#editJnsTransaksi'+$id).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $idMasterTrans      =$('#idMasterTrans'+$id).val();
            $kodeTransaksi      =$('#kdTransaksi'+$id).val();
            $namaTransaksi      =$('#namaTransaksi'+$id).val();
            $semesterTransaksi  =$('#semesterTransaksi'+$id).val();
            $kewajiban          =$('#kewajiban'+$id).val();
            $ketTransaksi       =$('#keteranganTransaksi'+$id).val();
            $tipeJenisTransaksi =$('#tipeJenisTransaksi'+$id).val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanKeuangan/DaftarJenisTransaksi/editJnsTransaksiQuery.php",
                    data: {
                        id                  : $id,
                        idMasterTrans       : $idMasterTrans,
                        kodeTransaksi       : $kodeTransaksi,
                        namaTransaksi       : $namaTransaksi,
                        semesterTransaksi   : $semesterTransaksi,
                        kewajiban           : $kewajiban,
                        ketTransaksi        : $ketTransaksi,
                        tipeJenisTransaksi  : $tipeJenisTransaksi,
                        editTransaksi       : 1,
                    },
                    success: function(response){
                        inputSukses()
                        showJnsTransaksi()
                        $("#loading").hide();
                        
                    }
                });
            }
        });

       // SIMPAN BARU Jenis Transaksi Terbaru
       $(document).on('click', '.simpanJenisTransaksi', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            $id=$(this).val();
            if ($('#kdTransaksi'+$id).val()=="" || $('#idMasterTrans'+$id).val()=="" || $('#namaTransaksi'+$id).val()=="" 
                || $('#semesterTransaksi'+$id).val()=="" || $('#kewajiban'+$id).val()==""
                || $('#keteranganTransaksi'+$id).val()=="" || $('#tipeJenisTransaksi'+$id).val()==""){
                value_null()
                $("#loading").hide();
            }
            else{
            $('#editJnsTransaksi'+$id).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $idMasterTrans      =$('#idMasterTrans'+$id).val();
            $kodeTransaksi      =$('#kdTransaksi'+$id).val();
            $namaTransaksi      =$('#namaTransaksi'+$id).val();
            $semesterTransaksi  =$('#semesterTransaksi'+$id).val();
            $kewajiban          =$('#kewajiban'+$id).val();
            $ketTransaksi       =$('#keteranganTransaksi'+$id).val();
            $tipeJenisTransaksi =$('#tipeJenisTransaksi'+$id).val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanKeuangan/DaftarJenisTransaksi/editJnsTransaksiQuery.php",
                    data: {
                        id                  : $id,
                        idMasterTrans       : $idMasterTrans,
                        kodeTransaksi       : $kodeTransaksi,
                        namaTransaksi       : $namaTransaksi,
                        semesterTransaksi   : $semesterTransaksi,
                        kewajiban           : $kewajiban,
                        ketTransaksi        : $ketTransaksi,
                        tipeJenisTransaksi  : $tipeJenisTransaksi,
                        simpanJnsTransaksi  : 2,
                    },
                    success: function(result){
                        $("#simpanBaruJnsTrans").html(result);
                        $("#simpanBaruJnsTrans").show();
                        showJnsTransaksi()
                        $("#loading").hide();
                        
                    }
                });
            }
        });
