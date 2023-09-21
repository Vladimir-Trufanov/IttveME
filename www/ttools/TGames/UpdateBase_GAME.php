<?php namespace ttools; 
                                         
// PHP7/HTML5, EDGE/CHROME                          *** UpdateBase_GAME.php ***

// ****************************************************************************
// * TGames               Добавить в базу данных запись для вызова новой игры *
// *                                            в зависимости от версии сайта *
// *                                                                          *
// * v1.0, 21.09.2023                              Автор:       Труфанов В.Е. *
// * Copyright © 2023 tve                          Дата создания:  21.09.2023 *
// ****************************************************************************

// По состоянию к версии сайта=31 на 2023.09.21 есть запись "Игры" с Uid=22.
// 
function UpdateBaseGame($Arti)
{
   \prown\ConsoleLog('$Arti: '.$Arti->getArti); 
   $pdo=$Arti->BaseConnect();
   // Выбираем $pid,$uid,$NameGru,$NameArt,$DateArt,$contents по транслиту
   // 
   $ErrMessage=$Arti->SelUidPid($pdo,$Arti->getArti,$pid,$uid,$NameGru,$NameArt,$DateArt,$contents);
   
   if ($ErrMessage<>imok) \prown\Alert($ErrMessage); 
}

// ****************************************************** Dispatch_HEAD.php ***
