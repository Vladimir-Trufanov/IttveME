<?php
// PHP7/HTML5, EDGE/CHROME                                    *** index.php ***

// ****************************************************************************
// * ittve.me                                   Труфанов Владимир Евгеньевич, *
// *                                 его жизнь и увлечения, жизнь его близких *
// ****************************************************************************

// v3.0, 19.02.2023                                   Автор:      Труфанов В.Е.
// Copyright © 2019 tve                               Дата создания: 13.01.2019

/**
 * Сайт работает следующим образом:
 * 
 * Представление материалов на странице сайта, может быть одноколоночным с 
 * галереей изображений (по умолчанию) и двухколоночным. Определены четыре
 * режима представления материалов: двухколоночный с правосторонней галереей,
 * двухколоночный с левосторонней галереей, одноколоночный с правосторонней 
 * галереей (по умолчанию), одноколоночный с левосторонней галереей.
 * 
 * Как правило, в одной из колонок размещается активная (текущая) статья сайта,
 * а в галерее показаны изображения, связанные со статьей (ближней к галерее 
 * изображений).
 * 
 * Активная статья сайта может находиться в двух состояниях: просмотра и 
 * редактирования.
 * 
 * В ПЕРСПЕКТИВЕ: вторая колонка на странице сайта появляется в том случае, 
 * когда на сайт загружаются новости с других сайтов (в том числе с сайтов 
 * платформы ITTVE).
 * 
 * Первая загрузка сайта (и настольная, и мобильная) выполняется в упрощенной 
 * версии (как без кукисов и без javascript): слева 2/3 экрана статья, справа 
 * 1/3 экрана галерея, шрифт статьи соответствует шрифту подписей к 
 * фотографиям.
 * 
 * Разметка сайта единая и для настольной версии, и для мобильной. Настройка 
 * изображений и форматирование текстов через CSS.
 * 
 * При запросе любой страницы сайта с контентом присутствует параметр "Com",
 * например: https://ittve.me/?Com=LifeMenu (запрос страницы с меню и рекламой).
 * 
 * В запросе начальной страницы сайта параметры отсутствуют: https://ittve.me
 * 
 * Три рабочих каталога используются для контента:
 *     ittveLife - каталог активной статьи сайта и её изображений;
 *     ittveEdit - каталог редактируемой статьи и её изображений;
 *     ittveNews - каталог сборной новостной статьи.
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

//require_once "ini.php"; 
   $page='/Pages/Proba/ProbaTest.php';
   Header("Location: http://".$_SERVER['HTTP_HOST'].$page);

echo 'Ghbdtn!';  


/*
// Инициализируем рабочее пространство: корневой каталог сайта и т.д.
require_once 'iniWorkSpace.php';
$_WORKSPACE=iniWorkSpace();

$SiteRoot     = $_WORKSPACE[wsSiteRoot];     // Корневой каталог сайта
$SiteAbove    = $_WORKSPACE[wsSiteAbove];    // Надсайтовый каталог
$SiteHost     = $_WORKSPACE[wsSiteHost];     // Каталог хостинга
$SiteDevice   = $_WORKSPACE[wsSiteDevice];   // 'Computer' | 'Mobile' | 'Tablet'
$UserAgent    = $_WORKSPACE[wsUserAgent];    // HTTP_USER_AGENT
$urlHome      = $_WORKSPACE[wsUrlHome];      // Начальная страница сайта 

// Подключаем сайт сбора сообщений об ошибках/исключениях и формирования 
// страницы с выводом сообщений, а также комментариев для PHP5-PHP7
require_once $SiteHost."/TDoorTryer/DoorTryerPage.php";
try 
{
   // ---------------------------------------------------------------- ZERO ---
   // Выполняем начальную инициализацию
   require_once "iniMem.php"; 
   // Заносим в кукисы новые настройки                    
   UpdateTune($urlHome,$c_PresMode,$c_ModeImg,$aPresMode,$aModeImg);
   // ------------------------------------------------------- HEAD and LAST ---
   // Подключаем персональные стили для настольной и мобильной версий
   require_once "UpSiteCSS.php";
   // ---------------------------------------------------------------- BODY ---
   // Обеспечиваем, при необходимости, вывод отладочной информации
   // на текущей странице
   require_once "ToPlugDebug.php";  
   // Разбираем параметры запроса,
   // запускаем общую оболочку и настройку страниц сайта
   require_once "UpSite.php";
}
catch (E_EXCEPTION $e) 
{
   // ПОМНИТЬ(16.02.2019)! Если в коде сайта включается своя обработка исключений,
   // то управление выводом ошибок display_errors на сайте NIC.RU отключается и
   // работает только error_reporting (нужно разрешить обработку всех ошибок)
   
   // Подключаем обработку исключений верхнего уровня
   DoorTryPage($e);
}
// ****************************************************************************
// *                      Занести в кукисы новые настройки                    *
// ****************************************************************************
function UpdateTune($urlHome,&$c_PresMode,&$c_ModeImg,$aPresMode,$aModeImg)
{
   $MakeIs=false;
   // Изменяем режим представления материалов по полученному параметру
   $i=prown\getComRequest('pPresMode');
   if (isset($aPresMode[$i]))
   {
      $c_PresMode=prown\MakeCookie('PresMode',$aPresMode[$i],tStr);   
      $MakeIs=true;
   }
   // Изменяем режим представления выбранной картинки
   $i=prown\getComRequest('pModeImg');
   if (isset($aModeImg[$i]))
   {
      $c_ModeImg=prown\MakeCookie('ModeImg',$aModeImg[$i],tStr);   
      $MakeIs=true;
   }
}
*/


/*
  Тестирование                                           - HTML -     - CSS -   
-------------------------------------------------------------------------------
https://www.ittve.me/                                   22.11.2022 - 22.11.2022 
https://www.ittve.me/zhizn-i-puteshestviya              22.11.2022 - 22.11.2022 
https://www.ittve.me/sozdat-material-ili-redaktirovat   xx.11.2022 - 22.11.2022
*/

?> <!-- --> <?php // ******************************************** index.php ***
