<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                             *** ModyCueClass.php ***

// ****************************************************************************
// * ittve.me                           Изменить заголовок раздела или иконку * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  12.12.2022
// Copyright © 2022 tve                              Посл.изменение: 06.04.2023

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
         //echo 'Изменяем заголовок раздела или меняем иконку<br>';
         require_once pathPhpTools."/TUnicodeUser/UnicodeUserClass.php";
         $Unicoder=new UnicodeUser('Emojitveme'); 
         //$Unicoder->ViewCharsetAsColomn(0);
         //$Unicoder->ViewIntervalAsColomn('2300','2650');
         //$Unicoder->ViewFontAwesome470AsColomn('f0b3','f200');
         $Unicoder->ViewCharsetAsTable(0,8);
         $Unicoder->ViewCharsetAsTable(5,8);
         $Unicoder->ViewCharsetAsTable(4,8);
         $Unicoder->ViewCharsetAsTable(3,8);
         $Unicoder->ViewFontAwesome470AsTable('f0b3','f200',8);
         $Unicoder->ViewCharsetAsTable(2,8);
         $Unicoder->ViewCharsetAsTable(1,8);
      }
   }
}
// ******************************************************* ModyCueClass.php ***
