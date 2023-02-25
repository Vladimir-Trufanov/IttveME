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
// SeoTags()
echo '<title>Обо мне, путешествиях и ... Черногории</title>';
echo '<meta name="description" content="Труфанов Владимир Евгеньевич, его жизнь и увлечения, жизнь его близких">';
echo '<meta name="keywords" content="Труфанов Владимир Евгеньевич, жизнь и увлечения">';
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
// Подключаем font-awesome 4.7.0
echo '<link rel="stylesheet" '.'href="font-awesome-4.7.0/css/font-awesome.min.css">';
// Подключаем jQuery 
echo 
   '<link rel="stylesheet" type="text/css" href="/jQuery/jquery-ui.min.css">
    <script src="/jQuery/jquery-3.6.3.min.js"></script>
    <script src="/jQuery/jquery-ui.min.js"></script>';
// Подключаем базовый шрифт
echo '
   <link rel="stylesheet"
   href="Styles/Anonymous_Pro?family=Anonymous+Pro:400,400i,700,700i&amp;
   subset=cyrillic">
';
// Выполняем сброс стилей и устанавливаем начальные настройки стилей
echo '<link rel="stylesheet" type="text/css" href="Styles/iniStyles.css">';
// Позиционируем справа галерею изображений и делам только одну колонку для 
// статей. Выполняем общее фиксирование элементов разметки  
echo '<link rel="stylesheet" type="text/css" href="Styles/Content.css">';
// Выстраиваем стили подвала сайта и информационной полосы
echo '<link rel="stylesheet" type="text/css" href="Styles/Footer-Info.css">';
// Подключаем стили внутренних классов 
echo '<link rel="stylesheet" type="text/css" href="ttools/TMenuLeader/MenuLeader.css">';
echo '<link rel="stylesheet" type="text/css" href="ttools/TArticlesMaker/ArticlesMaker.css">';
echo '<link rel="stylesheet" type="text/css" href="Styles/WorkTiny.css">';
// Подключаем скрипты внутренних классов 
echo '<script src="/ttools/TArticlesMaker/ArticlesMaker.js"></script>';
echo '<script src="/ttools/TKwinGallery/KwinGallery.js"></script>';
echo '<script src="/Jsx/WorkTiny.js"></script>';

/*
// Определяем стили галлереи, определяем стили для показа изображения, 
// выбранной в галерее картинки, на отдельной странице в ее рамках 
// или в натуральную величину 
echo '<link rel="stylesheet" type="text/css" href="Styles/Gallery-Image.css">';
// Определяем стили меню статей (материалов) 
echo '<link rel="stylesheet" type="text/css" href="Styles/MenuArticles.css">';
// Определяем стили страницы редактирования материалов
echo '<link rel="stylesheet" type="text/css" href="Styles/EditText.css">';
*/

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

// Если выбрана страница с главным меню, то создаем объекты для работы с меню,
// выборкой юникодов и формируем стили разметки
//if (prown\isComRequest(mmlZhiznIputeshestviya))
//{
   //$Unicoder=new ttools\UnicodeUser('Emojitveme'); 
   //$Arti=new ttools\ArticlesMaker($basename,$username,$password);
//}
// --- Формируем стили --------------------------------------------------------
echo "<style>";
// Позиционируем колонки материалов и новостей
// (если работает двухколоночный режим, но новости не должны просматриваться,
// то делаем размеры колонки новостей нулевыми)
if ($c_PresMode==rpmDoubleLeft)
{
   if (isNoNewsDouble($c_PresMode))
   {
      echo "
         #News{right:0; width:0;}
         #Life{right:0;width:67%;}
      ";
   }
   else
   {
      echo "
         #News{right:0;width:33%;}
         #Life{right:33%;width:34%;}
      ";
   } 
}
else if ($c_PresMode==rpmDoubleRight)
{
   if (isNoNewsDouble($c_PresMode))
   {
      echo "
         #News{right:0;width:0;}
         #Life{right:33%;width:67%;}
      ";
   }
   else
   {
      echo "
         #News{right:67%;width:33%;}
         #Life{right:33%;width:34%;}
      ";
   } 
}
else if ($c_PresMode==rpmOneLeft)
{
   echo "
   #Life
   { 
      left:33%;
      width:67%; 
   }
   ";
}
else
   echo "
   #Life
   { 
      right:33%;
      width:67%; 
   }
   ";
