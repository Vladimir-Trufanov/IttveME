<?php
// PHP7/HTML5, EDGE/CHROME                             *** iniHtmlBegin.php ***

// ****************************************************************************
// * ittve.me                                           Загрузить начало HTML * 
// *                              c подключением основного или мобильного CSS *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.01.2019
// Copyright © 2019 tve                              Посл.изменение: 14.07.2020

/*
// Шрифты 
echo '<link rel="stylesheet"'.
   'href="https://fonts.googleapis.com/css?family=Anonymous+Pro:400,400i,700,700i&amp;'.
   'subset=cyrillic">';
echo '<link rel="stylesheet"'.
   'href="https://fonts.googleapis.com/css?family=Open+Sans:700">';
echo '<link rel="stylesheet" type="text/css" 
   href="TJsPrown/TJsPrown.css">
   <script 
      src="/TJsPrown/TJsPrown.js">
   </script>
   <script 
      src="IttveME.js">
   </script>
   <script> 
      MakeCatchyQuotes() 
   </script>';
*/   
   
if ($SiteDevice==Mobile) 
{   
   echo '<link rel="stylesheet" type="text/css" href="Styles/Styles.css">';
   echo '<link rel="stylesheet" type="text/css" href="Styles/styleSet.css">';
   require_once "iMobileStyles.php";
}
else 
{ 
   /*
   echo '<link rel="stylesheet" type="text/css" href="Styles/Styles.css">';
   echo '<link rel="stylesheet" type="text/css" href="Styles/styleSet.css">';
   echo '<link rel="stylesheet" type="text/css" href="Styles/ImgRight.css">';
   echo '<link rel="stylesheet" type="text/css" href="Styles/CalcYes.css">';
   */
   /*
   echo "
   
   <style>
   #menu 
   {
      float: left;
   }
   #menu > li 
   {
      width: 200px;
      float: left;
   }
   .ui-menu .ui-menu 
   {
      width: 200px;
      float: none;
   }
   </style>

   <script>
   $(document).ready(function() {
      $('#menu').menu({
      position: 
      {
         my: 'center top',
         at: 'center bottom'
      },
      icons: 
      { 
         submenu: 'ui-icon-triangle-1-s'
      }
      });
   }); 
   </script>
   ";
   */

   /* 
   echo '
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="SmartMenus/sm-core-css.css">
<link rel="stylesheet" href="SmartMenus/sm-blue.css">
<script src="SmartMenus/jquery.smartmenus.min.js"></script>
   ';
   */

   /*
   ?>
   <script>
   $(document).ready(function() 
   {
      MakeDiv();
      $('.sm').smartmenus({
         showFunction: function($ul, complete) 
         {
            $ul.slideDown(250, complete);
         },
         hideFunction: function($ul, complete) 
         {
            $ul.slideUp(250, complete); 
         }
      });
      isDiv();   
   });
   </script>
   <?php
   */
}
echo '</head>';
echo '<body>';

?>
<!-- 
-->

<div id="MainMenu">
   <ul class="sm sm-blue">
      <li><a href="http://localhost:82/">Отладка меню сайта doortry.ru</a></li>
      <!-- 
      <li><a href="#">Новости</a></li>
      -->
      <li><a href="#">Простая жизнь</a></li>
      <li><a href="#">Микропутешествия</a>
      <ul>
         <li><a href="#">По тропе к карнизу реки Бзерпь</a></li>
         <li><a href="#">Голубые озера</a></li>
         <li><a href="#">Этюд из аптекарского сада</a>
            <ul>
               <li><a href="###">'Тысячелистник в декоре'</a></li>
               <li><a href="###">Гербарий</a></li>
            </ul>
         </li>
      </ul>
      </li>
      <li><a href="#">Хронология</a></li>
      <li><a href="#">Карты</a></li>
   </ul>	
</div>
<?php



// ******************************************************* iniHtmlBegin.php ***
