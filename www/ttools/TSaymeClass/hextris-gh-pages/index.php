<?php
// PHP7/HTML5, EDGE/CHROME                                    *** index.php ***

// ****************************************************************************
// * ittve.me                                   Труфанов Владимир Евгеньевич, *
// *                                 его жизнь и увлечения, жизнь его близких *
// ****************************************************************************

// v3.0, 19.02.2023                                   Автор:      Труфанов В.Е.
// Copyright © 2019 tve                               Дата создания: 13.01.2019

echo '

   <!DOCTYPE html>
   <html lang="ru">
   <head>
   <meta http-equiv="content-type" content="text/html; charset=utf-8">
		<title>Hextris</title>
		<meta name="description" content="An addictive puzzle game inspired by Tetris.">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, minimal-ui"/>
      
		<link rel="icon" type="image/png" href="favicon.ico">
		<link rel="stylesheet" href="style/fa/css/font-awesome.min.css"> 
		<link rel="stylesheet" type="text/css" href="style/style.css">
        
		<script type="text/javascript" src="vendor/hammer.min.js"></script>
		<script type="text/javascript" src="vendor/js.cookie.js"></script>
		<script type="text/javascript" src="vendor/jsonfn.min.js"></script>
		<script type="text/javascript" src="vendor/keypress.min.js"></script>
		
        <!-- <script type="text/javascript" src="vendor/jquery1-9-1.js"></script> -->
        <script type="text/javascript" src="vendor/jquery-1.11.1.min.js"></script> 
		
        <script type="text/javascript" src="js/save-state.js"></script>
		<script type="text/javascript" src="js/view.js"></script>
		<script type="text/javascript" src="js/wavegen.js"></script>
		<script type="text/javascript" src="js/math.js"></script>
		<script type="text/javascript" src="js/Block.js"></script>
		<script type="text/javascript" src="js/Hex.js"></script>
		<script type="text/javascript" src="js/Text.js"></script>
		<script type="text/javascript" src="js/comboTimer.js"></script>
		<script type="text/javascript" src="js/checking.js"></script>
		<script type="text/javascript" src="js/update.js"></script>
		<script type="text/javascript" src="js/render.js"></script>
		<script type="text/javascript" src="js/input.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript" src="js/initialization.js"></script>
		<script src="vendor/sweet-alert.min.js"></script>

	</head>
	<body>
		<canvas id="canvas"></canvas>
		<div id="overlay" class="faded overlay"></div>
		<div id="startBtn" ></div>
		<div id="helpScreen" class="unselectable">
			<div id="inst_main_body"></div>
		</div>
		<img id="openSideBar" class="helpText" src="./images/btn_help.svg"/>
		<div class="faded overlay"></div>
		<img id="pauseBtn" src="./images/btn_pause.svg"/>
		<img id="restartBtn" src="./images/btn_restart.svg"/>
		<div id="HIGHSCORE">HIGH SCORE - РЕКОРД</div>
		
        <div id="highScoreInGameText">
			<div id="highScoreInGameTextHeader">HIGH SCORE - РЕКОРД</div><div id="currentHighScore">10292</div>
		</div>
		<div id="gameoverscreen">
			<div id="container">
				<div id="gameOverBox" class="GOTitle">GAME OVER</div>
				<div id="cScore">1843</div>
				<div id="highScoresTitle" class="GOTitle">HIGH SCORES</div>
				<div class="score"><span class="scoreNum">1.</span> <div id="1place" style="display:inline;">0</div></div>
				<div class="score"><span class="scoreNum">2.</span> <div id="2place" style="display:inline;">0</div></div>
				<div class="score"><span class="scoreNum">3.</span> <div id="3place" style="display:inline;">0</div></div>
			</div>
			<div id="bottomContainer">
				<img id="restart" src="./images/btn_restart.svg" height="57px">
				
                <div id="buttonCont">
				</div>
			</div>
		</div>
	</body>
</html>

';
?> <!-- --> <?php // ******************************************** index.php ***
