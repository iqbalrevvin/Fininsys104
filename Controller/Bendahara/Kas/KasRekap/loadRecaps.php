<?php 
	include "../../../../Config/ConfigDB.php";
	include "../../../../Config/Functions.php";

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$columns = array( 
// datatable column index  => database column name
	0 => 'idKas',
	1 => 'no_kas',
	2 => 'nama_jenis_kas',
    3 => 'deskripsi', 
	4 => 'petugas',
	5 => 'tgl_kas',
	6 => 'jml_kas_masuk',
	7 => 'jml_kas_keluar'
);

// getting total number records without any search
$sql = "SELECT * FROM kas JOIN jenis_kas ON kas.idJenis_kas = jenis_kas.idJenis_kas ORDER BY tgl_kas, idKas, tgl_input ASC";
$query=mysqli_query($db, $sql) or die("loadRecaps.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT * FROM kas JOIN jenis_kas ON kas.idJenis_kas = jenis_kas.idJenis_kas";
	$sql.=" WHERE no_kas LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR nama_jenis_kas LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR deskripsi LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR petugas LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR jml_kas_masuk LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR jml_kas_keluar LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($db, $sql) or die("loadRecaps.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."  ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($db, $sql) or die("loadRecaps.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT * FROM kas JOIN jenis_kas ON kas.idJenis_kas = jenis_kas.idJenis_kas";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."  ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']." ";
	$query=mysqli_query($db, $sql) or die("loadRecaps.php: get PO");
	
}

$data = array();
$no = 1;

while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
	$nestedData[] = $no++;
	$nestedData[] = '<p class="font-12">'.$row['no_kas'].'</p>';
	$nestedData[] = '<p class="font-12">'.$row["nama_jenis_kas"].'</p>';
	$nestedData[] = '<p class="font-12">'.substr($row["deskripsi"],0,20).'</p>';
	$nestedData[] = '<p class="font-12">'.substr($row["petugas"],0,20).'</p>';
    $nestedData[] = '<p class="font-12">'.ubahTgl($row["tgl_kas"]).'</p>';;
	$nestedData[] = '<b class="font-12 col-teal">Rp. '.number_format($row['jml_kas_masuk']).',-</b>';
	$nestedData[] = '<b class="font-12 col-pink">Rp. '.number_format($row['jml_kas_keluar']).',-</b>';
	$nestedData[] = '<button class="btn bg-white btn-xs waves-effect btnDelKasRekap"
                                            data-toggle="modal" data-delete="'.$row['no_kas'].'" 
                                            data-id="'.$row['idKas'].'" value="'.$row['idKas'].'">
                                        <span class="font-bold font-12 col-pink">
                                            <i class="material-icons">delete_forever</i>Hapus
                                        </span> 
                                    </button>';
	$data[] = $nestedData;
    
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>