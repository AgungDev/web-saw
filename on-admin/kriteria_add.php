<?php 
require_once 'body/header.php';
$bbt = new Bobot;
 ?>
<!-- Modal Create -->

<div class="margin_box">
  <div class="smooth-box box-body" style="width: 50%;">
    <div class="box-margin">
      
		<div id="content">
		<!-- Page title -->
			<div class="page-title">
				<h5><i class="fa fa-desktop"></i> Tambah Kriteria</h5>
			</div>
			<!-- /page title -->

			<!-- Hover rows datatable inside panel -->
			<div class="panel panel-default">
				<!-- Content -->
		        <form class="form-horizontal" action="kriteria_add.php" method="post" role="form">
		          <div class="panel panel-default">
		            <div class="panel-heading"><h6 class="panel-title">Kriteria</h6></div>
		            <div class="panel-body">

		              <div class="form-group">
		                <label class="col-sm-2 control-label text-right">Nama Kriteria:</label>
		                <div class="col-sm-10">
		                  <input type="text" name="nama_krt" placeholder="Names" required class="form-control">
		                </div>
		              </div>

		              <div class="form-group">
		                <label class="col-sm-2 control-label text-right">Atribut:</label>
		                <div class="col-sm-10">
		                  <select name="atribut_krt" class="form-control">
		                    <option value="">- Select Option -</option>
		                    <option value="1">Benefit</option>
		                    <option value="2">Cost</option>
		                  </select>
		                </div>
		              </div>

		              <div class="form-group">
		                <label class="col-sm-2 control-label text-right"> Bobot:</label>
		                <div class="col-sm-8">
		                  <input id="bobot" type='number' class="form-control" name="bobot_krt" placeholder="Bobot">
		                </div>
		                <div class="col-sm-1" style=" margin-top: 5px;">
		                  <code style="font-size: 20px;"><= <?php echo $bbt->getSisa('kriteria', 'bobot');?>%</code>
		                </div>
		              </div>

		              <div class="form-action text-right">
		                <input type="submit" name="create" value="Buat Kriteria" class="btn btn-primary">
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
<script>
$('#bobot').keyup(function(){
	var cek = Number("<?php echo $bbt->getSisa('kriteria', 'bobot');?>");
	if ($(this).val() > cek || $(this).val() <= 0){
	  alert("Maximal Bobot Tersisa Kurang Dari "+(cek+1)+" Dan tak Boleh Kurang dari 1");
	  $(this).val(cek);
	}
});
</script>
<?php
if (isset($_POST['create'])) {

	$namakriteria	= $_POST['nama_krt'];
	$atribut 		= $_POST['atribut_krt'];
	$bobot 			= $_POST['bobot_krt'];

	if ($atribut == "" || $bobot == "0"){
		echo "<script>window.alert('Ada Yang Kosong!!')</script>";
	}else {
		$sql="INSERT INTO kriteria values ('','$namakriteria','$atribut','$bobot')";

		$query = mysql_query($sql) or die(mysql_error());
		if ($query) {
		echo "<script>window.alert('Kriteria berhasil ditambah');
				window.location=(href='kriteria.php')</script>";
		}
	}
}
?>
<?php require_once 'body/footer.php'; ?>