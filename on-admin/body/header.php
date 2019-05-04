<?php require_once '../services/config.php'; ?>
<?php require_once '../data/ArrayValue.php'; ?>
<?php require_once '../data/function.php'; ?>
<?php require_once '../data/bobot.php'; ?>
<?php require_once '../services/check_auth.php'; ?>
<?php cek_session_after_login('user_login'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Pages</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../themes/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="../themes/bootstrapGz.css"> -->
	<link rel="stylesheet" type="text/css" href="../themes/fonts/files.css">


	<link rel="stylesheet" type="text/css" href="../themes/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../themes/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../themes/font.css">
	
	<script type="text/javascript" src="../script/script.js"></script>
	<script type="text/javascript" src="../script/jquery.min.js"></script>
	<script type="text/javascript" src="../script/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../script/bootstrap.min.js"></script>

	
	
</head>
<body>
	<?php require_once '../item/nav_admin.html'; ?>