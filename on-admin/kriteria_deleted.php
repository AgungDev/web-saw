<?php require_once 'body/header.php'; ?>

<div class="margin_box">
	<div class="smooth-box box-body" style="width: 25%; padding: 10px;">
		<div class="box-margin">
		    <h3 style="text-align: center; font-weight: bold;">DELETED KRITERIA</h3>
		    <form method="post">
		        <!-- Body Modal -->
		        <?php
		        $kode = base64_decode($_GET['hps_krt']);
		        ?>
		        <center>
		        	Are you sure delated data where NAMES
		        	<?php
		        	$del_name = mysql_query("SELECT nama_kriteria FROM kriteria WHERE kode_krt='$kode'");
		        	$ini = mysql_fetch_assoc($del_name);
		        	?>
		        	<input style="width: 70%; text-align: center;" type="text" class="form-control" 
		        		name="edt_id" value="<?php echo $ini['nama_kriteria']; ?>"  disabled required>
		        	<br>
		        	<input type="submit" value="Sure" class="btn btn-danger" name="smp_hps" />
        			<a onclick="goBack()" class="btn btn-primary">Close</a>
		        </center>
		    </form>
		    <script type="text/javascript">
		        function goBack(){
		          window.history.back();
		        }
		    </script>
		</div>
	</div>
</div>

<?php

if (isset($_POST['smp_hps'])) {
  # code...

	$Dlqq = "DELETE FROM kriteria WHERE kode_krt='$kode' LIMIT 1";
	$delated_kriteria = mysql_query($Dlqq);

	if ($delated_kriteria) {
	  	# code...
		sleep(1);
	    ?>
	    <script type="text/javascript">
	    	window.alert('Kriteria berhasil Dihapus');
	      	window.location=(href='kriteria.php');
	    </script>
	    <?php
	}else{
	    echo "<script>alert('Gagal');window.location=(href='kriteria.php');</script>";
	}

}

?>

<?php require_once 'body/footer.php'; ?>