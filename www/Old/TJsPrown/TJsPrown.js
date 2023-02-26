// JS/HTML5                                                 *** TJsPrown.js ***
// ****************************************************************************
// * TJsPrown                        Библиотека JavaScript-прикладных функций *
// *                                                                          *
// * v1.2, 13.01.2020                              Автор:       Труфанов В.Е. *
// * Copyright © 2019 tve                          Дата создания:  02.04.2019 *
// ****************************************************************************

//    Библиотека JavaScript-прикладных функций содержит набор небольших программных
// модулей, которые часто используются при программировании сайтов. 
//    Основное назначение функций библиотеки разгрузить серверы и перенести 
// работу по взаимодействию пользователей с содержимым сайтов на их компьютеры.
//    Часть функций библиотеки помогают сайтам настроиться на браузеры 
// пользователей и сделать более удобным их взаимодействие.
//
// Справочник библиотеки TJsPrown:
//
// Консоль браузера -
// Контейнер LocalStorage -
// Обработка события по завершению загрузки страницы - 

// Шаблон описания функций

// Функция выполняет конкретную и часто возникающую задачу - выбрать из строки
// подстроку по заданному регулярному выражению и узнать её начальную позицию 
// в этой строке. 
// Findes возвращает первое или единственное вхождение подстроки в исходной 
// строке, а в случае неудачи возвращает пустую строку.
// Через третий параметр функция по ссылке возвращает позицию найденного 
// фрагмента, начиная с нулевого значения, или -1, если фрагмент не найден.
 
// Синтаксис:                                     
//
//   $Result=Findes($preg,$string,&$point);

// Параметры:
//
//   $preg   - текст регулярного выражения;
//   $string - текст, который должен быть обработан регулярным выражением;
//   $point  - позиция начала найденного фрагмента после работы 
//      регулярного выражения (параметр по ссылке). $point=-1, если фрагмент 
//   не найден;  

// Возвращаемое значение: 
// 
//   $Result  - найденный фрагмент после работы регулярного выражения или
//      пустая строка, если фрагмент не был найден

// ****************************************************************************
// *        Добавить обработку события по завершению загрузки страницы        *
// ****************************************************************************
function addLoadEvent(func) 
{
   var oldonload=window.onload;
   if (typeof window.onload != 'function') 
   {
      window.onload = func;
   } 
   else
   {
      window.onload = function() 
      {
         if (oldonload) 
         {
            oldonload();
         }
         func();
      }
   }
}
// ****************************************************************************
// *    Показать в консоли браузера все элементы, находящиеся в контейнере    *
// *                      localStorage и их значения                          *
// ****************************************************************************
function ViewLocalStorage()
{
   var str="";
   for (var i=0; i<localStorage.length; i++)
   {
      str=
         "Ключ: "+localStorage.key(i)+"; "+
         "Значение: "+localStorage.getItem(localStorage.key(i));
      console.log(str);
   }
   console.log('--- localStorage ---');
}

// 3
// https://learn.javascript.ru/cookie
// Значения name и value являются обязательными, а остальные не обязательны.  
// 17.07.2020 в JS работает, но в массив $_COOKIE для PHP не попадает (ясно!)

function setcookie(name,value,Duration) 
{
   // Определяем параметры кукиса по умолчанию
   options=
   {
      'path':'/',
      'max-age':44236800, // 512д*24ч*60м*60с=44236800с - последняя дата
      'expires':512,      // 512д - число дней использования (вместо max-age)
      //'secure':true,
      'samesite':'strict' // использовать кукисы только своего сайта
   };
   // Выщитываем, когда задан expires, последнюю дату кукиса 
   if (Duration)
   {
      options['expires']=Duration;
      options['max-age']=Duration*24*60*60;
   }
   var last_date=new Date();
   last_date.setDate(last_date.getDate()+options['expires']);
   //
   let updatedCookie=encodeURIComponent(name)+"="+encodeURIComponent(value);
   for (let optionKey in options) 
   {
      //console.log("optionKey="+optionKey);
      updatedCookie+="; "+optionKey;
      var optionValue=options[optionKey];
      // Преобразовываем expires 
      if (optionKey=='expires')
      {
         optionValue=last_date.toUTCString();
      } 
      // Преобразовываем все параметры, кроме secure
      if (optionValue!==true) 
      {
         updatedCookie+="="+optionValue;
      }
      //console.log("optionValue="+optionValue);
   }
   
   document.cookie=updatedCookie;
   console.log("document.cookie="+updatedCookie);
}


