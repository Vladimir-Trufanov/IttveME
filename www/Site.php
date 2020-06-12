<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Site.php ***

// ****************************************************************************
// * ittve.me                          Обо мне, путешествиях и ... Черногории *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 19.02.2019


/*

<div id="hello" title="Привет, Мир!">
	<p>Это диалоговое окно на самом деле является тегом div, размещенным на странице с помощью абсолютного позиционирования.</p>
	<p>Попробуйте перетащить диалоговое окно по экрану. Вы можете это сделать!</p>
</div>
      
      <script>
         $(document).ready(function() {
         $('#hello').dialog
         ({
            width: 600,
            position: 'left top',
            show: {effect:'slideDown'},
            hide: {effect:'explode', delay:250, duration:1000, easing:'easeInQuad'}
         });
         }); // end ready
      </script>

*/
?>
<!-- 
-->
<div id="Content">
<div class="Gallery">
   <?php
   require_once "Art/GalleryArt.php";
   ?> 
</div>

<section class="News" id="Rocary1">
   <?php
   require_once "Art/ittve1-1-оsobennosti-ustrojstva-vintikov-v-moej-golove.html";
   ?>
</section>

<section class="Life">
   <?php
   require_once "Arc/ittve2-114-po-trope-k-karnizu-reki-bzerp'.html";
   ?>
</section>

<div>
   <img class="imgCard" id="Rocary" 
   src="/Images/nasampo.jpg" 
   <!-- 
   src="https://3.downloader.disk.yandex.ru/preview/72929e9c7c66f597b4f92c15b812cc3dbf08221c0e969a6663f79a4ece7ef206/inf/DhLO1VNSy6snhnvOdCmJUcSnXDlNO2C_9P8eTvVJCRrdN8LxBBo8Z_Uz8bPLQj88iGyLe-r0UBJ9MmzptJzqSw==?uid=195746226&filename=IMG_2548.JPG&disposition=inline&hash=&limit=0&content_type=image%2Fjpeg&tknv=v2&owner_uid=195746226&size=1600x762"
   src="/Images/nasampo.jpg" 
   -->
   alt="Хочешь кваску">
</div>


</div>

  
<div class="Footer">
   <div class="LeftFooter">
      <?php 
         //echo $SiteDevice/*.': '.$SiteRoot.'-'.$SiteAbove.'-'.$SiteHost*/; 
         echo $uagent.'<br>';
      ?>
   </div>
   <div class="LifeMenu">
      <button class="btnLifeMenu">
         <img class="imgLifeMenu" src="/Images/Buttons/tveMenuD.png" alt="tveMenuD">
      </button>
   </div>
   <div class="RightFooter">
      <?php
      require_once "NavSet.php";
      ?>
   </div>
</div>
  
<div class="Ext">
   Main
</div>
  
<div class="Info">
   <div class="InfoLeft">
      Copyright (c) 2019 Труфанов Владимир   tve58@inbox.ru<br>
      <?php 
         //echo $SiteDevice/*.': '.$SiteRoot.'-'.$SiteAbove.'-'.$SiteHost*/; 
         //echo $uagent.'<br>';
      ?>
   </div>
   <div class="InfoRight">
      <?php 
         echo $SiteDevice.
         " ".$PersName." ".$_SESSION['Counter'].".".$PersEntry."[".$BrowEntry."]"; 
      ?>
   </div>
</div>



<?php

// *************************************************************** Site.php ***
