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
// Шрифты и jquery.com/ui
echo '<link rel="stylesheet"'.
   'href="https://fonts.googleapis.com/css?family=Anonymous+Pro:400,400i,700,700i&amp;'.
   'subset=cyrillic">';
echo '<link rel="stylesheet"'.
   'href="https://fonts.googleapis.com/css?family=Open+Sans:700">';
echo '<link rel="stylesheet"'.
   'href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">';
echo '<link rel="stylesheet" type="text/css"
   href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
   <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
   </script>
   <script
      src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
      integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
      crossorigin="anonymous">
   </script>';
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
   echo '<link rel="stylesheet" type="text/css" href="Styles/styleSet.css">';
   require_once "iMobileStyles.php";
}
else 
{ 
   /*
   echo '<link rel="stylesheet" type="text/css" href="Styles/styleSet.css">';
   echo '<link rel="stylesheet" type="text/css" href="Styles/ImgRight.css">';
   echo '<link rel="stylesheet" type="text/css" href="Styles/CalcYes.css">';
   */

}
echo '</head>';
echo '<body>';

?>




<?php

// ******************************************************* iniHtmlBegin.php ***
