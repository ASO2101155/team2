<?php
class DBconnect{
    public function ConnectDB($email,$password){
		$pdo = new PDO('mysql:host=mysql207.phy.lolipop.lan;dbname=LAA1417856-communication','LAA1417856','communication');
	$sql = "SELECT * FROM user_data where user_name = ?";
	$ps = $pdo->prepare($sql);
	$ps->bindValue(1,$email,PDO::PARAM_STR);
        $ps->execute();
        $searchArray = $ps->fetchAll();
        return $searchArray;
    }
    public function insertHash($mail,$pass){
		session_start();
        $pdo = new PDO('mysql:host=mysql207.phy.lolipop.lan;dbname=LAA1417856-communication','LAA1417856','communication');
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
    public function outfitSearch($number){
		$pdo = new PDO('mysql:host=mysql214.phy.lolipop.lan;dbname=LAA1417856-communicatio','LAA1417856','communicatio');
		$sql = "SELECT outfit_img FROM ProductListOutfit where outfit_id = ?";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(1,$number,PDO::PARAM_STR);
        	$ps->execute();
        	$searchArray = $ps->fetchAll();
        	return $searchArray;
     }
     public function outfitData($number){
		$pdo = new PDO('mysql:host=mysql214.phy.lolipop.lan;dbname=LAA1417856-communicatio','LAA1417856','communicatio');
		$sql = "SELECT product_data_id,product_name,product_price FROM product_data where outfit_id = ?";	
		$ps = $pdo->prepare($sql);
		$ps->bindValue(1,$number,PDO::PARAM_STR);
        	$ps->execute();
        	$searchArray = $ps->fetchAll();
        	return $searchArray;
     }
	 public function sessionSearch(){
		$pdo = new PDO('mysql:host=mysql214.phy.lolipop.lan;dbname=LAA1417856-communicatio','LAA1417856','communicatio');
		$sql = "INSERT INTO sample(id,data) values(1,2)";	
		$ps = $pdo->prepare($sql);
		$ps->execute();
	 }
	  
}
?>
