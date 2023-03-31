// PHP7/HTML5, EDGE/CHROME                               *** CommonTools.js ***

// ****************************************************************************
// * TPhpTools                               Блок общих функций на JavaScript *
// *                                                                          *
// * v1.0, 29.01.2023                               Автор:      Труфанов В.Е. *
// * Copyright © 2023 tve                           Дата создания: 09.01.2023 *
// ****************************************************************************

/**
 * -------Программный модуль CommonPrown содержит в себе небольшие функции, которые
 * могут быть использованы при написании сайта на PHP или в backend-разработке 
 * проекта.
 *
 * -------Функции Alert и ConsoleLog выводят сообщения на странице в браузере. Alert 
 * выводит сообщение на экран и приостанавливает работу сайта. ConsoleLog может 
 * быть использована при динамической отладке сервера сайта. Она выводит 
 * сообщение в консоли браузера, не останавливая вывод на странице.
 *
**/

// ****************************************************************************
// *                  Обработать ошибку выполнения аякс-запроса               *
// ****************************************************************************
function SmarttodoError(jqXHR,exception) 
{
   if (jqXHR.status === 0) 
   {
      messi='Ошибка/нет соединения.';
   } 
   else if (jqXHR.status == 404) 
   {
      messi='Требуемая страница не найдена (404).';
   } 
   else if (jqXHR.status == 500) 
   {
      messi='Внутренняя ошибка сервера (500).';
   } 
   else if (exception === 'parsererror') 
   {
      messi='Cинтаксический анализ JSON не выполнен.';
   } 
   else if (exception === 'timeout')          
   {
      messi='Ошибка (time out) времени ожидания ответа.';
   } 
   else if (exception === 'abort') 
   {
      messi='Ajax-запрос прерван.';
   } 
   else 
   {
      messi='Неперехваченная ошибка: '+jqXHR.responseText;
   }
   return messi;
}
// ****************************************************************************
// *                   Выделить метку (наборы символов до и после) в принятом *
// *                                           сообщения и извлечь сообщение. *
// * так как в АЯКС-запросах на jQuery, когда от сервера                      *
// * передается сообщение в js, то (фактически - 19.01.2023)                  *
// * перед сообщением подвешивается сам js-скрипт запроса.                    *   
// ****************************************************************************
NoFresh='NoFresh';
function FreshLabel(messa)
{
   //console.log('message0='+messa);
   //alert('message0='+messa);
   result=NoFresh;
   str=messa;
   target='ghjun5'; // цель поиска
   pos=0; nBeg=0; nEnd=0;
   while (true) 
   {
      foundPos=str.indexOf(target,pos);
      if (foundPos<0) break;
      // Меняем начальную и конечную позиции подстроки
      nBeg=nEnd+6; nEnd=foundPos;
      result=str.substring(nBeg,nEnd); 
      // Продолжаем со следующей позиции
      pos=foundPos+1; 
   };
   // Здесь, в случае, если метки нет, то возвращается NoFresh
   return result;
}
// ****************************************************************************
// *    Подправить строку таким образом, чтобы можно было ее вложить в JSON   *
// *    (в строке может быть сообщение об ошибке от PHP, вот на этот случай   *
// *                     обработка и ориентирована)                           *           
// ****************************************************************************
function eraseTags(s)
{
   // Вырезаем теги
   a=s.replace(/<[^>]+>/gi,''); 
   // Вырезаем особый <br>
   b=a.replace(/<br \/>/gi,'');
   // Вырезаем двойные кавычки
   c=b.replace(/\"/g,'');
   // Вырезаем переходы на новую строку
   d=c.replace(/\n/g,'');
   // Заменяем обратные слэши на прямые
   e=d.replace(/\\/g,'/');
   // Так как в одном сообщении может быть указано несколько ошибок,
   // то отделяем их звездочками
   f=e.replace(/Warning:/g,'  *** Warning:');
   g=f.replace(/Fatal error:/g,'  *** Fatal error:');
   return g;
}
// ****************************************************************************
// * Проверить были ли выделены метки в сообщении. Если выделены, то          *            
// * считать, что принято специальная строка по формату JSON типа:            *
// * '{"NameGru":"'+messa+'", "Piati":0, "iif":"nodef"}'. Где                 *  
// *                                     iif=Err, если сообщение об ошибке;   *  
// *                                     iif=imok - информационное сообщение. *
// * Если меток не было найдено, то сформировать сообщение об ошибке и        *
// * отправить дальше.                                                        *
// ****************************************************************************
function FreshJSON(messa)
{
   message=FreshLabel(messa);
   if (message==NoFresh) message='{"NameGru":"'+eraseTags(messa)+'", "Piati":0, "iif":"'+Err+'"}'; 
   console.log('message='+message);
   alert('message='+message);
   return message;
}
// ****************************************************************************
// *            Добавить метку (наборы символов до и после) для отправляемого *
// *                                 сообщения. В частности это используется: *
// *  а) в АЯКС-запросах на jQuery, когда от сервера передается сообщение в   *
// *  js, то (фактически - 19.01.2023) перед сообщением подвешивается сам     *
// *  js-скрипт запроса.                                                      *
// ****************************************************************************
function makeLabel(subs,Before='~~~',After='~~~')
{
   Result=Before+subs+After;
   return Result;
}

// ********************************************************* CommonTools.js *** 
