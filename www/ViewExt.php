<?php
// PHP7/HTML5, EDGE/CHROME                                  *** ViewExt.php ***

// ****************************************************************************
// * ittve.me    Показать див Ext, как отдельную страницу при входе "Separate *
// *         page at login" или как увеличенное изображение "Enlarged image", *
// *                                            выбранной в галерее, картинки *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  11.07.2020
// Copyright © 2020 tve                              Посл.изменение: 11.07.2020


function ViewInfo($с_PageImg,$SiteDevice,$c_PersName,$c_PersEntry,$c_BrowEntry)
{
  ?>
   <div id="Info">
      <div id="InfoLeft">
         Copyright (c) 2019 Труфанов Владимир   tve58@inbox.ru<br>
         <?php 
            //echo $SiteDevice/*.': '.$SiteRoot.'-'.$SiteAbove.'-'.$SiteHost*/; 
            //echo $UserAgent.'<br>';
         ?>
      </div>
   
      <!-- 
      <a class="btn btn-default" href="#">
      -->
      
      
      
      <!-- 
      <a href="Nastr.php">
      <a href="http://localhost:83/index.php?Com=LifeMenu">
      -->
      <a href="index.php?Com=LifeMenu">
         <i class="fa fa-align-left" title="Align Left"></i>
      </a>

      <div id="InfoRight">
         <?php 
            echo $SiteDevice.
            " ".$c_PersName." ".$_SESSION['Counter'].".".$c_PersEntry."[".$c_BrowEntry."]"; 
         ?>
      </div>
   </div>
<?php

}

function ViewExt($с_PageImg,$SiteDevice,$c_PersName,$c_PersEntry,$c_BrowEntry)
{

   $ImageFile='Images/'.$с_PageImg;
   //echo '$ImageFile='.$ImageFile;

   
   //ViewInfo($с_PageImg,$SiteDevice,$c_PersName,$c_PersEntry,$c_BrowEntry);
   list($width, $height, $type, $attr) = getimagesize($ImageFile);
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
         background: red;
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
      // по высоте
      echo '
      <style type="text/css">
      #Ext
      {
         height: 90vh;
         background: red;
      }
      #ExtImg
      {
         height: 90vh;
      }
      </style>
      ';
   }



   ?>
   <!-- Пример кнопки для перехода на другую страницу PHP
   <form name="test" method="post" action="Nastr.php">
   <input type="submit" value="Отправить">
   </form>
   -->
   <!-- 
   <div  onclick="paNastr()">
   <div>Изменить настройки сайта в браузере</div>
   </div>
   -->
   <?php
   //echo '<div id="Ext" align="center">';
   echo '<img id="ExtImg" src="'.$ImageFile.'">';
   //echo '</div>';
   
}
// ************************************************************ ViewExt.php ***
