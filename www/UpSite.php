<?php
// PHP7/HTML5, EDGE/CHROME                                   *** UpSite.php ***

// ****************************************************************************
// * ittve.me  Выполнить общую разметку страницы, разобрать параметры запроса,*
// *                            настроить и подключить страницу для просмотра *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 03.12.2022

// ------------------------------------------------------------------- BODY ---
// Начинаем html-страницу
echo '<body>'; 

// Проверяем не требуется ли просто вывести изображение и выводим его
if ($ImageFile<>NULL)
{
   // require_once "ViewImage.php";
}
// Выводим другие страницы сайта
else
{
   echo '<div id="News">'; 
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
   echo '</div>';
   echo '<div id="Life">'; 
      $Edit->ViewLifeSpace($aPresMode,$aModeImg,$urlHome);
   echo '</div>';
   echo '<div id="Gallery">';
      $Edit->ViewGallerySpace();
   echo '</div>'; 
   echo '<div id="FooterTiny">';
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
// Выводим завершающие теги страницы
echo '</body>'; 
echo '</html>';

// <!-- --> **************************************************** UpSite.php ***
