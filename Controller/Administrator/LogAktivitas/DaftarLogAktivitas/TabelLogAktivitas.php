<?php
error_reporting(0);
		if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
//        jika ada kata kunci pencarian (artinya form pencarian disubmit dan tidak kosong)
//        pakai ini
            $keyword=$_REQUEST['keyword'];
            $reload = "?p=LogActivity&k=ListLog&pagination=true&keyword=$keyword";
            #$sql =  "SELECT * FROM provinsi WHERE provinsi LIKE '%$keyword%' ORDER BY provinsi";
            #$result = mysql_query($sql);
            $result = $db->query("SELECT * FROM log_aktivitas WHERE deskripsi_log LIKE '%$keyword%' OR tgl_jam_aktivitas LIKE '%$keyword%'
            	OR nama_tampilan LIKE '%$keyword%'
            	ORDER BY idLog DESC") or die ($db->error);
        }else{
//            jika tidak ada pencarian pakai ini
            $reload = "?p=LogActivity&k=ListLog&pagination=true";
            #$sql =  "SELECT * FROM provinsi ORDER BY provinsi";
            #$result = mysql_query($sql);
            $result = $db->query("SELECT * FROM log_aktivitas ORDER BY idLog DESC") or die ($db->error);
        }
        //pagination config start
        $rpp = 25; // jumlah record per halaman
        $page = intval($_GET["page"]);
        if($page<=0) $page = 1;  
        $tcount = mysqli_num_rows($result);
        $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
        $count = 0;
        $i = ($page-1)*$rpp;
        $no_urut = ($page-1)*$rpp;
        //pagination config end
        #$LogActQr = $db->query("SELECT * FROM log_aktivitas ORDER BY idLog DESC") or die ($db->error);
?>