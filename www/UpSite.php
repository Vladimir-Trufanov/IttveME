<?php
// PHP7/HTML5, EDGE/CHROME                                   *** UpSite.php ***

// ****************************************************************************
// * ittve.me  Выполнить общую разметку страницы, разобрать параметры запроса,*
// *                            настроить и подключить страницу для просмотра *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 29.10.2022

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
   if (prown\isComRequest('Мaterial','Edit'))
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
   // Выводим текстовый контент страницы айта
   echo '<div id="Content">';
      // Выводим меню, когда он выбран
      echo '<div id="MenuArticles">';
         require_once "MenuArticles.php";
      echo '</div>';

      // Выбираем страницу для отправки сообщения автору
      if (prown\isComRequest('Inbox','Com'))
      {
         echo '<div id="Life">';
         echo 'Отправить сообщение автору'.'<br>';
         echo '</div>';
         //$page='/DetmanPage/www/index1.php';
         //Header("Location: http://".$_SERVER['HTTP_HOST'].$page);
      }
      // Выбираем страницу для изменения настроек
      else if (prown\isComRequest('Tuning','Com'))
      {
         echo '<div id="Life">';
         echo 'Изменить настройки сайта в браузере'.'<br>';
         // Инициируем класс, изменяем настройки
         $Tune=new tune\Tuning($aPresMode,$aModeImg,$urlHome);
         echo '</div>';
      }
      // Выбираем страницу для входа по логину или для регистрации
      else if (prown\isComRequest('Signup','Com'))
      {
         echo '<div id="Life">';
         echo 'Войти или зарегистрироваться'.'<br>';
         echo '</div>';
      }
      // Выбираем страницу для редактирования или создания материала
      else if (prown\isComRequest('Мaterial','Edit'))
      {
      
         echo '<div id="Life">';
         // Редактировать или создать материал'.'<br>';
         //require_once "EditText.php";
         // Инициируем класс, редактируем или создаём материал
         $Tune=new edit\Editing($urlHome);
         
         
         
         
         echo '</div>';
      
    echo
   '<div id="okno">
   Всплывающее окошко!<br>
   <a href="#" class="close">Закрыть окно</a>
   </div>
   ';
       
      }
      // Запускаем страницу с активным материалом
      else
      {
         echo '<div id="News">';
            //require_once "ittveNews/".$p_ittveNews;
            require_once "ittveNews/IttveMe.html";
         echo '</div>';
         echo '<div id="Life">';
            require_once "ittveLife/".$p_ittveLife;
            ViewDebug($SiteDevice,$SiteRoot,$SiteAbove,$SiteHost);
            //echo '$urlHome='.$urlHome.'<br>';
            //echo  prown\getTranslit('Тезисы по организации сайта').'<br>';
         echo '</div>';
      }
   echo '</div>';
   
   // Выводим подвал сайта
   echo '<div id="Footer">';
   
      // Кнопка главного меню 
      echo '<div id="LifeMenu">';
      echo '<form id="frmLifeMenu" action="'.$urlHome.'">';
      echo '
      <button id="btnLifeMenu" btn-title="Жизнь и путешествия!" 
         name="Com" value="LifeMenu">
         <img id="imgLifeMenu" src="/Images/Buttons/tveMenuD.png" alt="tveMenuD">
      </button>
      ';
      echo '</form>';  
      echo '</div>';

      // Левая часть подвала для сообщений, разворачиваемых в три строки
      echo '<div id="LeftFooter">';
         // а) показываем идентификацию статей
         if (prown\isComRequest('Мaterial','Edit'))
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
      echo '<form id="frmNavset" action="'.$urlHome.'">';
      require_once "MenuLeader.php";
      echo '</form>';  
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
