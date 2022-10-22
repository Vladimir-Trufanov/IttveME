<?php
// PHP7/HTML5, EDGE/CHROME                                *** UpSiteCSS.php ***

// ****************************************************************************
// * ittve.me                          Переключить общие и персональные стили *
// *                   при загрузке страниц в настольной или мобильной версии *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  11.11.2020
// Copyright © 2020 tve                              Посл.изменение: 22.10.2022

// Выполняем сброс стилей и устанавливаем начальные настройки стилей
echo '<link rel="stylesheet" type="text/css" href="Styles/iniStyles.css">';
// Позиционируем справа галерею изображений и делам только одну колонку для 
// статей. Выполняем общее фиксирование элементов разметки  
echo '<link rel="stylesheet" type="text/css" href="Styles/ImgRight.css">';
// Определяем стили галлереи, определяем стили для показа изображения, 
// выбранной в галерее картинки, на отдельной странице в ее рамках 
// или в натуральную величину 
echo '<link rel="stylesheet" type="text/css" href="Styles/Gallery-Image.css">';
// Определяем стили меню статей (материалов) 
echo '<link rel="stylesheet" type="text/css" href="Styles/MenuArticles.css">';
// Выстраиваем стили подвала сайта и информационной полосы
echo '<link rel="stylesheet" type="text/css" href="Styles/Footer-Info.css">';
// Стилизуем панель меню управления в подвале страницы 
echo '<link rel="stylesheet" type="text/css" href="Styles/MenuLeader.css">';

// Переключаем контекстные колонки
if (prown\isComRequest('LifeMenu','Com'))
{
   echo "
   <style>
   <!-- 
   #News,#Life 
   {
      display:none; 
   }
   -->
   #MenuArticles 
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
   #MenuArticles 
   {
      display:none; 
   }
   <!-- 
   #News,#Life 
   {
      display:block;
   }
   -->
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
}
// Делаем персональные стили для компьютера
else 
{   
}
// <!-- --> ************************************************* UpSiteCSS.php ***
