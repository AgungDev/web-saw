<?php require_once '../services/config.php'; ?>
<?php
if (isset($_POST['parmDel'])) {
	# code...
	$gets = implode(",", $_POST['parmDel']);
	//	print_r($gets);
	?>
	<br>
	<div>
		<p><a href="deldel.php?deleted=<?php echo(base64_encode($gets)); ?>" class="dlt_btn_sm">Deleted Items Selected ??</a></p>
	</div>
	<br>
	<?php
}
?>