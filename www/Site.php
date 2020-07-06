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
   Main
   <!-- 
   -->
   <form name="test" method="post" action="Nastr.php">
   <!-- 
   <p><b>Ваше имя:</b><br>
   <input type="text" size="40">
   </p>
   <p>
   -->
   <input type="submit" value="Отправить">
   <!-- 
   <input type="reset" value="Очистить">
   </p>
   -->
   </form>
   <!-- 
   <div  onclick="paNastr()">
   <div>Изменить настройки сайта в браузере</div>
   </div>
   -->
   
<a class="btn btn-danger" href="#">
  <i class="fa fa-trash-o fa-lg"></i> Удалить</a>
<a class="btn btn-default btn-sm" href="#">
  <i class="fa fa-cog"></i> Настройки</a>

<a class="btn btn-lg btn-success" href="#">
  <i class="fa fa-flag fa-2x pull-left"></i> Font Awesome<br>Версия 4.7.0</a>

<div class="btn-group">
  <a class="btn btn-default" href="#">
    <i class="fa fa-align-left" title="Align Left"></i>
  </a>
  <a class="btn btn-default" href="#">
    <i class="fa fa-align-center" title="Align Center"></i>
  </a>
  <a class="btn btn-default" href="#">
    <i class="fa fa-align-right" title="Align Right"></i>
  </a>
  <a class="btn btn-default" href="#">
    <i class="fa fa-align-justify" title="Align Justify"></i>
  </a>
</div>

<div class="input-group margin-bottom-sm">
  <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
  <input class="form-control" type="text" placeholder="Ваш Email">
</div>
<div class="input-group">
  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
  <input class="form-control" type="password" placeholder="Пароль">
</div>

<div class="btn-group open">
  <a class="btn btn-primary" href="#"><i class="fa fa-user fa-fw"></i> Пользователь</a>
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
    <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
  </a>
  <ul class="dropdown-menu">
    <li><a href="#"><i class="fa fa-pencil fa-fw"></i> Редактировать</a></li>
    <li><a href="#"><i class="fa fa-trash-o fa-fw"></i> Удалить</a></li>
    <li><a href="#"><i class="fa fa-ban fa-fw"></i> Забанить</a></li>
    <li class="divider"></li>
    <li><a href="#"><i class="fa fa-unlock"></i> Дать права администратора</a></li>
  </ul>
</div>
   
</div>
  
<div id="Info">
   <div id="InfoLeft">
      Copyright (c) 2019 Труфанов Владимир   tve58@inbox.ru<br>
      <?php 
         //echo $SiteDevice/*.': '.$SiteRoot.'-'.$SiteAbove.'-'.$SiteHost*/; 
         //echo $UserAgent.'<br>';
      ?>
   </div>
   <div id="InfoRight">
      <?php 
         echo $SiteDevice.
         " ".$c_PersName." ".$_SESSION['Counter'].".".$PersEntry."[".$BrowEntry."]"; 
      ?>
   </div>
</div>
<?php
//}
// *************************************************************** Site.php ***
