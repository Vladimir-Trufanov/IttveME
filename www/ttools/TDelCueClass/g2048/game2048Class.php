<?php namespace game; 

// PHP7/HTML5, EDGE/CHROME                            *** game2048Class.php ***

// ****************************************************************************
// * game                                                                2048 * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  26.02.2023
// Copyright © 2023 tve                              Посл.изменение: 03.03.2023

class g2048
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
         //echo '<link rel="stylesheet" type="text/css" href="ttools/TNewCueClass/DuckFly.css">';
      }
   }
   public function Play() 
   {
      echo 'Привет!';
   }
}
// ****************************************************** game2048Class.php ***
