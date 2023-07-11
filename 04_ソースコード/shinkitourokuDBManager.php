<?php
class DBManager{
        public function dbConnect(){
            $pdo = new PDO('mysql:host=mysql214.phy.lolipop.lan;dbname=LAA1417856-communicatio',
            'LAA1417856','20232');
            return $pdo;
        }
    public function getUserTblByIdAndPass($id,$username,$mail,$pass){
        $pdo = $this -> dbConnect();
        $sql = "SELECT * FROM User_information WHERE id = ? AND username = ? AND mail = ? AND pass = ?";
        $ps = $pdo -> prepare($sql);
        $ps -> bindValue(1,$id,PDO::PARAM_INT);
        $ps -> bindValue(2,$username,PDO::PARAM_STR);
        $ps -> bindValue(3,$mail,PDO::PARAM_STR);
        $ps -> bindValue(4,$pass,PDO::PARAM_STR);
        $ps -> execute();
        $searchArray = $ps -> fetchAll();
        return $searchArray;
    }
    public function addUser($user_id, $user_name, $mailaddress, $password, $user_img) {
        $pdo = $this->dbConnect();
        $sql = "INSERT INTO User_information (user_id, user_name, mailaddress, password, user_img) VALUES (?, ?, ?, ?, ?)";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $user_id, PDO::PARAM_INT);
        $ps->bindValue(2, $user_name, PDO::PARAM_STR);
        $ps->bindValue(3, $mailaddress, PDO::PARAM_STR);
        $ps->bindValue(4, $password, PDO::PARAM_STR);
        $ps->bindValue(5, $user_img, PDO::PARAM_STR);
        $ps->execute();
        return $pdo->lastInsertId();
    }
}
?>
