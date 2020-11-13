<?php
// PHP7/HTML5, EDGE/CHROME                                *** ViewImage.php ***

// ****************************************************************************
// * ittve.me          Показать изображение, выбранной в галерее картинки, на *
// *                  отдельной странице в ее рамках или натуральной величины *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  11.07.2020
// Copyright © 2020 tve                              Посл.изменение: 13.11.2020

/**  ЗАМЕЧАНИЕ:
 *   Данный модуль для вывода картинки запускается из 2 мест: из галереи 
 * изображений и из самого себя.
 *   При вызове из галереи задается режим вывода на странице - vimOnPage.
 *   Для возможного вызова картинки их данного модуля, в конце этого модуля 
 * меняется режим страничного вывода на полноформатный и наоборот.
*/
echo "http://localhost:83=".$SpecSite;
// Определяем переключаемые стили
echo '<style type="text/css">';
   // Если задан цветной фон, то его и готовим
   if (isset($_COOKIE['MakeGround'])&&($c_MakeGround===fimColorGround))
   {
      echo 'body
      {
         background: url(example/image/a1.jpg) 90% 90% no-repeat fixed; 
         background-size: auto, auto, cover;
      }';
   }
   // Если задана анимация, то её и готовим
   else if (isset($_COOKIE['MakeGround'])&&($c_MakeGround===fimAnimation))
   {
      echo 'body
      {
         background: 
         url(example/image/a3.png) 90% 90% no-repeat fixed, 
         url(example/image/a2.png) 40% 40% no-repeat fixed, 
         url(example/image/a1.jpg) no-repeat fixed;
         background-size: auto, auto, cover;
         animation: ball 40s linear infinite;
      }
      @keyframes ball 
      {
         from { background-position: 3000px 90%, 180% 40%, 0 0; }
         to { background-position: -2000px 90%, -300px 20%, 0 0; }
      }';
   }
   // Иначе оставляем белый фон
   else
   {
      echo 'body
      {
         background: white;
      }';
   }
echo '</style>';

// Если кукис существует и он указывает на вывод картинки в рамках страницы
// (по высоте), то так картинку и выводим
if (isset($_COOKIE['ModeImg'])&&($с_ModeImg==vimOnPage))
{
   echo '
   <style type="text/css">
      #ExtImg 
      {
         cursor: url("/Images/Cursors/More-anoop.cur"),zoom-in;
         padding-top:.8vh;
         height:99vh;
      }
   </style>
   ';
}
// Иначе выводим полноразмерное изображение, 
// то есть в натуральную величину в пикселах
else
{
   // Устанавливаем курсор для переключения изображения на уменьшенный размер
   echo '
   <style type="text/css">
      #ExtImg 
      { 
         cursor: url("/Images/Cursors/Less-anoop.cur"),zoom-out;
         /*
         height: 100%; 
         убрано 13.11.2020 мешало qupzille переключать между размерами изображений
         */
      }
   </style>
   ';
}
// Готовим форму для перевывода картинки
//echo '<form action="http://localhost:83" align="center">';
echo '<form action="'.$SpecSite.'" align="center">';


echo '<button id="bImg" type="submit" name="Image" value="'.$ImageFile.'">';
echo '<img id="ExtImg" src="'.$ImageFile.'" alt="'.$ImageFile.'">';
echo '</button>';
echo '</form>';
// Меняем режим страничного вывода на полноформатный и наоборот,
// то есть через переменную-кукис переопределяем тип изображения
if (isset($_COOKIE['ModeImg'])&&($_COOKIE['ModeImg']==vimOnPage))
{
   $с_ModeImg=prown\MakeCookie('ModeImg',vimExiSize); 
}
else
{
   $с_ModeImg=prown\MakeCookie('ModeImg',vimOnPage);
}

   /*
   list($width, $height, $type, $attr) = getimagesize($ImagePass);
   if ($width>$height)
   {
      // по ширине
      echo '
      <style type="text/css">
      #ExtImg
      {
         width: 60vw;
      }
      </style>
      ';
   }
   else
   {
      $ImgHeight=90;
      $ImgWidth=$ImgHeight*$width/$height;
      // по высоте
      echo '
      <style type="text/css">
      #ExtImg
      {
         height: '.$ImgHeight.'vh;
      }
      </style>
      ';
   }
   */

// ********************************************************** ViewImage.php ***
