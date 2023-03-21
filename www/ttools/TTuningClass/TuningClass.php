<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                              *** TuningClass.php ***

// ****************************************************************************
// * ittve.me                             Изменить настройки сайта в браузере * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  04.02.2018
// Copyright © 2018 tve                              Посл.изменение: 20.03.2023

class Tuning
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $urlHome;          // начальная страница сайта 
   protected $PresMode;         // настроенный режим представления материалов
   protected $aPresMode;        // массив режимов представления материалов
   protected $PresModeList;     // список режимов представления материалов с заголовком

   protected $ModeImg;          // настроенный режим представления выбранной картинки
   protected $aModeImg;         // массив режимов представления выбранной картинки 
   protected $ModeImgList;      // список режимов представления выбранной картинки с заголовком
   
   // *************************************************************************
   // *         Проинициализировать свойства классов по настройкам сайта,     *
   // *            запустить изменение свойств для обновления настроек        *
   // *************************************************************************
   public function __construct($aPresMode,$aModeImg,$urlHome) 
   {
      $this->urlHome=$urlHome;
      // Выбираем из кукисов настройки сайта
      $this->PresMode=\prown\MakeCookie('PresMode');
      $this->aPresMode=$aPresMode;
      $this->ModeImg=\prown\MakeCookie('ModeImg'); 
      $this->aModeImg=$aModeImg;
   }
   /*
   // Выбрать ключ из массива (для $aPresMode,$aModeImg)
   protected function getKey($a,$v)
   {
      $Result=1;
      foreach($a as $key => $value) 
      {
         if ($v==$value) $Result=$key;
      }
      return $Result;
   }
   */
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
      echo '<form class="frmTuning" method="get" name="TuningFrm" action="'.$this->urlHome.'">';
      ?> 
      <div class="sel sel--black-panther">
         <select name="pPresMode" id="pPresMode">
         <option value="" disabled>Режимы представления материалов</option>
         <option value="rpmOneRight">Одноколоночный с правосторонней галереей</option>
         <option value="rpmDoubleRight">Двухколоночный с правосторонней галереей</option>
         <option value="rpmDoubleLeft">Двухколоночный с левосторонней галереей</option>
         <option value="rpmOneLeft">Одноколоночный с левосторонней галереей</option>
         </select>
      </div>
      <hr class="rule">
      <div class="sel sel--superman">
         <select name="pModeImg" id="pModeImg">
         <option value="" disabled> Режимы представления выбранной картинки</option>
         <option value="vimExiSize">В заданном размере в пикселах - "как есть"</option>
         <option value="vimOnPage">На странице по высоте</option>
         </select>
      </div>
      <hr class="rule">
      <div id="LineCommon">
      <button id="btnTuning" class="buttons" type="submit">Изменить настройки</button>
      </div>
      <?php
      echo '</form>';
      echo '<script src="ttools/TTuningClass/tuning.js"></script>';
      echo '</div>';
   }
   /*
      echo '<form class="frmTuning" method="get" name="TuningFrm" action="'.$this->urlHome.'">';
      echo '<div>';
      echo '<fieldset>';
      echo '<ul>';
      // Определяем режим представления материалов
      $a="Режимы представления материалов";
      $this->PresModeList[]=[$a,$this->aPresMode];
      $this->echoGroupList("cPresMode",$a.':',"pPresMode",$this->PresModeList,$this->getKey($this->aPresMode,$this->PresMode)); 
      // Определяем режим представления выбранной картинки
      $a="Режимы представления выбранной картинки";
      $this->ModeImgList[]=[$a,$this->aModeImg];
      $this->echoGroupList("cModeImg",$a.':',"pModeImg",$this->ModeImgList,$this->getKey($this->aModeImg,$this->ModeImg)); 
      //
      echo "</ul>";
      echo "</fieldset>";
      echo "</div>";
      // Управляем вводом
      echo '<div id="LineCommon">';
      echo '<button id="btnTuning" class="buttons" type="submit">Изменить настройки</button>';
      echo "</div>";
      echo "</form>"; 
   
   // *************************************************************************
   // *               Обеспечить работу в поле со списком выбора              *
   // *************************************************************************
   protected function echoGroupList($Classname,$Name,$Parmname,$aGroupList,$IniKey) 
   // $Classname - класс форматирования вывода в форме
   // $Name - наименование поля в форме
   // $Parmname - список выбора, параметр запроса, класс форматирования списка
   // $aGroupList - массив групп списка выбора
   // $IniKey - ключ начального выбора в списке
   {
      echo "<li class=\"".$Classname."\">";
      echo "<label for=\"".$Parmname."\">".$Name." </label>";
      echo "<select id=\"".$Parmname."\" name=\"".$Parmname."\" class=\"".$Parmname."\">";
      for ($i=0; $i<count($aGroupList); $i++)
      {
         // Определяем наименование группы списка выбора
         $NameGroup=$aGroupList[$i][0];        
         echo "<optgroup label=\"".$NameGroup."\">";
         // Выбираем группу списка выбора
         $aOptGroup=$aGroupList[$i][1]; 
         foreach($aOptGroup as $key => $value) 
         {
           if ($IniKey==$key) echo "<option selected value=\"".$key."\">".$value."</option>";
            else echo "<option value=\"".$key."\">".$value."</option>";
         }
         echo "</optgroup>";
      }
      echo "</select>";
      echo "</li>";
   }
   */
}

// ******************************************************** TuningClass.php ***
