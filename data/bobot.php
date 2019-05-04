<?php

//require_once '../services/config.php';

class Bobot{

	function getSisa($table, $atribut){
		$q = mysql_query("SELECT SUM($atribut) FROM $table");
		$a = mysql_fetch_array($q);
		return 100-$a[0];
	}

	function getTerpakai($table, $atribut){
		$q = mysql_query("SELECT SUM($atribut) FROM $table");
		$a = mysql_fetch_array($q);
		return $a[0];
	}
}

?>