<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=webdb','webuser','abccsd2');
}   catch (PDOException $e) {
    echo "データベース接続エラー　：".$e->getMessage();
}
?>