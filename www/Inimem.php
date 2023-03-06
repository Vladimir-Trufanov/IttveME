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

define("pathPhpPrown",  $SiteHost.'/TPhpPrown/TPhpPrown'); 
define("pathPhpTools",  $SiteHost.'/TPhpTools/TPhpTools'); 

define ("RootDir",      $_SERVER['DOCUMENT_ROOT']); 
define ("oriLandscape", 'landscape');     // Ландшафтное расположение устройства
define ("oriPortrait",  'portrait');      // Портретное расположение устройства
  
define ("nstNoVyb",     "не выбрано");     
define ("nstNoNaz",     "не назначено");
define ("nstErr",       'произошла ошибка');  

// ----------------------------------------- Ошибки обработки аякс-запросов ---
define ("gncNoCue", 'Статья не найдена в базе'); 

// Определения сообщений для PHP
define ("ajSuccess",            "Функция/процедура выполнена успешно");     
define ("ajTransparentSuccess", "Преобразование к прозрачному виду успешно");
define ("ajUndeletionOldFiles", "Ошибка удаления старых файлов");

// Подключить переменные JavaScript, соответствующие определениям в PHP
function DefineJS()
{
   $define=
   '<script>'.
   'pathPhpPrown="'        .pathPhpPrown.'";'.
   'pathPhpTools="'        .pathPhpTools.'";'.
   'RootDir="'             .RootDir.'";'.
   'nstNoVyb="'            .nstNoVyb.'";'.
   'nstNoNaz="'            .nstNoNaz.'";'.
   'nstErr="'              .nstErr.'";'.

   'gncNoCue="'            .gncNoCue.'";'.

   'ajSuccess="'           .ajSuccess.           '";'.
   'ajTransparentSuccess="'.ajTransparentSuccess.'";'.
   'ajUndeletionOldFiles="'.ajUndeletionOldFiles.'";'.
   '</script>';
   echo $define;
}   

// ------------------------------------------------------------------- ZERO ---

// Инициализируем общесайтовые константы (здесь стараемся не назначать константу = 0, так как 
// проверка значению "==" может не отличить 0 от NULL)
define("articleSite",  'IttveMe');                        // тип базы данных для управления классом ArticlesMaker 
define("editdir",      'ittveEdit');                      // каталог файлов, связанных c материалом
define("stylesdir",    'Styles');                         // каталог стилей элементов разметки и фонтов
define("imgdir",       'Images');                         // каталог служебных изображений
define ("jsxdir",       'Jsx');                           // каталог файлов на javascript
define ("ChangeSize",  "chs");                            // "Изменить размер базового шрифта"  
define('nym',          'ittve');                          // префикс имен файлов для фотографий галереи и материалов

// ----------------------------------------------- Режимы работы с галереей ---
define ("mwgViewing", 'просмотр');   
define ("mwgEditing", 'редактирование');  

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
//$с_PageImg=prown\MakeCookie('PageImg','ittve01-001-Подъём-настроения.jpg',tStr,true); 

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

// Подключаем заменяющую игру для страницы "Добавить новый раздел"
require_once "ttools/TNewCueClass/gameDuckFlyClass.php";
$Duck=new game\DuckFly('IttveME');
// Подключаем заменяющую игру для страницы "Удалить раздел материалов"
require_once "ttools/TDelCueClass/g2048/game2048Class.php";
$a2048=new game\g2048('IttveME');
// Подключаем заменяющую игру для страницы "Отправить сообщение автору"
require_once "ttools/TSaymeClass/Hextris/gameHextrisClass.php";
$Hex=new game\Hextris($c_PresMode,'IttveME');

// end --------------------------------------------------------------- ZERO ---

// ************************************************************* iniMem.php *** 
