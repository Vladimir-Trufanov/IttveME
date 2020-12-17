<?php
if(!isset($_GET['page'])){
    $page = 'main';
}
else{
    $page = addslashes(strip_tags(trim($_GET['page'])));
}
switch ($page){
    case 'main':
        $title = 'Главная';
        $meta_d = 'Глав ная';
        $meta_kw = 'Главная';
    break;
    case 'about':
        $title = 'О нас';
        $meta_d = 'О нас';
        $meta_kw = 'О нас';
    break;
    case 'article':
        $title = 'Статья';
        $meta_d = 'Статья';
        $meta_kw = 'Статья';
    break;
    case 'foto':
        $title = 'Фотогалерея';
        $meta_d = 'Фотогалерея';
        $meta_kw = 'Фотогалерея';
    break;
    case 'contact':
        $title = 'Наши контакты';
        $meta_d = 'Наши контакты';
        $meta_kw = 'Наши контакты';
    break;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Простой динамический сайт </title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<div id="page">
    <div id="header">
    </div>
    <div id="menu">
        <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="/DetmanPage/www/index1.php?page=about">О нас</a></li>
            <li><a href="/DetmanPage/www/index1.php?page=article">Статья</a></li>
            <li><a href="/DetmanPage/www/index1.php?page=foto">Фотогалерея</a></li>
            <li><a href="/DetmanPage/www/index1.php?page=contact">Контакты</a></li>
        </ul>
    </div>
    <div id="content">
        <?php
           echo 'главная='.$page;
           include ('pages/'.$page.'.php');
        ?>
    </div>
    <div class="clear"></div>
    <div id="footer">
        <p>&copy; Некая информация</p>
    </div>
</div>
</body>
</html>

