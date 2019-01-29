<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Main.php ***

// ****************************************************************************
// * ittve.me                          Обо мне, путешествиях и ... Черногории *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 29.01.2019

session_start(); 

// Инициализируем корневой каталог сайта, надсайтовый каталог, каталог хостинга
require_once "iGetAbove.php";
$SiteRoot = $_SERVER['DOCUMENT_ROOT'];  // Корневой каталог сайта
$SiteAbove = iGetAbove($SiteRoot);      // Надсайтовый каталог
$SiteHost = iGetAbove($SiteAbove);      // Каталог хостинга

// Подключаем файлы библиотеки прикладных модулей
require_once $SiteHost."/TPhpPrown/getTranslit.php";
require_once $SiteHost."/TPhpPrown/getSiteDevice.php";
require_once $SiteHost."/TPhpPrown/MakeCookie.php";
require_once $SiteHost."/TPhpPrown/ViewGlobal.php";

// Выполняем начальную инициализацию
require_once "Inimem.php";

// ***** Регистрируем новую загрузку страницы
// Изменяем счетчик запросов сайта из браузера       
$BrowEntry = $BrowEntry+1;
\prown\MakeCookie('BrowEntry',$BrowEntry); 
// Изменяем счетчик посещений текущим посетителем      
$PersEntry = $PersEntry+1;
\prown\MakeCookie('PersEntry',$PersEntry); 
// Изменяем счетчик посещений за сессию                 
$_SESSION['Counter']++;
// echo "Вы обновили эту страницу ".$_SESSION['Counter']." раз. ";
// echo "<br><a href=".$_SERVER['PHP_SELF'].">обновить"; 

// Если после авторизации изменилось имя пользователя,
// то перенастраиваем счетчики
if ($PersName<>$UserName)
{
   $PersEntry = 1;
   \prown\MakeCookie('PersEntry',$PersEntry); 
   $PersName=$UserName;
   \prown\MakeCookie('PersName',$PersName); 
}

// Разворачиваем страницу
//require_once "iHtmlBegin.php";

?>

<!DOCTYPE html>
<html lang="ru">
<head>
   <title>Обо мне, путешествиях и ... Черногории</title>
   <meta charset="utf-8">
   <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
   <meta name="description" content="Труфанов Владимир Евгеньевич, его жизнь и жизнь его близких">
   <meta name="keywords" content="Труфанов Владимир Евгеньевич, жизнь и увлечения">
   <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Anonymous+Pro:400,400i,700,700i&amp;
      subset=cyrillic">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:700">
   <link rel="stylesheet" 
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
   <link rel="stylesheet" type="text/css" href="Styles/Reset.css">
   <link rel="stylesheet" type="text/css" href="Styles/Styles.css">
   <link rel="stylesheet" type="text/css" href="Styles/ImgRight.css">
   <link rel="stylesheet" type="text/css" href="Styles/styleSet.css">

   <link rel="stylesheet" type="text/css" href="TJsPrown/TJsPrown.css">
   
   <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
   </script>
   <script src="/TJsPrown/TJsPrown.js"></script>
   <script> MakeCatchyQuotes() </script>
</head>

<body>
   <!-- 
   -->
   <div class="Gallery">
      <div class="Card">
         <img class="imgCard" 
         src="/Pages/tveArc1/tve1-1-pod^yom-nastroeniya.jpg" 
         alt="Подъём настроения">
         <p class="pCard"> 
            <?php
            require_once "Pages/tveArc1/tve1-1-comm.txt";
            ?> 
         </p>
      </div>
      <div class="Card">
         <img class="imgCard" 
         src="/Images/С заботой и к мамам.jpg" 
         alt="С заботой и к мамам">
      </div>
      <div class="Card">
         <img class="imgCard" 
         src="/Images/nasampo.jpg" 
         alt="На горе Сампо">
      </div>
      <div class="Card">
         <img class="imgCard" 
         src="/Images/dozhd'-prazdniku-ne-pomeha.jpg" 
         alt="Дождь празднику не помеха">
      </div>
      <div class="Card">
         <img class="imgCard" 
         src="/Images/uyolochki.png" 
         alt="У ёлочки">
      </div>
      <div class="Card">
         <img class="imgCard" 
         src="/Images/hochesh'-kvasku.jpg" 
         alt="Хочешь кваску">
      </div>
   </div>

   <section class="News">
      <?php
      require_once "Pages/tveArt/tve2-114-po-trope-k-karnizu-reki-bzerp'.html";
      ?>
   </section>

   <section class="Life">
      <?php
      require_once "Pages/tveArc1/tve1-1-оsobennosti-ustrojstva-vintikov-v-moej-golove.html";
      ?>
   </section>
  
   <div class="Footer">
      <div class="LeftFooter">
         <!--
         tve58@inbox.ru
         -->
         <?php 
            // echo $SiteDevice/*.': '.$SiteRoot.'-'.$SiteAbove.'-'.$SiteHost*/; 
            echo $uagent.'<br>';
         ?>
      </div>
      <div class="LifeMenu">
         <button class="btnLifeMenu">
            <img class="imgLifeMenu" src="/Images/Buttons/tveMenuD.png" alt="tveMenuD">
         </button>
      </div>
      <div class="RightFooter">
         <?php
         require_once "NavSet.php";
         ?>
      </div>
   </div>
  
   <div class="Ext">
      Main
   </div>
  
   <div class="Info">
      <div class="InfoLeft">
         <!--
         Copyright (c) 2019 Труфанов Владимир <br>
         -->
         <?php 
            //echo $SiteDevice/*.': '.$SiteRoot.'-'.$SiteAbove.'-'.$SiteHost*/; 
            //echo $uagent.'<br>';
         ?>
      </div>
      <div class="InfoRight">
         <?php 
            echo $SiteDevice.
            " ".$PersName." ".$_SESSION['Counter'].".".$PersEntry."[".$BrowEntry."]"; 
         ?>
      </div>
   </div>

</body>
</html>

<?php
// *************************************************************** Main.php ***
