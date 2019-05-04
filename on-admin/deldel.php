<?php require_once '../services/config.php'; 

if ($_GET['deleted']) {
	# code...
	$ambil = base64_decode($_GET['deleted']);

	$query1 = mysql_query("DELETE FROM sub_kriteria WHERE kode_sub_krt IN ($ambil)");
	if ($query1) {
		# code...
		echo "<script>alert('berhasil terhapus');</script>";
		sleep(1);
	    ?>
	    <script type="text/javascript">
	    	window.alert('Sub Kriteria berhasil Dihapus');
	      	window.location=(href='subkriteria.php');
	    </script>
	    <?php
	}else{
		echo "<script>alert('gagal menghapus');</script>";
	}

}



?>