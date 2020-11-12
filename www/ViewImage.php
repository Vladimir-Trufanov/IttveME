<?php
// PHP7/HTML5, EDGE/CHROME                                *** ViewImage.php ***

// ****************************************************************************
// * ittve.me          Показать изображение, выбранной в галерее картинки, на *
// *                  отдельной странице в ее рамках или натуральной величины *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  11.07.2020
// Copyright © 2020 tve                              Посл.изменение: 07.11.2020

/**  ЗАМЕЧАНИЕ:
 *   Данный модуль для вывода картинки запускается из 2 мест: из галереи 
 * изображений и из самого себя.
 *   При вызове из галереи задается режим вывода на странице - vimOnPage.
 *   Для возможного вызова картинки их данного модуля, в конце этого модуля 
 * меняется режим страничного вывода на полноформатный и наоборот.
*/

echo '<form action="http://localhost:83" align="center">';

// Если кукис существует и он указывает на вывод картинки в рамках страницы
// (по высоте), то так картинку и выводим
if (isset($_COOKIE['ModeImg'])&&($с_ModeImg==vimOnPage))
{
   echo '
   <style type="text/css">
      #ExtImg 
      { 
         cursor: url("/Images/Cursors/More-anoop.cur"), auto;
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
      
      /*html,body,#ExtImg
      {
      }*/
      #ExtImg 
      { 
         cursor: url("/Images/Cursors/Less-anoop.cur"), auto;
         height: 100%;
      }
   </style>
   ';
}
// Готовим форму для перевывода картинки
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
echo '
   <style type="text/css">
   #Ext
   {
      height: 90vh;
   }
   #ExtImg
   {
      height: 90vh;
   }
   </style>
   ';
*/  






/*
echo '
   <style type="text/css">
   #Ext
   {
      height: 90vh;
   }
   #ExtImg
   {
      height: 90vh;
   }
   </style>
   ';
*/  
   /*
   list($width, $height, $type, $attr) = getimagesize($ImagePass);
   if ($width>$height)
   {
      // по ширине
      echo '
      <style type="text/css">
      #Ext
      {
         width: 60vw;
         margin-top: 2vw;
         margin-left: 5vw;
         padding: 1vw;
         background: white;
      }
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
      #Ext
      {
         height: '.$ImgHeight.'vh;
         width: '.$ImgWidth.'vh;
         background: white;
      }
      #ExtImg
      {
         height: '.$ImgHeight.'vh;
      }
      </style>
      ';
   }

   echo '   
   <style type="text/css">
   body 
   {
      background: 
         url(/example/image/a3.png) 90% 90% no-repeat fixed, 
         url(/example/image/a2.png) 40% 40% no-repeat fixed, 
         url(/example/image/a1.jpg) no-repeat fixed;
         background-size: auto, auto, cover;
      animation: ball 40s linear infinite;
   }
   @keyframes ball 
   {
      from { background-position: 3000px 90%, 180% 40%, 0 0; }
      to { background-position: -2000px 90%, -300px 20%, 0 0; }
   }
   </style>
   ';
   */

   //echo '<div id="Ext" align="center">';        
   //echo '<img id="ExtImg" src="'.$ImagePass.'">';
   //echo '</div>';

/*
   //echo '$ImagePass='.$ImagePass.'<br>';
   //echo("Location: http://".$_SERVER['HTTP_HOST'].'/'.$ImagePass).'<br>';
   //Header("Location: http://".$_SERVER['HTTP_HOST'].'/'.$ImagePass);
   //echo '<img src="'.$ImagePass.'" alt="'.$ImagePass.'">';
*/

// 2. --------- фоны

/* 2.1
echo 'фоны='.$ImagePass.'<br>';
$ImagePass='example/image/a3.png';
echo 'фоны='.$ImagePass.'<br>';
echo '<img src="'.$ImagePass.'" alt="'.$ImagePass.'">';
*/
   /* 2.2
   echo '   
   <style type="text/css"> 
   body
   {
      background: url(example/image/a1.jpg) 90% 90% no-repeat fixed; 
      background-size: auto, auto, cover;
   }
   </style>
   ';
   */
   
      /* 2.3
      background: url(/example/image/a3.png) 90% 90% no-repeat fixed, 
                  url(/example/image/a2.png) 40% 40% no-repeat fixed, 
                  url(/example/image/a1.jpg) no-repeat fixed;
      background-size: auto, auto, cover;
      */

   /* 2.4
   echo '   
   <style type="text/css">
   body 
   {
      background: 
         url(/example/image/a3.png) 90% 90% no-repeat fixed, 
         url(/example/image/a2.png) 40% 40% no-repeat fixed, 
         url(/example/image/a1.jpg) no-repeat fixed;
         background-size: auto, auto, cover;
      animation: ball 40s linear infinite;
   }
   @keyframes ball 
   {
      from { background-position: 3000px 90%, 180% 40%, 0 0; }
      to { background-position: -2000px 90%, -300px 20%, 0 0; }
   }
   </style>
   ';
   */

// 3. ----------
//echo '$_SESSION["js"]='.$_SESSION['js'].'<br>'; 

/*
// Выбираем страницу входа на сайт
if (prown\getComRequest('Com')==NULL)
{
   //echo 'Начальная страница!'.'<br>';

   //require_once "ViewExt.php";
   //ViewExt($с_PageImg,$SiteDevice,$c_PersName,$c_PersEntry,$c_BrowEntry);
}
else
{
*/
   //echo 'Страница: Com='.prown\getComRequest('Com').'<br>';



// ********************************************************** ViewImage.php ***
