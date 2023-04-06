<?php namespace ttools; 
                                         
// PHP7/HTML5, EDGE/CHROME                                 *** WorkTiny.php ***

// ****************************************************************************
// * TinyGalleryClass             Блок функций расширения класса TTinyGallery *
// *                                                                          *
// * v1.0, 14.03.2022                              Автор:       Труфанов В.Е. *
// * Copyright © 2022 tve                          Дата создания:  13.11.2022 *
// ****************************************************************************
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
