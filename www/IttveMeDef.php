<?php
// PHP7/HTML5, EDGE/CHROME                               *** IttveMeDef.php ***

// ****************************************************************************
// * SignaPhoto       Совместные определения(переменные) для модулей PHP и JS *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  02.03.2022
// Copyright © 2022 tve                              Посл.изменение: 15.05.2023


// Определяем полный путь каталога хранения изображений 
define ("imgDir", $_SERVER['DOCUMENT_ROOT'].'/ittveEdit'); 

define ("ajSuccess",            "Функция/процедура выполнена успешно");     
define ("ajUndeletionOldFiles", "Ошибка удаления старых файлов");

define ("ModeImg", $c_ModeImg);       

// ****************************************************************************
// *         Подключить межязыковые (PHP-JScript) определения внутри HTML     *
// ****************************************************************************
function DefinePHPtoJS()
{
   // Переменные JavaScript, соответствующие определениям объектов HTML 
   // и определениям сообщений в PHP
   $odefine=
   '<script>'.
   'imgDir="'              .imgDir.              '";'.
   
   'oriLandscape="'        .oriLandscape. '";'.
   'oriPortrait="'         .oriPortrait.  '";'.
   
   'vimExiSize="'          .vimExiSize. '";'.
   'vimOnPage="'           .vimOnPage.  '";'.
   'ModeImg="'             .ModeImg.  '";'.
   
   'ajSuccess="'           .ajSuccess.           '";'.
   'ajUndeletionOldFiles="'.ajUndeletionOldFiles.'";'.
   '</script>';
   echo $odefine;
}   

// ********************************************************* IttveMeDef.php ***
