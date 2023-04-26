<?php
// PHP7/HTML5, EDGE/CHROME                                *** ViewImage.php ***

// ****************************************************************************
// * ittve.me                     Показать выбранное в галерее изображение на *
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
//$c_FileImg=$ImageFile;
//$a=getimagesize($c_FileImg);
//prown\ConsoleLog($c_FileImg);


echo '<div id="DivImg">';
echo '<img id="ExtImg" src="'.$ImageFile.'" alt="'.$ImageFile.'">';
echo '</div>';

// ****************************************************************************
// *     Разместить изображение по центру дива: cDiv - идентификатор дива,    *
// *                   cImg - идентификатор изображения,                      *
// *  wImg - реальная ширина изображения, hImg - реальная высота изображения  *
// *        mAligne - первичное выравнивание ('по ширине','по высоте'),       *
// *    perWidth - процент ширины изображения от ширины дива (или высоты),    *
// *
// ****************************************************************************
function MakeImgOnDiv($cDiv,$cImg,$c_FileImg,$perWidth)
{
   // Определяем реальную ширину и высоту изображения
   $a=getimagesize($c_FileImg);
   $wImg=$a[0]; $hImg=$a[1];
   ?> <script>
   cDiv="<?php echo $cDiv; ?>";
   cImg="<?php echo $cImg; ?>";
   wImg="<?php echo $wImg; ?>";
   hImg="<?php echo $hImg; ?>";
   perWidth="<?php echo $perWidth; ?>";
   // Определяем способ выравнивания изображения диву
   // ('по ширине','по высоте')
   alignPhoto=getAlignImg(cDiv,cImg,wImg,hImg);
   // Расчитываем выравнивание и устанавливаем CSS
   aCalcPicOnDiv=CalcPicOnDiv(cDiv,cImg,wImg,hImg,alignPhoto,perWidth)
   $("#"+cImg).css("width",String(aCalcPicOnDiv.widthImg)+'px');
   $("#"+cImg).css("height",String(aCalcPicOnDiv.heightImg)+'px');
   $("#"+cImg).css("margin-left",String(aCalcPicOnDiv.nLeft)+'px');
   $("#"+cImg).css("margin-top",String(aCalcPicOnDiv.nTop)+'px');
   </script> <?php
}










// Определяем переключаемые стили
/*
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
// Если сессионная переменная существует и она указывает на вывод  
// полноразмерного изображения, то есть в натуральную величину в пикселах,
// так его и выводим
if (isset($_SESSION['ModeImg'])&&($_SESSION['ModeImg']==vimExiSize))
{
   echo '
   <style type="text/css">
      #ExtImg 
      { 
         cursor: url("/Images/Cursors/Less-anoop.cur"),zoom-out;
         / *
         height: 100%; 
         убрано 13.11.2020 мешало qupzille переключать между размерами изображений
          * /
      }
   </style>
   ';
}
// Иначе (в большинстве случаев) выводим картинку в рамках страницы (по высоте)
else
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
// Готовим форму для перевывода картинки
echo '<form id="fImg"  action="'.$urlHome.'" align="center">';
if (isset($_SESSION['ModeImg'])&&($_SESSION['ModeImg']==vimOnPage))
{
   // На страничном изображении готовим возвращение "домой" для мобильного
   if ($SiteDevice==Mobile) 
   {
      echo '<button id="bImg" type="submit">';
   }
   // На страничном изображении готовим вызов полноформатного изображения
   // для настольного компьютера
   else 
   {   
      echo '<button id="bImg" type="submit" name="Image" value="'.$ImageFile.'">';
   }
}
else
{
   // На полноформатном готовим возвращение "домой"
   echo '<button id="bImg" type="submit">';
}
echo '<img id="ExtImg" src="'.$ImageFile.'"/>';
//echo '<img id="ExtImg" src="'.$ImageFile.'" alt="'.$ImageFile.'">';
//echo 'Привет!';
echo '</button>';
echo '</form>';
// Меняем режим страничного вывода на полноформатный и наоборот,
// то есть через сессионную переменную переопределяем тип изображения
if (isset($_SESSION['ModeImg'])&&($_SESSION['ModeImg']==vimOnPage))
{
   if ($SiteDevice==Mobile) 
   {
      $s_ModeImg=prown\MakeSession('ModeImg',vimOnPage,tInt); 
   }
   else
   {
      $s_ModeImg=prown\MakeSession('ModeImg',vimExiSize,tInt);
   } 
}
else
{
   $s_ModeImg=prown\MakeSession('ModeImg',vimOnPage,tInt); 
}
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
