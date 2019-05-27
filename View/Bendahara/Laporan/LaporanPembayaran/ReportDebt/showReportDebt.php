<?php
    $ReportQuery = mysqli_query($db, "SELECT * FROM siswa JOIN kelas ON kelas.nama_kelas = siswa.kelas
                                    JOIN prodi ON kelas.idJurusan = prodi.idJurusan 
                                    WHERE year(siswa.tgl_masuk) = '$thnAngkatan' 
                                    AND siswa.kelas = '$kelas' ") or die ($db->error);    
?>

<div class="header">
	<h2 style="text-align: center;">
        <button id="cetak" class="btn bg-red waves-effect">
            <i class="material-icons">print</i>
            <span>Cetak</span>
    	</button>
		
		<?php if($_POST['jnsTunggakan'] == 'semuaTunggakan'){ ?>
    	<a href="View/Bendahara/Laporan/LaporanPembayaran/ReportDebt/exportReportDebtAll.php?TA=<?php echo $thnAngkatan ?>&Kls=<?php echo $kelas ?>">
    	<?php }else{ ?>
    	<a href="View/Bendahara/Laporan/LaporanPembayaran/ReportDebt/exportReportDebtFilter.php?TA=<?php echo $thnAngkatan ?>&Kls=<?php echo $kelas ?>&JT=<?php echo $jnsTunggakan ?>">
    	<?php } ?>
    	<button class="btn bg-teal waves-effect">
            <i class="material-icons">grid_on</i>
            <span>Download Excel</span>
    	</button>
    	</a>
    </h2>
</div>

<div id="invoice">
	<?php
		if($_POST['jnsTunggakan'] == 'semuaTunggakan'){
		include "debtSemuaTunggakan.php"; 
		}else{
		include "debtJenisTunggakan.php";
		}
	?>
</div>
