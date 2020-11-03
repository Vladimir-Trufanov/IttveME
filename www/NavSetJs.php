<?php
// PHP7/HTML5, EDGE/CHROME                                   *** NavSet.php ***

// ****************************************************************************
// * ittve.me                             Отработать меню в подвале документа *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  27.01.2019
// Copyright © 2019 tve                              Посл.изменение: 27.01.2019

/**
Copyright (c) 2017 by Oliver Knoblich (https://codepen.io/oknoblich/pen/hpltK)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
?>
<!--
Copyright (c) 2017 by Oliver Knoblich (https://codepen.io/oknoblich/pen/hpltK)
-->
<div class='navset'>
   <div class='link'>
      <div class='prev'>&#xf01c;</div>
      <div class='small' onclick="paTiny()">&#xf01c;</div>
      <div class='full'  onclick="paTiny()">
         <div class='k1'>Inbox</div>
         <div class='k2'>Отправить сообщение автору</div>
      </div>
   </div>
   
   <div class='link'>
      <div class='prev'>&#xf013;</div>
      <div class='small' onclick="paNastr()">&#xf013;</div>
      <div class='full'  onclick="paNastr()">
         <div class='k1'>Tuning</div>
         <div class='k2'>Изменить настройки сайта в браузере</div>
      </div>
   </div>

   <div class='link'>
      <div class='prev'>&#xf007;</div>
      <div class='small' onclick="paTiny()">&#xf007;</div>
      <div class='full'  onclick="paTiny()">
         <div class='k1'>Signup</div>
         <div class='k2'>Зарегистрироваться</div>
      </div>
   </div>

   <div class='link'>
      <div class='prev'>&#xf044;</div>
      <div class='small' onclick="paTiny()">&#xf044;</div>
      <div class='full'  onclick="paTiny()">
         <div class='k1'>Edit</div>
         <div class='k2'>Создать, редактировать материал</div>
      </div>
   </div>
</div>
<?php
// ************************************************************* NavSet.php ***
