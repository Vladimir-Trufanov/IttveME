<?php namespace ttools; 
                                         
// PHP7/HTML5, EDGE/CHROME                            *** Dispatch_HEAD.php ***

// ****************************************************************************
// * TinyGalleryClass          Блок функций при загрузке страниц на фазе HEAD *
// *                                                                          *
// * v1.0, 18.03.2022                              Автор:       Труфанов В.Е. *
// * Copyright © 2022 tve                          Дата создания:  13.11.2022 *
// ****************************************************************************

// ****************************************************************************
// *                             "Жизнь и путешествия"                        *
// ****************************************************************************
function mmlZhiznIputeshestviya_HEAD()
{
    // Отключаем разворачивание аккордеона
    // как в случае, когда создаем заголовок новой статьи. 
    echo '
    <style>
      .accordion li .sub-menu 
      {
         height:100%;
      }
      .accordion,
      .accordion ul,
      .accordion li,
      .accordion a,
      .accordion span,
      .sub-menu li a 
      {
         background:#e0e3ec url(../Images/Menu/bgnoise_lg.jpg) repeat top left;
      }
      .sub-menu li:hover a
      {
         color:#ab4a16;  
         background:#efefef;
      }
    </style>
    ';
}
// ****************************************************************************
// *                         "Отправить сообщение автору"                     *
// ****************************************************************************
function mmlOtpravitAvtoruSoobshchenie_HEAD($game=NULL)
{
   require_once "ttools/TSaymeClass/SaymeClass.php";
   $Sayme=new Noticing($game);
   $Sayme->Head();
   return $Sayme;
}

// ****************************************************** Dispatch_HEAD.php ***
