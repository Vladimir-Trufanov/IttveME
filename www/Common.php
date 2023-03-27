<?php                                           
// PHP7/HTML5, EDGE/CHROME                                   *** Common.php ***

// ****************************************************************************
// * ittve.me                                        Блок общих функций сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  05.03.2019
// Copyright © 2019 tve                              Посл.изменение: 03.12.2022

// ****************************************************************************
// *               Определить что работает двухколоночный режим, но           *
// *                     показываются не новости и статья                     *
// ****************************************************************************
function isProchieRegimy()
{
   $Result=false;
   if ((prown\isComRequest(mmlZhiznIputeshestviya))||
      (prown\isComRequest(mmlOtpravitAvtoruSoobshchenie))||
      (prown\isComRequest(mmlIzmenitNastrojkiSajta))||
      (prown\isComRequest(mmlVojtiZaregistrirovatsya))||
      (prown\isComRequest(mmlSozdatRedaktirovat)))
   $Result=true;
   return $Result;
}
// ****************************************************************************
// *                 Определить что работает двухколоночный режим и           *
// *                       новости должны просматриваться                     *
// ****************************************************************************
function isChistoNewsDouble($c_PresMode)
{
   $Result=true;
   if (($c_PresMode==rpmDoubleRight)||($c_PresMode==rpmDoubleLeft))
   {
      if (isProchieRegimy()) $Result=false;
   }
   else $Result=false;
   return $Result;
}
// ****************************************************************************
// *                 Определить что работает двухколоночный режим и           *
// *                        новости должны быть свернуты                      *
// ****************************************************************************
function isNoNewsDouble($c_PresMode)
{
   $Result=false;
   if (($c_PresMode==rpmDoubleRight)||($c_PresMode==rpmDoubleLeft))
   {
      if (isProchieRegimy()) $Result=true;
   }
   return $Result;
}
// ****************************************************************************
// *                       Определить работаем ли на сайте                    *
// ****************************************************************************
function isIttveme()
{
   $Result=false;
   if ($_SERVER['HTTP_HOST']=='ittve.me') $Result=true;
   return $Result;
}
// ****************************************************************************
// *                      Определить работаем ли на хостинге                  *
// ****************************************************************************
function isNichost()
{ 
   $Result=false;
   if (
     ($_SERVER['HTTP_HOST']=='ittve.me')||
     ($_SERVER['HTTP_HOST']=='www.ittve.me')||
     ($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
   {
      $Result=true;
   }
   return $Result;
}
// ****************************************************************************
// *      Настроить размеры шрифтов и полосок меню (рождественская версия)    *
// ****************************************************************************
/*
function IniFontChristmas()
{
   echo '
   <style>
   .accordion li > a, 
   .accordion li > i 
   {
      font:bold .9rem/1.8rem Arial, sans-serif;
      padding:0 1rem 0 1rem;
      height:2rem;
   }
   .accordion li > a span, 
   .accordion li > i span 
   {
      font:normal bold .8rem/1.2rem Arial, sans-serif;
      top:.4rem;
      right:0;
      padding:0 .6rem;
      margin-right:.6rem;
   }
   </style>
   ';
}
*/

// ****************************************************************************
// *             Построить html-код меню и сделать выбор материала            *
// ****************************************************************************
function UniArtMenu($pdo,$clickGru='',$clickOne='') 
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
   _UniArtMenu($clickGru,$clickOne,$pdo,1,1,$cLast,$nLine,$cli,$lvl);
}
// ****************************************************************************
// *       Сформировать строки меню для выборки записи для редактирования:    *
// *                    $cli - вставка конца пункта меню                      *            
// ****************************************************************************
/*
<ul class="accordion">
   <li class="uCue"><i onclick="getNameCue(2)"><em>2</em>Моя жизнь</i>
      <ul class="sub-menu">
         <li class="uArt"><b><em>3</em>Особенности устройства винтиков в моей голове</b></li>
      </ul>
   </li>
   <li class="uCue"><i onclick="getNameCue(4)"><em>4</em>Микропутешествия</i>
      <ul class="sub-menu">
         <li class="uArt"><b><em>5</em>Киндасово - земля карельского юмора</b></li>
         <li class="uArt"><b><em>6</em>Гора Сампо. Озеро, светлый лес, тропинка в небо</b></li>
      </ul>
   </li>
   <li class="uCue"><i onclick="getNameCue(13)"><em>13</em>Всякое-разное</i></li>
   <li class="uCue"><i onclick="getNameCue(16)"><em>16</em>Прогулки</i>
      <ul class="sub-menu">
         <li class="uArt"><b><em>17</em>Охота на медведя</b></li>
      </ul>
   </li>
</ul>
*/
function _UniArtMenu($clickGru,$clickOne,
   $pdo,$ParentID,$PidIn,&$cLast,&$nLine,&$cli,&$lvl,$FirstUl=' class="accordion"')
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
         $nLine++; 
         $Uid=$row["uid"]; $Pid=$row["pid"]; $Translit=$row["Translit"];
         $IdCue=$row["IdCue"]; $DateArt=$row["DateArt"]; 
         if ($cLast<>'+ul') 
         {
             $cli="</li>\n";
             echo($cli); $cLast='-li';
         }
         // Готовим onclick li группы материалов или собственно материала
         $grClick=HandleСlick($clickGru,$Uid);
         $maClick=HandleСlick($clickOne,$Uid);
         // Формируем li группы материалов
         if ($IdCue==-1)
         {
            echo('<li class="uCue">'); 
            echo('<i'.$grClick.'>'.'<em>'.$Uid.'</em>'.$row['NameArt']."</i>"); 
         } 
         // Формируем li материала
         else
         {
            $nPoint++;
            echo('<li class="uArt">'); 
            echo('<b'.$maClick.'>'.'<em>'.$Uid.'</em>'.$row['NameArt']."</b>"); 
         }
         $cLast='+li';
         _UniArtMenu($clickGru,$clickOne,
            $pdo,$Uid,$Pid,$cLast,$nLine,$cli,$lvl,' class="sub-menu"'); 
         $lvl--; 
      }
      $cli="</li>\n";
      echo($cli); $cLast='-li'; 
      echo("</ul>\n");  $cLast='-ul';
   }
}
// Сформировать onclick на разделе или статье
function HandleСlick($clickIs,$Uid)
{
   if ($clickIs=='') $Result='';
   else $Result=' onclick="'.$clickIs.'('.$Uid.')"';
   return $Result;
}


// ************************************************************* Common.php *** 
