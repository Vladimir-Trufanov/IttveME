<?php namespace ttools; 
                                         
// PHP7/HTML5, EDGE/CHROME                          *** MenuLeaderClass.php ***

// ****************************************************************************
// * TPhpTools                Фрэйм управляющего меню для обобщенной работы в *
// *                           "ittve.me", работающего через TinyGalleryClass *
// *                                                                          *
// * v2.1, 12.06.2023                              Автор:       Труфанов В.Е. *
// * Copyright © 2022 tve                          Дата создания:  18.12.2019 *
// ****************************************************************************

/**
 * Класс --------- KwinGallery строит интерфейс для выбора некоторых символа Юникода.
 * Выборка символов осуществляется из одного из подмассивов общего массива 
 * массива $aUniCues. Подмассивы (наборы) созданы из авторских соображений и 
 * имеют свои номера и названия, так 0 - 'Знаки всякие-разные', 1 - 'Символы 
 * валют', 2 - 'Ожидаемые символы' и так далее.
 * 
 * Для взаимодействия с объектами класса должны быть определены константы:
 *
 * articleSite  - тип базы данных (по сайту)
 * pathPhpTools - путь к каталогу с файлами библиотеки прикладных классов;
 * pathPhpPrown - путь к каталогу с файлами библиотеки прикладных функции
 *    
 * Пример создания объекта класса:
 * 
 * // Указываем место размещения библиотеки прикладных функций TPhpPrown
 * define ("pathPhpPrown",$SiteHost.'/TPhpPrown/TPhpPrown');
 * // Указываем место размещения библиотеки прикладных классов TPhpTools
 * define ("pathPhpTools",$SiteHost.'/TPhpTools/TPhpTools');
 * // Указываем тип базы данных (по сайту) для управления классом ArticlesMaker
 * define ("articleSite",'IttveMe'); 
 * // Cоздаем объект для управления изображениями в галерее, связанной с 
 * // материалами сайта из базы данных
 * $Galli=new ttools\KwinGallery(gallidir,$nym,$pid,$uid);
**/

// Свойства:
//
// --- $FltLead - команда управления передачей данных. По умолчанию fltNotTransmit,
//            то есть данные о загрузке не передаются для контроля ни в кукисы, 
// ни в консоль, а только записываются в LocalStorage. Если LocalStorage,
// браузером не поддерживается, то данные будут записываться в кукисы при 
// установке свойства $FltLead в значение fltSendCookies или fltAll 
// $Page - название страницы сайта;
// $Uagent - браузер пользователя;

// Подгружаем нужные модули библиотеки прикладных функций
// require_once pathPhpPrown."/CommonPrown.php";
// Подгружаем нужные модули библиотеки прикладных классов
// require_once pathPhpTools."/TArticlesMaker/ArticlesMakerClass.php";
// require_once pathPhpTools."/CommonTools.php";

// Возможные типы меню
define ("ittveme", '-i');
// Возможные цвета элементов кнопки
define ("cDarkOrange",'255,140,0');
define ("cMaroon",'128,0,0');
define ("cIndianRed",'205,92,92');
define ("cBrown",'165,42,42');

