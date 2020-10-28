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
define ("rciCookiUserNo", 1);    // есть, пользователем запрещено использование
define ("rciCookiUserYes", 2);   // пользователем разрешено использование кукисов
// ---------------------------------------- Режимы представления материалов ---
define ("rpmDoubleRight", 0);    // двухколоночный с правосторонней галереей
define ("rpmDoubleLeft",  1);    // двухколоночный с левосторонней галереей
define ("rpmOneRight",    2);    // одноколоночный с правосторонней галереей
define ("rpmOneLeft",     3);    // одноколоночный с левосторонней галереей
// ---------------------------------------- Режимы представления дива "Ext" ---
define ("vexLoginPage",   0);    // отдельная страница при входе
define ("vexSeparImage",  1);    // увеличенное изображение выбранной картинки 

// Инициализируем переменные-кукисы
$c_UserName=prown\MakeCookie('UserName',"Гость",tStr,true);      // логин авторизованного посетителя
$c_PersName=prown\MakeCookie('PersName',"Гость",tStr,true);      // логин посетителя
$c_BrowEntry=prown\MakeCookie('BrowEntry',0,tInt,true);          // число запросов сайта из браузера
$c_PersEntry=prown\MakeCookie('PersEntry',0,tInt,true);          // счетчик посещений текущим посетителем
$с_ResCookie=prown\MakeCookie('ResCookie',rciCookiNo,tInt,true); // порядок использования кукисов 

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
