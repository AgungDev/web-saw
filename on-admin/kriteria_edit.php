<?php require_once 'body/header.php'; ?>
<!-- Modal Create -->
<?php
$dataSource = new DataArray;
$func = new MyFunction;
$bbt = new Bobot;
$kode = base64_decode($_GET['edt_krt']);
?>
<?php
if (isset($_POST['ubah'])) {
  # code...
  $nm = $_POST['nama_krt'];
  $at = $_POST['atribut_krt'];
  $bb = $_POST['bobot_krt'];

  if ($at == "" || $bb == "0"){
    echo "<script>alert('FILED UPDATE')</script>";
  }else {
    sleep(1);
    $Edqq = "UPDATE kriteria SET nama_kriteria='$nm', atribut='$at', bobot='$bb' WHERE kode_krt='$kode' LIMIT 1";
    $edit_kriteria = mysql_query($Edqq)or die(mysql_error());
    echo "<script>window.alert('UPDATE SUCCES');window.location=(href='kriteria.php');</script>";
  }
  /*echo "Nama :".$nm."\nAtribut :".$at."\nBobot :".$bb."\nID :".$kode;*/

}
?>
<div class="margin_box">
  <div class="smooth-box box-body" style="width: 50%; padding: 10px;">
    <div class="box-margin">
      
    <div id="content">
    <!-- Page title -->
      <div class="page-title">
        <h5><i class="fa fa-desktop"></i> Tambah Kriteria</h5>
      </div>

      <div class="panel panel-default">
        <!-- Content -->
        <form class="form-horizontal" action="" method="post" role="form">
          <div class="panel panel-default">
            <div class="panel-heading"><h6 class="panel-title">Kriteria</h6></div>
            <div class="panel-body">

            <div class="form-group">
                <label class="col-sm-2 control-label text-right">ID Kriteria:</label>
                <div class="col-sm-10">
                  <input type="text" name="id_krt" value="<?php echo $kode; ?>" class="form-control" disabled required>
                </div>
              </div>
              <?php
              $edt_query = mysql_query("SELECT * FROM kriteria WHERE kode_krt='$kode'");
              while ($dataku = mysql_fetch_array($edt_query)){
              ?>
              <div class="form-group">
                <label class="col-sm-2 control-label text-right">Nama Kriteria:</label>
                <div class="col-sm-10">
                  <input type="text" name="nama_krt" value="<?php echo $dataku['nama_kriteria']; ?>" required class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label text-right">Atribut:</label>
                <div class="col-sm-10">
                  <select name="atribut_krt" class="form-control">
                    <option value="<?php echo $func->CAC($dataSource->ATRIBUT,'KEY::OUT::ONE',$dataku['atribut']); ?>">
                      <?php echo $func->CAC($dataSource->ATRIBUT,'VALUE::OUT::ONE',$dataku['atribut']); ?>
                    </option>
                    <option value="1">Benefit</option>
                    <option value="2">Cost</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label text-right">Bobot:</label>
                <div class="col-sm-8">
                  <input id="bobot" type='number' class="form-control" name="bobot_krt" value="<?php echo $dataku['bobot']; ?>">
                </div>
                <div class="col-sm-1" style=" margin-top: 5px; ">
                  <?php $ini = $bbt->getSisa('kriteria', 'bobot')+$dataku['bobot'];?>
                  <code style="font-size: 20px;"><= <?php echo $ini;?>%</code>
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

<script>
$('#bobot').keyup(function(){
  var cek = Number("<?php echo $ini;?>");
  if ($(this).val() > cek){
    alert("Maximal Bobot Tersisa Kurang Dari "+(cek+1));
    $(this).val(cek);
  }
});
</script>

<?php require_once 'body/footer.php'; ?>
