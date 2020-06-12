<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Main.php ***

// ****************************************************************************
// * ittve.me                          Обо мне, путешествиях и ... Черногории *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 30.01.2019

session_start(); 

// Подключаем файлы библиотеки прикладных модулей:
$TPhpPrown=$SiteHost.'/TPhpPrown';
require_once $TPhpPrown."/TPhpPrown/CommonPrown.php";
require_once $TPhpPrown."/TPhpPrown/getTranslit.php";
require_once $TPhpPrown."/TPhpPrown/MakeCookie.php";
require_once $TPhpPrown."/TPhpPrown/ViewGlobal.php";
require_once $TPhpPrown."/TPhpPrown/MakeUserError.php";

// Выполняем начальную инициализацию
require_once "iniMem.php";

// ***** Регистрируем новую загрузку страницы
// Изменяем счетчик запросов сайта из браузера       
$BrowEntry = $BrowEntry+1;
prown\MakeCookie('BrowEntry',$BrowEntry); 
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

   require_once "iniHtmlBegin.php";
   //\prown\MakeUserError('Это пользовательское сообщение','ITtveME');
   //$i=0;
   //$j=1/$i;
   require_once "includErrs.php";
   require_once "Site.php";
   require_once "iniHtmlEnd.php";
   
   // При необходимости выводим дополнительную информацию
   // Header("Content-type: text/plain");
   // $headers = getallheaders();
   // print_r($headers);
   // print_r($_SERVER);

// *************************************************************** Main.php ***
