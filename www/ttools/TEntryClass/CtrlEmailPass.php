<?php
                                         
// PHP7/HTML5, EDGE/CHROME                            *** CtrlEmailPass.php ***

// ****************************************************************************
// * TPhpTools              Обработать аякс-запрос на контроль по базе данных *
// *                                                введенного пароля и email *
// *                                                                          *
// * v1.0, 29.10.2023                              Автор:       Труфанов В.Е. *
// * Copyright © 2023 tve                          Дата создания:  29.10.2023 *
// ****************************************************************************

// Извлекаем пути к библиотекам прикладных функций и классов
define ("pathPhpPrown",$_POST['pathPrown']);
define ("pathPhpTools",$_POST['pathTools']);
// Подгружаем нужные модули библиотек
require_once pathPhpPrown."/CommonPrown.php";
require_once "ttools/TEntryClass/EntryTable.php";
// Готовим начальные значения возвращаемого сообщения, как ошибки обработки
$NameGru=tstErr; $Piati=-1; $iif=' ';
// Выбираем email и пароль из параметров URL
$email=htmlspecialchars($_POST["email"]);
$passi=htmlspecialchars($_POST["password"]);

// 01.04.2023 При возникновении ошибки в данном обработчике аякс-запроса 
// текст сообщения уходит в вызывающую процедуру, как успешное выполнение запроса

// Подключаемся к базе данных материалов
$basename=$_POST['sh'].'/Base'.'/ittve';         
$username='tve'; $password='23ety17'; 
$filename=$basename.'.db3';
// Создаем объект PDO 
$pathBase='sqlite:'.$filename; 
// Подключаем PDO к базе
$pdo = new \PDO($pathBase,$username,$password);
$pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
// Выбираем запись по идентификатору группы материалов
$table=\ttools\SelRecParema($pdo,$email); 
// Если записей не найдено, то возвращаем сообщение
// 'Адрес электронной почты не зарегистрирован'
if (count($table)<1)
{
   $NameGru=tstEmailNeNajden;
   $Piati=0;
}
// Если пароли не совпали, то возвращаем 'Пароль неверный' 
else if ($table[0]['passiv'] != $passi)
{
   $NameGru=tstParolNevernyj;
   $Piati=0;
}
// Если пароли и email совпали, то возвращаем 'Пароль и email верны' 
else if (($table[0]['passiv']==$passi) and ($table[0]['email'] != $email))
{
   $NameGru=tstEmailParolVerny;
   $Piati=0;
}
// Если возникло исключение при работе с базой данных, то ретранслируем ошибку
else if ($table[0]['phone']==tstErr)
{
   $NameGru=$table[0]['art'];
   $Piati=-1;
}
// Освобождаем память
unset($pdo); unset($table); unset($note);
// Возвращаем сообщение
$message='{"NameGru":"'.$NameGru.'", "Piati":"'.$Piati.'", "iif":"'.$iif.'"}';
$message=\prown\makeLabel($message,'ghjun5','ghjun5');
echo $message;
exit;

// ****************************************************** CtrlEmailPass.php ***
