<?php
    $email = "";
    $password = "";
    $error = array();
    //DBの情報
    require_once 'logdbconnect.php';
    $class = new logDBConnect();
    // echo $_POST['email']."<br>";
    $a = $class->getUsermail($_POST['email']);
    // var_dump($a);

        $error['mail'] = '';
        $error['password'] = '';

        //POST判定
        if(!empty($_POST)){
            $mail = $_POST['email'];
            $pass = $_POST['password'];

            //空白チェック
            if ($mail == '') {
                $error['mail'] = 'メールアドレスが未入力です。';
            }
              //メールアドレス形式チェック

              //パスワード空白チェック
            if ($pass == '') {
                $error['password'] = 'パスワードが未入力です。';
            }
            //
            if($error['mail'] == "" && $error['password'] == "" ){
                foreach($a as $row){
                    if($_POST['email'] == $row['mailaddress']){
                        $data = $row['pass_word'];
                    }
                }
                if (isset($data) && password_verify($pass, $data)) {
                    // 認証成功
                    $_SESSION['mailaddress'] = $mail; // Store the email address in the session
                    // マイページへ遷移
                    header('Location: Main.php', true, 307);
                    exit;
                } else {
                    $error['mail'] = 'eメールアドレスまたはパスワードが違います'.$_POST['email'].$data."です";
                }
                //if($data == $pass){
                    //セッションにemailアドレスを挿入する
                    //$_SESSION['mailaddress'] = $email;
                    //マイページへ遷移
                    //header('Location:Main.php');
                    //exit;
                //}else{
                    //$error['mail'] = 'eメールアドレスまたはパスワードが違います';
                //}
            }
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/style2.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width,initial-scale=1"/>
		<meta charset="UTF-8">
    </head>
    <body>
<form action="" method="post">
        <!--テキストボックス-->
        <div class="Main">
			<div class="a1">
			<img src="/team2/game.png" width="490" height="570" >
		</div>

	<div class="a2">
        	<div class="gamelabel">
			<h1>GAMEコミュニティ</h1>
		</div>
            <div class="flexbox">
              <input type='email' name='email' placeholder="メールアドレス" >
            <input type='password' name='password' placeholder="パスワード">
        </div>
        <div class="err"><?php echo $error['mail']; ?></div>
        <div class="err"><?php echo $error['password']; ?></div>
        <div class="logbtn">
	    
            <!--ログインボタン-->
        <div class="button-panel">
  <div class="button-container"> <!-- 新たに追加したdiv要素 -->
    <button class="btn btn-secondary" type="submit">ログイン</button>
    <a class="text-dark" href="/team2/entry.php">新規登録はこちら</a>
  </div>
</div>
        
        </div>
    </div>
</form>
</html>