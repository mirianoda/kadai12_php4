<?php
session_start();

//エラー表示
ini_set("display_errors", 1);
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
include("funcs.php");
sschk();
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_user_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $_GET["id"], PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
    sql_error($stmt);
  }
  
//全データ取得
$v =  $stmt->fetch(); //1行だけ取る！（一番上の行）

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <script src="js/jquery-2.1.3.min.js"></script>
  <link rel="stylesheet" href="css/user.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Bungee+Tint&family=Cinzel+Decorative:wght@400;700;900&family=Cinzel:wght@400..900&family=Dongle:wght@300;400;700&family=Galada&family=Montserrat+Alternates:wght@100;200;300;400&family=Poiret+One&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Zen+Kaku+Gothic+New:wght@300;400;500;700&family=Zen+Maru+Gothic&display=swap"
    rel="stylesheet">
</head>

<body>
  <header>
    <h1 class="logo">OUR BOOKSHELF</h1>
  </header>

  <div class="form-wrapper">
    <div class="form1-msg">
      <h2>ユーザー情報編集</h2>
      <p>変更内容を入力し、更新ボタンを押してください</p>
    </div>

    <form method="post" action="update2.php" class="form1">
        <div class="form">
            <p>ユーザー名</p><input type="text" name="name" value="<?=$v["name"]?>">
        </div>
        <div class="form">
            <p>ログインID</p><input type="text" name="lid" value="<?=$v["lid"]?>">
        </div>
        <div class="kubun">
            <p>ユーザー区分</p>
             一般<input type="radio" name="kanri_flg" value="0"<?= $v["kanri_flg"] == "0" ? "checked" : "" ?>>
             管理者<input type="radio" name="kanri_flg" value="1"<?= $v["kanri_flg"] == "1" ? "checked" : "" ?>>
        </div>
         <!-- <label>退会FLG：<input type="text" name="life_flg"></label><br> -->
         <input type="submit" value="更新" class="submit">
         <input type="hidden" name="id" value="<?=$v["id"]?>">
    </form>
  </div>
</body>

</html>