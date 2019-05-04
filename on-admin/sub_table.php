<?php require_once '../services/config.php'; ?>
<?php 
if (isset($_POST['id'])) {
  # code...
  $id = $_POST['id'];
?>
<div class="datatable">
  <center><div class="del-sel"></div></center>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Sub Kriteria</th>
        <th scope="col">Nilai</th>
        <th scope="col">Action</th>
        <th style="text-align: center;"><input type="checkbox" class="foo"></th>
      </tr>
    </thead>
    <tbody>
    	<?php
  	$nomor = 0;
  	$q = mysql_query("SELECT * FROM sub_kriteria WHERE kode_krt='$id' ");
  	while ($get = mysql_fetch_array($q)) {
  	?>
      <tr>
        <td><?php echo $nomor=$nomor+1;?></td>
        <td><?php echo $get['nama_sub_krt']; ?></td>
        <td><?php echo $get['nilai_sub_krt']; ?></td>
        <td>
          <a href="subkriteria_edit.php?edt_krt=<?php echo base64_encode($get['kode_sub_krt']); ?>">
          <i class='fa fa-edit'></i></a> 
          <a href="subkriteria_deleted.php?hps_krt=<?php echo base64_encode($get['kode_sub_krt']); ?>">
          <i class='fa fa-eraser'></i>
          </a>
        </td>
        <td style="text-align: center;"><input type="checkbox" name="foo" class="ss" value="<?php echo $get['kode_sub_krt']; ?>"></td>
      </tr>
  	<?php } ?>
    </tbody>
  </table>

</div> 
<?php
}
?>

<script type="text/javascript">

  function getsDel(){
    var getVal = [];
      $('.ss:checked').each(function(){
        getVal.push($(this).val());
      });

      //Parms Data To delsel.php
      $.ajax({
        url: "delsel.php",
        method: "POST",
        data: {parmDel:getVal},
        success:function(data){
          $('.del-sel').html(data);
        }
      });
  }

  $(document).ready(function(){

    //if head attr cheked
    $('.foo').click(function(){
      //code
      $('.ss:checkbox').prop('checked',this.checked);
      getsDel();
    });

    //if some attr checked
    $('.ss').click(function(){
      getsDel();
    });


  });
</script>