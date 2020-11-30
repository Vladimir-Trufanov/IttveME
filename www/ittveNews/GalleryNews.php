<?php
// PHP7/HTML5, EDGE/CHROME                              *** GalleryNews.php ***

// ****************************************************************************
// * ittve.me                                   Развернуть новостную галлерею *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 30.11.2020

function GViewImage($FileName,$Comment,$AreaText=false)
{
   echo 
      '<div class="Card"> '.
      '<button class="bCard" type="submit" name="Image" value="'.$FileName.'">'.
      '<img class="imgCard" src="'.$FileName.'" alt="'.$FileName.'">'.
      '</button>';
   // Выводим существующий комментарий или 
   // текст для редактирования
   if ($AreaText) 
   {
      echo '
         <textarea class="taCard" name="aream">Текст комментария к картинке</textarea>
         ';
   }
   else echo '<p class="pCard">'.$Comment.'</p>';
   echo 
      '</div>';
}

echo '<form id="fGallery" action="'.$SpecSite.'">';

$FileName="ittveNews/ittve01-001-Подъём-настроения.jpg";
$Comment="Ночная прогулка по Ладоге до рассвета и подъёма настроения.";
GViewImage($FileName,$Comment);

$FileName="ittveNews/ittve01-001-С-заботой-и-к-мамам.jpg";
$Comment="'С заботой и к мамам' - такой мамочкин хвостик.";
GViewImage($FileName,$Comment,true);

$FileName="ittveNews/ittve01-001-На-Сампо.jpg";
$Comment="На горе Сампо всем хорошо!";
GViewImage($FileName,$Comment);

$FileName="ittveNews/ittve01-001-Дождь-празднику-не-помеха.jpg";
$Comment="'Дождь празднику не помеха' - в Киндасово на шуточном празднике.";
GViewImage($FileName,$Comment);

$FileName="ittveNews/ittve01-001-У-ёлочки.png";
$Comment="'У ёлочки' В Карельском лесу на каменистой гряде - наследии ледника.";
GViewImage($FileName,$Comment);

$FileName="ittveNews/ittve01-001-Хочешь-кваску.jpg";
$Comment="'Хочешь кваску' - Рича притомился бегать по Марциальным водам.";
GViewImage($FileName,$Comment);

echo '</form>';

// Из галереи задаем режим представления выбранной картинки - "на высоту страницы"
$s_ModeImg=prown\MakeSession('ModeImg',vimOnPage,tInt);           

// <!-- --> *********************************************** GalleryNews.php ***
