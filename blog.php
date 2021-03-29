<?php
require ('./db/db.php');
$postsArray = Array();
$page = 1;
if(!empty($_GET['page'])) {
    $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
    if(false === $page) {
        $page = 1;
    }
}
$items_per_page = 4;
$offset = ($page - 1) * $items_per_page;
$sql = "SELECT * FROM prevpost LIMIT ".$items_per_page." OFFSET ".$offset;
$posts = $conn->query($sql);
$return = [];
foreach ($posts as $row) {
    $return[] = [ 
        'Id' => $row['Id'],
        'Title' => $row['Title'],
        'Img' => $row['Img'],
        'DateAt' => $row['DateAt'],
        'Views' => $row['Views'],
        'MinText' => $row['MinText'],
        'seoname' => $row['seoname'],
        'description' => $row['description']
    ];
}
$postsResult = "";
for($i = 0; $i < count($return); $i++) {
  if($i == 0) {
    $postsResult .= "<div class=\"blog__item blog__item--big\" onclick=\"window.location.replace('/blog-inner.php?name={$return[$i]['seoname']}');\">
    <img src=\"/src/article/{$return[$i]['Img']}\" alt=\"\">
    <div class=\"blog__info\">
      <div class=\"blog__title\">{$return[$i]['Title']}</div>
      <div class=\"blog__date\">{$return[$i]['DateAt']}</div>
      <div class=\"blog__preview\">{$return[$i]['MinText']}</div>
    </div>
    <a href=\"/blog-inner.php?name={$return[$i]['seoname']}\"></a>
  </div>";
  }
  elseif($i == 1 || $i == 2)
  {
    $postsResult .= "<div class=\"blog__item\" onclick=\"window.location.replace('/blog-inner.php?name={$return[$i]['seoname']}');\">
             <img src=\"/src/article/{$return[$i]['Img']}\" alt=\"\">
             <div class=\"blog__info\">
               <div class=\"blog__title\">{$return[$i]['Title']}</div>
               <div class=\"blog__date\">{$return[$i]['DateAt']}</div>
               <div class=\"blog__preview\">{$return[$i]['MinText']}</div>
             </div>
             <a href=\"/blog-inner.php?name={$return[$i]['seoname']}\"></a>
           </div>";
  }
  elseif($i == 3)
  {
    $postsResult .= "<div class=\"blog__item blog__item--big\" onclick=\"window.location.replace('/blog-inner.php?name={$return[$i]['seoname']}');\">
    <img src=\"/src/article/{$return[$i]['Img']}\" alt=\"\">
    <div class=\"blog__info\">
      <div class=\"blog__title\">{$return[$i]['Title']}</div>
      <div class=\"blog__date\">{$return[$i]['DateAt']}</div>
      <div class=\"blog__preview\">{$return[$i]['MinText']}</div>
    </div>
    <a href=\"/blog-inner.php?name={$return[$i]['seoname']}\"></a>
  </div>";
  }
}

$totalpage = $conn->query("SELECT COUNT(*) AS total FROM prevpost;")->fetch_object();
$total = $totalpage->total;
$perPage = 4;
$countPage = ceil($total/4);
$paginationResult = "<ul class='pagination'>";
for($j = 1; $j <= $countPage; $j++)
{
  if($page == $j){
    $paginationResult .= "<li><a class='active' href=\"/blog.php?page={$j}\">{$j}</a></li>";
  }else{
    $paginationResult .= "<li><a href=\"/blog.php?page={$j}\">{$j}</a></li>";
  }
}
$paginationResult .= "</ul>";
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
    <title>EZCASH - Блог</title>
    <meta name=\"description\" content=\"EZCASH Блог: статьи о создании собственного бизнеса, карьере и обучении\">
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
    <div class=\"custom-container\">
    <div class=\"breadcrumbs\">
      <a href=\"#\" class=\"breadcrumbs__link\">Главная</a>
        <span class=\"breadcrumbs__current\">Блог</span>
      </div>
    </div>
    <div class=\"custom-container\">
      <div class=\"blog\">
        <div class=\"title\">Блог</div>
        <div class=\"blog__wrapper\">
          {$postsResult}
        </div>
      </div>
      {$paginationResult}
    </div>
    <footer class=\"footer\">
      <div class=\"custom-container\"><a href=\"/\"><img src=\"src/img/logo.svg\" alt=\"logo\"/></a>
        <div class=\"footer__copyright\">©Все права защищены 2021 ezmoney.</div>
      </div>
    </footer>
  <script type=\"text/javascript\" src=\"/js/slider/rangeslider.min.js\"></script>
  <script type=\"text/javascript\" src=\"/js/slider/priceslider.min.js\"></script>
  <script type=\"text/javascript\" src=\"/js/index/index.js\"></script></body>
</html>";