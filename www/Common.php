<?php                                           
// PHP7/HTML5, EDGE/CHROME                                   *** Common.php ***

// ****************************************************************************
// * ittve.me                                        Блок общих функций сайта *
// ****************************************************************************

// v1.4, 01.10.2023                                  Автор:       Труфанов В.Е. 
// Copyright © 2019 tve                              Дата создания:  05.03.2019 

// ****************************************************************************
// *       Проверить соответствие запроса разрешенной команде управления      *
// ****************************************************************************
// -------------------------------------------- Запросы для меню управления ---
define ('mmlVybratSledMaterial',         'vybrat-sleduyushchij-material');       // 1 из главной
define ('mmlVernutsyaPredState',         'vernutsya-k-predydushchej-state');     // 2 из главной
define ('mmlZhiznIputeshestviya',        'zhizn-i-puteshestviya');               // 3
define ('mmlVernutsyaNaGlavnuyu',        'vernutsya-na-glavnuyu-stranicu');      // 4

define ('mmlOtpravitAvtoruSoobshchenie', 'otpravit-avtoru-soobshchenie');        // 5 из главной
define ('mmlVojti',                      'vojti');                               // 6 из главной

define ('mmlIzmenitNastrojkiSajta',      'prochitat-o-sajte-izmenit-nastrojki'); // 7 из 3    
define ('mmlSozdatRedaktirovat',         'sozdat-material-ili-redaktirovat');    // 8 из 3
define ('mmlIzmenitNazvanieIkonku',      'izmenit-nazvanie-razdela-ili-ikonku'); // 9 из 3    

define ('mmlDobavitNovyjRazdel',         'dobavit-novyj-razdel-materialov');     // 10 из 9
define ('mmlUdalitRazdelMaterialov',     'udalit-razdel-materialov');            // 11 из 9
define ('mmlVybratStatyuRedakti',        'vybrat-statyu-dlya-redaktirovaniya');  // 12 из 9

define ('mmlNaznachitStatyu',            'naznachit-statyu');                    // 13 из 8
define ('mmlUdalitMaterial',             'udalit-material');                     // 14 из 8
define ('mmlRedaktiOpisanie',            'redaktirovat-opisanie-stati');         // 15 из 12
define ('mmlSohranitNovyjMaterial',      'sohranit-novyj-material');             // 16 из 12

// -- Значения параметра enMode URL-запросов для этапов ввода и регистрации ---
//                                        NULL                               //  Выполнить ввод email и пароля (зарегистрироваться)
define ('entProverit',                   'proverit');                        //  Проверить пароль и email 
define ('entPropustit',                  'propustit');                       //  Пропустить на сайт с новым паролем, или как гостя
define ('entZaregistrirovatsya',         'zaregistrirovatsya');              //  Ввести регистрационные данные перед проверкой почты
define ('entPodtverdit',                 'podtverdit');                      //  Подтвердить регистрацию, пропустить на сайт

/*
// ---------------------------------------- Результат проверки URI страницы ---
define ('xUriOk',      1);   // URI соответствует запросу для тестирования
define ('xUriNoslash', 2);   // в URI нет первого слэша
define ('xUriMain',    3);   // в URI только 1 слэш - выход на главную страницу
define ('xUriNo',      4);   // URI неправильный
define ('xUriReal',    5);   // URI является разрешенной командой

function testComRequest($mml) 
{
   $Result=xUriNo;
   // Определяем массив запросов для меню управления
   $aLeadRequest=[
      mmlVybratSledMaterial,mmlVernutsyaPredState,mmlZhiznIputeshestviya,mmlVernutsyaNaGlavnuyu,
      mmlOtpravitAvtoruSoobshchenie,mmlVojti,
      mmlIzmenitNastrojkiSajta,mmlSozdatRedaktirovat,mmlIzmenitNazvanieIkonku,
      mmlDobavitNovyjRazdel,mmlUdalitRazdelMaterialov,mmlVybratStatyuRedakti,
      mmlNaznachitStatyu,mmlUdalitMaterial]; 
   // Выбираем URI, который был предоставлен для доступа к этой странице; 
   // например, '/index.html' или '/zhizn-i-puteshestviya'.
   $inUri=$_SERVER["REQUEST_URI"];
   $slash=substr($inUri,0,1);
   if ($slash<>'/')
      $Result=xUriNoslash;
   else
   {
      // Выбираем все, что после слэша, может это соответствует запросу
      $xUri=substr($inUri,1);
      // Проверяем Uri на соответствие разрешенной команде
      foreach ($aLeadRequest as $val) 
      {
         if ($val==$xUri)
         {
            $Result=xUriReal;
            break;
         }
      }
      // Проверяем Uri на соответствие тесту
      if ($Result==xUriReal)
      {
         if ($xUri==$mml) $Result=xUriOk;
      }
   }
   return $Result;
}
*/
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
      (prown\isComRequest(mmlVojti))||
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
