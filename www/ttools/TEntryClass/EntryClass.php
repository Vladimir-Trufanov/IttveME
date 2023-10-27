<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                               *** EntryClass.php ***

// ****************************************************************************
// * ittve.me                           Войти или зарегистрироваться на сайте * 
// ****************************************************************************
// *                                                                          *
// * v2.0, 06.10.2023                              Автор:       Труфанов В.Е. *
// * Copyright © 2022 tve                          Дата создания:  01.10.2022 *
// ****************************************************************************

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
      
      if (\prown\isComRequest(entProverit,'enMode')) 
      {
         ?>
         <link rel="stylesheet" href="ttools/TEntryClass/LoginScreen.css">
         <script src="ttools/TEntryClass/LoginScreen.js"></script>
         <?php
      }
   }
   
   // *************************************************************************
   // *             Выполнить этапы по вводу и регистрации на сайте           * 
   // *************************************************************************
   public function Body() 
   { 
      $enMode=\prown\getComRequest('enMode');
      // Если поступила команда на вход в систему по email и паролю, 
      // то принимаем и обрабатываем ввод пароля и email
      if ($enMode==NULL) $this->enMode_NULL(); 
      // Проверяем пароль и email при поступлении их на сервер 
      else if (\prown\isComRequest(entProverit,'enMode')) $this->enMode_entProverit(); 
      // Пропускаем пользователя на сайт с новым паролем, или как гостя 
      else if (\prown\isComRequest(entPropustit,'enMode')) $this->enMode_entPropustit(); 
      // Вводим регистрационные данные перед проверкой почты 
      else if (\prown\isComRequest(entZaregistrirovatsya,'enMode')) $this->enMode_entZaregistrirovatsya(); 
      // Подтверждаем регистрацию, пропускаем на сайт с заданным паролем
      else if (\prown\isComRequest(entPodtverdit,'enMode')) $this->enMode_entPodtverdit(); 
      // Внутренняя ошибка
      else echo('Ошибка Entrying->Body 2023-10-06');
      
      /*
      require_once "InteractiveSpooky.php"; 
      require_once "EntryTable.php"; 
      // При необходимости создаём таблицу пользователей ittve.me в базе данных 
      $pdo=_BaseConnect($this->basename,$this->username,$this->password);
      CreateMeUsers($pdo,'-');
      */
      
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
   // ---------------------------------------------- ВНУТРЕННИЕ body-МЕТОДЫ ---
   
   // *************************************************************************
   // *           Выполнить ввод email и пароля (зарегистрироваться)          * 
   // *************************************************************************
   private function enMode_NULL() 
   {
      require_once "InteractiveSpooky.php"; 
      //require_once "i2.php"; 
   } 
   // *************************************************************************
   // *         Проверить пароль и email при поступлении их на сервер         * 
   // *************************************************************************
   private function enMode_entProverit() 
   {
      echo '*** enMode_entProverit='.entProverit.'***<br>';
      require_once "LoginScreen.php"; 
   } 
   // *************************************************************************
   // *     Пропустить пользователя на сайт с новым паролем, или как гостя    * 
   // *************************************************************************
   private function enMode_entPropustit() 
   {
      echo '*** enMode_entPropustit ***<br>';
   }
   // *************************************************************************
   // *           Ввести регистрационные данные перед проверкой почты         * 
   // *************************************************************************
   private function enMode_entZaregistrirovatsya() 
   {
      echo '*** enMode_entZaregistrirovatsya ***<br>';
   }
   // *************************************************************************
   // *     Подтвердить регистрацию, пропустить на сайт с заданным паролем    * 
   // *************************************************************************
   private function enMode_entPodtverdit() 
   {
      echo '*** enMode_entPodtverdit ***<br>';
   }
}
// ********************************************************* EntryClass.php ***
