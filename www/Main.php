<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Main.php ***

// ****************************************************************************
// * ittve.me                          Обо мне, путешествиях и ... Черногории *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 15.01.2019

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
      href="https://fonts.googleapis.com/css?family=Anonymous+Pro:400,400i,700,700i&amp;subset=cyrillic">
   <link rel="stylesheet" type="text/css" href="Styles/Reset.css">
   <link rel="stylesheet" type="text/css" href="Styles/Styles.css">
   <link rel="stylesheet" type="text/css" href="Styles/ImgRight.css">
</head>

<body>
   <!-- 
   -->
   <div class="Gallery">
      <div class="Card">
         <img class="ii" 
         src="/Pages/tveArc1/tve1-1-pod^yom-nastroeniya.jpg" 
         alt="Подъём настроения">
         <p class="pppi"> 
            <?php
            require_once "Pages/tveArc1/tve1-1-comm.txt";
            ?> 
         </p>
      </div>
      <div class="Card">2</div>
      <div class="Card">3</div>
      <img class="ii" src="/Java.svg">
      <img class="ii" src="/Images/na-sampo.jpg">
      <img class="ii" src="/Images/Buttons/tveMenuC.svg" alt="tveMenuC">
      <div class="Card">14</div>
      <div class="Card">21 First</div>
      <div class="Card">35</div>
   </div>

   <section class="News">
         <button class="btni">
         <img src="/Images/Buttons/tveMenuC.svg" alt="Зонтик">
      </button>

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
   </div>
  
   <div class="LifeMenu">
   </div>

</body>
</html>

<?php
// *************************************************************** Main.php ***
