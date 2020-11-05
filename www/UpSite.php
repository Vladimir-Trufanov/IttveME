<?php
// PHP7/HTML5, EDGE/CHROME                                   *** UpSite.php ***

// ****************************************************************************
// * ittve.me            Разобрать параметры запроса и открыть страницу сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 14.07.2020

// Выводим начальные теги страницы
echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';
echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
// SeoTags()
echo '<title>Обо мне, путешествиях и ... Черногории</title>';
echo '<meta name="description" content="Труфанов Владимир Евгеньевич, его жизнь и жизнь его близких">';
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
/*
// Подключаем jQuery и jQuery-ui
echo '<link rel="stylesheet" type="text/css"
   href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
   <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
   </script>
   <script
      src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
      integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
      crossorigin="anonymous">
   </script>';
*/
// font-awesome/4.7.0
//echo '<link rel="stylesheet"'.
//   'href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">';
echo '<link rel="stylesheet"'.
   'href="font-awesome-4.7.0/css/font-awesome.min.css">';
   
// Проверяем не требуется ли просто вывести изображение и подключаем стили для него
$ImagePass=prown\getComRequest('Image');
if (!($ImagePass===NULL))
{
}
// Подключаем общие стили при показе статей
else
{
   echo '<link rel="stylesheet" type="text/css" href="Styles/iniStyles.css">';
   echo '<link rel="stylesheet" type="text/css" href="Styles/Styles.css">';
   echo '<link rel="stylesheet" type="text/css" href="Styles/styleSet.css">';
   echo '<link rel="stylesheet" type="text/css" href="Styles/CalcYes.css">';
   echo '<link rel="stylesheet" type="text/css" href="Styles/Img2Right.css">';
}
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
// При необходимости инициируем в сессии проверку JS
//
//$_SESSION['js'] = 'no'; 

//if (!isset($_SESSION['js']))
//{
?>
<!-- 
<script> 
   $(document).ready(function()
   { 
      $.get("DefineJs.php"); 
   });
</script> 
-->
<?php
//}

// Начинаем html-страницу
echo '</head>'; 
echo '<body>'; 

// Проверяем не требуется ли просто вывести изображение и выводим его
$ImagePass=prown\getComRequest('Image');
if (!($ImagePass===NULL))
{

// 1. ----- 2 курсора, можно будет переключаться  
/*
   //echo '$ImagePass='.$ImagePass.'<br>';
   //echo("Location: http://".$_SERVER['HTTP_HOST'].'/'.$ImagePass).'<br>';
   //Header("Location: http://".$_SERVER['HTTP_HOST'].'/'.$ImagePass);
   //echo '<img src="'.$ImagePass.'" alt="'.$ImagePass.'">';


list($width, $height, $type, $attr) = getimagesize($ImagePass);
   if ($width>$height)
   {
      // по ширине
      echo '
      <style type="text/css">
      #Ext
      {
         width: 60vw;
         margin-top: 2vw;
         margin-left: 5vw;
         background: red;
      }
      #ExtImg
      {
         width: 60vw;
      }
      </style>
      ';
   }
   else
   {
      // по высоте
      echo '
      <style type="text/css">
      #Ext
      {
         height: 90vh;
         background: red;
      }
      #ExtImg
      {
         height: 98vh;
      }
      </style>
      ';
   }

   echo '   
   <style type="text/css">
   body 
   { 
      cursor: url("Person.cur"), text;
   }
   a:hover 
   {
      cursor : url("Pin.cur"), auto;
   }
   </style>
   ';
   
  
    echo '   
   <li><a href="#">наведи курсор </a></li>
   <li><a href="#">наведи курсор</a></li>
   ';

   
   echo '<div id="Ext" align="center">';
   echo '<img id="ExtImg" src="'.$ImagePass.'">';
   echo '</div>';
*/

// 2. --------- фоны

/*
echo 'фоны='.$ImagePass.'<br>';
$ImagePass='example/image/a3.png';
echo 'фоны='.$ImagePass.'<br>';
echo '<img src="'.$ImagePass.'" alt="'.$ImagePass.'">';
*/
   /*
   echo '   
   <style type="text/css"> 
   body
   {
      background: url(example/image/a1.jpg) 90% 90% no-repeat fixed; 
      background-size: auto, auto, cover;
   }
   </style>
   ';
   */
   
      /*
      background: url(/example/image/a3.png) 90% 90% no-repeat fixed, 
                  url(/example/image/a2.png) 40% 40% no-repeat fixed, 
                  url(/example/image/a1.jpg) no-repeat fixed;
      background-size: auto, auto, cover;
      */

   echo '   
   <style type="text/css">
   body 
   {
      background: 
         url(/example/image/a3.png) 90% 90% no-repeat fixed, 
         url(/example/image/a2.png) 40% 40% no-repeat fixed, 
         url(/example/image/a1.jpg) no-repeat fixed;
         background-size: auto, auto, cover;
      animation: ball 40s linear infinite;
   }
   @keyframes ball 
   {
      from { background-position: 3000px 90%, 180% 40%, 0 0; }
      to { background-position: -2000px 90%, -300px 20%, 0 0; }
   }
   </style>
   ';
 

// 3. ----------
//echo '$_SESSION["js"]='.$_SESSION['js'].'<br>'; 

/*
// Выбираем страницу входа на сайт
if (prown\getComRequest('Com')==NULL)
{
   //echo 'Начальная страница!'.'<br>';

   //require_once "ViewExt.php";
   //ViewExt($с_PageImg,$SiteDevice,$c_PersName,$c_PersEntry,$c_BrowEntry);
}
else
{
*/
   //echo 'Страница: Com='.prown\getComRequest('Com').'<br>';



   // Для всех страниц, кроме начальной при отладке показываем возможность JS
   //if (isset($_SESSION['js']))
   //{
   //   echo 'Есть JS'.'<br>';
   //}
   //else
   //{
   //   echo 'Нет JS неТ'.'<br>';
   //}
   /*
   // При необходимости показываем кукисы и переменные сессий
   prown\ViewGlobal(avgSESSION);
   prown\ViewGlobal(avgCOOKIE);
   */


}
// Выводим другие страницы сайта
else
{
   // Выбираем страницу с меню и рекламой
   if (prown\isComRequest('LifeMenu','Com'))
   {
      //require_once "Html/iniHtmlLifeMenu.php";
      //require_once "iniHtml1.php";
      echo 'LifeMenu'.'<br>';
      //require_once "Nastr.php";
   }
   // Запускаем страницу с активным материалом
   else
   {
      //require_once "iniHtmlBegin.php";
      //require_once "iniHtml1.php";
      require_once "Site.php";
      //require_once "Nastr.php";
   }
}
/*
}
*/
// Выводим завершающие теги страницы
echo '</body>'; 
echo '</html>';
// <!-- --> **************************************************** UpSite.php ***
