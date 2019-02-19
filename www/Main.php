<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Main.php ***

// ****************************************************************************
// * ittve.me                          Обо мне, путешествиях и ... Черногории *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 30.01.2019

session_start(); 

// Инициализируем корневой каталог сайта, надсайтовый каталог, каталог хостинга
require_once "iGetAbove.php";
$SiteRoot = $_SERVER['DOCUMENT_ROOT'];  // Корневой каталог сайта
$SiteAbove = iGetAbove($SiteRoot);      // Надсайтовый каталог
$SiteHost = iGetAbove($SiteAbove);      // Каталог хостинга

// Подключаем файлы библиотеки прикладных модулей
require_once $SiteHost."/TPhpPrown/getTranslit.php";
require_once $SiteHost."/TPhpPrown/getSiteDevice.php";
require_once $SiteHost."/TPhpPrown/MakeCookie.php";
require_once $SiteHost."/TPhpPrown/ViewGlobal.php";
require_once $SiteHost."/TPhpPrown/MakeUserError.php";

// Выполняем начальную инициализацию
require_once "Inimem.php";

// ***** Регистрируем новую загрузку страницы
// Изменяем счетчик запросов сайта из браузера       
$BrowEntry = $BrowEntry+1;
\prown\MakeCookie('BrowEntry',$BrowEntry); 
// Изменяем счетчик посещений текущим посетителем      
$PersEntry = $PersEntry+1;
\prown\MakeCookie('PersEntry',$PersEntry); 
// Изменяем счетчик посещений за сессию                 
$_SESSION['Counter']++;
// echo "Вы обновили эту страницу ".$_SESSION['Counter']." раз. ";
// echo "<br><a href=".$_SERVER['PHP_SELF'].">обновить"; 

// Если после авторизации изменилось имя пользователя,
// то перенастраиваем счетчики
if ($PersName<>$UserName)
{
   $PersEntry = 1;
   \prown\MakeCookie('PersEntry',$PersEntry); 
   $PersName=$UserName;
   \prown\MakeCookie('PersName',$PersName); 
}

// Разворачиваем страницу
require_once "iHtmlBegin.php";
\prown\MakeUserError('PersEntry1214',1);

// Выполняем начальную инициализацию
require_once "Site.php";

require_once "iHtmlEnd.php";

// *************************************************************** Main.php ***