// Для получения значения кукисов в JavaScript, можно воспользоваться 
// document.cookie. Обычно, document.cookie имеет строку следующего формата:
// foo=bar;this=that;somename=somevalue;.....
// Эта строка содержит пары имя=значение, разделённые точкой с запятой.
// Функция getCookie() позволяет осуществить разбор параметров этой строки
function getCookie(name) 
{
	var cookie = " " + document.cookie;
	var search = " " + name + "=";
	var setStr = null;
	var offset = 0;
	var end = 0;
	if (cookie.length > 0) 
   {
		offset = cookie.indexOf(search);
		if (offset != -1) 
      {
			offset += search.length;
			end = cookie.indexOf(";", offset)
			if (end == -1) 
         {
				end = cookie.length;
			}
			setStr = unescape(cookie.substring(offset, end));
		}
	}
	return(setStr);
}


//https://html5css.ru/js/js_cookies.php
function get_Cookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function trass_Cookie(cname) 
{
   var trass='';
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) 
    {
        var c = ca[i];
        while (c.charAt(0) == ' ') 
        {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) 
        {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}


// ****************************************************************************
// *                               Удалить кукис                              *
// ****************************************************************************
function DeleteCookie(name)
{
   var date = new Date(0);
   document.cookie = name+"=; path=/; expires=" + date.toUTCString();
}
/*
function delete_cookie ( cookie_name )
{
  var cookie_date = new Date ( );  // Текущая дата и время
  cookie_date.setTime ( cookie_date.getTime() - 1 );
  document.cookie = cookie_name += "=; expires=" + cookie_date.toGMTString();
}
*/
// ****************************************************************************
// *              Определить, включены ли у пользователя cookie               *
// ****************************************************************************
function IsCookieEnabled()
{
   // Проверяем существование свойства navigator.cookieEnabled
   if(typeof(navigator.cookieEnabled)!="undefined")
      return navigator.cookieEnabled;
   else
   {
      // Если свойство navigator.cookieEnabled не поддерживается, то просто 
      // попробуем установить и получить назад тестовый cookie
		var tmpCookie = "testCookieForCheck";
		SetCookie(tmpCookie, "1");
		if (GetCookie(tmpCookie) != null)
  		{
         DeleteCookie(tmpCookie);
  			return true;
  		}
      return false;
  	}
   // https://learn.javascript.ru/cookie
   // Иногда посетители отключают cookie. Отловить это можно проверкой
   // свойства navigator.cookieEnabled
   // if (!navigator.cookieEnabled) 
   // {
   //    alert('Включите cookie для комфортной работы с этим сайтом');
   // }
}
function MakeCatchyQuotes()
{
   var Result=0;
   $(document).ready(function() 
   {
      $('span.pq').each(function() 
      {
         var quote=$(this).clone();
         quote.removeClass('pq');
         quote.addClass('pullquote');
         $(this).before(quote);
      }); // конец each
   }); // конец ready
   return Result;
}
function getTime(secs) {
	var sep = ':'; //separator character
	var hours,minutes,seconds,time,am_pm;
	var now = new Date();
	hours = now.getHours();
	if (hours < 12) {
		am_pm = 'am';
	} else {
		am_pm = 'pm';
	}
	hours = hours % 12;
	if (hours === 0) {
		hours = 12;
	} 
	time = hours;
	minutes = now.getMinutes();
	if (minutes < 10) {
		minutes = '0' + minutes;
	}
	time += sep + minutes;
	if (secs) {
		seconds = now.getSeconds();
		if (seconds < 10) {
			seconds = '0' + seconds;
		}
		time += sep + seconds;
	} 
	return time + ' ' + am_pm;
}
        
  function TurnOnHotkeys(){
  
      document.onkeydown = function(e) {

      // Ctrl+I  Показать установленные настройки сайта
      if (e.ctrlKey && e.keyCode == 'I'.charCodeAt(0)) 
      {
        document.location.replace("index.php?Com=Sett");
        return false;
      }

      // Ctrl+K  Показать кукисы
      else if (e.ctrlKey && e.keyCode == 'K'.charCodeAt(0)) 
      {
        document.location.replace("index.php?Com=Cook");
        return false;
      }
      
      // Ctrl+P  Распечатать страницу (функцию предоставляет браузер)
 
      // Ctrl+Q  Показать параметры запроса к сайту
      else if (e.ctrlKey && e.keyCode == 'Q'.charCodeAt(0)) 
      {
        document.location.replace("index.php?Com=Parm");
        return false;
      }

      // Ctrl+R  Перегрузить сайт без параметров
      else if (e.ctrlKey && e.keyCode == 'R'.charCodeAt(0)) 
      {
        document.location.replace("index.php?Com=Remv");
        return false;
      }

      // Ctrl+S  Сохранить страницу сайта (функцию предоставляет браузер Chrome‎)

      // Ctrl+Z  Передать значение переменной в PHP
      else if (e.ctrlKey && e.keyCode == 'Z'.charCodeAt(0)) 
      {
        var idi = 1352;
        document.location.replace("index.php?idi="+idi);
        return false;
      }
      
    }
  }

