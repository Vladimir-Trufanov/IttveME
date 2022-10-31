<?php namespace tune; 

// PHP7/HTML5, EDGE/CHROME                              *** TuningClass.php ***

// ****************************************************************************
// * ittve.me                             Изменить настройки сайта в браузере * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  04.02.2018
// Copyright © 2018 tve                              Посл.изменение: 28.10.2022

// Определяем массив режимов представления материалов
$aPresMode=['1'=>rpmDoubleRight,'2'=>rpmDoubleLeft,'3'=>rpmOneRight,'4'=>rpmOneLeft]; 
// Определяем массив режимов представления выбранной картинки    
$aModeImg=['1'=>vimExiSize,'2'=>vimOnPage]; 

class Tuning
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $urlHome;          // Начальная страница сайта 
   protected $PresMode;         // настроенный режим представления материалов
   protected $PresModeList;     // список режимов представления материалов

   protected $ModeImg;          // настроенный режим представления выбранной картинки
   protected $ModeImgList;      // список режимов представления выбранной картинки
   
   protected $EtDom;            // Этажность дома
   
   // *************************************************************************
   // *         Проинициализировать свойства классов по настройкам сайта,     *
   // *            запустить изменение свойств для обновления настроек        *
   // *************************************************************************
   public function __construct($ap,$ai,$ui) 
   {
      $this->urlHome=$ui;
      // Выбираем из кукисов настройки сайта
      $this->PresMode=\prown\MakeCookie('PresMode');
      $this->ModeImg=\prown\MakeCookie('ModeImg'); 
      $this->EtDom=3; 
      // Изменяем настройки
      $this->ShowUpdate($ap,$ai);      
   }
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
   public function __destruct() 
   {
   }
   // *************************************************************************
   // *                  Изменить свойства для обновления настроек            *
   // *************************************************************************
   protected function ShowUpdate($aPresMode,$aModeImg)
   {
      echo '<form class="frmTuning" method="POST" name="TuningFrm" action="'.$this->urlHome.'">';
      echo '<div>';
      echo '<fieldset>';
      echo '<ul>';
      // Определяем режим представления материалов
      $a="Режимы представления материалов";
      $this->PresModeList[]=[$a,$aPresMode];
      $this->echoGroupList("cPresMode",$a.':',"pPresMode",$this->PresModeList,$this->getKey($aPresMode,$this->PresMode)); 
      // Определяем режим представления выбранной картинки
      $a="Режимы представления выбранной картинки";
      $this->ModeImgList[]=[$a,$aModeImg];
      $this->echoGroupList("cModeImg",$a.':',"pModeImg",$this->ModeImgList,$this->getKey($aModeImg,$this->ModeImg)); 
       // Определяем этажность дома
       echo "<li class=\"liEtd\">";
       echo "<label for=\"etd\">Этажность дома: </label>";
       echo "<input id=\"etd\" type=\"number\" name=\"etd\" value=".$this->EtDom." ".
          "step=\"1\" min=\"1\" max=\"35\"".">"; 
       echo "</li>";
       //
       echo "</ul>";
       echo "</fieldset>";
       echo "</div>";
       // Управляем вводом
       echo '<div id="LineCommon">';
       echo '<button id="btnTuning" class="buttons" type="submit">Изменить настройки</button>';
       echo "</div>";
       echo "</form>"; 
    }
    // ************************************************************************
    // *              Обеспечить работу в поле со списком выбора              *
    // ************************************************************************
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
}
// ******************************************************** TuningClass.php ***
