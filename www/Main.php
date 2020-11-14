<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Main.php ***

// ****************************************************************************
// * ittve.me      Подключить модули сайта, выполнить начальную инициализацию *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 27.10.2020

session_start(); 

// Подключаем файлы библиотеки прикладных модулей:
$TPhpPrown=$SiteHost.'/TPhpPrown';
require_once $TPhpPrown."/TPhpPrown/CommonPrown.php";
require_once $TPhpPrown."/TPhpPrown/getTranslit.php";
require_once $TPhpPrown."/TPhpPrown/MakeCookie.php";
require_once $TPhpPrown."/TPhpPrown/MakeSession.php";
require_once $TPhpPrown."/TPhpPrown/MakeUserError.php";
require_once $TPhpPrown."/TPhpPrown/ViewGlobal.php";
require_once $TPhpPrown."/TPhpPrown/ViewSimpleArray.php";

// Выполняем начальную инициализацию
require_once "Common.php";
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
   
require_once "UpSite.php";
   
// При необходимости выводим дополнительную информацию
// Header("Content-type: text/plain");
// $headers = getallheaders();
// print_r($headers);
// print_r($_SERVER);

/**
 * Сайт работает следующим образом:
 * 
 * Первая настольная загрузка сайта выполняется в упрощенной версии:
 * слева 2/3 экрана статья, справа 1/3 экрана галерея, шрифт статьи 
 * соответствует шрифту подписей к фотографиям. Без JavaScript. 
 * 
 * Мобильная загрузка сайта работает только с использование JQuery Mobile.
 * Если JScript не работает, то фотография и предупреждение: 
 * "Для работы сайта, необходимо разрешить в браузере JavaScript"
 * 
**/

/*
 * При первой загрузке сайта в сессии, выполняются работы по подготовке того, 
 * чтобы при загрузке страниц с контентом было известно, включены ли кукисы и
 * разрешена ли работа javascript.
 * 
 * При запросе любой страницы сайта с контентом присутствует параметр "Com",
 * например:                                       https://ittve.me/?Com=Uslugi
 * 
 * в запросе начальной страницы сайта параметры отсутствуют:   https://ittve.me
 * 
 * --- Когда скрипты отсутствуют, то изображение сайта черно-белое, сайт 
 * строится только на CSS. В этом случае горит информационная строка 
 * "Использование Javascript в Вашем браузере запрещено, выполняется упрощенная 
 * версия сайта!"
 * 
 * --- Когда кукисы отсутствуют, то изображение сайта малиново-белое, сайт 
 * строится только на CSS. В этом случае горит информационная строка "Кукисы в 
 * Вашем браузере отключены, выполняется упрощенная версия сайта!"
 * 
 * --- Когда кукисы отключены пользователем (или не получено подтверждение от
 * пользователя), то изображение сайта коричнево-белое, сайт строится только на 
 * CSS. В этом случае горит информационная строка с вопросом для ответа
 * "Разрешить использование кукисов для Вашего удобства?"
 * 
*/

/*
 * Главное меню (отдельная страница) разворачивается на переднем плане.
 * Прежняя часть сайта становится фоном и горит слабым цветом.
 * Сайт работает следующим образом:
 * 
*/

// *************************************************************** Main.php ***
