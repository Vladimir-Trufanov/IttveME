<?php namespace ttools; 
                                         
// PHP7/HTML5, EDGE/CHROME                         *** TinyGalleryClass.php ***

// ****************************************************************************
// * TPhpTools                Фрэйм области редактирования текущего материала *
// *                 и галереи изображений, связанной с этим материалом (uid) *
// *                                    из выбранной (указанной) группы (pid) *
// *                                                                          *
// * v2.0, 10.02.2022                              Автор:       Труфанов В.Е. *
// * Copyright © 2022 tve                          Дата создания:  18.12.2019 *
// ****************************************************************************

/**
 * Для взаимодействия с объектами класса должны быть определены переменные
 * и константы:
 *    
 * $SiteRoot    - корневой каталог сайта (в файловой системе сервера)
 * $urlHome     - начальная страница сайта
 *
 * pathPhpTools - путь к каталогу с файлами библиотеки прикладных классов;
 * pathPhpPrown - путь к каталогу с файлами библиотеки прикладных функции
 * articleSite  - тип базы данных (по сайту)
 * editdir      - каталог размещения файлов, связанных c материалом
 * stylesdir    - каталог стилей элементов разметки и фонтов
 * jsxdir       - каталог размещения файлов javascript
 * 
 * nym          - префикс имен файлов для фотографий галереи и материалов
 * 
 * Пример создания объекта класса и порядок работы с ним:
 * 
 * // Указываем место размещения библиотеки прикладных функций TPhpPrown
 * define ("pathPhpPrown",$SiteHost.'/TPhpPrown/TPhpPrown');
 * // Указываем место размещения библиотеки прикладных классов TPhpTools
 * define ("pathPhpTools",$SiteHost.'/TPhpTools/TPhpTools');
 * // Указываем тип базы данных (по сайту) для управления классом ArticlesMaker
 * define ("articleSite",'IttveMe'); 
 * // Указываем каталоги размещения файлов
 * define("editdir",'ittveEdit');  // файлы, связанные c материалом
 * define("stylesdir",'Styles');   // стили элементов разметки и фонты
 * define("jsxdir",'Jsx');         // файлы javascript
 * // Указываем префикс имен файлов для фотографий галереи и материалов
 * define('nym','ittve');
 *  
 * // Подгружаем нужные модули библиотеки прикладных классов
 * require_once pathPhpTools."/TArticlesMaker/ArticlesMakerClass.php";
 * require_once pathPhpTools."/TTinyGallery/TinyGalleryClass.php";
 * // Подключаем объект для работы с базой данных материалов
 * // (при необходимости создаем базу данных материалов)
 * $basename=$_SERVER['DOCUMENT_ROOT'].'/ittve'; $username='tve'; $password='23ety17';
 * $Arti=new ttools\ArticlesMaker($basename,$username,$password);
 * if (!file_exists($basename.'.db3')) $Arti-> BaseFirstCreate();
 * 
 * // Подключаем объект по редактированию материала - для работы в галерее 
 * // и рабочей области редактирования
 * $WorkTinyHeight='60'; $FooterTinyHeight='35'; $KwinGalleryWidth='30'; $EdIzm='%';
 * $Edit=new ttools\TinyGallery($SiteRoot,$urlHome,
 *    $WorkTinyHeight,$FooterTinyHeight,$KwinGalleryWidth,$EdIzm,$Arti);
 * 
 * echo '<head>';
 *    // Подключаем jquery и jquery-ui скрипты 
 *    echo ' 
 *       <script src="jquery-1.11.1.min.js"></script>
 *       <script src="jquery-ui.min.js"></script>
 *    ';
 *    // Подключаем стили для редактирования материалов
 *    $Edit->IniEditSpace();
 * echo '</head>';
 * // Разворачиваем область для редактирования материала
 * echo '
 *    <body> 
 *    <div id="Info">
 * ';
 * $Edit->OpenEditSpace();
 * echo '
 *    </div>
 *    </body>
 * ';
 * 
**/

require_once pathPhpPrown."/CommonPrown.php";
require_once pathPhpTools."/CommonTools.php";
require_once "ttools/TTinyGallery/WorkTiny.php";

