<?php


// ���������� ���� ������ ����������� �������� 
$pathBase='sqlite:'.$_SERVER['DOCUMENT_ROOT'].'/ittve.db3';                                          
$db = new PDO($pathBase);


/*
$dbase=mysql_connect('localhost', 'articles', 'g18100');
if(!$dbase)
{
   ?>
   <!DOCTYPE html>
   <html>
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <title>�� ���� ������������ � ��</title>
   </head>
   <body>
      <br /><br /><br />
      <h1 align="center">��������� ��������� ����������� � ��</h1>
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
