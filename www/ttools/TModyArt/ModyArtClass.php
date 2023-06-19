<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                             *** ModyArtClass.php ***

// ****************************************************************************
// * ittve.me              Редактировать выбранный материал или создать новый * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  04.02.2023
// Copyright © 2023 tve                              Посл.изменение: 19.06.2023

require_once "Common.php";  

class ModyArt
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $Arti;     // объект по работе с базой данных материалов
   protected $apdo;     // подключение к базе данных материалов
   protected $urlHome;  // начальная страница сайта

   // *************************************************************************
   // *         ----Проинициализировать свойства классов по настройкам сайта,     *
   // *************************************************************************
   public function __construct($Arti,$apdo,$urlHome) 
   {
      $this->Arti=$Arti;
      $this->apdo=$apdo;
      $this->urlHome=$urlHome;
   }
   public function __destruct() 
   {
   }
   // *************************************************************************
   // *                  ----Изменить свойства для обновления настроек            *
   // *************************************************************************
   public function Head()
   {
      echo '<link rel="stylesheet" type="text/css" href="ttools/TModyArt/ModyArt.css">';
      // Отключаем разворачивание аккордеона
      // в случае, когда создаем заголовок новой статьи. 
      echo '
      <style>
         .accordion li .sub-menu 
         {
            height:100%;
         }
      </style>
     ';
   }
   // *************************************************************************
   // *                  ----Изменить свойства для обновления настроек            *
   // *************************************************************************
   public function Body()
   {
      ModyArtMenu($this->apdo,$this->urlHome);
   }
}

// ----------------------------------------------------- ФУНКЦИИ ВНЕ КЛАССА ---

// ****************************************************************************
// *             Построить html-код меню и сделать выбор материала            *
// ****************************************************************************
function ModyArtMenu($pdo,$urlHome) 
{
   // Проверяем целостность базы данных (по 10 очередным записям) 
   // ВРЕМЕННО ЗДЕСЬ
   ?> 
   <script> 
   //   $(document).ready(function() {GetPunktTestBase();})
   </script> 
   <?php
   // Готовим выбор материала
   $lvl=-1; $cLast='+++'; $nLine=0; $cli=""; 
   _ModyArtMenu($pdo,$urlHome,1,1,$cLast,$nLine,$cli,$lvl);
}
// ****************************************************************************
// *       Сформировать строки меню для выборки записи для редактирования:    *
// *                    $cli - вставка конца пункта меню                      *            
// ****************************************************************************
/*
<ul class="accordion">
<li id="moya-zhizn" class="moya-zhizn"> <i>Моя жизнь</i>
   <ul class="sub-menu">
      <li> <a href="?artim=osobennosti-ustrojstva-vintikov-v-moej-golove"><em>3</em>Особенности устройства винтиков в моей голове</a>
      </li>
   </ul>
</li>
<li id="mikroputeshestviya" class="mikroputeshestviya"> <i>Микропутешествия</i>
   <ul class="sub-menu">
      <li> <a href="?artim=kindasovo-zemlya-karelskogo-yumora"><em>5</em>Киндасово - земля карельского юмора</a>
      </li>
      <li> <a href="?artim=gora-sampo-ozero-svetlyj-les-tropinka-v-nebo"><em>6</em>Гора Сампо. Озеро, светлый лес, тропинка в небо</a>
      </li>
   </ul>
</li>
<li id="progulki" class="progulki"> <i>Прогулки</i>
   <ul class="sub-menu">
      <li> <a href="?artim=ohota-na-medvedya"><em>17</em>Охота на медведя</a>
      </li>
   </ul>
</li>
</ul>
*/
function _ModyArtMenu($pdo,$urlHome,$ParentID,$PidIn,&$cLast,&$nLine,&$cli,&$lvl,$FirstUl=' class="accordion"')
{
   // Определяем текущий уровень меню
   $lvl++; 
   // Выбираем все записи одного родителя
   $cSQL="SELECT uid,NameArt,Translit,pid,IdCue,DateArt FROM stockpw WHERE pid=".$ParentID." ORDER BY uid";
   $stmt = $pdo->query($cSQL);
   $table = $stmt->fetchAll();

   if (count($table)>0) 
   {
      echo('<ul'.$FirstUl.'>'."\n"); $cLast='+ul';
      // Перебираем все записи родителя, подсчитываем количество, формируем пункты меню
      $nPoint=0;
      foreach ($table as $row)
      {
         $nLine++; $cLine=''; 
         $Uid=$row["uid"]; $Pid=$row["pid"]; $Translit=$row["Translit"];
         $IdCue=$row["IdCue"]; $DateArt=$row["DateArt"]; 
         if ($cLast<>'+ul') 
         {
             $cli="</li>\n";
             echo($cli); $cLast='-li';
         }
         if ($IdCue==-1)
         {
            echo('<li id="'.$Translit.'" class="'.$Translit.'"> '); 
            echo('<i>'.$row['NameArt'].'</i>'."\n"); 
         } 
         else
         {
            $nPoint++;
            echo("<li> ");
            echo('<a href="'.$urlHome.'/'.'?artim='.$Translit.'">'.'<em>'.$Uid.'</em>'.$row['NameArt'].$cLine.'</a>'."\n"); 
         }
         $cLast='+li';
         _ModyArtMenu($pdo,$urlHome,$Uid,$Pid,$cLast,$nLine,$cli,$lvl,' class="sub-menu"'); 
         $lvl--; 
      }
      $cli="</li>\n";
      echo($cli); $cLast='-li'; 
      echo("</ul>\n");  $cLast='-ul';
   }
}

// ******************************************************* ModyArtClass.php ***
