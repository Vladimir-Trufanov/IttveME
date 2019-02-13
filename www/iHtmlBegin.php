<?php
// PHP7/HTML5, EDGE/CHROME                               *** iHtmlBegin.php ***

// ****************************************************************************
// * ittve.me                                           Загрузить начало HTML * 
// *                              c подключением основного или мобильного CSS *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.01.2019
// Copyright © 2019 tve                              Посл.изменение: 06.02.2019

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
      <link rel="stylesheet" type="text/css" href="Styles/Styles.css">
      <link rel="stylesheet" type="text/css" href="Styles/styleSet.css">
      <?php require_once "iMobileStyles.php"; ?> 
      <?php require_once "iJsJquery.php"; ?> 
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
         
      <link rel="stylesheet" type="text/css" href="Styles/styleSet.css">

      <link rel="stylesheet" type="text/css" href="Styles/ImgRight.css">
      <link rel="stylesheet" type="text/css" href="Styles/CalcYes.css">
      <?php require_once "iJsJquery.php"; ?> 
   </head>

   <body>
  <?php
}
// <!-- -->
// ********************************************************* iHtmlBegin.php ***
