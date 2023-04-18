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
function mmlZhiznIputeshestviya_HEAD($Arti,$apdo)
{
   require_once "ttools/TZhizniPuti/ZhizniPutiClass.php";
   $ZhizniPuti=new ZhizniPuti($Arti,$apdo);
   $ZhizniPuti->Head();
   return $ZhizniPuti;
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
// ****************************************************************************
// *                         "Войти или зарегистрироваться"                   *
// ****************************************************************************
function mmlVojtiZaregistrirovatsya_HEAD($game=NULL)
{
   require_once "ttools/TEntryClass/EntryClass.php";
   $Entry=new Entrying($game);
   $Entry->Head();
   return $Entry;
}
// ****************************************************************************
// *                         "Войти или зарегистрироваться"                   *
// ****************************************************************************
function mmlIzmenitNastrojkiSajta_HEAD($aPresMode,$aModeImg,$urlHome,$moditap)
{
   require_once "ttools/TTuningClass/TuningClass.php";
   $Tune=new Tuning($aPresMode,$aModeImg,$urlHome,$moditap);
   $Tune->Head();
   return $Tune;
}
// ****************************************************************************
// *             "Редактировать выбранный материал или создать новый"         *
// ****************************************************************************
function mmlSozdatRedaktirovat_HEAD($Arti,$apdo)
{
   require_once "ttools/TModyArt/ModyArtClass.php";
   $ModyArt=new ModyArt($Arti,$apdo);
   $ModyArt->Head();
   return $ModyArt;
}
// ****************************************************************************
// *                        "Назначить новую статью"                          *
// ****************************************************************************
function mmlNaznachitStatyu_HEAD($Arti,$apdo)
{
   require_once "ttools/TNewArt/NewArtClass.php";
   $NewArt=new NewArt($Arti,$apdo);
   $NewArt->Head();
   return $NewArt;
}
// ****************************************************************************
// *                            "Удалить материал"                            *
// ****************************************************************************
function mmlUdalitMaterial_HEAD($Arti,$apdo)
{
   require_once "ttools/TDelArt/DelArtClass.php";
   $DelArt=new DelArt($Arti,$apdo);
   $DelArt->Head();
   return $DelArt;
}
// ****************************************************************************
// *                   "Изменить заголовок раздела или иконку"                *
// ****************************************************************************
function mmlIzmenitNazvanieIkonku_HEAD()
{
   require_once "ttools/TModyCue/ModyCueClass.php";
   $ModyCue=new ModyCue();
   $ModyCue->Head();
   return $ModyCue;
}
// ****************************************************************************
// *                      "Добавить новый раздел материалов"                  *
// ****************************************************************************
function mmlDobavitNovyjRazdel_HEAD($game=NULL)
{
   require_once "ttools/TNewCue/NewCueClass.php";
   $Newcue=new NewCue($game);
   $Newcue->Head();
   return $Newcue;
}
// ****************************************************************************
// *                          "Удалить раздел материалов"                     *
// ****************************************************************************
function mmlUdalitRazdelMaterialov_HEAD($game=NULL)
{
   require_once "ttools/TDelCue/DelCueClass.php";
   $DelCue=new DelCue($game);
   $DelCue->Head();
   return $DelCue;
}

// ****************************************************** Dispatch_HEAD.php ***
