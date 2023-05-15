<?php
// PHP7/HTML5, EDGE/CHROME                            *** ajaEraseFiles.php ***

// ****************************************************************************
// * SignaPhoto             Отработать ajax-запрос для удаления старых файлов *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  25.11.2021
// Copyright © 2021 tve                              Посл.изменение: 04.03.2022

// Инициируем рабочее пространство страницы
require_once $_SERVER['DOCUMENT_ROOT'].'/iniWorkSpace.php';
$_WORKSPACE=iniWorkSpace();
$SiteHost=$_WORKSPACE[wsSiteHost];      // Каталог хостинга
// Подключаем совместные определения(переменные) для модулей PHP и JS
require_once 'IttveMeDef.php';
// Подключаем файлы библиотеки прикладных модулей:
require_once $SiteHost.'/TPhpPrown/TPhpPrown'."/CommonPrown.php";
set_error_handler("EraseFilesHandler");
// Фиксируем текущую дату
$curdate=date("Ymd"); 
// Инициируем контрольную трассировку
$s='Curdate='.$curdate."\n";
// Вытаскиваем упорядоченный список файлов каталога
$files1=scandir(imgDir);
foreach ($files1 as $filename) 
{
   // Для файлов (не каталогов) поднимаем дату создания
   $specfile=imgDir.'/'.$filename;
   if (!is_dir($specfile)) 
   {
      $datefile=date("Ymd", filemtime($specfile));
      $s=$s.$filename.': '.$datefile;
      $delta=$curdate-$datefile;
      // Удаляем старые файлы (разница 100 - это примерно 1 месяц')
      if ($delta>90)
      {
         //unlink($specfile);
      }
      // Готовим следующую строку трассировки
      $s=$s."\n";
   }
}

// Передаем данные в формате JSON
// (если нет передачи данных, то по аякс-запросу вернется ошибка)
$user_info=array(); 
//$user_info[]=array('text'=>date("Y-m-d H:i:s").' Удалены старые файлы!');
//$user_info[]=array('text'=>'Удалены старые файлы!');
$user_info[]=array('text'=>$s);
restore_error_handler();
echo json_encode($user_info);
// ****************************************************************************
// *                 Обыграть ошибки удаления старых файлов                   *
// ****************************************************************************
function EraseFilesHandler($errno,$errstr,$errfile,$errline)
{
   $modul='EraseFilesHandler';
   \prown\putErrorInfo($modul,$errno,$errstr,$errfile,
      $errline,imgDir."/EraseFiles.txt");
}
// ****************************************************** ajaEraseFiles.php ***