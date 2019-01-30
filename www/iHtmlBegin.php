<?php
// PHP7/HTML5, EDGE/CHROME                               *** iHtmlBegin.php ***

// ****************************************************************************
// * ittve.me                                           Загрузить начало HTML * 
// *                              c подключением основного или мобильного CSS *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  05.12.2018
// Copyright © 2019 tve                              Посл.изменение: 11.12.2018

if ($SiteDevice==Mobile) 
{   
   ?>
   <!DOCTYPE html>
   <html lang="ru">
   <head>
      <title>Обо мне и путешествиях на мобильном</title>
      <meta charset="utf-8">
      <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
      <meta name="description" content="Труфанов Владимир Евгеньевич, его жизнь и жизнь его близких">
      <meta name="keywords" content="Труфанов Владимир Евгеньевич, жизнь и увлечения">
      <link rel="stylesheet"
         href="https://fonts.googleapis.com/css?family=Anonymous+Pro:400,400i,700,700i&amp;
         subset=cyrillic">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:700">
      <link rel="stylesheet" 
         href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
      <link rel="stylesheet" type="text/css" href="Styles/Reset.css">
      <?php require_once "iMobileStyles.php"; ?> 
      <link rel="stylesheet" type="text/css" href="TJsPrown/TJsPrown.css">
   
      <script
         src="https://code.jquery.com/jquery-3.3.1.min.js"
         integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
         crossorigin="anonymous">
      </script>
      <script src="/TJsPrown/TJsPrown.js"></script>
      <script> MakeCatchyQuotes() </script>
   </head>

   <body>
   <?php
}
else 
{   
   ?>
   <!DOCTYPE html>
   <html lang="ru">
   <head>
      <title>Обо мне, путешествиях и ... Черногории</title>
      <meta charset="utf-8">
      <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
      <meta name="description" content="Труфанов Владимир Евгеньевич, его жизнь и жизнь его близких">
      <meta name="keywords" content="Труфанов Владимир Евгеньевич, жизнь и увлечения">
      <link rel="stylesheet"
         href="https://fonts.googleapis.com/css?family=Anonymous+Pro:400,400i,700,700i&amp;
         subset=cyrillic">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:700">
      <link rel="stylesheet" 
         href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
      <link rel="stylesheet" type="text/css" href="Styles/Reset.css">
      <link rel="stylesheet" type="text/css" href="Styles/Styles.css">
      <link rel="stylesheet" type="text/css" href="Styles/ImgRight.css">
      <link rel="stylesheet" type="text/css" href="Styles/styleSet.css">

      <link rel="stylesheet" type="text/css" href="TJsPrown/TJsPrown.css">
   
      <script
         src="https://code.jquery.com/jquery-3.3.1.min.js"
         integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
         crossorigin="anonymous">
      </script>
      <script src="/TJsPrown/TJsPrown.js"></script>
      <script> MakeCatchyQuotes() </script>
   </head>

   <body>
  <?php
}

// ********************************************************* iHtmlBegin.php ***
