<!-- Data Modal -->
<div class="modal fade" id="filterJenisTransaksi" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">FILTER JENIS TRANSAKSI</h4>
         </div>
         <div class="card">
            <div class="body"><form method="GET">
               <div class="row clearfix">
               
                <input type="hidden" name="p" value="SettFinancialType">
                <input type="hidden" name="k" value="ViewFinancialType">
                  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                     <label for="email_address_2">Tahun Angkatan</label>
                  </div>
                  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                     <div class="form-group">
                        <div class="form-line">
                           <select id="pilihAngkatan" name="year" class="form-control selectpicker" 
                                    data-live-search="true" required>
                                <option value="">-- Pilih Angkatan --</option>
                                    <?php
                                     $thnQ =mysqli_query($db, "SELECT tgl_masuk FROM siswa 
                                                        GROUP BY year(tgl_masuk)");
                                        while($thn=mysqli_Fetch_array($thnQ)){
                                        $data = explode('-',$thn['tgl_masuk']);
                                        $tahun = $data[0];
                                        echo "<option value='$tahun'>$tahun</option>";
                                    }
                                ?> 
                            </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                     <label for="email_address_2">Program Studi</label>
                  </div>
                  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                     <div class="form-group">
                        <div class="form-line">
                           <select id="pilihProdi" name="program" class="selectpicker" 
                                    data-live-search="true" required>
                                <option value="">-- Pilih Program Studi --</option>
                                <?php
                                $sqlProdi = "SELECT * FROM prodi ORDER BY nama_jurusan";
                                $pilihProdi = $db->query($sqlProdi) or die ($db->error);
                                    while($prodi = $pilihProdi->fetch_object()):
                                        echo "<option value='$prodi->singkatan_jurusan'>$prodi->nama_jurusan</option>";
                                    endwhile;
                                ?>
                            </select>
                        </div>
                     </div>
                  </div>
               </div>
               <!--//-->
               <div class="modal-footer">
                    <button type="submit" id="btnTampilJenisTransaksi" 
                            class="btn bg-blue-grey waves-effect">
                        <i class="material-icons">find_in_page</i>
                        <span id="loadingJenisTransaksi">Tampilkan</span>
                    </button>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>