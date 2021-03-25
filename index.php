<?php
echo "<!DOCTYPE html>
<html lang=\"ru\">
  <head>
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link href=\"https://fonts.googleapis.com/css2?family=Roboto&amp;display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"\css\main.css\">
    <title> </title>
  <link href=\"\css\main.css\" rel=\"stylesheet\"></head>
  <body>
    <header class=\"header\">
      <div class=\"custom-container\"><a class=\"logo\" href=\"/\"><img src=\"src/img/logo.svg\" alt=\"logo\"/></a>
        <div class=\"mobile-nav\">
          <nav class=\"nav\"><a class=\"nav__link\" href=\"/catalog\">Микрозаймы</a><a class=\"nav__link\" href=\"/blog\">Блог</a></nav>
        </div><a class=\"link-mail\" href=\"mailTo:ezcash.official@gmail.com\">ezcash.official@gmail.com</a>
        <div class=\"hamburger\" @click=\"showMenu = !showMenu\"><span></span><span></span><span></span></div>
      </div>
    </header>
    <div class=\"offer\">
      <div class=\"custom-container\">
        <div class=\"offer__wrapper\">
          <h1>Мы поможем получить деньги быстро</h1>
          <div class=\"offer__descr\">Помогаем  выбрать заёмщика с наилучшими условиями. Вам ничего не нужно делать, просто оформите заявку у нас на сайте и ждите одобрения</div>
        </div>
        <form class=\"filter\"></form>
      </div>
    </div>
    <footer class=\"footer\">
      <div class=\"custom-container\"><a href=\"/\"><img src=\"src/img/logo.svg\" alt=\"logo\"/></a>
        <div class=\"footer__copyright\">©Все права защищены 2021 ezmoney.</div>
      </div>
    </footer>
  <script type=\"text/javascript\" src=\"main.js\"></script></body>
</html>";