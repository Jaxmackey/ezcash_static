<?php
require ('./db/db.php');
$id = '3_veschi__kotorye_vy_dolzhny_znat__pered_nachalom_biznesa';
if(!empty($_GET['name'])) {
  $id = filter_input(INPUT_GET, 'name');
}
$sql = "SELECT * FROM fullpost AS f INNER JOIN prevpost AS p ON p.Id = f.IdPrevPost WHERE p.seoname = '".$id."'";
$post = $conn->query($sql);
$rows = array();
while($r = mysqli_fetch_assoc($post)) {
  $rows[] = $r;
}
$articleBlock = "<div class=\"blog-img\"><img src=\"/src/article/{$rows[0]['Img']}\" alt=\"itemInfo.Title\"></div>
     <div class=\"blog-content\">
       <h1 class=\"h1-black\">{$rows[0]['Title']}</h1>
       <div class=\"blog-text\">{$rows[0]['Html']}</div>
     </div>";
echo "<!DOCTYPE html>
<html lang=\"ru\">
  <head>
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link href=\"https://fonts.googleapis.com/css2?family=Roboto&amp;display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"\css\main.css\">
    <link rel=\"stylesheet\" href=\"\css\slider\\rangeslider.css\">
    <link rel=\"stylesheet\" href=\"\css\slider\\priceslider.css\">
    <link rel=\"shortcut icon\" href=\"favicon.ico\" type=\"image/x-icon\">
    <title>{$rows[0]['Title']}</title>
    <meta name=\"description\" content=\"{$rows[0]['MinText']}\">
  <link href=\"\css\main.css\" rel=\"stylesheet\"></head>
  <body>
    <header class=\"header\">
      <div class=\"custom-container\"><a class=\"logo\" href=\"/\"><img src=\"src/img/logo.svg\" alt=\"logo\"/></a>
        <div class=\"mobile-nav\">
          <nav class=\"nav\"><a class=\"nav__link\" href=\"/catalog\">Микрозаймы</a><a class=\"nav__link\" href=\"/blog.php\">Блог</a></nav>
        </div><a class=\"link-mail\" href=\"mailTo:ezcash.official@gmail.com\">ezcash.official@gmail.com</a>
        <div class=\"hamburger\" @click=\"showMenu = !showMenu\"><span></span><span></span><span></span></div>
      </div>
    </header>
    <div class=\"custom-container\">
    <div class=\"breadcrumbs\">
      <a href=\"#\" class=\"breadcrumbs__link\">Главная</a>
        <span class=\"breadcrumbs__current\">Блог</span>
      </div>
    </div>
    {$articleBlock}
    <footer class=\"footer\">
      <div class=\"custom-container\"><a href=\"/\"><img src=\"src/img/logo.svg\" alt=\"logo\"/></a>
        <div class=\"footer__copyright\">©Все права защищены 2021 ezmoney.</div>
      </div>
    </footer>
  <script type=\"text/javascript\" src=\"/js/slider/rangeslider.min.js\"></script>
  <script type=\"text/javascript\" src=\"/js/slider/priceslider.min.js\"></script>
  <script type=\"text/javascript\" src=\"/js/index/index.js\"></script></body>
</html>";