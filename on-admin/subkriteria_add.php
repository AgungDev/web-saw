<?php require_once 'body/header.php'; ?>
<!-- Modal Create -->
<div class="margin_box">
  <div class="smooth-box box-body" style="width: 50%;">
    <div class="box-margin">

      <!-- Body Modal -->
      <div id="content">
      <!-- Page title -->
        <div class="page-title">
          <h5><i class="fa fa-desktop"></i> Tambah Sub Kriteria</h5>
        </div>
        <!-- /page title -->

        <!-- Hover rows datatable inside panel -->
        <div class="panel panel-default">
          <!-- Content -->
              <form class="form-horizontal" action="" method="post" role="form">
                <div class="panel panel-default">
                  <div class="panel-heading"><h6 class="panel-title">Kriteria</h6></div>
                  <div class="panel-body">

                    <div class="form-group">
                      <label class="col-sm-2 control-label text-right">Nama Sub Kriteria:</label>
                      <div class="col-sm-10">
                        <input type="text" name="nama_sub_krt" placeholder="Names" required class="form-control">
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
                        <input type="number" name="nilai_sub_krt" placeholder="Nilai" required class="form-control">
                      </div>
                    </div>

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


<?php
if (isset($_POST['create'])) {

  $namakriteria  = $_POST['nama_sub_krt'];
  $krt           = $_POST['id_krt'];
  $nilai         = $_POST['nilai_sub_krt'];

  if (($namakriteria || $krt) && $nilai != "" ){

    $sql="INSERT INTO sub_kriteria values ('','$krt','$namakriteria','$nilai')";

    $query = mysql_query($sql) or die(mysql_error());
    if ($query) {
    echo "<script>window.alert('Sub Kriteria berhasil ditambah');
        window.location=(href='subkriteria.php')</script>";
    }
  }else {
    echo "<script>window.alert('Ada Yang Kosong!!')</script>";
  }
}
?>
<?php require_once 'body/footer.php'; ?>