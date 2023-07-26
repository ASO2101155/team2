<?php
  require_once 'DBManager.php';

  $dbm=new DBManager();
  
  session_start();
  // $_POST["mail"] = $_SESSION['mailaddress'];
  // $_POST["pass"] = $_SESSION['password'];

  // $userList = $dbm->getUserTblByIdAndName($_POST["mail"],$_POST["pass"]);
  // $userList = $dbm->getUserTblByIdAndName("2101195@s.asojuku.ac.jp", "0325");
  // var_dump($userList);
  // $userList= array_values($userList);
  // $username = $userList[0]["user_name"];
  // $userimg = $userList[0]["user_img"];
  // $mailaddress = $_SESSION["mailaddress"];
  $userid = $_SESSION["user_id"];
  $username = $_SESSION["user_name"];
  $userimg = $_SESSION["user_img"];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>プロフィール</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/profile.css">
</head>
<body>
 <a class="modoru2" href="javascript:history.back()">

  <img src="./yajirushi-illust6.png" alt="戻る" / width=30px>
</a>
  <div class="container">

    <div>
      <form action="fileUpload.php" method="post" enctype="multipart/form-data">
        <img class="profile-image rounded-circle" src="<?=$userimg;?>" alt="プロフィール画像">
        <div>
          <span class="edit-button" onclick="editImage()">画像を変更</span>
          <input type="file" id="image-input" name="icon_image" class="edit-input">
          <input type="hidden" name="userid" value="<?=$userid;?>" class="edit-input">
          <input type="hidden" name="username" value="<?=$username;?>" class="edit-input">
          <input type="submit" value="ファイルをアップロード">
        </div>
      </form>
    </div>
    <div class="profile-info">
      <div class="name-container">
        <h2 id="name" name="username"><?php echo $username ?></h2>
        <span class="edit-button edit-name-button" onclick="editName()"><img src="pen.png"></span>
      </div>
      <div>
        <input type="text" id="name-input" class="edit-input">
      </div>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>

    function editImage() {
      var imageInput = document.getElementById('image-input');
      imageInput.click();
    }
function editName() {
  var nameElement = document.getElementById('name');
  var nameInput = document.getElementById('name-input');

  if (nameElement.style.display === 'none') {
    // 名前の編集モードを終了
    nameElement.style.display = 'block';
    nameInput.style.display = 'none';
    nameElement.textContent = nameInput.value;
  } else {
    // 名前の編集モードを開始
    nameElement.style.display = 'none';
    nameInput.style.display = 'block';
    nameInput.value = nameElement.textContent.trim();
    nameInput.focus();
  }
}
  </script>
</body>
</html>