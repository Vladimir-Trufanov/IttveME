<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Site.php ***

// ****************************************************************************
// * ittve.me                               Загрузить разметку страницы сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 17.11.2020

// Выводим div с галереей изображений
echo '<div id="Gallery">';
require_once "ittveLife/GalleryLife.php";
echo '</div>';

// Выводим текстовый контент сайта: колонку новостей, колонку моей жизни
echo '<div id="Content">';
   echo '<div id="Menu">';
      //ViewDebug($SiteDevice,$SiteRoot,$SiteAbove,$SiteHost);
      require_once "Menu.php";
   echo '</div>';

   echo '<div id="News">';
      //ViewDebug($SiteDevice,$SiteRoot,$SiteAbove,$SiteHost);
      require_once "ittveNews/".$p_ittveNews;
   echo '</div>';

   echo '<div id="Life">';
      //ViewDebug($SiteDevice,$SiteRoot,$SiteAbove,$SiteHost);
      require_once "ittveLife/".$p_ittveLife;
      //require_once "ittveLife/ittve02-114-20180922-По-тропе-к-карнизу-реки-Бзерпь.html";
   echo '</div>';
echo '</div>';

// Выводим подвал сайта
echo '<div id="Footer">';

   // Главное меню 
   echo '<div id="LifeMenu">';
   echo '<form id="frmLifeMenu" action="'.$SpecSite.'">';
   echo '
   <button id="btnLifeMenu" btn-title="Жизнь и путешествия!" 
      name="Com" value="LifeMenu">
      <img id="imgLifeMenu" src="/Images/Buttons/tveMenuD.png" alt="tveMenuD">
   </button>
   ';
   /*
   echo '
   <button id="btnLifeMenu" btn-title="Жизнь и путешествия!" 
      onclick="clickLifeMenu()"
      name="Com" value="LifeMenu">
      <img id="imgLifeMenu" src="/Images/Buttons/tveMenuD.png" alt="tveMenuD">
   </button>
   ';
   */
   echo '</form>';  
   echo '</div>';

   // Левая часть подвала для сообщений, разворачиваемых в три строки
   echo '<div id="LeftFooter">';
   require_once "MessLeftFooter.php";
   echo '</div>';

   // Правая часть подвала, меню управления
   echo '<div id="RightFooter">';
   echo '<form id="frmNavset" action="'.$SpecSite.'">';
   require_once "NavSetCss.php";
   echo '</form>';  
   echo '</div>';
echo '</div>';

// Выводим нижнюю информационную строку
echo '<div id="Info">';
   echo '
   <div id="InfoLeft">
      Copyright (c) 2019 v2.0  Труфанов Владимир   tve58@inbox.ru<br>
   </div>
   ';

   echo '<div id="InfoRight">';
   echo $SiteDevice.
      " ".$c_PersName." ".$_SESSION['Counter'].".".$c_PersEntry."[".$c_BrowEntry."]"; 
   echo '</div>';
echo '</div>';

// ************************************************************** Sitep.php ***
