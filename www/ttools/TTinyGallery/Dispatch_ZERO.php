<?php namespace ttools; 
                                         
// PHP7/HTML5, EDGE/CHROME                            *** Dispatch_ZERO.php ***

// ****************************************************************************
// * TinyGalleryClass          Блок функций при загрузке страниц на фазе ZERO *
// *                                                                          *
// * v1.0, 15.03.2022                              Автор:       Труфанов В.Е. *
// * Copyright © 2022 tve                          Дата создания:  13.11.2022 *
// ****************************************************************************

// 2-ZERO этап 

// ----------------------------------------------- 'Выбрать следующий материал'
function mmlVybratSledMaterial_ZERO($Arti,&$getArti,$urlHome)
{
   // Инициируем сообщение в случае успешного поиска и 
   // идентификатор записи для поиска
   $DelayedMessage=imok;
   $uid=0;
   // Подключаемся к базе данных
   $apdo=$Arti->BaseConnect();
   // Если транслит указан, то ищем идентификатор по транслиту
   if ($getArti<>NULL) 
   {
      $pid=0; $NameGru=''; $NameArt=''; $DateArt=''; $contents='';
      $DelayedMessage=$Arti->SelUidPid($apdo,$getArti,$pid,$uid,$NameGru,$NameArt,$DateArt,$contents);
   }
   if ($DelayedMessage==imok)
   {
      // Если идентификатор найден, то выходим на материал
      $a=$Arti->SelNextTranslit($apdo,$uid);
      // Если записей не найдено, то повторяем поиск с начальной записи
      if (count($a)<1) $a=$Arti->SelNextTranslit($apdo,0);
      // Если снова записей не найдено, то формируем ошибку
      if (count($a)<1) $a=array(array("NameArt"=>'Не найдено записей в базе данных!',"Translit"=>nstErr,));
      // Если ошибка, то формируем отложенное сообщение
      if ($a[0]["Translit"]==nstErr) $DelayedMessage=$a[0]["NameArt"];
      // Если поиск удачный, то возвращаем найденный транслит
      else 
      {
         $getArti=$Arti->setCurrTranslit($a[0]["Translit"]); 
         // Загружаем страницу редактирования нового материала
         //Header("Location: ".$urlHome.'/?arti='.$a[0]["Translit"],true);

         
         //?arti=kindasovo-zemlya-karelskogo-yumora
      }
   }
   // Возвращаем сообщение
   return $DelayedMessage;
} 
// -------------------------------------------- 'Вернуться к предыдущей статье'
function mmlVernutsyaPredState_ZERO($Arti,&$getArti)
{
   // Инициируем сообщение в случае успешного поиска и 
   // идентификатор записи для поиска
   $DelayedMessage=imok;
   $uid=0;
   // Подключаемся к базе данных
   $apdo=$Arti->BaseConnect();
   // Если транслит указан, то ищем идентификатор по транслиту
   if ($getArti<>NULL) 
   {
      $pid=0; $NameGru=''; $NameArt=''; $DateArt=''; $contents='';
      $DelayedMessage=$Arti->SelUidPid($apdo,$getArti,$pid,$uid,$NameGru,$NameArt,$DateArt,$contents);
   }
   if ($DelayedMessage==imok)
   {
      // Назначаем максимальный идентификатор
      // (на 17.03.2023 считаем, что больше 100 000 записей не будет)
      $MaxId=100001;
      // Если идентификатор найден, то выходим на материал
      $a=$Arti->SelPrevTranslit($apdo,$uid);
      // Если записей не найдено, то повторяем поиск с последней записи
      if (($a[0]["Translit"]==nstErr)&&($a[0]["NameArt"]=="NoRecords")) $a=$Arti->SelPrevTranslit($apdo,$MaxId);
      //if (count($a)<1) $a=$Arti->SelPrevTranslit($apdo,$MaxId);
      // Если снова записей не найдено, то формируем ошибку
      if (count($a)<1) $a=array(array("NameArt"=>'Не найдено записей в базе данных c uid<1000001!',"Translit"=>nstErr,));
      // Если ошибка, то формируем отложенное сообщение
      if ($a[0]["Translit"]==nstErr) $DelayedMessage=$a[0]["NameArt"];
      // Если поиск удачный, то возвращаем найденный транслит
      else $getArti=$Arti->setCurrTranslit($a[0]["Translit"]); 
   }
   // Возвращаем сообщение
   return $DelayedMessage;
} 

// ****************************************************** Dispatch_ZERO.php ***
