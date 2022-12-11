<?php
// PHP7/HTML5, EDGE/CHROME                               *** MenuLeader.php ***

// ****************************************************************************
// * ittve.me                  Отработать меню управления в подвале документа *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  27.01.2019
// Copyright © 2019 tve                              Посл.изменение: 11.12.2022

// ****************************************************************************
// *                    Вывести кнопку меню управления страницей              *
// ****************************************************************************
function Punkt($Punkt,$cUniCod,$fString,$sString)
{
   echo '
      <li class="link">
      <span class="prev">'.$cUniCod.'</span>
      <span class="small">'.$cUniCod.'</span>
      <span class="full">
         <span class="k1"><a href="'.$Punkt.'">'.$fString.'</a></span>
         <span class="k2"><a href="'.$Punkt.'">'.$sString.'</a></span>
      </span>
   </li>
   ';
}
// Начинаем меню с отсылкой к автору идеи
echo '
   <!--
   Copyright (c) 2017 by Oliver Knoblich (https://codepen.io/oknoblich/pen/hpltK)
   -->
   <ul class="navset">
';
// Выводим пункты меню управления для страницы меню
if (prown\isComRequest(mmlZhiznIputeshestviya))
{
   Punkt($urlHome,'&#xf015;','Вернуться','на главную страницу');
   Punkt($cPref.mmlDobavitNovyjRazdel,'&#xf0f2;','Добавить новый','раздел материалов');
   Punkt($cPref.mmlIzmenitNazvanieIkonku,'&#xf086;','Изменить название','раздела или иконку');
   Punkt($cPref.mmlUdalitRazdelMaterialov,'&#xf1f8;','Удалить раздел','материалов');
}
// Выводим пункты меню для страницы изменения настроек сайта
else if (prown\isComRequest(mmlIzmenitNastrojkiSajta))
{
   Punkt($urlHome,'&#xf015;','Вернуться','на главную страницу');
   Punkt($cPref.mmlOtpravitAvtoruSoobshchenie,'&#xf01c;','Отправить автору','сообщение');
   Punkt($cPref.mmlVojtiZaregistrirovatsya,'&#xf007;','Войти или','зарегистрироваться');
   Punkt($cPref.mmlSozdatRedaktirovat,'&#xf044;','Создать материал','или редактировать');
}
// Выводим пункты меню страницы для входа и регистрации
else if (prown\isComRequest(mmlVojtiZaregistrirovatsya))
{
   Punkt($urlHome,'&#xf015;','Вернуться','на главную страницу');
   Punkt($cPref.mmlOtpravitAvtoruSoobshchenie,'&#xf01c;','Отправить автору','сообщение');
   Punkt($cPref.mmlIzmenitNastrojkiSajta,'&#xf013;','Изменить настройки','сайта в браузере');
   Punkt($cPref.mmlSozdatRedaktirovat,'&#xf044;','Создать материал','или редактировать');
}
// Выводим пункты меню главной страницы
else
{
   Punkt($cPref.mmlOtpravitAvtoruSoobshchenie,'&#xf01c;','Отправить автору','сообщение');
   Punkt($cPref.mmlIzmenitNastrojkiSajta,'&#xf013;','Изменить настройки','сайта в браузере');
   Punkt($cPref.mmlVojtiZaregistrirovatsya,'&#xf007;','Войти или','зарегистрироваться');
   Punkt($cPref.mmlSozdatRedaktirovat,'&#xf044;','Создать материал','или редактировать');
}
// Закрываем меню
echo '</ul>';

// ********************************************************* MenuLeader.php ***
