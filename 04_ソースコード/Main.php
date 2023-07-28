<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/style1.css">
    <style>
        /* CSS styles for the news feed */
        .news-feed {
          display: 100vh;
          width: 400px;
          margin: 0 auto;
          background-color: #f2f2f2;
          border: 1px solid #ccc;
          padding: 10px;
        }
        
        .news-item {
          margin-bottom: 10px;
          padding: 10px;
          background-color: #fff;
          border: 1px solid #ccc;
        }
        
        .news-item .title {
          font-weight: bold;
        }
        
        .news-item .content {
          margin-top: 5px;
        }
      </style>
      <style>
    form {
      width: 400px;
      margin: 0 auto;
    }

    textarea {
      width: 100%;
      height: 50px;
      padding: 5px;
      margin-bottom: 10px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
    <div class="Main">
        <div class="half1">
            <h1>GAME コミュニティ</h1>
            		<?php
            $servername = "mysql214.phy.lolipop.lan"; // MySQLサーバー名
            $username = "LAA1417842"; // MySQLユーザー名
            $password = "communicatio"; // MySQLパスワード
            $dbname = "LAA1417842-communicatio"; // クエリしたいデータベース名

              try {
                // PDO接続を作成
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                // PDOのエラーモードを例外に設定
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              // データベース内のテーブルからデータをクエリ
              $sql = "SELECT user_id, user_name, mailaddress FROM User_information"; // クエリしたいテーブル名に'communicatio'を置き換えてください

              $stmt = $conn->query($sql);

              // 各行のデータを出力
		echo "<h1>チャットリスト</h1>";
    		echo "<ul>";
    		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        			echo "<li>";
        			echo "ID: " . $row["user_id"] . ", ";
        			echo "名前: <a href=http://jolly-arita-1021.capoo.jp/team2/chat.php?mailaddress=". $row["mailaddress"] .">" . $row["mailaddress"] . "\">" . $row["user_name"] . "</a>";
        			echo "</li>";
    			}
    				echo "</ul>";
            } catch (PDOException $e) {
              echo "クエリエラー：" . $e->getMessage();
          }
          // 接続を閉じる
          $conn = null;
          ?>
        </div>
	
        <div class="half2">
<form class="logout-btn" action="logout.php" method="post">
    <button class="btn btn-danger" type="submit">ログアウト</button>
          <div class="a">
            <div class="a1">
           <h1><form action="" method="post">
                <input type="text" name="seach" placeholder="キーワードを入力">
                <input type="submit" value="検索"></h1>
           </form>
            </div>
           <div class="a2">
              <form action="profile.php" method="post">
                <button type="submit" class="button">プロフィール</button>
              </form>
            </div>
          </div>

        <div class="column">
            <h1>News Feed</h1>
            <div class="news-feed">
        <!-- Existing news items (Keep them as-is) -->
        <div class="news-item">
            <div class="title">News</div>
            <div class="content">This is the content of the news item 1.</div>
        </div>
        <!-- Add more news items as needed -->
    
	<?php
// index.php

// Assuming you have a database connection setup, you can fetch the recruiting posts from the database
$db = new mysqli('mysql214.phy.lolipop.lan', 'LAA1417842', 'communicatio', 'LAA1417842-communicatio');


// Check for a successful database connection
if ($db->connect_errno) {
    die("Failed to connect to MySQL: " . $db->connect_error);
}

// Prepare the SQL statement to fetch recruiting posts
$stmt = $db->prepare("SELECT recruiting_id, user_id, recruiting_content, post_time FROM recruiting ORDER BY post_time DESC");
$stmt->execute();
$stmt->bind_result($recruiting_id, $user_id, $recruiting_content, $post_time);

// Display each recruiting post
while ($stmt->fetch()) {
    echo '<div>';
    echo '<strong>User ID: ' . $user_id . '</strong> - ' . $post_time . '<br>';
    echo htmlspecialchars($recruiting_content);
    echo '</div>';
}
// Close the statement and database connection
$stmt->close();
$db->close();


?>
            </div>

    <!-- Form to post news -->
    <form action="process.php" method="POST">
        <label for="content">内容:</label>
        <textarea name="content" id="content" required></textarea>
        <br>
        <input type="submit" value="Post">
    </form>
    
        </div>
        </div>
    </div>
</body>