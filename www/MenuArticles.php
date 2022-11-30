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



$с1='&#128152;';
$с2=htmlspecialchars($с1);
$с3=htmlspecialchars_decode($с2);
echo $с1.'.'.$с2.'.'.$с3.'.'.ord($с3).'<br>';
echo strlen($с1).' --> '.strlen($с2).' --> '.strlen($с3).'<br>';

$с1='&#129315;';
$с2=htmlspecialchars($с1);
$с33=htmlspecialchars_decode($с2);
echo $с1.'.'.$с2.'.'.$с3.'<br>';
echo strlen($с1).' --> '.strlen($с2).' --> '.strlen($с3).'<br>';

if ($с3==$с33) echo ('Истина!'); else echo ('ЛОЖЬ!');

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
