$(document).ready(function() {
	showKasKeluar();
	// Menampilkan Tabel Daftar KAS KELUAR
    function showKasKeluar(){
        $.ajax({
            url: 'View/Bendahara/Kas/KasKeluar/showKasKeluar.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(result){
                $('#showKasKeluar').html(result);
                $('.datatable').DataTable();
                date();
                select();
                uang();
            }
        });
    } 

     //Insert Kas KELUAR
       $(document).on('click', '#btnKasKeluar', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            if($('#idJnsKas').val()==""){
                swal("Sumber Kas Belum Di Isi !", "Mohon Pilih Dahulu Sumber Kas Keluar!", "warning");
                $("#loading").hide();
            }else if($('#tglKasKeluar').val()==""){
                swal("Tanggal Belum Di Tentukan !", "Mohon Isi Dahulu Tanggal Kas Keluar !", "warning");
                $("#loading").hide();
            }else if($('#jmlKasKeluar').val()==""){
                swal("Jumlah Kas Keluar Belum Di Isi !", "Mohon Isi Dahulu Jumlah Kas Yang Keluar !", "warning");
                $("#loading").hide();
            }else{
            $('#addKasKeluar').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove(); 
            $idJnsKas               = $('#idJnsKas').val();
            $tglKasKeluar            = $('#tglKasKeluar').val();
            $jmlKasKeluar            = $('#jmlKasKeluar').val();
            $deskripsi              = $('#deskripsi').val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/Kas/KasKeluar/insertKasKeluar.php",
                    data: {
                        idJnsKas            :$idJnsKas,
                        tglKasKeluar         :$tglKasKeluar,
                        jmlKasKeluar         :$jmlKasKeluar,
                        deskripsi           :$deskripsi,
                        addKasKlr           :1,
                    },               
                    success: function(response){
                        swal("Input Berhasil !", "Input Kas Keluar Berhasil!", "success");
                        showKasKeluar()
                        $("#loading").hide();
                    }
                });
            }
        });
       // Edit Kas Keluar
       $(document).on('click', '.btnEditKasKlr', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            $id=$(this).val();
            if($('#idJnsKas'+$id).val()==""){
                swal("Sumber Kas Belum Di Isi !", "Mohon Pilih Dahulu Sumber Kas Keluar!", "warning");
                $("#loading").hide();
            }else if($('#tglKasKeluar'+$id).val()==""){
                swal("Tanggal Belum Di Tentukan !", "Mohon Isi Dahulu Tanggal Kas Keluar!", "warning");
                $("#loading").hide();
            }else if($('#jmlKasKeluar'+$id).val()==""){
                swal("Jumlah Kas Keluar Belum Di Isi !", "Mohon Isi Dahulu Jumlah Kas Yang Keluar!", "warning");
                $("#loading").hide();
            }else{
            $('#editKasKeluar'+$id).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $idJnsKas               = $('#idJnsKas'+$id).val();
            $tglKasKeluar           = $('#tglKasKeluar'+$id).val();
            $jmlKasKeluar           = $('#jmlKasKeluar'+$id).val();
            $deskripsi              = $('#deskripsi'+$id).val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/Kas/KasKeluar/editKasKeluar.php",
                    data: {
                        id                  :$id,
                        idJnsKas            :$idJnsKas,
                        tglKasKeluar        :$tglKasKeluar,
                        jmlKasKeluar        :$jmlKasKeluar,
                        deskripsi           :$deskripsi,
                        editKasKlr           :1,
                    },
                    success: function(response){
                        swal("Pembaruan Berhasil !", "Pembaruan Kas Keluar Berhasil di Perbarui!", "success");
                        showKasKeluar();
                        $("#loading").hide();        
                    }
                });
            }
        });


        // Hapus Kas KELUAR
        $(document).on('click', '.btnDelKasKeluar', function(){
        $id=$(this).val();
        var hapus = $(this).data('delete');
        swal({
        title: "Yakin Dengan Tindakan Ini?",
        text: "Data Kas Keluar Dengan No. Transaksi : \""+hapus+"\" Akan di Hapus dan Tidak Bisa Dikembalikan",
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
                            url: "Controller/Bendahara/Kas/KasKeluar/deleteKasKeluar.php",
                            data: {
                                id          : $id,
                                delKasKlr   : 1,
                            },
                            success: function(){
                                swal("Deleted!", "Data Kas Keluar Dengan No. Transaksi : \""+hapus+"\" Berhasil di Hapus", "success");
                                showKasKeluar();
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
});