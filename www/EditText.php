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

//echo 'Создать материал или редактировать его'.'<br>';

?>
<form action="textarea1.php" method="post">

   <div id="NewGallery">
      <?php
      require_once "ittveNews/GalleryNews.php";
      ?>
   </div>

   <p><b>Создать материал или редактировать его</b></p>
   <p><textarea id="TitleArea" name="areat">Заголовок</textarea></p>
   <p><textarea id="ContentArea" name="areac">Текст нового материала</textarea></p>
   <p><input id="InputArea" type="submit" value="Отправить"></p>
</form>


<?php
// *********************************************************** EditText.php ***
