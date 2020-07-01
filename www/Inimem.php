<?php 
// PHP7/HTML5, EDGE/CHROME                                   *** iniMem.php ***

// ****************************************************************************
// * ittve.me                    Произвести установки общесайтовых переменных *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 01.07.2020

// Определяем сайтовые константы
define ("ChangeSize", "chs");    // "Изменить размер базового шрифта"  
// ---------------------------------------- Режимы представления материалов ---
define ("rpmDoubleRight", 0);    // двухколоночный с правосторонней галереей
define ("rpmDoubleLeft",  1);    // двухколоночный с левосторонней галереей
define ("rpmOneRight",    2);    // одноколоночный с правосторонней галереей

// Инициализируем переменные-кукисы
$c_UserName=prown\MakeCookie('UserName',"Гость",tStr,true);  // логин авторизованного посетителя
$c_PersName=prown\MakeCookie('PersName',"Гость",tStr,true);  // логин посетителя

/*
$c_BrowEntry=prown\MakeCookie('BrowEntry',0,tInt,true);          // число запросов сайта из браузера
$c_PersEntry=prown\MakeCookie('PersEntry',0,tInt,true);          // счетчик посещений текущим посетителем
$с_ResCookie=prown\MakeCookie('ResCookie',rciCookiNo,tInt,true); // порядок использования кукисов     
// Каталог текущего стихотворения - записи базы данных
$c_CurrStih=prown\MakeCookie('CurrStih',"sorevnovanie-s-hakerami",tStr,true); 
$c_CurrStih=IniCurrStih($c_CurrStih);
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
// Инициализируем сессионные переменные
$s_Counter=prown\MakeSession('Counter',0,tInt,true);             // посещения за сессию
$s_NameNews=prown\MakeSession('NameNews',NotNews,tStr,true);     // активированная лента новостей
*/




// Инициализируем общесайтовые переменные
$ModeError=2;                               // Режим вывода сообщений об ошибках

// Инициализируем сессионные переменные
if (!isset($_SESSION['Counter'])) $_SESSION['Counter']=0; // Посещения за сессию

// Инициализируем переменные-кукисы
$BrowEntry=$_COOKIE['BrowEntry'] ?? 1;      // Число запросов сайта из браузера
$PersEntry=$_COOKIE['PersEntry'] ?? 1;      // Число запросов сайта посетителем

// Инициализируем настройки сайта в браузере
// ---$BrowEntry=$_COOKIE['BrowEntry'] ?? 1;      // Число запросов сайта из браузера

// ************************************************************* iniMem.php *** 
