<?php
// PHP7/HTML5, EDGE/CHROME                                   *** UpSite.php ***

// ****************************************************************************
// * ittve.me  Выполнить общую разметку страницы, разобрать параметры запроса,*
// *                            настроить и подключить страницу для просмотра *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 03.12.2022

/*
// Подключаем TJsPrown и TJsTools
echo '
   <link rel="stylesheet" type="text/css" 
   href="TJsPrown/TJsPrown.css">
   <script 
      src="/TJsPrown/TJsPrown.js">
   </script>
';
*/
// Начинаем html-страницу
echo '</head>'; 
echo '<body>'; 
// Проверяем не требуется ли просто вывести изображение и выводим его
if ($ImageFile<>NULL)
{
   require_once "ViewImage.php";
}
// Выводим другие страницы сайта
else
{
   // Обеспечиваем вывод только одной галереи изображений: как правило галереи
   // активной статьи, а в некоторых случаях галереи редактируемой статьи (при 
   // переходе в режим редактирования по кнопке 'Редактировать или создать 
   // материал', при ...):
   // а) выводим галерею для редактирования
   if (prown\isComRequest(mmlSozdatRedaktirovat))
   {
      echo '<div id="EditGallery">';
      require_once "ittveEdit/GalleryEdit.php";
      echo '</div>';
   }
   // б) выводим галерею изображений ("моя жизнь") активной статьи
   else
   {
      echo '<div id="Gallery">';
      require_once "ittveLife/GalleryLife.php";
      echo '</div>';
   }
   // "News" выводим только в двухколоночном режиме при выводе статьи и новостей
   if (isChistoNewsDouble($c_PresMode))
   {
      echo '<div id="News">';
      //require_once "ittveNews/".$p_ittveNews;
      require_once "ittveNews/IttveNews.html";
      echo '</div>';
   }
   // Выводим текстовый контент страницы cайта
   if (prown\isComRequest(mmlZhiznIputeshestviya))
      echo '<div id="Life" class="MenuArticles">';
   else echo '<div id="Life">';
      // Выводим меню, когда он выбран
      // ?Com=zhizn-i-puteshestviya
      if (prown\isComRequest(mmlZhiznIputeshestviya))
      {
         require_once "MenuArticles.php";
      }
      // Выбираем страницу для отправки сообщения автору
      // ?Com=otpravit-avtoru-soobshchenie
      else if (prown\isComRequest(mmlOtpravitAvtoruSoobshchenie))
      {
         echo 'Отправить сообщение автору'.'<br>';
         //$page='/DetmanPage/www/index1.php';
         //Header("Location: http://".$_SERVER['HTTP_HOST'].$page);
      }
      // Выбираем страницу для изменения настроек
      // ?Com=izmenit-nastrojki-sajta-v-brauzere
      else if (prown\isComRequest(mmlIzmenitNastrojkiSajta))
      {
         require_once $SiteRoot.'/TMenuLeader/TuningClass.php';
      }
      // Выбираем страницу для входа по логину или для регистрации
      // ?Com=vojti-ili-zaregistrirovatsya
      else if (prown\isComRequest(mmlVojtiZaregistrirovatsya))
      {
         require_once $SiteRoot.'/TMenuLeader/EntryClass.php';
      }
      // Выбираем страницу для редактирования или создания материала
      // ?Com=sozdat-material-ili-redaktirovat
      else if (prown\isComRequest(mmlSozdatRedaktirovat))
      {
         // Редактировать или создать материал'.'<br>';
         require_once $SiteRoot.'/TMenuLeader/EditClass.php';
         $Edit=new edit\Editing($urlHome);
         /*
         echo
         '<div id="okno">
         Всплывающее окошко!<br>
         <a href="#" class="close">Закрыть окно</a>
         </div>
         ';
         */
      }
      // Запускаем страницу с активным материалом
      else
      {
         require_once "ittveLife/".$p_ittveLife;
         ViewDebug($SiteDevice,$SiteRoot,$SiteAbove,$SiteHost);
         echo  prown\getTranslit('Вернуться на главную страницу').'<br>';
      }
   echo '</div>';
   
   // Выводим подвал сайта
   echo '<div id="Footer">';
   
      // Кнопка главного меню 
      echo '<div id="LifeMenu">';
      echo '
      <ul id="btnLifeMenu">
      <li>
         <a href= "'.$cPref.mmlZhiznIputeshestviya.'">
         <img id="imgLifeMenu" src="/Images/Buttons/tveMenuD.png" alt="tveMenuD">
         </a> 
      </li> 
      </ul>
      ';
      echo '</div>';

      // Левая часть подвала для сообщений, разворачиваемых в три строки
      echo '<div id="LeftFooter">';
         // а) показываем идентификацию статей
         if (prown\isComRequest(mmlSozdatRedaktirovat))
         {
            PlaceIdArticles();
         }
         // б) выводим обычное сообщение
         else
         {
            require_once "MessLeftFooter.php";
         }
      echo '</div>';

      // Правая часть подвала, меню управления
      echo '<div id="RightFooter">';
      require_once "MenuLeader.php";
      echo '</div>';
   echo '</div>';

   // Выводим нижнюю информационную строку
   echo '<div id="Info">';
      echo '
      <div id="InfoLeft">
         Copyright (c) 2019 v2.0  Труфанов Владимир   tve58@inbox.ru<br>
      </div>
      ';

      echo '<div id="InfoRight">';
      echo $SiteDevice.
         " ".$c_PersName." ".$_SESSION['Counter'].".".$c_PersEntry."[".$c_BrowEntry."]"; 
      echo '</div>';
   echo '</div>';
}
// Выводим завершающие теги страницы
echo '</body>'; 
echo '</html>';

// <!-- --> **************************************************** UpSite.php ***
