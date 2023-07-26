<?php
session_start();
$pdo = new PDO('mysql:host=mysql214.phy.lolipop.lan;dbname=LAA1417842-communicatio','LAA1417842','communicatio');
$sql = "SELECT * FROM User_information WHERE mailaddress = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$_GET['mailaddress'],PDO::PARAM_STR);
            $ps->execute();
            $searchArray = $ps->fetchAll();
	    $user_name=null;
	 $user_id = 0;
		foreach($searchArray as $row){
	        $user_id = $row['user_id'];
		$user_name=$row['user_name'];
}
		$sql = "SELECT * FROM chat WHERE user1_id = ? AND user2_id =?";
   		$ps = $pdo->prepare($sql);
		$ps->bindValue(1,$_SESSION['user_id'],PDO::PARAM_INT);
                $ps->bindValue(2,$user_id,PDO::PARAM_INT);
                $ps->execute();
                $searchArray1 = $ps->fetchAll();
	
	
		$sql = "SELECT * FROM chat WHERE user1_id = ? AND user2_id =?";
   		$ps = $pdo->prepare($sql);
		$ps->bindValue(1,$user_id,PDO::PARAM_INT);
                $ps->bindValue(2,$_SESSION['user_id'],PDO::PARAM_INT);
                $ps->execute();
                $searchArray2 = $ps->fetchAll();



		
?>
<!DOCTYPE html>
<html>
<head>
<title>チャット画面</title>
<link rel="stylesheet" href="./css/style.css">
<meta charset="UTF-8">
<style>
</style>
</head>
<body>
<div class="vertical-line"></div>
<div class="horizontal-line2"></div>

  <div id="chat-messages" class="message-container"></div>

  <input type="text" class="textbox-001" id="message-input" placeholder="メッセージを送信">
<input type="image" class="sousin" src="./sousin.png" alt="送信" onclick="sendMessage()" />

<a class="modoru2" href="javascript:history.back()">
  <img src="./yajirushi-illust6.png" alt="戻る" />
</a>

  <div id="current-user">

<?php
	echo $user_name;
?>
</div>  <!-- 現在のユーザーを表示する領域 -->

<div id="aaa" style="position: absolute;
height: 80%;">
<?php	
	//foreach($searchArray1 as $row){
		//echo $row['chat_content']."<br>";
//}
//?>
</div>

<div>
<?php
		//foreach($searchArray2 as $row){
		//echo $row['chat_content']."<br>";
//}
//?>
</div>
  <script>
    var currentUser = ''; // 現在のユーザーを保持する変数

    // メッセージを送信する関数
    function sendMessage() {
      var messageInput = document.getElementById("message-input");
      var message = messageInput.value;
      if (message !== "") {
        var chatMessages = document.getElementById("chat-messages");
        var newMessage = document.createElement("p");
        newMessage.textContent = message;  // メッセージのみ表示
        newMessage.classList.add("message");
        chatMessages.appendChild(newMessage);
        messageInput.value = "";
      }
    }
    
</script>
</body>
</html>
























