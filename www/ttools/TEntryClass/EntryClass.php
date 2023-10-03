<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                               *** EntryClass.php ***

// ****************************************************************************
// * ittve.me                           Войти или зарегистрироваться на сайте * 
// ****************************************************************************


// v1.1, 03.10.2023                                  Автор:       Труфанов В.Е. 
// Copyright © 2019 tve                              Дата создания:  05.03.2019 

class Entrying
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $urlHome;          // начальная страница сайта 
   protected $basename;         // База материалов: $_SERVER['DOCUMENT_ROOT'].'/itpw';
   protected $username;         // Логин для доступа к базе данных
   protected $password;         // Пароль
   
   public function __construct($urlHome,$basename,$username,$password) 
   {
      $this->urlHome=$urlHome;
      $this->basename=$basename;
      $this->username=$username;
      $this->password=$password;
   }
   public function __destruct() 
   {
   }
   public function Head() 
   {
      ?>
      <link rel="stylesheet" href="ttools/TEntryClass/InteractiveSpooky.css">
      <?php
           
      echo'  
         <style>
         @font-face 
         {
            font-family: Pacifico; 
            src: url(ttools/TTuningClass/Pacifico-Regular.ttf); 
         }
         </style>
      ';
   }
   public function Body() 
   {
      require_once "InteractiveSpooky.php"; 
      require_once "EntryTable.php"; 
      // При необходимости создаём таблицу пользователей ittve.me в базе данных 
      $pdo=_BaseConnect($this->basename,$this->username,$this->password);
      CreateMeUsers($pdo,'-');

      //require_once "EmailRegistration.php"; 
      
      /*
      // Вариант отправки HTML-письма для несколько получателей
      echo 'Отправляем письмо.<br>';
      $to  = 'tve58@inbox.ru' . ', '; // обратите внимание на запятую
      $to .= 'tve@karelia.ru';
      // тема письма
      $subject = 'Здесь тема письма: Напоминания о днях рождениях';
      // текст письма
      $message = '
      <html>
      <head>
         <title>Напоминания о днях рождениях</title>
      </head>
      <body>
         <p>Напоминания о днях рождениях</p>
         <table>
         <tr>
            <th>Кто</th><th>День</th><th>Месяц</th><th>Год</th>
         </tr>
         <tr>
            <td>Таня</td><td>1-го</td><td>января</td><td>1958</td>
         </tr>
         <tr>
            <td>Лена</td><td>15-го</td><td>января</td><td>1981</td>
         </tr>
         <tr>
            <td>Ксюша</td><td>20-го</td><td>января</td><td>1991</td>
         </tr>
         </table>
      </body>
      </html>
      ';
      // Для отправки HTML-письма должен быть установлен заголовок Content-type
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
      // Дополнительные заголовки
      // $headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
      $headers .= 'From: Дни Рождения <birthday@example.com>' . "\r\n";
      //$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
      //$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
      
      // Отправляем
      $err=mail($to, $subject, $message, $headers);
      if ($err) echo 'Письмо ушло!';
      else echo 'Ошибка при отправке письма';
      */
   }
}
// ********************************************************* EntryClass.php ***
