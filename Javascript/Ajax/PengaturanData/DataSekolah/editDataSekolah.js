
        //Edit Data SEKOLAH
       $(document).on('click', '#btnEditSekolah', function(){
            $("#loading").show().html("<img src='Assets/Images/load.gif' width='250' height='50' >");
            $("#loading2").show().html("<img src='Assets/Images/load2.gif' width='40' height='40'>");
            if ($('#editNamaSekolah').val()=="" || $('#editNamaYayasan').val()=="" || $('#editNPSN').val()=="" 
                || $('#editAkreditasi').val()=="" || $('#editSKAkreditasi').val()=="" || $('#editJenjang').val()=="" ){
                value_null()
                $("#loading").hide();
                $("#loading2").hide();
            }else{
            var placementFrom = 'top';
            var placementAlign = 'center';
            var animateEnter = 'animated bounceInUp';
            var animateExit = 'animated bounceOutUp';
            var colorName = 'bg-blue';
            var text = 'Data Sekolah Berhasil Di Perbarui!';

            $editNamaSekolah    =$('#editNamaSekolah').val();
            $editNamaYayasan    =$('#editNamaYayasan').val();
            $editNPSN           =$('#editNPSN').val();
            $editAkreditasi     =$('#editAkreditasi').val(); 
            $editSKAkreditasi   =$('#editSKAkreditasi').val();
            $editJenjang        =$('#editJenjang').val();
            $editTahunBerdiri   =$('#editTahunBerdiri').val();
            $editProvSekolah    =$('#editProvSekolah').val();
            $editKabSekolah     =$('#editKabSekolah').val();
            $editKecSekolah     =$('#editKecSekolah').val();
            $editDesaSekolah    =$('#editDesaSekolah').val();
            $editKodePos        =$('#editKodePos').val();
            $editAlamatSekolah  =$('#editAlamatSekolah').val();
            $editEmailSekolah   =$('#editEmailSekolah').val();
            $editHpSekolah      =$('#editHpSekolah').val();
            $editEmailSekolah   =$('#editEmailSekolah').val();
            $editWebSekolah     =$('#editWebSekolah').val();
                $.ajax({
                    type: "POST",
                    url: "Controller/Bendahara/PengaturanData/DataSekolah/editDataSekolah.php",
                    data: {
                        editNamaSekolah    :$editNamaSekolah,
                        editNamaYayasan    :$editNamaYayasan,
                        editNPSN           :$editNPSN,
                        editAkreditasi     :$editAkreditasi, 
                        editSKAkreditasi   :$editSKAkreditasi,
                        editJenjang        :$editJenjang,
                        editTahunBerdiri   :$editTahunBerdiri,
                        editProvSekolah    :$editProvSekolah,
                        editKabSekolah     :$editKabSekolah,
                        editKecSekolah     :$editKecSekolah,
                        editDesaSekolah    :$editDesaSekolah,
                        editKodePos        :$editKodePos,
                        editAlamatSekolah  :$editAlamatSekolah,
                        editEmailSekolah   :$editEmailSekolah,
                        editHpSekolah      :$editHpSekolah,
                        editEmailSekolah   :$editEmailSekolah,
                        editWebSekolah     :$editWebSekolah,
                        editDataSekolah    :1,
                    },               
                    success: function(result){
                        $("#loading").hide();
                        $("#loading2").hide();
                        showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit);

                    }
                });
            }
        });
 