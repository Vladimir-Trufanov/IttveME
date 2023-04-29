<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                          *** ZhizniPutiClass.php ***

// ****************************************************************************
// * ittve.me             Подготовить и развернуть меню "Жизнь и путешествия" * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  26.02.2023
// Copyright © 2023 tve                              Посл.изменение: 03.04.2023

class ZhizniPuti
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $Arti; // объект по работе с базой данных материалов
   protected $apdo; // подключение к базе данных материалов
   
   // *************************************************************************
   // *                   Проинициализировать свойства класса                 *
   // *************************************************************************
   public function __construct($Arti,$apdo) 
   {
      $this->Arti=$Arti;
      $this->apdo=$apdo;
   }
   public function __destruct() 
   {
   }
   // *************************************************************************
   // *                    Выполнить действия в фазе "HEAD"                   *
   // *************************************************************************
   public function Head() 
   {
      echo '<link rel="stylesheet" type="text/css" href="Styles/ZhizniPuti.css">';
      // По умолчанию отключаем разворачивание аккордеона
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
   // *                     Выполнить действия в фазе "BODY"                  *
   // *************************************************************************
   public function Body() 
   {
      MakeMyLifeMenu($this->apdo);
   }
}

// ----------------------------------------------------- ФУНКЦИИ ВНЕ КЛАССА ---

// ****************************************************************************
// *             Подготовить и развернуть меню "Жизнь и путешествия"          *
// ****************************************************************************
function MakeMyLifeMenu($pdo) 
{
   // Готовим параметры и вырисовываем меню
   $lvl=-1; $cLast='+++';
   $nLine=0; $cli=""; 
   // Параметр $otlada при необходимости используется для просмотра в коде
   // страницы вложенности тегов и вызова рекурсий 
   $otlada=false;
   ShowMyLife($pdo,1,1,$cLast,$nLine,$cli,$lvl,$otlada);
   unset($pdo);          
}
// ****************************************************************************
// *                       Рекурсивно сгенерировать пункты меню               *
// ****************************************************************************
function ShowMyLife($pdo,$ParentID,$PidIn,&$cLast,&$nLine,&$cli,&$lvl,$otlada,$FirstUl=' class="accordion"')
{
   // Определяем текущий уровень меню
   $lvl++; 
   // Выбираем все записи одного родителя
   $cSQL="SELECT uid,NameArt,Translit,pid,IdCue,DateArt FROM stockpw WHERE pid=".$ParentID." ORDER BY uid";
   $stmt = $pdo->query($cSQL);
   $table = $stmt->fetchAll();

   if (count($table)>0) 
   {
      // Выводим <ul>. Перед ним </li> не выводим.
      echo(SpacesOnLevel($lvl,$cLast,0,0,$otlada).'<ul'.$FirstUl.'>'."\n"); $cLast='+ul';
      // Перебираем все записи родителя, подсчитываем количество, формируем пункты меню
      $nPoint=0;
      foreach ($table as $row)
      {
         $nLine++; $cLine=''; 
         if ($otlada) $cLine=$cLine.' ='.$nLine.'=';
         $Uid=$row["uid"]; $Pid=$row["pid"]; $Translit=$row["Translit"];
         $IdCue=$row["IdCue"]; $DateArt=$row["DateArt"]; 
         if ($cLast<>'+ul') 
         {
             $cli=SpacesOnLevel($lvl,$cLast,$Uid,$Pid,$otlada)."</li>\n";
             echo($cli); $cLast='-li';
         }
         // Выводим li и href для раздела (IdCue=-1)
         if ($IdCue==-1)
         {
            echo(SpacesOnLevel($lvl,$cLast,$Uid,$Pid,$otlada).'<li id="'.$Translit.'" class="'.$Translit.'"> '); 
            echo('<a href="#'.$Translit.'">'.$Uid.' '.getIconCue($Translit).' '.$row['NameArt'].$cLine.CountPoint($pdo,$Uid).'</a>'."\n"); 
         } 
         // Выводим li и href для статьи
         else
         {
            $nPoint++;
            echo(SpacesOnLevel($lvl,$cLast,$Uid,$Pid,$otlada)."<li> ");
            echo('<a href="?arti='.$Translit.'">'.'<em>'.$Uid.'</em>'.$row['NameArt'].$cLine.'<span>'.$DateArt.'</span>'.'</a>'."\n"); 
         }
         $cLast='+li';
         ShowMyLife($pdo,$Uid,$Pid,$cLast,$nLine,$cli,$lvl,$otlada,' class="sub-menu"'); 
         $lvl--; 
      }
      $cli=SpacesOnLevel($lvl,$cLast,0,0,$otlada)."</li>\n";
      echo($cli); $cLast='-li'; 
      echo(SpacesOnLevel($lvl,$cLast,0,0,$otlada)."</ul>\n");  $cLast='-ul';
   }
}
// ****************************************************************************
// *       Обеспечить иммитацию пробелов смещения строк меню при отладке      *
// ****************************************************************************
function SpacesOnLevel($lvl,$cLast,$Uid,$Pid,$otlada)
{
   $i=1; $c=''; $c=cUidPid($Uid,$Pid,$cLast); 
   while ($i<=$lvl)
   {
      $c=$c.'...';
      $i++;
   }
   if ($otlada==false) $c='';
   return $c;
}
// ****************************************************************************
// *              Обеспечить смещение строк меню при отладке                  *
// ****************************************************************************
function cUidPid($Uid,$Pid,$cLast)
{
   $c='<!-- '.$cLast.' '.(1000+$Uid).'-'.(1000+$Pid).' --> ';
   return $c;
}

// **************************************************** ZhizniPutiClass.php ***
