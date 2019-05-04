<?php require_once 'body/header.php'; ?>
<?php
if (isset($_POST['create'])) {

  $a = mysql_query("SELECT kode_krt FROM kriteria");
  while ($b = mysql_fetch_array($a)) {
    $c = $b['kode_krt'];
    //echo "C = ".$c."<br>";
    $sc = $_POST[$c];
    //echo "SUB _KRT = ".$sc."<br>";
    $Ac[] = $c;
    $Asc[] = $sc;

    echo "{".$c.",".$sc."}";
    $out[] = $sc;
    
  }
  
  $nama  = $_POST['nama_alt'];
  $data = json_encode($out);
  /*print_r($data);*/
  //echo $krt;

  if ($nama != "" ){

    $sql="INSERT INTO alternatif values ('','$nama','$data')";

    $query = mysql_query($sql) or die(mysql_error());
    if ($query) {
    echo "<script>window.alert('Sub Kriteria berhasil ditambah');
        window.location=(href='alternatif.php')</script>";
    }
  }else {
    echo "<script>window.alert('Tak Boleh Kosong!!')</script>";
  }
}
?>
<!-- Modal Create -->
<div class="margin_box">
  <div class="smooth-box box-body" style="width: 50%;">
    <div class="box-margin">

      <!-- Body Modal -->
      <div id="content">
      <!-- Page title -->
        <div class="page-title" style="background-color: #166040;">
          <h5><i class="fa fa-desktop"></i> ISI BIODATA</h5>
        </div>
        <!-- /page title -->

        <!-- Hover rows datatable inside panel -->
        <div class="panel panel-default">
          <!-- Content -->
              <form class="form-horizontal" action="" method="post" role="form">
                <div class="panel panel-default">
                  <div class="panel-heading"><h6 class="panel-title">Formulir</h6></div>
                  <div class="panel-body">

                    <div class="form-group">
                      <label class="col-sm-2 control-label text-right">Nama :</label>
                      <div class="col-sm-10">
                        <input type="text" name="nama_alt" placeholder="Names" required class="form-control">
                      </div>
                    </div>

                    
                    <?php
                    /*Select Option Load Data*/
                    $nomorID = 0;
                    $result = mysql_query("SELECT kode_krt, nama_kriteria FROM kriteria");
                    while ($ambil = mysql_fetch_array($result)) {
                      # code...
                      $id = $ambil['kode_krt']
                    ?>
                    <div class="form-group">
                    <label class="col-sm-2 control-label text-right"><?php echo $ambil["nama_kriteria"]; ?>:</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="<?php echo $id; ?>">
                          <?php
                          /*Select Option Load Data*/
                          $r = mysql_query("SELECT * FROM sub_kriteria WHERE kode_krt='$id' ");
                          while ($get = mysql_fetch_array($r)) {
                            # code...
                            echo "<option value='".$get['kode_sub_krt']."'>".$get['nama_sub_krt']."</option>";
                          } ?>
                        </select>
                      </div>
                    </div>
                    <?php } ?>

                    <div class="form-action text-right">
                      <input type="submit" name="create" value="Simpan" class="btn btn-primary">
                      <input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()" class="btn btn-default">
                    </div>

                  </div>
                </div>
              </form>
              <!-- End Content -->
        </div>
      </div>
      <!-- End Body -->

    </div>
  </div>
</div>



<?php require_once 'body/footer.php'; ?>