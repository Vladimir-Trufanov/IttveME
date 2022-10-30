<?php
// PHP7/HTML5, EDGE/CHROME                              *** GalleryLife.php ***

// ****************************************************************************
// * ittve.me       Вывести галерею изображений ("моя жизнь") активной статьи *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 24.10.2022

echo '<form id="fGallery" action="'.$urlHome.'">';

$FileName="ittveLife/ittve01-001-Подъём-настроения.jpg";
$Comment="Ночная прогулка по Ладоге до рассвета и подъёма настроения.";
GViewImage($FileName,$Comment);

$FileName="ittveLife/ittve01-001-С-заботой-и-к-мамам.jpg";
$Comment="'С заботой и к мамам' - такой мамочкин хвостик.";
GViewImage($FileName,$Comment);

$FileName="ittveLife/ittve01-001-На-Сампо.jpg";
$Comment="На горе Сампо всем хорошо!";
GViewImage($FileName,$Comment);

$FileName="ittveLife/ittve01-001-Дождь-празднику-не-помеха.jpg";
$Comment="'Дождь празднику не помеха' - в Киндасово на шуточном празднике.";
GViewImage($FileName,$Comment);

$FileName="ittveLife/ittve01-001-У-ёлочки.png";
$Comment="'У ёлочки' В Карельском лесу на каменистой гряде - наследии ледника.";
GViewImage($FileName,$Comment);

$FileName="ittveLife/ittve01-001-Хочешь-кваску.jpg";
$Comment="'Хочешь кваску' - Рича притомился бегать по Марциальным водам.";
GViewImage($FileName,$Comment);

echo '</form>';

// Из галереи задаем режим представления выбранной картинки - "на высоту страницы"
$s_ModeImg=prown\MakeSession('ModeImg',vimOnPage,tInt);           

// <!-- --> *********************************************** GalleryLife.php ***
