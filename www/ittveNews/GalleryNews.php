<?php
// PHP7/HTML5, EDGE/CHROME                              *** GalleryView.php ***

// ****************************************************************************
// * ittve.me                                   Развернуть новостную галлерею *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 05.11.2020

function ViewImage($FileName,$Comment)
{
   echo 
      '<div class="Card"> '.
      '<button class="bCard" type="submit" name="Image" value="'.$FileName.'">'.
      '<img class="imgCard" src="'.$FileName.'" alt="'.$FileName.'">'.
      '</button>'.
      '<p class="pCard">'.$Comment.'</p>'.
      '</div>';
}

echo '<form action="http://localhost:83">';

$FileName="ittveNews/ittve01-001-Подъём-настроения.jpg";
$Comment="Это текст комментария под картинкой! И здесь тоже текст комментария под картинкой!";
ViewImage($FileName,$Comment);

$FileName="ittveNews/ittve01-001-С-заботой-и-к-мамам.jpg";
$Comment="С заботой и к мамам";
ViewImage($FileName,$Comment);

$FileName="ittveNews/ittve01-001-На-Сампо.jpg";
$Comment="На горе Сампо";
ViewImage($FileName,$Comment);

$FileName="ittveNews/ittve01-001-Дождь-празднику-не-помеха.jpg";
$Comment="Дождь празднику не помеха";
ViewImage($FileName,$Comment);

$FileName="ittveNews/ittve01-001-У-ёлочки.png";
$Comment="У ёлочки";
ViewImage($FileName,$Comment);

$FileName="ittveNews/ittve01-001-Хочешь-кваску.jpg";
$Comment="Хочешь кваску";
ViewImage($FileName,$Comment);

echo '</form>';

// <!-- --> *********************************************** GalleryView.php ***
