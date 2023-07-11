<?php
class DBManager{
        public function dbConnect(){
          //$pdo = new PDO('mysql:host=mysql214.phy.lolipop.lan;dbname=LAA1417856-communicatio','LAA1417856','20232');
            // $pdo = new PDO('mysql:host=localhost;dbname=LAA1417856-communicatio','webuser','abccsd2');
            $pdo = new PDO('mysql:host=localhost;dbname=webdb','webuser','abccsd2');
            // $pdo = new PDO('mysql:host=localhost;dbname=LAA1417856-communicatio','webuser','abccsd2');
            return $pdo;
        }
    public function getUserTblByIdAndName($mail, $pass){
        $pdo = $this -> dbConnect();
        $sql = "SELECT * FROM user_information WHERE mailaddress = :MAIL AND pass_word = :PASS";
        $ps = $pdo -> prepare($sql);
        $ps -> bindValue(':MAIL', $mail, PDO::PARAM_STR);
        $ps -> bindValue(':PASS', $pass, PDO::PARAM_STR);
        $ps -> execute();
        $searchArray = $ps -> fetchAll();
        return $searchArray;
    }
}
?>