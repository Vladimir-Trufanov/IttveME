<?php
// PHP7/HTML5, EDGE/CHROME                                *** UpSiteCSS.php ***

// ****************************************************************************
// * ittve.me                          Переключить общие и персональные стили *
// *                   при загрузке страниц в настольной или мобильной версии *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  11.11.2020
// Copyright © 2020 tve                              Посл.изменение: 19.02.2023

// ---------------------------------------------------------- HEAD and LAST ---
// Формируем общие начальные теги разметки страницы
echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';
echo '<meta http-equiv="content-type" content="text/html; charset=utf-8">';
$messRequest=SeoTags($ttl,$desc,$keys);
echo '<title>'.$ttl.'</title>';
echo '<meta name="description" content="'.$desc.'">';
echo '<meta name="keywords" content="'.$keys.'">';
// Выводим данные о favicon
echo '
<link rel="manifest" href="manifest.json">
<link rel="apple-touch-icon" sizes="180x180" href="/favicon260x260/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon260x260/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon260x260/favicon-16x16.png">
<link rel="mask-icon" href="/favicon260x260/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="/favicon260x260/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config" content="/favicon260x260/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
';

if ($SiteDevice<>Mobile)
{
   echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
}

// Подключаем font-awesome 4.7.0
echo '<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">';
// Подключаем jQuery 
echo '<script src="/jQuery/jquery-1.11.1.min.js"></script>';
echo '
    <link rel="stylesheet" type="text/css" href="/jQuery/jquery-ui.min.css">
    <script src="/jQuery/jquery-ui.min.js"></script>
';
// Подключаем базовый шрифт
/*
echo '
   <link rel="stylesheet"
   href="Styles/Anonymous_Pro?family=Anonymous+Pro:400,400i,700,700i&amp;
   subset=cyrillic">
';
*/
// Выполняем сброс стилей и устанавливаем начальные настройки стилей
echo '<link rel="stylesheet" type="text/css" href="Styles/iniStyles.css">';
// Позиционируем элементы, подключаем стили
echo '<link rel="stylesheet" type="text/css" href="Styles/Content.css">';
echo '<link rel="stylesheet" type="text/css" href="Styles/WorkTiny.css">';
echo '<link rel="stylesheet" type="text/css" href="ttools/TMenuLeader/MenuLeader.css">';
echo '<link rel="stylesheet" type="text/css" media="(max-device-width:802px)" href="Styles/mobile.css">';

// Подключаем скрипты внутренних классов 
echo '<script src="/ttools/TArticlesMaker/ArticlesMaker.js"></script>';
echo '<script src="/ttools/TKwinGallery/KwinGallery.js"></script>';
echo '<script src="/ttools/TViewImage/ViewImage.js"></script>';
echo '<script src="/Jsx/WorkTiny.js"></script>';
// Определяем письменный шрифт, который будем использовать для статей
// (! потом попробуем внедрить его в TinyMCE, пока для тега '<p>')
echo'  
   <style>
   @font-face 
   {
      font-family: Emojitveme; 
      src: url(Styles/Lobster.ttf); 
   }
   p 
   {
      font-family: Emojitveme;
   }
   </style>
';
// Формируем стили
setPositionDiv();
// Выбираем имя файла, если был запрос к сайту на вывод изображения,
// переключаем переменную-кукис на другой формат изображения: на странице 
// или полноформатное изображение                  
$ImageFile=prown\getComRequest('Image');
// Подключаем переменные JavaScript, соответствующие определениям в PHP
\prown\IniPrownJS();
DefineJS($SiteHost,$urlHome);
// Подключаем дополнительные совместные определения для модулей PHP и JS
require_once 'IttveMeDef.php';
DefinePHPtoJS();
// Определяем стили изображения в диалоговом окне
echo '<style>';
// Настраиваем диалоговое окно для изображения
echo '
   .ui-widget-header 
   {
      /*
      background:lightgreen;
      color:blue;
      font-size:20px;
      */
   }
