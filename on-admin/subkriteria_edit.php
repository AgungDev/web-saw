<?php require_once 'body/header.php'; ?>
<?php
$kode = base64_decode($_GET['edt_krt']);
if (isset($_POST['ubah'])) {
  # code...
  $nm = $_POST['nama_sub_krt'];
  $krt = $_POST['id_krt'];
  $nl = $_POST['nilai_sub_krt'];

 /* $dt = [
      'id' => $kode,
      'nama' => $nm,
      'atri' => $at,
      'bbot' => $bb
  ];*/

  /*echo "Nama :".$nm."\nAtribut :".$at."\nBobot :".$bb."\nID :".$kode;*/
  $Edqq = "UPDATE sub_kriteria SET nama_sub_krt='$nm', kode_krt='$krt', nilai_sub_krt='$nl' WHERE kode_sub_krt='$kode' LIMIT 1";
  $edit_kriteria = mysql_query($Edqq)or die(mysql_error());

  if ($edit_kriteria) {
      # code...
    sleep(1);
      ?>
      <script type="text/javascript">
        window.alert('UPDATE SUCCES');
          window.location=(href='subkriteria.php');
      </script>
      <?php
  }else{
      echo "<script>alert('FILED UPDATE')</script>";
  }

}
?>
<div class="margin_box">
  <div class="smooth-box box-body" style="width: 50%; padding: 10px;">
    <div class="box-margin">

      <div id="content">
      <!-- Page title -->
        <div class="page-title">
          <h5><i class="fa fa-desktop"></i> Edit Sub Kriteria</h5>
        </div>

        <div class="panel panel-default">
          <!-- Content -->
          <form class="form-horizontal" action="" method="post" role="form">
            <div class="panel panel-default">
              <div class="panel-heading"><h6 class="panel-title">SUB Kriteria</h6></div>
              <div class="panel-body">

              <div class="form-group">
                  <label class="col-sm-2 control-label text-right">ID SUB Kriteria:</label>
                  <div class="col-sm-10">
                    <input type="text" name="id_krt" value="<?php echo $kode; ?>" class="form-control" disabled required>
                  </div>
                </div>
                <?php
                $edt_query = mysql_query("SELECT * FROM sub_kriteria WHERE kode_sub_krt='$kode'");
                while ($dataku = mysql_fetch_array($edt_query)){
                ?>
                <div class="form-group">
                  <label class="col-sm-2 control-label text-right">Nama Sub Kriteria:</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_sub_krt" value="<?php echo $dataku['nama_sub_krt']; ?>" required class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label text-right">Kriteria:</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="id_krt">
                      <?php
                      /*Select Option Load Data*/
                      $result = mysql_query("SELECT kode_krt, nama_kriteria FROM kriteria");
                      while ($ambil = mysql_fetch_array($result)) {
                        # code...
                        echo "<option value='".$ambil['kode_krt']."'>".$ambil['nama_kriteria']."</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label text-right">Nilai Sub Kriteria:</label>
                  <div class="col-sm-10">
                    <input type="text" name="nilai_sub_krt" value="<?php echo $dataku['nilai_sub_krt']; ?>" required class="form-control">
                  </div>
                </div>

                <?php } ?>
                <div class="form-action text-right">
                  <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
                  <input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()" class="btn btn-default">
                </div>

              </div>
            </div>
          </form>
          <!-- End Content -->
        </div>
      </div>

    </div>
  </div>
</div>
<?php require_once 'body/footer.php'; ?>
