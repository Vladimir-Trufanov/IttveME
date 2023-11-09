<?php 
// PHP7/HTML5, EDGE/CHROME                                   *** iniMem.php ***

// ****************************************************************************
// * ittve.me                                           Определить константы, *
// *                              проинициализировать общесайтовые переменные *
// ****************************************************************************

// v2.6, 09.11.2023                                  Автор:       Труфанов В.Е. 
// Copyright © 2019 tve                              Дата создания:  13.01.2019 

require_once "Common.php";  

// ---------------------------------- Межязыковые (PHP-JScript) определения ---
define("handmy",        'ittve');       // Сигнатура статей сайта

define("pathPhpPrown",  $SiteHost.'/TPhpPrown/TPhpPrown'); 
define("pathPhpTools",  $SiteHost.'/TPhpTools/TPhpTools'); 

define ("RootDir",      $_SERVER['DOCUMENT_ROOT']); 
define ("RootUrl",      $_SERVER['SCRIPT_NAME']); 
  
define ("nstNoVyb",     "не выбрано");     
define ("nstNoNaz",     "не назначено");
define ("nstErr",       'произошла ошибка');  
define ("nstOk",        'все в порядке'); 

define ("oriLandscape", 'landscape');  // Ландшафтное расположение устройства
define ("oriPortrait",  'portrait');   // Портретное расположение устройства

// -------------- Дополнительные контроли адреса электронной почты и пароля ---
define ("mEmneformat",   'Адрес email не соответствует разрешённому формату \r\n (правильно, например: tve@karelia.ru, tve58@inbox.ru)'); //   
define ("mBolee8",       "Должно быть быть более 8 символов");     
define ("mMenee21",      "Не должно быть менее 21 символа");  
define ("mNoSpace",      "Не должны содержаться пробелы"); 
define ("mNeruss",       "Не должно быть русских букв (Мы их все равно любим!)");   
define ("mNelatPropisi", "Не должно быть прописных (больших) латинских букв"); 
define ("mDalatPropisi", "Должна быть хотя бы одна прописная (большая) латинская буква");  
define ("mNumbers",      "Должны присутствовать цифры (одна или более)"); 
define ("mSpecsim",      'Должен присутствовать хотя бы один специальный символ, \r\n например из набора +-*_#@!?%&$~%^'); 

