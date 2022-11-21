<?php                                           
// PHP7/HTML5, EDGE/CHROME                                   *** Common.php ***

// ****************************************************************************
// * ittve.me                                        Блок общих функций сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  05.03.2019
// Copyright © 2019 tve                              Посл.изменение: 21.11.2022

// ****************************************************************************
// *                       Определить работаем ли на сайте                    *
// ****************************************************************************
function isIttveme()
{
   $Result=false;
   if ($_SERVER['HTTP_HOST']=='ittve.me') $Result=true;
   return $Result;
}
// ****************************************************************************
// *                      Определить работаем ли на хостинге                  *
// ****************************************************************************
function isNichost()
{ 
   $Result=false;
   if (
     ($_SERVER['HTTP_HOST']=='ittve.me')||
     ($_SERVER['HTTP_HOST']=='www.ittve.me')||
     ($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
   {
      $Result=true;
   }
   return $Result;
}
// ****************************************************************************
// *            Вывести (определить HTML-разметку) одну карточку галереи      *
// ****************************************************************************
function GViewImage($FileName,$Comment,$AreaText=false,$Action='Image')
{
   echo 
      '<div class="Card"> '.
      '<button class="bCard" type="submit" name="'.$Action.'" value="'.$FileName.'">'.
      '<img class="imgCard" src="'.$FileName.'" alt="'.$FileName.'">'.
      '</button>';
   // Выводим существующий комментарий или 
   // текст для редактирования
   if ($AreaText) 
   {
      echo '
         <textarea class="taCard" name="aream">Текст комментария к картинке</textarea>
         ';
   }
   else echo '<p class="pCard">'.$Comment.'</p>';
   echo 
      '</div>';
}
function GLoadImage($FileName,$Comment,$AreaText=false,$Action='Image')
{
   /*
   ?>
   <!-- -->
   <div class="Card">
   <!-- 
   <button class="bCard" type="submit" name="Upload" value="FileName">
   -->
   <input type="file" name="image" id="image">
   <img class="imgCard" src="sampo.jpg" alt="FileName">
   <input type="submit" name="upload" id="upload" value="Upload">
   <!-- 
   </button>
   -->
   <textarea class="taCard" name="aream">Текст комментария к картинке</textarea>
   </div>
   <?php
   */
   ?>
   <!-- -->
   <div class="Card">
   <button class="bCard" type="submit" name="upload" value="FileName">
   <input type="hidden" name="MAX_FILE_SIZE" value="57200">
   <input type="file" name="image" id="image">
   <img class="imgCard" src="sampo.jpg" alt="FileName">
   <!-- 
   <input type="submit" name="upload" id="upload" value="Upload">
   -->
   </button>
   <textarea class="taCard" name="aream">Текст комментария к картинке</textarea>
   </div>
   <?php

}
// ************************************************************* Common.php *** 
