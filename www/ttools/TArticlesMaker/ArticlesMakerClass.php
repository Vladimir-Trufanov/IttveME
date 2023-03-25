<?php namespace ttools; 
                                         
// PHP7/HTML5, EDGE/CHROME                       *** ArticlesMakerClass.php ***

// ****************************************************************************
// * TPhpTools                                   Построитель материалов сайта *
// *                                                                          *
// * v1.1, 05.02.2023                              Автор:       Труфанов В.Е. *
// * Copyright © 2022 tve                          Дата создания:  03.11.2022 *
// ****************************************************************************

/**
 * Класс ArticlesMaker организовывает базу данных материалов сайта (на примерах
 * материалов сайтов 'ittve.pw' и 'ittve.me', обеспечивает построение и ведение 
 * меню статей.
 * 
 * Для взаимодействия с объектами класса должны быть определены константы:
 *
 * articleSite  - тип базы данных (по сайту)
 * pathPhpTools - путь к каталогу с файлами библиотеки прикладных классов;
 * pathPhpPrown - путь к каталогу с файлами библиотеки прикладных функции
 * editdir      - каталог размещения файлов, относительно корневого
 * stylesdir    - каталог стилей элементов разметки и фонтов
 * imgdir       - каталог файлов служебных для сайта изображений
 * jsxdir       - каталог размещения файлов javascript
 *    
 * Пример создания объекта класса:
 * 
 * // Указываем место размещения библиотеки прикладных функций TPhpPrown
 * define ("pathPhpPrown",$SiteHost.'/TPhpPrown/TPhpPrown');
 * // Указываем место размещения библиотеки прикладных классов TPhpTools
 * define ("pathPhpTools",$SiteHost.'/TPhpTools/TPhpTools');
 * // Указываем каталоги размещения файлов
 * define("editdir",'ittveEdit');  // файлы, связанные c материалом
 * define("stylesdir",'Styles');   // стили элементов разметки и фонты
 * define("imgdir",'Images');      // служебные для сайта файлы изображений
 * 
 * // Cоздаем объект для управления материалами сайта в базе данных
 * $Arti=new ttools\ArticlesMaker($basename,$username,$password,$SiteRoot);
**/

// Свойства:
//
// $kindMessage - объект вывода сообщений. По умолчанию = NULL, что означает,
//    что сообщение выводится через alert. Методом setKindMessage может быть
//    подключен объект класса TNotice, который и будет заниматься выводом всех
//    сообщений

// ------------------------------------------ Путь к каталогу файлов класса ---
define ("TArticlesMakerDir",'ttools/TArticlesMaker');  

// --------------------- Константы для указания типа базы данных (по сайту) ---
define ("tbsIttveme", 'IttveMe'); 
define ("tbsIttvepw", 'IttvePw'); 
// -------------------------------------------------- Доступ к пунктам меню ---
define ("acsAll",   1);      // доступ разрешен всем
define ("acsClose", 2);      // закрыт, статья в разработке
define ("acsAutor", 4);      // только автору-хозяину сайта

// Подгружаем общие функции класса
require_once("CommonArticlesMaker.php"); 
// Подгружаем модули функций класса, связанные с конкретным сайтом
if (articleSite==tbsIttveme) require_once("CommonIttveMe.php"); 
elseif (articleSite==tbsIttvepw) require_once("CommonIttvePw.php"); 

// Подгружаем нужные модули библиотеки прикладных функций
require_once pathPhpPrown."/MakeCookie.php";
require_once pathPhpPrown."/iniConstMem.php";

// Подгружаем нужные модули библиотеки прикладных классов
require_once(pathPhpTools."/CommonTools.php");

