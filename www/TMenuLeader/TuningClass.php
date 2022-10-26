<?php namespace tune; 

// PHP7/HTML5, EDGE/CHROME                              *** TuningClass.php ***

// ****************************************************************************
// * ittve.me                             Изменить настройки сайта в браузере * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  04.02.2018
// Copyright © 2018 tve                              Посл.изменение: 26.10.2022

// Подгружаем нужные модули библиотеки прикладных функций
require_once pathPhpPrown."/MakeSession.php";

class Tuning
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $PresMode;         // настроенный режим представления материалов
   protected $aPresMode=        // режимы представления материалов
      ['1'=>rpmDoubleRight,'2'=>rpmDoubleLeft,'3'=>rpmOneRight,'4'=>rpmOneLeft]; 
   protected $PresModeList;     // список режимов представления материалов

   protected $ModeImg;          // настроенный режим представления выбранной картинки
   protected $aModeImg=         // режимы представления выбранной картинки
      ['1'=>vimExiSize,'2'=>vimOnPage]; 
   protected $ModeImgList;      // список режимов представления выбранной картинки
   
   protected $EtDom;            // Этажность дома
   
   // *************************************************************************
   // *         Проинициализировать свойства классов по настройкам сайта,     *
   // *            запустить изменение свойств для обновления настроек        *
   // *************************************************************************
   public function __construct() 
   {
      // Выбираем из кукисов настройки сайта
      $this->PresMode=\prown\MakeCookie('PresMode'); 
      $this->ModeImg=\prown\MakeCookie('ModeImg'); 
      $this->EtDom=3; 
      // Изменяем настройки
      $this->ShowUpdate();      
   }
   // *************************************************************************
   // *       Представить сведения о проживающих и о доме для расчета         *
   // *************************************************************************
   protected function ShowUpdate()
   {
      echo "<form class=\"frmDomKvar\" method=\"GET\" name=\"DomvesFrm\">";
      echo "<div id=\"Domves\">";
      echo "<fieldset>";
      echo "<ul>";

      // Определяем режим представления материалов
      $a="Режимы представления материалов";
      $this->PresModeList[]=[$a,$this->aPresMode];
      $this->echoGroupList("cPresMode",$a.':',"PresMode",$this->PresModeList,2); //$this->PresMode); 

      // Определяем режим представления выбранной картинки
      $a="Режимы представления выбранной картинки";
      $this->ModeImgList[]=[$a,$this->aModeImg];
      $this->echoGroupList("cModeImg",$a.':',"ModeImg",$this->ModeImgList,2); //$this->ModeImg); 
       
       // Определяем этажность дома
       echo "<li class=\"liEtd\">";
       echo "<label for=\"etd\">Этажность дома: </label>";
       echo "<input id=\"etd\" type=\"number\" name=\"etd\" value=".$this->EtDom." ".
          "step=\"1\" min=\"1\" max=\"35\"".">"; 
       echo "</li>";

       echo "</ul>";
       echo "</fieldset>";
       echo "</div>";
           
       // Управляем вводом
       echo '<div id="LineCommon">';
       echo '<button id="btnDomKvar" class="buttons" type="submit">Рассчитать льготы</button>';
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
