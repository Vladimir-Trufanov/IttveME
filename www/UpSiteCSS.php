<?php
// PHP7/HTML5, EDGE/CHROME                                *** UpSiteCSS.php ***

// ****************************************************************************
// * ittve.me                          Переключить общие и персональные стили *
// *                   при загрузке страниц в настольной или мобильной версии *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  11.11.2020
// Copyright © 2020 tve                              Посл.изменение: 20.10.2022

// Подключаем общие стили
echo '<link rel="stylesheet" type="text/css" href="Styles/iniStyles.css">';
echo '<link rel="stylesheet" type="text/css" href="Styles/Img2Right.css">';
echo '<link rel="stylesheet" type="text/css" href="Styles/Gallery-Image.css">';
echo '<link rel="stylesheet" type="text/css" href="Styles/Menu.css">';
echo '<link rel="stylesheet" type="text/css" href="Styles/Footer-Info.css">';
echo '<link rel="stylesheet" type="text/css" href="Styles/styleSet.css">';

// Переключаем контекстные колонки
if (prown\isComRequest('LifeMenu','Com'))
{
   echo "
   <style>
   #News,#Life 
   {
      display:none; 
   }
   #Menu 
   {
      display:block;
   }
   </style>
   ";
}
else
{
   echo "
   <style>
   #Menu 
   {
      display:none; 
   }
   #News,#Life 
   {
      display:block;
   }
   </style>
   ";
}
// Выбираем имя файла, если был запрос к сайту на вывод изображения,
// переключаем переменную-кукис на другой формат изображения: на странице 
// или полноформатное изображение                  
$ImageFile=prown\getComRequest('Image');
// Делаем персональные стили для смартфона
if ($SiteDevice==Mobile) 
{
   // После 17.11.2020 без подключения jQuery Mobile
   // echo '
   // <link rel="stylesheet" href="https://doortry.ru/JqueryFW/deploy/jquery.mobile-1.3.2.min.css" />
   // <script src=                "https://doortry.ru/JqueryFW/deploy/jquery.mobile-1.3.2.min.js"></script>
   // ';
}
// Делаем персональные стили для компьютера
else 
{   
}
// <!-- --> ************************************************* UpSiteCSS.php ***
