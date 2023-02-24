<?php 
// PHP7/HTML5, EDGE/CHROME                                   *** iniMem.php ***

// ****************************************************************************
// * ittve.me                                           Определить константы, *
// *                              проинициализировать общесайтовые переменные *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 24.02.2023

require_once "Common.php";  
// --------------------------------- Межязыковые (PHP-JScript) определения  ---

define ("RootDir",              $_SERVER['DOCUMENT_ROOT']); 
define ("oriLandscape", 'landscape');     // Ландшафтное расположение устройства
define ("oriPortrait",  'portrait');      // Портретное расположение устройства
  
define ("nstNoVyb",     "не выбрано");     
define ("nstNoNaz",     "не назначено");
define ("nstErr",       'произошла ошибка');  
define ("jsxdir",       'Jsx');                            // каталог файлов на javascript

// Определения сообщений для PHP
define ("ajSuccess",            "Функция/процедура выполнена успешно");     
define ("ajTransparentSuccess", "Преобразование к прозрачному виду успешно");
define ("ajUndeletionOldFiles", "Ошибка удаления старых файлов");

function DefineJS()
{
   // Переменные JavaScript, соответствующие определениям сообщений в PHP
   $define=
   '<script>'.
   'RootDir="'             .RootDir.'";'.
   'nstNoVyb="'            .nstNoVyb.'";'.
   'nstNoNaz="'            .nstNoNaz.'";'.
   'nstErr="'              .nstErr.'";'.

   'ajSuccess="'           .ajSuccess.           '";'.
   'ajTransparentSuccess="'.ajTransparentSuccess.'";'.
   'ajUndeletionOldFiles="'.ajUndeletionOldFiles.'";'.
   '</script>';
   echo $define;
}   

// ------------------------------------------------------------------- ZERO ---

// Инициализируем общесайтовые константы (здесь стараемся не назначать константу = 0, так как 
// проверка значению "==" может не отличить 0 от NULL)
define("pathPhpPrown", $SiteHost.'/TPhpPrown/TPhpPrown'); // место размещения библиотеки прикладных функций TPhpPrown
define("pathPhpTools", $SiteHost.'/TPhpTools/TPhpTools'); // место размещения библиотеки прикладных классов TPhpTools
define("articleSite",  'IttveMe');                        // тип базы данных для управления классом ArticlesMaker 
define("editdir",      'ittveEdit');                      // каталог файлов, связанных c материалом
define("stylesdir",    'Styles');                         // каталог стилей элементов разметки и фонтов
define("imgdir",       'Images');                         // каталог служебных изображений
define ("ChangeSize",  "chs");                            // "Изменить размер базового шрифта"  
define('nym',          'ittve');                          // префикс имен файлов для фотографий галереи и материалов

//define ("dirLife", "ittveLife"); // каталог активной статьи сайта и её изображений
//define ("dirEdit", "ittveEdit"); // каталог редактируемой статьи и её изображений
//define ("dirNews", "ittveNews"); // каталог сборной новостной статьи

/*
// ---------------------- Регулятор кукисов (порядок использования кукисов) ---
define ("rciCookiNo", 1);        // кукисов нет, выдать сообщение
define ("rciCookiNoMes", 2);     // кукисов нет, выдано сообщение
define ("rciCookiUserNo", 3);    // есть, пользователем запрещено использование
define ("rciCookiUserYes", 4);   // пользователем разрешено использование кукисов
// ---------------------- Регулятор кукисов (порядок использования кукисов) ---
define ("rciCookiNo", 1);        // кукисов нет, выдать сообщение
define ("rciCookiNoMes", 2);     // кукисов нет, выдано сообщение
define ("rciCookiUserNo", 3);    // есть, пользователем запрещено использование
define ("rciCookiUserYes", 4);   // пользователем разрешено использование кукисов
// ---------------------------------------- Сообщения по регулятору кукисов ---
define ("mesCookiNo", 1);        // Сообщение не выводить
define ("mesCookiNoMes", 2);     // "Кукисы в Вашем браузере отключены, выполняется упрощенная версия сайта!"
define ("mesCookiUserNo", 3);    // "Разрешить использование кукисов для Вашего удобства?" 
define ("mesCookiUserYes", 4);   // Сообщение не выводить
*/

