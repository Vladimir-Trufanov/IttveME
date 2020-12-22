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
   
   // Второй вариант
   $db = new Db($pdo);
   $row = $db->queryRow('SELECT * FROM pages WHERE slug=:page LIMIT 1', array(':page' => $page));
   if ($row)
   {
      echo $row['text'];
      echo '<br>Просмотров: ' . $row['hits'] . '<br>';
      $db->update('pages', array('hits' => $row['hits'] + 1), 'id=:id', array(':id' => $row['id']));
   }
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
