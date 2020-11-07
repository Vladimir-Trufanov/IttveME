<?php
// PHP7/HTML5, EDGE/CHROME                                *** DebugNews.php ***

// ****************************************************************************
// * ittve.me               Вывести отладочную информацию в колонке  новостей *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 07.11.2020

define ("gb", 1);    // Характеристики браузера по UserAgent через get_browser
define ("js", 2);    // Сообщение о включенном или выключенном javascript
define ("sd", 4);    // Тип устройства, корневой каталог, надсайтовый и каталог хостинга

// Показать характеристики браузера по UserAgent через get_browser
function fgb()
{
   $browser = get_browser(null, true);
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
$DebugNews=-sd;

if ($DebugNews==gb) fgb();
elseif ($DebugNews==js) fjs();
elseif ($DebugNews==sd) fsd($SiteDevice,$SiteRoot,$SiteAbove,$SiteHost);
}

// ********************************************************** DebugNews.php ***
