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
      $pass = password_hash($_REQUEST['pass'], PASSWORD_DEFAULT);
      // хешируем хеш, который состоит из логина и времени
      $hash = md5($login . time());
      
      echo 'Расчеты сделаны!<br>';
      /*  
      // Переменная $headers нужна для Email заголовка
      $headers  = "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/html; charset=utf-8\r\n";
      $headers .= "To: <$email>\r\n";
      $headers .= "From: <mail@example.com>\r\n";
      // Сообщение для Email
      $message = '
         <html>
         <head>
            <title>Подтвердите Email</title>
         </head>
         <body>
            <p>Что бы подтвердить Email, перейдите по <a href="http://example.com/confirmed.php?hash=' . $hash . '">ссылка</a></p>
         </body>
         </html>
      ';
        
      // Добавление пользователя в БД
      // mysqli_query($db, "INSERT INTO `user` (`login`, `email`, `password`, `hash`, `email_confirmed`) VALUES ('" . $login . "','" . $email . "','" . $pass . "', '" . $hash . "', 1)");
      
      // проверяет отправилась ли почта
      if (mail($email, "Подтвердите Email на сайте", $message, $headers)) 
      {
         // Если да, то выводит сообщение
         echo 'Подтвердите на почте';
      }
      */
   } 
   else 
   {
      // Если ошибка есть, то выводить её 
      echo $error; 
   }
}

echo 'Отправляем письмо.<br>';
//echo '<form class="frmTuning" method="get" name="TuningFrm" action="'.$this->urlHome.'">';
echo '<form method="get" action="'.$this->urlHome.'">';

?> 
<!-- 
        <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="get">
        <p>Логин: <input type="text" name="login"> <samp style="color:red">*</samp></p>
        <p>EMail: <input type="email" name="email"><samp style="color:red">*</samp></p>
        <p>Пароль: <input type="password" name="pass"><samp style="color:red">*</samp></p>
-->
        <p>Логин: <input type="text" name="login"> <samp style="color:red">*</samp></p>
        <p>EMail: <input type="email" name="email"><samp style="color:red">*</samp></p>
        <p>Пароль: <input type="password" name="pass"><samp style="color:red">*</samp></p>
        
        <p>Повторите пароль: 
           <input type="password" name="pass_rep">  <samp style="color:red">*</samp></p>
        <p><input type="hidden"   name="Com" value="vojti-ili-zaregistrirovatsya"></p>
        <p><input type="submit"   name="doGo" value="Зарегистрироваться"></p>
    </form>

