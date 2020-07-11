<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Site.php ***

// ****************************************************************************
// * ittve.me                               Загрузить разметку страницы сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 14.06.2020

?>
<!-- 
-->

<div id="Gallery">
   <?php
   require_once "Art/GalleryArt.php";
   ?> 
</div>

<div id="Content">
   <section id="News">
      <?php
         require_once "Art/ittve01-001-20130201-Особенности-устройства-винтиков-в-моей-голове.html";
         //$browser = get_browser(null, true);
         //print_r($browser);
      ?>
   </section>
   <section id="Life">
      <?php
         require_once "Arc/ittve02-114-20180922-По-тропе-к-карнизу-реки-Бзерпь.html";
      ?>
   </section>
</div>

<div id=imgDiv>
   <img id="imgFull" class="imgCard" 
   src="Art/ittve01-001-На-Сампо.jpg" 
   alt="На горе Сампо">
</div>

<div id="MainMenu">
   <ul class="sm sm-blue">
      <li><a href="http://localhost:82/">Отладка меню сайта doortry.ru</a></li>
      <li class="DoubleRight"><a href="#">Новости</a></li>
      <li class="DoubleLeft"><a href="#">Микропутешествия</a>
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
      <li class="DoubleRight"><a href="#">Простая жизнь</a></li>
      <li class="OneRight"><a href="#">Хронология</a></li>
      <li class="OneRight"><a href="#">Карты</a></li>
   </ul>	
</div>
  
<div id="Footer">
   <div id="LeftFooter">
      <?php 
         //echo $SiteDevice/*.': '.$SiteRoot.'-'.$SiteAbove.'-'.$SiteHost*/; 
         //echo $UserAgent.'<br>';
         //echo '$IsScript='.prown\sayLogic($IsScript).'<br>';
         
         /*
         echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
         $browser = get_browser(null, true);
         print_r($browser);
         */
      ?>
         
      <script>
         document.write("У Вас включён JavaScript!");
      </script>
      <noscript>У Вас отключён JavaScript!</noscript>
         
   </div>
   <div id="LifeMenu">
      <form action="http://localhost:83/index.php">
      <button title="Жизнь и путешествия!" id="btnLifeMenu" onclick="clickLifeMenu()"
         name="Com" value="LifeMenu">
         <img id="imgLifeMenu" src="/Images/Buttons/tveMenuD.png" alt="tveMenuD">
      </button>
      </form>  
   </div>
   <div id="RightFooter">
      <?php
      require_once "NavSet.php";
      ?>
   </div>
</div>

<div align="center" id="Ext">
   <?php
   require_once "ViewExt.php";
   ViewExt($с_PageImg,$SiteDevice,$c_PersName,$c_PersEntry,$c_BrowEntry);
   ?>
</div>
  
<?php
//}
// *************************************************************** Site.php ***
