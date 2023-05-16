// PHP7/HTML5, EDGE/CHROME                                  *** WorkTiny.js ***

// ****************************************************************************
// * ittve.me                                Блок общих функций на JavaScript *
// *                                                                          *
// * v1.0, 22.04.2023                               Автор:      Труфанов В.Е. *
// * Copyright © 2023 tve                           Дата создания: 09.01.2023 *
// ****************************************************************************

// Выполняем действия  по завершении загрузки страницы
$(document).ready(function()
{
   // Стандартный вариант предупреждения перед закрытием страницы 
   /*
   window.addEventListener('beforeunload', function (event) 
   {
      // Запускаем диалог по закрытию страницы
      event.returnValue = '';
   })
   // Вариант, установленный в ArticleMakerClass
   onbeforeunload = (event) => {EraseFiles();};
   */

   // *************************************************************************
   // *              Отследить действия при назначении новой статьи           *
   // *************************************************************************
   $('#nsDate').on('focusin',function()
   {
      $(this).siblings('#nsName').css({
         'z-index'   :'1',
         'background':'rgba(0,0,0,.1)',
      });
      $(this).css({
         'z-index' : '2',
         'background' : '#fff',
      });
   });
   $('#nsName').on('focusin',function(){
      $(this).siblings('#nsDate').css({
         'z-index'   :'1',
         'background':'rgba(0,0,0,.1)'
      });
      $(this).css({
         'z-index' : '2',
         'background' : '#fff'
      });
   });
   $('#nsDate').on('focusout',function(){
      $(this).siblings('#nsName').css({
         'z-index'   :'1',
         'background':'rgba(0,0,0,.1)'
      });
      $(this).css({
         'z-index' : '2',
         'background' : '#fff'
      });
   });
   $('#nsName').on('focusout',function(){
      $(this).siblings('#nsDate').css({
         'z-index'   :'1',
         'background':'rgba(0,0,0,.1)'
      });
      $(this).css({
         'z-index' : '2',
         'background' : '#fff'
      });
   });
})