';
// Если задан цветной фон, то его и готовим
if (isset($_COOKIE['PhoneImg'])&&($c_PhoneImg===fimColorGround))
{
   echo '
   #ImgDialogWind
   {
      background: url(Images/Anime/a1.jpg) 100% 100% no-repeat;
      background-size: cover;
   }';
}
// Если задана анимация, то её и готовим
else if (isset($_COOKIE['PhoneImg'])&&($c_PhoneImg===fimAnimation))
{
   echo '
   #ImgDialogWind
   {
      background: 
      url(Images/Anime/a3.png) 90% 90% no-repeat,
      url(Images/Anime/a2.png) 40% 40% no-repeat fixed, 
      url(Images/Anime/a1.jpg) 100% 100% no-repeat;
      background-size: auto, auto, cover;
      animation: ball 36s linear infinite;
   }
   @keyframes ball 
   {
      from {background-position: 1200px 90%, 180%  40%, 0 0; }
      to   {background-position: -400px 90%,-300px 20%, 0 0; }
   }';
}
// Иначе оставляем белый фон
else
{
   echo '
   #ImgDialogWind
   {
      background: white;
   }';
}
echo '</style>';
// Подключаем стили для редактирования материалов
$Edit->Init($aPresMode,$aModeImg,$aPhoneImg,$urlHome,moditap,$Duck,$a2048,$Hex,$Paired);
$note->Init();
echo '</head>'; 

// end ------------------------------------------------------ HEAD and LAST ---

// ****************************************************************************
// *         Определить изменяемые параметры текущего положения div-ов        *
// ****************************************************************************
function setPositionDiv()
{
   $c_PresMode=prown\MakeCookie('PresMode'); 
   //\prown\Alert('$c_PresMode='.$c_PresMode);
     
   //$c_PresMode=rpmOneRight;
   //$c_PresMode=rpmDoubleRight;
   //$c_PresMode=rpmOneLeft;
   //$c_PresMode=rpmDoubleLeft;
   // -------------------------------------------------------------------------
   // это вставка на случай, пока используется игра DuckFly 
   // (для игры нужно пространство, занимаемое двумя колонками)
   if ((\prown\isComRequest(mmlDobavitNovyjRazdel))
     ||(\prown\isComRequest(mmlOtpravitAvtoruSoobshchenie)))
   {
      if ($c_PresMode==rpmDoubleRight) rOneRight();
      else if ($c_PresMode==rpmDoubleLeft) rOneLeft();
      else if ($c_PresMode==rpmOneLeft) rOneLeft();
      else rOneRight();
   }
   // -------------------------------------------------------------------------
   // Если режим представления материалов = 'двухколоночный с правосторонней галереей')
   else if ($c_PresMode==rpmDoubleRight) rDoubleRight();
   // Если режим представления материалов = 'одноколоночный с левосторонней галереей')
   else if ($c_PresMode==rpmOneLeft) rOneLeft();
   // Если режим представления материалов = 'двухколоночный с левосторонней галереей')
   else if ($c_PresMode==rpmDoubleLeft) rDoubleLeft();
   // В остальных случаях = 'одноколоночный с правосторонней галереей')
   else rOneRight();
}
function rDoubleLeft()
{
   echo "<style>";
   echo "
      #News
      {
         display:block;
         left:67%;
         width:33%;
      }
      #Life
      {
         left:33%;
         width:34%;
      }
      #FooterTiny,#Info
      {
         left:33%;
      }
      #Gallery
      {
         left:0;
      }
   ";
   echo "</style>";
}
function rOneLeft()
{
   echo "<style>";
   echo "
      #News
      {
         display:none;
      }
      #Life,#FooterTiny,#Info
      {
         left:33%;
      }
      #Life
      {
         width:67%; 
      }
      #Gallery
      {
         left:0;
      }
   ";
   echo "</style>";
}
function rDoubleRight()
{
   echo "<style>";
   echo "
      #News
      {
         display:block;
         left:0;
         width:33%;
      }
      #Life
      {
         left:33%;
         width:34%;
      }
      #FooterTiny,#Info
      {
         left:0;
      }
      #Gallery
      {
         left:67%;
      }
   ";
   echo "</style>";
}
function rOneRight()
{
   echo "<style>";
   echo "
      #News
      {
         display:none;
      }
      #Life,#FooterTiny,#Info
      {
         left:0;
      }
      #Life
      {
         width:67%; 
      }
      #Gallery
      {
         left:67%;
      }
   ";
   echo "</style>";
}

// <!-- --> ************************************************* UpSiteCSS.php ***