// ------------------------------------ Тексты запросов для меню управления ---
define ('mmlZhiznIputeshestviya',        'zhizn-i-puteshestviya');   

define ('mmlOtpravitAvtoruSoobshchenie', 'otpravit-avtoru-soobshchenie');   
define ('mmlIzmenitNastrojkiSajta',      'izmenit-nastrojki-sajta-v-brauzere');    
define ('mmlVojtiZaregistrirovatsya',    'vojti-ili-zaregistrirovatsya');     
define ('mmlSozdatRedaktirovat',         'sozdat-material-ili-redaktirovat'); 

define ('mmlVernutsyaNaGlavnuyu',        'vernutsya-na-glavnuyu-stranicu');   
define ('mmlDobavitNovyjRazdel',         'dobavit-novyj-razdel-materialov');    
define ('mmlIzmenitNazvanieIkonku',      'izmenit-nazvanie-razdela-ili-ikonku');     
define ('mmlUdalitRazdelMaterialov',     'udalit-razdel-materialov'); 

define ('mmlVybratStatyuRedakti',        'vybrat-statyu-dlya-redaktirovaniya');
define ('mmlNaznachitStatyu',            'naznachit-statyu');
define ('mmlUdalitMaterial',             'udalit-material');

// ----------- Режимы представления материалов = Content Presentation Modes ---
define ("rpmDoubleRight", 'двухколоночный с правосторонней галереей');   
define ("rpmDoubleLeft",  'двухколоночный с левосторонней галереей');    
define ("rpmOneRight",    'одноколоночный с правосторонней галереей');     
define ("rpmOneLeft",     'одноколоночный с левосторонней галереей'); 
// Определяем массив режимов представления материалов
$aPresMode=['1'=>rpmDoubleRight,'2'=>rpmDoubleLeft,'3'=>rpmOneRight,'4'=>rpmOneLeft]; 
// -------------------------------- Режимы представления выбранной картинки ---
define ("vimExiSize",     'в заданном размере в пикселах ("как есть")');   
define ("vimOnPage",      'на странице по высоте');   
// Определяем массив режимов представления выбранной картинки    
$aModeImg=['1'=>vimExiSize,'2'=>vimOnPage]; 
/*
// --------------------------------- Фоны показываемых картинок/изображений ---
define ("fimWhiteGround", 1);    // обычный белый фон 
define ("fimColorGround", 2);    // фон с помощью цветной картинки
define ("fimAnimation",   3);    // анимационный фон
*/

// Подключаем прикладные функции TPhpPrown
require_once pathPhpPrown."/CommonPrown.php";
require_once pathPhpPrown."/getTranslit.php";
require_once pathPhpPrown."/iniConstMem.php";
require_once pathPhpPrown."/MakeCookie.php";
require_once pathPhpPrown."/MakeSession.php";
require_once pathPhpPrown."/ViewGlobal.php";
//require_once pathPhpPrown."/MakeUserError.php";
//require_once pathPhpPrown."/ViewSimpleArray.php";

// Подключаем прикладные классы TPhpTools
require_once pathPhpTools."/TPageStarter/PageStarterClass.php";
require_once pathPhpTools."/TNotice/NoticeClass.php";
//require_once pathPhpTools."/iniToolsMessage.php";
//require_once pathPhpTools."/TUploadToServer/UploadToServerClass.php";
//require_once pathPhpTools."/TUnicodeUser/UnicodeUserClass.php";
   
// Подключаем внутренние классы
require_once "ttools/TMenuLeader/MenuLeaderClass.php";
require_once "ttools/TArticlesMaker/ArticlesMakerClass.php";
require_once "ttools/TTinyGallery/TinyGalleryClass.php";
require_once "ttools/TKwinGallery/KwinGalleryClass.php";
      
// Выполняем запуск сессии и работу с лог-файлом
$oMainStarter = new PageStarter('ittveme','ittve-log');

