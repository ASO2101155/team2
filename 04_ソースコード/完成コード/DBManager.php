<?php
class DBManager{
    public function dbConnect(){
        $pdo = new PDO('mysql:host=mysql214.phy.lolipop.lan;dbname=LAA1417842-communicatio','LAA1417842','communicatio');
        // $pdo = new PDO('mysql:host=localhost;dbname=LAA1417856-communicatio','webuser','abccsd2');
        //$pdo = new PDO('mysql:host=localhost;dbname=webdb','webuser','abccsd2');
        // $pdo = new PDO('mysql:host=localhost;dbname=LAA1417856-communicatio','webuser','abccsd2');
        return $pdo;
    }
    public function getUserTblByIdAndName($mail, $pass){
        $pdo = $this -> dbConnect();
        $sql = "SELECT * FROM User_information WHERE mailaddress = :MAIL AND pass_word = :PASS";
        $ps = $pdo -> prepare($sql);
        $ps -> bindValue(':MAIL', $mail, PDO::PARAM_STR);
        $ps -> bindValue(':PASS', $pass, PDO::PARAM_STR);
        $ps -> execute();
        $searchArray = $ps -> fetchAll();
        return $searchArray;
    }
    // user_informationテーブルの指定したユーザーIDのuser_img列を更新するメソッド
    public function updateUserImgById($user_id, $user_img){
        $pdo = $this -> dbConnect();
        $sql = "UPDATE User_information SET user_img = :USER_IMG WHERE user_id = :USER_ID";
        $ps = $pdo -> prepare($sql);
        $ps -> bindValue(':USER_IMG', $user_img, PDO::PARAM_STR);
        $ps -> bindValue(':USER_ID', $user_id, PDO::PARAM_STR);
        $rt = $ps -> execute();
        return $rt;
    }
    // user_informationテーブルの指定したユーザーIDのuser_name列を更新するメソッド
    public function updateUserNameById($user_id, $user_name){
        $pdo = $this -> dbConnect();
        $sql = "UPDATE User_information SET user_name = :USER_NAME WHERE user_id = :USER_ID";
        $ps = $pdo -> prepare($sql);
        $ps -> bindValue(':USER_NAME', $user_name, PDO::PARAM_STR);
        $ps -> bindValue(':USER_ID', $user_id, PDO::PARAM_STR);
        $rt = $ps -> execute();
        return $rt;
    }
}
?>