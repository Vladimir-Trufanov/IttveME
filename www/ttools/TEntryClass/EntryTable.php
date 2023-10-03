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
            [ 1, 'tve58@inbox.ru', 'x58', '+7921-4524295','20' ],
            [ 2, 'tve@karelia.ru', 'x00', '+7911-6603087','20' ]
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
// * Создать резервную копию базы данных и заново построить новую базу данных *
// ****************************************************************************
/*
function _BaseFirstCreate($basename,$username,$password,$aCharters) 
{
   // Получаем спецификацию файла базы данных материалов
   $filename=$basename.'.db3';
   // Проверяем существование и удаляем файл копии базы данных 
   $filenameOld=$basename.'-copy.db3';
   _UnlinkFile($filenameOld);
   \prown\ConsoleLog('Проверено существование и удалена копия базы данных: '.$filenameOld);  
   // Создаем копию базы данных
   if (file_exists($filename)) 
   {
      if (rename($filename,$filenameOld))
      {
         \prown\ConsoleLog('Получена копия базы данных: '.$filenameOld);  
      }
      else
      {
         \prown\ConsoleLog('Не удалось переименовать базу данных: '.$filename);
      }
   } 
   else 
   {
      \prown\ConsoleLog('Прежней версии базы данных '.$filename.' не существует');
   }
   // Проверяем существование и удаляем файл базы данных 
   _UnlinkFile($filename);
   \prown\ConsoleLog('Проверено существование и удалён старый файл базы данных: '.$filename);  
   // Создается объект PDO и файл базы данных
   $pdo=_BaseConnect($basename,$username,$password);
   \prown\ConsoleLog('Создан объект PDO и файл базы данных');
   // Создаём таблицы базы данных
   CreateTables($pdo,$aCharters);
   \prown\ConsoleLog('Созданы таблицы и выполнено начальное заполнение'); 
   
   // Отрабатываем действия при отладке создания базы данных
   if ($aCharters=='-')
   {
      // Выбираем контрольную таблицу для меню из базы данных и удаляем объект
      $stmt = $pdo->query("SELECT * FROM stockpw");
      $table = $stmt->fetchAll();
      unset($pdo);          
      \prown\ConsoleLog('Выбрана таблица материалов из базы данных'); 
      // Формируем массив для представления таблицы
      $arrayl = array(); 
      aRecursLevel($arrayl,$table);
      echo 'Таблица материалов из базы данных: '.$filename; 
      aViewLevel($arrayl);
      \prown\ConsoleLog('Сформирован массив для представления таблицы'); 
      // Формируем массив c указанием путей  
      $array = array();                         // выходной массив
      $array_idx_lvl = array();                 // индекс по полю level
      echo '<br>';  
      echo 'Таблица материалов c указанием путей и транслита из базы данных: '.$filename;
      aRecursPath($array,$array_idx_lvl,$table); 
      aViewPath($array);
      \prown\ConsoleLog('Сформирован массив c указанием путей и транслита');
   } 
}
// ****************************************************************************
// *          Сформировать массив для представления таблицы до уровня         *
// *              (по мотивам - https://m.habr.com/ru/post/280944/)           *
// ****************************************************************************
function aRecursLevel(&$array,$data,$pid = 0,$level = 0)
{
   foreach ($data as $row)   
   {
      // Смотрим строки, pid которых передан в функцию,
      // начинаем с нуля, т.е. с корня сайта
      if ($row['pid'] == $pid)   
      { 
         // Собираем строку в ассоциативный массив
         $_row['uid']=$row['uid'];
         $_row['pid']=$row['pid'];
         // Функцией str_pad добавляем точки
         $_row['NameArt']=$_row['NameArt']=str_pad('', $level*3, '.').$row['NameArt']; 
         // Добавляем уровень
         $_row['level']=$level;      
         $_row['IdCue']=$row['IdCue'];
         $_row['access']=$row['access'];
         $_row['Translit']=$row['Translit'];       
         $_row['Name']=$row['NameArt'];       
         // Прибавляем каждую строку к выходному массиву
         $array[]=$_row; 
         // Строка обработана, теперь запустим эту же функцию для текущего uid, то есть
         // пойдёт обратотка дочерней строки (у которой этот uid является pid-ом)
         aRecursLevel($array,$data,$row['uid'],$level + 1);
      }
   }
}
// ****************************************************************************
// *         Сформировать массив представления таблицы c указанием путей      *
// ****************************************************************************
function aRecursPath(&$array,&$array_idx_lvl,$data,$pid=0,$level=0,$path="")
{
   foreach ($data as $row)   
   {
      // Смотрим строки, pid которых передан в функцию,
      // начинаем с нуля, т.е. с корня сайта
      if ($row['pid'] == $pid)   
      { 
         // Собираем строку в ассоциативный массив
         $_row['uid']=$row['uid'];
         $_row['pid']=$row['pid'];
         // Функцией str_pad добавляем точки
         $_row['NameArt']=$_row['NameArt']=str_pad('', $level*3, '.').$row['NameArt']; 
         // Добавляем уровень
         $_row['level']=$level;      
         $_row['IdCue']=$row['IdCue'];
         $_row['path']=$path."/".$row['NameArt'];   // добавляем имя к пути
         $_row['Translit']=$row['Translit'];        // добавляем транслит
         $_row['access']=$row['access'];
         $array[$row['uid']] = $_row;   // Результирующий массив индексируемый по uid
         // Для быстрой выборки по level, формируем индекс
         $array_idx_lvl[$level][$row['uid']] = $row['uid'];
         // Строка обработана, теперь запустим эту же функцию для текущего uid, то есть
         // пойдёт обработка дочерней строки (у которой этот uid является pid-ом)
         aRecursPath($array,$array_idx_lvl,$data,$row['uid'],$level+1,$_row['path']);
      } 
   }
}
// ****************************************************************************
// *           Вывести содержимое массива в первом виде - до уровня           *
// ****************************************************************************
function aViewLevel($array)
{
   echo '<pre>';
   // Выводим шапку
   echo '<table border=2>';
   echo '<tr>';
   echo '<td>UID</td>'; 
   echo '<td>'.str_pad('PID',4," ",STR_PAD_LEFT).'</td>'; 
   echo '<td> NAMEART</td>'; 
   echo '<td>LEVEL</td>'; 
   echo '<td>'.str_pad('IDCUE',6," ",STR_PAD_LEFT).'</td>'; 
   echo '<td>'.' access'.'</td>'; 
   echo '</tr>';        
   // Выводим данные
   foreach ($array as $value)
   {
      echo '<tr>';
      echo '<td>'; 
      echo str_pad($value['uid'],3," ",STR_PAD_LEFT);
      echo '</td>'; 
      echo '<td>'; 
      echo str_pad($value['pid'],4," ",STR_PAD_LEFT);
      echo '</td>'; 
      echo '<td>'; 
      echo ' '.$value['NameArt']; 
      echo '</td>'; 
      echo '<td>'; 
      echo str_pad($value['level'],5," ",STR_PAD_LEFT);
      echo '</td>'; 
      echo '<td>'; 
      echo str_pad($value['IdCue'],6," ",STR_PAD_LEFT);
      echo '</td>'; 
      echo '<td>'; 
      if ($value['access']==acsAutor) echo ' АВТОР';
      else if ($value['access']==acsClose) echo ' Закрыт';
      else echo ' Все';
      echo '</td>'; 
      echo '</tr>';
   }
   echo '</table>';
   echo '</pre>';
}
// ****************************************************************************
// *             Вывести содержимое массива с путями и транслитом             *
// ****************************************************************************
function aViewPath($array)
{
   echo '<pre>';
   // Выводим шапку
   echo '<table border=2>';
   echo '<tr>';
   echo '<td>UID</td>'; 
   echo '<td>'.str_pad('PID',4," ",STR_PAD_LEFT).'</td>'; 
   echo '<td> NAMEART</td>'; 
   echo '<td>LEVEL</td>'; 
   echo '<td> PATH</td>'; 
   echo '<td> TRANSLIT</td>'; 
   echo '<td>'.str_pad('IDCUE',6," ",STR_PAD_LEFT).'</td>'; 
   echo '<td>'.' access'.'</td>'; 
   echo '</tr>';        
   // Выводим данные
   foreach ($array as $value)
   {
      echo '<tr>';
      echo '<td>'; 
      echo str_pad($value['uid'],3," ",STR_PAD_LEFT);
      echo '</td>'; 
      echo '<td>'; 
      echo str_pad($value['pid'],4," ",STR_PAD_LEFT);
      echo '</td>'; 
      echo '<td>'; 
      echo ' '.$value['NameArt']; 
      echo '</td>'; 
      echo '<td>'; 
      echo str_pad($value['level'],5," ",STR_PAD_LEFT);
      echo '</td>'; 
      echo '<td>'; 
      echo ' '.$value['path'];
      echo '</td>'; 
      echo '<td>'; 
      echo ' '.$value['Translit'];
      echo '</td>'; 
      echo '<td>'; 
      echo str_pad($value['IdCue'],6," ",STR_PAD_LEFT);
      echo '</td>'; 
      echo '<td>'; 
      if ($value['access']==acsAutor) echo ' АВТОР';
      else if ($value['access']==acsClose) echo ' Закрыт';
      else echo ' Все';
      echo '</td>'; 
      echo '</tr>';
   }
   echo '</table>';
   echo '</pre>';
}
// ----------------------------------------------------------------------------
function getIconCue($Translit)
{
   if ($Translit=='moya-zhizn') $icon='&#129392;';
   else if ($Translit=='mikroputeshestviya') $icon='&#9978;';
   else if ($Translit=='vsyakoe-raznoe') $icon='&#9994;';
   else if ($Translit=='v-kontakte') $icon='&#128165;';
   else if ($Translit=='moj-mir') $icon='&#10024;';
   else if ($Translit=='perepechatka') $icon='&#9924;';
   else if ($Translit=='progulki') $icon='&#128692;';
   else if ($Translit=='igry') $icon='&#127922;';
   else $icon='&#9925;'; 
   return '<i class="UniIcon">'.$icon.'</i>';
}
// ****************************************************************************
// *   Включить ссылку в текущую строку таблицы меню с сортировкой по полям   *
// ****************************************************************************
function sort_link_th($title,$a,$b,$SignAsc,$SignDesc) 
{
   $sort = @$_GET['Sort'];
   if ($sort == $a) 
   {
      return '<a class="ipvSort" href="?Sort=' . $b . '">' . $title . ' <i>'.$SignAsc.'</i></a>';
   } 
   elseif ($sort == $b) 
   {
      return '<a class="ipvSort" href="?Sort=' . $a . '">' . $title . ' <i>'.$SignDesc.'</i></a>'; 
   } 
   else 
   {
      return '<a class="ipvSort" href="?Sort=' . $a . '">' . $title . '</a>'; 
   }
}

// -------------------------------------------------------- ЗАПРОСЫ ПО БАЗЕ ---

// ****************************************************************************
// *                       Выбрать число записей по родителю                  *
// ****************************************************************************
function CountPoint($pdo,$ParentID)
{
   $cSQL='SELECT uid FROM stockpw WHERE pid='.$ParentID;
   $stmt = $pdo->query($cSQL);
   $table = $stmt->fetchAll();
   $nCount=count($table);
   if ($nCount==0) $Result='';
   else $Result='<span>'.$nCount.'</span>';
   return $Result; 
}
*/
// ********************************************************* EntryTable.php ***
