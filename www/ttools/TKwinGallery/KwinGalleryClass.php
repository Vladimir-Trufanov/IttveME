<?php namespace ttools; 
                                         
// PHP7/HTML5, EDGE/CHROME                         *** KwinGalleryClass.php ***

// ****************************************************************************
// * TPhpTools                 Фрэйм галереи изображений, связанных с текущим *
// *                   материалом (uid) из выбранной (указанной) группы (pid) *
// *                                                                          *
// * v2.0, 17.02.2023                              Автор:       Труфанов В.Е. *
// * Copyright © 2022 tve                          Дата создания:  18.12.2019 *
// ****************************************************************************

/**
 * Класс --------- KwinGallery строит интерфейс для выбора некоторых символа Юникода.
 * Выборка символов осуществляется из одного из подмассивов общего массива 
 * массива $aUniCues. Подмассивы (наборы) созданы из авторских соображений и 
 * имеют свои номера и названия, так 0 - 'Знаки всякие-разные', 1 - 'Символы 
 * валют', 2 - 'Ожидаемые символы' и так далее.
 * 
 * Для взаимодействия с объектами класса должны быть определены константы:
 *
 * articleSite  - тип базы данных (по сайту)
 * pathPhpTools - путь к каталогу с файлами библиотеки прикладных классов;
 * pathPhpPrown - путь к каталогу с файлами библиотеки прикладных функции
 * articleSite  - тип базы данных (по сайту)
 * editdir      - каталог размещения файлов, связанных c материалом
 * imgdir       - каталог файлов служебных для сайта изображений
 * jsxdir       - каталог размещения файлов javascript
 *    
 * Пример создания объекта класса:
 * 
 * // Указываем место размещения библиотеки прикладных функций TPhpPrown
 * define ("pathPhpPrown",$SiteHost.'/TPhpPrown/TPhpPrown');
 * // Указываем место размещения библиотеки прикладных классов TPhpTools
 * define ("pathPhpTools",$SiteHost.'/TPhpTools/TPhpTools');
 * // Указываем каталоги размещения файлов
 * define("editdir",'ittveEdit');  // файлы, связанные c материалом
 * define("imgdir",'Images');      // служебные для сайта файлы изображений
 * // Указываем тип базы данных (по сайту) для управления классом ArticlesMaker
 * define ("articleSite",'IttveMe'); 
 * // Cоздаем объект для управления изображениями в галерее, связанной с 
 * // материалами сайта из базы данных
 * $Galli=new ttools\KwinGallery(gallidir,$nym,$pid,$uid);
**/

// Свойства:
//
// --- $FltLead - команда управления передачей данных. По умолчанию fltNotTransmit,
//            то есть данные о загрузке не передаются для контроля ни в кукисы, 
// ни в консоль, а только записываются в LocalStorage. Если LocalStorage,
// браузером не поддерживается, то данные будут записываться в кукисы при 
// установке свойства $FltLead в значение fltSendCookies или fltAll 
// $Page - название страницы сайта;
// $Uagent - браузер пользователя;


// ------------------------------------------ Путь к каталогу файлов класса ---
define ("TKwinGalleryDir",$SiteRoot.'/ttools/TKwinGallery');  

// Подгружаем нужные модули библиотеки прикладных функций
require_once pathPhpPrown."/CommonPrown.php";
require_once pathPhpPrown."/getTranslit.php";
require_once pathPhpPrown."/MakeCookie.php";
require_once pathPhpPrown."/iniConstMem.php";
// Подгружаем нужные модули библиотеки прикладных классов
require_once "ttools/TArticlesMaker/ArticlesMakerClass.php";
require_once pathPhpTools."/TUploadToServer/UploadToServerClass.php";
require_once pathPhpTools."/CommonTools.php";

// Вставка для Microsoft Edge (18.03.2023, иначе не находит константу)
if (!defined("Err")) define ("Err","Произошла ошибка");  