// Подключить переменные и константы JavaScript, соответствующие определениям в PHP
function DefineJS($SiteHost,$urlHome)
{
   // Добавляем к штатным, дополнительные контроли правильности заполнения адреса электронной почты и пароля
   // (по опыту будем их вставлять в обработчик addEventListener нежели в blur)
   $defCtrlInput=
   '<script>'.
   'const mEmneformat="'   .mEmneformat.'";'.
   'const mBolee8="'       .mBolee8.'";'.
   'const mMenee21="'      .mMenee21.'";'.
   'const mNoSpace="'      .mNoSpace.'";'.
   'const mNeruss="'       .mNeruss.'";'.
   'const mNelatPropisi="' .mNelatPropisi.'";'.
   'const mDalatPropisi="' .mDalatPropisi.'";'.
   'const mNumbers="'      .mNumbers.'";'.
   'const mSpecsim="'      .mSpecsim.'";'.
   '</script>';
   echo $defCtrlInput;

   $define=
   '<script>'.
   'handmy="'              .handmy.'";'.
   'pathPhpPrown="'        .pathPhpPrown.'";'.
   'pathPhpTools="'        .pathPhpTools.'";'.
   'RootDir="'             .RootDir.'";'.
   'RootUrl="'             .RootUrl.'";'.
   'nstNoVyb="'            .nstNoVyb.'";'.
   'nstNoNaz="'            .nstNoNaz.'";'.
   'nstErr="'              .nstErr.'";'.
   'nstOk="'               .nstOk.'";'.
   'SiteHost="'            .$SiteHost.'";'.
   'urlHome="'             .$urlHome.'";'.
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
define("jsxdir",       'Jsx');                            // каталог файлов на javascript
define("ChangeSize",   "chs");                            // "Изменить размер базового шрифта"  
define('nym',          'ittve');                          // префикс имен файлов для фотографий галереи и материалов
define('moditap',      'Изменить настройки');             // активатор тапок

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
// ----------- Режимы представления материалов = Content Presentation Modes ---
define ("rpmDoubleRight", 'Двухколоночный с правосторонней галереей');   
define ("rpmDoubleLeft",  'Двухколоночный с левосторонней галереей');    
define ("rpmOneRight",    'Одноколоночный с правосторонней галереей');     
define ("rpmOneLeft",     'Одноколоночный с левосторонней галереей'); 
// Определяем массив режимов представления материалов
// $aPresMode=[rpmOneRight,rpmOneLeft,rpmDoubleRight,rpmDoubleLeft]; 
$aPresMode=[rpmOneRight,rpmOneLeft]; 
// -------------------------------- Режимы представления выбранной картинки ---
define ("vimExiSize",     'В заданном размере в пикселах - как есть');   
define ("vimOnPage",      'Внутри страницы');   
// Определяем массив режимов представления выбранной картинки    
$aModeImg=[vimExiSize,vimOnPage]; 
// --------------------------------- Фоны отдельно показываемых изображений ---
define ("fimWhiteGround", 'Обычный белый фон');     
define ("fimColorGround", 'Фон с помощью цветной картинки');    
define ("fimAnimation",   'Анимационный фон');     
$aPhoneImg=[fimWhiteGround,fimColorGround,fimAnimation]; 

// Считаем, что iniMem отработает хорошо
$iniMem=nstOk;

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
require_once("ttools/TArticlesMaker/CommonArticlesMaker.php"); 
require_once "ttools/TEntryClass/EntryClass.php";
require_once "ttools/TEntryClass/EntryTable.php"; 
require_once "ttools/TTinyGallery/TinyGalleryClass.php";
require_once "ttools/TKwinGallery/KwinGalleryClass.php";

// Выполняем запуск сессии и работу с лог-файлом
$oMainStarter = new PageStarter('ittveme','ittve-log');
// Пропускаем пользователя на сайт
SiteEntry($c_UserName,$c_PersName,$c_PersMail,$c_PersPass,$c_BrowEntry,$c_PersEntry,$s_Counter);

// Определяем данные для работы с базой данных материалов 
$basename=$SiteHost.'/Base'.'/ittve';           // имя базы без расширения 'db3'
$email='tve@karelia.ru';                        // email посетителя
$username='tve';                                // логин посетителя для авторизации
$password='23ety17'; 
// Подключаем объект единообразного вывода сообщений
$note=new ttools\Notice();
// Подключаем объекты для работы с базой данных материалов и пользователей 
$Arti=new ttools\ArticlesMaker($basename,$username,$password,$note);
$Entry=new ttools\Entrying($urlHome,$basename,$username,$password,$note); 
// При необходимости создаем базу данных материалов
$BaseCreate='Exist';
if (!file_exists($basename.'.db3')) 
{
   $Arti->BaseFirstCreate();
   $BaseCreate='Yes';
}
$Arti->setKindMessage($note);
// При отсутствии создаём таблицу пользователей ittve.me в базе данных 
$pdo=ttools\_BaseConnect($basename,$username,$password);
ttools\CreateMeUsers($pdo,'-'); 

// Меняем кукис ориентации устройства 
$c_Orient=prown\MakeCookie('Orient',oriLandscape,tStr,true);             // ориентация устройства
if (IsSet($_GET["orient"]))
{
   if ($_GET["orient"]==oriLandscape) $c_Orient=prown\MakeCookie('Orient',oriLandscape,tStr); 
   if ($_GET["orient"]==oriPortrait)  $c_Orient=prown\MakeCookie('Orient',oriPortrait,tStr); 
   if ($SiteDevice==Computer) $c_Orient=prown\MakeCookie('Orient',oriLandscape,tStr); 
}

Moditap(moditap,$c_UserName,$c_PersName);

// Инициализируем настройки, далее они могут быть изменены
$c_PresMode=prown\MakeCookie('PresMode',rpmOneRight,tStr,true);         // режим представления материалов
$c_ModeImg=prown\MakeCookie('ModeImg',vimExiSize,tStr,true);            // режим представления выбранной картинки
$c_PhoneImg=prown\MakeCookie('PhoneImg',fimWhiteGround,tStr,true);      // фон отдельно показываемых изображений

//$с_PageImg=prown\MakeCookie('PageImg','ittve01-001-Подъём-настроения.jpg',tStr,true); 

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
// Добавляем в базу данных материалов запись для вызова новой игры 
// при инициирующей это версии сайта
if (versi==32)
{
   require_once "UpdateBase_GAME.php"; 
   \ttools\UpdateBaseGame(versi,$Arti);
}
// Подключаем объект по редактированию материала - для работы в галерее 
// и рабочей области редактирования (в том числе создаем объект для управления
// изображениями в галерее, связанной с материалом сайта из базы данных)
$WorkTinyHeight='75'; $FooterTinyHeight='15'; $KwinGalleryWidth='30'; $EdIzm='%';
$Edit=new ttools\TinyGallery($SiteRoot,$urlHome,$SiteDevice,$WorkTinyHeight,
   $FooterTinyHeight,$KwinGalleryWidth,$EdIzm,$Arti,$Entry);
// Подключаем заменяющую игру для страницы "Добавить новый раздел"
require_once "ttools/TNewCue/gameDuckFlyClass.php";
$Duck=new game\DuckFly('IttveME');
// Подключаем заменяющую игру для страницы "Удалить раздел материалов"
require_once "ttools/TDelCue/g2048/game2048Class.php";
$a2048=new game\g2048('IttveME');
// Подключаем заменяющую игру для страницы "Отправить сообщение автору"
require_once "ttools/TSaymeClass/Hextris/gameHextrisClass.php";
$Hex=new game\Hextris($c_PresMode,'IttveME');
// Подключаем заменяющую игру для страницы "Войти или зарегистрироваться"
//require_once "ttools/TEntryClass/PairedCards/PairedCardsClass.php";
//$Paired=new game\PairedCards($c_PresMode,'IttveME');

// end --------------------------------------------------------------- ZERO ---

// ****************************************************************************
// *                               Проверить тапы                             *
// ****************************************************************************
function Moditap($moditap,&$c_UserName,&$c_PersName)
{
   //\prown\ConsoleLog('$moditap='.$moditap);
   $tap=\prown\getComRequest('buttons');
   //\prown\ConsoleLog('$tap='.$tap);
   if ($tap<>NULL)
   {
      $domen=$_SERVER['HTTP_HOST'];
      //\prown\ConsoleLog('$domen='.$domen);
      if (($domen=='ittve.me')||($domen=='www.ittve.me')||($domen=='localhost:83'))
      {
         if ($tap==$moditap) $UserName='Гость'; else $UserName="tve"; 
         $c_UserName=prown\MakeCookie('UserName',$UserName,tStr); 
         $c_PersName=prown\MakeCookie('PersName',$UserName,tStr); 
         //\prown\ConsoleLog('$c_UserName='.$c_UserName);
      }
   }
}
// ****************************************************************************
// *                                    Пройти на сайт                        *
// ****************************************************************************
function SiteEntry(&$c_UserName,&$c_PersName,&$c_PersMail,&$c_PersPass,&$c_BrowEntry,&$c_PersEntry,&$s_Counter)
{
   // Инициируем в браузере авторизованное имя пользователя (сейчас после 2023-11-08,
   // в первой версии механизма авторизации это либо "Гость", либо email после регистрации)
   $c_UserName=prown\MakeCookie('UserName',"Гость",tStr,true); 
   // Инициируем в браузере текущего пользователя, пароль, email
   $c_PersName=prown\MakeCookie('PersName',"Гость",tStr,true); 
   $c_PersMail=prown\MakeCookie('PersMail',"username@example.com",tStr,true); 
   $c_PersPass=prown\MakeCookie('PersPass',"Гость",tStr,true);   
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

   // По умолчанию, выбираем параметры из кукисов
   $c_UserName=prown\MakeCookie('UserName'); 
   $c_PersName=prown\MakeCookie('PersName'); 
   $c_PersMail=prown\MakeCookie('PersMail'); 
   $c_PersPass=prown\MakeCookie('PersPass');   
   
   // Если после авторизации изменилось имя пользователя,
   // то перенастраиваем счетчики и посетителя
   if ($c_PersName<>$c_UserName)
   {
      $c_PersName=prown\MakeCookie('PersName',$c_UserName,tStr); 
      $c_PersEntry=prown\MakeCookie('PersEntry',1,tInt);
      $s_Counter=prown\MakeSession('Counter',1,tInt); 
   }
}

// ************************************************************* iniMem.php *** 
