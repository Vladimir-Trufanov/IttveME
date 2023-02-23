<?php
// PHP7/HTML5, EDGE/CHROME                                *** UpSiteDef.php ***

// ****************************************************************************
// * SignaPhoto       Совместные определения(переменные) для модулей PHP и JS *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  10.07.2021
// Copyright © 2021 tve                              Посл.изменение: 02.03.2022

function DefinePHP()
{
   define ("RootDir",              $_SERVER['DOCUMENT_ROOT']); 

   define ("oriLandscape", 'landscape');  // Ландшафтное расположение устройства
   define ("oriPortrait",  'portrait');   // Портретное расположение устройства

   // Константы при назначении новой статьи
   define ("nstNoVyb",            "не выбрано");     
   define ("nstNoNaz", "не назначено");

   // Определения сообщений для PHP
   define ("ajSuccess",            "Функция/процедура выполнена успешно");     
   define ("ajTransparentSuccess", "Преобразование к прозрачному виду успешно");
   define ("ajUndeletionOldFiles", "Ошибка удаления старых файлов");
}   

// ****************************************************************************
// *         Подключить межязыковые (PHP-JScript) определения внутри HTML     *
// ****************************************************************************
function DefineJS()
{
   // Переменные JavaScript, соответствующие определениям сообщений в PHP
   $define=
   '<script>'.
   'RootDir="'              .RootDir.'";'.
   'nstNoVyb="'             .nstNoVyb.'";'.
   'nstNoNaz="'             .nstNoNaz.'";'.

   'ajSuccess="'           .ajSuccess.           '";'.
   'ajTransparentSuccess="'.ajTransparentSuccess.'";'.
   'ajUndeletionOldFiles="'.ajUndeletionOldFiles.'";'.
   '</script>';
   echo $define;
}   

// ********************************************************** UpSiteDef.php ***
