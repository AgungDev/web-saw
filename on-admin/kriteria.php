<?php require_once 'body/header.php'; ?>
<?php 
$dataSource = new DataArray;
$func = new MyFunction;
$bbt = new Bobot;
?>

<div class="margin_box">
  <div class="smooth-box box-body">
    <div class="box-margin">

      <div id="content">
      <!-- Page title -->
        <div class="page-title">
          <h5><i class="fa fa-desktop"></i> Kriteria</h5>
        </div>
        <!-- /page title -->

        <!-- Hover rows datatable inside panel -->
        <div class="panel panel-default">

          <div class="panel-heading" align="right">
            <kbd style="font-size: 12px; margin-top: 20px;">Bobot Terpakai[<?php echo $bbt->getTerpakai('kriteria', 'bobot');?>%]</kbd>
              <a href="kriteria_add.php" >
                <input type="submit" value="Tambah Kriteria" class="btn btn-info">
              </a>
          </div>

          <div class="datatable">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama Kritera</th>
                        <th scope="col">Atribut</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $nomor = 0;
                $hasil = mysql_query("SELECT * FROM kriteria");
                while ($dataku = mysql_fetch_array($hasil)) {


                ?>
                  <tr>
                    <td><?php echo "C".$nomor=$nomor+1;?></td>
                    <td><?php echo $dataku['kode_krt']; ?></td>
                    <td><?php echo $dataku['nama_kriteria']; ?></td>
                    <td><?php echo $func->CAC($dataSource->ATRIBUT,'VALUE::OUT::ONE',$dataku['atribut']); ?></td>
                    <td><?php echo $dataku['bobot']."%"; ?></td>
                    <td>
                      <a href="kriteria_edit.php?edt_krt=<?php echo base64_encode($dataku['kode_krt']); ?>">
                      <i class='fa fa-edit'></i></a> 
                      <a href="kriteria_deleted.php?hps_krt=<?php echo base64_encode($dataku['kode_krt']); ?>">
                      <i class='fa fa-eraser'></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>


<?php require_once 'body/footer.php'; ?>