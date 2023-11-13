<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                               *** EntryClass.php ***

// ****************************************************************************
// * ittve.me                           Войти или зарегистрироваться на сайте * 
// ****************************************************************************
// *                                                                          *
// * v2.1, 30.10.2023                              Автор:       Труфанов В.Е. *
// * Copyright © 2022 tve                          Дата создания:  01.10.2022 *
// ****************************************************************************

class Entrying
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $urlHome;          // начальная страница сайта 
   protected $basename;         // База материалов: $_SERVER['DOCUMENT_ROOT'].'/itpw';
   protected $username;         // Логин для доступа к базе данных
   protected $password;         // Пароль
   
   public function __construct($urlHome,$basename,$username,$password,$note) 
   {
      $this->urlHome=$urlHome;
      $this->basename=$basename;
      $this->username=$username;
      $this->password=$password;
      $this->note= $note; 
      // Проверяем, нужно ли заменить файл проверки пароля через аякс в 
      // корневом каталоге и (при его отсутствии, при несовпадении размеров или
      // старой дате) загружаем из класса 
      CompareCopyRoot('CtrlEmailPass.php','ttools/TEntryClass/');
      // При необходимости создаём таблицу пользователей ittve.me в базе данных 
      //$pdo=_BaseConnect($this->basename,$this->username,$this->password);
      //CreateMeUsers($pdo,'-');
   }
   public function __destruct() 
   {
   }
   public function Head() 
   {
      ?>
      <link rel="stylesheet" href="ttools/TEntryClass/EntryClass.css">
      <script src="ttools/TEntryClass/EntryClass.js"></script>
      
      
      
      
      
 
<style>  
    input[type=checkbox] 
    {  
        display: none;  
    }  
      
    input[type=checkbox]/*+label:before*/ 
    {  
        font-family: FontAwesome;  
        display: inline-block;  
    }  
    .checkbox1 input[type=checkbox]+label:before 
    {  
        content: "\f21b";  
        color:red; 
    }  
    .checkbox1 input[type=checkbox]:checked+label:before 
    {  
        content: "\f06e";
        color:green; 
    } 
    #checklbl
    {
       color:green; 
    } 
</style>  
      
      
      
      
      
      
      
      
      
      
      
      
      
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
      
      if (\prown\isComRequest(entZamenit,'enMode')) 
      {
         ?>
         <link rel="stylesheet" href="ttools/TEntryClass/LoginScreen.css">
         <?php
      }
      // При поступлении команды 'Пропустить на сайт, как гостя' 
      // готовим кукисы входа для гостя и перегружаем сайт
      if (\prown\isComRequest(entPropustit,'enMode')) 
      {
         ?>
         <script>
         $(document).ready(function()
         {
            setdefCookie("UserName","Гость");
            setdefCookie("PersMail","Гость");
            setdefCookie("PersPass","Гость");
            location.replace(urlHome);
         })
         </script>
         <?php
      }
   }
   // *************************************************************************
   // *             Выполнить этапы по вводу и регистрации на сайте           * 
   // *************************************************************************
   public function Body() 
   { 
      $enMode=\prown\getComRequest('enMode');
      //\prown\Alert('$enMode='.$enMode);

      // Если поступила команда на вход в систему по email и паролю, 
      // то выполняем ввод email и пароля
      if ($enMode==NULL) $this->enMode_NULL(); 
      // Проверяем пароль и email по базе данных, 
      // принимаем решение: "Пропустить на сайт, как гостя", 
      // "Заменить пароль" или "Зарегистрироваться"               
      else if (\prown\isComRequest(entProverit,'enMode')) $this->enMode_entProverit();
      // Заменяем пароль 
      else if (\prown\isComRequest(entZamenit,'enMode')) $this->enMode_entZamenit(); 
      // Пропускаем пользователя на сайт с новым паролем, или как гостя 
      else if (\prown\isComRequest(entPropustit,'enMode')) $this->enMode_entPropustit(); 
      // Вводим регистрационные данные перед проверкой почты 
      else if (\prown\isComRequest(entZaregistrirovatsya,'enMode')) $this->enMode_entZaregistrirovatsya(); 
      // Подтверждаем регистрацию, пропускаем на сайт с заданным паролем
      else if (\prown\isComRequest(entPodtverdit,'enMode')) $this->enMode_entPodtverdit(); 
      // Внутренняя ошибка
      else echo('Ошибка Entrying->Body 2023-10-06');

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
   // *                      Выполнить ввод email и пароля                    * 
   // *************************************************************************
   private function enMode_NULL() 
   {
      require_once "InteractiveSpooky.php"; 
      //require_once "i2.php"; 
   } 
   // *************************************************************************
   // *     Подтвердить регистрацию, пропустить на сайт с заданным паролем    * 
   // *************************************************************************
   private function enMode_entPodtverdit() 
   {
      echo '*** Этого входа не должно было быть! ***';
      /* в TinyGalleryClass в HEAD и BODY должны присутствовать вставки:
      
      // 6-HEAD этап -------------------------------------------- ?Com=vojti
      // Здесь обработка входа на сайт: в случае, когда пароль и email подтвержены
      // и, таким образом, в баузере сформированы новые кукисы пароля и email,
      // то пропускаем mmlVojti и отрабатываем вход на сайт
      elseif ((\prown\isComRequest(mmlVojti)) and !(\prown\isComRequest(entPodtverdit,'enMode')))
         $this->Entry=mmlVojtiZaregistrirovatsya_HEAD($urlHome,$this->Entry); 
 
      // 6-BODY этап ----------------------------------------------- ?Com=vojti
      // Здесь обработка входа на сайт: в случае, когда пароль и email подтвержены
      // и, таким образом, в баузере сформированы новые кукисы пароля и email,
      // то пропускаем mmlVojti и отрабатываем вход на сайт
      elseif ((\prown\isComRequest(mmlVojti)) and !(\prown\isComRequest(entPodtverdit,'enMode')))
      {
         $Title=MakeTitle('Войти или зарегистрироваться! '.'&#128152;&#129315;',ttMessage);
         $this->_ViewLifeSpace($Title,$this->Entry);
      }
      */
   }
   // *************************************************************************
   // *     Пропустить пользователя на сайт с новым паролем, или как гостя    * 
   // *************************************************************************
   private function enMode_entPropustit() 
   {
      echo '*** enMode_entPropustit ***<br>';
   }
   // *************************************************************************
   // *                Проверить пароль и email по базе данных,               *
   // *  принять решение: "Пропустить на сайт, как гостя", "Заменить пароль", *
   // *          "Зарегистрироваться" или "Подтвердить регистрацию,           * 
   // *                  пропустить на сайт с email и паролем"                * 
   // *************************************************************************
   private function enMode_entProverit() 
   {
      require_once "Proverit.php"; 
   } 
   // *************************************************************************
   // *                               Заменить пароль                         * 
   // *************************************************************************
   private function enMode_entZamenit()
   {
      echo '*** enMode_entZamenit='.entZamenit.'***<br>';
      require_once "LoginScreen.php"; 
   } 
   // *************************************************************************
   // *           Ввести регистрационные данные перед проверкой почты         * 
   // *************************************************************************
   private function enMode_entZaregistrirovatsya() 
   {
      echo '*** enMode_entZaregistrirovatsya ***<br>';
      require_once "InteractiveSpooky.php"; 
  }
}
// ********************************************************* EntryClass.php ***
