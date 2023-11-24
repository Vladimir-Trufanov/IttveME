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

define ("tobyMail",       'Отправить письмо функцией mail (по умолчанию');    
define ("tobyPHPMailer",  'Отправить письмо c помощью PHPMailer');     

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
   if ($eby==tobyMail) otpravkaByMail($to,$subject,$message,$from);
   else otpravkaByPHPMailer($to,$subject,$message,$fromAddr,$fromComm);
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
   $mail->SMTPDebug = 2;
   $mail->CharSet = 'UTF-8';
   $mail->setFrom($fromAddr,$fromComm);  // от кого (email и имя)
   $mail->addAddress($to,$to);           // кому (email и имя)
   $mail->Subject = $subject;            // тема письма
   // html текст письма
   $mail->msgHTML($message);
    // Отправляем
    if ($mail->send()) 
    {
       echo 'Письмо отправлено PHPMailer!';
    } 
    else 
    {
       echo 'Ошибка: ' . $mail->ErrorInfo;
    }  
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
   if ($err) echo 'Письмо ушло!<br>';
   else echo 'Ошибка при отправке письма<br>';
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
   font-family: 'Arial Black', Gadget, sans-serif;
   font-family: Georgia, serif;
   font-family: 'MS Sans Serif', Geneva, sans-serif;
   font-family: 'MS Serif', 'New York', sans-serif;
   font-family: Tahoma, Geneva, sans-serif;
   font-family: 'Times New Roman', Times, serif;
   font-family: 'Trebuchet MS', Helvetica, sans-serif;
   font-family: Verdana, Geneva, sans-serif;
   */
   
   return 
   '
   <html>
   <head>
      <title>Подтвердите Email</title>
      <style>
         @font-face 
         {
            font-family: Pacifico; 
            src: url(https://ittve.me/ttools/TTuningClass/Pacifico-Regular.ttf); 
         }
         /* Общий див */
         #letter
         {
            background:transparent;
            width:100%;
            align-items:center;
            padding:0;
            margin:0;
            border:0;
         }
         /* Таблица данных по регистрации */          
         #tbl 
         {
            font-family:"Lucida Sans Unicode","Lucida Grande",Sans-Serif;
            font-size:20px;
            border-collapse:collapse;
            text-align:center;
            width:100%;
            padding:0;
            margin:0;
            border:0;
         }
         /* Cтолбцы таблицы */
         td 
         {
            background:#D8E6F3;
         }
         /* Левый столбец таблицы */
         .tfirst 
         {
            background:#AFCDE7;
            color:white;
            padding:10px 20px;
         }
         /* Заголовок таблицы */
         #hfirst 
         {
            font-size:24px;
            font-family:"Pacifico";
         }
         /* Ячейки таблицы */
         th, td 
         {
            width:50%;
            border-style:solid;
            border-width:0 1px 1px 0;
            border-color:white;
         }
         /* Див ссылки */
         #hrefp
         {
            text-align:center;
            margin-top:10px;
            margin-bottom:16px;
            background:transparent;
            padding:0;
            /*border:0;*/
            
            border-style:solid;
            border-width:2px;
            border-color:blue;

            
            
            
            
            
            
         }
         /* Ссылка на сайт */  
         #hrefi
         {
            color:blue;
            font-size:24px;
            font-family:"Pacifico";
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
      
      <div id="letter"

      <table id="tbl">
         <tr><th class="tfirst" colspan="2" id="hfirst">Данные регистрации<br></th></tr>
         <tr><td class="tfirst">Логин авторизации на сайте</td>  <td>'. $email. '<br></td></tr>
         <tr><td class="tfirst">Пароль</td>                      <td>'. $login. '<br></td></tr>
      </table>

      <div id="hrefp">
         <a id="hrefi" href="'.$urlHome.
            '?enMode=' .entPoSsylkeIzPisma. '&pismo=' .$email.
            '&plain='  .$login.             'hash='   .$hash.'">
            Что бы подтвердить данные регистрации, перейдите по ссылке на сайт <b>www.ittve.me</b>
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

