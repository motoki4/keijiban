<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>4eachblog 掲示板</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <?php
  mb_internal_encoding("utf8");
  $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
  $stmt = $pdo->query("select * from 4each_keijiban");
  
  ?>
  <header>
    <div class="logo">
      <img src="4eachblog_logo.jpg">
    </div>
    <div class="menu">
      <ul>
        <li>トップ</li>
        <li>プロフィール</li>
        <li>4eachについて</li>
        <li>登録フォーム</li>
        <li>問い合わせ</li>
        <li>その他</li>
      </ul>
    </div>
  </header>

  <main>
    <div class="left">
      <h1>プログラミングに役立つ掲示板</h1>
      <form method="post" action="insert.php">
        <div>
          <h2>入力フォーム</h2>
        </div>
        <div>
          <label>ハンドルネーム</label>
          <br>
          <input type="text" name="handlename" class="text">
        </div>
        <div>
          <label>タイトル</label>
          <br>
          <input type="text" name="title" class="text">
        </div>
        <div>
          <label>コメント</label>
          <br>
          <textarea type="text" rows="5" cols="40" name="comments">
          </textarea>
        </div>
        <div>
          <input type="submit" class="submit" value="送信する" class="submit">
        </div>
      </form>

      <?php
      while($row = $stmt->fetch()){
        echo "<div class='kiji'>";
        echo "<h3>".$row['title']."</h3>";
        echo "<div class='content'>
        ".$row['comments']."</div>";
        echo "<div class='handlename'>
        posted by ".$row['handlename']."</div>";
        echo "</div>";
        }
      ?>

    </div>
    <div class="right">
      <h3>人気の記事</h3>
      <ul>
          <li>PHPおススメの本</li>
          <li>PHP MyAdminの使い方</li>
          <li>今人気のエディタ Top5</li>
          <li>HTMLの基礎</li>
        </ul>
        <h3>オススメリンク</h3>
        <ul>
          <li>インターノウス株式会社</li>
          <li>XAMPPのダウンロード</li>
          <li>Eclipseのダウンロード</li>
          <li>Braketsのダウンロード</li>
        </ul>
        <h3>カテゴリ</h3>
        <ul>
          <li>HTML</li>
          <li>PHP</li>
          <li>MySQL</li>
          <li>JavaScript</li>
        </ul>
    </div>  
  </main>

  <footer>
    <div>
    <p>copyright©internous|4each blog the which provides A to Z about programing.</p>
    </div>
  </footer>
</body>

</html>