$(document).ready(function(){
JnsKasKlr();
//FUNGSI JENIS KAS MASUK
function JnsKasKlr(){
        $.ajax({
            url: 'View/Bendahara/PengaturanKeuangan/JenisKasKeluar/tabelJenisKasKlr.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#showJnsKasKlr').html(response);
                $('.datatable').DataTable();
                select();
            }
        });
    }
//JENIS KAS MASUK--------------------------------------------------------------
//Insert Jenis Kas Keluar
       $(document).on('click', '#btnAddJnsKasKlr', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            if($('#namaJnsKasKlr').val()==""){
                value_null()
                $("#loading").hide();
            }else{
            $('#addJenisKasKlr').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove(); 
            $namaJnsKasKlr          = $('#namaJnsKasKlr').val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanKeuangan/JenisKasKeluar/addJenisKasKlr.php",
                    data: {
                        namaJnsKasKlr           :$namaJnsKasKlr,
                        addJnsKasKlr            :1,
                    },               
                    success: function(response){
                        swal("Tambah Data Berhasil !", "Tambah Data Jenis Kas Keluar Berhasil!", "success");
                        JnsKasKlr();
                        //$('#showJnsKasKlr').load();
                        $("#loading").hide();
                    }
                });
            }
        });

        // Edit Jenis Kas Keluar
       $(document).on('click', '.btnEditJnsKasKlr', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            $id=$(this).val();
            if ($('#namaJnsKasKlr'+$id).val()==""){
                value_null()
                $("#loading").hide();
            }else{
            $('#editJnsKasKlr'+$id).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();

            $namaJnsKasKlr          = $('#namaJnsKasKlr'+$id).val();

                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanKeuangan/JenisKasKeluar/editJenisKasKlr.php",
                    data: {
                        id                  :$id,
                        namaJnsKasKlr       :$namaJnsKasKlr,
                        editJnsKasKlr       :1,
                    },
                    success: function(response){
                        swal("Edit Data Berhasil !", "Data Jenis Kas Keluar Berhasil Di Perbarui!", "success");
                        JnsKasKlr();
                        $("#loading").hide();
                        
                    }
                });
            }
        });

       // Hapus Jenis Kas Keluar
        $(document).on('click', '.btnDelJnsKasKlr', function(){
        $id=$(this).val();
        var hapus = $(this).data('delete');
        swal({
        title: "Yakin Dengan Tindakan Ini?",
        text: "Nama Jenis Kas : \""+hapus+"\" Akan di Hapus dan Tidak Bisa Dikembalikan, Jika Ada Data Yg Berhubungan Dengan Jenis Kas "+hapus+" Maka Data Tidak Dapat Di Hapus",
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
                            url: "Controller/Bendahara/PengaturanKeuangan/JenisKasKeluar/deleteJenisKasKlr.php",
                            data: {
                                id          : $id,
                                delJnsKasKlr: 1,
                            },
                            success: function(){
                                swal("Deleted!", "Nama Jenis Kas Keluar : \""+hapus+"\" Berhasil di Hapus", "success");
                                JnsKasKlr();
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