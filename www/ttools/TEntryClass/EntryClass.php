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
   
   public function __construct() //$game=NULL) 
   {
   }
   public function __destruct() 
   {
   }
   public function Head() 
   {
      ?>
      <link rel="stylesheet" href="ttools/TEntryClass/InteractiveSpooky.css">
      <?php
           
      echo'  
         <style>
         @font-face 
         {
            font-family: Pacifico; 
            src: url(ttools/TTuningClass/Pacifico-Regular.ttf); 
         }
         </style>
      ';
   }
   public function Body() 
   {
      
      require_once "InteractiveSpooky.php"; 

      
      /*
         echo 'Выполняем вход или регистрируемся на сайте!<br>';
         echo '
         ';
         echo '
         ';
      */
      
      //}
   }
}
// ********************************************************* EntryClass.php ***
