<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                              *** DelCueClass.php ***

// ****************************************************************************
// * ittve.me                                       Удалить раздел материалов * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  26.02.2023
// Copyright © 2023 tve                              Посл.изменение: 06.04.2023

class DelCue
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $game;          // Игра, замещающая страницу (при необходимости) 
   
   public function __construct($game=NULL) 
   {
      $this->game=$game;
   }
   public function __destruct() 
   {
   }
   public function Head() 
   {
      if ($this->game<>NULL) $this->game->Head();
   }
   public function Body() 
   {
      // Запускаем замещение страницы
      if ($this->game<>NULL) $this->game->Play();
      // Выводим страницу
      else
      {
         echo 'Удаляем раздел материалов, если все статьи раздела уже удалены!<br>';
      }
   }
}
// ******************************************************** DelCueClass.php ***
