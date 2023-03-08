<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                        *** WorkTinyMainClass.php ***

// ****************************************************************************
// * ittve.me                Обеспечить работу с материалом в рабочей области * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  26.02.2023
// Copyright © 2023 tve                              Посл.изменение: 08.03.2023

class WorkTinyMain
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
         echo 'Добавляем новый раздел материалов<br>';
      }
   }
}
// ************************************************** WorkTinyMainClass.php ***
