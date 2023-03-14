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
      ?> <!--
      Daniel - https://codepen.io/scorch/pen/YZLrwN,
      Mario  - https://codereviewvideos.com/course/from-jquery-to-typescript/video/super-mario
      --> <?php
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
         <link rel="stylesheet" href="ttools/TTinyGallery/WhipperSnapper/WhipperSnapper.css">
         <script  src="ttools/TTinyGallery/WhipperSnapper/WhipperSnapper.js"></script>
      <?php
   }
   //
   private function echoPlay()
   {
      $SignaUrl=$_SERVER['SCRIPT_NAME'];
      ?> 
      <script>
      // Готовим переменную для перезагрузки страницы 
      // при изменении размеров окна браузера
      SignaUrl="<?php echo $SignaUrl;?>";
      // Готовим настройки для градиента в галерее      
      var colors = new Array(
         [62,35,255],
         [60,255,60],
         [255,35,98],
         [45,175,230],
         [255,0,255],
         [255,128,0]);
      var step = 0;
      //color table indices for: 
      // current color left
      // next color left
      // current color right
      // next color right
      var colorIndices = [0,1,2,3];
      //transition speed
      var gradientSpeed = 0.002;
      // Обеспечиваем перезапуск градиента с интервалом 10 мкс
      setInterval(updateGradient,10);
      // Запускаем игру со змейкой   
      СursorSnake();
      </script> <?php
   }
}

// ******************************************** gameWhipperSnapperClass.php ***
