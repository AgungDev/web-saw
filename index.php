

<!-- INDEX PANEL -->

<?php error_reporting(0); ?>
<?php require_once 'data/gzCryp.php'; ?>
<?php require_once 'data/function.php'; ?>
<?php require_once 'body/header.html'; ?>
<?php require_once 'services/config.php'; ?>
<?php require_once 'item/nav_index.html'; ?>

<?php 

$Func = new MyFunction();

 ?>

	<?php 		
	switch (($_GET['is'])) {
		case URL_(1):
			# code...
			include "contents/home.php";
			break;

		case URL_(10):
			# code...
			include "contents/login.php";
			break;

		case null:
			# code...
			include "contents/home.php";
			break;

		default:
			# code...
			include "contents/empaty.php";
			break;
	}

	?>

<?php require_once 'body/footer.html'; ?>