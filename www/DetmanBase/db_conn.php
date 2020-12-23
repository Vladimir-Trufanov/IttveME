<?php


// Подключаем базу данных обеспечения расчетов 
//$pathBase='sqlite:'.$_SERVER['DOCUMENT_ROOT'].'/ittve.db3';                                          
//$db = new PDO($pathBase);

require_once $_SERVER['DOCUMENT_ROOT'].'/iniWorkSpace.php';
$_WORKSPACE=iniWorkSpace();

$SiteRoot    = $_WORKSPACE[wsSiteRoot];     // Корневой каталог сайта
$SiteAbove   = $_WORKSPACE[wsSiteAbove];    // Надсайтовый каталог
$SiteHost    = $_WORKSPACE[wsSiteHost];     // Каталог хостинга
$SiteDevice  = $_WORKSPACE[wsSiteDevice];   // 'Computer' | 'Mobile' | 'Tablet'
$UserAgent   = $_WORKSPACE[wsUserAgent];    // HTTP_USER_AGENT

$TPhpTools=$SiteHost.'/TPhpTools';
require_once $TPhpTools."/TPhpTools/TBaseMaker/BaseMakerClass.php";



$page = 'contact';
try
{
   $pathBase='sqlite:'.$_SERVER['DOCUMENT_ROOT'].'/proba.db3';                                          
   $pdo = new PDO($pathBase);
   /*
   // Первый вариант
   $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
   $sql ='SELECT * FROM pages WHERE slug=:page LIMIT 1';
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array(':page' => $page));
   $rows = $sth->fetchAll();
   print_r($rows); // здесь выводим данные
   */
   
   /*
   // Второй вариант
   $db = new Db($pdo);
   $row = $db->queryRow('SELECT * FROM pages WHERE slug=:page LIMIT 1', array(':page' => $page));
   if ($row)
   {
      echo $row['text'];
      echo '<br>Просмотров: ' . $row['hits'] . '<br>';
      $db->update('pages', array('hits' => $row['hits'] + 1), 'id=:id', array(':id' => $row['id']));
   }
   */
   
   // Для будущих тестов
   /*
   $pathBase='sqlite:'.$_SERVER['DOCUMENT_ROOT'].'/proba.db3';                                          
   $pdo = new PDO($pathBase);
   $st = $pdo->query('SELECT * FROM pages');
   $results = $st->fetchAll(); 
   foreach ($results as $row) {echo $row['id'].'-'; echo $row['text']; }
   */ 

   $pathBase='sqlite:'.$_SERVER['DOCUMENT_ROOT'].'/produkty.db3'; 
   $username='tve';
   $password='23ety17';                                         
   //$pdo = new PDO($pathBase);
   $pdo = new PDO(
      $pathBase, 
      $username,
      $password,
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
   );
   try 
   {
      $pdo->beginTransaction();
      
      $sql='CREATE TABLE vids ([id-vid] INTEGER PRIMARY KEY AUTOINCREMENT, vid TEXT)';
      $st = $pdo->query($sql);
      $sql='CREATE TABLE colours (
         [id-colour] INTEGER PRIMARY KEY AUTOINCREMENT,
         colour      TEXT
      )';
      $st = $pdo->query($sql);
      $sql='CREATE TABLE produkts (
         name        TEXT PRIMARY KEY,
         [id-colour] INTEGER,
         calories    NUMERIC( 5, 1 ),
         [id-vid]    INTEGER
      )';
      $st = $pdo->query($sql);
      
      // https://art-life-spb.ru/kaiioraz_frukty
      // https://sostavproduktov.ru/produkty/yagody
      // https://sostavproduktov.ru/potrebitelyu/vidy-produktov/frukty

      $sql="INSERT INTO [vids] ([id-vid], [vid]) VALUES (1, 'фрукты');";
      $st = $pdo->query($sql);
      $sql="INSERT INTO [vids] ([id-vid], [vid]) VALUES (2, 'ягоды');";
      $st = $pdo->query($sql);

      $sql="INSERT INTO [colours] ([id-colour], [colour]) VALUES (1, 'красные');";
      $st = $pdo->query($sql);
      $sql="INSERT INTO [colours] ([id-colour], [colour]) VALUES (2, 'голубые');";
      $st = $pdo->query($sql);
      $sql="INSERT INTO [colours] ([id-colour], [colour]) VALUES (3, 'жёлтые');";
      $st = $pdo->query($sql);
      $sql="INSERT INTO [colours] ([id-colour], [colour]) VALUES (4, 'оранжевые');";
      $st = $pdo->query($sql);
      $sql="INSERT INTO [colours] ([id-colour], [colour]) VALUES (5, 'зелёные');";
      $st = $pdo->query($sql);


      $aProducts=[
         ['голубика', 2, 41, 2],
         ['брусника', 1, 41, 2],
         ['груши', 3, 42, 1],
         ['земляника', 1, 34, 2],
         ['рябина', 4, 81, 2],
         ['виноград', 5, 70, 1]
      ];
      $statement = $pdo->prepare("INSERT INTO [produkts] ".
         "([name], [id-colour], [calories], [id-vid]) VALUES ".
         "(:name,  :idcolour,   :calories,  :idvid);");
      $i=0;
      foreach ($aProducts as [$name,$idcolor,$calories,$idvid])
      $statement->execute(["name"=>$name, "idcolour"=>$idcolor, "calories"=>$calories, "idvid"=>$idvid]);
      
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

   
   /*
   $sql='CREATE TABLE vids ([id-vid] INTEGER PRIMARY KEY AUTOINCREMENT, vid TEXT)';
   $st = $pdo->query($sql);
   $sql='CREATE TABLE colours (
      [id-colour] INTEGER PRIMARY KEY AUTOINCREMENT,
      colour      TEXT
   )';
   $st = $pdo->query($sql);
   */

   //$preparedStatement = $pdo->prepare($sql);
   //$preparedStatement->execute();

  
   /* 
   // Insert the metadata of the order into the database
   $preparedStatement = $db->prepare(
        'INSERT INTO `orders` (`order_id`, `name`, `address`, `created_at`)
         VALUES (:name, :address, :telephone, :created_at)'
   );
   $preparedStatement->execute([
        'name' => $name,
        'address' => $address,
        'telephone' => $telephone,
        'created_at' => time(),
   ]);
   */


   
   echo 'есть нашис контакты<br>';
   
}
catch(Exception $e) 
{
   echo $e->getMessage();
}
 





/*
$dbase=mysql_connect('localhost', 'articles', 'g18100');
if(!$dbase)
{
   ?>
   <!DOCTYPE html>
   <html>
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <title>Не могу подключиться к БД</title>
   </head>
   <body>
      <br /><br /><br />
      <h1 align="center">Проверьте настройки подключения к БД</h1>
   </body>
   </html>
   <?php
   exit;
}
mysql_select_db('articles');
@mysql_query('set character_set_client="utf8"');
@mysql_query('set character_set_results="utf8"');
@mysql_query('set collation_connection="utf8_general_ci"');
*/
