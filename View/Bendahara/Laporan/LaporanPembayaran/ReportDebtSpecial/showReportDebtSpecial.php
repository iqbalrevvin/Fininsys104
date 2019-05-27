<div class="header">
	<h2 style="text-align: center;">
		<button id="cetak" class="btn bg-red waves-effect">
			<i class="material-icons">print</i>
			<span>Cetak</span>
		</button>
		<?php if($_POST['jnsTunggakan'] == 'semuaTunggakan'){ ?>
    	<a href="View/Bendahara/Laporan/LaporanPembayaran/ReportDebtSpecial/exportReportDebtKhusus.php?TA=<?= $thnAngkatan ?>&Kls=<?= $kelas ?>">
    	<?php }else{ ?>
    	<a href="View/Bendahara/Laporan/LaporanPembayaran/ReportDebtSpecial/exportReportDebtKhusus_jenis.php?TA=<?= $thnAngkatan ?>&Kls=<?= $kelas ?>&JT=<?= $jnsTunggakan ?>">
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
			require_once('Controller/Bendahara/Laporan/LaporanPembayaran/ReportDebtSpecial/tunggakanKhusus.php');
			require('debtSemuaTunggakanKhusus.php'); 
		}else{
			require_once('Controller/Bendahara/Laporan/LaporanPembayaran/ReportDebtSpecial/tunggakanKhusus.php');
			require_once('debtJenisTunggakanKhusus.php');
		}
	?>
</div>
