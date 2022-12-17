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

// $Unicoder->ViewCharsetAsColomn(0);
// $Unicoder->ViewIntervalAsColomn('f0c0','f124');
// $Unicoder->ViewFontAwesome470AsColomn('f000','f2e0');
// $Unicoder->ViewFontAwesome470AsTable('f000','f2e0',16);

/*
echo '<br>';
$Unicoder->ViewCharsetAsTable(4,16);   
echo '<br>';
$Unicoder->ViewCharsetAsTable(5,16);   
echo '<br>';
*/

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
