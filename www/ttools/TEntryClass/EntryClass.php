<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                               *** EntryClass.php ***

// ****************************************************************************
// * ittve.me                           Войти или зарегистрироваться на сайте * 
// ****************************************************************************
// *                                                                          *
// * v2.2, 14.11.2023                              Автор:       Труфанов В.Е. *
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
      // При поступлении команды 'Отправить письмо для подтверждения регистрации' 
      // отправляем письмо и перегружаем сайт
      else if (\prown\isComRequest(entOtpravitPismo,'enMode')) $this->enMode_entOtpravitPismo();  
      // При поступлении команды 'По ссылке из письма пропустить на сайт c email
      // и паролем' занести новые данные регистрации в базу данных и отметить 
      // вход на сайт по зарегистрированным реквизитам
      else if (\prown\isComRequest(entPoSsylkeIzPisma,'enMode')) $this->enMode_entPoSsylkeIzPisma();  
      // Внутренняя ошибка
      else echo('Ошибка Entrying->Body 2023-10-06');

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
      require_once "InteractiveSpooky.php"; 
   }
   // *************************************************************************
   // *      При поступлении команды 'Отправить письмо для подтверждения      *
   // *          регистрации' отправляем письмо и перегружаем сайт            * 
   // *************************************************************************
   private function enMode_entOtpravitPismo() 
   {
      define ("tobyMail",       'Отправить письмо функцией mail (по умолчанию');    
      define ("tobyPHPMailer",  'Отправить письмо c помощью PHPMailer');     
      define ("tobyErr",        'Ошибка при отправке письма!');     
      define ("tobySuccess",    'Письмо успешно отправлено!');     

      $enMode=\prown\getComRequest('enMode');
      
      echo '<div id="OtpravitPismo">';
      require_once "EmailRegistration.php"; 
      //$Result=otpravkaFinal($this->urlHome);
      $Result=otpravkaFinal($this->urlHome,tobyPHPMailer);
      echo $Result.'<br>';
      echo '</div>';

      /*
      $this->urlHome=$urlHome;
      $this->basename=$basename;
      $this->username=$username;
      $this->password=$password;
      $this->note= $note; 
      */
      
      if ($enMode==entOtpravitPismo)
      {
      ?>
      <script>
      $(document).ready(function()
      {
         $('#OtpravitPismo').css('background','green');
      })
      </script>
      <?php
      }
   }
   // *************************************************************************
   // *   При поступлении команды 'По ссылке из письма пропустить на сайт c   *
   // *   email и паролем' занести новые данные регистрации в базу данных и   *
   // *        отметить вход на сайт по зарегистрированным реквизитам         *
   // *************************************************************************
   private function enMode_entPoSsylkeIzPisma() 
   {
      echo '*** enMode_entPoSsylkeIzPisma='.entPoSsylkeIzPisma.'***<br>';
      /*
      $login = $_REQUEST['password'];
      $email = $_REQUEST['email'];
      $PictureName='Калиниченко Е.Е. Думы у печки. 1897';
      // По паролю в виде открытого текста, введенному пользователем формируем
      // хэш пароля, который может храниться в базе данных
      $hash = password_hash($login,PASSWORD_DEFAULT);
      // Verify the hash against the password entered 
      $verify = password_verify($login, $hash); 
      // Print the result depending if they match 
      if ($verify) 
      { 
         echo 'Password Verified!<br>'; 
      } 
      else 
      { 
         echo 'Incorrect Password!<br>'; 
      }
      */
   }
}
// ********************************************************* EntryClass.php ***

