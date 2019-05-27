$(document).ready(function(){
	tabel_data_pengguna();
	//TAMPIL DATA PENGGUNA
	function tabel_data_pengguna(){
        $.ajax({
            url: 'View/Administrator/DataPengguna/tabelDaftarDataPengguna.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#showTabelDataPengguna').html(response);
            }
        });
    }

         //Insert DATA PENGGUNA
       $(document).on('click', '#btnAddDataPengguna', function(){
            $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
            if(
                $('#namaAdmin').val()=="" || $('#nikAdmin').val()=="" || $('#nipAdmin').val()==""
                || $('#jkAdmin').val()=="" || $('#tmpLahir').val()=="" || $('#tglLahirAdmin').val()==""
                || $('#agamaAdmin').val()=="" || $('#alamatAdmin').val()=="" || $('#desaAdmin').val()==""
                || $('#kecAdmin').val()=="" || $('#kotaAdmin').val()=="" || $('#provAdmin').val()==""
                || $('#hpAdmin').val()=="" || $('#emailAdmin').val()==""){
                value_null()
                $("#loading").hide();
            }else{
            $('#AddDataPengguna').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove(); 
            $namaAdmin              = $('#namaAdmin').val();
            $nikAdmin               = $('#nikAdmin').val();
            $nipAdmin               = $('#nipAdmin').val();
            $jkAdmin                = $('#jkAdmin').val();
            $tmpLahir               = $('#tmpLahir').val();
            $tglLahirAdmin          = $('#tglLahirAdmin').val();
            $agamaAdmin             = $('#agamaAdmin').val();
            $alamatAdmin            = $('#alamatAdmin').val();
            $desaAdmin              = $('#desaAdmin').val();
            $kecAdmin               = $('#kecAdmin').val();
            $kotaAdmin              = $('#kotaAdmin').val();
            $provAdmin              = $('#provAdmin').val();
            $hpAdmin                = $('#hpAdmin').val();
            $emailAdmin             = $('#emailAdmin').val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Administrator/DataPengguna/addDataPenggunaQr.php",
                    data: {
                        namaAdmin              :$namaAdmin,
                        nikAdmin               :$nikAdmin,
                        nipAdmin               :$nipAdmin,
                        jkAdmin                :$jkAdmin,
                        tmpLahir               :$tmpLahir,
                        tglLahirAdmin          :$tglLahirAdmin,
                        agamaAdmin             :$agamaAdmin,
                        alamatAdmin            :$alamatAdmin,
                        desaAdmin              :$desaAdmin,
                        kecAdmin               :$kecAdmin,
                        kotaAdmin              :$kotaAdmin,
                        provAdmin              :$provAdmin,
                        hpAdmin                :$hpAdmin,
                        emailAdmin             :$emailAdmin,
                        addPengguna            :1,
                    },               
                    success: function(response){
                        swal("Tambah Data Pengguna Berhasil!", "Tambah Data Pengguna(Admin) Berhasil!", "success");
                        $("#loading").hide();
                        setTimeout(function () {
                                    $("#loading").hide();
                                    refresh();
                                }, 1500);
                    }
                });
            }
        });


        //Hapus Data PENGGUNA
       $(document).on('click', '.btnDeleteDataPengguna', function(){
        $id=$(this).val();
        $pass1=$('#pass1'+$id).val();
        $pass2=$('#pass2'+$id).val();
        var passconfirm = $('#passconfirm'+$id).val();
        if ($pass1!=passconfirm || $pass2!=passconfirm ){
            passFailed();
        }else{
        $('#delDataPengguna'+$id).modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        var namaAdmin = $(this).data('delete');
        swal({
        title: "KONFIRMASI HAPUS PENGGUNA",
        text: "Data Admin Beserta Data & Akun Yang Terkait Dengan Nama : \""+namaAdmin+"\" Akan Di Hapus Secara Permanen ",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Lanjutkan, Hapus",
        cancelButtonText: "Batalkan",
        closeOnConfirm: false,
        closeOnCancel: false
        },      function (isConfirm) {
                    if (isConfirm) {
                        $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
                        $("#deleteLoad").show().html("<img src='Assets/images/load2.gif' width='40' height='40'>");
                        $.ajax({
                            type: "POST",
                            url: "Controller/Administrator/DataPengguna/deleteDataPenggunaQr.php",
                            data: {
                                idAdmin: $id,
                                delPengguna: 1,
                            },
                            success: function(){
                                $("#loading").hide();
                                $("#deleteLoad").hide();
                                swal({
                                    title: "DATA BERHASIL DI HAPUS",
                                    text: "Data Admin Dengan Nama : \""+namaAdmin+"\" Berhasil di Hapus",
                                    type: "success",
                                    closeOnConfirm: false,
                                    showLoaderOnConfirm: true,
                                },  function () {
                                        setTimeout(function () {
                                        refresh();
                                    }, 1500);
                            });   

                            }
                        });
                    } else {
                        swal("Cancelled", "Tindakan di Batalkan :)", "error");
                        $("#loading").hide();
                        $("#deleteLoad").hide();
                    }
                });
                }
            });

       // Edit DATA PENGGUNA ADMIN
       $(document).on('click', '.btnEditDataPengguna', function(){
            $("#loading").show().html("<img src='Assets/images/load.gif' width='250' height='50' >");
            $id=$(this).val();
            if(
                $('#namaAdmin'+$id).val()=="" || $('#nikAdmin'+$id).val()=="" || $('#nipAdmin'+$id).val()==""
                || $('#jkAdmin'+$id).val()=="" || $('#tmpLahir'+$id).val()=="" || $('#tglLahirAdmin'+$id).val()==""
                || $('#agamaAdmin'+$id).val()=="" || $('#alamatAdmin'+$id).val()=="" || $('#desaAdmin'+$id).val()==""
                || $('#kecAdmin'+$id).val()=="" || $('#kotaAdmin'+$id).val()=="" || $('#provAdmin'+$id).val()==""
                || $('#hpAdmin'+$id).val()=="" || $('#emailAdmin'+$id).val()==""){
                value_null()
                $("#loading").hide();
            }else{
            $('#editdataAdmin'+$id).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $namaAdmin              = $('#namaAdmin'+$id).val();
            $nikAdmin               = $('#nikAdmin'+$id).val();
            $nipAdmin               = $('#nipAdmin'+$id).val();
            $jkAdmin                = $('#jkAdmin'+$id).val();
            $tmpLahir               = $('#tmpLahir'+$id).val();
            $tglLahirAdmin          = $('#tglLahirAdmin'+$id).val();
            $agamaAdmin             = $('#agamaAdmin'+$id).val();
            $alamatAdmin            = $('#alamatAdmin'+$id).val();
            $desaAdmin              = $('#desaAdmin'+$id).val();
            $kecAdmin               = $('#kecAdmin'+$id).val();
            $kotaAdmin              = $('#kotaAdmin'+$id).val();
            $provAdmin              = $('#provAdmin'+$id).val();
            $hpAdmin                = $('#hpAdmin'+$id).val();
            $emailAdmin             = $('#emailAdmin'+$id).val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Administrator/DataPengguna/editDataPenggunaQr.php",
                    data: {
                        id                      :$id,
                        namaAdmin               :$namaAdmin,
                        
                        nipAdmin                :$nipAdmin,
                        jkAdmin                 :$jkAdmin,
                        tmpLahir                :$tmpLahir,
                        tglLahirAdmin           :$tglLahirAdmin,
                        agamaAdmin              :$agamaAdmin,
                        alamatAdmin             :$alamatAdmin,
                        desaAdmin               :$desaAdmin,
                        kecAdmin                :$kecAdmin,
                        kotaAdmin               :$kotaAdmin,
                        provAdmin               :$provAdmin,
                        hpAdmin                 :$hpAdmin,
                        emailAdmin              :$emailAdmin,
                        editDataPengguna        :1,
                    },
                    success: function(response){
                        $("#loading").hide(); 
                        swal({
                            title: "DATA BERHASIL DI PERBARUI",
                            text: "Data Pengguna(Admin) Berhasil Di Perbarui",
                            type: "success",
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,
                        }, function () {
                                setTimeout(function () {
                                    refresh();
                                }, 1500);
                            });     
                    }
                });
            }
        });
});