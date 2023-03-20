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
   public function Head()
   {
      ?> 

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

	   <link rel="stylesheet" type="text/css" href="ttools/TTuningClass/css/style6.css">
	   <script src="ttools/TTuningClass/js/modernizr.custom.63321.js"></script>

     <?php
         echo '
            <style>
            #WorkTiny
            {
               width:100%;
               height:92%;
               /*background:transparent;*/
               /*background:white;*/
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
      ?> 
		<div class="container">	
			<section class="main">
				<div class="fleft">
					<select id="cd-dropdown" class="cd-select">
						<option value="-1" selected>Choose your prize</option>
						<option value="1" class="icon-camera">Camera</option>
						<option value="2" class="icon-diamond">Diamonds</option>
						<option value="3" class="icon-rocket">Spaceship</option>
						<option value="4" class="icon-star">Star</option>
						<option value="5" class="icon-clock">Time</option>
					</select>
				</div>
			</section>
		</div>
		<script type="text/javascript" src="ttools/TTuningClass/js/jquery.dropdown.js"></script>
		<script type="text/javascript">
			
			$( function() {
				
				$( '#cd-dropdown' ).dropdown( {
					gutter : 5,
					stack : false,
					delay : 100,
					slidingIn : 100
				} );

			});

		</script>
      <?php
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
   }
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
}

// ******************************************************** TuningClass.php ***