// Изменяем счетчик запросов сайта из браузера и, таким образом,       
// регистрируем новую загрузку страницы
$c_BrowEntry=prown\MakeCookie('BrowEntry',0,tInt,true); 
$c_BrowEntry=prown\MakeCookie('BrowEntry',$c_BrowEntry+1,tInt);  
// Изменяем счетчик посещений текущим посетителем      
$c_PersEntry=prown\MakeCookie('PersEntry',0,tInt,true);           
$c_PersEntry=prown\MakeCookie('PersEntry',$c_PersEntry+1,tInt);
// Изменяем счетчик посещений за сессию                 
$s_Counter=prown\MakeSession('Counter',0,tInt,true);              
$s_Counter=prown\MakeSession('Counter',$s_Counter+1,tInt);   

// echo "Вы обновили эту страницу ".$_SESSION['Counter']." раз. ";
// echo "<br><a href=".$_SERVER['PHP_SELF'].">обновить"; 
// Если после авторизации изменилось имя пользователя,
// то перенастраиваем счетчики и посетителя
$c_UserName=prown\MakeCookie('UserName',"Гость",tStr,true); // логин авторизованного посетителя
$c_PersName=prown\MakeCookie('PersName',"Гость",tStr,true); // логин посетителя
if ($c_PersName<>$c_UserName)
{
   $c_PersEntry=prown\MakeCookie('PersEntry',1,tInt);
   $s_Counter=prown\MakeSession('Counter',1,tInt); 
   $c_PersName=prown\MakeCookie('PersName',$c_UserName,tStr);
}

// Инициализируем настройки, далее они могут быть изменены
$c_PresMode=prown\MakeCookie('PresMode',rpmOneRight,tStr,true);          // режим представления материалов
$с_ModeImg=prown\MakeCookie('ModeImg',vimExiSize,tStr,true);             // режим представления выбранной картинки
$с_PageImg=prown\MakeCookie('PageImg','ittve01-001-Подъём-настроения.jpg',tStr,true); 
//$c_MakeGround=prown\MakeCookie('MakeGround',fimWhiteGround,tInt,true); // фон показываемых картинок/изображений
//$c_MakeGround=prown\MakeCookie('MakeGround',fimAnimation,tInt);        // фон показываемых картинок/изображений
//$c_isJScript=prown\MakeCookie('isJScript',7,tInt,false);               // JavaScript не включен
//$s_isJScript=prown\MakeSession('isJScript','no',tInt,false);           // JavaScript не включен

// Инициализируем параметры страницы сайта 
//$p_ittveLife="ittve01-001-20130201-Особенности-устройства-винтиков-в-моей-голове.html";
//$p_ittveNews="ittve01-001-20130201-Особенности-устройства-винтиков-в-моей-голове.html";

/*
if ($SiteDevice==Mobile) 
{   
   $p_NewsForm=prown\MakeParm('NewsForm',frnWithImg);            // форма представления новостей
}
else
{
   $p_NewsForm=prown\MakeParm('NewsForm',frnSimple);             // форма представления новостей
}
$p_NewsAmt=prown\MakeParm('NewsAmt',8);                          // количество новостей в форме
$p_NewsView=prown\MakeParm('NewsView',true,tBool,true);          // true - разворачивать новости при загрузке
*/

// Определяем данные для работы с базой данных материалов 
$basename=$_SERVER['DOCUMENT_ROOT'].'/ittve';  // имя базы без расширения 'db3'
$username='tve';                               // логин посетителя для авторизации
$password='23ety17'; 

// Подключаем объект единообразного вывода сообщений
$note=new ttools\Notice();
// Подключаем объект для работы с базой данных материалов
// (при необходимости создаем базу данных материалов)
$Arti=new ttools\ArticlesMaker($basename,$username,$password,$note);
if (!file_exists($basename.'.db3')) $Arti->BaseFirstCreate();
$Arti->setKindMessage($note);
// Подключаем объект по редактированию материала - для работы в галерее 
// и рабочей области редактирования (в том числе создаем объект для управления
// изображениями в галерее, связанной с материалом сайта из базы данных)
$WorkTinyHeight='75'; $FooterTinyHeight='15'; $KwinGalleryWidth='30'; $EdIzm='%';
$Edit=new ttools\TinyGallery($SiteRoot,$urlHome,
      $WorkTinyHeight,$FooterTinyHeight,$KwinGalleryWidth,$EdIzm,$Arti);

