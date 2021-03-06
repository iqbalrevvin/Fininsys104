<?php 
	include "../../../Config/ConfigDB.php";
	include "../../../Config/Functions.php";

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$columns = array( 
// datatable column index  => database column name
	0 => 'idSiswa',
	1 => 'nama_siswa',
	2 => 'no_idnt',
    3 => 'nipd', 
	4 => 'tgl_masuk',
	5 => 'tgl_masuk',
	6 => 'kelas',
	7 => 'tgl_lahir',
);

// getting total number records without any search
$sql = "SELECT * FROM siswa JOIN kelas ON siswa.kelas = kelas.nama_kelas 
		JOIN prodi ON kelas.idJurusan = prodi.idJurusan 
		ORDER BY idSiswa DESC";
$query=mysqli_query($db, $sql) or die($db->error);
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "SELECT * FROM siswa JOIN kelas ON siswa.kelas = kelas.nama_kelas 
		JOIN prodi ON kelas.idJurusan = prodi.idJurusan WHERE 1=1";
if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	
	$sql.=" AND ( nama_siswa LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR nipd LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR kelas LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR tgl_lahir LIKE '".$requestData['search']['value']."%' )";
	$query=mysqli_query($db, $sql) or die($db->error);
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."  ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($db, $sql) or die("loadListTransaction.php: get PO"); // again run query with limit

	}else{	

	$sql = "SELECT * FROM siswa JOIN kelas ON siswa.kelas = kelas.nama_kelas 
		JOIN prodi ON kelas.idJurusan = prodi.idJurusan";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."  ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']." ";
	$query=mysqli_query($db, $sql) or die($db->error);
	
}

$data = array();
$no = 1;
$i=1+$requestData['start'];
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$scure= md5(md5($row['idSiswa']).md5('qwerty12345'));
	$semester = semester($row["tgl_masuk"], $row['jumlah_semester']);
	$grade = grade($row["tgl_masuk"], $row['jumlah_semester']);
	$nestedData=array(); 
	$nestedData[] = "<input type='checkbox' id='delCheckRowSiswa".$row['no_idnt']."' 
						class='filled-in chk-col-pink delCheckRowSiswa' value='".$row['no_idnt']."'/> 
                    <label for='delCheckRowSiswa".$row['no_idnt']."'>".$i."</label>";
	$nestedData[] = "<b> <a class='font-bold col-teal' href=?p=StudentList&k=Profile&ID=".$row["idSiswa"]."&Scure=".$scure." ?>".$row["nama_siswa"]."</a></b>";
	$nestedData[] = $row["no_idnt"];
	$nestedData[] = $row["nipd"];
	$nestedData[] = $semester;
	$nestedData[] = $grade;
    $nestedData[] = $row["kelas"];
	$nestedData[] = ubahTgl($row["tgl_lahir"]);

	$data[] = $nestedData;
    $i++;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>