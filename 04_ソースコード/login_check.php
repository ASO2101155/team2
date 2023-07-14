<?php
	session_start();
	require_once __DIR__ . '/sessionChk.php';
    	$sessionchk = new Session();
    	$email = $_POST['email'];
    	$password = $_POST['password'];
    	$sessionchk->SessionSet($email,$password);
	$_SESSION['email'] = $email;
        echo $_SESSION['email'];
	

	require_once __DIR__ . '/dbconnect.php';
	$dbconnect = new DBconnect();
	$searchArray = $dbconnect->ConnectDB($_SESSION['email'],$_SESSION['password']);
	foreach($searchArray as $row){
		if(password_verify( $_SESSION['password'],$row['password'])){
				header("http://cold-aso-3944.vivian.jp/communication/mein.php");
				$_POST['email'] = $email;
				$_POST['password'] = $password;
		}else{
			echo "login miss";
			echo $_POST['email'];
			echo $_POST['password'];
		}
	}
	require_once __DIR__ . '/dbconnect.php';
	$search = new DBconnect();
	$Array = $search->sessionSearch();

?>