// ****************************************************************************
// *             Проинициализировать порядок использования кукисов            *
// *   (для правильной оценки ситуации, одновременно ведутся: сессионная      *
// *                  переменная и переменная-кукис)                          *
// ****************************************************************************
/**
 *  Таблица решений:
 *  *** 1 *** -----------------------------------------------------------------
 *  $SES NotExist  1111111111111111
 *  $CUK NotExist  --------11111111
 *  $CUK=1 Cukmes  ----1111----1111
 *  $CUK=2 PolZap  --11--11--11--11
 *  $CUK=3 PolRaz  -1-1-1-1-1-1-1-1
 *  ---------------------------------------------------------------------------
 *  Сообщения нет  ХХХХХХХХХХХХХХХХ сессионная=кукис=1, сообщение=0
 *  "Кукисов нет"  ----------------
 *  "Кукисы запр"  ----------------
 *  "Кукисы разр"  ----------------
 *  *** 2 *** -----------------------------------------------------------------
 *  $CUK NotExist  11111111
 *  $SES=1 Cukmes  ----1111
 *  $SES=2 PolZap  --11--11
 *  $SES=3 PolRaz  -1-1-1-1
 *  ---------------------------------------------------------------------------
 *  Сообщения нет  --------
 *  "Кукисов нет"  ----ХХХХ сессионная=кукис=1, сообщение=1
 *  "Кукисы запр"  --------
 *  "Кукисы разр"  --------
 *  *** 3 *** ---------------------------------------------------------------------
 *  $SES=1 Cukmes  --------------------------------11111111111111111111111111111111
 *  $SES=2 PolZap  ----------------1111111111111111----------------1111111111111111
 *  $SES=3 PolRaz  --------11111111--------11111111--------11111111--------11111111
 *  $CUK=1 Cukmes  ----1111----1111----1111----1111----1111----1111----1111----1111
 *  $CUK=2 PolZap  --11--11--11--11--11--11--11--11--11--11--11--11--11--11--11--11
 *  $CUK=3 PolRaz  -1-1-1-1-1-1-1-1-1-1-1-1-1-1-1-1-1-1-1-1-1-1-1-1-1-1-1-1-1-1-1-1
 *  -------------------------------------------------------------------------------
 *  Сообщения нет  ----------------------------------------------------------------
 *  "Кукисов нет"  ------------------------------------ХХХХ----ХХХХ----ХХХХ----ХХХХ
 *                                                  сессионная=кукис=2, сообщение=1
 *  "Кукисы запр"  ------------------ХХ--ХХ--ХХ--ХХ------------------ХХ--ХХ--ХХ--ХХ
 *                                                  сессионная=кукис=3, сообщение=2
 *  "Кукисы разр"  ---------Х-Х-Х-Х---------Х-Х-Х-Х---------Х-Х-Х-Х---------Х-Х-Х-Х
 *                                                  сессионная=кукис=3, сообщение=3
 *  -------------------------------------------------------------------------------
**/
/*
function ini_ResCookie()
{
   // Если кукиса 'ResCookie' нет, то будем указывать режим rciCookiNo" в обеих
   // переменных и возвращаем данное значение.
   // Сообщения об этом в подвале сайта выводится не будет.
   // Данный режим предполагается по умолчанию.
   prown\MakeSession('ResCookie',rciCookiNo,tInt);  
   $Result=prown\MakeCookie('ResCookie',rciCookiNo,tInt);  
   // Если сессионная переменная уже говорит, что кукисов нет, то переводим 
   // или пытаемся перевести переменные в режим rciCookiNoMes.
   if (isset($_SESSION['ResCookie'])&&($_SESSION['ResCookie']==rciCookiNo))
   {
      prown\MakeSession('ResCookie',rciCookiNoMes,tInt);  
      $Result=prown\MakeCookie('ResCookie',rciCookiNoMes,tInt);  
   }
   // Существующий кукис взять, как есть. Если кукисов нет, то 
   return $Result;
   */
//}
/*
// Определяем порядок использования кукисов
if (isset($_COOKIE['rciCookie']))
{
   $с_ResCookie=prown\MakeCookie('ResCookie',rciCookiNo,tInt,true); // порядок использования кукисов 
}
else
{
   $с_ResCookie=prown\MakeCookie('ResCookie',rciCookiNo,tInt,true); // порядок использования кукисов 
}
*/
// end --------------------------------------------------------------- ZERO ---

// ************************************************************* iniMem.php *** 
