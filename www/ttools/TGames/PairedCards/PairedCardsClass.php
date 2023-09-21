<?php namespace game; 

// PHP7/HTML5, EDGE/CHROME                         *** PairedCardsClass.php ***

// ****************************************************************************
// * game                                                         PairedCards * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  26.02.2023
// Copyright © 2023 tve                              Посл.изменение: 03.03.2023

class PairedCards
{
   public function __construct($Arti) 
   {
      // Обновляем при необходимости базу данных
      require_once $_SERVER['DOCUMENT_ROOT'].'/ttools/TGames/UpdateBase_GAME.php';
      \ttools\UpdateBaseGame($Arti);
   }
   public function __destruct() 
   {
      echo '
      <!--
      Thomas Seng Hin Mak:  http://gamedesign.cc/html5games/css3-matching-game/ 
      -->
      ';
   }
   // Подключить стили игры
   public function Head() 
   {
      echo '
         <link rel="stylesheet" type="text/css" href="ttools/TGames/PairedCards/matchgame.css">
      ';
      echo '
         <style>
         #WorkTiny
         {
            width:100%;
            height:92%;
            overflow:auto;
            }
         </style>
      ';
   }
   public function Play() 
   {
      echo '
         <div id="PairedCards">
      ';
      echo '
	     <div id="timer">
      ';
      echo '
		    Пройденное время: <span id="elapsed-time">00:00</span>
	     </div>
	     <section id="game">		
		    <div id="cards">			
			   <div class="card">
				  <div class="face front"></div>
				  <div class="face back"></div>
			   </div> 						
		    </div> 
	     </section>
	     <section id="popup" class="hide">

		    <div id="popup-bg">
		    </div>
		
		    <div id="popup-box">
			   <div class="ribbon hide">				
				  <div class="ribbon-body">
					 <span>Новый рекорд</span>
				  </div>			
				  <div class="triangle"></div>	
			   </div>		
			   <div id="popup-box-content">
				  <h1>Вы выиграли!</h1>				
				  <p>Ваш результат:</p>
				  <p><span class="score">13</span></p>
				
				  <p><small>Последний результат: <span class="last-score">20</span><br>
				  Сохранён: <span class="saved-time">13/4/2011 3:14pm</span></small></p>
			   </div>
	        </div>
         </section>
         <script src="ttools/TGames/PairedCards/matchgame.js"></script>
      ';
      echo '
         </div>
      ';
   }
}
// *************************************************** PairedCardsClass.php ***
