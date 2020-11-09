<?php
// PHP7/HTML5, EDGE/CHROME                                *** ViewImage.php ***

// ****************************************************************************
// * ittve.me          Показать изображение, выбранной в галерее картинки, на *
// *                  отдельной странице в ее рамках или натуральной величины *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  11.07.2020
// Copyright © 2020 tve                              Посл.изменение: 07.11.2020
  
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
   echo '<div id="Ext">';
   echo '<img id="ExtImg" src="'.$ImagePass.'">';
   echo '</div>';

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
