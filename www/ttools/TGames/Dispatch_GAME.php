<?php namespace ttools; 
                                         
// PHP7/HTML5, EDGE/CHROME                            *** Dispatch_GAME.php ***

// ****************************************************************************
// * TGames                                            Диспетчер загрузки игр *
// *                                                                          *
// * v1.0, 20.09.2023                              Автор:       Труфанов В.Е. *
// * Copyright © 2023 tve                          Дата создания:  20.09.2023 *
// ****************************************************************************

// ****************************************************************************
// *                             "Жизнь и путешествия"                        *
// ****************************************************************************
function ammlZhiznIputeshestviya_HEAD($Arti,$apdo,$urlHome)
{
   require_once "ttools/TZhizniPuti/ZhizniPutiClass.php";
   $ZhizniPuti=new ZhizniPuti($Arti,$apdo,$urlHome);
   $ZhizniPuti->Head();
   return $ZhizniPuti;
}
// ****************************************************************************
// *                         "Войти или зарегистрироваться"                   *
// ****************************************************************************
function ammlVojtiZaregistrirovatsya_HEAD($game=NULL)
{
   require_once "ttools/TEntryClass/EntryClass.php";
   $Entry=new Entrying($game);
   $Entry->Head();
   return $Entry;
}

// ****************************************************** Dispatch_HEAD.php ***
