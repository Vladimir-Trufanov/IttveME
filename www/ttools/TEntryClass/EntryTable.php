<?php namespace ttools; 
                                         
// PHP7/HTML5, EDGE/CHROME                               *** EntryTable.php ***

// ****************************************************************************
// * TPhpTools                     Блок функций класса TEntryClass для работы *
// *                                с таблицей пользователей сайта "ittve.me" *
// *                                                                          *
// * v1.1, 03.10.2023                              Автор:       Труфанов В.Е. *
// * Copyright © 2022 tve                          Дата создания:  01.10.2023 *
// ****************************************************************************

// ---_UserFirstCreate($basename,$username,$password,$aCharters)                 - Создать резервную копию базы данных и заново построить новую базу данных
// ---aRecursLevel(&$array,$data,$pid=0,$level=0)                                - Сформировать массив для представления таблицы до уровня
// ---aRecursPath(&$array,&$array_idx_lvl,$data,$pid=0,$level=0,$path="")        - Сформировать массив представления таблицы c указанием путей    
// ---aViewLevel($array)                                                         - Вывести содержимое массива в первом виде - до уровня 
// ---aViewPath($array)                                                          - Вывести содержимое массива с путями и транслитом  
// ---cUidPid($Uid,$Pid,$cLast)                                                  - Обеспечить смещение строк меню при отладке 
// ---sort_link_th($title,$a,$b,$SignAsc,$SignDesc)                              - Включить ссылку в текущую строку таблицы меню с сортировкой по полям
// ---SpacesOnLevel($lvl,$cLast,$Uid,$Pid,$otlada)                               - Обеспечить иммитацию пробелов смещения строк меню при отладке 
// CreateMeUsers($pdo,$aCharters)                                                - Создать таблицу пользователей ittve.me в базе данных

// -------------------------------------------------------- ЗАПРОСЫ ПО БАЗЕ ---
// ---CountPoint($pdo,$ParentID)  - Выбрать число записей по родителю                  
// ---SelRecord($pdo,$UnID)       - Выбрать запись по идентификатору 

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
// *************************************************************************
// * Выбрать запись по идентификатору                                      *
// *              (например, узнать наименование группы по идентификатору: *
// *          $table=SelRecord($pdo,$pid); $NameGru=$table[0]['NameArt'];) *
// *************************************************************************
function SelRecParema($pdo,$email)
{
   /*
   try
   {
      $pdo->beginTransaction();
      $cSQL='SELECT * FROM meusers WHERE uid='.$UnID;
      $stmt = $pdo->query($cSQL);
      $table = $stmt->fetchAll();
      $pdo->commit();
   } 
   catch (\Exception $e) 
   {
      $messa=$e->getMessage();
      $table=array(array("NameArt"=>$messa,"Translit"=>nstErr,));
      if ($pdo->inTransaction()) $pdo->rollback();
   }
   return $table; 
   */
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
