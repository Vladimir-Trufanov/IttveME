<?php

// ���������� 
// 
// ��� ����, ����� ������ ��� ��������� ������ �� ����� ����������, 
// ��������� ��������� ��������� � ����� php.ini: 
// display_errors = On
// display_startup_errors = On
// error_reporting = -1
// log_errors = On

// �������� 
//
// ����� �������� ��� ������ ����� ����� �� ����� ���������, 
// ��������� ��� php.ini ��������� �������: 
// display_errors = Off
// display_startup_errors = Off
// error_reporting = E_ALL
// log_errors = On
//
// � ����� ����������� � ���������, ������ �� ����� ����� ������������ � ��� 
// ������ ��� �������, �� �� ����� �������� ������������. ��� ��������� 
// ���������� �� ���� ����������, �������� ����������� PHP: 

// Parse error: syntax error, unexpected 'echo' (T_ECHO), expecting ',' or ';' 
//              in C:\Webservers\DoorTry\www\include.php on line 6
echo "Hi" 
echo "Hello";

// Warning: fopen(spoon): failed to open stream: No such file or directory 
//          in C:\Webservers\DoorTry\www\include.php on line 10
//fopen("spoon", "r");

// Fatal error: Uncaught Error: [] operator not supported for strings 
//              in C:\Webservers\DoorTry\www\include.php:17 
//              Stack trace: #0 C:\Webservers\DoorTry\www\index.php(426): 
//              include() #1 {main} thrown in C:\Webservers\DoorTry\www\include.php on line 17
//$str='try';
//$str[]=4;
    
// E_COMPILE_ERROR
// Warning:     require_once(not-exists.php): failed to open stream: No such file or directory 
//              in C:\Webservers\DoorTry\www\include.php on line 25
// Fatal error: require_once(): Failed opening required 'not-exists.php' 
//              (include_path='.;C:\php\pear') 
//              in C:\Webservers\DoorTry\www\include.php on line 25
// require_once 'not-exists.php';

// Warning: include_once(not-exists.php): failed to open stream: No such file or directory 
//          in C:\Webservers\DoorTry\www\include.php on line 32
// Warning: include_once(): Failed opening 'not-exists.php' 
//          for inclusion (include_path='.;C:\php\pear') 
//          in C:\Webservers\DoorTry\www\include.php on line 32
// include_once 'not-exists.php';

// Notice: Undefined variable: a in C:\Webservers\DoorTry\www\include.php on line 35
//echo $a;

// Notice: Use of undefined constant UNKNOWN_CONSTANT - assumed 'UNKNOWN_CONSTANT' 
//         in C:\Webservers\DoorTry\www\include.php on line 39
//echo UNKNOWN_CONSTANT;

// Deprecated: Non-static method Deprec::test() should not be called statically 
//             in C:\Webservers\DoorTry\www\include.php on line 50
/*class Deprec 
{
   public function test() 
   {
      echo 'Test'; 
   } 
}
Deprec::test();*/

// E_DEPRECATED: ��� PHP ����� ��������, ���� �� ����������� ���������� �������
// (�.�. ��, ��� �������� ��� deprecated, � � ��������� �������� ������ �� �� �����):

// Fatal error: Uncaught Error: Call to undefined function split() 
//              in C:\Webservers\DoorTry\www\include.php:61 
//              Stack trace: #0 C:\Webservers\DoorTry\www\index.php(437): 
//              include() #1 {main} 
//              thrown in C:\Webservers\DoorTry\www\include.php on line 61
//split(',', 'a,b');

// E_STRICT: ��� ������, ������� ������ ��� ������ ��� ���������, ����� 
// �� ���� ������, ��� ����� IDE ��� ��� ������ ����� ����������. ��� ��������, 
// ���� ������� �� ����������� ����� ��� �������, �� ��� ����� ��������, 
// �� ��� ���-�� �����������, � �������� ��������� ��������� ������, 
// ���� � ���������� ����� ������ ����� ������, � �������� ��������� � $this:
/*
class My_Datetime extends DateTime
{
   public static function createFromFormat($format, $time, DateTimeZone $timezone = null)
   {}
} 
*/
