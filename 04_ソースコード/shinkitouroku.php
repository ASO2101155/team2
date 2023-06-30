<?php
// エラーメッセージ
$err = [];

// バリデーション
if(!$username = filter_input(INPUT_POST, 'username')){
    $err['name'] = 'このユーザ名は既に使用されています。';
}

if(!$email = filter_input(INPUT_POST, 'email')){
    $err['mail'] = 'メールの形式が間違っています。';
}

$password = filter_input(INPUT_POST, 'password');
// 正規表現
if(!preg_match("/\A[a-z\d]{6,16}+\z/i", $password)){
    $err['pass'] = 'パスワードは６文字から１６文字以下の形式です。
';
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>新規登録画面</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/shinkitouroku.css">
</head>
<body>
  <div class="container">
    <fieldset>
    <h2>新規登録</h2><br>
    <form action="shinkitourokuerr.php" method="POST">
    <a href="signup_form.php">戻る</a>
      <div class="form-group">
        <label for="username" class="col-form-label">　　ユーザー名：</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <p><?php if (array_key_exists('name', $err)) {echo $err['name']; }?></p>
      <div class="form-group">
        <label for="email" class="col-form-label">メールアドレス：</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <p><?php if (array_key_exists('mail', $err)) {echo $err['mail']; }?></p>
      <div class="form-group">
        <label for="password" class="col-form-label">　　パスワード：</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <p><?php if (array_key_exists('pass', $err)) {echo $err['pass']; }?></p>
      </fieldset>
      <button type="submit" class="btn btn-primary">登録</button>
    </form>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>