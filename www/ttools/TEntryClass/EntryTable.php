<?php namespace ttools; 
                                         
// PHP7/HTML5, EDGE/CHROME                               *** EntryTable.php ***

// ****************************************************************************
// * TPhpTools                     Блок функций класса TEntryClass для работы *
// *                                с таблицей пользователей сайта "ittve.me" *
// *                                                                          *
// * v1.2, 05.11.2023                              Автор:       Труфанов В.Е. *
// * Copyright © 2022 tve                          Дата создания:  01.10.2023 *
// ****************************************************************************

// ****************************************************************************
// *          Создать таблицу пользователей ittve.me в базе данных            *
// ****************************************************************************
function CreateMeUsers($pdo,$aCharters)
{
   try 
   {
      $pdo->beginTransaction();
      // Определяем существует ли таблица пользователей
      $sql='PRAGMA table_info(meusers);';
      $st = $pdo->query($sql);
      $table = $st->fetchAll();
      $count = count($table);
      // Если таблицы нет, то создаем ее
      if ($count==0)
      {
         // Создаём таблицу пользователей
         $sql='CREATE TABLE meusers ('.
            'uip         INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,'.  // идентификатор пользователя
            'email       VARCHAR NOT NULL UNIQUE,'.                     // адрес электронной почты пользователя
            'passiv      VARCHAR NOT NULL,'.                            // зашифрованный пароль
            'phone       VARCHAR,'.                                     // телефон
            'art         TEXT)';                                        // дополнительная информация из VK
         $st = $pdo->query($sql);
         // Заполняем таблицу пользователей в начальном состоянии (на 2023-10-01)
         // (назначаем массив с начальной структурой таблицы)
         if ($aCharters=='-'){
         $aCharters=[                                                          
            [ 1, 'tve58@inbox.ru', 'x58-315A', '+7921-4524295','20' ],
            [ 2, 'tve@karelia.ru', 'x00-315A', '+7911-6603087','20' ]
         ];}       
         $statement = $pdo->prepare("INSERT INTO [meusers] ".
            "([uip], [email], [passiv], [phone], [art]) VALUES ".
            "(:uip,  :email,  :passiv,  :phone,  :art);");
         foreach ($aCharters as
             [$uip,  $email,  $passiv,  $phone,  $art])
         $statement->execute([
            "uip"    => $uip, 
            "email"  => $email, 
            "passiv" => $passiv, 
            "phone"  => $phone, 
            "art"    => $art
         ]);
         // Создаем индекс по email в таблице пользователей      
         $sql='CREATE INDEX IF NOT EXISTS iemail ON meusers (email)';
         $st = $pdo->query($sql);
      }
      $pdo->commit();
   } 
   catch (Exception $e) 
   {
      // Если в транзакции, то делаем откат изменений
      if ($pdo->inTransaction()) 
      {
         $pdo->rollback();
      }
      // Продолжаем исключение
     throw $e;
   }
}
// ****************************************************************************
// *                Выбрать запись по номеру электронной почты                *
// ****************************************************************************
function SelRecParema($pdo,$email)
{
   try
   {
      $pdo->beginTransaction();
      $cSQL='SELECT * FROM meusers WHERE email="'.$email.'"';
      $stmt = $pdo->query($cSQL);
      $table = $stmt->fetchAll();
      $pdo->commit();
   } 
   catch (\Exception $e) 
   {
      $messa=addslashes($e->getMessage());
      $table=array(array("phone"=>tstErr,"art"=>$messa,));
      if ($pdo->inTransaction()) $pdo->rollback();
   }
   return $table; 
}
// ****************************************************************************
// *                    Проверить правильность набранного пароля              *
// ****************************************************************************
function checkPassword($pwd) 
{
   $messa=imok;
   if (strlen($pwd)<8) $messa='Пароль менее 8 символов';
   elseif (!preg_match("#[0-9]+#",$pwd)) $messa='Пароль должен включать не менее 1 цифры';
   elseif (!preg_match("#[a-zA-Z]+#",$pwd)) $messa='Пароль должен включать не менее 1 буквы';
   return $messa;
}

// ********************************************************* EntryTable.php ***
