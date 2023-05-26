<?php namespace ttools; 
                                         
// PHP7/HTML5, EDGE/CHROME                         *** TinyGalleryClass.php ***

// ****************************************************************************
// * TPhpTools                Фрэйм области редактирования текущего материала *
// *                 и галереи изображений, связанной с этим материалом (uid) *
// *                                    из выбранной (указанной) группы (pid) *
// *                                                                          *
// * v3.0, 22.04.2023                              Автор:       Труфанов В.Е. *
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
require_once "ttools/TTinyGallery/Dispatch_ZERO.php";
require_once "ttools/TTinyGallery/Dispatch_HEAD.php";
require_once "ttools/TTinyGallery/Dispatch_BODY.php";

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
   private   $WhipperSnapper;   // игра при выводе ошибки
   private   $WorkTinyMain;     // объект "Обеспечить работу с материалом в рабочей области"
   private   $ZhizniPuti;       // объект "Подготовить и развернуть меню "Жизнь и путешествия"
   private   $Newcue;           // объект "Добавить новый раздел материалов"
   private   $NewArt;           // объект "Назначить новую статью"
   private   $DelCue;           // объект "Удалить раздел материалов"
   private   $Sayme;            // объект "Отправить сообщение автору"
   private   $Entry;            // объект "Войти или зарегистрироваться"
   private   $Tune;             // объект "Изменить настройки сайта в браузере"
   private   $ModyArt;          // объект "Редактировать выбранный материал или создать новый"
   private   $ModyCue;          // объект "Изменить заголовок раздела или иконку"
   private   $DelArt;           // объект "Удалить материал"
   // ------------------------------------------------------- МЕТОДЫ КЛАССА ---
   public function __construct($SiteRoot,$urlHome,$SiteDevice,
      $WorkTinyHeight,$FooterTinyHeight,$KwinGalleryWidth,$EdIzm,$Arti) 
   {
      // Инициализируем свойства класса
      $this->WhipperSnapper=NULL;
      $this->WorkTinyMain=NULL;
      $this->Newcue=NULL;
      $this->ModyCue=NULL;
      $this->DelCue=NULL;
      $this->Sayme=NULL;
      $this->Entry=NULL;
      $this->Tune=NULL;
      $this->NewArt=NULL;
      $this->ModyArt=NULL;
      $this->DelArt=NULL;
      $this->ZhizniPuti=NULL;
      
      $this->SiteRoot=$SiteRoot; 
      $this->urlHome=$urlHome; 
      $this->SiteDevice=$SiteDevice; 
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
      
      // Инициируем отложенное сообщение
      $this->DelayedMessage=imok;
      // Выбираем текущий транслит
      $Translit=$this->Arti->getArti;
      // 1-ZERO этап ---------------------------- 'Проверка текущего транслита'
      if ($Translit==NULL)
      {
         $this->DelayedMessage=mmlVybratSledMaterial_ZERO($this->Arti,$Translit,$this->urlHome);
      }
      // 2-ZERO этап 
      if ($this->DelayedMessage==imok) 
      {
         // -------------------------------------- 'Выбрать следующий материал'
         if (\prown\isComRequest(mmlVybratSledMaterial))
         $this->DelayedMessage=mmlVybratSledMaterial_ZERO($this->Arti,$Translit,$this->urlHome);
         // ----------------------------------- 'Вернуться к предыдущей статье'
         else if (\prown\isComRequest(mmlVernutsyaPredState))
         $this->DelayedMessage=mmlVernutsyaPredState_ZERO($this->Arti,$Translit);
         // Если было назначение нового материала/статьи, 
         // то делаем запись в базу данных и готовим транслит статьи для установки
         // кукиса и начала редактирования материала
         else if ((\prown\getComRequest('nsnCue')<>NULL)&&
         (\prown\getComRequest('nsnName')<>NULL)&&
         (\prown\getComRequest('nsnGru')<>NoDefine)&&
         (\prown\getComRequest('nsnDate')<>NULL))
         {
            // Делаем новую запись в базе данных
            $NameArt=\prown\getComRequest('nsnName');
            $DateArt=\prown\getComRequest('nsnDate');
            $pid=\prown\getComRequest('nsnCue');
            $Translit=\prown\getTranslit($NameArt);
            $contents='Новый материал';
            $this->DelayedMessage=
               $this->Arti->InsertByTranslit($this->apdo,$Translit,$pid,$NameArt,$DateArt,$contents);
            // Готовим кукис текущего материала и загружаем страницу для редактирования
            if ($this->DelayedMessage==imok)
            {
               $this->Arti->setCurrTranslit($Translit);
               // Загружаем страницу редактирования нового материала
               Header("Location: ".$this->urlHome.'/?artim='.$Translit,true);
            }
         }
      }
      // Последний-ZERO этап - обеспечиваем работу с материалом в рабочей области
      if ($this->DelayedMessage==imok)
      {
         // Если был выбран режим сохранения отредактированного материала, 
         // то сохраняем его    
         $contentNews=\prown\getComRequest('Article');
         if ($contentNews<>NULL)
         {
            $this->Arti->UpdateByTranslit($this->apdo,$this->Arti->getArti,$contentNews);
            // После обновления статьи возвращаемся в режим редактирования
            $this->Arti->GalleryMode=mwgEditing;
         }
         // Вытаскиваем материал для редактирования
         $this->DelayedMessage=$this->Arti->SelUidPid
            ($this->apdo,$Translit,$pidEdit,$uidEdit,$NameGru,$NameArt,$DateArt,$contentsIn);
         // Если материал выбран, готовим данные для страницы
         if ($this->DelayedMessage==imok)
         {
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
      }
   }
   
   // --------------------------------------------------------------------------------------- HEAD and LAST ---

   // *************************************************************************
   // *        Установить стили пространства редактирования материала         *
   // *************************************************************************
   public function Init($aPresMode,$aModeImg,$aPhoneImg,$urlHome,$moditap,
      $NewCueGame=NULL,$DelCueGame=NULL,$SaymeGame=NULL,$EntryGame=NULL)
   {
      // Настраиваемся на файлы стилей и js-скрипты
      $this->Arti->Init();
      echo '<script src="/'.jsxdir.'/CommonTools.js"></script>';
      // Подключаем кнопки управляющего меню
      $this->menu=new MenuLeader(ittveme,$this->urlHome);
      $this->menu->Init();
      
      // 1-HEAD этап - 'Если есть отложенное сообщение, то инициируем игру 
      // со змеёй и анимацию фона'
      if ($this->DelayedMessage<>imok)
      {
         require_once "ttools/TTinyGallery/WhipperSnapper/gameWhipperSnapperClass.php";
         $this->WhipperSnapper=new \game\WhipperSnapper('IttveME');
         $this->WhipperSnapper->Head();
      }
      else
      {
         // Настраиваем размеры частей рабочей области редактирования
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

         // -------------------------------------------------------------------
         // это вставка на случай, пока используется игра DuckFly 
         // (для игры нужно убрать все полосы прокрутки)
         if (\prown\isComRequest(mmlDobavitNovyjRazdel))
            echo '<style> #Life,#WorkTiny{overflow:hidden;} </style>';
         else
            echo '<style> #Life,#WorkTiny{overflow:auto;} </style>';
         // -------------------------------------------------------------------

         // 3-HEAD этап ---------------------------- ?Com=zhizn-i-puteshestviya
         if (\prown\isComRequest(mmlZhiznIputeshestviya))
            $this->ZhizniPuti=mmlZhiznIputeshestviya_HEAD($this->Arti,$this->apdo,$this->urlHome);
         // 5-HEAD этап --------------------- ?Com=otpravit-avtoru-soobshchenie
         elseif (\prown\isComRequest(mmlOtpravitAvtoruSoobshchenie))
            $this->Sayme=mmlOtpravitAvtoruSoobshchenie_HEAD($SaymeGame);
         // 6-HEAD этап --------------------- ?Com=vojti-ili-zaregistrirovatsya
         elseif (\prown\isComRequest(mmlVojtiZaregistrirovatsya))
            $this->Entry=mmlVojtiZaregistrirovatsya_HEAD($EntryGame);
         // 7-HEAD этап -------------- ?Com=prochitat-o-sajte-izmenit-nastrojki 
         elseif (\prown\isComRequest(mmlIzmenitNastrojkiSajta))
            $this->Tune=mmlIzmenitNastrojkiSajta_HEAD($aPresMode,$aModeImg,$aPhoneImg,$urlHome,$moditap);
         // 8(12)-HEAD этап ------------- ?Com=sozdat-material-ili-redaktirovat 
         elseif 
            ((\prown\isComRequest(mmlSozdatRedaktirovat))||
            (\prown\isComRequest(mmlVybratStatyuRedakti)))
            $this->ModyArt=mmlSozdatRedaktirovat_HEAD($this->Arti,$this->apdo);
         // 9-HEAD этап -------------- ?Com=izmenit-nazvanie-razdela-ili-ikonku 
         elseif (\prown\isComRequest(mmlIzmenitNazvanieIkonku))
            $this->ModyCue=mmlIzmenitNazvanieIkonku_HEAD();
         // 10-HEAD этап ----------------- ?Com=dobavit-novyj-razdel-materialov 
         elseif (\prown\isComRequest(mmlDobavitNovyjRazdel))
            $this->NewCue=mmlDobavitNovyjRazdel_HEAD($NewCueGame);
         // 11-HEAD этап ------------------------ ?Com=udalit-razdel-materialov 
         elseif (\prown\isComRequest(mmlUdalitRazdelMaterialov))
            $this->DelCue=mmlUdalitRazdelMaterialov_HEAD($DelCueGame);
         // 13-HEAD этап -------------------------------- ?Com=naznachit-statyu 
         elseif (\prown\isComRequest(mmlNaznachitStatyu))
            $this->NewArt=mmlNaznachitStatyu_HEAD($this->Arti,$this->apdo);
         // 14-HEAD этап --------------------------------- ?Com=udalit-material 
         elseif (\prown\isComRequest(mmlUdalitMaterial))
            $this->DelArt=mmlUdalitMaterial_HEAD($this->Arti,$this->apdo);
         // Последний-HEAD этап - инициируем разметку для выбранного материала,
         // cтроим рабочую область для выбранной статьи и её галереи, 
         // обеспечиваем просмотр и редактирование 
         else 
         {
            require_once "ttools/TWorkTinyMain/WorkTinyMainClass.php";
            $this->WorkTinyMain=new WorkTinyMain($this->Arti,$this->fileStyle,$this->contents);
            $this->WorkTinyMain->Head();
         }
      }
   }
   // *************************************************************************
   // *                 Развернуть область галереи изображений                *
   // *************************************************************************
   public function ViewGallerySpace()
   {
      // Запускаем галерею, если нет отложенного сообщения, 
      // иначе будем запускать игру со змеёй и градиент
      if ($this->DelayedMessage==imok) 
      {
         // Строим панель выбранных значений при назначении новой статьи 
         if (\prown\isComRequest(mmlNaznachitStatyu))
         {
            // Здесь будем выводим кнопку для создания новой записи через js: 
            // <input type="submit" value="Записать реквизиты статьи" form="frmNaznachitStatyu">
            // только после выбора/назначения всех трех условий
            echo '<br><br>
               <div class="nazst"> 
                  <p class="nazstName"  id="wnCue">Раздел материалов</p>
                  <p class="nazstValue" id="wvCue">'.nstNoVyb.'</p>
               </div>
               <div class="nazst"> 
                  <p class="nazstName"  id="wnArt">Новая статья</p>
                  <p class="nazstValue" id="wvArt">'.nstNoNaz.'</p>
               </div>
               <div class="nazst"> 
                  <p class="nazstName"  id="wnDat">Дата создания</p>
                  <p class="nazstValue" id="wvDat">'.nstNoVyb.'</p>
               </div>
               <div id="nazstSub">
               </div>
            ';
         }
         else $this->Galli->BaseGallery();
      }
   }
   // *************************************************************************
   // *              Развернуть область подвала (кнопок управления)           *
   // *************************************************************************
   public function ViewFooterSpace($UserAgent)
   {
      //if (isNichost()) $cPreMe=''; else 
      $cPreMe='?Com=';

      // Кнопка главного меню 
      echo '<div id="LifeMenu">';
         echo '
         <ul id="btnLifeMenu">
         <li>
            <a href= "'.$cPreMe.mmlZhiznIputeshestviya.'">
            <img id="imgLifeMenu" src="/Images/tveMenuD.png" alt="tveMenuD">
            </a> 
         </li> 
         </ul>
         ';
      echo '</div>';
      // Левая часть подвала для сообщений, разворачиваемых в три строки
      echo '<div id="LeftFooter">';
         if ($this->Arti->GalleryMode==mwgEditing)
         {
            // Подготавливаем отключение блокировки закрытия страницы редактирования материала
            $inpClick=' onclick="SaveTrue()" ';
            // Включаем кнопку сохранения материала
            echo '
               <p><input '.$inpClick.'id="inpAll" type="submit" value="Сохранить новый материал" form="frmTinyText"></p>
            ';
         }
         else 
         {
             if ($this->SiteDevice=='Computer')
            {
               echo $UserAgent.'<br>';
               echo '<a href="https://www.pspad.com/ru/" title="PSPad.com - freeware text editor">'.
                  '<strong>PSPad - замечательный текстовый редактор</strong></a>';
            }
         }
      echo '</div>';
      // Правая часть подвала, меню управления
      echo '<div id="RightFooter">';
         $this->menu->Menu(); 
      echo '</div>';
   }
   // *************************************************************************
   // *      Развернуть пространство просмотра или редактирования материала   *
   // *************************************************************************
   private function _ViewLifeSpace($Title,$oBody)
   {
      echo '<div id="tLife">';
         echo $Title;
      echo '</div>';

      echo '<div id="WorkTiny">';
         $oBody->Body();
      echo '</div>';
   }
   public function ViewLifeSpace()
   {
      // Если отложенное сообщение, то готовим заголовок и игру со змеёй
      if ($this->DelayedMessage<>imok) 
      {
         $Title=MakeTitle($this->DelayedMessage,ttError);
         $this->_ViewLifeSpace($Title,$this->WhipperSnapper);
      }
      // 3-BODY этап ------------------------------- ?Com=zhizn-i-puteshestviya
      elseif (\prown\isComRequest(mmlZhiznIputeshestviya))
      {
         $Title=MakeTitle('Жизнь и путешествия! '.'&#128152;&#129315;',ttMessage);
         $this->_ViewLifeSpace($Title,$this->ZhizniPuti);
      }
      // 5-BODY этап ------------------------ ?Com=otpravit-avtoru-soobshchenie
      elseif (\prown\isComRequest(mmlOtpravitAvtoruSoobshchenie))
      {
         //$Title=MakeTitle('Отправить сообщение автору! '.'&#128152;&#129315;',ttMessage);
         $Title=MakeTitle('Отправка сообщений будет сделана осенью, пока крутите Хекстрис!<br>',ttMessage);
         $this->_ViewLifeSpace($Title,$this->Sayme);
      }
      // 6-BODY этап ------------------------ ?Com=vojti-ili-zaregistrirovatsya
      elseif (\prown\isComRequest(mmlVojtiZaregistrirovatsya))
      {
         //$Title=MakeTitle('Войти или зарегистрироваться! '.'&#128152;&#129315;',ttMessage);
         $Title=MakeTitle('Страница еще не готова, но Вы можете поиграть. Ваша задача - выбрать все парные карты!<br>',ttMessage);
         $this->_ViewLifeSpace($Title,$this->Entry);
      }
      // 7-BODY этап ----------------- ?Com=prochitat-o-sajte-izmenit-nastrojki
      elseif (\prown\isComRequest(mmlIzmenitNastrojkiSajta))
      {
         $Title=MakeTitle('Изменить настройки сайта в браузере! '.'&#128152;&#129315;',ttMessage);
         $this->_ViewLifeSpace($Title,$this->Tune);
      }
      // 8(12)-BODY этап ---------------- ?Com=sozdat-material-ili-redaktirovat 
      elseif ((\prown\isComRequest(mmlSozdatRedaktirovat))||(\prown\isComRequest(mmlVybratStatyuRedakti)))
      {
         $Title=MakeTitle('Выберите статью для редактирования?',ttMessage);
         $this->_ViewLifeSpace($Title,$this->ModyArt);
      }
      // 9-BODY этап ----------------- ?Com=izmenit-nazvanie-razdela-ili-ikonku 
      elseif (\prown\isComRequest(mmlIzmenitNazvanieIkonku))
      {
         $Title=MakeTitle('Страничка разрешена собственнику сайта. <br>'.
            'Смотрите возможные иконки разделов материалов и статей!',ttMessage);
         $this->_ViewLifeSpace($Title,$this->ModyCue);
      }
      // 10-BODY этап -------------------- ?Com=dobavit-novyj-razdel-materialov 
      elseif (\prown\isComRequest(mmlDobavitNovyjRazdel))
      {
         //$Title=MakeTitle('Добавить новый раздел материалов! '.'&#128152;&#129315;',ttMessage);
         $Title=MakeTitle('Страничка будет следующей зимой, пока постреляйте уток!',ttMessage);
         $this->_ViewLifeSpace($Title,$this->NewCue);
      }
      // 11-BODY этап --------------------------- ?Com=udalit-razdel-materialov 
      elseif (\prown\isComRequest(mmlUdalitRazdelMaterialov))
      {
         //$Title=MakeTitle('Удалить раздел материалов! '.'&#128152;&#129315;',ttMessage);
         $Title=MakeTitle('Страничка будет следующей зимой, а здесь соберите '.
            'сумму 2048.<br> У меня пока получилось 756!',ttMessage);
         $this->_ViewLifeSpace($Title,$this->DelCue);
      }
      // 13-BODY этап ----------------------------------- ?Com=naznachit-statyu 
      elseif (\prown\isComRequest(mmlNaznachitStatyu))
      {
         $Title=MakeTitle('Укажите название и дату для новой статьи,<br>'.
            'выберите кликом раздел материалов?',ttMessage);
         $this->_ViewLifeSpace($Title,$this->NewArt);
      }
      // 14-BODY этап ------------------------------------ ?Com=udalit-material 
      elseif (\prown\isComRequest(mmlUdalitMaterial))
      {
         $Title=MakeTitle('Выберите материал для удаления,<br>'.
            'прежде, не забудьте удалить связанные с ним изображения?',ttMessage);
         $this->_ViewLifeSpace($Title,$this->DelArt);
      }
      // Последний-BODY этап - обеспечиваем работу с материалом в рабочей области
      else
      {
         $Title=MakeTitle($this->NameGru,$this->NameArt,$this->DateArt);
         $this->_ViewLifeSpace($Title,$this->WorkTinyMain);
      }
   }

   // --------------------------------------------------- ВНУТРЕННИЕ МЕТОДЫ ---

}
 
// *************************************************** TinyGalleryClass.php ***
