<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                               *** SaymeClass.php ***

// ****************************************************************************
// * ittve.me                                      Отправить автору сообщение * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  04.02.2023
// Copyright © 2023 tve                              Посл.изменение: 04.03.2023

class Noticing
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
         echo 'Отправляем сообщение автору!<br>';
      }
   }
}
// ********************************************************* SaymeClass.php ***
