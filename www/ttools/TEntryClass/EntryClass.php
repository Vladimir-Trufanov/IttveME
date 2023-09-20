<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                               *** EntryClass.php ***

// ****************************************************************************
// * ittve.me                           Войти или зарегистрироваться на сайте * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  04.02.2018
// Copyright © 2018 tve                              Посл.изменение: 11.12.2022

class Entrying
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   //protected $game;          // Игра, замещающая страницу (при необходимости) 
   
   public function __construct() //$game=NULL) 
   {
      //$this->game=$game;
   }
   public function __destruct() 
   {
   }
   public function Head() 
   {
      //if ($this->game<>NULL) $this->game->Head();
   }
   public function Body() 
   {
      // Запускаем замещение страницы
      //if ($this->game<>NULL) $this->game->Play();
      // Выводим страницу
      //else
      //{
         echo 'Выполняем вход или регистрируемся на сайте!<br>';
         echo '
         ';
         echo '
         ';
      //}
   }
}
// ********************************************************* EntryClass.php ***