class KwinGallery
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $Arti;      // Объект по работе с базой данных материалов
   protected $apdo;      // Подключение к базе данных материалов
   protected $gallidir;  // Каталог для размещения файлов галереи и связанных материалов

   protected $nym;       // Префикс имен файлов для фотографий галереи и материалов
   protected $pid;       // Идентификатор группы текущего материала
   protected $uid;       // Идентификатор текущего материала

   protected $SiteRoot;  // Корневой каталог сайта
   protected $urlHome;   // Начальная страница сайта

   protected $EditImg;   // Имя загруженного изображения
   protected $EditComm;  // Текст начального комментария перед загрузкой файла
   
   protected $DelayedMessage;   // Отложенное сообщение

   // Образец массива элементов галереи
   /*
   protected $galleryX = array(
      "gallidir"     => "ittveEdit",
      "nym"          => "ittve",
      "pid"          => 2,
      "uid"          => 30,
      "gallery" => array(
         array(
         "Comment"  => "Ночная прогулка по Ладоге до рассвета и подъёма настроения.",
         "FileName" => "Подъём-настроения.jpg"
         ),
         array(
         "Comment"  => "На горе Сампо всем хорошо!",
         "FileName" => "На-Сампо.jpg"
         ),
         array(
         "Comment"  => "'С заботой и к мамам' - такой мамочкин хвостик.",
         "FileName" => "С-заботой-и-к-мамам.jpg"
         ),
      )
   );
   */
   //
   public function getDelayedMessage()
   {
      return $this->DelayedMessage;
   }
   // ------------------------------------------------------- МЕТОДЫ КЛАССА ---
   public function __construct($gallidir,$nym,$pid,$uid,$SiteRoot,$urlHome,$Arti) 
   {
      // Инициализируем свойства класса
      $this->gallidir=$gallidir;                    // каталог файлов редактирования
      $this->nym=$nym;                              // префикс сайта (платформы)
      $this->pid=$pid;                              // идентификатор текущей группы статей
      $this->uid=$uid;                              // идентификатор текущей статьи 
      $this->SiteRoot=$SiteRoot; 
      $this->urlHome=$urlHome; 
      // Инициируем отложенное сообщение, то есть сообщение, которое может быть
      // выведено на фазе BODY процесса построения страницы сайта 
      $this->DelayedMessage=imok;
      // Регистрируем объект по работе с базой данных материалов
      $this->Arti=$Arti;
      // Подключаемся к базе данных материалов
      $this->apdo=$this->Arti->BaseConnect();
      // Формируем начальный кукис изображения для редактирования
      $this->EditImg=\prown\MakeCookie('EditImg',imgdir.'/sampo.jpg',tStr,true);     
      // Если файл был загружен во временное хранилище, то перегружаем его
      // на сервер. Поднимаем из кукиса имя загруженного изображения.
      $this->EditImg=$this->ifKwinUpload($this->SiteRoot,$this->gallidir,$this->nym,$this->pid,$this->uid);
      // Формируем текст начального комментария перед загрузкой файла
      if ($this->EditImg==imgdir.'/sampo.jpg')
        $this->EditComm="На горе Сампо всем хорошо!";
      else
        $this->EditComm="Текст комментария";
      // Выполняем действия на странице до отправления заголовков страницы: 
      // (устанавливаем кукисы и т.д.)                  
      $this->Zero();
      // Трассируем установленные свойства
      //\prown\ConsoleLog('$this->DelayedMessage='.$this->DelayedMessage); 
   }
   public function __destruct() 
   {
   }
   // *************************************************************************
   // *   Выполнить действия на странице до отправления заголовков страницы:  *
   // *                         (установить кукисы и т.д.)                    *
   // *************************************************************************
   private function Zero()
   {
      // Проверяем, нужно ли заменить файл стилей в каталоге редактирования и,
      // (при его отсутствии, при несовпадении размеров или старой дате) 
      // загружаем из класса 
      CompareCopyRoot('sampo.jpg',TKwinGalleryDir,imgdir);
      CompareCopyRoot('deleteImg.php',TKwinGalleryDir);
   }
   // *************************************************************************
   // *            Развернуть изображения галереи из базы данных              *
   // *                          и обеспечить их ведение                      *
   // *     GalleryMode - режим вывода галереи: mwgViewing или mwgEditing    *
   // *************************************************************************
   public function BaseGallery()
   {
      $messa=imok;
      // Выбираем все фотографии по идентификатору текущей статьи
      $tableKeys=$this->Arti->SelImgKeys($this->apdo,$this->uid);

      // Если фотографий нет, то показываем шаблонную 
      // или предлагаем загрузить первую
      if (count($tableKeys)==0)
      {
         if (GalleryMode==mwgEditing) 
         {
            if (IsSet($_POST["MAX_FILE_SIZE"])) $this->GSaveImgComm();
            else  $this->GLoadImage(imgdir.'/sampo.jpg',"На горе Сампо всем хорошо!");
         } 
         else $this->GPicImage(imgdir.'/sampo.jpg',"На горе Сампо всем хорошо!");
      }
      else
      // Работаем по ключам выбранных фотографий
      {
         $i=0;
         // Перебираем изображения и загружаем их по ключам 
         // для просмотра или редактирования
         foreach ($tableKeys as $row)
         {
            $uid=$row['uid'];
            $TranslitPic=$row['TranslitPic'];
            $Comment=$row['CommPic'];
            // Загружаем изображение для просмотра
            $table=$this->Arti->SelImgPic($this->apdo,$uid,$TranslitPic);
            // Если ошибка загрузки, то завершаем цикл и возвращаем сообщение
            if ($table['TranslitPic']==Err)
            {
               $messa=$table['Pic']; break;
            }
            // Выводим загруженное изображение в карточке
            if (GalleryMode==mwgEditing) 
               $this->GViewOrDelImage($row['mime_type'],$table['Pic'],$Comment,$uid,$TranslitPic,$Action='Image');
            else
               $this->GViewImage($row['mime_type'],$table['Pic'],$Comment,$Action='Image');
               //$this->GViewImage($FileName,$Comment,$Action='Image');
            // Если задан режим редактирования, то выводим изображение для загрузки
            // (как правило, второе при выводе карточек)
            if ((GalleryMode==mwgEditing)&&($i==0)) 
            {
               if (IsSet($_POST["MAX_FILE_SIZE"])) $this->GSaveImgComm();
               else  $this->GLoadImage(imgdir.'/sampo.jpg',"На горе Сампо всем хорошо!");
            }
            $i++;
         }
      }
      return $messa;
   }
   protected function GPicImage($FileName,$Comment)
   {
      echo '<div class="Card">';
      echo '<button class="bCard">';
      echo '<img class="imgCard" src="'.$FileName.'">';
      echo '</button>';
      echo '<p class="pCard">'.$Comment.'</p>';
      echo '</div>';
   }
   protected function GViewImage($mime_type,$DataPic,$Comment,$Action='Image')
   {
      echo '<div class="Card">';
      echo '<button class="bCard" type="submit" name="'.$Action.'">';
      //echo '<img class="imgCard" src="'.$FileName.'">';
      echo '<img class="imgCard" src="data:'.$mime_type.';base64,'.base64_encode($DataPic).'"/>';
      echo '</button>';
      echo '<p class="pCard">'.$Comment.'</p>';
      echo '</div>';
   }
   protected function GViewOrDelImage($mime_type,$DataPic,$Comment,$uid,$TranslitPic,$Action='Image')
   {
      $FunClick="DeleteImg(".$uid.",'".$TranslitPic."'".",'".$Comment."'".
         ",'".pathPhpTools."'".",'".pathPhpPrown."')";

      echo '<div class="Card">';
      echo '
        <button id="bLoadImg"  class="navButtons" onclick="'.$FunClick.'" '.  
         'title="Удалить изображение">Удалить
        </button>
      ';
      echo '<button class="bCard" type="submit" name="'.$Action.'">';
      echo '<img class="imgCard" src="data:'.$mime_type.';base64,'.base64_encode($DataPic).'"/>';
      echo '</button>';
      echo '<p class="pCard">'.$Comment.'</p>';
      echo '</div>';
   }
   protected function GLoadImage($EditImg,$EditComm)
   {
      /**
       * Размещаем в форме поле для загрузки файла, а перед ним (иначе не будет
       * работать) поле для контроля размера загружаемого файла. 
       * Преимущество скрытого поля с именем MAX_FILE_SIZE в том, что PHP остановит
       * процесс загрузки файла при превышении размера
       * 
       * При нажатии на кнопку 'submit' происходит запрос с параметрами:
       * http:... .php ?MAX_FILE_SIZE=3000024 &loadimg=... .jpg &AREAM= ... 
      **/
      echo '<div class="Card">';
      echo '
         <button id="bLoadImg"  class="navButtons" onclick="alf1FindFile()"  
         title="Загрузить изображение">Загрузить изображение
        </button>
      ';
      echo '
         <form method="post" enctype="multipart/form-data"> 
         <input type="hidden" name="MAX_FILE_SIZE" value="3000024"/> 
         <input type="file"   name="loadimg"  id="infCard"
            accept="image/jpeg,image/png,image/gif" 
            onchange="alf2LoadFile();"/>  
         <img id="imgCardi" src="'.$EditImg.'" alt="'.$EditImg.'">
         <p class="pCard">'.$EditComm.'</p>
         <input type="submit" id="insCard">  
      ';
      echo '</form>';
      echo '</div>';
   }
   
   protected function GSaveImgComm()
   {
      echo '<div class="Card">';
      echo '
         <button id="bLoadComm"  class="navButtons" onclick="alf3SaveImgComm()"  
         title="Записать с комментарием">Записать с комментарием
         </button>
      ';
      echo '
         <form method="POST"> 
         <img id="imgCardi" src="'.$this->EditImg.'" alt="'.$this->EditImg.'">
         <textarea class="taCard" name="AREAM">'.$this->EditComm.'</textarea>
         <input type="submit" id="insCard">  
      ';
      echo '</form>';
      echo '</div>';
   }
   // --------------------------------------------------- ВНУТРЕННИЕ МЕТОДЫ ---

   // *************************************************************************
   // *   Если файл был загружен во временное хранилище, то перегрузить его   *
   // *       на сервер. Поднять из кукиса имя загруженного изображения.      *
   // *************************************************************************
   protected function ifKwinUpload($SiteRoot,$gallidir,$nym,$pid,$uid)
   {
      $Result=\prown\MakeCookie('EditImg');
      // Инициируем префикс, имя файла, расширение 
      $pref=$nym.$pid.'-'.$uid.'-'; $NameLoadp='NoDefine'; $Ext='nodef';
      // Ловим момент, когда файл загружен во временное хранилище
      if (IsSet($_POST["MAX_FILE_SIZE"])) 
      {
         // Перебрасываем файл из временного хранилища
         $this->DelayedMessage=$this->MakeKwinUpload($SiteRoot,$gallidir,$pref,$NameLoadp,$Ext);
         // Отмечаем новое имя загруженного файла
         if ($this->DelayedMessage==imok)
         $Result=\prown\MakeCookie('EditImg',$gallidir.'/'.$pref.$NameLoadp.'.'.$Ext,tStr);
      }
      if (IsSet($_POST["AREAM"])) 
      {
         $aFileImg=unserialize(\prown\MakeCookie('cFileImg'));
         
         $this->DelayedMessage=$this->Arti->InsertImgByTranslit
            ($this->apdo,$this->uid,$aFileImg["NamePic"],$aFileImg["TranslitPic"],
            $aFileImg["Ext"],$aFileImg["mime_type"],$aFileImg["DatePic"],$aFileImg["SizePic"],$_POST['AREAM']);
         if ($this->DelayedMessage<>imok) \prown\Alert($this->DelayedMessage.'[All-]'); 
         else $this->DelayedMessage=$this->Arti->UpdatePicByTranslit($this->apdo,$aFileImg["FileSpec"],$aFileImg["TranslitPic"]);
         if ($this->DelayedMessage<>imok) \prown\Alert($this->DelayedMessage.'[Pic]'); 
      }
      return $Result;
   }
   // *************************************************************************
   // *      Переместить загруженный файл из временного хранилища на сервер   *
   // *************************************************************************
   protected function MakeKwinUpload($SiteRoot,$gallidir,$pref,&$NameLoadp,&$Ext)
   {
      $DelayedMessage=imok;
      $imgDir=$SiteRoot.'/'.$gallidir;
      $FileName=$_FILES["loadimg"]["name"]; 
      $mime_type=$_FILES["loadimg"]["type"]; 
      $FileName=substr($FileName,0,strpos($FileName,'.'));
      $NameLoadp=\prown\getTranslit($FileName);
      // Перебрасываем файл  
      $upload=new UploadToServer($imgDir,$pref.$NameLoadp);
      $DelayedMessage=$upload->move();
      $Ext=$upload->getExt();
      // Если переброска была успешной, 
      // то переопределяем свойства текущего изображения
      if ($this->DelayedMessage==imok)
      {
         // Готовим массив свойств загруженного файла
         $FileSpec=$imgDir.'/'.$pref.$NameLoadp.'.'.$Ext;
         $aFileImg = array(
            "NamePic"     => $FileName,
            "TranslitPic" => $NameLoadp,
            "Ext"         => $Ext,
            "mime_type"   => $mime_type,
            "SizePic"     => $_FILES["loadimg"]["size"],
            "DatePic"     => date('d.m.Y',filectime($FileSpec)),
            "FileSpec"    => $FileSpec,
         );
         // Складываем массив в кукис
         $cFileImg=serialize($aFileImg); 
         \prown\MakeCookie('cFileImg',$cFileImg,tStr);
      }
      unset($upload);
      return $DelayedMessage; 
   }
} 

// *************************************************** KwinGalleryClass.php ***
