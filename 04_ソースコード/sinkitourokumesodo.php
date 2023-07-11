<?php
// DBManagerクラスの読み込み
require_once 'DBManager.php';

// ユーザー情報を取得
$user_id = 1;
$user_name = "John Doe";
$mailaddress = "johndoe@example.com";
$password = "password123";
$user_img = "user.jpg";

// DBManagerのインスタンスを作成
$dbManager = new DBManager();

// ユーザーを新規登録
$insertedUserId = $dbManager->addUser($user_id, $user_name, $mailaddress, $password, $user_img);

// ユーザーの新規登録が成功したかどうかをチェック
if ($insertedUserId !== false) {
    echo "ユーザーの新規登録が成功しました。新しいユーザーID: " . $insertedUserId;
} else {
    echo "ユーザーの新規登録に失敗しました。";
}
?>







