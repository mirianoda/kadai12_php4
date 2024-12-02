<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <script src="js/jquery-2.1.3.min.js"></script>
  <link rel="stylesheet" href="css/taikai.css" />
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
      <h2>退会</h2>
      <p>よろしければ、最後に退会理由について教えてください</p>
    </div>

    <form method="post" action="taikai_insert.php" class="form1">
        <div class="kubun">
            <p>退会理由</p>
             <input type="radio" name="reason" value="サービス内容に価値を感じない">サービス内容に価値を感じない
             <input type="radio" name="reason" value="本を読まなくなった">本を読まなくなった<br>
             <input type="radio" name="reason" value="操作がわかりづらい">操作がわかりづらい
             <input type="radio" name="reason" value="動作が遅い">動作が遅い
             <input type="radio" name="reason" value="その他">その他
        </div>
         <!-- <label>退会FLG：<input type="text" name="life_flg"></label><br> -->
          <p class="msg">一度退会すると、登録データは復元できません。本当に退会しますか？</p>
         <input type="submit" value="退会する" class="submit">
         <input type="hidden" name="id" value="<?=$_GET["id"]?>">
    </form>
  </div>
</body>

</html>