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
// ************************************************************* Common.php *** 
