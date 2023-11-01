<?php                                
// PHP7/HTML5, EDGE/CHROME                                 *** Proverit.php ***

// ****************************************************************************
// * ittve.me                        Проверить пароль и email по базе данных, *
// *      принять решение: "Пропустить на сайт, как гостя", "Заменить пароль" *
// *                                                 или "Зарегистрироваться" * 
// *                                                                          *
// * v1.0, 31.10.2023                               Автор:      Труфанов В.Е. *
// * Copyright © 2023 tve                           Дата создания: 25.09.2023 *
// ****************************************************************************

/*
// -------------------------------------- Результат проверки email и пароля ---
define ('tstEmailNeNajdenen',            'Адрес электронной почты не зарегистрирован'); 
define ('tstParolNevernyj',              'Пароль неверный');                   

$epassTest=tstEmailPassword();

echo '<div id="EntryClass">';
if ($epassTest==tstEmailNeNajdenen) 
{
   echo 'Адрес электронной почты не зарегистрирован,<br>';
   echo 'что будем делать?';
}
else if ($epassTest==tstParolNevernyj) 
{
   echo 'Пароль неверный, замените его<br>';
   echo 'или пройдите на сайт, как гость';
}
else
{
   echo 'gfggfhhjjkdkl<br>';
   echo 'gfggfhhjjkdkl';
}
*/

echo '<div id="EntryClass">';
echo '<span id="Messa"> <br> </span>';
ManyLines(2);
echo '<span id="GrayInput"> </span>';
ManyLines(6);

echo '<form id="EntryForm" method="get" action="'.$this->urlHome.'">';
?>
<!--
-->
<?php 
echo '<input type="hidden"   name="Com" value="vojti">';
echo '<input type="hidden"   name="enMode" value="'.entProverit.'">';
?>
<fieldset id="submit-field">
   <legend></legend>
   <div>
      <input type="submit" name="submit" id="submit" value=" "/>
   </div>
</fieldset>
<?php 
echo '</form>';
echo '</div>';
?>
<footer>
   По мотивам <a href="https://codepen.io/jkantner">Jon Kantner</a>
</footer>
<?php
 
echo '
   <div id="screpa">
      <input id="toggle" type="checkbox">
      <label id="lbltoggle" class="switch pristine" for="toggle">
	      <div class="handle">
         </div>
      </label>
   </div>
';


// ****************************************************************************
// *                          Вывести в див пустые строки                     *
// ****************************************************************************
function ManyLines($nLine)
{
   for ($i = 1; $i <= $nLine; $i++) 
   {
      echo '<br>';
   }
}
/*
// ****************************************************************************
// *                 Проверить пароль и email по базе данных                  *
// ****************************************************************************
function tstEmailPassword()
{
   $Result=tstEmailNeNajdenen;
   return $Result;
}
*/

// *********************************************************** Proverit.php ***

                                                      
