<?php

// PHP7/HTML5, EDGE/CHROME                            *** testForDelArt.php ***

// ****************************************************************************
// * TArticleMaker                По указанному идентификатору в аякс-запросе *
// *     выбрать название статьи и проверить есть ли не удаленные изображения *
// *                                                                          *
// * v1.0, 03.04.2023                              Автор:       Труфанов В.Е. *
// * Copyright © 2023 tve                          Дата создания:  03.04.2023 *
// ****************************************************************************

// 01.04.2023 При возникновении ошибки в данном обработчике аякс-запроса 
// текст сообщения уходит в вызывающую процедуру, как успешное выполнение запроса

// Извлекаем пути к библиотекам прикладных функций и классов
define ("pathPhpPrown",$_POST['pathPrown']);
define ("pathPhpTools",$_POST['pathTools']);

// Для взаимодействия с объектами класса определяем константы:
define("articleSite",'IttveMe');  // тип базы данных (по сайту)
define("editdir",'ittveEdit');    // каталог размещения файлов, относительно корневого
define("stylesdir",'Styles');     // каталог стилей элементов разметки и фонтов
define("jsxdir",'Jsx');           // каталог файлов на javascript
define("imgdir",'Images');        // каталог файлов служебных для сайта изображений

// Подгружаем нужные модули библиотек
require_once pathPhpPrown."/CommonPrown.php";
require_once pathPhpPrown."/iniConstMem.php";
require_once pathPhpTools."/TNotice/NoticeClass.php";
require_once "ttools/TArticlesMaker/ArticlesMakerClass.php";
require_once "ttools/TTinyGallery/Dispatch_ZERO.php";

// Готовим сообщения обработки аякс-запроса
define ("gncNoCue", 'Статья не найдена в базе'); 
define ("nstErr",   'произошла ошибка');  
define ("noImage",  'нет изображений');  

// Готовим начальные значения параметров возвращаемого сообщения
$NameGru='NoDefineART'; $Piati=Err; 
// Изначально отмечаем, что возвращается ошибка
$iif=Err;
// Подключаем объект единообразного вывода сообщений
$note=new ttools\Notice();
// Подключаем объект для работы с базой данных материалов
// (при необходимости создаем базу данных материалов)
$basename=$_POST['sh'].'/Base'.'/ittve';    
$username='tve'; $password='23ety17'; 
$Arti=new ttools\ArticlesMaker($basename,$username,$password,$note);
$pdo=$Arti->BaseConnect();

// Выбираем запись по идентификатору
$idArt=$_POST['idArt'];
$table=$Arti->SelRecord($pdo,$idArt); 
// Определяем количество найденных записей
$count=count($table);
// Если записей не найдено, то готовим сообщение
if ($count<1) $NameGru=gncNoCue;
// Иначе анализируем данные дальше
else
{
   $NameArt=$table[0]['NameArt'];
   $Translit=$table[0]['Translit'];
   // Если была ошибка выборки в базе, то готовим сообщение
   if ($Translit==nstErr) $NameGru=$NameArt; 
   // Иначе проверяем наличие изображений по UID материала
   else
   {
      $Piati=$NameArt; 
      $NameGru=TestUidImg($Arti,$pdo,$idArt,$NameArt); 
      // Если по выбранной для удаления записи имеются изображения,
      // то завершаем обработку и отправляем сообщение,
      // а если изображений нет, то продолжаем анализ
      if ($NameGru==noImage) 
      {
         // Далее проверяем был ли текущим удаляемый транслит 
         if (IsSet($_COOKIE["PunktMenu"])) $TransCookie=$_COOKIE["PunktMenu"]; else $TransCookie="NoDefine";
         // Если статья текущего транслита удаляется, то готовим переход на следующую запись 
         if ($Translit==$TransCookie)
         {
            $getArti=$Translit;
            $NameGru=ttools\mmlVybratSledMaterial_ZERO($Arti,$getArti,$_POST['urll']);
            // Если произошла ошибка перехода на след.статью,
            // то возвращаем сообщение, иначе отмечаем успешность всех 
            // подготовительных действий
            if ($NameGru==imok) $iif=imok;
         }
         // Так как удаляется запись не с текущим транслитом, то
         // отмечаем успешность всех подготовительных действий
         else $iif=imok;
      }
   }
}
// Освобождаем память
unset($Arti); unset($pdo); unset($table);
// Возвращаем сообщение
$message='{"NameGru":"'.$NameGru.'", "Piati":"'.$Piati.'", "iif":"'.$iif.'"}';
$message=\prown\makeLabel($message,'ghjun5','ghjun5');
echo $message;
exit;

// Проверить наличие изображений по UID материала
function TestUidImg($Arti,$pdo,$UnID,$NameArt)
{
   $message='Для \"'.$NameArt.'\" найдены изображения! Материал удалять нельзя.';
   // Выбираем ключи всех изображений к записи 
   $table=$Arti->SelImgKeys($pdo,$UnID);
   if (count($table)<1) $message=noImage; 
   return $message;
}

// ****************************************************** testForDelArt.php ***
