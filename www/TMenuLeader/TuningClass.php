<?php namespace tune; 

// PHP7/HTML5, EDGE/CHROME                              *** TuningClass.php ***

// ****************************************************************************
// * ittve.me                             Изменить настройки сайта в браузере * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  04.02.2018
// Copyright © 2018 tve                              Посл.изменение: 25.10.2022
//
/*
require_once $SiteRoot."/TDomikva/IniDomikva.php";
require_once $SiteRoot."/TDomikva/SubDomikva.php";
require_once $SiteRoot."/TDomikva/VerifyDomikva.php";
require_once $SiteRoot."/TDomikva/PickLgoKat.php";
require_once $SiteRoot."/TDomikva/AddProzhiv.php";
require_once $SiteRoot."/TDomikva/DelProzhiv.php";
*/

// Подгружаем нужные модули библиотеки прикладных функций
require_once pathPhpPrown."/MakeSession.php";

class Tuning
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $PresMode;         // настроенный режим представления материалов
   protected $aPresMode=        // режимы представления материалов
      ['1'=>rpmDoubleRight,'2'=>rpmDoubleLeft,'3'=>rpmOneRight,'4'=>rpmOneLeft]; 
   protected $PresModeList;     // список режимов представления материалов

   // Сведения о доме для расчета
   public $PlDom;               // Общая площадь дома
   public $PlKvar;              // Общая площадь квартиры
   public $EtDom;               // Этажность дома
   public $GodStr;              // Год постройки
   public $KatDom;              // Категория дома
   public $PerOto;              // Отопительный период
    
   // Сведения о проживающих
   public $zhCount;             // Количество проживающих в квартире
   public $aZhFio = array();    // Массив проживающих
   public $aZhLgokat = array(); // Массив категорий льгот проживающих
   public $aZhSovpr = array();  // Массив совместно проживающих (семей)
   
   // ************************************************************************
   // *             -----Проинициализировать сведения о проживающих               *
   // *             ----      и сведения о доме для расчета                      *
   // ************************************************************************
   public function __construct() 
   {
      // Выбираем из кукисов настройки сайта
      $this->PresMode=\prown\MakeCookie('PresModes'); 
      echo '$this->PresMode: ',$this->PresMode,'<br>'; 
      // Изменяем настройки
      $this->show('PresModes');      
      
      //$this->IniTuning($this->PlDom,$this->PlKvar,$this->Vidblag,$this->zhCount,
      //   $this->aZhFio,$this->aZhLgokat,$this->aZhSovpr,$db,$Atfirst,
      //   $this->EtDom,$this->GodStr,$this->KatDom,$this->PerOto);
   }
        
    // ************************************************************************
    // *       Представить сведения о проживающих и о доме для расчета        *
    // ************************************************************************
    protected function show($aRequest)
    {
       echo "Привет из Tuning.show!<br>"; 
       echo "<form class=\"frmDomKvar\" method=\"post\" name=\"DomvesFrm\">";

       echo "<div id=\"Domves\">";
       echo "<fieldset>";
       echo "<ul>";

       // Определяем режим представления материалов
       $this->PresModeList[]=["Режимы представления материалов",$this->aPresMode];
       $this->echoGroupList("liVidblag","Режимы представления материалов:","vidblag",$this->PresModeList,$this->PresMode); 

       echo "</ul>";
       echo "</fieldset>";
       echo "</div>";
       echo "</form>"; 
     
       echo '<br>','$this->PresMode: ',$this->PresMode,'<br>'; 

    /* 
    echo "<h2>Дом и квартира</h2>";
    echo "<form class=\"frmDomKvar\" method=\"post\" name=\"DomvesFrm\">";
    // Обрабатываем данные по дому
    echo "<div id=\"Domves\">";
    echo "<fieldset>";
    echo "<legend class=\"legDomKvar\">Параметры расчета</legend>";
    echo "<ul>";
    
    echo "<li class=\"liPld\">";
    echo "<label for=\"pld\">Общая площадь дома, м2: </label>";
    echo "<input id=\"pld\" type=\"number\" name=\"pld\" value=".$this->PlDom." ".
         "step=\"0.01\" min=\"10.00\" max=\"999999.99\"".">"; 
    echo "</li>";
    
    echo "<li class=\"liPlk\">";
    echo "<label for=\"plk\">Общая площадь квартиры, м2: </label>";
    echo "<input id=\"plk\" type=\"number\" name=\"plk\" value=".$this->PlKvar." ".
         "step=\"0.01\" min=\"10.00\" max=\"999.99\"".">"; 
    echo "</li>";
    // Определяем степень благоустройства
    global $aOpenSys,$aCloseSys;
    $VidblagList[]=["Открытая система водоразбора",$aOpenSys];
    $VidblagList[]=["Закрытая система водоразбора",$aCloseSys];
    echoGroupList("liVidblag","Благоустройство:","vidblag",$VidblagList,$this->Vidblag); 
    // Определяем этажность дома
    echo "<li class=\"liEtd\">";
    echo "<label for=\"etd\">Этажность дома: </label>";
    echo "<input id=\"etd\" type=\"number\" name=\"etd\" value=".$this->EtDom." ".
         "step=\"1\" min=\"1\" max=\"35\"".">"; 
    echo "</li>";
    // Определяем год постройки
    echo "<li class=\"liGst\">";
    echo "<label for=\"gst\">Год постройки: </label>";
    echo "<input id=\"gst\" type=\"number\" name=\"gst\" value=".$this->GodStr." ".
         "step=\"1\" min=\"1917\" max=\"2058\"".">"; 
    echo "</li>";
    // Определяем категорию дома
    global $aKatdom;
    $KatDomList[]=["Категория дома",$aKatdom];
    echoGroupList("liKtd","Категория дома:","ktd",$KatDomList,$this->KatDom); 
    // Определяем отопительный период
    global $aOtoper;    
    $PerOtoList[]=["Отопительный период",$aOtoper];
    echoGroupList("liOtp","Отопительный период:","otp",$PerOtoList,$this->PerOto); 
    
    echo "</ul>";
    echo "</fieldset>";
    echo "</div>";
    
    // Управляем вводом
    echo '<div id="LineCommon">';
    echo '<button id="btnDomKvar" class="buttons" type="submit">Рассчитать льготы</button>';
    IniPlusMinus(Zhkvar,false);
    echo "</div>";
    
    // Обрабатываем данные по квартире
    echo "<div id=\"Kvartira\"".">";
    echo "<fieldset>";
    echo "<legend class=\"legDomKvar\">Проживающие, количества членов семей для льготы</legend>";
    echo "<table class=\"tblProzh\">";
    
    // Выводим таблицу проживающих
    foreach($this->aZhFio as $i => $value) 
	{
        $oddi=$i%2;    
        if ($oddi==0) $cl=" class=\"inpOdd\" ";
        else $cl=" class=\"inpEven\" ";
        
        echo "<tr>";
        
        // Выводим чекбоксы при запросе на удаление
        if (IsSet($_GET['Com'])) 
        { 
            if ($_GET['Com']=="delZhKvar")
            {
                echo "<td class=\"notific\" data-title=\"Удалить\">";
                echo "<input type=\"checkbox\" name=\"dr".$i."\">";
                echo "</td>";
            } 
        }
        
        echo "<td class=\"notific\" data-title=\"Не более 17 символов\">";
        echo "<input".$cl.
            " pattern=\"^[А-Яа-яЁё\s\.-]{1,17}\"".
            " type=\"text\" name=\"zhFio".$i."\"".
            " value=\"".$this->aZhFio[$i]."\"/>"; 
        echo "</td>";
        
        echo "<td class=\"tdLgokat\">";
        echo "<select".$cl." name=\"zhLgokat".$i."\">".
            "<optgroup label=\"Льготная категория граждан\">";
        echo PickLgoKat($this->aZhLgokat[$i]);
        echo "</optgroup></select>";    
        echo "</td>";
        
        echo "<td class=\"tdSovpr\">";
        echo "<input".$cl."type=\"number\" name=\"zhSovpr".$i."\" ".
            "value=\"".\prown\NoZero($this->aZhSovpr[$i])."\" ".
            "step=\"1\" min=\"0\" max=\"14\"".">"; 
        echo "</td>";
        echo "</tr>"; 
    }
    
    echo "<tr>";
    // Выводим заголовок чекбоксов при запросе на удаление
    if (IsSet($_GET['Com'])) 
    { 
        if ($_GET['Com']=="delZhKvar")
        {
            echo "<th> </th>";
        }
    }
    echo "<th>Фамилия И.О.</th>";
    echo "<th>Категория</th>";
    echo "<th>Количество</th>";
    echo "</tr>";

    
    echo "</table>";
    echo "</fieldset>";
    echo "</div>";
    echo "</form>"; 
    */
    }

