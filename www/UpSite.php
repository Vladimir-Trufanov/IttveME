<?php
// PHP7/HTML5, EDGE/CHROME                                   *** UpSite.php ***

// ****************************************************************************
// * ittve.me  Выполнить общую разметку страницы, разобрать параметры запроса,*
// *                            настроить и подключить страницу для просмотра *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 29.04.2023

// ------------------------------------------------------------------- BODY ---
// Начинаем html-страницу
echo '<body>'; 

// Выбираем имя файла, если был запрос к сайту на вывод изображения,
// переключаем переменную-кукис на другой формат изображения: на странице 
// или полноформатное изображение                  
$ImageFile=prown\getComRequest('Image');
// Проверяем не требуется ли просто вывести изображение и выводим его
if ($ImageFile<>NULL)
{
   require_once "ViewImage.php";
}
// Выводим другие страницы сайта
else
{
   // Тормозим, если создавалась база данных
   // (для продолжения нужно будет из браузера обновить страницу)
   if ($BaseCreate<>'Yes')
   {
   // Выводим страницу
   echo '<div id="News">';
      /* 
      echo 
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      'Разворачиваем область для редактирования материала Разворачиваем область для редактирования материала Разворачиваем область для редактирования маала  '.
      ' - ';
      */
   echo '</div>';
   echo '<div id="Life">'; 
      $Edit->ViewLifeSpace();
   echo '</div>';
   echo '<div id="Gallery">';
      $Edit->ViewGallerySpace();
   echo '</div>'; 
   echo '<div id="FooterTiny">';
      //echo (prown\getTranslit('Изменить настройки, прочитать о сайте'));
      $Edit->ViewFooterSpace($UserAgent);
   echo '</div>';
   // Выводим нижнюю информационную строку
   echo '<div id="Info">';
      echo '
      <div id="InfoLeft">
         Copyright (c) 2019 v2.0  Труфанов Владимир   tve58@inbox.ru<br>
      </div>
      ';
      echo '<div id="InfoRight">';
      echo $SiteDevice." ".$c_PersName." ".$_SESSION['Counter'].".".$c_PersEntry."[".$c_BrowEntry."]"; 
      echo '</div>';
   echo '</div>';
   }
}
// Выводим завершающие теги страницы
echo '</body>'; 
echo '</html>';

// <!-- --> **************************************************** UpSite.php ***
