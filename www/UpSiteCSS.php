<?php
// PHP7/HTML5, EDGE/CHROME                                *** UpSiteCSS.php ***

// ****************************************************************************
// * ittve.me                          Переключить общие и персональные стили *
// *                   при загрузке страниц в настольной или мобильной версии *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  11.11.2020
// Copyright © 2020 tve                              Посл.изменение: 29.10.2022

// Формируем общие начальные теги разметки страницы
echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';
echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
// SeoTags()
echo '<title>Обо мне, путешествиях и ... Черногории</title>';
echo '<meta name="description" content="Труфанов Владимир Евгеньевич, его жизнь и увлечения, жизнь его близких">';
echo '<meta name="keywords" content="Труфанов Владимир Евгеньевич, жизнь и увлечения">';
// Выводим данные о favicon
echo '
<link rel="manifest" href="manifest.json">
<link rel="apple-touch-icon" sizes="180x180" href="/favicon260x260/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon260x260/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon260x260/favicon-16x16.png">
<link rel="mask-icon" href="/favicon260x260/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="/favicon260x260/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config" content="/favicon260x260/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
';
// Подключаем font-awesome 4.7.0
echo '<link rel="stylesheet"'.'href="font-awesome-4.7.0/css/font-awesome.min.css">';
// Подключаем jQuery 2.2.4
echo '<script src="jQuery/jquery-2.2.4.min.js"> </script>';

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
// Определяем стили страницы редактирования материалов
echo '<link rel="stylesheet" type="text/css" href="Styles/EditText.css">';
// При одноколоночном режиме отключаем див '#News'
if (($c_PresMode==rpmOneRight)||(prown\isComRequest('Tuning','Com')))
{
   echo "
   <style>
   #News
   { 
     right:0;
     width:0;
     overflow:hidden; 
     padding:0; 
   }
   #Life,#Footer,#Info
   { 
      right:33%;
      width:67%; 
   }
   #Gallery
   {
      margin-left:67%;
      width:33%;
   }
   #LifeMenu
   {
      left:0;
   }
   #RightFooter
   {
      right:33%;
   }
   </style>
   ";
}
else if ($c_PresMode==rpmOneLeft)
{
   echo "
   <style>
   #News
   {
     right:0;
     width:0; 
     overflow:hidden;
     padding:0; 
   }
   #Life,#Footer,#Info
   { 
      left:33%;
      width:67%; 
   }
   #Gallery
   {
      margin-right:67%;
      width:33%;
   }
   #LifeMenu
   {
      left:33.1%;
   }
   #RightFooter
   {
      right:0;
   }
   </style>
   ";
}
else if ($c_PresMode==rpmDoubleRight)
{
   echo "
   <style>
   #News
   { 
     right:67%;
     width:33%;
     overflow:auto; 
     padding:0.5rem 0.5rem;
   }
   #Life
   { 
      right:33%;
      width:34%; 
   }
   #Footer,#Info
   { 
      right:33%;
      width:67%; 
   }
   #Gallery
   {
      margin-left:67%;
      width:33%;
   }
   #LifeMenu
   {
      left:0;
   }
   #RightFooter
   {
      right:33%;
   }
   </style>
   ";
}
else
{
   echo "
   <style>
   #News
   {
     right:0;
     width:33%;
     overflow:auto; 
     padding:0.5rem 0.5rem;
   }
   #Life
   { 
      right:33%;
      width:34%; 
   }
   #Footer,#Info
   { 
      left:33%;
      width:67%; 
   }
   #Gallery
   {
      margin-right:67%;
      width:33%;
   }
   #LifeMenu
   {
      left:33.1%;
   }
   #RightFooter
   {
      right:0;
   }
   </style>
   ";
}
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
