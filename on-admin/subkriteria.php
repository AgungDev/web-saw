<?php require_once 'body/header.php'; ?>
<?php 
/*$dataSource = new DataArray;
$func = new MyFunction;*/
?>

<div class="margin_box">
	<div class="smooth-box box-body">
		<div class="box-margin">

      <div id="content">
      <!-- Page title -->
        <div class="page-title">
          <h5><i class="fa fa-desktop"></i> SUB Kriteria</h5>
        </div>
        <!-- /page title -->

        <!-- Hover rows datatable inside panel -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <select class="form-control" name="chg_skrt" id="chg_skrt">
              <option>-- Select Option --</option>
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
          <div class="panel-heading" align="right">
            <a href="subkriteria_add.php">
              <input type="submit" value="Tambah Kriteria" class="btn btn-info">
            </a>
          </div>
          <div id="viw" name="viw">
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<?php require_once 'body/footer.php'; ?>

<script>
$(document).ready(function(){
  $('#chg_skrt').change(function(){
    var id = $(this).val();
    var post_id = 'id='+id;
    $.ajax({
      url:"sub_table.php",
      type: "POST",
      data: post_id,
      cache: false,
      success:function(data){
        $('#viw').html(data);
      }

    });
  });
});

</script>