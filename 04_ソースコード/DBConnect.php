<?php
    class DBConnect{
        public function dbConnect(){
            $pdo = new PDO('mysql:host=mysql207.phy.lolipop.lan;dbname=LAA1417856-communicatio','LAA1417856','communicatio');
            return $pdo;
        }
        public function getUsermail($getmail){
            $pdo = $this->dbConnect();
    
            $sql = "SELECT * FROM user_tbl WHERE mail = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$getmail,PDO::PARAM_INT);
            $ps->execute();
    
            $a = $ps->fetchAll();
            return $a;
    
        }
    }
?>