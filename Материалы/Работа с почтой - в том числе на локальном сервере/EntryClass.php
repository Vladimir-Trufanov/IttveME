<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                               *** EntryClass.php ***

// ****************************************************************************
// * ittve.me                           Войти или зарегистрироваться на сайте * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  04.02.2018
// Copyright © 2018 tve                              Посл.изменение: 11.12.2022

class Entrying
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   
   public function __construct() //$game=NULL) 
   {
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
      
      //require_once "InteractiveSpooky.php"; 
      //require_once "EmailRegistration.php"; 
      
      echo 'Отправляем письмо.<br>';
      
      // 1 вариант отправки письма
      /*
      $message = "Электронное письмо\r\nНачальная строка\r\nФинальная строка";
      // На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
      $message = wordwrap($message, 70, "\r\n");
      // Отправляем
      mail('tve58@inbox.ru', 'My Subject', $message);
      */
      
      // 2 вариант отправки письма
      /*
      $to      = 'tve58@inbox.ru';
      $subject = 'the subject';
      $message = 'hello';
      $headers = 'From: webmaster@example.com' . "\r\n" .
         'Reply-To: webmaster@example.com' . "\r\n" .
         'X-Mailer: PHP/' . phpversion();
      mail($to, $subject, $message, $headers);
      */

      // echo 'Вроде ушло!<br>';
      
      // 3 вариант отправки письма (HTML-письмо)

      // несколько получателей
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
     
      
      
   }
}
// ********************************************************* EntryClass.php ***