// ****************************************************************************
// *                   Убедиться, что изображение внутри дива                 *
// ****************************************************************************
function isImgInDiv(widthDiv,heightDiv,wImg,hImg)
{
   let Result=true;
   if (widthDiv<wImg || heightDiv<hImg) Result=false;
   return Result;
}
// ****************************************************************************
// *    Изменить размеры изображения так, чтобы оно помещалось внутрь дива    *
// ****************************************************************************
function setAlignImg(widthDiv,heightDiv,wImg,hImg)
{
   // Если размеры изображения меньше размеров дива,
   // то изображение оставляем как есть
   if (isImgInDiv(widthDiv,heightDiv,wImg,hImg))
   {
      alignImg=
      { 
         "p_widthImg" : wImg,
         "p_heightImg": hImg
      }
   }
   else
   {
      // Определяем коэффициент приведения по ширине
      let k1=widthDiv/wImg;
      // Приводим высоту и ширину изображения к диву
      let p1_widthImg=k1*wImg;
      let p1_heightImg=k1*hImg;
      // Если новая высота изображения меньше высоты дива,
      // то фиксируем
      if (p1_heightImg<heightDiv)
      {
         alignImg=
         { 
            "p_widthImg" : p1_widthImg,
            "p_heightImg": p1_heightImg
         }
      }
      // Иначе приводим по высоте
      else
      {
         let k2=heightDiv/p1_heightImg;
         let p2_widthImg=k2*p1_widthImg;
         let p2_heightImg=k2*p1_heightImg;
         alignImg=
         { 
            "p_widthImg" : p2_widthImg,
            "p_heightImg": p2_heightImg
         }
      }
   }
   // Возвращаем размеры приведенного изображения
   /*
   alert
   (
      'widthDiv  = '+widthDiv +'    '+'p_widthImg  = '+alignImg["p_widthImg"]+'\n'+
      'heightDiv = '+heightDiv+'    '+'p_heightImg = '+alignImg["p_heightImg"]+'\n'+
      ''
   )
   */
   return alignImg;
}
// ****************************************************************************
// *       Расчитать изображение по центру и внутри дива, исходя из того,     *
// *             что размеры изображения не больше размеров дива              *
// ****************************************************************************
function CalcPicOnDiv(widthDiv,heightDiv,p_widthImg,p_heightImg,wImg,hImg,perSize)
{
   // Определяем возвращаемый массив
   aCalcPicOnDiv=
   { 
      "widthImg":  320,
      "heightImg": 320,
      "nLeft":     10,
      "nTop":      10
   }
   // Если размеры изображения меньше размеров дива,
   // то изображение оставляем как есть
   if (isImgInDiv(widthDiv,heightDiv,wImg,hImg))
   {
      widthImg=wImg;
      heightImg=hImg;
   }
   else
   {
      // Если размеры изображения и дива совпадают по ширине
      if (Math.abs(widthDiv-p_widthImg)<1)
      {
         // Определяем ширину изображения
         widthImg=widthDiv*perSize/100;
         // Определяем высоту изображения             *** wImg     --> hImg ***  
         // в диве из пропорции:                      *** widthImg --> x    ***
         heightImg=widthImg*hImg/wImg;
      }
      else
      {
         // Определяем высоту изображения
         heightImg=heightDiv*perSize/100;
         // Определяем ширину изображения            *** wImg --> hImg      ***  
         // в диве из пропорции:                     *** x    --> heightImg ***
         widthImg=wImg*heightImg/hImg;
      }
   }
   aCalcPicOnDiv.widthImg=widthImg;
   aCalcPicOnDiv.heightImg=heightImg;
   // Центрируем изображение по диву
   aCalcPicOnDiv.nLeft=(widthDiv-widthImg)/2;
   aCalcPicOnDiv.nTop=(heightDiv-heightImg)/2;
   // Чуть приподнимаем изображение вверх
   aCalcPicOnDiv.nTop=aCalcPicOnDiv.nTop*0.9;
   /*
   alert
   (
      'alignImg = '+alignImg+'\n'+
      'ширина    = '+wImg     +'    '+'высота    = '+hImg     +'\n\n'+
      'widthDiv  = '+widthDiv +'    '+'widthImg  = '+widthImg +'\n'+
      'heightDiv = '+heightDiv+'    '+'heightImg = '+heightImg+'\n'+
      ''
   )
   */
   return aCalcPicOnDiv;
}
// ****************************************************************************
// *       Отключить блокировку закрытия страницы редактирования материала    *
// ****************************************************************************
function SaveTrue() 
{
   //window.onbeforeunload = () => null;
} 
// ****************************************************************************
// *   Вызвать запуск ссылки на страницу с нажатием кнопки управляющего меню  *
// ****************************************************************************
function PunktClick(idClick)
{
   document.getElementById(idClick).click(); 
}
// ****************************************************************************
// *            Отработать действия при назначении новой статьи               *
// ****************************************************************************
// Отметить выбранную дату при назначении новой статьи на панели значений
function changeNsDate(value)
{
   nsDate=new Date(value);
   newvalue=nsDate.toLocaleDateString()
   $('#wvDat').html(newvalue);
   $('#wnDat').css('color','#993300');
   test3newArt();
}
// Отметить название новой статьи на панели значений
// (только в случае, если транслит статьи - новый,
// а для этого делаем проверку через аякс-запрос)
function changeNsName(NameArt)
{
   pathphp="testNameArt.php";
   // Делаем запрос на определение наименования раздела материалов
   $.ajax({
      url: pathphp,
      type: 'POST',
      data: {namearti:NameArt, pathTools:pathPhpTools, pathPrown:pathPhpPrown, sh:SiteHost},
      // Выводим ошибки при невозможности выполнении запроса
      error: function (jqXHR,exception,errorMsg) 
      {
         Error_Info(pathphp+': '+SmarttodoError(jqXHR,exception));
      },
      // Обрабатываем ответное сообщение
      success: function(message)
      {
         // Вырезаем из запроса чистое сообщение
         messa=FreshJSON(message);
         // Получаем параметры ответа
         parm=JSON.parse(messa);
         // При ошибке выводим сообщение об ошибке
         if (parm.iif==Err) Error_Info(parm.NameGru);
         // Если все хорошо, то хорошо и отмечаем на панели
         else
         {
            $('#wvArt').html(NameArt);
            $('#wnArt').css('color','#993300');
            test3newArt();
         }
      }
   });
}
// Задать обработчик аякс-запроса по клику выбора раздела материалов
// при назначении новой статьи
function getNameCue(Uid)
{
   pathphp="getNameCue.php";
   // Делаем запрос на определение наименования раздела материалов
   $.ajax({
      url: pathphp,
      type: 'POST',
      data: {idCue:Uid,pathTools:pathPhpTools,pathPrown:pathPhpPrown,sh:SiteHost},
      // Выводим ошибки при невозможности выполнении запроса
      error: function (jqXHR,exception,errorMsg) 
      {
         Error_Info(pathphp+': '+SmarttodoError(jqXHR,exception));
      },
      // Обрабатываем ответное сообщение
      success: function(message)
      {
         // Вырезаем из запроса чистое сообщение
         messa=FreshJSON(message);
         // Получаем параметры ответа
         parm=JSON.parse(messa);
         // При ошибке выводим сообщение об ошибке
         if (parm.iif==Err) 
         { 
            Error_Info(parm.NameGru);
         }
         // Если все хорошо, работаем с экраном
         else
         {
            $('#nsCue').attr('value',Uid);
            $('#nsGru').attr('value',parm.Piati);
         
            $('#wvCue').html(parm.NameGru);
            $('#wnCue').css('color','#993300');
            $('#wvCue').css('color','#993300');
            test3newArt();
         }
      }
   });
   //
}
// Вытащить кнопку "Записать реквизиты статьи" по готовности трех параметров:
// указании названия новой статьи, даты ее создания и выборе группы материалов
function test3newArt()
{
   let ccue=$('#wvCue').html();
   let cart=$('#wvArt').html();
   let cdat=$('#wvDat').html();
   if (ccue !== nstNoVyb && cart !== nstNoNaz && cdat !== nstNoVyb) 
   {
      $('#nazstSub').html('<input type="submit" value="Записать реквизиты статьи" form="frmNaznachitStatyu">');
   }
}
// ****************************************************************************
// *         Отработать действия при выборе статьи для редактирования         *
// ****************************************************************************
function getTranslit(Uid)
{
   alert(Uid);
}
// ****************************************************************************
// *                  Отработать действия по удалению материала               *
// ****************************************************************************
function UdalitMater(Uid)
{
   // По указанному идентификатору выбираем название статьи и 
   // проверяем есть ли не удаленные изображения
   pathphp="testForDelArt.php";
   // Делаем запрос на определение наименования раздела материалов
   $.ajax({
      url: pathphp,
      type: 'POST',
      data: {idArt:Uid,pathTools:pathPhpTools,pathPrown:pathPhpPrown,sh:SiteHost,urll:urlHome},
      // Выводим ошибки при выполнении запроса в PHP-сценарии
      error: function (jqXHR,exception) {SmarttodoError(jqXHR,exception)},
      // Обрабатываем ответное сообщение
      success: function(message)
      {
         // Вырезаем из запроса чистое сообщение
         messa=FreshJSON(message);
         // Получаем параметры ответа
         parm=JSON.parse(messa);
         // При ошибке выводим сообщение об ошибке
         if (parm.iif==Err) 
         { 
            Error_Info(parm.NameGru);
         }
         // Если все хорошо, работаем с экраном
         else
         {
            $('#DialogWind').dialog
            ({
                buttons:[{text:"OK",click:function(){xUdalitMater(Uid)}}]
            });
            htmlText="Удалить выбранный материал: "+parm.Piati+"?";
            Notice_Info(htmlText,"Удалить материал");
         }
      }
   });
}
function xUdalitMater(Uid)
{
   // Выводим в диалог предварительный результат выполнения запроса
   htmlText="Удалить статью по "+Uid+" не удалось!";
   // Выполняем запрос на удаление
   pathphp="deleteArt.php";
   // Делаем запрос на определение наименования раздела материалов
   $.ajax({
      url: pathphp,
      type: 'POST',
      data: {idCue:Uid,pathTools:pathPhpTools,pathPrown:pathPhpPrown,sh:SiteHost},
      // Выводим ошибки при выполнении запроса в PHP-сценарии
      error: function (jqXHR,exception) {SmarttodoError(jqXHR,exception)},
      // Обрабатываем ответное сообщение
      success: function(message)
      {
         // Вырезаем из запроса чистое сообщение
         messa=FreshLabel(message);
         // Получаем параметры ответа
         parm=JSON.parse(messa);
         // Выводим результат выполнения
         if (parm.NameArt=='gncNoCue') htmlText=parm.NameArt+' Uid='+Uid;
         else htmlText=parm.NameArt;
         $('#DialogWind').html(htmlText);
      }
   });
   // Удаляем кнопку из диалога и увеличиваем задержку до закрытия
   delayClose=1500;
   $('#DialogWind').dialog
   ({
      buttons:[],
      hide:{effect:"explode",delay:delayClose,duration:1000,easing:'swing'},
      title: "Удаление материала",
   });
   // Закрываем окно
   $("#DialogWind").dialog("close");
   // Перезагружаем страницу через 1 секунду
   setTimeout(function() {location.reload();},1000);
}
// ****************************************************************************
// *       Установить взаимодействие кликов при работе в галерее              *
// ****************************************************************************
// По клику на кнопке выполнить выбор файла и 
// активировать клик для загрузки файла
function alf1FindFile() 
{
   document.getElementById('infCard').click(); // alf2LoadFile()
} 
// При изменении состояния input file активизировать кнопку "submit" для
// загрузки выбранного файла во временное хранилище на сервере 
function alf2LoadFile() 
{
   // По нажатию кнопки "submit" отправляем запрос из формы на выполнение
   // модуля проверки параметров файла, загруженного во временное хранилище,
   // его переброски на постоянное хранение и переименование  
   document.getElementById('insCard').click(); // "submit"
   // Удаляем старые файлы
   //alfEraseFiles();
}
// Инициировать запись в базу данных изображения и комментария
function alf3SaveImgComm() 
{
   document.getElementById('insCard').click(); // "submit"
} 