function IniTuning(&$PlDom,&$PlKvar,&$Vidblag,&$zhCount,&$aZhFio,&$aZhLgokat,&$aZhSovpr,$db,$Atfirst,
    &$EtDom,&$GodStr,&$KatDom,&$PerOto)
{
    /*
    $Err=null;
    // Принимаем площадь дома
    $PlDom=\prown\CtrlNumber(2147.10,10,999999.99,'PlDom','pld',2,$Err);
    if (!($Err==0)) TriggerUserMessage(Pldom10_999999);
    // Инициализируем площадь квартиры: 
    $PlKvar=\prown\CtrlNumber(52.30,10,999.99,'PlKvar','plk',2,$Err);
    if (!($Err==0)) TriggerUserMessage(Plkvar10_999);                                                                     
    // Инициализируем степень благоустройства: 
    $Vidblag=\prown\CtrlNumber(1,1,10,'Vidblag','vidblag',0,$Err);
    // Принимаем этажность дома
    $EtDom=\prown\CtrlNumber(9,1,35,'EtDom','etd',0,$Err);
    if (!($Err==0)) TriggerUserMessage(Etdom1_35);
    // Год постройки
    $GodStr=\prown\CtrlNumber(2016,1917,2058,'GodStr','gst',0,$Err);
    if (!($Err==0)) TriggerUserMessage(Godstr17_58);
    // Категория дома
    $KatDom=\prown\CtrlNumber(2,1,5,'KatDom','ktd',0,$Err);
    if (!($Err==0)) TriggerUserMessage(KatDom1_5);
    // Отопительный период
    //$PerOto=8;
    //echo "<br>".'$PerOto='.$PerOto;
    $PerOto=\prown\CtrlNumber(1,1,3,'PerOto','otp',0,$Err);
    if (!($Err==0)) TriggerUserMessage(PerOto89_12);
    
    // Step1: Инициализируем массивы по умолчанию
    $zhCount=3;
    // Инициируем проживающих 
    $aZhFio[0]='ФОТЕЕВА Н.П.';
    $aZhFio[1]='СИДОРЕНКО И.М.';
    $aZhFio[2]='внучка';
    // Инициируем категории льгот проживающих
    $aZhLgokat[0]=201;
    $aZhLgokat[1]=118;
    $aZhLgokat[2]=1;
    // Инициируем количества совместно проживающих 
    $aZhSovpr[0]=0;
    $aZhSovpr[1]=2;
    $aZhSovpr[2]=0;
    
    if ($Atfirst==Atfirst)
    {
        $PlDom=2147.10; \prown\MakeCookie('PlDom',$PlDom);
        $PlKvar=52.30;  \prown\MakeCookie('PlKvar',$PlKvar);
        $Vidblag=1;     \prown\MakeCookie('Vidblag',$Vidblag);
        $EtDom=9;       \prown\MakeCookie('EtDom',$EtDom);
        $GodStr=2016;   \prown\MakeCookie('GodStr',$GodStr);
        $KatDom=2;      \prown\MakeCookie('KatDom',$KatDom);
        $PerOto=1;      \prown\MakeCookie('PerOto',$PerOto);
        $IsCookie=False;  // "перенести массивы в кукисы"
        IniDomikStep($zhCount,$aZhFio,$aZhLgokat,$aZhSovpr,$IsCookie);
        $zhCount=count($aZhFio);
        \prown\MakeCookie('ZhCount',$zhCount);
    }
    else
    {
        // Step2: Изменяем значения через кукисы и параметры
        $IsCookie=True;  // "выбирать массив из кукисов"
        IniDomikStep($zhCount,$aZhFio,$aZhLgokat,$aZhSovpr,$IsCookie);

        // Step2.1: Удаляем указанных проживающих
        // \prown\ViewArray($_COOKIE,'2 $_COOKIE');
        DelProzhiv($zhCount,$aZhFio,$aZhLgokat,$aZhSovpr);
        //\prown\ViewArray($_COOKIE,'3 $_COOKIE');
        // Step3: Проверяем соответствие размеров массивов. Если размеры не 
        // совпадают, поджимаем массивы, вырезая несоответствия
        $Arrays[]=$aZhFio;
        $Arrays[]=$aZhLgokat;
        $Arrays[]=$aZhSovpr;
        $Dim=0;
        if (!(\prown\isCountArrays($Arrays,$Dim)))
        {
            // echo "<br>".'false False';
            $Arrays=\prown\SqueezeArrays($Arrays,$Dim);
            // Трассируем полученные массивы
            //foreach($Arrays as $key => $value) 
            //{
            //    \prown\ViewArray($value,'$Arrays'.$key);
            //}
            // Реинициализируем массивы по оперативным данным
            $zhCount=$Dim;
            $aZhFio=$Arrays[0];
            $aZhLgokat=$Arrays[1];
            $aZhSovpr=$Arrays[2];
            $IsCookie=False; 
            IniDomikStep($zhCount,$aZhFio,$aZhLgokat,$aZhSovpr,$IsCookie);
        }
        // Размеры совпали, анализируем  далее элементы массивов
        else 
        {
            //echo "<br>".'true True';
        }
        // Step4: Добавляем нового проживающего в массив кукисов и 
        // в оперативный массив , приняв его из параметров
        AddProzhiv($zhCount,$aZhFio,$aZhLgokat,$aZhSovpr);
        // Step5: Делаем контрольные преобразования элементов массивов
        // Проверяем $aZhFio и вырезаем символы, которые не могут входить 
        // в фамилию, инициалы 
        VerifyZhFio($aZhFio);
        // Проверяем категории льгот в массиве $aZhLgokat  
        VerifyZhLgokat($aZhLgokat,$db);
        // Проверяем правильность записей распространения льготы 
        // на совместно проживающих
        VerifyZhSovpr($aZhSovpr,$zhCount,$aZhLgokat);
    }
    */
}

   // *************************************************************************
   // *              Обеспечить работу в поле со списком выбора               *
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


//echo "<br>".'out.DomikvaClass'."<br>";
// ******************************************************** TuningClass.php ***
