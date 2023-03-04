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
         echo '<link rel="stylesheet" type="text/css" href="ttools/TDelCueClass/g2048/style/main.css">';
         //echo '<link rel="apple-touch-icon" href="ttools/TDelCueClass/g2048/meta/apple-touch-icon.png">';
         /*
         <link rel="apple-touch-icon" href="meta/apple-touch-icon.png">
         <link rel="apple-touch-startup-image" 
            href="meta/apple-touch-startup-image-640x1096.png"
            media="(device-width: 320px) and (device-height: 568px) 
            and (-webkit-device-pixel-ratio: 2)"> <!-- iPhone 5+ -->
         <link rel="apple-touch-startup-image" 
            href="meta/apple-touch-startup-image-640x920.png"  
            media="(device-width: 320px) and (device-height: 480px) 
            and (-webkit-device-pixel-ratio: 2)"> <!-- iPhone, retina -->
         <meta name="apple-mobile-web-app-capable" content="yes">
         <meta name="apple-mobile-web-app-status-bar-style" content="black">
         */
         echo '
            <meta name="HandheldFriendly" content="True">
            <meta name="MobileOptimized" content="320">
            <meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0, maximum-scale=1, user-scalable=no, minimal-ui">
         ';
         echo '
         ';
      }
   }
   public function Play() 
   {
      echo '
         <div id="gbody">
      ';
      echo '
        <div class="container">
      ';
      echo '
        <div class="heading">
           <h1 class="title">2048</h1>
           <div class="scores-container">
              <div class="score-container">0</div>
              <div class="best-container">0</div>
           </div>
        </div>
      ';
      echo '
         <div class="above-game">
            <p class="game-intro">Join the numbers and get to the <strong>2048 tile!</strong></p>
            <a class="restart-button">New Game</a>
         </div>
      ';
      echo '
         <div class="game-container">
            <div class="game-message">
               <p></p>
               <div class="lower">
	              <a class="keep-playing-button">Keep going</a>
                  <a class="retry-button">Try again</a>
               </div>
            </div>

            <div class="grid-container">
               <div class="grid-row">
                  <div class="grid-cell"></div>
                  <div class="grid-cell"></div>
                  <div class="grid-cell"></div>
                  <div class="grid-cell"></div>
               </div>
               <div class="grid-row">
                  <div class="grid-cell"></div>
                  <div class="grid-cell"></div>
                  <div class="grid-cell"></div>
                  <div class="grid-cell"></div>
               </div>
               <div class="grid-row">
                  <div class="grid-cell"></div>
                  <div class="grid-cell"></div>
                  <div class="grid-cell"></div>
                  <div class="grid-cell"></div>
               </div>
               <div class="grid-row">
                  <div class="grid-cell"></div>
                  <div class="grid-cell"></div>
                  <div class="grid-cell"></div>
                  <div class="grid-cell"></div>
               </div>
            </div>

            <div class="tile-container">

            </div>
         </div>
      ';
      echo '
         <p class="game-explanation">
            <strong class="important">How to play:</strong> 
            Use your <strong>arrow keys</strong> to move the tiles. 
            When two tiles with the same number touch, they <strong>merge into one!</strong>
         </p>
         <hr>
         <p>
            <strong class="important">Note:</strong> 
            This site is the official version of 2048. You can play it on your
            phone via <a href="http://git.io/2048">http://git.io/2048.</a> 
            All other apps or sites are derivatives or fakes, and should be used with caution.
         </p>
         <hr>
         <p>
            Created by <a href="http://gabrielecirulli.com" target="_blank">Gabriele Cirulli.</a> 
            Based on <a href="https://itunes.apple.com/us/app/1024!/id823499224" target="_blank">1024 by Veewo Studio</a> 
            and conceptually similar to <a href="http://asherv.com/threes/" target="_blank">Threes by Asher Vollmer.</a>
         </p>
      ';
      echo '
         </div>
      ';
      echo '
         <script src="ttools/TDelCueClass/g2048/js/bind_polyfill.js"></script>
         <script src="ttools/TDelCueClass/g2048/js/classlist_polyfill.js"></script>
         <script src="ttools/TDelCueClass/g2048/js/animframe_polyfill.js"></script>
         <script src="ttools/TDelCueClass/g2048/js/keyboard_input_manager.js"></script>
         <script src="ttools/TDelCueClass/g2048/js/html_actuator.js"></script>
         <script src="ttools/TDelCueClass/g2048/js/grid.js"></script>
         <script src="ttools/TDelCueClass/g2048/js/tile.js"></script>
         <script src="ttools/TDelCueClass/g2048/js/local_storage_manager.js"></script>
         <script src="ttools/TDelCueClass/g2048/js/game_manager.js"></script>
         <script src="ttools/TDelCueClass/g2048/js/application.js"></script>
      ';
      echo '
         </div>
      ';
   }
}
// ****************************************************** game2048Class.php ***
