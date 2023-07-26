<?php
// アップロードされたファイルの送信チェック
if(!isset($_FILES['icon_image']['error']) ||
 !is_int($_FILES['icon_image']['error'])){
    echo 'パラメータが不正です';
    exit();
}

session_start();

// アップロードされたファイル名を取得
$filename = $_FILES['icon_image']['name'];

// ユーザーIDを取得
$userid = $_POST["userid"];
// ユーザー名を取得
$username = $_POST["username"];

// ファイル名を使用して保存先のパスを指定
$filepathname = './upload/'.$username.'/'.$filename;
$_SESSION['user_img'] = $filepathname;

// フォルダが存在しない場合は作成する
if(!file_exists('./upload/'.$username)){
    mkdir('./upload/'.$username, 0777, true);
}

// ファイルを指定したパスへ保存
if(move_uploaded_file($_FILES['icon_image']['tmp_name'], $filepathname)){
    // 'アップロード完了';
    // データベースにファイル名を保存
    // DBManeger.phpを読み込む
    require_once __DIR__ . '/DBManager.php';
    // DBManagerクラスのインスタンスを生成
    $dbm = new DBManager();
    // データベースにファイル名を保存
    $rt = $dbm -> updateUserImgById($userid, $filepathname);
    if($rt<=0){
        // 更新失敗
    }

}else{
    // 'アップロード失敗';
    // エラーメッセージを設定

}

// profile.phpへ307でリダイレクト
header('Location: profile.php', true, 307);
exit; // ヘッダーのリダイレクト後に実行されないようにする

?>