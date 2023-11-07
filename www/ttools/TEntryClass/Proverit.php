<?php                                
// PHP7/HTML5, EDGE/CHROME                                 *** Proverit.php ***

// ****************************************************************************
// * ittve.me                        Проверить пароль и email по базе данных, *
// *      принять решение: "Пропустить на сайт, как гостя", "Заменить пароль" *
// *                                                 или "Зарегистрироваться" * 
// *                                                                          *
// * v1.1, 04.11.2023                               Автор:      Труфанов В.Е. *
// * Copyright © 2023 tve                           Дата создания: 25.09.2023 *
// ****************************************************************************

// Выбираем email и пароль из параметров URL
$email=htmlspecialchars($_GET["email"]);
$passi=htmlspecialchars($_GET["password"]);
// Строим разметку страницы для проверки пароля и email по базе данных и
// принятия решения: "Пропустить на сайт, как гостя", "Заменить пароль" 
// или "Зарегистрироваться" 
echo '<div id="EntryClass">';
echo '<span id="Messa"> <br> </span>';
ManyLines(2);
ManyLines(6);
echo '<span id="GrayInput" title = "Неактивное действие"> </span>';
echo '<form id="EntryForm" method="get" action="'.$this->urlHome.'">';
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
//Выполняем разметку скрепки переключения 
echo '
   <div id="screpa">
      <input id="toggle" type="checkbox">
      <label id="lbltoggle" class="switch pristine" for="toggle" 
         title = "Нажмите для смены активного действия на кнопке">
	      <div class="handle">
         </div>
      </label>
   </div>
';
// Выполняем обработку страницы js-скриптами:
// проверяем пароль и email по базе данных
?>
<script>
   $(document).ready(function()
   {
      var email = "<?php echo $email; ?>";
      var passi = "<?php echo $passi; ?>";
      Proverit(email,passi);
   })
</script>
<?php
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

// *********************************************************** Proverit.php ***
                                                      
