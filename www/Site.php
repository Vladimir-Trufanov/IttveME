<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Site.php ***

// ****************************************************************************
// * ittve.me                               Загрузить разметку страницы сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 14.06.2020

//function MarkSite()
//{

?>
<!-- 
-->

<div class="MainMenu">
   <ul class="sm sm-blue">
      <li><a href="http://localhost:82/">Отладка меню сайта doortry.ru</a></li>
      <li><a href="#">Новости</a></li>
      <li><a href="#">Микропутешествия</a>
      <ul>
         <li><a href="#">По тропе к карнизу реки Бзерпь</a></li>
         <li><a href="#">Голубые озера</a></li>
         <li><a href="#">Аптекарский сад</a>
            <ul>
               <li><a href="###">'Тысячелистник в декоре'</a></li>
               <li><a href="###">Гербарий</a></li>
            </ul>
         </li>
      </ul>
      </li>
      <li><a href="#">Простая жизнь</a></li>
   </ul>	
</div>

<!-- 
<div id="Content">
-->

<div class="Gallery">
   <?php
   require_once "Art/GalleryArt.php";
   ?> 
</div>

<section class="News" id="Rocary1">
   <?php
   require_once "Art/ittve01-001-20130201-Особенности-устройства-винтиков-в-моей-голове.html";
   ?>
</section>

<section class="Life">
   <?php
   require_once "Arc/ittve02-114-20180922-По-тропе-к-карнизу-реки-Бзерпь.html";
   ?>
</section>

<div>
   <img class="imgCard" id="Rocary" 
   src="Art/ittve01-001-На-Сампо.jpg" 
   alt="На горе Сампо">
   <!-- 
   src="https://3.downloader.disk.yandex.ru/preview/72929e9c7c66f597b4f92c15b812cc3dbf08221c0e969a6663f79a4ece7ef206/inf/DhLO1VNSy6snhnvOdCmJUcSnXDlNO2C_9P8eTvVJCRrdN8LxBBo8Z_Uz8bPLQj88iGyLe-r0UBJ9MmzptJzqSw==?uid=195746226&filename=IMG_2548.JPG&disposition=inline&hash=&limit=0&content_type=image%2Fjpeg&tknv=v2&owner_uid=195746226&size=1600x762"
   src="/Images/nasampo.jpg" 
   -->
</div>


<!-- 
</div>
-->

  
<div class="Footer">
   <div class="LeftFooter">
      <?php 
         //echo $SiteDevice/*.': '.$SiteRoot.'-'.$SiteAbove.'-'.$SiteHost*/; 
         // echo $UserAgent.'<br>';
         //echo '$IsScript='.prown\sayLogic($IsScript).'<br>';
         
         /*
         echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
         $browser = get_browser(null, true);
         print_r($browser);
         */
         
         
         /*
         <script type="text/javascript">
            document.write("У Вас включён JavaScript!");
         </script>
         <noscript><span>У Вас отключён JavaScript...</span></noscript>
         */
      ?>
         
         <script type="text/javascript">
            document.write("У Вас включён JavaScripti!");
         </script>
         <noscript>У Вас отключён JavaScript!</noscript>
         
         <div id="isJavaScript">
         <span>
         <script> document.write("isJavaScript"); </script>
         <noscript>noJavaScript</noscript>
         </span>
         </div>

         
         
   </div>
   <div class="LifeMenu">
      <form action="http://localhost:83/index.php">
      <button title="Жизнь и путешествия!" id="btnLifeMenu" onclick="clickLifeMenu()"
         name="Com" value="LifeMenu">
         <img id="imgLifeMenu" src="/Images/Buttons/tveMenuD.png" alt="tveMenuD">
      </button>
      </form> 
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
         //echo $UserAgent.'<br>';
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
//}
// *************************************************************** Site.php ***
