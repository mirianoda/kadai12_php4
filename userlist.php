<?php
//0. SESSION開始！！
session_start();

//１．関数群の読み込み
include("funcs.php");

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();

//２．データ登録SQL作成
$pdo = db_conn();
$sql = "SELECT * FROM gs_user_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <script src="js/jquery-2.1.3.min.js"></script>
  <link rel="stylesheet" href="css/userlist.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Bungee+Tint&family=Cinzel+Decorative:wght@400;700;900&family=Cinzel:wght@400..900&family=Dongle:wght@300;400;700&family=Galada&family=Montserrat+Alternates:wght@100;200;300;400&family=Poiret+One&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Zen+Kaku+Gothic+New:wght@300;400;500;700&family=Zen+Maru+Gothic&display=swap"
    rel="stylesheet">
</head>

<body>
  <header>
    <h1 class="logo">OUR BOOKSHELF</h1>
    <img src="img/本アイコン.png" alt="" class="home">
  </header>

  <div class="form-wrapper">
    <div class="form1-msg">
      <h2>ユーザーリスト</h2>
    </div>

    <table>
        <tr>
          <td class="td-top">番号</td>
          <td class="td-top">ユーザー名</td>
          <td class="td-top">ログインID</td>
          <td class="td-top">ユーザー区分（0：一般、1：管理者）</td>
          <td class="td-top">使用状況（0：使用中、1：終了）</td>
        </tr>
      <?php foreach($values as $v){ ?>
        <tr>
          <td><?=$v["id"]?></td>
          <td><?=$v["name"]?></td>
          <td><?=$v["lid"]?></td>
          <td><?=$v["kanri_flg"]?></td>
          <td><?=$v["life_flg"]?></td>
          <td class="td-btn"><a href="detail2.php?id=<?=$v["id"]?>"><img src="img/detail.png" alt=""></a></td>
          <td class="td-btn"><a href="delete2.php?id=<?=$v["id"]?>"><img src="img/delete.png" alt=""></a></td>
        </tr>
      <?php } ?>
    </table>
  </div>
  <script>
    $(".home").on("click", function () {
      window.location.href = "home.php";
    });
  </script>
</body>

</html>