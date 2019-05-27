$(document).ready(function(){
   JnsKasMsk(); 
//FUNGSI MENAMPILKAN JENIS KAS MASUK
function JnsKasMsk(){
        $.ajax({
            url: 'View/Bendahara/PengaturanKeuangan/JenisKasMasuk/tabelJenisKasMsk.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#showJnsKasMsk').html(response);
                $('.datatable').DataTable();
                select();
            }
        });
    }
//FUNGSI MENAMPILKAN JENIS KAS MASUK------------------------------------------

//Insert Jenis Kas Masuk
       $(document).on('click', '#btnAddJnsKasMsk', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            if($('#namaJnsKasMsk').val()==""){
                value_null()
                $("#loading").hide();
            }else{
            $('#addJenisKasMsk').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove(); 
            $namaJnsKasMsk          = $('#namaJnsKasMsk').val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanKeuangan/JenisKasMasuk/addJenisKasMsk.php",
                    data: {
                        namaJnsKasMsk           :$namaJnsKasMsk,
                        addJnsKasMsk            :1,
                    },               
                    success: function(response){
                        swal("Tambah Data Berhasil !", "Tambah Data Jenis Kas Masuk Berhasil!", "success");
                        JnsKasMsk();
                        $("#loading").hide();
                    }
                });
            }
        });

        // Edit Jenis Kas Masuk
       $(document).on('click', '.btnEditJnsKasMsk', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            $id=$(this).val();
            if ($('#namaJnsKasMsk'+$id).val()==""){
                value_null()
                $("#loading").hide();
            }else{
            $('#editJnsKasMsk'+$id).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();

            $namaJnsKasMsk          = $('#namaJnsKasMsk'+$id).val();

                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanKeuangan/JenisKasMasuk/editJenisKasMsk.php",
                    data: {
                        id                  :$id,
                        namaJnsKasMsk       :$namaJnsKasMsk,
                        editJnsKasMsk       :1,
                    },
                    success: function(response){
                        swal("Edit Data Berhasil !", "Data Jenis Kas Masuk Berhasil Di Perbarui!", "success");
                        JnsKasMsk();
                        $("#loading").hide();
                        
                    }
                });
            }
        });

       // Hapus Jenis Kas
        $(document).on('click', '.btnDelJnsKasMsk', function(){
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
                            url: "Controller/Bendahara/PengaturanKeuangan/JenisKasMasuk/deleteJenisKasMsk.php",
                            data: {
                                id          : $id,
                                delJnsKasMsk: 1,
                            },
                            success: function(){
                                swal("Deleted!", "Nama Jenis Kas Masuk : \""+hapus+"\" Berhasil di Hapus", "success");
                                JnsKasMsk();
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