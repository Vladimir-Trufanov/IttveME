<?php
                                         
// PHP7/HTML5, EDGE/CHROME                            *** CtrlEmailPass.php ***

// ****************************************************************************
// * TPhpTools              Обработать аякс-запрос на контроль по базе данных *
// *                                                введенного пароля и email *
// *                                                                          *
// * v1.0, 29.10.2023                              Автор:       Труфанов В.Е. *
// * Copyright © 2023 tve                          Дата создания:  29.10.2023 *
// ****************************************************************************

// Готовим начальные значения параметров возвращаемого сообщения
$NameGru='NoDefine'; $Piati=0; $iif='все хорошо';
// Инициализируем константы
/*
define("articleSite",  'IttveMe');   // тип базы данных для управления классом ArticlesMaker 
define("editdir",      'ittveEdit'); // каталог файлов, связанных c материалом
define("stylesdir",    'Styles');    // каталог стилей элементов разметки и фонтов
define("jsxdir",       'Jsx');       // каталог файлов на javascript
define("imgdir",       'Images');    // каталог служебных изображений
*/
define("nstErr",       'произошла ошибка');  

// 01.04.2023 При возникновении ошибки в данном обработчике аякс-запроса 
// текст сообщения уходит в вызывающую процедуру, как успешное выполнение запроса

// Извлекаем пути к библиотекам прикладных функций и классов
define ("pathPhpPrown",$_POST['pathPrown']);
define ("pathPhpTools",$_POST['pathTools']);

// Подгружаем нужные модули библиотек
require_once pathPhpPrown."/CommonPrown.php";
require_once pathPhpTools."/TNotice/NoticeClass.php";
//require_once "ttools/TArticlesMaker/ArticlesMakerClass.php";

// Подключаем объект единообразного вывода сообщений
$note=new ttools\Notice();

// Подключаем объект для работы с базой данных материалов
// (при необходимости создаем базу данных материалов)
$NameGru='Описание материала';

/*
$basename=$_POST['sh'].'/Base'.'/ittve';         
$username='tve'; $password='23ety17'; 
$Arti=new ttools\ArticlesMaker($basename,$username,$password,$note);
$pdo=$Arti->BaseConnect();
// Выбираем запись по идентификатору группы материалов
$table=$Arti->SelRecord($pdo,$_POST['uidEdit']); 
// Если записей не найдено, то возвращаем сообщение
if (count($table)<1)
{
   $NameGru='Записей с материалом по идентификатору '.$_POST['uidEdit'].' не найдено!';
   $iif=nstErr;
}
// Если возникло исключение при работе с базой данных, то ретранслируем ошибку
else if ($table[0]['Translit']==nstErr)
{
   $NameGru=$table[0]['NameArt'];    
   $iif=nstErr;
}
else
{
   // Выделяем из записи элементы
   $NameGru=$table[0]['description'];
   $Piati=$table[0]['Translit'];
}
// Освобождаем память
unset($Arti); unset($pdo); unset($table); unset($note);
*/
// Возвращаем сообщение
$message='{"NameGru":"'.$NameGru.'", "Piati":"'.$Piati.'", "iif":"'.$iif.'"}';
$message=\prown\makeLabel($message,'ghjun5','ghjun5');
echo $message;
exit;

// ****************************************************** CtrlEmailPass.php ***
