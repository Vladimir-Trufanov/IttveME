<?php
// PHP7/HTML5, EDGE/CHROME                                *** DebugNews.php ***

// ****************************************************************************
// * ittve.me               Вывести отладочную информацию в колонке  новостей *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 13.11.2020

define ("gb", 1);    // Характеристики браузера по UserAgent через get_browser
define ("js", 2);    // Сообщение о включенном или выключенном javascript
define ("pi", 4);    // Информация о настройках PHP
define ("sd", 8);    // Тип устройства, корневой каталог, надсайтовый и каталог хостинга

// Показать характеристики браузера по UserAgent через get_browser
function fgb()
{
   $browser = get_browser(null, true);
   //prown\ViewArray($browser,'Caption');
   print_r($browser);
}
// Вывести сообщение о включенном или выключенном javascript
function fjs()
{
   echo '
   <script>
      document.write("У Вас включён JavaScript!");
   </script>
   <noscript>У Вас отключён JavaScript!</noscript>
   ';
}
// Вывести информацию о PHP
function fpi()
{
   phpinfo();
}
// Указать тип устройства, корневой каталог, надсайтовый и каталог хостинга
function fsd($SiteDevice,$SiteRoot,$SiteAbove,$SiteHost)
{
   echo $SiteDevice.': '.$SiteRoot.' -> '.$SiteAbove.' -> '.$SiteHost.'<br>'; 
}
// ****************************************************************************
// *                        Вывести отладочную информацию                     *
// ****************************************************************************
function ViewDebug($SiteDevice,$SiteRoot,$SiteAbove,$SiteHost)
{
$DebugNews=-pi;

if ($DebugNews==gb) fgb();
elseif ($DebugNews==js) fjs();
elseif ($DebugNews==pi) fpi();
elseif ($DebugNews==sd) fsd($SiteDevice,$SiteRoot,$SiteAbove,$SiteHost);
}

// ********************************************************** DebugNews.php ***
