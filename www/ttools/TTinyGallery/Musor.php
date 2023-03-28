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

// *********************************************************** WorkTiny.php ***
