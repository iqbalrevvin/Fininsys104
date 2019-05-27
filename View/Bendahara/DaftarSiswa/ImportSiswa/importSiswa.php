
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    IMPORT DATA SISWA
                </h2>
            </div>
            
            <div class="body">
                <div class="row clearfix">
                    <div class="col-md-5">
                        <div class="input-group">
                            	<form method="post" action="" enctype="multipart/form-data">
									<a href="Assets/FortmatImport/FormatImportSiswa-Fininsys.xls">
										<button type="button" class="btn bg-blue-grey btn-block btn-sm waves-effect">
                    						<i class="material-icons">file_download</i>
                    						<span>Download Format</span>
                    					</button>
									</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="file" name="file" class="btn bg-blue-grey btn-block btn-sm waves-effect">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <button type="submit" name="preview" class="btn bg-cyan btn-block btn-sm waves-effect">
								<i class="material-icons">remove_red_eye</i>
								<span>Preview</span>
							</button>
                        </div>
                    </div>
                    </form>
                </div>
			<?php
			// Jika user telah mengklik tombol Preview
			if(isset($_POST['preview'])){
				//$ip = ; // Ambil IP Address dari User
				$nama_file_baru = 'data.xlsx';
				
				// Cek apakah terdapat file data.xlsx pada folder tmp
				if(is_file('admin/page/DaftarSiswa/DataImport/'.$nama_file_baru)) // Jika file tersebut ada
					unlink('admin/page/DaftarSiswa/DataImport/'.$nama_file_baru); // Hapus file tersebut
				
				$tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
				$tmp_file = $_FILES['file']['tmp_name'];
				
				// Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
				if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
					// Upload file yang dipilih ke folder tmp
					// dan rename file tersebut menjadi data{ip_address}.xlsx
					// {ip_address} diganti jadi ip address user yang ada di variabel $ip
					// Contoh nama file setelah di rename : data127.0.0.1.xlsx
					move_uploaded_file($tmp_file, 'admin/page/DaftarSiswa/DataImport/'.$nama_file_baru);
					
					// Load librari PHPExcel nya
					require_once 'assets/PHPExcel/PHPExcel.php';
					
					$excelreader = new PHPExcel_Reader_Excel2007();
					$loadexcel = $excelreader->load('admin/page/DaftarSiswa/DataImport/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
					$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
					?>
					<!--Buat sebuah tag form untuk proses import data ke database-->
					<form method='post' action='admin/query/DaftarSiswa/prosesImport.php'>
					
					<!--Buat sebuah div untuk alert validasi kosong-->
					<div class='alert alert-info'>
						<strong>
							Mohon Periksa Data Di Bawah, Pastikan Semua Kolom Terisi Dan Tidak Ada Tanda Merah!,
							Lalu Klik Tombol <i class='material-icons'>import_export</i><span>Import Data</span>
						</strong>
					</div>

					<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover" 
							style="width: 855px; height: 53px; margin-left: auto; margin-right: auto;" border="2">
					<tr>
						<th colspan='29' class='text-left'>Preview Data</th>
					</tr>
					<tr>
						<th>NIK</th>
						<th>Tanggal Masuk</th>
						<th>Prodi</th>
						<th>Nama Siswa</th>
						<th>NISN</th>
						<th>NIPD</th>
						<th>Tpt Lahir</th>
						<th>Tgl Lahir</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>Desa</th>
						<th>Kecamatan</th>
						<th>Kabupaten</th>
						<th>Provinsi</th>
						<th>No. Telp</th>
						<th>Email</th>
						<th>Foto</th>
						<th>PIP</th>
						<th>Nama Ayah</th>
						<th>TL-Ayah</th>
						<th>PND-Ayah</th>
						<th>PKJ-Ayah</th>
						<th>PHSL-Ayah</th>
						<th>Nama Ibu</th>
						<th>TL-Ibu</th>
						<th>PND-Ibu</th>
						<th>PKJ-Ibu</th>
						<th>PHSL-Ibu</th>
						<th>Tanggal Daftar</th>

					</tr>
					<?php
					$numrow = 1;
					$kosong = 0;
					foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
						// Ambil data pada excel sesuai Kolom
						$nik 			= $row['A']; // 
						$tgl_masuk 		= $row['B']; // 
						$prodi 			= $row['C']; // 
						$nama 			= $row['D']; // 
						$nisn 			= $row['E']; // 
						$nipd 			= $row['F'];
						$tmp_lahir 		= $row['G'];
						$tgl_lahir 		= $row['H'];
						$agama 			= $row['I'];
						$alamat 		= $row['J'];
						$desa 			= $row['K'];
						$kecamatan 		= $row['L'];
						$kabupaten 		= $row['M'];
						$provinsi 		= $row['N'];
						$no_telp 		= $row['O'];
						$email 			= $row['P'];
						$foto 			= $row['Q'];
						$pip 			= $row['R'];
						$nama_ayah 		= $row['S'];
						$thn_lhr_ayah 	= $row['T'];
						$pnd_ayah 		= $row['U'];
						$pkj_ayah 		= $row['V'];
						$phsl_ayah 		= $row['W'];
						$nama_ibu 		= $row['X'];
						$thn_lhr_ibu 	= $row['Y'];
						$pnd_ibu 		= $row['Z'];
						$pkj_ibu 		= $row['AA'];
						$phsl_ibu 		= $row['AB'];
						$tgl_daftar 	= $row['AC'];

						// Cek jika semua data tidak diisi
						if(empty($nik) && empty($tgl_masuk) && empty($prodi) && empty($nama) && empty($nisn))
							continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
						
						// Cek $numrow apakah lebih dari 1
						// Artinya karena baris pertama adalah nama-nama kolom
						// Jadi dilewat saja, tidak usah diimport
						if($numrow > 1){
							// Validasi apakah semua data telah diisi
							$nik_td 		= ( ! empty($nik))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$tgl_masuk_td 	= ( ! empty($tgl_masuk))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
							$prodi_td 		= ( ! empty($prodi))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
							$nama_td 		= ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
							$nisn_td 		= ( ! empty($nisn))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
							$nipd_td 		= ( ! empty($nipd))? "" : " style='background: #E07171;'";
							$tmp_lahir_td 	= ( ! empty($tmp_lahir))? "" : " style='background: #E07171;'";
							$tgl_lahir_td 	= ( ! empty($tgl_lahir))? "" : " style='background: #E07171;'";
							$agama_td 		= ( ! empty($agama))? "" : " style='background: #E07171;'";
							$alamat_td 		= ( ! empty($alamat))? "" : " style='background: #E07171;'";
							$desa_td 		= ( ! empty($desa))? "" : " style='background: #E07171;'";
							$kecamatan_td 	= ( ! empty($kecamatan))? "" : " style='background: #E07171;'";
							$kabupaten_td 	= ( ! empty($kabupaten))? "" : " style='background: #E07171;'";
							$provinsi_td 	= ( ! empty($provinsi))? "" : " style='background: #E07171;'";
							$no_telp_td 	= ( ! empty($no_telp))? "" : " style='background: #E07171;'";
							$email_td 		= ( ! empty($email))? "" : " style='background: #E07171;'";
							$foto_td 		= ( ! empty($foto))? "" : " style='background: #E07171;'";
							$pip_td 		= ( ! empty($pip))? "" : " style='background: #E07171;'";
							$nama_ayah_td 	= ( ! empty($nama_ayah))? "" : " style='background: #E07171;'";
							$thn_lhr_ayah_td = ( ! empty($thn_lhr_ayah))? "" : " style='background: #E07171;'";
							$pnd_ayah_td 	= ( ! empty($pnd_ayah))? "" : " style='background: #E07171;'";
							$pkj_ayah_td 	= ( ! empty($pkj_ayah))? "" : " style='background: #E07171;'";
							$phsl_ayah_td 	= ( ! empty($phsl_ayah))? "" : " style='background: #E07171;'";
							$nama_ibu_td 	= ( ! empty($nama_ibu))? "" : " style='background: #E07171;'";
							$thn_lhr_ibu_td = ( ! empty($thn_lhr_ibu))? "" : " style='background: #E07171;'";
							$pnd_ibu_td 	= ( ! empty($pnd_ibu))? "" : " style='background: #E07171;'";
							$pkj_ibu_td 	= ( ! empty($pkj_ibu))? "" : " style='background: #E07171;'";
							$phsl_ibu_td 	= ( ! empty($phsl_ibu))? "" : " style='background: #E07171;'";
							$tgl_daftar_td	= ( ! empty($tgl_daftar))? "" : " style='background: #E07171;'";
							
							// Jika salah satu data ada yang kosong
							if(empty($nik) or empty($tgl_masuk) or empty($prodi) or empty($nama) or empty($nisn)){
								$kosong++; // Tambah 1 variabel $kosong
							}
							
							echo "<tr>";
							echo "<td".$nik_td.">".$nik."</td>";
							echo "<td".$tgl_masuk_td.">".$tgl_masuk."</td>";
							echo "<td".$prodi_td.">".$prodi."</td>";
							echo "<td".$nama_td.">".$nama."</td>";
							echo "<td".$nisn_td.">".$nisn."</td>";
							echo "<td".$nipd_td.">".$nipd."</td>";
							echo "<td".$tmp_lahir_td.">".$tmp_lahir."</td>";
							echo "<td".$tgl_lahir_td.">".$tgl_lahir."</td>";
							echo "<td".$agama_td.">".$agama."</td>";
							echo "<td".$alamat_td.">".$alamat."</td>";
							echo "<td".$desa_td.">".$desa."</td>";
							echo "<td".$kecamatan_td.">".$kecamatan."</td>";
							echo "<td".$kabupaten_td.">".$kabupaten."</td>";
							echo "<td".$provinsi_td.">".$provinsi."</td>";
							echo "<td".$no_telp_td.">".$no_telp."</td>";
							echo "<td".$email_td.">".$email."</td>";
							echo "<td".$foto_td.">".$foto."</td>";
							echo "<td".$pip_td.">".$pip."</td>";
							echo "<td".$nama_ayah_td.">".$nama_ayah."</td>";
							echo "<td".$thn_lhr_ayah_td.">".$thn_lhr_ayah."</td>";
							echo "<td".$pnd_ayah_td.">".$pnd_ayah."</td>";
							echo "<td".$pkj_ayah_td.">".$pkj_ayah."</td>";
							echo "<td".$phsl_ayah_td.">".$phsl_ayah."</td>";
							echo "<td".$nama_ibu_td.">".$nama_ibu."</td>";
							echo "<td".$thn_lhr_ibu_td.">".$thn_lhr_ibu."</td>";
							echo "<td".$pnd_ibu_td.">".$pnd_ibu."</td>";
							echo "<td".$pkj_ibu_td.">".$pkj_ibu."</td>";
							echo "<td".$phsl_ibu_td.">".$phsl_ibu."</td>";
							echo "<td".$tgl_daftar_td.">".$tgl_daftar."</td>";
							echo "</tr>";
						}
						
						$numrow++; // Tambah 1 setiap kali looping
					}
					
					echo "</table>";
					echo "</div>";
					
					// Cek apakah variabel kosong lebih dari 1
					// Jika lebih dari 1, berarti ada data yang masih kosong
					if($kosong > 1){
					?>	
						<script src = "assets/js/jquery-3.1.1.js"></script>
    					<script src="assets/plugins/jquery/jquery.min.js"></script>
    					<script type="text/javascript">
						$(document).ready(function(){
							// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
							$("#jumlah_kosong").html('<?php echo $kosong; ?>');
							
							$("#kosong").show(); // Munculkan alert validasi kosong
						});
						</script>
					<?php
					}else{ // Jika semua data sudah diisi
						echo "<hr>";
						
						// Buat sebuah tombol untuk mengimport data ke database
						echo "<button type='submit' name='import' class='btn bg-teal btn-block btn-lg waves-effect'>
								<i class='material-icons'>import_export</i>
                    			<span>Import Data</span></button>";
					}
					
					echo "</form>";
				}else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
					// Munculkan pesan validasi
					echo "<div class='alert alert-danger'>
					Mohon Pilih File Excel Dan Hanya File Excel 2007 Ke Atas (.xlsx) yang diperbolehkan
					</div>";
				}
			}
			?>  






            </div>
        </div>
    </div>
</div>

