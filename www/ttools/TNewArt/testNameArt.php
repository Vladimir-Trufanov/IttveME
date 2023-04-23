<?php

// PHP7/HTML5, EDGE/CHROME                              *** testNameArt.php ***

// ****************************************************************************
// * TArticleMaker                По указанному идентификатору в аякс-запросе *
// *             проверить название новой статьи на уже существующий транслит *
// *                                                                          *
// * v1.0, 02.04.2023                              Автор:       Труфанов В.Е. *
// * Copyright © 2023 tve                          Дата создания:  02.04.2023 *
// ****************************************************************************

// Инициализируем константы для работы с ArticlesMakerClass
define("articleSite",  'IttveMe');   // тип базы данных для управления классом ArticlesMaker 
define("editdir",      'ittveEdit'); // каталог файлов, связанных c материалом
define("stylesdir",    'Styles');    // каталог стилей элементов разметки и фонтов
define("jsxdir",       'Jsx');       // каталог файлов на javascript
define("imgdir",       'Images');    // каталог служебных изображений
define("nstErr",       'произошла ошибка');  

// 01.04.2023 При возникновении ошибки в данном обработчике аякс-запроса 
// текст сообщения уходит в вызывающую процедуру, как успешное выполнение запроса

// Извлекаем пути к библиотекам прикладных функций и классов
define ("pathPhpPrown",$_POST['pathPrown']);
define ("pathPhpTools",$_POST['pathTools']);
// Подгружаем нужные модули библиотек
require_once pathPhpPrown."/iniConstMem.php";
require_once pathPhpPrown."/CommonPrown.php";
require_once pathPhpPrown."/getTranslit.php";
require_once pathPhpTools."/TNotice/NoticeClass.php";
require_once "ttools/TArticlesMaker/ArticlesMakerClass.php";
// Подключаем объект единообразного вывода сообщений
$note=new ttools\Notice();
// Готовим начальные значения параметров возвращаемого сообщения
$NameArt='NoDefineART'; $Piati=0; $iif=Err;
// Подключаем объект для работы с базой данных материалов
// (при необходимости создаем базу данных материалов)
$basename=$_POST['sh'].'/Base'.'/ittve';           // имя базы без расширения 'db3'
$username='tve'; $password='23ety17'; 
$Arti=new ttools\ArticlesMaker($basename,$username,$password,$note);
$pdo=$Arti->BaseConnect();
// Выбираем запись по транслиту названия статьи
$NameArt=$_POST['namearti'];
$getArti=prown\getTranslit($NameArt);
$ErrMessage=$Arti->SelUidPid($pdo,$getArti,$pid,$uid,$NameGru,$NameArt,$DateArt,$contents);
// Готовим сообщение, если транслит уже есть
if ($ErrMessage==imok) $NameGru='Название статьи уже есть в базе: \''.$NameArt.'\''; 
// Готовим соощение, если ошибка запроса
else $NameGru=$ErrMessage;
// Готовим сообщение, если транслита нет
if ($ErrMessage=='Не найдено записей по транслиту: '.$getArti)
{
   $NameGru=$ErrMessage;
   $iif=imok;
}
// Освобождаем память
unset($Arti); unset($pdo); unset($table); unset($note);
// Возвращаем сообщение
$message='{"NameGru":"'.$NameGru.'", "Piati":"'.$Piati.'", "iif":"'.$iif.'"}';
$message=\prown\makeLabel($message,'ghjun5','ghjun5');
echo $message;
exit;

// ******************************************************** testNameArt.php ***
