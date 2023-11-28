<?php 
// PHP7/HTML5, EDGE/CHROME                        *** EmailRegistration.php ***

// ****************************************************************************
// * ittve.me                   Отправить письмо с сайта со ссылкой "обратно" * 
// ****************************************************************************
// *                                                                          *
// * v1.0, 24.11.2023                              Автор:       Труфанов В.Е. *
// * Copyright © 2023 tve                          Дата создания:  24.11.2023 *
// ****************************************************************************

use PHPMailer\PHPMailer\PHPMailer;

// ****************************************************************************
// *                    Отправить письмо со страницы сайта                    *
// ****************************************************************************
function otpravkaFinal($urlHome,$eby=tobyMail)
{
   $login = $_REQUEST['password'];
   $email = $_REQUEST['email'];
   $PictureName='Калиниченко Е.Е. Думы у печки. 1897';
   // По паролю в виде открытого текста, введенному пользователем формируем
   // хэш пароля, который может храниться в базе данных
   $hash = password_hash($login,PASSWORD_DEFAULT);
   /*
   // Эту проверку потом перенести на обработку подтверждения через почту
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
   // Для отправки HTML-письма устанавливаем заголовки
   $to = $email; //'tve58@inbox.ru';
   $fromAddr='tve@ittve.me';
   $fromComm='Регистрация на www.ittve.me';
   $from = 'From: '.$fromComm.' <'.$fromAddr.'>'."\r\n"; //'From: Регистрация на www.ittve.me <tve@ittve.me>'."\r\n" 
   // Тема письма
   $subject = "Подтвердите адрес электронной почты для сайта";
   // Текст письма
   $message = LetterHTML($urlHome,$email,$login,$hash,$PictureName);
   // Отправляем письмо функцией mail или c помощью PHPMailer 
   if ($eby==tobyMail) $Result=otpravkaByMail($to,$subject,$message,$from);
   else $Result=otpravkaByPHPMailer($to,$subject,$message,$fromAddr,$fromComm);
   return $Result;
} 
// ****************************************************************************
// *            Отправить письмо со страницы сайта c помощью PHPMailer        *
// ****************************************************************************
function otpravkaByPHPMailer($to,$subject,$message,$fromAddr,$fromComm)
{
   // Подключаем библиотеку PHPMailer
   require_once("Mailer/PHPMailer.php"); 
   // Создаем письмо
   $mail = new PHPMailer();
   $mail->SMTPDebug = 3;
   $mail->CharSet = 'UTF-8';
   $mail->setFrom($fromAddr,$fromComm);  // от кого (email и имя)
   $mail->addAddress($to,$to);           // кому (email и имя)
   $mail->Subject = $subject;            // тема письма
   // html текст письма
   $mail->msgHTML($message);
   // Отправляем
   if ($mail->send()) $Result=tobySuccess;
   else $Result=tobyErr."\n".$mail->ErrorInfo;
   return $Result;
   
   /*
   https://mailtrapblog.hashnode.dev/phpmailer-guide
   
   Debugging
   If you experience some troubles when sending emails through an SMTP server, the SMTPDebug command will help you explore those errors and find 
   out what should be fixed.
   Enable SMTP debugging and set the debug level in your script as follows:
   
   $mail->SMTPDebug = 2;

   level 1 = client; will show you messages sent by the client
   level 2 = client and server; will add server messages, it’s the recommended setting. 
   level 3 = client, server, and connection; will add information about the initial information, might be useful for discovering STARTTLS
   level 4 = low-level information.
   
   Use level 3 or level 4 if you are not able to connect at all. Setting level 0 will turn the debugging off, it is usually used for production.
   Используйте уровень 3 или уровень 4, если вы вообще не можете подключиться. Установка уровня 0 отключит отладку, обычно он используется для производства.
   
   For a better understanding of how debugging in PHPMailer works, let’s review a couple of examples.
   
   Example1. Invalid SMTP hostname
   
   2018-12-12 14:51:32    Connection: opening to mailtrap.io:2525, timeout=10, options=array()
   2018-12-12 14:51:42    Connection failed. Error #2: stream_socket_client(): unable to connect to mailtrap.io:2525 (Operation timed out) 
      [/Users/xxxx/Downloads/PHPMailer/src/SMTP.php line 326]
   2018-12-12 14:51:42    SMTP ERROR: Failed to connect to server: Operation timed out (60)
   2018-12-12 14:51:42    SMTP connect() failed.
   Mailer Error: SMTP connect() failed.
 
   Example 2. Invalid credentials
   
   2018-12-12 14:49:26    Connection: opening to smtp.mailtrap.io:2525, timeout=300, options=array()
   2018-12-12 14:49:26    Connection: opened
   2018-12-12 14:49:26    SMTP INBOUND: "220 mailtrap.io ESMTP ready"
   2018-12-12 14:49:26    SERVER -> CLIENT: 220 mailtrap.io ESMTP ready
   ...
   2018-12-12 14:49:30    SMTP INBOUND: "535 5.7.0 Invalid login or password"
   2018-12-12 14:49:30    SERVER -> CLIENT: 535 5.7.0 Invalid login or password
   2018-12-12 14:49:30    SMTP ERROR: Username command failed: 535 5.7.0 Invalid login or password
   2018-12-12 14:49:30    SMTP Error: Could not authenticate.
   2018-12-12 14:49:30    CLIENT -> SERVER: QUIT
   2018-12-12 14:49:30    SMTP INBOUND: "221 2.0.0 Bye"
   2018-12-12 14:49:30    SERVER -> CLIENT: 221 2.0.0 Bye
   2018-12-12 14:49:30    Connection: closed
   2018-12-12 14:49:30    SMTP connect() failed.
   Mailer Error: SMTP connect() failed.

   This example demonstrates where the error occurs: now the SMTP, its hostname, and port are valid but a combination of login and password was not found, 
   so you should double-check and modify your credentials.
   There are a couple of detailed articles on GitHub about debugging and troubleshooting, refer to them when you need to dive deeper into these topics.

   В этом примере показано, где возникает ошибка: теперь SMTP, его имя хоста и порт действительны, но комбинация логина и пароля не найдена.
   поэтому вам следует перепроверить и изменить свои учетные данные.
   На GitHub есть пара подробных статей об отладке и устранении неполадок, обращайтесь к ним, когда вам нужно углубиться в эти темы:
   
   https://github.com/PHPMailer/PHPMailer/wiki/SMTP-Debugging
   https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting
   
   // 26.11.2023 - так у меня при успешной отправке:

   $mail->SMTPDebug = 2;
   
   Sending with mail()
   Sendmail path: C:\PHP\php.exe C:\PHP\Sendmail\sendmail.php --dir C:\PHP\Sendmail\emails
   Envelope sender: tve@ittve.me
   To: "tve58@inbox.ru" <tve58@inbox.ru>
   Subject: =?UTF-8?B?0J/QvtC00YLQstC10YDQtNC40YLQtSDQsNC00YDQtdGBING ... YDQvtC90L3QvtC5INC/0L7Rh9GC0Ysg0LTQu9GPINGB0LDQudGC0LA=?=
   Headers: Date: Sun, 26 Nov 2023 09:03:22 +0300From: =?UTF-8?B?0KDQ ... 
      @localhost>X-Mailer: PHPMailer 6.8.1 (https://github.com/PHPMailer/PHPMailer)MIME-Version: 1.0Content-Type: multipart/alternative; 
      boundary="b1=_fiUcZJSWCMk6Ael8keHbBv2qfaREvPuDTMmYrSthg"Content-Transfer-Encoding: 8bit
   Additional params: -ftve@ittve.me
   Result: true
   Письмо успешно отправлено!

   $mail->SMTPDebug = 4;
   
   Sending with mail()
   Sendmail path: C:\PHP\php.exe C:\PHP\Sendmail\sendmail.php --dir C:\PHP\Sendmail\emails
   Envelope sender: tve@ittve.me
   To: "tve58@inbox.ru" <tve58@inbox.ru>
   Subject: =?UTF-8?B?0J/QvtC00YLQstC10YDQtNC40YLQtSDQsNC00YDQtdGBINGN0LvQtdC60YI=?= =?UTF-8?B?0YDQvtC90L3QvtC5INC/0L7Rh9GC0Ysg0LTQu9GPINGB0LDQudGC0LA=?=
   Headers: Date: Sun, 26 Nov 2023 09:31:43 +0300From: =?UTF-8?B?0KDQtdCz0LjRgdGC0YDQsNGG0LjRjyDQvdCwIHd3dy5pdHR2ZS5tZQ==?= 
      <tve@ittve.me>Message-ID: <cROwiSQDTmdMJkce6qRDdWf6BjnwG1ybX9hCWzoTRpw
      @localhost>X-Mailer: PHPMailer 6.8.1 (https://github.com/PHPMailer/PHPMailer)MIME-Version: 1.0Content-Type: multipart/alternative; 
      boundary="b1=_cROwiSQDTmdMJkce6qRDdWf6BjnwG1ybX9hCWzoTRpw"Content-Transfer-Encoding: 8bit
   Additional params: -ftve@ittve.me
   Result: true
   Письмо успешно отправлено!   
   */
}   
// ****************************************************************************
// *              Отправить письмо со страницы сайта функцией mail()          *
// ****************************************************************************
function otpravkaByMail($to,$subject,$message,$from)
{
   $headers =
      'MIME-Version:1.0'."\r\n".
      'Content-type:text/html;charset=utf-8'."\r\n".$from. 
      'Reply-To: tve@karelia.ru' . "\r\n" .
      'X-Mailer: EntryClass/ittve-me';
   // Отправляем
   $err=mail($to,$subject,$message,$headers);
   if ($err) $Result=tobySuccess; else $Result=tobyErr;
   
   /*
   
   https://stackoverflow.com/questions/3186725/how-can-i-get-the-error-message-for-the-mail-function
   
   If you are on Windows using SMTP, you can use error_get_last() when mail() 
   returns false. Keep in mind this does not work with PHP's native mail() function.

   $success = mail('example@example.com', 'My Subject', $message);
   if (!$success) 
   {
      $errorMessage = error_get_last()['message'];
   }
   With print_r(error_get_last()), you get something like this:

   [type] => 2
   [message] => mail(): Failed to connect to mailserver at "x.x.x.x" port 25, 
      verify your "SMTP" and "smtp_port" setting in php.ini or use ini_set()
   [file] => C:\www\X\X.php
   [line] => 2
   
   !!!  Как говорят многие, для отправки почты нет отслеживания ошибок, функция
   !!!  возвращает логический результат добавления почты в очередь исходящих 
   !!! сообщений. Если вы хотите отследить истинный сбой при успешном выполнении, 
   !!! попробуйте использовать SMTP с почтовой библиотекой, такой как Swift 
   !!! Mailer, Zend_Mail или phpmailer.
   
   $e=error_get_last();
   if($e['message']!=='')
   {
      // An error function
   }
   
   !!! error_get_last(); - возвращает последнюю возникшую ошибку
   
   */
   
   return $Result;
}
// ****************************************************************************
// *       Сформировать страницу с текстом для подтверждения регистрации      *
// *                              в виде таблицы                              * 
// ****************************************************************************
function LetterHTML($urlHome,$email,$login,$hash,$PictureName)
{
   // Стили электронной почты HTML - это минное поле проблем, вам в основном 
   // нужно вернуться к HTML версии 4.0 и оформить все с помощью встроенных 
   // <font > тегов. Вам также нужно будет добавить шрифт в качестве 
   // <style> body{ }</style> тега над <body> тегами вашего электронного письма. 
   // В интернете есть много материалов для чтения по этому поводу, поскольку 
   // создание кроссплатформенной и межсистемной поддержки - это настоящая 
   // заноза в заднице. Он по-прежнему использует старые теги и сохраняет как 
   // можно больше встроенных стилей. Не утруждайте себя вызовом внешних таблиц 
   // стилей, они будут удалены программой mailreader.
   /*
   font-family: Arial, Helvetica, sans-serif;
   font-family: "Arial Black", Gadget, sans-serif;
   font-family: Georgia, serif;
   font-family: 'MS Sans Serif', Geneva, sans-serif;
   font-family: 'MS Serif', 'New York', sans-serif;
   font-family: Tahoma, Geneva, sans-serif;
   font-family: 'Times New Roman', Times, serif;
   font-family: 'Trebuchet MS', Helvetica, sans-serif;
   font-family: Verdana, Geneva, sans-serif;
   */
   
   $fontfamily='font-family: "Trebuchet MS", Helvetica, sans-serif;';
   $uadress=$urlHome.'?Com=vojti&enMode='.entPoSsylkeIzPisma.'&pismo='.$email.
      '&plain='.$login.'&hash='.$hash; //urlencode($hash);
   \prown\ConsoleLog($uadress);
   return 
   '
   <html>
   <head>
      <title>Подтвердите Email</title>
      <style>
         /* Общий див */
         #letter
         {
            '.$fontfamily.'
            background:transparent;
            width:100%;
            align-items:center;
            padding:0;
            margin:0;
            border:0;
         }
         #tbl 
         {
            '.$fontfamily.'
            font-size:20px;
            border-collapse:collapse;
            text-align:center;
            width:100%;
         }
         th,td 
         {
            width:50%;
            border-style:solid;
            border-width:thin;
            border-color:white;
         }
         .tfirst
         {
            background:#AFCDE7;
            color:white;
         }
         .tright
         {
            background:#D8E6F3;
         }
         /* Див ссылки */
         #hrefp
         {
            text-align:center;
            margin-top:10px;
            margin-bottom:16px;
            background:transparent;
            padding:0;
            border:0;
         }
         /* Ссылка на сайт */  
         #hrefi
         {
            color:blue;
            font-size:24px;
            padding:0;
            margin:0;
            border:0;
         }
         /* Див картинки и картинка "Думы у печки" */   
         #imgd
         {
            text-align:center;
            vertical-align:middle;
            background:transparent;
         }
         #img
         {
            width:100%;
         }
      </style>

      </head>
      <body>
      
      <div id="letter">
      
      <table id="tbl" cellspacing="0" cellpadding="0" border="0">
         <tr><th class="tfirst" colspan="2" id="hfirst">Данные регистрации<br></th></tr>
         <tr><td class="tfirst">Логин авторизации на сайте</td> <td class="tright">'.$email.'<br></td></tr>
         <tr><td class="tfirst">Пароль</td><td class="tright">'.$login.'<br></td></tr>
      </table>

      <div id="hrefp">
         <a id="hrefi" href="'.$uadress.'">
            <i>Чтобы подтвердить данные регистрации, перейдите по ссылке на сайт <b>www.ittve.me</b></i>
         </a>
      </div>

      <div id="imgd">
         <img id="img" src="https://ittve.me/ttools/TEntryClass/Kalinichenko-Dumy-y-pechki-1897.jpg" '.
         'title="'.$PictureName.'" alt="'.$PictureName.'">  
      </div>
               
      </div>
   </body>
   </html>
   ';
}

// ************************************************** EmailRegistration.php ***

