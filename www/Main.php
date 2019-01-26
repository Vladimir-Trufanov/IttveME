<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Main.php ***

// ****************************************************************************
// * ittve.me                          Обо мне, путешествиях и ... Черногории *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 26.01.2019

?>
<!DOCTYPE html>
<html lang="ru">
<head>
   <title>Обо мне, путешествиях и ... Черногории</title>
   <meta charset="utf-8">
   <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
   <meta name="description" content="Труфанов Владимир Евгеньевич, его жизнь и жизнь его близких">
   <meta name="keywords" content="Труфанов Владимир Евгеньевич, жизнь и увлечения">
   <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Anonymous+Pro:400,400i,700,700i&amp;
      subset=cyrillic">
   <link rel="stylesheet" type="text/css" href="Styles/Reset.css">
   <link rel="stylesheet" type="text/css" href="Styles/Styles.css">
   <link rel="stylesheet" type="text/css" href="Styles/ImgRight.css">

   <link rel="stylesheet" type="text/css" href="TJsPrown/TJsPrown.css">
   <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
   </script>
   <script src="/TJsPrown/TJsPrown.js"></script>
   <script> MakeCatchyQuotes() </script>
</head>

<body>
   <!-- 
   -->
   <div class="Gallery">
      <div class="Card">
         <img class="imgCard" 
         src="/Pages/tveArc1/tve1-1-pod^yom-nastroeniya.jpg" 
         alt="Подъём настроения">
         <p class="pCard"> 
            <?php
            require_once "Pages/tveArc1/tve1-1-comm.txt";
            ?> 
         </p>
      </div>
      <div class="Card">
         <img class="imgCard" 
         src="/Images/С заботой и к мамам.jpg" 
         alt="С заботой и к мамам">
      </div>
      <div class="Card">
         <img class="imgCard" 
         src="/Images/nasampo.jpg" 
         alt="На горе Сампо">
      </div>
      <div class="Card">
         <img class="imgCard" 
         src="/Images/dozhd'-prazdniku-ne-pomeha.jpg" 
         alt="Дождь празднику не помеха">
      </div>
      <div class="Card">
         <img class="imgCard" 
         src="/Images/uyolochki.png" 
         alt="У ёлочки">
      </div>
      <div class="Card">
         <img class="imgCard" 
         src="/Images/hochesh'-kvasku.jpg" 
         alt="Хочешь кваску">
      </div>
   </div>

   <section class="News">
      <?php
      require_once "Pages/tveArt/tve2-114-po-trope-k-karnizu-reki-bzerp'.html";
      ?>
   </section>

   <section class="Life">
      <?php
      require_once "Pages/tveArc1/tve1-1-оsobennosti-ustrojstva-vintikov-v-moej-golove.html";
      ?>
   </section>
  
   <div class="Footer">
      <div class="LeftFooter">
      </div>
      <div class="LifeMenu">
         <button class="btnLifeMenu">
            <img class="imgLifeMenu" src="/Images/Buttons/tveMenuD.png" alt="tveMenuD">
         </button>
      </div>
      <div class="RightFooter">
         <img class="imgLead" src="/Images/Buttons/tveTiny2.png" alt="tveTiny">
         <!-- 
         <button class="btnLead" id="btnTiny">
         </button>
         -->

      
      </div>
   </div>
  

</body>
</html>

<?php
// *************************************************************** Main.php ***
