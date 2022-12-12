<?php namespace edit; 

// PHP7/HTML5, EDGE/CHROME                                *** EditClass.php ***

// ****************************************************************************
// * ittve.me                              Редактировать или создать материал * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  06.11.2022
// Copyright © 2022 tve                              Посл.изменение: 12.12.2022

$Edit=new Editing($urlHome);
/*
echo
  '<div id="okno">
  Всплывающее окошко!<br>
  <a href="#" class="close">Закрыть окно</a>
  </div>
  ';
*/

class Editing
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $urlHome;          // Начальная страница сайта 
   
   // *************************************************************************
   // *         Проинициализировать свойства классов по настройкам сайта,     *
   // *            запустить изменение свойств для обновления настроек        *
   // *************************************************************************
   public function __destruct() 
   {
   }
   public function __construct($ui) 
   {
      $this->urlHome=$ui;
      $this->EditText();      
   }
   // *************************************************************************
   // *                      Создать или редактировать материал               *
   // *************************************************************************
   protected function EditText()
   {
      echo '<p><textarea id="TitleArea" name="areat">Заголовок</textarea></p>';
      
      $htmlDir=$_SERVER['DOCUMENT_ROOT'].'/ittveEdit'; 
      $nameFile='Privet';
      $filename=$htmlDir.'/'.$nameFile.'.html';
      
      echo '$filename='.$filename.'<br>';
      /*
      echo '$htmlDir='.$htmlDir.'<br>'; 
      echo '$this->urlHome='.$this->urlHome.'<br>'; 
      echo '$filename='.$filename.'<br>'; 
      */
      
      // Записываем материал в файл при запросе 
      if (isset($_POST['Edit']))
      {
         $postEdit=$_POST['Edit'];
         if (isset($_POST['TextArea']))
         {
            $postDor=$_POST['Dor'];
            // Открываем файл с материалом для записи
            $f = fopen($filename,"w");
            // Записываем текст
            fwrite($f,$postDor); 
            // Закрываем файл
            fclose($f);
         }
      }
      // Извлекаем прежнее содержимое материала в переменную $contents
      // или начинаем новый материал
      if (is_file($filename)) 
      {
         $handle=fopen($filename,"r");
         $contents=fread($handle,filesize($filename));
         fclose($handle);
         $contents=htmlspecialchars($contents);
      }
      else $contents='Текст нового материала';
      
      // Формируем область редактирования текста TinyMCE и 
      // помещаем значение переменной $contents в эту область
      echo '
         <div id="WorkTiny">
         <form id="frmTinyText" method="get" action="'.$this->urlHome.'">
         <textarea id="TinyArea" name="TextArea">
      '; 
      echo $contents;
      echo '
        </textarea>
        </form>
        </div>
      '; 
      ?>
      <input type="submit" name="Edit" value="Сохранить материал" form="frmTinyText">
      <?php
   }
}
// ********************************************************** EditClass.php ***
