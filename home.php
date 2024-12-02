<?php
//0. SESSION開始！！
session_start();

//１．関数群の読み込み
include("funcs.php");

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <script src="js/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="css/home.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Tint&family=Cinzel+Decorative:wght@400;700;900&family=Cinzel:wght@400..900&family=Dongle:wght@300;400;700&family=Galada&family=Montserrat+Alternates:wght@100;200;300;400&family=Poiret+One&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Zen+Kaku+Gothic+New:wght@300;400;500;700&family=Zen+Maru+Gothic&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <div class="login-msg">
        <p><?=$_SESSION["name"]?>さんがログインしています</p>
        <p>
          <?php if($_SESSION["kanri_flg"]=="1"){ ?>
          <a id="userlist" href="userlist.php"><img src="img/userlist.png" alt="">ユーザーリスト</a>
          <?php } ?>
          <a id="logout" href="logout.php"><img src="img/logout.png" alt="">ログアウト</a>
        </p>
      </div>
      <h1 class="logo">OUR BOOKSHELF</h1>
      <span class="dli-circle">
        <span class="dli-plus"></span>
      </span>
    </header>
      <div id="shelf"></div>
    <footer>
      <div class="footer-text">
        <h2 class="logo">OUR BOOKSHELF</h2>
        <p>Copyright © 2005 ○○○○ All Rights Reserved.</p>
      </div>
      <div class="footer-icon">
        <a href="taikai.php?id=<?=$_SESSION["id"]?>">退会はこちら</a>
        <img src="img/Twitter.png" alt="">
        <img src="img/Instagram.png" alt="">
      </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script type="module" src="home.shelf.js"></script>
    <script>
      $(".dli-circle").on("click",function(){
        window.location.href = "addBook.html";
      });
    </script>
  </body>
</html>
