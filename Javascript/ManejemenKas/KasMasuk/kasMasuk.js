$(document).ready(function() {
	showKasMasuk();
	// Menampilkan Tabel Daftar KAS MASUK
    function showKasMasuk(){
        $.ajax({
            url: 'View/Bendahara/Kas/KasMasuk/showKasMasuk.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#showKasMasuk').html(response);
                $('.datatable').DataTable();
                date();
                select();
                uang();
            }
        });
    }

    //Insert Kas Masuk
       $(document).on('click', '#btnKasMasuk', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            if($('#idJnsKas').val()==""){
                swal("Sumber Kas Belum Di Isi !", "Mohon Pilih Dahulu Sumber Kas Masuk!", "warning");
                $("#loading").hide();
            }else if($('#tglKasMasuk').val()==""){
                swal("Tanggal Belum Di Tentukan !", "Mohon Isi Dahulu Tanggal Kas Masuk !", "warning");
                $("#loading").hide();
            }else if($('#jmlKasMasuk').val()==""){
                swal("Jumlah Kas Masuk Belum Di Isi !", "Mohon Isi Dahulu Jumlah Kas Yang Masuk !", "warning");
                $("#loading").hide();
            }else{
            $('#addKasMasuk').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove(); 
            $idJnsKas               = $('#idJnsKas').val();
            $tglKasMasuk            = $('#tglKasMasuk').val();
            $jmlKasMasuk            = $('#jmlKasMasuk').val();
            $deskripsi              = $('#deskripsi').val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/Kas/KasMasuk/insertKasMasuk.php",
                    data: {
                        idJnsKas            :$idJnsKas,
                        tglKasMasuk         :$tglKasMasuk,
                        jmlKasMasuk         :$jmlKasMasuk,
                        deskripsi           :$deskripsi,
                        addKasMsk           :1,
                    },               
                    success: function(response){
                        swal("Input Berhasil !", "Input Kas Masuk Berhasil!", "success");
                        $("#loading").hide();
                        showKasMasuk();
                    }
                });
            }
        });

        // Edit Kas
       $(document).on('click', '.btnEditKasMsk', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            $id=$(this).val();
            if($('#idJnsKas'+$id).val()==""){
                swal("Sumber Kas Belum Di Isi !", "Mohon Pilih Dahulu Sumber Kas Masuk!", "warning");
                $("#loading").hide();
            }else if($('#tglKasMasuk'+$id).val()==""){
                swal("Tanggal Belum Di Tentukan !", "Mohon Isi Dahulu Tanggal Kas Masuk !", "warning");
                $("#loading").hide();
            }else if($('#jmlKasMasuk'+$id).val()==""){
                swal("Jumlah Kas Masuk Belum Di Isi !", "Mohon Isi Dahulu Jumlah Kas Yang Masuk !", "warning");
                $("#loading").hide();
            }else{
            $('#editKasMasuk'+$id).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $idJnsKas               = $('#idJnsKas'+$id).val();
            $tglKasMasuk            = $('#tglKasMasuk'+$id).val();
            $jmlKasMasuk            = $('#jmlKasMasuk'+$id).val();
            $deskripsi              = $('#deskripsi'+$id).val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/Kas/KasMasuk/editKasMasuk.php",
                    data: {
                        id                  :$id,
                        idJnsKas            :$idJnsKas,
                        tglKasMasuk         :$tglKasMasuk,
                        jmlKasMasuk         :$jmlKasMasuk,
                        deskripsi           :$deskripsi,
                        editKasMsk           :1,
                    },
                    success: function(response){
                        inputSukses();
                        $("#loading").hide();   
                        showKasMasuk();
                             
                    }
                });
            }
        });

        // Hapus Kas Masuk
        $(document).on('click', '.btnDelKasMasuk', function(){
        $id=$(this).val();
        var hapus = $(this).data('delete');
        swal({
        title: "Yakin Dengan Tindakan Ini?",
        text: "Data Kas Masuk Dengan No. Transaksi : \""+hapus+"\" Akan di Hapus dan Tidak Bisa Dikembalikan",
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
                            url: "Controller/Bendahara/Kas/KasMasuk/deleteKasMasuk.php",
                            data: {
                                id          : $id,
                                delKasMsk   : 1,
                            },
                            success: function(){
                                swal("Deleted!", "Data Kas Masuk Dengan No. Transaksi : \""+hapus+"\" Berhasil di Hapus", "success");
                                
                                $("#loading").hide();
                                $("#loading2").hide();
                                $("#deleteLoad").hide();
                                showKasMasuk();
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