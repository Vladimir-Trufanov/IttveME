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
// Данные о favicon
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

// font-awesome/4.7.0
echo '<link rel="stylesheet"'.
   'href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">';
// Общие стили
echo '<link rel="stylesheet" type="text/css" href="Styles/iniStyles.css">';
// Подключаем TJsPrown и TJsTools
echo '
   <link rel="stylesheet" type="text/css" 
   href="TJsPrown/TJsPrown.css">
   <script 
      src="/TJsPrown/TJsPrown.js">
   </script>
';


  ?>
  <script type="text/javascript"> 
    $(document).ready(function()
    { 
      $.get("myPage.php"); 
    });
  </script> 

<?php
// Начинаем html-страницу
echo '</head>'; 
echo '<body>'; 
?>
<noscript>
   У Вас отключён JavaScript!
</noscript>
<script>
   document.write("У Вас включён JavaScript!");
</script>

<!-- -->

<?php
   /* 
   if(!isset($_SESSION['js'])||$_SESSION['js']=="")
   { 
      //echo "<noscript><meta http-equiv='refresh' content='0;url=/get-javascript-status.php&js=0'> </noscript>";
      //echo "<noscript><meta http-equiv='refresh' content='0;url=/gj.php&js=0'></noscript>";
      echo "<noscript><meta http-equiv='refresh' content='0; url=/gj.php'></noscript>";
      $js = true; 
   }
   elseif(isset($_SESSION['js'])&& $_SESSION['js']=="0")
   { 
      $js = false; 
      $_SESSION['js']=""; 
   }
   elseif(isset($_SESSION['js'])&& $_SESSION['js']=="1")
   { 
      $js = true; 
      $_SESSION['js']=""; 
   } 
   if ($js) 
   { 
      echo 'Javascript is enabled'; 
   } 
   else 
   { 
      echo 'Javascript is disabled'; 
   } 
   */
?> 


<?php


 

// Выбираем страницу входа на сайт
$Requ=prown\getComRequest('Com'); 
if ($Requ==NULL)
{
   //echo 'NULL';
   require_once "ViewExt.php";
   ViewExt($с_PageImg,$SiteDevice,$c_PersName,$c_PersEntry,$c_BrowEntry);
}
else
{
  // Выбираем страницу с меню и рекламой
   if (prown\isComRequest('LifeMenu','Com'))
   {
      if (isset($_SESSION['js']))
      {
         echo 'Есть JS'.'<br>';
      }
      else
      {
         echo 'Нет JS неТ'.'<br>';
      }
      require_once "Html/iniHtmlLifeMenu.php";
      //require_once "iniHtml1.php";
      /*
      if (isset($_SESSION['js']))
      {
         echo 'Есть JS'.'<br>';
      }
      else
      {
         echo 'Нет JS неТ'.'<br>';
      }
      */
      prown\ViewGlobal(avgSESSION);
      prown\ViewGlobal(avgCOOKIE);
      echo 'LifeMenu'.'<br>';
      //require_once "Nastr.php";
   }
   // Запускаем страницу с активным материалом
   else
   {
      require_once "iniHtmlBegin.php";
      //require_once "iniHtml1.php";
      echo 'Привет'.'<br>';
      require_once "Site.php";
      //require_once "Nastr.php";
   }
}
// Выводим завершающие теги страницы
echo '</body>'; 
echo '</html>';

// ************************************************************* UpSite.php ***