define ("ttMessage", 1);  // вывести информационное сообщение
define ("ttError",   2);  // вывести сообщение об ошибке
 
define ("NoDefine", -1);  // Признак того, что группа материалов не выбрана

class TinyGallery
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $SiteRoot;         // корневой каталог сайта
   protected $urlHome;          // начальная страница сайта
   protected $editdir;          // каталог размещения файлов, связанных c материалом
   protected $cPref;            // префикс вызова страницы на сайте и localhost
   protected $WorkTinyHeight;   // высота рабочей области Tiny
   protected $FooterTinyHeight; // высота подвала области редактирования
   protected $KwinGalleryWidth; // ширина галереи изображений
   protected $EdIzm;            // единица измерения заданных параметров
   
   protected $Arti;             // объект по работе с базой данных материалов
   protected $contents;         // текущий материал
   protected $NameGru;          // заголовок текущей группы материалов
   protected $NameArt;          // заголовок текущего материала
   protected $DateArt;          // зата текущего материала
   protected $fileStyle;        // файл стилей элементов класса
   protected $apdo;             // подключение к базе данных материалов
   protected $menu;             // управляющее меню в подвале
   
   protected $Galli;            // объект управления изображениями в галерее
   protected $pidEdit;          // идентификатор группы материалов в базе данных
   protected $uidEdit;          // одентификатор материала
   
   protected $DelayedMessage;   // отложенное сообщение

   // ------------------------------------------------------- МЕТОДЫ КЛАССА ---
   public function __construct($SiteRoot,$urlHome,
      $WorkTinyHeight,$FooterTinyHeight,$KwinGalleryWidth,$EdIzm,$Arti) 
   {
      // Инициализируем свойства класса
      $this->SiteRoot=$SiteRoot; 
      $this->urlHome=$urlHome; 
      $this->fileStyle="Styles/WorkTiny.css";
      $this->editdir=editdir; 
      $this->pidEdit=-1; 
      $this->uidEdit=-1; 
      // Регистрируем объект по работе с базой данных материалов
      $this->Arti=$Arti;
      // Считываем предопределенные размеры частей рабочей области редактирования
      $this->WorkTinyHeight=$WorkTinyHeight;
      $this->FooterTinyHeight=$FooterTinyHeight;
      $this->KwinGalleryWidth=$KwinGalleryWidth;
      $this->EdIzm=$EdIzm;
      // Подключаемся к базе данных материалов
      $this->apdo=$this->Arti->BaseConnect();
      // Инициируем отложенное сообщение, то есть сообщение, которое может быть
      // выведено на фазе BODY процесса построения страницы сайта 
      $this->DelayedMessage=imok;
      // Выполняем действия на странице до отправления заголовков страницы: 
      // (устанавливаем кукисы и т.д.)                  
      $this->ZeroEditSpace();
      // Трассируем установленные свойства
      //\prown\ConsoleLog('$this->WorkTinyHeight='.$this->WorkTinyHeight); 
   }
   public function __destruct() 
   {
   }
      
   // ------------------------------------------------------------------------------------------------ ZERO ---

   // *************************************************************************
   // *   Выполнить действия на странице до отправления заголовков страницы:  *
   // *                         (установить кукисы и т.д.)                    *
   // *************************************************************************
   private function ZeroEditSpace()

   // id=WorkTiny ------------------------------- id=KwinGallery --------------
   // .------------------------------------------.                            .                        
   // . id=NameGru                    id=NameArt .                            .
   // .------------------------------------------.                            .
   // .id=frmTinyText ---------------------------.                            .
   // .                                          .                            .
   // . id=mytextarea                            .                            .
   // .                                          .                            .
   // .                                          .                            .
   // id=FooterTiny -----------------------------.                            .
   // . id=UlTiny                                .                            .
   // .                                          .                            .
   // -------------------------------------------------------------------------

   {
      // Проверяем, нужно ли заменить файл стилей в каталоге редактирования и,
      // (при его отсутствии, при несовпадении размеров или старой дате) 
      // загружаем из класса 
      CompareCopyRoot('CommonTools.js',pathPhpTools,jsxdir);
      // Если выбран материал (транслит) для редактирования, то готовим 
      // установку кукиса на данный материал. Материал мог быть выбран при 
      // выполнении методов:
      //    $apdo=$this->Arti->BaseConnect();
      //    $this->Arti->GetPunktMenu($apdo);
      $getArti=\prown\getComRequest('arti'); // выбрали транслит 
      // Если было назначение нового материала/статьи, 
      // то делаем запись в базу данных и готовим транслит статьи для установки
      // кукиса и начала редактирования материала
      if ((\prown\getComRequest('nsnCue')<>NULL)&&
      (\prown\getComRequest('nsnName')<>NULL)&&
      (\prown\getComRequest('nsnGru')<>NoDefine)&&
      (\prown\getComRequest('nsnDate')<>NULL))
      {
         // Делаем новую запись в базе данных
         $apdo=$this->Arti->BaseConnect();
         $NameArt=\prown\getComRequest('nsnName');
         $DateArt=\prown\getComRequest('nsnDate');
         $pid=\prown\getComRequest('nsnCue');
         $Translit=\prown\getTranslit($NameArt);
         $NameGru=\prown\getComRequest('nsnGru');
         $contents='Новый материал';
         $this->Arti->InsertByTranslit($apdo,$Translit,$pid,$NameArt,$DateArt,$contents);
         // Готовим кукис текущего материала
         $getArti=$Translit;
      }
      // Если был выбран режим сохранения отредактированного материала, 
      // то сохраняем его    
      $contentNews=\prown\getComRequest('mytextarea');
      if ($contentNews<>NULL)
      {
         $this->Arti->UpdateByTranslit($this->apdo,$this->Arti->getArti,$contentNews);
      }
      // Устанавливаем кукис на новый или выбранный материал
      if ($getArti<>NULL)
      {
         $this->Arti->cookieGetPunktMenu($getArti); 
      }
      // Вытаскиваем материал для редактирования
      $this->DelayedMessage=$this->Arti->SelUidPid
         ($this->apdo,$this->Arti->getArti,$pidEdit,$uidEdit,$NameGru,$NameArt,$DateArt,$contentsIn);
      // Запоминаем в объекте текущий материал
      $this->contents=html_entity_decode($contentsIn);
      $this->NameGru=$NameGru;
      $this->NameArt=$NameArt;
      $this->DateArt=$DateArt;
      $this->pidEdit=$pidEdit; 
      $this->uidEdit=$uidEdit; 
      // Cоздаем объект для управления изображениями в галерее, связанной с 
      // материалами сайта из базы данных
      $this->Galli=new KwinGallery(editdir,nym,$pidEdit,$uidEdit,$this->SiteRoot,$this->urlHome,$this->Arti);
      $this->DelayedMessage=$this->Galli->getDelayedMessage();
   }
   
   // --------------------------------------------------------------------------------------- HEAD and LAST ---

   // *************************************************************************
   // *        Установить стили пространства редактирования материала         *
   // *************************************************************************
   public function IniEditSpace()
   {
      // Настраиваемся на файлы стилей и js-скрипты
      $this->Arti->IniEditSpace();
      // <script src="/Jsx/CommonTools.js"></script>
      echo '<script src="/'.jsxdir.'/CommonTools.js"></script>';
      
      // Настраиваем размеры частей рабочей области редактирования
      // 28.02.2023 - может в будущем пригодится !!!
     
      echo '
      <style>
      #WorkTiny
      {
         width:100%;
         height:96%;
           overflow: hidden;

      }
      </style>
      ';
      
      
      /*
      echo '
      <style>
      #KwinGallery
      {
         width:'.$this->KwinGalleryWidth.$this->EdIzm.';'.'
         height:'.($this->WorkTinyHeight+$this->FooterTinyHeight).$this->EdIzm.';'.'
      }
      #WorkTiny,#FooterTiny
      {
         width:'.(100-$this->KwinGalleryWidth).$this->EdIzm.';'.'
      }
      #WorkTiny
      {
         height:'.$this->WorkTinyHeight.$this->EdIzm.';'.'
      }
      #FooterTiny
      {
         top:'.$this->WorkTinyHeight.$this->EdIzm.';'.'
         height:'.$this->FooterTinyHeight.$this->EdIzm.';'.'
      }
      </style>
      ';
      */
      if (\prown\isComRequest(mmlZhiznIputeshestviya))
         mmlZhiznIputeshestviya_HEAD();
      else if (\prown\isComRequest(mmlNaznachitStatyu))
         mmlNaznachitStatyu_HEAD();
      else if (\prown\isComRequest(mmlVybratStatyuRedakti))
         $this->IniEditSpace_mmlVybratStatyuRedakti();
      else if (\prown\isComRequest(mmlUdalitMaterial))
         $this->IniEditSpace_mmlUdalitMaterial();
      else main_HEAD($this->fileStyle);
   }
   // *************************************************************************
   // *                Развернуть область галлереи изображений                *
   // *************************************************************************
   public function ViewGallerySpace()
   {
      if (\prown\isComRequest(mmlNaznachitStatyu))
         mmlNaznachitStatyu_BODY_KwinGallery();
      else if (\prown\isComRequest(mmlVybratStatyuRedakti))
         $this->KwinGallery_mmlVybratStatyuRedakti();
      else $this->Galli->BaseGallery();
   }
   // *************************************************************************
   // *                Развернуть область галлереи изображений                *
   // *************************************************************************
   public function ViewFooterSpace($UserAgent)
   {
      // Кнопка главного меню 
      echo '<div id="LifeMenu">';
         echo '
         <ul id="btnLifeMenu">
         <li>
            <a href= "'.'?Com='.mmlZhiznIputeshestviya.'">
            <img id="imgLifeMenu" src="/Images/tveMenuD.png" alt="tveMenuD">
            </a> 
         </li> 
         </ul>
         ';
      echo '</div>';
      // Левая часть подвала для сообщений, разворачиваемых в три строки
      echo '<div id="LeftFooter">';
         echo $UserAgent.'<br>';
      echo '</div>';
      // Правая часть подвала, меню управления
      echo '<div id="RightFooter">';
         $this->menu=new MenuLeader(ittveme,$this->urlHome);
         $this->menu->Menu(); 
      echo '</div>';
   }
   // *************************************************************************
   // *              Открыть пространство редактирования материала            *
   // *************************************************************************
   public function OpenEditSpace($aPresMode,$aModeImg,$urlHome)
   {
   // Включаем в разметку рабочую область редактирования
   echo '<div id="WorkTiny">';
      // Выводим меню для выбора материала --------- ?Com=zhizn-i-puteshestviya
      if (\prown\isComRequest(mmlZhiznIputeshestviya))
         mmlZhiznIputeshestviya_BODY_WorkTiny($this->apdo,$this->Arti);
      // Выбираем страницу сообщения автору - ?Com=otpravit-avtoru-soobshchenie
      else if (\prown\isComRequest(mmlOtpravitAvtoruSoobshchenie))
         mmlOtpravitAvtoruSoobshchenie_BODY_WorkTiny($this->apdo,$this->Arti);
      // Выбираем страницу настроек --- ?Com=izmenit-nastrojki-sajta-v-brauzere
      else if (\prown\isComRequest(mmlIzmenitNastrojkiSajta))
         mmlIzmenitNastrojkiSajta_BODY_WorkTiny($aPresMode,$aModeImg,$urlHome);
      // Выбираем вход/регистрацию ---------- ?Com=vojti-ili-zaregistrirovatsya
      else if (\prown\isComRequest(mmlVojtiZaregistrirovatsya))
         mmlVojtiZaregistrirovatsya_BODY_WorkTiny($this->apdo,$this->Arti);
      // Добавляем новый раздел ---------- ?Com=dobavit-novyj-razdel-materialov
      else if (\prown\isComRequest(mmlDobavitNovyjRazdel))
         mmlDobavitNovyjRazdel_BODY_WorkTiny($this->apdo,$this->Arti);
      // Изменяем раздел или иконку -- ?Com=izmenit-nazvanie-razdela-ili-ikonku
      else if (\prown\isComRequest(mmlIzmenitNazvanieIkonku))
         mmlIzmenitNazvanieIkonku_BODY_WorkTiny($this->apdo,$this->Arti);
      // Удаляем раздел материалов -------------- ?Com=udalit-razdel-materialov
      else if (\prown\isComRequest(mmlUdalitRazdelMaterialov))
         mmlUdalitRazdelMaterialov_BODY_WorkTiny($this->apdo,$this->Arti);
         
      // Перезапускаем страницу "Назначить статью"
      else if (\prown\isComRequest(mmlNaznachitStatyu))
         mmlNaznachitStatyu_BODY_WorkTiny
         ('Укажите название и дату для новой статьи, выберите раздел материалов',$this->apdo,$this->Arti);
      else if (\prown\isComRequest(mmlVybratStatyuRedakti))
         $this->WorkTiny_mmlVybratStatyuRedakti();
      else if (\prown\isComRequest(mmlUdalitMaterial))
         $this->WorkTiny_mmlUdalitMaterial();
      // В обычном режиме
      else $this->WorkTiny_main();
   echo '</div>';
   }

   // --------------------------------------------------- ВНУТРЕННИЕ МЕТОДЫ ---

   private function IniEditSpace_mmlVernutsyaNaGlavnuyu()
   {
      \prown\ConsoleLog('IniEditSpace_mmlVernutsyaNaGlavnuyu'); 
   }
   private function IniEditSpace_mmlUdalitMaterial()
   {
      // Отключаем разворачивание аккордеона
      // в случае, когда создаем заголовок новой статьи. 
      echo '
      <style>
      .accordion li .sub-menu 
      {
         height:100%;
      }
      </style>
      ';
      
      echo '
      <script>
      </script>
      ';
      // Включаем рождественскую версию шрифтов и полосок меню
      IniFontChristmas();
   }
   private function IniEditSpace_mmlVybratStatyuRedakti()
   {
      // Включаем рождественскую версию шрифтов и полосок меню
      IniFontChristmas();
   }
   // *************************************************************************
   // *     Открыть рабочую область и обеспечить редактирование материала     *
   // *************************************************************************
   private function WorkTiny_main()
   {
      //phpinfo();

      // Выводим заголовок статьи
      if ($this->DelayedMessage==imok)
         MakeTitle($this->NameGru,$this->NameArt,$this->DateArt);
      else 
         MakeTitle($this->DelayedMessage,ttError);
      // Формируем контент страницы   
      if ($this->contents<>NULL) $contenti=$this->contents;
      else $contenti='';

      // Если режим редактирования, то готовим рабочую область Tiny  
      if (GalleryMode==mwgEditing) 
      {
         $SaveAction=$_SERVER["SCRIPT_NAME"];
         echo '
            <form id="frmTinyText" method="post" action="'.$SaveAction.'">
            <textarea id="mytextarea" name="mytextarea">
         '; 
         echo $contenti;
         echo '
            </textarea>
            </form>
         ';
      }
      else echo $contenti; 
   }
   private function WorkTiny_mmlVernutsyaNaGlavnuyu()
   {
      echo 'WorkTiny_mmlVernutsyaNaGlavnuyu<br>';
   }
   private function WorkTiny_mmlUdalitMaterial()
   {
      // Выводим заголовочное сообщение
      MakeTitle('Выбрать материал для удаления',ttMessage);
      // Строим меню
      $this->Arti->MakeUniMenu($this->apdo,'','UdalitMater');
   }
   // *************************************************************************
   // *                     Выбрать статью для редактирования                 *
   // *             (дополнительно проверить целостность базы данных)         *
   // *************************************************************************
   private function WorkTiny_mmlVybratStatyuRedakti()
   {
      // Выводим заголовочное сообщение
      MakeTitle('Выбрать статью для редактирования',ttMessage);
      // Выбираем статью для редактирования и, дополнительно,
      // проверяем целостность базы данных
      $this->Arti->getPunktMenu($this->apdo); 
   }
   private function KwinGallery_mmlVernutsyaNaGlavnuyu()
   {
      echo 'KwinGallery_mmlVernutsyaNaGlavnuyu<br>';
   }
   private function KwinGallery_mmlVybratStatyuRedakti()
   {
      echo 'KwinGallery_mmlVybratStatyuRedakti<br>';
   }

} 
// *************************************************** TinyGalleryClass.php ***
