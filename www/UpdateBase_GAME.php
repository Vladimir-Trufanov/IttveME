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
function UpdateBaseGame($versi,$Arti)
{
   // Делаем запись по игре "Выбрать парные карты (Thomas Seng Hin Mak)"
   if ($versi=32)
   {
      $getArti='vybrat-parnye-karty';
      // Выбираем $pid,$uid,$NameGru,$NameArt,$DateArt,$contents по транслиту
      $pdo=$Arti->BaseConnect();
      $ErrMessage=$Arti->SelUidPid($pdo,$getArti,$pid,$uid,$NameGru,$NameArt,$DateArt,$contents);
      // Если все хорошо, то есть запись найдена, то удаляем ее, как старую
      if ($ErrMessage==imok)
      {
         $ErrMessage=$Arti->DelRecord($pdo,$uid);
      }
      // Если ошибки нет, просто запись не найдена, то отмечаем, как успех
      else
      {
         $substr='Не найдено записей по транслиту';
         $str=substr($ErrMessage,0,strlen($substr));
         if ($str===$substr) $ErrMessage=imok;   
      }
      // Если все-таки ошибка, то выводим сообщение
      if ($ErrMessage<>imok) \prown\Alert($ErrMessage);
      // Если всё хорошо, то добавляем запись
      else
      {
         $NameArt='Выбрать парные карты (Thomas Seng Hin Mak)';
         $DateArt='2023.03.03';   // 03.03.2023
         $contents='Thomas Seng Hin Mak:  http://gamedesign.cc/html5games/css3-matching-game/';
         $Arti->InsGameByTranslit($pdo,$getArti,$NameArt,$DateArt,$contents);
      }
   }
       
}

// ****************************************************** Dispatch_HEAD.php ***
