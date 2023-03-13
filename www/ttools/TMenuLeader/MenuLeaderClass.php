<?php namespace ttools; 
                                         
// PHP7/HTML5, EDGE/CHROME                          *** MenuLeaderClass.php ***

// ****************************************************************************
// * TPhpTools                Фрэйм управляющего меню для обобщенной работы в *
// *               "ittve.me" и "kwintiny" работающего через TinyGalleryClass *
// *                                                                          *
// * v2.0, 26.02.2023                              Автор:       Труфанов В.Е. *
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
define ("kwintiny",'-k');

class MenuLeader
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $typemenu;  // тип меню (для ittve.me или kwintiny)
   protected $urlHome;   // начальная страница сайта 
   protected $classdir;  // путь к каталогу файлов класса
   // ------------------------------------------ ПРЕФИКСЫ ПАРАМЕТРОВ В МЕНЮ ---
   protected $cPreMe;    // общие для сайта 'ittve.me' 
   protected $ComTiny;   // общие для фрэйма 'kwintiny' 
   // ------------------------------------------------------- МЕТОДЫ КЛАССА ---
   public function __construct($typemenu,$urlHome) 
   {
      // Инициализируем свойства класса
      $this->typemenu=$typemenu; 
      $this->urlHome=$urlHome; 
      $this->classdir=pathPhpTools.'/TMenuLeader'; 
      // Формируем префиксы вызова страниц для сайта 'ittve.me' и localhost
      // if ($this->is_ittveme()) $this->cPreMe='';  else 
      $this->cPreMe='?Com=';
      //if ($this->is_ittveme()) $this->ComTiny=''; else 
      $this->ComTiny='?Com=';
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
      // Зажигаем верхнюю и нижнюю границы кнопки "Всякое-разное"       
      echo'  
      <style>
         #glass3:before 
         {
            position:absolute;
            content: "";
            top:-1.52px;
            left:2%;
            width:96%;
            height:2px;
            background:linear-gradient(
               to right,
               rgba(255,140,0,0) 0%,
               rgba(255,140,0,0.75) 15%,
               rgba(255,140,0,0.9) 50%,
               rgba(255,140,0,0.75) 85%,
               rgba(255,140,0,0) 100%
            );
            z-index: 1;
         }
         #glass3:after 
         {
            position:absolute;
            content:"";
            top:100%;
            left:2%;
            width:96%;
            height:2px;
            background:linear-gradient(
               to right,
               rgba(255,140,0,0) 0%,
               rgba(255,140,0,0.5) 5%,
               rgba(255,140,0,0.9) 50%,
               rgba(255,140,0,0.5) 95%,
               rgba(255,140,0,0) 100%
            );
            z-index: 1;
         }
      </style>
      ';
      // Показываем наезд указателем на кнопку "Всякое-разное"       
      echo'  
      <style>
         #glass3hover
         {
            position:relative;
            top:-25px;
            width:323px;
            height:30px;
            line-height:24px;
            border-radius:6px;
            color:#696969;
            background:radial-gradient(
               ellipse at center,
               rgba(255,255,255,1) 0%,
               rgba(255,255,255,0) 100%
            );
            opacity:0.0;
            transition:all 0.3s ease-in-out;
            z-index:2;
            box-shadow:0 0 6px 3px rgba(255,255,255,0.5);
            border:2px groove rgba(255,255,255,0.5);
         }
         div:hover#glass3hover 
         {
            opacity: 1.0;
         }
      </style>
      ';
      // Вырисовываем "начальное стеклышко" кнопки       
      echo'  
      <style>
         #glass3ref 
         {
            position:relative;
            top:-52px;
            width:400px;
            height:24px;
            border-radius:6px;
            background:linear-gradient(
               172deg,
               rgba(255,255,255,0.8) 0%,
               rgba(255,255,255,0.4) 20%,
               rgba(255,255,255,0.1) 48%,
               rgba(255,255,255,0.0) 49%,
               rgba(255,255,255,0.0) 100%
            );
            z-index: 1;
         }
      </style>
      ';
      // Показываем нажатую кнопку       
      echo'  
      <style>
         div:active#glass3hover  
         {
            color:rgba(105,105,105 0.99);
            line-height:26px;
            text-shadow:0px 0px 2px rgba(255,255,255,0.99),0px 0px 4px rgba(255,255,255,0.75);
            border-color:rgba(255,255,255,0.4);
         }
      </style>
      ';
      // Показываем три звездочки       
      echo'  
      <style>
      div.glass3hi:before 
      {
         position:absolute;
         content:"";
         top:-2px;
         left:10%;
         width:16px;
         height:3px;
         z-index:1;
      }
      div.glass3hi:after 
      {
          position:absolute;
          content:"";
          top:-2px;
          left:calc(10% + 16px);
          width:4px;
          height:2px;
          background-color:#FF8C00;
          box-shadow:0 0 8px 3px rgba(255, 140, 0, .99);
          z-index:1;
      }
      #hi2 {
         transform: translate(188px, -48px);
         z-index: 9;
      }
      #hi3 {
         transform: rotate(90deg) translate(44px,-161px);
         z-index: 9;
      }
      </style>
      ';
   }
   // *************************************************************************
   // *                Отработать меню управления (общая часть)               *
   // *************************************************************************
   public function Menu()
   {
      if ($this->typemenu==ittveme)
      {
         $this->Menu_ittveme();   
      }
      else
      {
         $this->Menu_kwintiny();   
      }
   }
   // *************************************************************************
   // *             Отработать меню управления на фрэйме "KwinTiny"           *
   // *************************************************************************
   private function Menu_kwintiny()
   {
      // Формируем префикс вызова страниц из меню на сайте и localhost
      $cPref=$this->ComTiny;
      echo '
         <ul class="uli">
         <li class="ili"><a class="ali" href="'.$cPref.mmlVernutsyaNaGlavnuyu.'">На главную</a></li>
         <li class="ili"><a class="ali" href="'.$cPref.mmlUdalitMaterial     .'">Удалить материал</a></li>
         <li class="ili">'.'<input type="submit" value="Сохранить материал" form="frmTinyText" onclick="SaveStuff()">'.'</li>
         </ul>   
      ';
   }
   // *************************************************************************
   // *             Отработать меню управления на сайте "ittve.me"            *
   // *************************************************************************
   private function Menu_ittveme()
   {
      // Начинаем меню с отсылкой к автору идеи
      echo '
         <!--
         Copyright (c) 2017 by Oliver Knoblich (https://codepen.io/oknoblich/pen/hpltK)
         -->
         <ul class="navset">
      ';
      // ------------------------------
      // Выводим пункты меню управления для страниц из главного меню
      if (\prown\isComRequest(mmlZhiznIputeshestviya)||
      \prown\isComRequest(mmlDobavitNovyjRazdel)||
      \prown\isComRequest(mmlIzmenitNazvanieIkonku)||
      \prown\isComRequest(mmlUdalitRazdelMaterialov))
      {
         $this->Punkt($this->urlHome,'&#xf015;','Вернуться','на главную страницу');
         $this->Punkt($this->cPreMe.mmlDobavitNovyjRazdel,'&#xf0f2;','Добавить новый','раздел материалов');
         $this->Punkt($this->cPreMe.mmlIzmenitNazvanieIkonku,'&#xf086;','Изменить название','раздела или иконку');
         $this->Punkt($this->cPreMe.mmlUdalitRazdelMaterialov,'&#xf1f8;','Удалить раздел','материалов');
      }
      // Выводим пункты меню для страницы изменения настроек сайта
      else if (\prown\isComRequest(mmlIzmenitNastrojkiSajta))
      {
         $this->Punkt($this->urlHome,'&#xf015;','Вернуться','на главную страницу');
         $this->Punkt($this->cPreMe.mmlOtpravitAvtoruSoobshchenie,'&#xf01c;','Отправить автору','сообщение');
         $this->Punkt($this->cPreMe.mmlVojtiZaregistrirovatsya,'&#xf007;','Войти или','зарегистрироваться');
         $this->Punkt($this->cPreMe.mmlSozdatRedaktirovat,'&#xf044;','Создать материал','или редактировать');
      }
      // Выводим пункты меню страницы для входа и регистрации
      else if (\prown\isComRequest(mmlVojtiZaregistrirovatsya))
      {
         $this->Punkt($this->urlHome,'&#xf015;','Вернуться','на главную страницу');
         $this->Punkt($this->cPreMe.mmlOtpravitAvtoruSoobshchenie,'&#xf01c;','Отправить автору','сообщение');
         $this->Punkt($this->cPreMe.mmlIzmenitNastrojkiSajta,'&#xf013;','Изменить настройки','сайта в браузере');
         $this->Punkt($this->cPreMe.mmlSozdatRedaktirovat,'&#xf044;','Создать материал','или редактировать');
      }
      // Выводим пункты для страницы сообщения автору 
      else if (\prown\isComRequest(mmlOtpravitAvtoruSoobshchenie))
      {
         $this->Punkt($this->urlHome,'&#xf015;','Вернуться','на главную страницу');
         $this->Punkt($this->cPreMe.mmlIzmenitNastrojkiSajta,'&#xf013;','Изменить настройки','сайта в браузере');
         $this->Punkt($this->cPreMe.mmlVojtiZaregistrirovatsya,'&#xf007;','Войти или','зарегистрироваться');
         $this->Punkt($this->cPreMe.mmlSozdatRedaktirovat,'&#xf044;','Создать материал','или редактировать');
      }
      // ---------------------- Выводим пункты меню при работе с материалом ---
      else if (\prown\isComRequest(mmlSozdatRedaktirovat)||\prown\isComRequest(mmlNaznachitStatyu))
      {
         $this->Punkt($this->urlHome,'&#xf015;','Вернуться','на главную страницу');
         $this->Punkt($this->cPreMe.mmlNaznachitStatyu,'&#xf0f6;','Назначить','новую статью');
         $this->Punkt($this->cPreMe.mmlVybratStatyuRedakti,'&#xf07c;','Выбрать материал','для изменений');
         $this->Punkt($this->cPreMe.mmlUdalitMaterial,'&#xf1f8;','Удалить','указанный материал');
         //$cPost='<input type="submit" value="Сохранить материал" form="frmTinyText">';
         //$this->PunktPost('&#xf0ed;',$cPost,"Сохранить материал");
      }
      else if (\prown\isComRequest(mmlSozdatRedaktirovat))
      {
         $this->Punkt($this->urlHome,'&#xf015;','Вернуться','на главную страницу');
         $this->Punkt($this->cPreMe.mmlNaznachitStatyu,'&#xf0f6;','Назначить','новую статью');
         $this->Punkt($this->cPreMe.mmlVybratStatyuRedakti,'&#xf07c;','Выбрать материал','для изменений');
         $this->Punkt($this->cPreMe.mmlUdalitMaterial,'&#xf1f8;','Удалить','указанный материал');
         //$cPost='<input type="submit" value="Сохранить материал" form="frmTinyText">';
         //$this->PunktPost('&#xf0ed;',$cPost,"Сохранить материал");
      }
      // Выводим пункты меню главной страницы
      else
      {
         $this->Punkt($this->cPreMe.mmlVybratSledMaterial,'&#xf0a7;','Выбрать следующий','материал');
         $this->Punkt($this->cPreMe.mmlVernutsyaPredState,'&#xf0a6;','Вернуться к прежней','статье');
         $this->Punkt($this->cPreMe.mmlOtpravitAvtoruSoobshchenie,'&#xf01c;','Отправить автору','сообщение');
         $this->Punkt($this->cPreMe.mmlVojtiZaregistrirovatsya,'&#xf007;','Войти или','зарегистрироваться');
         
         /*
         $this->Punkt($this->cPreMe.mmlIzmenitNastrojkiSajta,'&#xf013;','Прочитать о сайте,','изменить настройки');
         $this->Punkt($this->cPreMe.mmlSozdatRedaktirovat,'&#xf044;','Создать материал','или редактировать');
         */
      }
      // Закрываем меню
      echo '</ul>';
   }
   
   
  
   // *************************************************************************
   // *   Создать "всякую-разную" кнопку в подвальной области "LeftFooter"    *
   // *************************************************************************
   public function MakeAnyDiffButton()
   {
      // Готовим обработку клика на кнопке "всякое-разное" 
      echo '
         <script>
         function onClickAnyDiff()
         {
            console.log("Нажата всякая-разная кнопка!");
         }
         </script>
      ';
      // Позиционируем элементы кнопки
      echo '
      <script>
      let cssValues; // массив CSS-свойств элемента
      
      $(document).ready(function()
      {
         let LeftFooter=document.getElementById("LeftFooter");

         // Строим рабочую область для кнопки
         let btnBody=document.createElement("div");
         btnBody.setAttribute("id","btnBody");
         LeftFooter.appendChild(btnBody);
         // Настраиваем стили рабочей области для кнопки
         cssValues = {
            "color":"red",
            "font-family":"\'Nova Flat\', cursive",
            "font-size":"12pt",
            "position":"absolute",
            "top":"0",
            "height":"100%",
            "width":"96%",
            "margin-left":"1%",
            "overflow":"hidden",
         }
         $("#btnBody").css(cssValues);
         cssValues = {
            "text-align":"center",
            "background":"#e0e3ec url(../Images/Menu/bgnoise_lg.jpg) repeat top left",
         }
         $("#btnBody").css(cssValues);

         // Строим "всякую-разную" кнопку
         let glass3Html="Всякое-разное";
         let glass3=document.createElement("div");
         glass3.setAttribute("id","glass3");
         btnBody.appendChild(glass3);
         $("#glass3").html(glass3Html);
         // Настраиваем стили рабочей области для кнопки
         cssValues = {
            "position":"relative",
            "color":"rgba(255,140,0,1.6)",
            "font-size":"16px",
            "text-decoration":"none",
            "margin-top":".8rem",
            "cursor":"pointer",
            "width":"324px",
            "height":"29px",
            "outline":"0",
         }
         $("#glass3").css(cssValues);
         cssValues = {
            "line-height":"24px",
            "padding-left":"0",
            "padding-right":"0",
            "margin-left":"auto",
            "margin-right":"auto",
         }
         $("#glass3").css(cssValues);
         cssValues = {
            "border-color":"rgba(255,140,0,1.6)",
            "border-image":"none",
            "border-style":"double",
            "border-width":"1px",
            "border-radius":"8px",
            "-webkit-border-radius":"8px",
            "-moz-border-radius":"8px",
            "-webkit-transition":"all 0.1s ease-in-out",
            "-moz-transition":"all 0.1s ease-in-out",
            "-o-transition":"all 0.1s ease-in-out",
            "transition":"all 0.1s ease-in-out",
         }
         $("#glass3").css(cssValues);
         
         // Строим образ "всякой-разной" кнопки при наезде на нее
         // <div id="glass3hover" onclick="functionToExecute()">This текст</div>
         let glass3hover=document.createElement("div");
         glass3hover.setAttribute("id","glass3hover");
         glass3hover.setAttribute("onclick","onClickAnyDiff()");
         glass3.appendChild(glass3hover);
         $("#glass3hover").html(glass3Html);
         
         // Строим "начальное стеклышко" кнопки
         // <div id="glass3ref"></div>
         let glass3ref=document.createElement("div");
         glass3ref.setAttribute("id","glass3ref");
         glass3.appendChild(glass3ref);
         
         // Строим три звездочки на кнопке
         // <div class="glass3hi"></div>
         // <div id="hi2" class="glass3hi"></div>
         // <div id="hi3" class="glass3hi"></div>
         let hi1=document.createElement("div");
         hi1.setAttribute("class","glass3hi");
         glass3.appendChild(hi1);
         let hi2=document.createElement("div");
         hi2.setAttribute("class","glass3hi");
         glass3.appendChild(hi2);
         let hi3=document.createElement("div");
         hi3.setAttribute("class","glass3hi");
         glass3.appendChild(hi3);
         hi2.setAttribute("id","hi2");
         hi3.setAttribute("id","hi3");
      });
      </script>';
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
         <li class="link">
         <span class="prev">'.$cUniCod.'</span>
         <span class="small" onclick="PunktClick(\''.$idsmall.'\')">'.$cUniCod.'</span>
         <span class="full">
            <span class="k1"><a href="'.$Punkt.'" id="'.$idsmall.'">'.$fString.'</a></span>
            <span class="k2"><a href="'.$Punkt.'">'.$sString.'</a></span>
         </span>
         </li>
      ';
   }
   /*
   private function PunktPost($cUniCod,$cPost,$fill)
   {
      echo '
         <li class="link">
         <span class="prev">'.$cUniCod.'</span>
         <span class="small">'.$cUniCod.'</span>
         <span class="full">
         '.$cPost.'
         </span>
         </li>
      ';
   }
   */
   // <span class="k1"><a href="'.$Punkt.'">'.$fString.'</a></span>
   // <span class="k2"><a href="'.$Punkt.'">'.$sString.'</a></span>
} 

// **************************************************** MenuLeaderClass.php ***
