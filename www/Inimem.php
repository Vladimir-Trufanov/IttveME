<?php 
// PHP7/HTML5, EDGE/CHROME                                   *** iniMem.php ***

// ****************************************************************************
// * ittve.me                                           Определить константы, *
// *                              проинициализировать общесайтовые переменные *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 28.10.2020

// Определяем константы (здесь стараемся не назначать константу = 0, так как 
// проверка значению может не отличить 0 от NULL)

define ("ChangeSize", "chs");    // "Изменить размер базового шрифта"  

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

// ---------------------------------------- Режимы представления материалов ---
define ("rpmDoubleRight", 1);    // двухколоночный с правосторонней галереей
define ("rpmDoubleLeft",  2);    // двухколоночный с левосторонней галереей
define ("rpmOneRight",    3);    // одноколоночный с правосторонней галереей
define ("rpmOneLeft",     4);    // одноколоночный с левосторонней галереей
// -------------------------------- Режимы представления выбранной картинки ---
define ("vimExiSize",     1);    // в заданном размере в пикселах 
define ("vimOnPage",      2);    // на странице по высоте

// ****************************************************************************
// *             Проинициализировать порядок использования кукисов            *
// *   (для правильной оценки ситуации, одновременно ведутся: сессионная      *
// *                  переменная и переменная-кукис)                          *
// ****************************************************************************

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
}


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




 и возможность работы JavaScript

   //if (isset($_SESSION['js']))
   //{
   //   echo 'Есть JS'.'<br>';

*/





// Инициализируем переменные-кукисы
$c_UserName=prown\MakeCookie('UserName',"Гость",tStr,true);      // логин авторизованного посетителя
$c_PersName=prown\MakeCookie('PersName',"Гость",tStr,true);      // логин посетителя
$c_BrowEntry=prown\MakeCookie('BrowEntry',0,tInt,true);          // число запросов сайта из браузера
$c_PersEntry=prown\MakeCookie('PersEntry',0,tInt,true);          // счетчик посещений текущим посетителем

$с_PageImg=prown\MakeCookie('PageImg','ittve01-001-Подъём-настроения.jpg',tStr,true); 
$с_ModeImg=prown\MakeCookie('ModeImg',vimOnPage,tInt,true);     // режим представления выбранной картинки
//$c_isJScript=prown\MakeCookie('isJScript',7,tInt,false);        // JavaScript не включен
    
// Инициализируем сессионные переменные
$s_Counter=prown\MakeSession('Counter',0,tInt,true);             // посещения за сессию
//$s_isJScript=prown\MakeSession('isJScript','no',tInt,false);     // JavaScript не включен


// Инициализируем параметры страницы сайта 
$p_ittveNews="ittve01-001-20130201-Особенности-устройства-винтиков-в-моей-голове.html";
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




// Инициализируем общесайтовые переменные
$ModeError=2;                               // Режим вывода сообщений об ошибках

// ************************************************************* iniMem.php *** 
