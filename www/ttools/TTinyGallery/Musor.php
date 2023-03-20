<?php namespace ttools; 
                                         
// PHP7/HTML5, EDGE/CHROME                                 *** WorkTiny.php ***

// ****************************************************************************
// * TinyGalleryClass             Блок функций расширения класса TTinyGallery *
// *                                                                          *
// * v1.0, 14.03.2022                              Автор:       Труфанов В.Е. *
// * Copyright © 2022 tve                          Дата создания:  13.11.2022 *
// ****************************************************************************

// ****************************************************************************
// *                      "Добавить новый раздел материалов"                  *
// ****************************************************************************
function mmlDobavitNovyjRazdel_HEAD($game=NULL)
{
   require_once "ttools/TNewCueClass/NewCueClass.php";
   $Newcue=new NewCue($game);
   $Newcue->Head();
   return $Newcue;
}
function mmlDobavitNovyjRazdel_BODY_WorkTiny($Newcue)
{
   //MakeTitle('Добавить новый раздел материалов! '.'&#128152;&#129315;',ttMessage);
   MakeTitle('Страничка будет следующей зимой, пока постреляйте уток!',ttMessage);
   $Newcue->Body();
}
// ****************************************************************************
// *                     "Изменить заголовок раздела или иконку"              *
// ****************************************************************************
function mmlIzmenitNazvanieIkonku_BODY_WorkTiny()
{
   //require_once "ttools/TModyCueClass/ModyCueClass.php";
   //MakeTitle('Изменить заголовок раздела или иконку! '.'&#128152;&#129315;',ttMessage);
   //$Modycue=new ModyCue();
   //$Modycue->Body();

   require_once pathPhpTools."/TUnicodeUser/UnicodeUserClass.php";
   MakeTitle('Страничка разрешена собственнику сайта. Смотрите возможные иконки разделов материалов и статей!',ttMessage);
   $Unicoder=new UnicodeUser('Emojitveme'); 
   //$Unicoder->ViewCharsetAsColomn(0);
   //$Unicoder->ViewIntervalAsColomn('2300','2650');
   //$Unicoder->ViewFontAwesome470AsColomn('f0b3','f200');
   $Unicoder->ViewCharsetAsTable(0,8);
   $Unicoder->ViewCharsetAsTable(5,8);
   $Unicoder->ViewCharsetAsTable(4,8);
   $Unicoder->ViewCharsetAsTable(3,8);
   $Unicoder->ViewFontAwesome470AsTable('f0b3','f200',8);
   $Unicoder->ViewCharsetAsTable(2,8);
   $Unicoder->ViewCharsetAsTable(1,8);
}

// ****************************************************************************
// *                           "Удалить раздел материалов"                    *
// ****************************************************************************
function mmlUdalitRazdelMaterialov_HEAD($game=NULL)
{
   require_once "ttools/TDelCueClass/DelCueClass.php";
   $Delcue=new DelCue($game);
   $Delcue->Head();
   return $Delcue;
}
function mmlUdalitRazdelMaterialov_BODY_WorkTiny($Delcue)
{
   //MakeTitle('Удалить раздел материалов! '.'&#128152;&#129315;',ttMessage);
   MakeTitle('Страничка будет следующей зимой, а здесь соберите сумму 2048.<br> У меня пока получилось 756!',ttMessage);
   $Delcue->Body();
}
// ****************************************************************************
// *      Настроить размеры шрифтов и полосок меню (рождественская версия)    *
// ****************************************************************************
function IniFontChristmas()
{
   echo '
   <style>
   .accordion li > a, 
   .accordion li > i 
   {
      font:bold .9rem/1.8rem Arial, sans-serif;
      padding:0 1rem 0 1rem;
      height:2rem;
   }
   .accordion li > a span, 
   .accordion li > i span 
   {
      font:normal bold .8rem/1.2rem Arial, sans-serif;
      top:.4rem;
      right:0;
      padding:0 .6rem;
      margin-right:.6rem;
   }
   </style>
   ';
}

// ----------------------------------------------------- mmlNaznachitStatyu ---

// ****************************************************************************
// *           Подготовить стили страницы при назначении новой статьи         *
// ****************************************************************************
function mmlNaznachitStatyu_HEAD()
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
// ****************************************************************************
// *   Построить панель выбранных значений при назначении новой статьи        *
// ****************************************************************************
function mmlNaznachitStatyu_BODY_KwinGallery()
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
         <div id="nazstSub">
         </div>
      </div>
   ';
   //$this->Galli->BaseGallery(mwgEditing);
}
// ****************************************************************************
// *            Выполнить действия в области редактирования "WorkTiny"        *
// *                        при назначении новой статьи                       *
// ****************************************************************************
function mmlNaznachitStatyu_BODY_WorkTiny($messa,$pdo,$Arti)
{
   if (\prown\getComRequest('nsnGru')==NoDefine)
   {
      ?> <script> 
         $(document).ready(function() {Error_Info('Группа материалов не назначена!');})
      </script> <?php
   }
   // Проверяем и учитываем уже выбранные данные
   if (\prown\getComRequest('nsnName')==NULL) $nsnName='';
   else $nsnName='value="'.\prown\getComRequest('nsnName').'"';
   if (\prown\getComRequest('nsnDate')==NULL) $nsnDate='';
   else $nsnDate='value="'.\prown\getComRequest('nsnDate').'"';
   // Выводим заголовочное сообщение
   MakeTitle($messa,ttMessage);
   // Выбираем название и дату новой статьи
   $SaveAction=$_SERVER["SCRIPT_NAME"];
   echo '
      <div id="nsGroup">
      <form id="frmNaznachitStatyu" method="post" action="'.$SaveAction.'">
   ';
   echo '
      <input id="nsName" type="text" name="nsnName" '.$nsnName.
         ' placeholder="Название нового материала"'.
         ' required onchange="changeNsName(this.value)">
      <input id="nsDate" type="date" name="nsnDate" '.$nsnDate.
         ' required onchange="changeNsDate(this.value)">
      <input id="nsCue"  type="hidden" name="nsnCue" value="'.NoDefine.'">
      <input id="nsGru"  type="hidden" name="nsnGru" value="'.NoDefine.'">
   ';
   echo '
      </form>
      </div>
   ';
   // Выбираем группу материалов для которой создается новая статья
   echo '<div id="AddArticle">';
      $Arti->MakeUniMenu($pdo,'getNameCue');
   echo '</div>';
}

// *********************************************************** WorkTiny.php ***