/*
// Готовим обработку события при изменении положения устройства
function doOnOrientationChange()
// http://greymag.ru/?p=175, 07.09.2011. При повороте устройства браузер 
// отсылает событие orientationchange. Это актуально для обеих операционных 
// систем. Но подписка на это событие может осуществляться по разному. 
// При проверке на разных устройствах iPhone, iPad и Samsung GT (Android),
// выяснилось что в iOS срабатывает следующий вариант установки обработчика: 
// window.onorientationchange = handler; А для Android подписка осуществляется 
// иначе: window.addEventListener( 'orientationchange', handler, false ); 
//
// Примечание: В обоих примерах handler - функция-обработчик. Текущую ориентацию
// экрана можно узнать проверкой свойства window.orientation, принимающего одно
// из следующих значений: 0 — нормальная портретная ориентация, -90 —
// альбомная при повороте по часовой стрелке, 90 — альбомная при повороте 
// против часовой стрелки, 180 — перевёрнутая портретная ориентация (пока 
// только для iPad).
//         
// Отследить переворот экрана:
// https://www.cyberforum.ru/javascript/thread2242547.html, 08.05.2018
{
   if ((window.orientation==0)||(window.orientation==180))
   {
      window.location=SignaPortraitUrl;
   } 
   if ((window.orientation==90)||(window.orientation==-90))
   { 
      window.location=SignaUrl;
   }
}
function OnOrientationChange(xOrient) 
{
   // console.log(window.orientation);
   // Если фактически портрет, а кукис ландшафт, то перегружаем на портрет
   if ((window.orientation==0)||(window.orientation==180))
   {
      if (xOrient==oriLandscape) window.location=SignaPortraitUrl;
   } 
   // Если фактически альбом, а кукис портрет, то перегружаем на альбом
   if ((window.orientation==90)||(window.orientation==-90)||(window.orientation==undefined))
   { 
      if (xOrient==oriPortrait) window.location=SignaUrl;
   }
}
// ****************************************************************************
// *     Изменить цвет поля ввода процентов смещения штампа в малозаметный,   *
// * указав таким образом пользователю, что при сохранении пропорциональности *
// *                    штампа, данное поле не работает                       *
// ****************************************************************************
function alf1MaintainProp()
{
   if (document.getElementById('MaintainProp').checked) 
   {
      $('.PerSizeImg').css('color','DarkGoldenRod');
      $('#PerSizeInput').css('color','DarkGoldenRod');
      $('#PerSizeImg').html('Процент размера подписи по ширине изображения:');
      $('#MaintainProp').attr('value',ohMaintainTrue);
      $('#MaintainCtrl').attr('value',ohMaintainFalse);
      $('#MaintainCtrl').prop('checked',false);
   } 
   else 
   {
      $('.PerSizeImg').css('color','black'); 
      $('#PerSizeInput').css('color','black');
      $('#PerSizeImg').html('Процент размера подписи к изображению:');
      $('#MaintainCtrl').attr('value',ohMaintainTrue);
      $('#MaintainProp').attr('value',ohMaintainFalse);
      $('#MaintainCtrl').prop('checked',true);
   }   
} 
*/
// ****************************************************************************
// *                      Выйти на главную страницу сайта                     *
// ****************************************************************************
function alf1Home()
{
   alfEraseFiles();
   location.replace(urlHome);
}   
// ****************************************************************************
// *          Отработать ajax-запрос для удаления старых файлов               *
// ****************************************************************************
function formatDateTime(date) 
{
   dd=date.getDate();
   if (dd < 10) dd = '0' + dd;
   mm = date.getMonth() + 1;
   if (mm < 10) mm = '0' + mm;
   yy = date.getFullYear();
   if (yy < 10) yy = '0' + yy;

   hh=date.getHours();
   if (hh < 10) hh = '0' + hh;
   ii=date.getMinutes();
   if (ii < 10) ii = '0' + ii;
   ss=date.getSeconds();
   if (ss < 10) ss = '0' + ss;
   return yy+'-'+mm+'-'+dd+' '+hh+':'+ii+':'+ss;
}
function EraseFiles() 
{
   $.ajax({
      type:'POST',                        // тип запроса
      url: 'EraseFiles.php',           // скрипт обработчика
      dataType: "json",
      data:  {first:1, second:"second"},  // данные которые мы передаем
      cache: true,  // запрошенные страницы кэшировать браузером (задаем явно для IE)
      processData: false,                 // отключаем, так как передаем файл
      // Отмечаем результат выполнения скрипта по аякс-запросу (успешный или нет)
      success:function(data)
      {
         alert(data[0].text);
      },
      // Отмечаем безуспешное удаление старых файлов
      error:function(data)
      {
         alert(formatDateTime(new Date())+' '+ajUndeletionOldFiles+'!');
      }
   });
} 

// ************************************************************ WorkTiny.js *** 
