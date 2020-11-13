<?php
// PHP7/HTML5, EDGE/CHROME                                    *** index.php ***

// ****************************************************************************
// * ittve.me                          Обо мне, путешествиях и ... Черногории *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 04.06.2020

//echo 'Настройки';

   $с_PageImg='ittveme-Подъём-настроения.jpg';
   $с_PageImg='onwidth.jpg';
   $с_PageImg='onheight.jpg';
   $с_PageImg='oni.jpg';
   
   $ImageFile='Images/'.$с_PageImg;
   
   
   list($width, $height, $type, $attr) = getimagesize($ImageFile);
   if ($width>$height)
   {
      // по ширине
   echo '
   <style type="text/css">
   
   * 
{
   box-sizing: border-box;
}
html, body,
a, abbr, acronym, address, article, aside, audio, b, big, blockquote,
canvas, caption, center, cite, code, dd, del, details, dfn, div, dl, dt, 
em, embed,  
fieldset, figcaption, figure, footer, form, 
h1, h2, h3, h4, h5, h6, header, hgroup, i, iframe, img, ins, kbd, 
label, legend, li, mark, menu, nav, 
object, ol, output, p, pre, q, ruby, 
s, samp, section, small, span, strike, strong, sub, summary, sup, 
table, tbody, td, tfoot, th, thead, time, tr, tt, u, ul, var, video 
{
	margin: 0;
	padding: 0;
	border: 0;
	vertical-align: baseline;
}
   </style>
   ';

   }
   else
   {
   // по высоте
   echo '
   <style type="text/css">
   
   * 
{
   box-sizing: border-box;
}
html, body,
a, abbr, acronym, address, article, aside, audio, b, big, blockquote,
canvas, caption, center, cite, code, dd, del, details, dfn, div, dl, dt, 
em, embed,  
fieldset, figcaption, figure, footer, form, 
h1, h2, h3, h4, h5, h6, header, hgroup, i, iframe, img, ins, kbd, 
label, legend, li, mark, menu, nav, 
object, ol, output, p, pre, q, ruby, 
s, samp, section, small, span, strike, strong, sub, summary, sup, 
table, tbody, td, tfoot, th, thead, time, tr, tt, u, ul, var, video 
{
	margin: 0;
	padding: 0;
	border: 0;
	vertical-align: baseline;
}
   </style>
   ';
   }
   /*
   // по ширине
   echo '
   <style type="text/css">
   
   * 
{
   box-sizing: border-box;
}
html, body,
a, abbr, acronym, address, article, aside, audio, b, big, blockquote,
canvas, caption, center, cite, code, dd, del, details, dfn, div, dl, dt, 
em, embed,  
fieldset, figcaption, figure, footer, form, 
h1, h2, h3, h4, h5, h6, header, hgroup, i, iframe, img, ins, kbd, 
label, legend, li, mark, menu, nav, 
object, ol, output, p, pre, q, ruby, 
s, samp, section, small, span, strike, strong, sub, summary, sup, 
table, tbody, td, tfoot, th, thead, time, tr, tt, u, ul, var, video 
{
	margin: 0;
	padding: 0;
	border: 0;
	vertical-align: baseline;
}
   </style>
   ';
*/
   
   /*
   // по высоте
   echo '
   <style type="text/css">
   
   * 
{
   box-sizing: border-box;
}
html, body,
a, abbr, acronym, address, article, aside, audio, b, big, blockquote,
canvas, caption, center, cite, code, dd, del, details, dfn, div, dl, dt, 
em, embed,  
fieldset, figcaption, figure, footer, form, 
h1, h2, h3, h4, h5, h6, header, hgroup, i, iframe, img, ins, kbd, 
label, legend, li, mark, menu, nav, 
object, ol, output, p, pre, q, ruby, 
s, samp, section, small, span, strike, strong, sub, summary, sup, 
table, tbody, td, tfoot, th, thead, time, tr, tt, u, ul, var, video 
{
	margin: 0;
	padding: 0;
	border: 0;
	vertical-align: baseline;
}
   </style>
   ';
*/
   /*
   echo '
   <style type="text/css">
   </style>
   ';
   */
         /*
         
            html
{
         height: 100%;
         background: red;
}


      body 
      {
         height: 90%;
         background: blue;
      }

         
         
         
         position: fixed;
   position: fixed; 
   overflow: auto; 
         
         top: 5%; 
         height: 10%;
         width: 70%; 
         */
   
// <span style="color: red; font-size: 2em">U</span>

echo '<div id="Ext" align="center">';

//echo $width.'=='.$height.'=='.$type.'=='.$attr.'==<br>';


//echo '<div id="Ext">';
//echo '<img src="'.$ImageFile.'" height="100%" align="center">';
//echo '<img id="ExtImg" src="'.$ImageFile.'" width="90%">';
//echo '<img src="'.$ImageFile.'" height="90%">';
echo '<img id="ExtImg" src="'.$ImageFile.'">';
echo '</div>';

// ************************************************************** index.php ***
