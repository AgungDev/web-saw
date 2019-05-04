<?php

function cek_session_before_login($sesi){

	if ( isset($_SESSION[$sesi]) && $_SESSION[$sesi] != '' ) {
	    $halaman = $_SESSION[$sesi];

	    if ($halaman == 1) {
	    	# code...
	    	header('location:on-admin');
	    }elseif ($halaman == 0) {
	    	# code...
	    	header('location:on-member');
	    }
	    exit();

	}
}

function cek_session_after_login($sesi){
	session_start();
	require_once '../data/gzCryp.php';
	if ( $_SESSION[$sesi] == null) {

		//$_POST['error_session'] = true;
		echo "Session Not Ready";
		echo "<meta http-equiv='refresh' content='0;url=../index.php?is=".URL_(10)."'>";
		/*header('location: ../index.php?is='.URL_(10));*/	
	}
}

/*class CheckAuth {
	# code ...

	private $Connect;
	private $Table = "admin";

	public $username;
	public $password;

	public $USER;

	public function __construct($db){
		$this->Connect = $db;
	}

	public function getUser(){return $this->USER;}

	public function Login(){
		# code ...

		$USER = $this->CheckCredentials();
		if ($USER) {
			# code...
			$this->USER = $USER;
			session_start();
			$_SESSION['id'] = $USER['id'];
			$_SESSION['username'] = $USER['username'];
			$_SESSION['email'] = $USER['email'];
			$_SESSION['password'] = $USER['password'];
			$_SESSION['level'] = $USER['level'];

			return $USER['level'];
		} 
		return false;
		
	}

	protected function CheckCredentials(){
		# code ...

		$stmt = $this->Connect->prepare('SELECT * FROM '.$this->Table.' WHERE email=? and password=?');
		$stmt->bindParam(1, $this->username);
		$stmt->bindParam(1, $this->password);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			# code...
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			$submitPass = $this->password;

			if ($submitPass == $data['password']){
				return $data;
			}
		}
		return false;
	}

	# End ...
}*/

?>