<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Main.php ***

// ****************************************************************************
// * ittve.me                          Обо мне, путешествиях и ... Черногории *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 30.01.2019

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
require_once "iHtmlBegin.php";
?>
<!-- 
-->
<div class="Gallery">
   <?php
   require_once "GalleryView.php";
   ?> 
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
         //echo $SiteDevice/*.': '.$SiteRoot.'-'.$SiteAbove.'-'.$SiteHost*/; 
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

<?php
require_once "iHtmlEnd.php";

// *************************************************************** Main.php ***
