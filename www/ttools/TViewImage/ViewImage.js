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

   // Извлекаем размеры тела страницы (окна диалога)
   ifBody=document.body;
   var diaWidth=ifBody.offsetWidth;   
   var diaHeight=ifBody.offsetHeight;
   
   // Формируем заголовок окна
   var diaTitle=Comment+' ['+diaWidth+'x'+diaHeight+']';

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
   });
   // Позиционируем изображение 'Внутри страницы'
   if (ModeImg==vimOnPage) 
   {
      View_vimOnPage(diaWidth,diaHeight,wimg,himg);
   }
   // Позиционируем изображение 'В заданном размере в пикселах - как есть'
   else 
   {
      View_vimExiSize(diaWidth,diaHeight,wimg,himg);
   }
 }
// ****************************************************************************
// *  Позиционировать изображение 'В заданном размере в пикселах - как есть'  *
// ****************************************************************************
function View_vimExiSize(wWin,hWin,wImg,hImg)
{
   /*
   // Все варианты процентных размеров изображения
   // по отношению к диалоговому окну
   wpimg=50;  hpimg=50;
   wpimg=100; hpimg=100;
   wpimg=150; hpimg=150;
   wpimg=150; hpimg=100;
   wpimg=100; hpimg=150;
   wpimg=50;  hpimg=150;
   wpimg=150; hpimg=50;
   */

   // Определяем процент по ширине    100%  ->  wWin
   //                                   x%  ->  wImg
   if (wWin>0) wpimg=Math.floor(100*wImg/wWin);
      
   // Определяем процент по высоте    100%  ->  hWin
   //                                   x%  ->  hImg
   if (hWin>0) hpimg=Math.floor(100*hImg/hWin);

   //console.log('wpimg='+wpimg+'%  hpimg='+hpimg+'%');
 
   // Вкладываем изображение в диалоговое окно
   let cwpimg=String(wpimg)+'%';
   let chpimg=String(hpimg)+'%';
   let messa='<img id="ImgDialog" src="'+isSrc+'" '+
      'width="'+cwpimg+'" height="'+chpimg+
      '" alt="tutorialsPoint">';
   $('#ImgDialogWind').html(messa);

   // Определяем смещение по ширине
   xOffset=Math.floor((wWin-wImg)/2);
   if (xOffset<0) xOffset=0;
   // Определяем смещение по высоте (чуть выше на 10%)
   yOffset=Math.floor((hWin-hImg)/2*0.9);
   if (yOffset<0) yOffset=0;

   //console.log('xOffset='+xOffset+'%  yOffset='+yOffset+'%');

   // Получаем координаты  top и left
   let top_vimOnPage  = $('#ImgDialog').offset().top;
   let left_vimOnPage = $('#ImgDialog').offset().left;
   // Выполняем смещение позиции элемента
   $('#ImgDialog').offset({top:top_vimOnPage+yOffset, left:left_vimOnPage+xOffset});
}
// ****************************************************************************
// *                 Позиционировать изображение 'Внутри страницы'            *
// ****************************************************************************
function View_vimOnPage(wWin,hWin,wImg,hImg)
{
   // Если изображение уже внутри дива, то оставляем как есть
   if (wImg <= wWin && hImg <= hWin) 
   {
      //console.log('Внутри страницы: '+wImg+'<='+wWin+'  '+hImg+'<='+hWin);
      View_vimExiSize(wWin,hWin,wImg,hImg);
   }
   // Выравниваем по границам диалогового окна
   else
   {
      // Определяем коэффициент приведения по ширине
      let k1=wWin/wImg;
      // Приводим высоту и ширину изображения к диву
      let pwImg=Math.floor(k1*wImg);
      let phImg=Math.floor(k1*hImg);
      // Если новая высота изображения меньше высоты дива,
      // то фиксируем
      if (phImg<=hWin)
      {
         //console.log('Приведено по ширине: '+pwImg+'='+wWin+'  '+phImg+'<='+hWin);
         View_vimExiSize(wWin,hWin,pwImg,phImg);
      }
      // Иначе приводим дополнительно по высоте
      else
      {
         let k2=hWin/phImg;
         let p2wImg=Math.floor(k2*pwImg);
         let p2hImg=Math.floor(k2*phImg);
         //console.log('Приведено и по высоте: '+p2wImg+'='+wWin+'  '+p2hImg+'<='+hWin);
         View_vimExiSize(wWin,hWin,p2wImg,p2hImg);
      }
   }
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
