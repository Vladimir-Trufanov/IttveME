<?php 

// Подключаем коннект к БД
//require_once 'db.php';


$error='Ok';
// Проверяем нажата ли кнопка отправки формы
if (isset($_REQUEST['doGo'])) 
{
   // Все последующие проверки, проверяют форму и выводят ошибку
   // Проверка на совпадение паролей
   if ($_REQUEST['pass'] !== $_REQUEST['pass_rep']) 
   {
      $error = 'Пароль не совпадает';
   }
   // Проверка есть ли вообще повторный пароль
   else if (!$_REQUEST['pass_rep']) 
   {
      $error = 'Введите повторный пароль';
   }
   // Проверка есть ли пароль
   else if (!$_REQUEST['pass']) 
   {
      $error = 'Введите пароль';
   }
   // Проверка есть ли email
   else if (!$_REQUEST['email']) 
   {
      $error = 'Введите email';
   }
   // Проверка есть ли логин
   else if (!$_REQUEST['login']) 
   {
      $error = 'Введите login';
   }
   // Если ошибок нет, то происходит регистрация 
   if ($error=='Ok') 
   {
      $login = $_REQUEST['login'];
      $email = $_REQUEST['email'];
      // Пароль хешируется
      $pass = password_hash($_REQUEST['pass'],PASSWORD_DEFAULT);
      // хешируем хеш, который состоит из логина и времени
      $hash = md5($login.time());
      
      echo 'Проверки выполнены! Отправляем письмо.<br>';

      // Для отправки HTML-письма устанавливаем заголовки
      $headers  = 'MIME-Version:1.0'."\r\n";
      $headers .= 'Content-type:text/html;charset=utf-8'."\r\n";
      //$headers .= "To: <$email>\r\n";
      //$headers .= "From: <tve58@inbox.ru>\r\n";
      // Тема письма
      $subject = "Подтвердите Email для сайта ittve.me";
      // Текст письма
      $message = '
         <html>
         <head>
            <title>Подтвердите Email</title>
         </head>
         <body>
            <p>Что бы подтвердить Email, перейдите по <a href="'.$this->urlHome.'?hash='.$hash.'">ссылке на ittve.me</a></p>
         </body>
         </html>
      ';
      
      // Отправляем
      $err=mail($email,$subject,$message,$headers);
      if ($err) echo 'Письмо ушло!<br>';
      else echo 'Ошибка при отправке письма<br>';
      
      /*  
      // <p>Что бы подтвердить Email, перейдите по <a href="http://example.com/confirmed.php?hash='.$hash.'">ссылке на ittve.me</a></p>
      // Добавление пользователя в БД
      // mysqli_query($db, "INSERT INTO `user` (`login`, `email`, `password`, `hash`, `email_confirmed`) VALUES ('" . $login . "','" . $email . "','" . $pass . "', '" . $hash . "', 1)");
      */
   } 
   else 
   {
      // Если ошибка есть, то выводить её 
      echo $error; 
   }
}

echo 'Заполняем форму ввода сведений!<br>';

echo '<form method="get" action="'.$this->urlHome.'">';
?> 
        <p><input type="hidden"   name="Com" value="vojti-ili-zaregistrirovatsya"></p>
        <p>Логин: <input type="text" name="login"> <samp style="color:red">*</samp></p>
        <p>EMail: <input type="email" name="email"><samp style="color:red">*</samp></p>
        <p>Пароль: <input type="password" name="pass"><samp style="color:red">*</samp></p>
        
        <p>Повторите пароль: 
           <input type="password" name="pass_rep">  <samp style="color:red">*</samp></p>
        <p><input type="submit"   name="doGo" value="Зарегистрироваться"></p>
<?php
echo '</form>';

