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

// Тормозим, если создавалась база данных
// (для продолжения нужно будет из браузера обновить страницу)
if ($BaseCreate<>'Yes')
{
   // Подготавливаем окошечко для детального показа выбранного изображения
   // или описания текущей статьи
   echo '
      <div id="ImgDialogWind">
      </div>
   ';

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
      // prown\ViewGlobal(avgCOOKIE);
   echo '</div>';
   echo '<div id="Gallery">';
      $Edit->ViewGallerySpace();
   echo '</div>'; 
   echo '<div id="FooterTiny">';
      $Edit->ViewFooterSpace($UserAgent);
      
      /*
      echo '
      <a href="codingbeautydev.com">Coding Beauty</a><br>
      Try to close the tab or browser  
      ';
      */ 
        
   echo '</div>';
   // Выводим нижнюю информационную строку
   echo '<div id="Info">';
      echo '<div id="InfoLeft">';

         // Выводим строку с текстом запроса
         // echo '$_SERVER["REQUEST_URI"]='.$_SERVER["REQUEST_URI"]; 

         // Выводим строку с контрольным транслитом
         echo (prown\getTranslit('Проволочная намотка схемы'));

         /*
         echo '$SiteDevice='.$SiteDevice." ".'$c_Orient='.$c_Orient; 
         echo '
            <span id="scrwi"> 1203</span>x<span id="scrhe">721</span> 
            <span id="lazy"></span>
         ';
         */
         /*
         echo '
            Copyright (c) 2019-23 v2.0  Труфанов Владимир   tve58@inbox.ru 
            <span id="scrwi">1200</span>x<span id="scrhe">720</span>,
            <span id="lazy">*</span>
         ';
         */
      echo '</div>';
      echo '<div id="InfoRight">';
      if ($messRequest==nstOk)
         echo $SiteDevice." ".$c_PersName." ".$_SESSION['Counter'].".".$c_PersEntry."[".$c_BrowEntry."]"; 
      else
         echo $messRequest.': '.$SiteDevice." ".$c_PersName; 
      echo '</div>';
      
   echo '</div>';
}
// Выводим контрольные значения в консоль
// prown\ConsoleLog('$_COOKIE["PhoneImg"]='.$_COOKIE['PhoneImg']);
// prown\ConsoleLog('$c_PhoneImg='.$c_PhoneImg);
// Выводим завершающие теги страницы
echo '</body>'; 
echo '</html>';

// ****************************************************************************
// *                     Показать ориентацию и устройство                     *
// ****************************************************************************
/*
function infDivPosition($SiteDevice,$_Orient)
{
   if ($_Orient==oriLandscape)
   {
      // Мобильный телефон - oriLandscape
      if ($SiteDevice==Mobile)
      {
      }
      // Компьютер - oriLandscape
      else
      {
      }
   }
   // Мобильный телефон - oriPortrait
   else
   {
   }
}
*/

// <!-- --> **************************************************** UpSite.php ***
