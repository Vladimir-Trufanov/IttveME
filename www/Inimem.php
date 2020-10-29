<?php 
// PHP7/HTML5, EDGE/CHROME                                   *** iniMem.php ***

// ****************************************************************************
// * ittve.me                                           Определить константы, *
// *                              проинициализировать общесайтовые переменные *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 28.10.2020

// Определяем константы
define ("ChangeSize", "chs");    // "Изменить размер базового шрифта"  
// ---------------------- Регулятор кукисов (порядок использования кукисов) ---
define ("rciCookiNo", 0);        // кукисов нет
define ("rciCookiNoMes", 1);     // кукисов нет, выдать сообщение
define ("rciCookiUserNo", 2);    // есть, пользователем запрещено использование
define ("rciCookiUserYes", 3);   // пользователем разрешено использование кукисов
// ---------------------------------------- Режимы представления материалов ---
define ("rpmDoubleRight", 0);    // двухколоночный с правосторонней галереей
define ("rpmDoubleLeft",  1);    // двухколоночный с левосторонней галереей
define ("rpmOneRight",    2);    // одноколоночный с правосторонней галереей
define ("rpmOneLeft",     3);    // одноколоночный с левосторонней галереей
// ---------------------------------------- Режимы представления дива "Ext" ---
define ("vexLoginPage",   0);    // отдельная страница при входе
define ("vexSeparImage",  1);    // увеличенное изображение выбранной картинки 

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

$с_PageImg=prown\MakeCookie('PageImg','ittve01-001-Подъём-настроения.jpg',tStr,false); 
//$c_isJScript=prown\MakeCookie('isJScript',7,tInt,false);        // JavaScript не включен
    
// Инициализируем сессионные переменные
$s_Counter=prown\MakeSession('Counter',0,tInt,true);             // посещения за сессию
//$s_isJScript=prown\MakeSession('isJScript','no',tInt,false);     // JavaScript не включен


/*
// Инициализируем параметры страницы сайта 
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