class MenuLeader
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $typemenu;  // тип меню (для ittve.me)
   protected $urlHome;   // начальная страница сайта 
   protected $classdir;  // путь к каталогу файлов класса
   // ------------------------------------------ ПРЕФИКСЫ ПАРАМЕТРОВ В МЕНЮ ---
   protected $cPreMe;    // общие для сайта 'ittve.me' 
   // ------------------------------------------------------- МЕТОДЫ КЛАССА ---
   public function __construct($typemenu,$urlHome) 
   {
      // Инициализируем свойства класса
      $this->typemenu=$typemenu; 
      $this->urlHome=$urlHome; 
      $this->classdir=pathPhpTools.'/TMenuLeader'; 
      // Формируем префиксы вызова страниц для сайта 'ittve.me' и localhost
      if ($this->is_ittveme()) $this->cPreMe='com-';  
      else                     $this->cPreMe='?Com=';
      // Проверяем, нужно ли заменить файл стилей в каталоге редактирования и,
      // (при его отсутствии, при несовпадении размеров или старой дате) 
      // загружаем из класса 
      //CompareCopyRoot('MenuLeader.css',$this->classdir,stylesdir);
   }
   public function __destruct() 
   {
   }
   // *************************************************************************
   // *                    Настроить стили элементов объекта                  *
   // *************************************************************************
   public function Init()
   {
   }
   // *************************************************************************
   // *             Отработать меню управления на сайте "ittve.me"            *
   // *************************************************************************
   public function Menu()
   {
      // Начинаем меню 
      echo '<ul class="navset">';
      // Выводим пункты меню управления для страниц из меню "Жизнь и путешествия"
      if (\prown\isComRequest(mmlZhiznIputeshestviya))
      {
         $this->Punkt($this->urlHome,'&#xf015;','Вернуться','на главную страницу');
         $this->Punkt($this->cPreMe.mmlIzmenitNastrojkiSajta,'&#xf013;','Прочитать о сайте,','изменить настройки');
         $this->Punkt($this->cPreMe.mmlSozdatRedaktirovat,'&#xf044;','Создать материал','или редактировать');
         $this->Punkt($this->cPreMe.mmlIzmenitNazvanieIkonku,'&#xf086;','Изменить название','раздела или иконку');
      }
      // Выводим пункты меню управления пользовательских страниц
      else if 
      (
         \prown\isComRequest(mmlIzmenitNastrojkiSajta)||
         \prown\isComRequest(mmlOtpravitAvtoruSoobshchenie)||
         \prown\isComRequest(mmlVojtiZaregistrirovatsya)
      )
      {
         $this->Punkt($this->urlHome,'&#xf015;','Вернуться','на главную страницу');
         $this->Punkt($this->cPreMe.mmlIzmenitNastrojkiSajta,'&#xf013;','Прочитать о сайте,','изменить настройки');
         $this->Punkt($this->cPreMe.mmlOtpravitAvtoruSoobshchenie,'&#xf01c;','Отправить автору','сообщение');
         $this->Punkt($this->cPreMe.mmlVojtiZaregistrirovatsya,'&#xf007;','Войти или','зарегистрироваться');
      }
      // Выводим пункты меню управления по авторскому редактированию
      else if 
      (
         \prown\isComRequest(mmlSozdatRedaktirovat)||
         \prown\isComRequest(mmlVybratStatyuRedakti)||
         \prown\isComRequest(mmlNaznachitStatyu)||
         \prown\isComRequest(mmlUdalitMaterial)
      )
      {
         $this->Punkt($this->urlHome,'&#xf015;','Вернуться','на главную страницу');
         $this->Punkt($this->cPreMe.mmlVybratStatyuRedakti,'&#xf07c;','Выбрать материал','для изменений');
         $this->Punkt($this->cPreMe.mmlNaznachitStatyu,'&#xf0f6;','Назначить','новую статью');
         $this->Punkt($this->cPreMe.mmlUdalitMaterial,'&#xf1f8;','Выбрать и удалить','указанный материал');
      }
      // Выводим пункты меню управления для работы с разделами
      else if 
      (
         \prown\isComRequest(mmlIzmenitNazvanieIkonku)||
         \prown\isComRequest(mmlDobavitNovyjRazdel)||
         \prown\isComRequest(mmlUdalitRazdelMaterialov)
      )
      {
         $this->Punkt($this->urlHome,'&#xf015;','Вернуться','на главную страницу');
         $this->Punkt($this->cPreMe.mmlDobavitNovyjRazdel,'&#xf0f2;','Добавить новый','раздел материалов');
         $this->Punkt($this->cPreMe.mmlUdalitRazdelMaterialov,'&#xf1f8;','Удалить раздел','материалов');
         $this->Punkt($this->cPreMe.mmlSozdatRedaktirovat,'&#xf044;','Создать материал','или редактировать');
      }
      // Выводим пункты меню главной страницы
      else
      {
         $this->Punkt($this->cPreMe.mmlVybratSledMaterial,'&#xf0a7;','Выбрать следующий','материал');
         $this->Punkt($this->cPreMe.mmlVernutsyaPredState,'&#xf0a6;','Вернуться к прежней','статье');
         $this->Punkt($this->cPreMe.mmlOtpravitAvtoruSoobshchenie,'&#xf01c;','Отправить автору','сообщение');
         $this->Punkt($this->cPreMe.mmlVojtiZaregistrirovatsya,'&#xf007;','Войти или','зарегистрироваться');
      }
      // Закрываем меню
      echo '</ul>';
   }
   // --------------------------------------------------- ВНУТРЕННИЕ МЕТОДЫ ---

   // *************************************************************************
   // *   Определить работаем ли на хостинге сайта 'ittve.me' или localhost   *
   // *************************************************************************
   private function is_ittveme()
   { 
      $Result=false;
      if (
        ($_SERVER['HTTP_HOST']=='ittve.me')||
        ($_SERVER['HTTP_HOST']=='www.ittve.me')||
        ($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
      {  
         $Result=true;
      }
      return $Result;
   }
   // *************************************************************************
   // *                  Вывести кнопку меню управления страницей             *
   // *************************************************************************
   private function Punkt($Punkt,$cUniCod,$fString,$sString)
   {
      // Формируем идентификатор для отработки кнопки "small" по юникоду
      $idsmall=substr($cUniCod,3,4); 
      echo '
         <li class="link" title="'.$this->SayPref().'">
         <span class="prev">'.$cUniCod.'</span>
         <span class="small" onclick="PunktClick(\''.$idsmall.'\')">'.$cUniCod.'</span>
         <span class="full">
            <span class="k1"><a href="'.$Punkt.'" id="'.$idsmall.'">'.$fString.'</a></span>
            <span class="k2"><a href="'.$Punkt.'">'.$sString.'</a></span>
         </span>
         </li>
      ';
   }
   private function SayPref()
   {
      return $this->cPreMe;
   }
} 

// **************************************************** MenuLeaderClass.php ***
