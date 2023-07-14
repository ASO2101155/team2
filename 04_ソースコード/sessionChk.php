<?php
class Session{
    public function SessionSet($email,$password){
//        if(session_status() == PHP_SESSION_NONE){ session_start();}
//        $_SESSION['email'] = $email;
//        $_SESSION['password'] = $password;
$pdo = new PDO('mysql:host=mysql214.phy.lolipop.lan;dbname=LAA1417856-communicatio','LAA1417856','communicatio');
        $sql = "UPDATE sample SET data = 2";	
        $ps = $pdo->prepare($sql);
        $ps->execute();
        $searchArray = $ps->fetchAll();
        foreach ($searchArray as $row){
            if(isset($row['data'])){
                $data = $row['data'];
            }
        }
    }
}
?>
