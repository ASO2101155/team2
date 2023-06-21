<?php 
session_start();
require_once 'shinkitourokuDBmanager.php';
$cls = new DBManager();
if($_POST['create']){
$cls->InsertUserTbl($_POST['user_id'],$_POST['user_name'],$_POST['mailaddress'],$_POST['password']);
header('Location:../html/Main.html');
      exit;
}
?>