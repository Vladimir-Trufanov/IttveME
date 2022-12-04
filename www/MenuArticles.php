<?php
// PHP7/HTML5, EDGE/CHROME                             *** MenuArticles.php ***

// ****************************************************************************
// * ittve.me                                        Создать и обслужить меню *
// *      Discovered from article on Ryan Collins': http://www.ryancollins.me *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.12.2020
// Copyright © 2020 tve                              Посл.изменение: 13.12.2020

echo 'Жизнь и путешествия! '.prown\getTranslit('').'&#128152;&#129315;'.' <br>';

// Отлаживаем UnicodeUserClass
$Unicoder=new ttools\UnicodeUser();
//$Unicoder->ViewCharsetAsColomn(0);
/*
echo '<br>';
$Unicoder->ViewCharsetAsTable(0,10);
echo '<br>';
$Unicoder->ViewCharsetAsTable(1,10); 
*/  
//echo '<br>';
//<<<<<<< HEAD
//$Unicoder->ViewCharsetAsTable(2,16);   
//echo '<br>';
//$Unicoder->ViewCharsetAsTable(3,16);   
//=======
//$Unicoder->ViewCharsetAsTable(2,16);   
//echo '<br>';
//$Unicoder->ViewCharsetAsTable(3,16);   
//echo '<br>';

// Готовим и выводим меню
$Arti=new ttools\ArticlesMaker($basename,$username,$password);

// При отладке воссоздаем базу данных
// $Arti->BaseFirstCreate();

// Строим html-код меню по базе данных материалов сайта 
//$Arti->ShowSampleMenu();  // из примера меню
$Arti->MakeMenu();          // по базе

/*
echo '_MakeTblMenu<br>';
$ListFields = array(
   'uid'     => '..Пункт меню..',
   'pid'     => '..Родитель..',
   'NameArt' => '..Статья сайта..',
   'IdCue'   => '..Тип статьи..',
);
$SignAsc='>..';
$SignDesc='<..';

$Arti->MakeTblMenu($ListFields,$SignAsc,$SignDesc);
*/

// ******************************************************* MenuArticles.php ***
