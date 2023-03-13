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
      Copyright (c) 2018 by Daniel (https://codepen.io/scorch/pen/YZLrwN)
      Permission is hereby granted, free of charge, to any person obtaining a 
      copy of this software and associated documentation files (the "Software"),
      to deal in the Software without restriction, including without limitation 
      the rights to use, copy, modify, merge, publish, distribute, sublicense, 
      and/or sell copies of the Software, and to permit persons to whom the 
      Software is furnished to do so, subject to the following conditions:
      
      The above copyright notice and this permission notice shall be included 
      in all copies or substantial portions of the Software.
      
      THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, 
      EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF 
      MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. 
      IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, 
      DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR 
      OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR 
      THE USE OR OTHER DEALINGS IN THE SOFTWARE.
      
      https://codereviewvideos.com/course/from-jquery-to-typescript/video/super-mario
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
