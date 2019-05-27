<?php 
	include "../../../Config/ConfigDB.php";
	include "../../../Config/Functions.php";

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$columns = array( 
// datatable column index  => database column name
	0 => 'idTransaksi',
	1 => 'nama_siswa',
	2 => 'nipd',
    3 => 'nama_kelas', 
	4 => 'nama_jenis_transaksi',
	5 => 'no_transaksi',
	6 => 'tgl_transaksi',
	7 => 'jumlah_bayar'
);

// getting total number records without any search
$sql = "SELECT * FROM siswa JOIN transaksi ON siswa.no_idnt = transaksi.no_idnt
		JOIN jenis_transaksi ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi 
		ORDER BY transaksi.tgl_transaksi DESC";
$query=mysqli_query($db, $sql) or die($db->error);
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT * FROM siswa JOIN transaksi ON siswa.no_idnt = transaksi.no_idnt
			JOIN jenis_transaksi ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi";
	$sql.=" WHERE nama_siswa LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR nipd LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR kelas LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR nama_jenis_transaksi LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR no_transaksi LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR tgl_transaksi LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($db, $sql) or die("loadListTransaction.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."  ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($db, $sql) or die("loadListTransaction.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT * FROM siswa JOIN transaksi ON siswa.no_idnt = transaksi.no_idnt
									JOIN jenis_transaksi ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."  ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']." ";
	$query=mysqli_query($db, $sql) or die("loadListTransaction.php: get PO");
	
}

$data = array();
$no = 1;

while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$scure= md5(md5($row['idSiswa']).md5('qwerty12345'));
	$nestedData=array(); 
	$nestedData[] = $no++;
	$nestedData[] = "<b><a class='font-bold col-teal' href=?p=StudentList&k=Profile&ID=".$row["idSiswa"]."&Scure=".$scure." ?>".$row["nama_siswa"]."</a></b>";
	$nestedData[] = $row["nipd"];
	$nestedData[] = $row["kelas"];
	$nestedData[] = $row["nama_jenis_transaksi"];
    $nestedData[] = $row["no_transaksi"];
	$nestedData[] = tgl_indo($row["tgl_transaksi"]);
	$nestedData[] = "<b>Rp. ".number_format($row["jumlah_bayar"]).".-</b>";
	$nestedData[] = '<button type="button" class="btn bg-pink btn-xs waves-effect delTransaction" 
                                            data-toggle="modal" data-transaksi2="'.$row['no_transaksi'].'" data-id="'.$row['no_transaksi'].'" value="'.$row['no_transaksi'].'">  
                                            <span class="font-bold col-white">Hapus</span>
                                            <i class="material-icons">remove_circle</i>
                                    </button>';
	$data[] = $nestedData;
    
}
#require('ssp.class.php');
$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>