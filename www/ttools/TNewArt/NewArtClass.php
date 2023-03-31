<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                              *** NewArtClass.php ***

// ****************************************************************************
// * ittve.me                                          Назначить новую статью * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  04.02.2023
// Copyright © 2023 tve                              Посл.изменение: 27.03.2023

require_once "Common.php";  

class NewArt
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $Arti; // объект по работе с базой данных материалов
   protected $apdo; // подключение к базе данных материалов
   
   // *************************************************************************
   // *         ----Проинициализировать свойства классов по настройкам сайта,     *
   // *************************************************************************
   public function __construct($Arti,$apdo) 
   {
      $this->Arti=$Arti;
      $this->apdo=$apdo;
      // Проверяем, нужно ли заменить файл для аякс-запроса в корневом каталоге 
      // и (при его отсутствии, при несовпадении размеров или старой дате) 
      // загружаем из класса 
      CompareCopyRoot('getNameCue.php','ttools/TNewArt');
   }
   public function __destruct() 
   {
   }
   // *************************************************************************
   // *                  ----Изменить свойства для обновления настроек            *
   // *************************************************************************
   public function Head()
   {
      echo '<link rel="stylesheet" type="text/css" href="Styles/UniArt.css">';
      // Отключаем разворачивание аккордеона
      // в случае, когда создаем заголовок новой статьи. 
      echo '
      <style>
         .accordion li .sub-menu 
         {
            height:100%;
         }
         #WorkTiny
         {
            height:92%;
         }
      </style>
     ';
   }
   // *************************************************************************
   // *                  ----Изменить свойства для обновления настроек            *
   // *************************************************************************
   public function Body()
   {
      mmlNaznachitStatyu_BODY($this->apdo);
   }
}

// ----------------------------------------------------- ФУНКЦИИ ВНЕ КЛАССА ---

// ****************************************************************************
// *            Выполнить действия в области редактирования "WorkTiny"        *
// *                        при назначении новой статьи                       *
// ****************************************************************************
function mmlNaznachitStatyu_BODY($pdo)
{
   if (\prown\getComRequest('nsnGru')==NoDefine)
   {
      ?> <script> 
         $(document).ready(function() {Error_Info('Группа материалов не назначена!');})
      </script> <?php
   }
   // Проверяем и учитываем уже выбранные данные
   if (\prown\getComRequest('nsnName')==NULL) $nsnName='';
   else $nsnName='value="'.\prown\getComRequest('nsnName').'"';
   if (\prown\getComRequest('nsnDate')==NULL) $nsnDate='';
   else $nsnDate='value="'.\prown\getComRequest('nsnDate').'"';
   // Выбираем название и дату новой статьи
   $SaveAction=$_SERVER["SCRIPT_NAME"];
   echo '
      <div id="nsGroup">
      <form id="frmNaznachitStatyu" method="post" action="'.$SaveAction.'">
   ';
   echo '
      <input id="nsName" type="text" name="nsnName" '.$nsnName.
         ' placeholder="Название нового материала"'.
         ' required onchange="changeNsName(this.value)">
      <input id="nsDate" type="date" name="nsnDate" '.$nsnDate.
         ' required onchange="changeNsDate(this.value)">
      <input id="nsCue"  type="hidden" name="nsnCue" value="'.NoDefine.'">
      <input id="nsGru"  type="hidden" name="nsnGru" value="'.NoDefine.'">
   ';
   echo '
      </form>
      </div>
   ';
   // Выбираем группу материалов для которой создается новая статья
   echo '<div id="AddArticle">';
      UniArtMenu($pdo,'getNameCue');
   echo '</div>';
}

// ******************************************************** NewArtClass.php ***
