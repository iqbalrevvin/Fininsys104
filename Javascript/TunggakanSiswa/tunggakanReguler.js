$(document).ready(function(){
//-----------PILIH TUNGGAKAN REGULER BERDASARKAN ANGKATAN-----------------------------------------------
//$("#pilihKelas").change(function(){
    $(document).on('change', '#pilihKelas', function (e) {
    $("#loadSelect").show().html("<img src='Assets/Images/loading.gif' width='150' height='35' >");
    //var pilihAngkatan = $("#pilihAngkatan").val();
    $pilihAngkatan          = $('#pilihAngkatan').val();
    $pilihKelas             = $('#pilihKelas').val();
    $.ajax({
        url: "View/Bendahara/Laporan/LaporanPembayaran/ReportDebt/pilihTunggakan.php",
        async: false,
        data: {
            pilihAngkatan           :$pilihAngkatan,
            pilihKelas              :$pilihKelas,
        }, 
        success: function(response){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#pilihTunggakan").html(response);
            $("#pilihTunggakan").show();
            $("#loadSelect").hide();
            $("#ketSelect").hide();
        }
    });
  });
$("#pilihAngkatan").change(function(){
    $("#ketSelect").hide();
    $("#pilihTunggakan").hide();
    $("#loadSelect").show().html("<img src='Assets/Images/loading.gif' width='150' height='35' >");
  });

});