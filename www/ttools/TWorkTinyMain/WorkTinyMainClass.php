<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                        *** WorkTinyMainClass.php ***

// ****************************************************************************
// * ittve.me                Обеспечить работу с материалом в рабочей области * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  26.02.2023
// Copyright © 2023 tve                              Посл.изменение: 14.03.2023

class WorkTinyMain
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   private $fileStyle;     // файл стилей элементов класса 
   private $game;          // игра, замещающая страницу (при необходимости) 
   
   public function __construct($fileStyle,$game=NULL) 
   {
      $this->game=$game;
      $this->fileStyle=$fileStyle;
   }
   public function __destruct() 
   {
   }
   public function Head() 
   {
      if ($this->game<>NULL) $this->game->Head();
      else $this->IniTiny(); 
   }
   public function Body() 
   {
      // Запускаем замещение страницы
      if ($this->game<>NULL) $this->game->Play();
      // Выводим страницу
      else
      {
         // Формируем контент страницы   
         if ($this->contents<>NULL) $contenti=$this->contents;
         else $contenti='';

         // Если режим редактирования, то готовим рабочую область Tiny  
         if (GalleryMode==mwgEditing) 
         {
            $SaveAction=$_SERVER["SCRIPT_NAME"];
            echo '
               <form id="frmTinyText" method="post" action="'.$SaveAction.'">
               <textarea id="mytextarea" name="mytextarea">
            '; 
            echo $contenti;
            echo '
               </textarea>
               </form>
            ';
         }
         else echo $contenti;
      } 
      }
   }
   // *************************************************************************
   // *     Выполнить настройки для Tiny при работе в режиме редактирования   * 
   // *************************************************************************
   private function IniTiny() 
   {
      // Если режим редактирования, то готовим рабочую область Tiny  
      if (GalleryMode==mwgEditing) 
      {
         echo '
            <script src="/TinyMCE5-8-1/tinymce.min.js"></script>
            <script> tinymce.init
            ({
               selector: "#mytextarea",'.
               //theme: "modern",
               //setup: function(editor) 
               //{
               //   editor.on("init", function(e) 
               //   {
               //      console.log("The Editor has initialized.");
               //   });
               //},'.
               //height: 180,'.
               //width:  780,'.
               'content_css: "'.$fileStyle.'",'.
               'plugins:
               [ 
                  "advlist autolink link image imagetools lists charmap print preview hr anchor",
                  "pagebreak spellchecker searchreplace wordcount visualblocks",
                  "visualchars code fullscreen insertdatetime media nonbreaking",'.
                  // "contextmenu",  // отключено для TinyMCE5-8-1
                  // "textcolor",    // отключено для TinyMCE5-8-1'.
                  '"save table directionality emoticons template paste"
               ],
       
               language: "ru",
               toolbar:
               [
                  "| link image | forecolor backcolor emoticons"
               ],'.
               //
               // toolbar:
               // [
               //    "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons"
               // ],.
               'image_list: [
                  {title: "My image 1", value: "ittveEdit/proba.jpg"},
                  {title: "My image 2", value: "http://www.moxiecode.com/my2.gif"}
               ],
               a_plugin_option: true,
               a_configuration_option: 400
            });
            </script>
         ';
      }
      // В обычном режиме просмотра рабочую область Tiny не создаем  
      else {}
   }
}
// ************************************************** WorkTinyMainClass.php ***
