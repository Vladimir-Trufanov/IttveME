<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Main.php ***

// ****************************************************************************
// * ittve.me      Подключить модули сайта, выполнить начальную инициализацию *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 17.10.2022

// Указываем размещение библиотеки и подключаем прикладные функции TPhpPrown
define ("pathPhpPrown",$SiteHost.'/TPhpPrown/TPhpPrown');
require_once pathPhpPrown."/CommonPrown.php";
require_once pathPhpPrown."/getTranslit.php";
require_once pathPhpPrown."/MakeCookie.php";
require_once pathPhpPrown."/MakeSession.php";
require_once pathPhpPrown."/MakeUserError.php";
require_once pathPhpPrown."/ViewGlobal.php";
require_once pathPhpPrown."/ViewSimpleArray.php";
// Указываем размещение библиотеки и подключаем прикладные классы TPhpTools
define ("pathPhpTools",$SiteHost.'/TPhpTools/TPhpTools');
require_once pathPhpTools."/iniToolsMessage.php";
require_once pathPhpTools."/TUploadToServer/UploadToServerClass.php";
require_once pathPhpTools."/TPageStarter/PageStarterClass.php";
//require_once pathPhpTools."/TBaseMaker/BaseMakerClass.php";
   
// Выполняем запуск сессии и начальную инициализацию
$oMainStarter = new PageStarter('ittveme','ittve-log');

// Выполняем начальную инициализацию
require_once "Common.php";     // Всегда 1-ый корневой модуль в списке
require_once "iniMem.php";     // Всегда 2-ой корневой модуль в списке
require_once "DebugNews.php";

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
 * Первая загрузка сайта (и настольная, и мобильная) выполняется в упрощенной 
 * версии (как без кукисов и без javascript):
 * слева 2/3 экрана статья, справа 1/3 экрана галерея, шрифт статьи 
 * соответствует шрифту подписей к фотографиям.
 * 
 * Разметка сайта единая и для настольной версии, и для мобильной. Настройка 
 * изображений и форматирование текстов через CSS.
 * 
 * При запросе любой страницы сайта с контентом присутствует параметр "Com",
 * например:                                       https://ittve.me/?Com=Uslugi
 * 
 * в запросе начальной страницы сайта параметры отсутствуют:   https://ittve.me
 * 
 * Два рабочих каталога используются для контента:
 *     ittveLife - каталог (совместно с базой статей) архивных изображений;
 *     ittveNews - каталог редактируемой статьи и её изображений.
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
 * Главное меню (отдельная страница) разворачивается на переднем плане.
 * Прежняя часть сайта становится фоном и горит слабым цветом.
 * 
**/

// *************************************************************** Main.php ***