class ArticlesMaker
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   public $kindMessage;         // Объект вывода сообщений;  
   public $getArti;             // Транслит текущего материала

   protected $editdir;          // Каталог размещения файлов, связанных c материалом
   protected $imgdir;           // Каталог файлов служебных для сайта изображений

   protected $basename;         // База материалов: $_SERVER['DOCUMENT_ROOT'].'/itpw';
   protected $username;         // Логин для доступа к базе данных
   protected $password;         // Пароль
   // ------------------------------------------------------- МЕТОДЫ КЛАССА ---
   public function __construct($basename,$username,$password,$note) 
   {
      // Инициализируем свойства класса
      $this->editdir     = editdir; 
      $this->imgdir      = imgdir; 
      
      $this->basename    = $basename;
      $this->username    = $username;
      $this->password    = $password;
      $this->kindMessage = NULL;
      
      // Выбираем текущий транслит, если есть параметр по просмотру материала
      // и сохраняем кукисы транслита и режима просмотра
      if (\prown\getComRequest('arti')<>NULL) 
      {
         $this->getArti=\prown\MakeCookie('PunktMenu',\prown\getComRequest('arti'),tStr);  
      }
      // Выбираем текущий транслит, если есть параметр по редактированию
      // материала и сохраняем кукисы транслита и режима редактирования
      else if (\prown\getComRequest('artim')<>NULL) 
      {
         $this->getArti=\prown\MakeCookie('PunktMenu',\prown\getComRequest('artim'),tStr);  
      }
      // Если параметр не передавался, то выбираем из существующего кукиса
      else
      {
         if (isset($_COOKIE['PunktMenu'])) $this->getArti=\prown\MakeCookie('PunktMenu');
         else $this->getArti=NULL; 
      }
      // Выполняем действия на странице до отправления заголовков страницы: 
      // (устанавливаем кукисы и т.д.)                  
      $this->Zero();
      // Трассируем установленные свойства
      //\prown\ConsoleLog('$this->getArti='.$this->getArti); 
   }
   // *************************************************************************
   // *           Спрятать в __destruct обработку клика выбора раздела        *
   // *                    (при назначении новой статьи)                      *
   // *************************************************************************
   public function __destruct() 
   {
   }
   // *************************************************************************
   // *   Выполнить действия на странице до отправления заголовков страницы:  *
   // *                         (установить кукисы и т.д.)                    *
   // *************************************************************************
   private function Zero()
   {
      // Проверяем, нужно ли заменить файл стилей в каталоге редактирования и,
      // (при его отсутствии, при несовпадении размеров или старой дате) 
      // загружаем из класса 
      CompareCopyRoot('bgnoise_lg.jpg',TArticlesMakerDir,$this->imgdir);
      CompareCopyRoot('icons.png',TArticlesMakerDir,$this->imgdir);
      CompareCopyRoot('getNameCue.php',TArticlesMakerDir);
      CompareCopyRoot('deleteArt.php',TArticlesMakerDir);
      CompareCopyRoot('TestBase.php',TArticlesMakerDir);
   }
   // *************************************************************************
   // *       Подключить объект класса TNotice, который будет заниматься      *
   // *                        выводом всех сообщений                         *
   // *************************************************************************
   public function setKindMessage($note)
   {
      $this->kindMessage = $note;
   }
   private function Alert($messa)
   {
      if ($this->kindMessage==NULL) \prown\Alert($messa);
      else $this->kindMessage->Info($messa); 
   }
   // *************************************************************************
   // *           Сформировать строки меню по базе данных материалов          *
   // *  (общий механизм: $clickGru-вызов процедуры обработки клика по группе *
   // *   материалов, $clickOne-вызов процедуры обработки клика по материалу) *
   // *************************************************************************
   public function MakeUniMenu($pdo,$clickGru='',$clickOne='')
   {
      $lvl=-1;      // инициировали текущий уровень меню
      $cLast='+++'; // инициировали признак типа сформированной строки меню
      $nLine=0;     // инициировали счетчик сформированных строк меню
      $cli="";      // сбрасили начальную вставку конца пункта меню
      $this->_MakeUniMenu($clickGru,$clickOne,$pdo,1,1,$cLast,$nLine,$cli,$lvl);
   }
   
   /*
   private function _MakeUniMenu($clickGru,$clickOne,
   $pdo,$ParentID,$PidIn,&$cLast,&$nLine,&$cli,&$lvl,$FirstUl=' class="accordion"')
   {
      // Определяем текущий уровень меню
      $lvl++; 
      // Выбираем все записи одного родителя
      $cSQL="SELECT uid,NameArt,Translit,pid,IdCue,DateArt FROM stockpw WHERE pid=".$ParentID." ORDER BY uid";
      $stmt = $pdo->query($cSQL);
      $table = $stmt->fetchAll();
      if (count($table)>0) 
      {
         echo('<ul'.$FirstUl.'>'."\n"); $cLast='+ul';
         // Перебираем все записи родителя, подсчитываем количество, формируем пункты меню
         foreach ($table as $row)
         {
            // Инкрементируем счетчик строк
            $nLine++; 
            // Выбираем параметры записи
            $Uid=$row["uid"]; $Pid=$row["pid"]; 
            $NameArt=$row['NameArt']; $Translit=$row["Translit"];
            $IdCue=$row["IdCue"]; $DateArt=$row["DateArt"]; 
            // Закрываем предыдущий 'LI'
            if ($cLast<>'+ul') 
            {
                $cli="</li>\n";
                echo($cli); $cLast='-li';
            }
            // Выводим 'LI' группы материалов или собственно материала
            $grClick=$this->HandleСlick($clickGru,$Uid);
            $maClick=$this->HandleСlick($clickOne,$Uid);
            echo('<li>'); 
            if ($IdCue==-1)
            {
               echo('<i'.$grClick.'>'.$NameArt.
                    '<span id="spa'.$Uid.'">'.$Uid.'.</span>'.
                    '</i>'."\n");
            } 
            else
            {
               echo('<i'.$maClick.'><em>'.$Uid.'.</em>'.$NameArt.'</i>'."\n"); 
            }
            $cLast='+li';
            // Заходим на следующую строку
            $this->_MakeUniMenu($clickGru,$clickOne,
               $pdo,$Uid,$Pid,$cLast,$nLine,$cli,$lvl,' class="sub-menu"'); 
            $lvl--; 
         }
         $cli="</li>\n";
         echo($cli); $cLast='-li'; 
         echo("</ul>\n");  $cLast='-ul';
      }
   }
   */

   // Модификация от 22.03.2023
   private function _MakeUniMenu($clickGru,$clickOne,
   $pdo,$ParentID,$PidIn,&$cLast,&$nLine,&$cli,&$lvl,$FirstUl=' class="accordion"')
   {
      // Определяем текущий уровень меню
      $lvl++; 
      // Выбираем все записи одного родителя
      $cSQL="SELECT uid,NameArt,Translit,pid,IdCue,DateArt FROM stockpw WHERE pid=".$ParentID." ORDER BY uid";
      $stmt = $pdo->query($cSQL);
      $table = $stmt->fetchAll();
      if (count($table)>0) 
      {
         echo('<ul'.$FirstUl.'>'."\n"); $cLast='+ul';
         // Перебираем все записи родителя, подсчитываем количество, формируем пункты меню
         foreach ($table as $row)
         {
            // Инкрементируем счетчик строк
            $nLine++; 
            // Выбираем параметры записи
            $Uid=$row["uid"]; $Pid=$row["pid"]; 
            $NameArt=$row['NameArt']; $Translit=$row["Translit"];
            $IdCue=$row["IdCue"]; $DateArt=$row["DateArt"]; 
            // Закрываем предыдущий 'LI'
            if ($cLast<>'+ul') 
            {
                $cli="</li>\n";
                echo($cli); $cLast='-li';
            }
            // Выводим 'LI' группы материалов или собственно материала
            $grClick=$this->HandleСlick($clickGru,$Uid);
            $maClick=$this->HandleСlick($clickOne,$Uid);
            echo('<li>'); 
            if ($IdCue==-1)
            {
               echo('<i'.$grClick.'>'.$NameArt.
                    '<span id="spa'.$Uid.'">'.$Uid.'.</span>'.
                    '</i>'."\n");
            } 
            else
            {
               echo('<i'.$maClick.'><em>'.$Uid.'.</em>'.$NameArt.'</i>'); 
               /*echo('<i'.$maClick.'><em>'.$Uid.'.</em>'.$NameArt.'</i>');*/ 
               /*echo('<a href="?artim='.$Translit.'">'.$NameArt.'</a>'."\n");*/ 
               /*
               $href='<a href="?artim='.$Translit.'">'.$NameArt.'</a>';
               echo('<i>'.$href.'</i>'); 
               */
               echo("\n"); 
            }
            $cLast='+li';
            // Заходим на следующую строку
            $this->_MakeUniMenu($clickGru,$clickOne,
               $pdo,$Uid,$Pid,$cLast,$nLine,$cli,$lvl,' class="sub-menu"'); 
            $lvl--; 
         }
         $cli="</li>\n";
         echo($cli); $cLast='-li'; 
         echo("</ul>\n");  $cLast='-ul';
      }
   }
   private function HandleСlick($clickIs,$Uid)
   {
      if ($clickIs=='') $Result='';
      else $Result=' onclick="'.$clickIs.'('.$Uid.')"';
      return $Result;
   }
   // *************************************************************************
   // *        Установить стили пространства редактирования материала         *
   // *************************************************************************
   public function Init()
   {
      /*
      // Настраиваем фоны графическими файлами
      $bgnoise_lg=$this->imgdir.'/bgnoise_lg.jpg';
      $icons=$this->imgdir.'/icons.png';
      echo '
ÿ   Ḱ˳  tyle>
      .accordion li > a span,
      .accordion li > i span 
      {
         background:#e0e3ec url('.$bgnoise_lg.') repeat top left;
      }
      .accordion > li > a:before 
      {
         background-image:url('.$icons.');
      }
      </style>
      ';
      */
   }
   // *************************************************************************
   // *                     Открыть соединение с базой данных                 *
   // *************************************************************************
   public function BaseConnect()
   {
      return _BaseConnect($this->basename,$this->username,$this->password);
   }
   // *************************************************************************
   // *     Построить html-код ТАБЛИЦЫ меню по базе данных материалов сайта   *
   // *                      с сортировкой по полям                           *
   // *************************************************************************
   public function MakeTblMenu($ListFields,$SignAsc,$SignDesc)
   {
      _MakeTblMenu($this->basename,$this->username,$this->password,
          $ListFields,$SignAsc,$SignDesc);
   } 
   // *************************************************************************
   // *        Построить html-код меню по базе данных материалов сайта        *
   // *************************************************************************
   public function MakeMenu()
   {
      _MakeMenu($this->basename,$this->username,$this->password);
   } 
   public function MakeMyLifeMenu($pdo)
   {
      _MakeMyLifeMenu($pdo);
   } 
   // *************************************************************************
   // *    Создать резервную копию базы данных, построить новую базу данных   *
   // * ($aCharters='-',подключить массив со структурой основной базы данных) *
   // *************************************************************************
   public function BaseFirstCreate($aCharters='-') 
   {
      if (articleSite==tbsIttveme) 
      _BaseFirstCreate($this->basename,$this->username,$this->password,$aCharters);
      else
      _BaseFirstCreate($this->basename,$this->username,$this->password);
   }
   // *************************************************************************
   // *                Показать пример меню для конкретного сайта             *
   // *************************************************************************
   public function ShowSampleMenu() 
   {
      _ShowSampleMenu();
   }
   public function ShowProbaMenu() 
   {
      _ShowProbaMenu();
   }
   // ----------------------------------------------------- ЗАПРОСЫ ПО БАЗЕ ---
   
   // *************************************************************************
   // *  Выбрать $pid,$uid,$NameGru,$NameArt,$DateArt,$contents по транслиту  *
   // *************************************************************************
   public function SelUidPid($pdo,$getArti,&$pid,&$uid,&$NameGru,&$NameArt,&$DateArt,&$contents)
   {
      // Так как функция запускается на фазе построения сайта ZERO, то по
      // ошибке возвращается сообщение об этом, иначе возвращается "Все хорошо у меня"
      $ErrMessage=imok;
      // Инициируем возвращаемые данные
      $pid=0; $uid=0; 
      $NameGru='Материал для редактирования не выбран!'; 
      $contents='Новый материал'; 
      $NameArt=''; $DateArt='';
      // Возвращаем ошибку, если транслит не определен
      if ($getArti==NULL) $ErrMessage='Транслит материала не определен';
      // Транслит есть, будем делать запрос
      else
      {
         try
         {
            $pdo->beginTransaction();
            // Выбираем по транслиту $pid,$uid,$NameArt
            $cSQL='SELECT * FROM stockpw WHERE Translit="'.$getArti.'"';
            $stmt=$pdo->query($cSQL);
            $table=$stmt->fetchAll();
            // Фиксируем успешную транзакцию
            $pdo->commit();
            
            $count=count($table); 
            // Если не найдено записей, то диагностируем ошибку.
            if ($count<1) $ErrMessage='Не найдено записей по транслиту: '.$getArti;
            // Если больше одной записи, то диагностируем ошибку
            else if ($count>1) 
               $ErrMessage="По транслиту ".$getArti." найдено более одной записи, всего ".$count;
            // Найдена одна запись, выбираем данные из записи
            else
            {
               $pid=$table[0]['pid']; $uid=$table[0]['uid']; 
               $NameArt=$table[0]['NameArt']; $DateArt=$table[0]['DateArt'];
               $contents=$table[0]['Art'];
               // Добираем $NameGru
               $table=$this->SelRecord($pdo,$pid);
               // Если ошибка, то возвращаем сообщение
               if ($table[0]['Translit']==nstErr) $ErrMessage=$table[0]['NameArt'];
               else
               {
                  if (count($table)>0) $NameGru=$table[0]['NameArt'];
                  else $ErrMessage='Для статьи с Uid='.$uid.' неверный идентификатор группы: Pid='.$pid; 
               }
            }
         } 
         catch (\Exception $e) 
         {
            $ErrMessage=$e->getMessage();
            if ($pdo->inTransaction()) $pdo->rollback();
         }
      }
      return $ErrMessage;
   }
   // *************************************************************************
   // * Выбрать запись по идентификатору                                      *
   // *              (например, узнать наименование группы по идентификатору: *
   // *          $table=SelRecord($pdo,$pid); $NameGru=$table[0]['NameArt'];) *
   // *************************************************************************
   public function SelRecord($pdo,$UnID)
   {
     try
     {
       $pdo->beginTransaction();
       $cSQL='SELECT * FROM stockpw WHERE uid='.$UnID;
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
   }
   // *************************************************************************
   // *        Найти следующую запись с материалом (статьёй) относительно     *
   // *            текущего идентификатора и выбрать в ней Translit           *
   // *************************************************************************
   public function SelNextTranslit($pdo,$UnID)
   {
     try
     {
       $pdo->beginTransaction();
       $cSQL='SELECT NameArt,Translit FROM stockpw WHERE uid >'.$UnID.' AND IdCue=0 LIMIT 1';
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
   }
   // *************************************************************************
   // *       Найти предыдущую запись с материалом (статьёй) относительно     *
   // *            текущего идентификатора и выбрать в ней Translit           *
   // *************************************************************************
   public function SelPrevTranslit($pdo,$UnID)
   {
     try
     {
       $pdo->beginTransaction();
       // Первым запросом выбираем максимальный uid меньше данного
       $cSQL='SELECT max(uid) FROM stockpw WHERE uid <'.$UnID.' AND IdCue=0';
       $stmt = $pdo->query($cSQL);
       $table = $stmt->fetchAll();
       // Если по запросу uid не найден, то считаем что был первый и
       // возвращаем сообщение об этом
       if ($table[0]["max(uid)"]==0) 
       {
          $table=array(array("NameArt"=>"NoRecords","Translit"=>nstErr,));       
          $pdo->commit();
          return $table;
       }
       // Если максимальный uid меньше данного найден, 
       // то по нему выбираем транслит
       else
       { 
          $maxUid=$table[0]["max(uid)"];
          $cSQL='SELECT NameArt,Translit FROM stockpw WHERE uid = '.$maxUid;
          $stmt = $pdo->query($cSQL);
          $table = $stmt->fetchAll();
       }  
       $pdo->commit();
     } 
     catch (\Exception $e) 
     {
       $messa=$e->getMessage();
       $table=array(array("NameArt"=>$messa,"Translit"=>nstErr,));
       if ($pdo->inTransaction()) $pdo->rollback();
     }
     return $table; 
   }
   // *************************************************************************
   // *               Выбрать ключи всех изображений к записи и               *
   // *                   другую информацию по идентификатору                 *
   // *************************************************************************
   public function SelImgKeys($pdo,$UnID)
   {
      $cSQL='
         SELECT uid,TranslitPic,
         NamePic,Ext,mime_type,DatePic,SizePic,CommPic
         FROM picturepw WHERE uid='.$UnID;
      $stmt = $pdo->query($cSQL);
      $table = $stmt->fetchAll();
      return $table; 
   }
   // *************************************************************************
   // *              Выбрать сведения об изображении по ключам                *
   // *************************************************************************
   public function SelImgPic($pdo,$uid,$TranslitPic)
   {
     try
     {
       $pdo->beginTransaction();
       $cSQL='SELECT [Pic] FROM [picturepw] WHERE uid=:uid AND TranslitPic=:TranslitPic';
       $stmt=$pdo->prepare($cSQL);
       if ($stmt->execute([":uid"=>$uid, ":TranslitPic"=>$TranslitPic]))
       {
         $stmt->bindColumn(1, $Pic, \PDO::PARAM_LOB);
         $table=$stmt->fetch(\PDO::FETCH_BOUND)?
         [
            "uid"         => $uid,
            "TranslitPic" => $TranslitPic,
            "Pic"         => $Pic
         ]:null;
       } 
       $pdo->commit();
     } 
     catch (\Exception $e) 
     {
       $messa=$e->getMessage();
       $table=[
          "uid"          => $uid,
          "TranslitPic"  => Err,
          "Pic"          => $messa
       ];
       if ($pdo->inTransaction()) $pdo->rollback();
     }
     return $table;
   }
   // *************************************************************************
   // *      Удалить запись об изображении по идентификатору и транслиту:     *
   // *                    в случае успешного удаления функция                *
   // *     возвращает сообщение, что все хорошо, иначе сообщение об ошибке   *
   // *************************************************************************
   public function DelImgRecord($pdo,$uid,$TranslitPic)
   {
     try
     {
       $pdo->beginTransaction();
       $cSQL='DELETE FROM picturepw WHERE uid='.$uid.' AND TranslitPic="'.$TranslitPic.'"';
       $stmt = $pdo->query($cSQL);
       $pdo->commit();
       $messa=imok;
     } 
     catch (\Exception $e) 
     {
       $messa=$e->getMessage();
       if ($pdo->inTransaction()) $pdo->rollback();
     }
     return $messa;
   }
   // *************************************************************************
   // * Удалить запись по идентификатору: в случае успешного удаления функция *
   // *     возвращает сообщение, что все хорошо, иначе сообщение об ошибке   *
   // *************************************************************************
   public function DelRecord($pdo,$UnID)
   {
     try
     {
       $pdo->beginTransaction();
       $cSQL='DELETE FROM stockpw WHERE uid='.$UnID;
       $stmt = $pdo->query($cSQL);
       $pdo->commit();
       $messa=imok;
     } 
     catch (\Exception $e) 
     {
       $messa=$e->getMessage();
       if ($pdo->inTransaction()) $pdo->rollback();
     }
     return $messa;
   }
   // *************************************************************************
   // *                      Вставить материал по транслиту                   *
   // *************************************************************************
   public function InsertByTranslit($pdo,$Translit,$pid,$NameArt,$DateArt,$contents)
   {
    try 
    {
      $pdo->beginTransaction();
      $icontents = htmlspecialchars($contents);	
      $statement = $pdo->prepare("INSERT INTO [stockpw] ".
         "([pid], [IdCue], [NameArt], [Translit], [access], [DateArt], [Art]) VALUES ".
         "(:pid,  :IdCue,  :NameArt,  :Translit,  :access,  :DateArt,  :Art);");
      $statement->execute([
         "pid"      => $pid, 
         "IdCue"    => 0, 
         "NameArt"  => $NameArt, 
         "Translit" => $Translit, 
         "access"   => acsAll, 
         "DateArt"  => $DateArt, 
         "Art"      => $icontents
      ]);
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
   // *                      Вставить материал по транслиту                   *
   // *************************************************************************
   public function InsertImgByTranslit($pdo,$uid,$NamePic,$TranslitPic,$Ext,$mime_type,$DatePic,$SizePic,$Comment)
   {
    try 
    {
      $pdo->beginTransaction();
      $statement = $pdo->prepare("INSERT INTO [picturepw] ".              
         "([uid], [NamePic], [TranslitPic], [Ext], [mime_type], [DatePic], [SizePic], [CommPic]) VALUES ".
         "(:uid,  :NamePic,  :TranslitPic,  :Ext,  :mime_type,  :DatePic,  :SizePic,  :CommPic);");
      $statement->execute([
         "uid"         => $uid, 
         "NamePic"     => $NamePic, 
         "TranslitPic" => $TranslitPic, 
         "Ext"         => $Ext, 
         "mime_type"   => $mime_type, 
         "DatePic"     => $DatePic, 
         "SizePic"     => $SizePic, 
         "CommPic"     => $Comment
      ]);
      $pdo->commit();
      $messa=imok;
    } 
    catch (PDOException $e) 
    {
       $messa=$e->getMessage();
       if ($pdo->inTransaction()) $pdo->rollback();
    }
    return $messa;
   }
   public function UpdatePicByTranslit($pdo,$pathToFile,$TranslitPic)
   {
    try 
    {
      $pdo->beginTransaction();
      $fh = fopen($pathToFile,'rb');
      $sql = "UPDATE picturepw
             SET Pic = :Pic
             WHERE TranslitPic = :TranslitPic";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':Pic', $fh, \PDO::PARAM_LOB);
      $stmt->bindParam(':TranslitPic', $TranslitPic);
      $stmt->execute();
      unset($fh); 
      $pdo->commit();
      $messa=imok;
    } 
    catch (PDOException $e) 
    {
       $messa=$e->getMessage();
       if ($pdo->inTransaction()) $pdo->rollback();
    }
    return $messa;
   }
   // *************************************************************************
   // *                       Обновить материал по транслиту                  *
   // *************************************************************************
   public function UpdateByTranslit($pdo,$Translit,$contents)
   {
    try 
    {
      $pdo->beginTransaction();
      $statement = $pdo->prepare("UPDATE [stockpw] SET [Art] = :Art WHERE [Translit] = :Translit;");
      $statement->execute(["Art"=>$contents,"Translit"=>$Translit]);
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
}
// ************************************************* ArticlesMakerClass.php ***
