<?php
// PHP7/HTML5, EDGE/CHROME                                 *** EditText.php ***

// ****************************************************************************
// * ittve.me                              Создать или редактировать материал *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  28.11.2020
// Copyright © 2020 tve                              Посл.изменение: 28.11.2020

/**  ЗАМЕЧАНИЕ:
 *   --- Данный модуль для вывода картинки запускается из 2 мест: из галереи 
 * изображений и из самого себя.
 *   --- При вызове из галереи задается режим вывода на странице - vimOnPage.
 *   --- Для возможного вызова картинки их данного модуля, в конце этого модуля 
 * меняется режим страничного вывода на полноформатный и наоборот.
*/

 $iMess='***';
/*
try 
{
   if (mkdir("file://ittve",0700)) 
   {
      $iMess=' Нет ошибки каталога';
   }
   else 
   {
      $iMess=' Ошибка и каталога';
   }  
} 
catch (Exception $e) 
{
    $iMess="Не получилось: ".$e->getMessage();
}
*/



//echo 'Создать материал или редактировать его'.'<br>';

//if (mkdir("file://ittve/draft",0700)) 
//if (mkdir("ittve/draft",0700)) 
/*
if (mkdir($_SERVER['PUBLIC']."/ittve"))
{
  $iMess=' Нет ошибки каталога';
}
else 
{
   $iMess=' Ошибка каталога';
}
*/

?>
<form action="textarea1.php" method="post">

   <div id="NewGallery">
      <?php
      require_once "ittveNews/GalleryNews.php";
      ?>
   </div>

   <?php
      //echo '<p><b>Создать материал или редактировать его</b>'.'</p>';
      echo '<p><textarea id="TitleArea" name="areat">Заголовок'.$iMess.'</textarea></p>';
      //echo '<p><textarea id="ContentArea" name="areac">Текст нового материала</textarea></p>';
      //echo '<p><textarea id="ContentArea" name="areac">Текст нового материала<br>';
      //echo '</textarea></p>';
      //phpinfo();
   ?>
   <p><input id="InputArea" type="submit" value="Отправить"></p>
</form>


<?php
// *********************************************************** EditText.php ***
