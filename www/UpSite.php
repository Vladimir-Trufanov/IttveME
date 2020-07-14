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






// Выбираем страницу с меню и рекламой
if (prown\isComRequest('LifeMenu','Com'))
{
   require_once "Html/iniHtmlLifeMenu.php";
   //require_once "iniHtml1.php";
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
// Выводим завершающие теги страницы
echo '</body>'; 
echo '</html>';

// ************************************************************* UpSite.php ***
