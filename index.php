<?php
session_start(); // セッション開始
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "funcs.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <script src="js/jquery-2.1.3.min.js"></script>
  <link rel="stylesheet" href="css/addBook.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Bungee+Tint&family=Cinzel+Decorative:wght@400;700;900&family=Cinzel:wght@400..900&family=Dongle:wght@300;400;700&family=Galada&family=Montserrat+Alternates:wght@100;200;300;400&family=Poiret+One&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Zen+Kaku+Gothic+New:wght@300;400;500;700&family=Zen+Maru+Gothic&display=swap"
    rel="stylesheet">
</head>

<body>
    <?php if (isset($_SESSION['alert'])): ?>
    <script>
        alert("<?= h($_SESSION['alert']);?>");
    </script>
    <?php unset($_SESSION['alert']); // 表示後にメッセージを削除 ?>
    <?php endif; ?>
  <header>
    <h1 class="logo">OUR BOOKSHELF</h1>
  </header>

  <div class="mainvisual">
    <section class="wave">
      <h1 class="logo">OUR BOOKSHELF =「私たちの本棚」</h1>
      <p>みんなのお気に入りの本を追加して、<br>世界にひとつだけの特別な本棚を作りあげましょう！</p>
    </section>
  </div>

  <div class="form-wrapper">
    <div class="form1-msg">
      <h2>LOGIN</h2>
      <p>あなたのログイン情報を入力してください</p>
        <a href="user.php">新規ユーザー登録はこちら</a>
    </div>

    <form name="form1" action="login_act.php" method="post" class="form1">
        <div class="form">
            <p>ID</p><input type="text" name="lid">
        </div>
        <div class="form">
            <p>パスワード</p><input type="password" name="lpw">
        </div>
        <input type="submit" value="ログイン" class="submit">
    </form>
  </div>
</body>

</html>