<?php namespace game; 

// PHP7/HTML5, EDGE/CHROME                         *** gameDuckFlyClass.php ***

// ****************************************************************************
// * ittve.me                                Добавить новый раздел материалов * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  26.02.2023
// Copyright © 2023 tve                              Посл.изменение: 26.02.2023

class DuckFly
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $Place;  // приложение, в которое встроена игра

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
      if ($this->Place=='IttveME')
      {
         echo '<link rel="stylesheet" type="text/css" href="ttools/TNewCueClass/DuckFly.css">';
      }
   }
   public function Play() 
   {
      // Строим разметку для игры 
      echo '
      <div id="duckbody">
         <input type="checkbox" id="duck1">
         <label for="duck1" class="duck"></label>
         <input type="checkbox" id="duck2">
         <label for="duck2" class="duck"></label>
         <input type="checkbox" id="duck3">
         <label for="duck3" class="duck"></label>
         <input type="checkbox" id="duck4">
         <label for="duck4" class="duck"></label>
         <input type="checkbox" id="duck5">
         <label for="duck5" class="duck"></label>

         <div class="score"></div>
      </div>
      ';
   }
}
// *************************************************** gameDuckFlyClass.php ***
