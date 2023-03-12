<?php namespace game; 

// PHP7/HTML5, EDGE/CHROME                  *** gameWhipperSnapperClass.php ***

// ****************************************************************************
// * game                                                      WhipperSnapper * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  26.02.2023
// Copyright © 2023 tve                              Посл.изменение: 07.03.2023

class WhipperSnapper
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $Place;       // приложение, в которое встроена игра

   public function __construct($Place='Other') 
   {
      // Инициализируем свойства класса
      $this->Place=$Place;
   }
   public function __destruct() 
   {
   }
   // Подключить стили игры
   public function Head() 
   {
      if ($this->Place=='IttveME') $this->echoHead();
   }
   public function Body() 
   {
      $this->echoPlay();
   }
   //
   private function echoHead()
   {
      ?>
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="ttools/TTinyGallery/WhipperSnapper/css/style.css">
         <script  src="ttools/TTinyGallery/WhipperSnapper/js/index.js"></script>
      <?php
   }
   //
   private function echoPlay()
   {
      $SignaUrl=$_SERVER['SCRIPT_NAME'];
      ?> <script>
         SignaUrl="<?php echo $SignaUrl;?>";
         СursorSnake();
      </script> <?php
   }
}

// ******************************************** gameWhipperSnapperClass.php ***