// Позиционируем подвальную часть при правосторонней галерее
if (($c_PresMode==rpmDoubleRight)||($c_PresMode==rpmOneRight))
{
   echo "
   #Footer,#Info
   { 
      right:33%;
      width:67%; 
   }
   #Gallery,#EditGallery
   {
      margin-left:67%;
      width:33%;
   }
   #RightFooter
   {
      right:33%;
   }
   ";
}
// Позиционируем подвальную часть при левосторонней галерее
// rpmDoubleLeft или rpmOneLeft
else
{
   echo "
   #Footer,#Info
   { 
      left:33%;
      width:67%; 
   }
   #Gallery,#EditGallery
   {
      margin-right:67%;
      width:33%;
   }
   #RightFooter
   {
      right:0;
   }
   ";
}
// Делаем настройки при заходе в режим редактирования
if (prown\isComRequest(mmlSozdatRedaktirovat))
{
   /*
   // Настраиваем див всплывающего окна
   // Подключаем TinyMCE
   echo '
   <script src="/TinyMCE5-8-1/tinymce.min.js"></script>
   <script>tinymce.init
   ({
        selector: "#TinyArea",
        height: 560,
        width:  820,
        content_css: "/Styles/TinyMCE.css",
        
        plugins:
        [ 
            "advlist autolink link image imagetools lists charmap print preview hr anchor",
            "pagebreak spellchecker searchreplace wordcount visualblocks",
            "visualchars code fullscreen insertdatetime media nonbreaking",
            // "contextmenu",  // отключено для TinyMCE5-8-1
            // "textcolor",    // отключено для TinyMCE5-8-1
            "save table directionality emoticons template paste"
        ],
        
        language: "ru",
        toolbar:
        [
            "| link image | forecolor backcolor emoticons"
        ],
        //toolbar:
        //[
        //    "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons"
        //],
        image_list: [
          {title: "My image 1", value: "KwinTiny/proba.jpg"},
          {title: "My image 2", value: "http://www.moxiecode.com/my2.gif"}
        ],
        a_plugin_option: true,
        a_configuration_option: 400
   });
   </script>
   ';
   */
}  
// Выбираем имя файла, если был запрос к сайту на вывод изображения,
// переключаем переменную-кукис на другой формат изображения: на странице 
// или полноформатное изображение                  
$ImageFile=prown\getComRequest('Image');
// Завершаем стили 
echo "</style>";
/*
// Подключаем TJsPrown и TJsTools
echo '
   <link rel="stylesheet" type="text/css" 
   href="TJsPrown/TJsPrown.css">
   <script 
      src="/TJsPrown/TJsPrown.js">
   </script>
';
*/
// Назначаем режим работы с галереей (просмотр или редактирование)
define ("GalleryMode",setGalleryMode());   
// Подключаем стили для редактирования материалов
$Edit->IniEditSpace();
$note->Init();
// Подключаем переменные JavaScript, соответствующие определениям в PHP
DefineJS();
echo '</head>'; 
// end ------------------------------------------------------ HEAD and LAST ---

// ****************************************************************************
// *               На основании указанных параметров запроса страницы         *
// *                     определяем режим просмотра галереи                   *
// ****************************************************************************
function setGalleryMode()
{
   // По умолчанию считаем режим просмотра галереи
   $Result=mwgViewing;
   if (
     (prown\isComRequest(mmlSozdatRedaktirovat))||
     (prown\isComRequest(mmlVybratStatyuRedakti))||
     (prown\isComRequest(mmlNaznachitStatyu))
   ) $Result=mwgEditing;   
   else if (
     (prown\isComRequest(mmlVernutsyaNaGlavnuyu))||
     (prown\isComRequest(mmlUdalitMaterial))||
     (prown\isComRequest(mmlZhiznIputeshestviya))
   ) $Result=mwgViewing; 
   return $Result;  
}

// <!-- --> ************************************************* UpSiteCSS.php ***
