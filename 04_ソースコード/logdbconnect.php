<?php
class DBconnect{
    public function ConnectDB($email,$password){
		$pdo = new PDO('mysql:host=mysql214.phy.lolipop.lan;dbname=LAA1417842-communicatio','LAA1417842','communicatio');
	$sql = "SELECT * FROM user_id where user_name = ?";
	$ps = $pdo->prepare($sql);
	$ps->bindValue(1,$email,PDO::PARAM_STR);
        $ps->execute();
        $searchArray = $ps->fetchAll();
        return $searchArray;
    }
    public function insertHash($mail,$pass){
		session_start();
        $pdo = new PDO('mysql:host=mysql214.phy.lolipop.lan;dbname=LAA1417842-communicatio','LAA1417842','communicatio');
        $sql = "INSERT INTO user_data(user_data_id,user_name,password) values(?,?,?)";
        $ps = $pdo->prepare($sql);
	$rand = mt_rand(1, 999);
	$ps->bindValue(1,$rand,PDO::PARAM_STR);
        $ps->bindValue(2,$mail,PDO::PARAM_STR);
        $ps->bindValue(3,password_hash($pass,PASSWORD_DEFAULT),PDO::PARAM_STR);
        $ps->execute();
	
		$_SESSION['email'] = $mail;
        $_SESSION['password'] = $pass;
	
    }
	 public function sessionSearch(){
		$pdo = new PDO('mysql:host=mysql214.phy.lolipop.lan;dbname=LAA1417842-communicatio','LAA1417842','communicatio');
		$sql = "INSERT INTO sample(id,data) values(1,2)";	
		$ps = $pdo->prepare($sql);
		$ps->execute();
	 }
	  
}
class logDBConnect{
	public function dbConnect(){
		$pdo = new PDO('mysql:host=mysql214.phy.lolipop.lan;dbname=LAA1417842-communicatio','LAA1417842','communicatio');
		return $pdo;
	}
	public function getUsermail($getmail){
		$pdo = $this->dbConnect();

		$sql = "SELECT * FROM User_information WHERE mailaddress = ?";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(1,$getmail,PDO::PARAM_STR);
		$ps->execute();

		$a = $ps->fetchAll();
		return $a;

	}
}

?>
