// JS/PHP7/HTML5/CSS3                                      *** ViewImage.js ***

// ****************************************************************************
// * TViewImage        Модули отдельного детального представления изображений *
// *                                                                          *
// * v2.1, 19.05.2023                               Автор:      Труфанов В.Е. *
// * Copyright © 2023 tve                           Дата создания: 09.01.2023 *
// ****************************************************************************

// ****************************************************************************
// *     Инициировать окно отдельного детального представления изображений    *
// *                      по завершении загрузки страницы                     *
// ****************************************************************************
$(document).ready(function()
{
})
// ****************************************************************************
// *     Инициировать диалоговое окно для детального показа изображения       *
// ****************************************************************************
function iniImageClick(iUid,iTranslitPic,Comment,isSrc,wimg,himg)
{

   // Создаем див для диалогового окна, в котором будет разворачиваться 
   // изображение для детального рассмотрения
   // 08.05.2023 див уже включен в разметку
   // let imgdiv=document.createElement('div');
   // imgdiv.id="ImgDialogWind";
   // document.body.append(imgdiv);
   
   /*
   // Определяем, реализован ли в браузере механизм отложенного
   // показа изображений и показываем результат проверки в lazy-окошке (span)
   // нижней информационной строки
   let iwe=window.screen.width;
   let ihe=window.screen.height; 
   $('#scrwi').html(iwe);
   $('#scrhe').html(ihe);
   
   if ('loading' in HTMLImageElement.prototype) 
   { 
     // Поддерживается
     $('#lazy').html('lazy YES');
   } 
   else 
   {
     // Применить полифилл или JavaScript
     $('#lazy').html('lazy no');
   }
   */

   // Извлекаем размеры тела страницы (окна диалога)
   ifBody=document.body;
   var diaWidth=ifBody.offsetWidth;   
   var diaHeight=ifBody.offsetHeight;
   //let diaWidth=ifBody.clientWidth;   
   //let diaHeight=ifBody.clientHeight;
   
   // Пересчитываем для информации, размеры изображения так, чтобы оно 
   // помещалось внутрь дива 
   let AlignImg=setAlignImg(diaWidth,diaHeight,wimg,himg);
   
   // Формируем заголовок окна
   var diaTitle=Comment+' ['+diaWidth+'x'+diaHeight+']';
   //let cAlert='wimg='+wimg+'   himg='+himg;
   //let cAlert='p_widthImg='+AlignImg['p_widthImg']+'   p_heightImg='+AlignImg['p_heightImg'];
   let cAlert='';
   diaTitle=diaTitle+'   '+cAlert;

   // Строим диалоговое окно
   let isHide=true;
   let delayClose=250;
   let durClose=1000;
   
   $('#ImgDialogWind').dialog(
   {
      bgiframe:true,      // совместимость с IE6
      closeOnEscape:true, // закрывать при нажатии Esc
      modal:true,         // модальное окно
      resizable:true,     // разрешено изменение размера
      autoOpen:false,     // сразу диалог не открывать
      
      position:'left top',
      height:diaHeight,   
      width:diaWidth,
      title:diaTitle,
      draggable:true, 
      show:{effect:"fade",delay:100,duration:1500},
      hide:{effect:"explode",delay:delayClose,duration:durClose,easing:'swing'},
      
      //resizeStop: function(event, ui) 
      open: function(event, ui) 
      {
        alert
        (
        "width: " + $(this).outerWidth() + ", height: " + $(this).outerHeight() +"\n"+ 
        "width: " + $(this).innerWidth() + ", height: " + $(this).innerHeight()
        );        
      }
      
      
   });
   //$('#ImgDialogWind').dialog("open");  
   $('#ImgDialogWind').dialog(
   {
      //width:diaWidth-130,
   });

   //ifDialogWind=document.getElementById('ImgDialogWind');
   //alert('1 '+ifDialogWind.offsetWidth+'-'+ifDialogWind.offsetHeight);
   //diaWidth=ifDialogWind.offsetWidth;
   //diaHeight=ifDialogWind.offsetHeight;
 
   
   // Включаем изображение в диалоговое окно jQuery: width="189" height="255" 
   //wpimg=wimg; hpimg=himg;
   wpimg=diaWidth-100; hpimg=diaHeight-80;
   let messa='<img id="ImgDialog" src="'+isSrc+'" '+
       'width="'+wpimg+'" height="'+hpimg+
       '" alt="tutorialsPoint">';
   $('#ImgDialogWind').html(messa);
   //alert('2 '+ifDialogWind.offsetWidth+'-'+ifDialogWind.offsetHeight);
   
   // Позиционируем изображение 'Внутри страницы'
   if (ModeImg==vimOnPage) 
   {
      View_vimOnPage(diaWidth,diaHeight,wimg,himg,AlignImg);
   }
   // Позиционируем изображение 'В заданном размере в пикселах - как есть'
   else 
   {
      View_vimExiSize(diaWidth,diaHeight,wimg,himg);
   }

}
// ****************************************************************************
// *                 Позиционировать изображение 'Внутри страницы'            *
// ****************************************************************************
function View_vimOnPage(wWin,hWin,wImg,hImg,AlignImg)
{
   if (View_isInside(wWin,hWin,wImg,hImg)) {}
   else
   {
   
       //    alert($('#ImgDialogWind').outerWidth());        
       // alert($('#ImgDialogWind').outerHeight());    
        
      //  $( '#ImgDialogWind' ).dialog( "moveToTop" );    

      // Назначаем процент размера изображения от ширины дива (или высоты) 
      let perSize=100; //90; // процент  
      // Расчитываем изображение по центру дива
      let aCalcPicOnDiv=CalcPicOnDiv
      (
         wWin,hWin,
         AlignImg['p_widthImg'],AlignImg['p_heightImg'],
         wImg,hImg,
         perSize
      );
      
      /*
      // Формируем отладочный массив
      aCalcPicOnDiv=
      { 
         "widthImg":  320,
         "heightImg": 320,
         "nLeft":     100,
         "nTop":      100
      }
      */
      
      /*
      
      // Получаем координаты top и left
      let top_vimOnPage  = $('#ImgDialog').offset().top;
      let left_vimOnPage = $('#ImgDialog').offset().left;
      console.log('top_vimOnPage='+top_vimOnPage+'  left_vimOnPage='+left_vimOnPage);
      // Добавляем смещения
      let xOffset=aCalcPicOnDiv['nLeft']; let yOffset=aCalcPicOnDiv['nTop']; 
      xOffset=0; yOffset=0; 
      // Изменяем координаты позиции элемента
      $('#ImgDialog').offset({top:top_vimOnPage+yOffset, left:left_vimOnPage+xOffset});
      */
      
      // Устанавливаем новые размеры
      /*
      wpimg=aCalcPicOnDiv['widthImg']; hpimg=aCalcPicOnDiv['heightImg'];
      wpimg=wWin-100; hpimg=hWin-50;
      $('#ImgDialog').attr('width',wpimg);
      $('#ImgDialog').attr('height',hpimg);
      */
   }
}
// ****************************************************************************
// *  Позиционировать изображение 'В заданном размере в пикселах - как есть'  *
// ****************************************************************************
function View_vimExiSize(wWin,hWin,wImg,hImg)
{
   if (View_isInside(wWin,hWin,wImg,hImg)) {}
   else
   {
      // Здесь полагаемся на браузер
   }
}
// ****************************************************************************
// *    Позиционировать изображение 'Если изображение уже внутри страницы'    *
// ****************************************************************************
function View_isInside(wWin,hWin,wImg,hImg)
{
   Result=false;
   if (wImg <= wWin && hImg <= hWin) 
   {
      // Получаем координаты top и left
      top_View_isInside  = $('#ImgDialog').offset().top;
      left_View_isInside = $('#ImgDialog').offset().left;
      // Пересчитываем смещения (.7 смещаем вверх для благоприятного восприятия)
      xOffset_View_isInside=0; yOffset_View_isInside=0; 
      if (wImg>0) xOffset_View_isInside=(wWin-wImg)/2;
      if (hImg>0) yOffset_View_isInside=(hWin-hImg)/2*.7;  
      // Изменяем координаты позиции элемента
      $('#ImgDialog').offset
      ({
         top:  top_View_isInside  + yOffset_View_isInside, 
         left: left_View_isInside + xOffset_View_isInside
      });
      // Отмечаем, что уже отпозиционировали
      Result=true;
      return Result;
   }
}
// ****************************************************************************
// *    Изменить размеры изображения так, чтобы оно помещалось внутрь дива    *
// ****************************************************************************
function setAlignImg(widthDiv,heightDiv,wImg,hImg)
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
   //
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
// *        Переключиться на детальный просмотр выбранного изображения        *
// *               (через клик получаем uid,TranslitPic картинки)             *
// ****************************************************************************
function ImageClick(uid,TranslitPic)
{
   // Делаем запрос изображения
   getImgBase64(uid,TranslitPic,'Comment');
   //ViewDebug(uid,TranslitPic);
}
// ****************************************************************************
// *               Вывести информацию всякую-разную при отладке               *
// ****************************************************************************
function ViewDebug(uid,TranslitPic)
{
   let cAlert='';
   // Готовим url с параметрами, который мог быть для показа изображения
   let iuri=RootUrl+'?Image='+TranslitPic+'&Uid='+uid;
   // cAlert=cAlert+'imgUri='+iuri+"\n";
   // Могли переключиться на страницу просмотра изображения
   // location.assign(iuri);
   
   // Определяем размеры тела страницы
   let ifBody=document.body;
   let widthBody=ifBody.offsetWidth;
   let heightBody=ifBody.offsetHeight;
   cAlert=cAlert+'widthBody='+widthBody+'  heightBody='+heightBody+"\n";
   
   // Определяем ширину колонки галереи
   let ifGallery=document.getElementById('Gallery');
   let widthGallery=ifGallery.offsetWidth;

   // Определяем ширину дива галереи
   let ifCard=document.getElementById('d'+uid);
   let widthCard=ifCard.offsetWidth;
   let heightCard=ifCard.offsetHeight;
   // Определяем ширину кнопки в диве галереи
   let ifbCard=document.getElementById('b'+uid);
   let widthbCard=ifbCard.offsetWidth;
   let heightbCard=ifbCard.offsetHeight;

   // Определяем ширину и высоту изображения кнопки в диве галереи
   let ifiCard=document.getElementById('i'+uid);
   let widthiCard=ifiCard.offsetWidth;
   let heightiCard=ifiCard.offsetHeight;
   
   cAlert=cAlert+'uid='+uid+'   TranslitPic='+TranslitPic+"\n";
   cAlert=cAlert+'widthGallery='+widthGallery+"\n";
   cAlert=cAlert+'widthCard='+widthCard+'   heightCard='+heightCard+"\n";
   cAlert=cAlert+'widthbCard='+widthbCard+'   heightbCard='+heightbCard+"\n";
   cAlert=cAlert+'widthiCard='+widthiCard+'   heightiCard='+heightiCard+"\n";
   alert(cAlert);
}
// ****************************************************************************
// *                     Отправить аякс-запрос на изображение                 *
// *                      и показать полученное изображение                   *
// ****************************************************************************
function getImgBase64(iUid,iTranslitPic,Comment)
{
   uid=iUid;
   TranslitPic=iTranslitPic;
   //isSrc='Images/sampo.jpg'
   // Задаем константу диагностирования ошибке в ответе на запрос
   Err="Произошла ошибка";
   // Выполняем запрос на удаление выбранного изображения c данными 
   $.ajax({
      url: "getImgBase64.php",
      type: 'POST',
      data: {uid:iUid,translitpic:iTranslitPic,pathTools:pathPhpTools,pathPrown:pathPhpPrown,sh:SiteHost},
      // Выводим ошибки при выполнении запроса в PHP-сценарии
      error: function (jqXHR,exception) 
      {
         aif=Err;
         messi=SmarttodoError(jqXHR,exception);       
         DialogWindMessage(Err,messi,' ');
      },
      // Обрабатываем ответное сообщение
      success: function(message)
      {
         // Вырезаем из запроса чистое сообщение
         let messai=FreshLabel(message);
         // Получаем параметры ответа
         parm=JSON.parse(messai);
         // Трассируем переданное изображение в формате Base64
         // console.log(parm.NameArt);
         // Выбираем изображение в формате base64
         isSrc=getSrc(parm.NameArt);
         // Инициируем диалоговое окно
         iniImageClick(iUid,iTranslitPic,parm.Piati,isSrc,parm.wimg,parm.himg);
         $('#ImgDialogWind').dialog("open");  
      }
   });
}
// ****************************************************************************
// *             Взять изображение в формате Base64 или подставить            *
// *                       при отладке заглушку "kwinflatic"                  *
// ****************************************************************************
function getSrc(imgi)
{
   isdebug=false;
   if (isdebug) isSrc=
   "data:image/jpeg;base64,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"
   ;
   else isSrc=imgi;
   return isSrc;
}

// *********************************************************** ViewImage.js *** 
