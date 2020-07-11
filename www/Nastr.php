<?php
// PHP7/HTML5, EDGE/CHROME                                    *** index.php ***

// ****************************************************************************
// * ittve.me                          Обо мне, путешествиях и ... Черногории *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 04.06.2020

//echo 'Настройки';

/*
// Инициализируем рабочее пространство: корневой каталог сайта и т.д.
require_once 'iniWorkSpace.php';
$_WORKSPACE=iniWorkSpace();

$SiteRoot    = $_WORKSPACE[wsSiteRoot];     // Корневой каталог сайта
$SiteAbove   = $_WORKSPACE[wsSiteAbove];    // Надсайтовый каталог
$SiteHost    = $_WORKSPACE[wsSiteHost];     // Каталог хостинга
$SiteDevice  = $_WORKSPACE[wsSiteDevice];   // 'Computer' | 'Mobile' | 'Tablet'
$UserAgent   = $_WORKSPACE[wsUserAgent];    // HTTP_USER_AGENT



// Подключаем файлы библиотеки прикладных модулей:
$TPhpPrown=$SiteHost.'/TPhpPrown';
require_once $TPhpPrown."/TPhpPrown/CommonPrown.php";
require_once $TPhpPrown."/TPhpPrown/getTranslit.php";
require_once $TPhpPrown."/TPhpPrown/MakeCookie.php";
require_once $TPhpPrown."/TPhpPrown/MakeSession.php";
require_once $TPhpPrown."/TPhpPrown/MakeUserError.php";
require_once $TPhpPrown."/TPhpPrown/ViewGlobal.php";


// Инициализируем переменные-кукисы
$c_UserName=prown\MakeCookie('UserName',"Гость",tStr,true);      // логин авторизованного посетителя
$c_PersName=prown\MakeCookie('PersName',"Гость",tStr,true);      // логин посетителя
$c_BrowEntry=prown\MakeCookie('BrowEntry',0,tInt,true);          // число запросов сайта из браузера
$c_PersEntry=prown\MakeCookie('PersEntry',0,tInt,true);          // счетчик посещений текущим посетителем
$с_ResCookie=prown\MakeCookie('ResCookie',rciCookiNo,tInt,true); // порядок использования кукисов 

$с_PageImg=prown\MakeCookie('PageImg','ittveme-Подъём-настроения.jpg',tStr,true); 
*/    
   $с_PageImg='ittveme-Подъём-настроения.jpg';
   $ImageFile='Images/'.$с_PageImg;
   
   /*
   echo '
   <style type="text/css">
      #Ext
      {
         top: 5%;
         height: 80%;
      }
   </style>
   ';
   */
   
?>
<div id="Ext" align="center">
   <?php
   //echo '<img src="'.$ImageFile.'" height="100%" align="center">';
   //echo '<img src="'.$ImageFile.'" width="100%">';
   echo '<img src="'.$ImageFile.'" height="100%">';
   ?>
</div>
<?php


// ************************************************************** index.php ***
