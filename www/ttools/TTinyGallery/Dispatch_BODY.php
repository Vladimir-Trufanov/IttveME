<?php namespace ttools; 
                                         
// PHP7/HTML5, EDGE/CHROME                            *** Dispatch_BODY.php ***

// ****************************************************************************
// * TinyGalleryClass   Блок функций при показе страниц, то есть на фазе BODY *
// *                                                                          *
// * v1.0, 14.03.2022                              Автор:       Труфанов В.Е. *
// * Copyright © 2022 tve                          Дата создания:  13.11.2022 *
// ****************************************************************************

// ****************************************************************************
// *                  Вывести заголовок страницы с материалом                 *
// ****************************************************************************
function MakeTitle($NameGru,$NameArt,$DateArt='')
{
   $echo='';
   if ($NameArt==ttMessage) $echo=$echo.'<div id="Message">'.$NameGru.'</div>'; 
   else if ($NameArt==ttError) $echo=$echo.'<div id="NameError">'.$NameGru.'</div>'; 
   else
   {
      $echo=$echo.'<div id="TopLine">'; 
      if ($NameArt=='')
      {
         $echo=$echo.'<div id="NameGru">'.'<h1>'.$NameGru.'</h1>'.'</div>'; 
         $echo=$echo.'<div id="NameArt">'.'</div>'; 
      }
      else
      {
         $echo=$echo.'<div id="NameGru">'.$NameGru.':'.'</div>'; 
         $echo=$echo.'<div id="NameArt">'.'<h1>'.$NameArt.' ['.$DateArt.']'.'</h1>'.'</div>'; 
      } 
      $echo=$echo.'</div>'; 
   }
   return $echo;
}

// ****************************************************** Dispatch_BODY.php ***
