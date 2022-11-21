<?php
// PHP7/HTML5, EDGE/CHROME                               *** MenuLeader.php ***

// ****************************************************************************
// * ittve.me                  Отработать меню управления в подвале документа *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  27.01.2019
// Copyright © 2019 tve                              Посл.изменение: 18.11.2022

/**
Copyright (c) 2017 by Oliver Knoblich (https://codepen.io/oknoblich/pen/hpltK)
Permission is hereby granted, free of charge, to any person obtaining a copy 
of this software and associated documentation files (the "Software"), to deal 
in the Software without restriction, including without limitation the rights 
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell 
copies of the Software, and to permit persons to whom the Software is furnished 
to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all 
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR 
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, 
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE 
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER 
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, 
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS 
IN THE SOFTWARE.
*/

?>
<!--
Copyright (c) 2017 by Oliver Knoblich (https://codepen.io/oknoblich/pen/hpltK)
-->

<ul class='navset'>
   <li class='link'>
      <span class='prev'> &#xf01c; </span>
      <span class='small'> &#xf01c; </span>
      <span class='full'>
         <span class='k1'><a href= "<?php echo $cPref.mmlOtpravitAvtoruSoobshchenie; ?>">Отправить автору</a></span>
         <span class='k2'><a href= "<?php echo $cPref.mmlOtpravitAvtoruSoobshchenie; ?>">сообщение</a></span>
      </span>
   </li>     
   <li class='link'>
      <span class='prev'>&#xf013;</span>
      <span class='small'>&#xf013;</span>
      <span class='full'>
         <span class='k1'><a href= "<?php echo $cPref.mmlIzmenitNastrojkiSajta; ?>">Изменить настройки</a></span>
         <span class='k2'><a href= "<?php echo $cPref.mmlIzmenitNastrojkiSajta; ?>">сайта в браузере</a></span>
      </span>
   </li>
   <li class='link'>
      <span class='prev'>&#xf007;</span>
      <span class='small'>&#xf007;</span>
      <span class='full'>
         <span class='k1'><a href= "<?php echo $cPref.mmlVojtiZaregistrirovatsya; ?>">Войти или</a></span>
         <span class='k2'><a href= "<?php echo $cPref.mmlVojtiZaregistrirovatsya; ?>">зарегистрироваться</a></span>
      </span>
   </li>
   <li class='link'>
      <span class='prev'>&#xf044;</span>
      <span class='small'>&#xf044;</span>
      <span class='full'>
         <span class='k1'><a href= "<?php echo $cPref.mmlSozdatRedaktirovat; ?>">Создать материал</a></span>
         <span class='k2'><a href= "<?php echo $cPref.mmlSozdatRedaktirovat; ?>">или редактировать</a></span>
      </span>
   </li>
</ul>

<?php
// ********************************************************* MenuLeader.php ***
