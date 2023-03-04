<?php namespace game; 

// PHP7/HTML5, EDGE/CHROME                            *** gameHextrisClass.php ***

// ****************************************************************************
// * game                                                             Hextris * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  26.02.2023
// Copyright © 2023 tve                              Посл.изменение: 04.03.2023

class Hextris
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
         echo '
            <link href="http://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet" type="text/css">
		    <link rel="stylesheet" href="ttools/TSaymeClass/Hextris/style/fa/css/font-awesome.min.css">
		    <link rel="stylesheet" type="text/css" href="ttools/TSaymeClass/Hextris/style/style.css">
         ';
         echo '
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/vendor/hammer.min.js"></script>
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/vendor/js.cookie.js"></script>
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/vendor/jsonfn.min.js"></script>
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/vendor/keypress.min.js"></script>
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/js/save-state.js"></script>
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/js/view.js"></script>
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/js/wavegen.js"></script>
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/js/math.js"></script>
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/js/Block.js"></script>
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/js/Hex.js"></script>
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/js/Text.js"></script>
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/js/comboTimer.js"></script>
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/js/checking.js"></script>
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/js/update.js"></script>
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/js/render.js"></script>
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/js/input.js"></script>
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/js/main.js"></script>
		    <script type="text/javascript" src="ttools/TSaymeClass/Hextris/js/initialization.js"></script>
		    <script src="ttools/TSaymeClass/Hextris/vendor/sweet-alert.min.js"></script>
         ';
         //echo '
         //   <script type="text/javascript" src="ttools/TSaymeClass/Hextris/vendor/jquery.js"></script>
         //';
         echo '
         ';
      }
   }
   public function Play() 
   {
      echo '
         <div>
      ';
      echo '
         Hextris!
      ';
      echo '
         </div>
      ';
   }
}
// *************************************************** gameHextrisClass.php ***
