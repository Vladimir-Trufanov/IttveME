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
      <a href="Nastr.php">
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
   //prown\ViewGlobal(avgSESSION);
   //prown\ViewGlobal(avgGLOBALS);
   //prown\ViewGlobal(avgCOOKIE);
   
   $ImageFile='Images/'.$с_PageImg;

   /*
   echo $ImageFile.'<br>';
   list($width, $height, $type, $attr) = getimagesize($ImageFile);
   echo $width.'=='.$height.'=='.$type.'=='.$attr.'==<br>';
   */
   
   /*
   echo '
   <img id="ImaId" src="'.$ImageFile.'" width="100%" />
   '.'<br>';
   */
   
   echo '
   <style type="text/css">
      #Ext
      {
         top: 5%;
         height: 70%;
      }
   </style>

   ';
   
   

   echo '
   <img src="'.$ImageFile.'" height="100%" />
   '.'<br>';
   
   ViewInfo($с_PageImg,$SiteDevice,$c_PersName,$c_PersEntry,$c_BrowEntry);

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
}
// ************************************************************* NavSet.php ***
