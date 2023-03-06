<?php namespace game; 

// PHP7/HTML5, EDGE/CHROME                            *** gameHextrisClass.php ***

// ****************************************************************************
// * game                                                             Hextris * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  26.02.2023
// Copyright © 2023 tve                              Посл.изменение: 06.03.2023

class Hextris
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $Place;       // приложение, в которое встроена игра
   protected $c_PresMode;  // режим представления материалов 

   public function __construct($c_PresMode,$Place='Other') 
   {
      // Инициализируем свойства класса
      $this->Place=$Place;
      $this->c_PresMode=$c_PresMode;
   }
   public function __destruct() 
   {
   }
   // Подключить стили игры
   public function Head() 
   {
      if ($this->Place=='IttveME') $this->echoHead();
   }
   public function Play() 
   {
      echoPlay();
   }
   //
   private function echoHead()
   {
      //echo '
      //   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, minimal-ui"/>
      //';
      echo '
         <link rel="stylesheet" type="text/css" href="ttools/TSaymeClass/Hextris/style/style.css">
      ';
      //echo '
      //   <script type="text/javascript" src="ttools/TSaymeClass/Hextris/vendor/jquery-1.11.1.min.js"></script> 
      //';
      echo '
         <script type="text/javascript" src="ttools/TSaymeClass/Hextris/vendor/hammer.min.js"></script>
         <script type="text/javascript" src="ttools/TSaymeClass/Hextris/vendor/js.cookie.js"></script>
         <script type="text/javascript" src="ttools/TSaymeClass/Hextris/vendor/jsonfn.min.js"></script>
         <script type="text/javascript" src="ttools/TSaymeClass/Hextris/vendor/keypress.min.js"></script>
         <script type="text/javascript" src="ttools/TSaymeClass/Hextris/vendor/sweet-alert.min.js"></script>
      ';
      echo '
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
      ';
      /*
      echo '
      ';
      // Если режим представления материалов = 'с левосторонней галереей')
      if (($this->c_PresMode==rpmOneLeft)||($this->c_PresMode==rpmDoubleLeft)) rhOneLeft();
      // В остальных случаях = 'с правосторонней галереей')
      else rhOneRight();
      */
   }
}
/*
function rhOneLeft()
{
   echo "<style>";
   echo "
      #openSideBar
      {
         left:36%;
         top:8%;
      }
   ";
   echo "</style>";
}
function rhOneRight()
{
}
*/
//
function echoPlay()
{
   echo '<div id=HextrisBody>';
   echo '
      <canvas id="canvas"></canvas> 
      <div id="startBtn" ></div>
      <div id="helpScreen" class="unselectable">
         <div id="inst_main_body"></div>
      </div>
      <img id="openSideBar" class="helpText" src="./ttools/TSaymeClass/Hextris/images/btn_help.svg" onclick="openSideBarClick()">
      <img id="pauseBtn" src="./ttools/TSaymeClass/Hextris/images/btn_pause.svg">
      <img id="restartBtn" src="./ttools/TSaymeClass/Hextris/images/btn_restart.svg">
      <!--
      -->
   ';
   echo '
      <!--
      <div id="HIGHSCORE">РЕКОРД</div>
      -->
      <div id="highScoreInGameText">
         <div id="highScoreInGameTextHeader">РЕКОРД</div><div id="currentHighScore">10292</div>
      </div>
      <div id="gameoverscreen">
         <div id="container">
            <div id="gameOverBox" class="GOTitle">ИГРА ЗАКОНЧЕНА</div>
            <div id="cScore">1843</div>
	        <div id="highScoresTitle" class="GOTitle">ЛУЧШИЕ РЕЗУЛЬТАТЫ</div>
	        <div class="score"><span class="scoreNum">1.</span> <div id="1place" style="display:inline;">0</div></div>
	        <div class="score"><span class="scoreNum">2.</span> <div id="2place" style="display:inline;">0</div></div>
	        <div class="score"><span class="scoreNum">3.</span> <div id="3place" style="display:inline;">0</div></div>
         </div>
	     <div id="bottomContainer">
	        <img id="restart" src="./ttools/TSaymeClass/Hextris/images/btn_restart.svg" height="57px">
		    <div id="buttonCont"> </div>
         </div>
      </div>
      <!--
      -->
   ';
   echo '</div>';
}

// *************************************************** gameHextrisClass.php ***
