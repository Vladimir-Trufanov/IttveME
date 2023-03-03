<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                             *** ModyCueClass.php ***

// ****************************************************************************
// * ittve.me                           Изменить заголовок раздела или иконку * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  12.12.2022
// Copyright © 2022 tve                              Посл.изменение: 12.12.2022

class ModyCue
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
         echo 'Изменяем заголовок раздела или меняем иконку<br>';
      }
   }
}
// ******************************************************* ModyCueClass.php ***
