<form method="post" action="">
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">search</i>
        </span>
        <div class="form-line">
            <input type="text" name="keyword" class="form-control" value="<?php echo $_REQUEST['keyword']; ?>" placeholder="Pencarian...">
        </div>
        <span class="input-group-addon">
            <button class="btn btn-sm bg-teal waves-effect" type="submit">
                <i class="material-icons">search</i>Cari
            </button>
            <?php if($_REQUEST['keyword']<>""){ ?>
            <a class="btn btn-sm bg-pink waves-effect" href="?p=LogActivity&k=ListLog"> 
                <i class="material-icons">clear</i>RESET PENCARIAN
            </a>
            <?php } ?>
         </span>
    </div>
</form>
                             
<table class="table table-bordered table-striped table-hover">
    <thead class="font-12 font-bold">
        <tr>
            <th style="text-align: center; vertical-align: middle;">No.</th>
            <th style="text-align: left; vertical-align: middle;">Pengguna</th>
            <th style="text-align: left; vertical-align: middle;">Level</th>
            <th style="text-align: left; vertical-align: middle;">Waktu</th>
            <th style="text-align: left; vertical-align: middle;">Perangakat/Browser</th>
            <th style="text-align: left; vertical-align: middle;">Deskripsi Log</th>
        </tr>
    </thead>

    <tfoot class="font-12">
        <tr>
            <th style="text-align: center; vertical-align: middle;">No.</th>
            <th style="text-align: left; vertical-align: middle;">Pengguna</th>
            <th style="text-align: left; vertical-align: middle;">Level</th>
            <th style="text-align: left; vertical-align: middle;">Waktu</th>
            <th style="text-align: left; vertical-align: middle;">Perangakat/Browser</th>
            <th style="text-align: left; vertical-align: middle;">Deskripsi Log</th>
        </tr>
    </tfoot>
    <tbody class="font-11">
        <?php
            $no = 1;
            #while($log = $result->fetch_object()) :
            while(($count<$rpp) && ($i<$tcount)) {
                mysqli_data_seek($result,$i);
                $log = mysqli_fetch_array($result);
                $textHapus = $log['deskripsi_log'];
        ?>
        <tr>
            <td style="text-align: center; vertical-align: middle;"><?= $no++ ?></td>
            <td style="text-align: left; vertical-align: middle;"><?= $log['nama_tampilan'] ?></td>
            <td style="text-align: left; vertical-align: middle;"><?= LevelName($log['level']) ?></td>
            <td style="text-align: left; vertical-align: middle;"><b><?= $log['tgl_jam_aktivitas'] ?></b></td>
            <td style="text-align: left; vertical-align: middle;"><?= device($log['mac_address']) ?></td>
            <?php if(preg_match("/hapus/i", $textHapus) || preg_match("/gagal/i", $textHapus)) { ?>
            <td><b class="col-red"><?= $log['deskripsi_log'] ?></b></td> 
            <?php }else{ ?>
            <td><b class="col-black"><?= $log['deskripsi_log'] ?></b></td>
            <?php } ?>
        </tr>
        <?php 
            $i++; 
            $count++;
            } 
        ?>
    </tbody>
</table>
<div><?php echo paginate_one($reload, $page, $tpages); ?></div>