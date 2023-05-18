// JS/PHP7/HTML5/CSS3                                      *** ViewImage.js ***

// ****************************************************************************
// * TViewImage        Модули отдельного детального представления изображений *
// *                                                                          *
// * v2.0, 07.05.2023                               Автор:      Труфанов В.Е. *
// * Copyright © 2023 tve                           Дата создания: 09.01.2023 *
// ****************************************************************************

// ****************************************************************************
// *     Инициировать окно отдельного детального представления изображений    *
// *                      по завершении загрузки страницы                     *
// ****************************************************************************
$(document).ready(function()
{

   /*
   // Создаем див для диалогового окна, в котором будет разворачиваться 
   // изображение для детального рассмотрения
   let imgdiv=document.createElement('div');
   imgdiv.innerHTML="<p>Привет, мир!</p>";
   imgdiv.id="ImgDialogWind";
   document.body.append(imgdiv);

   // Строим диалоговое окно
   let isHide=true;
   let delayClose=250;
   let durClose=1000;
   let diaWidth=1000;
   let diaHeight=600; 
   
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
      draggable:true, 
      show:{effect:"fade",delay:100,duration:1500},
      hide:{effect:"explode",delay:delayClose,duration:durClose,easing:'swing'},
      title:"Привет, мир!",
   });
   
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
})

function iniImageClick(iUid,iTranslitPic,Comment)
{
   

   // Создаем див для диалогового окна, в котором будет разворачиваться 
   // изображение для детального рассмотрения
   // 08.05.2023 див уже включен в разметку
   // let imgdiv=document.createElement('div');
   // imgdiv.id="ImgDialogWind";
   // document.body.append(imgdiv);

   // Извлекаем размеры тела страницы
   ifBody=document.body;
   let widthBody=ifBody.offsetWidth;
   let heightBody=ifBody.offsetHeight;
   // Назначаем размеры окна диалога
   let diaWidth=widthBody;
   let diaHeight=heightBody; 
   // Формируем заголовок окна
   let diaTitle=Comment+' ['+widthBody+'x'+heightBody+']';

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
         iniImageClick(iUid,iTranslitPic,parm.Piati);
         // Выводим изображение в диалоговом окне jQuery
         let messa='<img src="'+isSrc+'" alt="tutorialsPoint">';
         $('#ImgDialogWind').html(messa);
         $('#ImgDialogWind').dialog("open");  
      }
   });
}
// ****************************************************************************
// *             Вывести диалоговое окно с сообщением (или с ошибкой)         *
// ****************************************************************************
function DialogImgMessage(aif,messi)
{
   /*
   isSrc=Err;
   // Если передана ошибка, выводим сообщение
   if (aif==Err)
   {
      //Error_Info(messi);
      alert(messi);
   } 
   // Выбираем изображение
   else 
   {
      isSrc=getSrc(messi)
   }
   return isSrc;
   */
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
