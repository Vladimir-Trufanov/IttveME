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
   require_once "GalleryView.php";
   ?> 
</div>

<section class="News">
   <?php
   require_once "Pages/tveArt/tve2-114-po-trope-k-karnizu-reki-bzerp'.html";
   ?>
</section>

<section class="Life">
   <?php
   require_once "Pages/tveArc1/tve1-1-оsobennosti-ustrojstva-vintikov-v-moej-golove.html";
   ?>
</section>

<div>
   <img class="imgCard" id="Rocary" 
   src="/Images/nasampo.jpg" 
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
