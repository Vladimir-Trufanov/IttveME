<?php
include ('functions.php');
include ('db_conn.php');


if(!isset($_GET['art_id']))
{
    $art_id = '1';
}
else
{
    $art_id = addslashes(strip_tags(trim($_GET['art_id'])));
}
echo 'art_id='.art_id.'<br>';
$art_data = GetDataArt($art_id);


/*
if(!isset($_GET['page'])){
    $page = 'main';
}
else{
    $page = addslashes(strip_tags(trim($_GET['page'])));
}
switch ($page){
    case 'main':
        $title = 'Главная';
        $meta_d = 'Главная';
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
*/

?>
<!DOCTYPE html>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $art_data[1];?></title>
<meta name="description" content="<?php echo $art_data[3];?>" />
<meta name="keywords" content="<?php echo $art_data[2];?>" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<div id="page">
    <div id="header">
    </div>
    <div id="menu">
        <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="/index.php?art_id=2">О нас</a></li>
            <li><a href="/index.php?art_id=3">Статья</a></li>
            <li><a href="/index.php?art_id=4">Фотогалерея</a></li>
            <li><a href="/index.php?art_id=5">Контакты</a></li>
        </ul>
    </div>
    <div id="content">
        <h1><?php echo $art_data[0];?></h1>
        <?php echo $art_data[4];?>
    </div>
    <div class="clear"></div>
    <div id="footer">
        <p>&copy; Некая информация</p>
    </div>
</div>
</body>
</html>
<?php
