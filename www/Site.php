<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Site.php ***

// ****************************************************************************
// * ittve.me                               Загрузить разметку страницы сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 02.11.2020

// Выводим div с галереей изображений
echo '<div id="Gallery">';
require_once "ittveNews/GalleryNews.php";
echo '</div>';

// Выводим текстовый контент сайта: колонку новостей, колонку моей жизни
echo '<div id="Content">';

echo '<div id="News">';

if (prown\isComRequest('FullImage','Com'))
{
   //echo 'FullImage'.'<br>';
   require_once "ViewExt.php";
   ViewExt($с_PageImg,$SiteDevice,$c_PersName,$c_PersEntry,$c_BrowEntry);
}
else
{
   require_once "ittveNews/".$p_ittveNews;
}
//echo '<div align="center" id="Ext">';
/*
require_once "ViewExt.php";
ViewExt($с_PageImg,$SiteDevice,$c_PersName,$c_PersEntry,$c_BrowEntry);
*/
//echo '</div>';


echo '</div>';

echo '<section id="Life">';

   // При отладке можем вывести различные сообщения
   
   // 1. Характеристики браузера по UserAgent
   // $browser = get_browser(null, true);
   // print_r($browser);

   // 2. Тип устройства, корневой каталог, надсайтовый и катлог хостинга
   // echo $SiteDevice.': '.$SiteRoot.' -> '.$SiteAbove.' -> '.$SiteHost.'<br>'; 
   
   // 3. Сообщение о включенных или выключенных шрифтах
   echo '
   <script>
      document.write("У Вас включён JavaScript!");
   </script>
   <noscript>У Вас отключён JavaScript!</noscript>
   ';
   
require_once "ittveLife/ittve02-114-20180922-По-тропе-к-карнизу-реки-Бзерпь.html";
echo '</section>';
echo '</div>';

// Это использовать при выводе одного из вариантов показа выделенной фотографии?
/*
echo '<div id="imgDiv">';
echo '
   <img id="imgFull" class="imgCard" 
   src="ittveNews/ittve01-001-На-Сампо.jpg" 
   alt="На горе Сампо">
';
echo '</div>';
*/

// Выводим подвал сайта
echo '<div id="Footer">';
   // Левая часть подвала для сообщений, разворачиваемых в три строки
   echo '<div id="LeftFooter">';
   require_once "MessLeftFooter.php";
   echo '</div>';

   // Главное меню - центральная часть подвала
   echo '<div id="LifeMenu">';
   echo '<form action="http://localhost:83/index.php">';
   echo 
   '
   <button title="Жизнь и путешествия!" id="btnLifeMenu" 
      onclick="clickLifeMenu()"
      name="Com" value="LifeMenu">
      <img id="imgLifeMenu" src="/Images/Buttons/tveMenuD.png" alt="tveMenuD">
   </button>
   ';
   echo '</form>';  
   echo '</div>';
   
   // Правая часть подвала, меню управления
   echo '<div id="RightFooter">';
   require_once "NavSetCss.php";
   echo '</div>';
echo '</div>';

// Выводим окно расширения (для главного меню, для выделенной картинки)
echo '<div align="center" id="Ext">';
/*
require_once "ViewExt.php";
ViewExt($с_PageImg,$SiteDevice,$c_PersName,$c_PersEntry,$c_BrowEntry);
*/
echo '</div>';

?>
<div id="Info">
   <div id="InfoLeft">
      Copyright (c) 2019 v2.0  Труфанов Владимир   tve58@inbox.ru<br>
   </div>
   <div id="InfoRight">
      <?php 
         echo $SiteDevice.
         " ".$c_PersName." ".$_SESSION['Counter'].".".$c_PersEntry."[".$c_BrowEntry."]"; 
      ?>
   </div>
</div>
<?php 



// *************************************************************** Site.php ***
