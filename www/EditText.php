<?php
// PHP7/HTML5, EDGE/CHROME                                 *** EditText.php ***

// ****************************************************************************
// * ittve.me                              Создать или редактировать материал *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  28.11.2020
// Copyright © 2020 tve                              Посл.изменение: 05.11.2022

?>

<?php
/*
// Создаем каталог для хранения изображений, если его нет.
// И отдельно (чтобы сработало на старых Windows) задаем права
$imgDir = "GalleryProba";
if (!is_dir($imgDir))
{
   mkdir($imgDir);      
   chmod($imgDir,0777);
}
// set the maximum upload size in bytes
$max = 57200;
if (isset($_POST['upload'])) 
{     
   // define the path to the upload folder
   $destination = $imgDir.'/';
   try 
   {
      $upload = new ttools\UploadToServer($destination);
      $upload->move();
      $upload->setMaxSize($max);
      $result = $upload->getMessages();
   } 
   catch (Exception $e) 
   {
      echo $e->getMessage();
   }
}
*/
   
echo '<p><textarea id="TitleArea" name="areat">Заголовок</textarea></p>';
   ?>
   <!-- 
   <p><a href="download.php?file=pic.png">Download image</a></p>
   <form action="" method="post" enctype="multipart/form-data" id="uploadImage">
   <p>
      <label for="image">Upload images:</label>
      <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max; ?>">
      <input type="file" name="image" id="image1">
   </p>
   <p>
      <input type="submit" name="upload" id="upload1" value="Upload">
   </p>
   </form>
   -->
   <?php

// Помещаем значение переменной в область редактирования TinyMCE
echo '
   <div class="WorkTiny">
   <form id="frmTinyText" method="get" action="'.$urlHome.'">
   <textarea id="mytextarea" name="dor">
'; 
//echo htmlspecialchars($contents);
echo 
   '<p>
   Текст нового материала
   Текст 1 нового материала
   Текст 2 нового материала
   Текст 3 нового материала
   Текст 4 нового материала
   Текст 5 нового материала
   </p>
';

echo '
   </textarea>
   </form>
'; 
   
  

?>
<input type="submit" name="enter" value="Сохранить материал" form="frmTinyText">
<?php
// *********************************************************** EditText.php ***
