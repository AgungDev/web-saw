<?php 


function URL_($string){
	$a = str_rot13($string);
	/*NOTE CONVERT TO STRING*/

	return md5($a);
}



 ?>