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
      <li><a href="#">Хронология</a></li>
      <li><a href="#">Карты</a></li>
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
  
<div id="Ext">
   <?php
   //prown\ViewGlobal(avgSESSION);
   //prown\ViewGlobal(avgGLOBALS);
   //prown\ViewGlobal(avgCOOKIE);
   $ImageFile='Images/'.$с_PageImg;
   echo $ImageFile.'<br>';
   list($width, $height, $type, $attr) = getimagesize($ImageFile);
   echo $width.'=='.$height.'=='.$type.'=='.$attr.'==<br>';
   //echo '<img src="'.$ImageFile.'" $attr alt="пример getimagesize()" />'.'<br>';
   
   /*
   echo '
   <img id="ImaId" src="'.$ImageFile.'" width="100%" />
   '.'<br>';
   */
   echo '
   <img id="ImaId" src="'.$ImageFile.'" height="100%" />
   '.'<br>';
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

</div>
  
<?php
//}
// *************************************************************** Site.php ***
