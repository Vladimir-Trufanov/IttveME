<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                              *** TuningClass.php ***

// ****************************************************************************
// * ittve.me                             Изменить настройки сайта в браузере * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  04.02.2018
// Copyright © 2018 tve                              Посл.изменение: 24.05.2023

class Tuning
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $urlHome;          // начальная страница сайта 
   
   protected $PresMode;         // настроенный режим представления материалов
   protected $aPresMode;        // массив режимов представления материалов

   protected $ModeImg;          // настроенный режим представления выбранной картинки
   protected $aModeImg;         // массив режимов представления выбранной картинки 

   protected $PhoneImg;         
   protected $aPhoneImg; 
   
   protected $moditap;          // активатор тапок
   
   // *************************************************************************
   // *         Проинициализировать свойства классов по настройкам сайта,     *
   // *            запустить изменение свойств для обновления настроек        *
   // *************************************************************************
   public function __construct($aPresMode,$aModeImg,$aPhoneImg,$urlHome,$moditap) 
   {
      $this->urlHome=$urlHome;
      
      // Выбираем из кукисов настройки сайта
      $this->PresMode=\prown\MakeCookie('PresMode');
      $this->aPresMode=$aPresMode;
      $this->ModeImg=\prown\MakeCookie('ModeImg'); 
      $this->aModeImg=$aModeImg;
      $this->PhoneImg=\prown\MakeCookie('PhoneImg'); 
      $this->aPhoneImg=$aPhoneImg;

      $this->moditap=$moditap;
   }
   public function __destruct() 
   {
   }
   // *************************************************************************
   // *                  Изменить свойства для обновления настроек            *
   // *************************************************************************
   public function Head()
   {
      ?>
      <link rel="stylesheet" type="text/css" href="ttools/TTuningClass/tuning.css">
      <?php
     
      echo'  
         <style>
         @font-face 
         {
            font-family: Pacifico; 
            src: url(ttools/TTuningClass/Pacifico-Regular.ttf); 
         }
         </style>
      ';
      echo '
         <style>
         #WorkTiny
         {
            width:100%;
            height:92%;
            overflow:auto;
         }
         </style>
      ';
   }
   // *************************************************************************
   // *                  Изменить свойства для обновления настроек            *
   // *************************************************************************
   public function Body()
   {
      echo '<div id="tuning">';
      echo '<div id=tole></div><div id=tori></div><div id=bori></div><div id=bole></div>';
      echo '<form class="frmTuning" method="get" name="TuningFrm" action="'.$this->urlHome.'">';
      ?> 

      <div class="sel sel--PresMode">
         <select name="pPresMode" id="pPresMode">
         <option value="" disabled>Режимы представления материалов</option>
         <?php
         for ($i=0; $i<count($this->aPresMode); $i++) 
         {
            echo '<option value="'.$this->aPresMode[$i].'">'.$this->aPresMode[$i].'</option>';
         }
         ?> 
         </select>
      </div>

      <div class="sel sel--ModeImg">
         <select name="pModeImg" id="pModeImg">
         <option value="" disabled> Режимы представления выбранной картинки</option>
         <?php
         for ($i=0; $i<count($this->aModeImg); $i++) 
         {
            echo '<option value="'.$this->aModeImg[$i].'">'.$this->aModeImg[$i].'</option>';
         }
         ?> 
         </select>
      </div>

      <div class="sel sel--PhoneImg">
         <select name="pPhoneImg" id="pPhoneImg">
         <option value="" disabled> Фоны отдельно показываемых изображений</option>
         <?php
         for ($i=0; $i<count($this->aPhoneImg); $i++) 
         {
            echo '<option value="'.$this->aPhoneImg[$i].'">'.$this->aPhoneImg[$i].'</option>';
         }
         ?> 
         </select>
      </div>

      <hr class="rule">
      <div id="LineCommon">
         <?php
         echo '<input  id="inpTaping" name= "buttons" type="text" value="'.$this->moditap.'">';
         echo '<button id="btnTuning" class="buttons" type="submit">'.     $this->moditap.'</button>';
         ?> 
      </div>
      <?php
      echo '</form>';
      echo '<script src="ttools/TTuningClass/tuning.js"></script>';
      echo '</div>';
   }
}

// ******************************************************** TuningClass.php ***
