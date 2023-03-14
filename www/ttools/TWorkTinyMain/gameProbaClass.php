<?php namespace game; 

// PHP7/HTML5, EDGE/CHROME                           *** gameProbaClass.php ***

// ****************************************************************************
// * game                                                    Заполнитель игры * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  26.02.2023
// Copyright © 2023 tve                              Посл.изменение: 14.03.2023

class gameProba
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
         //echo '<link rel="stylesheet" type="text/css" href="ttools/TWorkTinyMainClass/gameProba.css">';
      }
   }
   public function Play() 
   {
      echo 'gameProbaClass';
   }
}
// ***************************************************** gameProbaClass.php ***
