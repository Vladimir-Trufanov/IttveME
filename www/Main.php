<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Main.php ***

// ****************************************************************************
// * ittve.me                          Обо мне, путешествиях и ... Черногории *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 11.07.2019

session_start(); 

// Подключаем файлы библиотеки прикладных модулей:
$TPhpPrown=$SiteHost.'/TPhpPrown';
require_once $TPhpPrown."/TPhpPrown/CommonPrown.php";
require_once $TPhpPrown."/TPhpPrown/getTranslit.php";
require_once $TPhpPrown."/TPhpPrown/MakeCookie.php";
require_once $TPhpPrown."/TPhpPrown/MakeSession.php";
require_once $TPhpPrown."/TPhpPrown/MakeUserError.php";
require_once $TPhpPrown."/TPhpPrown/ViewGlobal.php";

// Выполняем начальную инициализацию
require_once "iniMem.php";

// Изменяем счетчик запросов сайта из браузера и, таким образом,       
// регистрируем новую загрузку страницы
$c_BrowEntry=prown\MakeCookie('BrowEntry',$c_BrowEntry+1,tInt);  
// Изменяем счетчик посещений текущим посетителем      
$c_PersEntry=prown\MakeCookie('PersEntry',$c_PersEntry+1,tInt);
// Изменяем счетчик посещений за сессию                 
$s_Counter=prown\MakeSession('Counter',$s_Counter+1,tInt);   
// echo "Вы обновили эту страницу ".$_SESSION['Counter']." раз. ";
// echo "<br><a href=".$_SERVER['PHP_SELF'].">обновить"; 
// Если после авторизации изменилось имя пользователя,
// то перенастраиваем счетчики и посетителя
if ($c_PersName<>$c_UserName)
{
   $c_PersEntry=prown\MakeCookie('PersEntry',1,tInt);
   $s_Counter=prown\MakeSession('Counter',1,tInt); 
   $c_PersName=prown\MakeCookie('PersName',$c_UserName,tStr);
}
   
   require_once "iniHtmlBegin.php";
   //require_once "iniHtml1.php";
   require_once "UpSite.php";
   require_once "iniHtmlEnd.php";
   
   // При необходимости выводим дополнительную информацию
   // Header("Content-type: text/plain");
   // $headers = getallheaders();
   // print_r($headers);
   // print_r($_SERVER);

// *************************************************************** Main.php ***
