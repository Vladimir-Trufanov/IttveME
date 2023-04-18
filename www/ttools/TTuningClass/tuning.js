/* ===== Выполнить действия для создания полей выбора и работы с ними ===== */
$('.sel').each(function() 
{
   $(this).children('select').css('display', 'none');
   var $current = $(this);
   $(this).find('option').each(function(i) 
   {
      if (i == 0) 
      {
         $current.prepend($('<div>',{
            class: $current.attr('class').replace(/sel/g, 'sel__box')
         }));
      
         var placeholder = $(this).text();
         $current.prepend($('<span>', {
            class: $current.attr('class').replace(/sel/g, 'sel__placeholder'),
            text: placeholder,
            'data-placeholder': placeholder
         }));
         return;
      }
    
      $current.children('div').append($('<span>', {
         class: $current.attr('class').replace(/sel/g, 'sel__box__options'),
         text: $(this).text()
      }));
   });
});

// Переключить состояние в '.active' из '.sel'
$('.sel').click(function() 
{
   $(this).toggleClass('active');
});

// Переключить состояния '.selected' в опциональные
$('.sel__box__options').click(function() 
{
   getScreenInfo();

   var txt = $(this).text();
   var index = $(this).index();
  
   $(this).siblings('.sel__box__options').removeClass('selected');
   $(this).addClass('selected');
  
   var $currentSel = $(this).closest('.sel');
   $currentSel.children('.sel__placeholder').text(txt);
   $currentSel.children('select').prop('selectedIndex', index + 1);
});


function getScreenInfo(setconsole=true)
{
// http://qaru.site/questions/83058/getting-the-physical-screen-dimensions-dpi-pixel-density-in-chrome-on-android
var aScreenInfo=[];    // массив данных об окне браузера

// Определяем ширину и высоту экрана в пикселях
// https://www.w3schools.com/js/js_window_screen.asp
var we=window.screen.width;   aScreenInfo.push(we);                      // 0
var he=window.screen.height;  aScreenInfo.push(he);                      // 1
// Определяем доступные ширину и высоту экрана посетителя в пикселях
// (ширина экрана посетителя минус интерфейс функции, такой как панель задач 
// Windows и высота экрана минус интерфейс функции, такие как панель задач 
var wea=window.screen.availWidth;   aScreenInfo.push(wea);               // 2
var hea=window.screen.availHeight;  aScreenInfo.push(hea);               // 3
// Определяем ширину и высоту окна браузера  (не включая панели инструментов ---и 
// полосы прокрутки---) в пикселях https://www.w3schools.com/js/js_window.asp
var wb = window.innerWidth||document.documentElement.clientWidth;
aScreenInfo.push(wb);                                                    // 4
var hb = window.innerHeight||document.documentElement.clientHeight;
aScreenInfo.push(hb);                                                    // 5
// Определяем ширину и высоту клиентской части сайта в окне браузера 
var wcl=document.body.clientWidth;  aScreenInfo.push(wcl);               // 6
var hcl=document.body.clientHeight; aScreenInfo.push(hcl);               // 7
// Определяем номинальные толщины вертикальной и горизонтально полос прокрутки 
var ScrollWidth = wb - wcl;  aScreenInfo.push(ScrollWidth);              // 8
var ScrollHeight = hb - hcl; aScreenInfo.push(ScrollHeight);             // 9
// Определяем соотношение пикселей устройства
var DevicePixelRatio=window.devicePixelRatio||1;                         // 10
aScreenInfo.push(DevicePixelRatio);
// Формируем текстовую строку для консоли
var str = 
[
   'Screen width:  '+we+'px',
   'Screen height: '+he+'px',
   'Screen available width: '+wea+'px',
   'Screen available height: '+hea+'px',
   'Browser width: '+wb+'px',
   'Browser height: '+hb+'px',
   'Client width: '+wcl+'px',   
   'Client height: '+hcl+'px',
   'ScrollWidth: '+ScrollWidth+'px',
   'ScrollHeight: '+ScrollHeight+'px',
   'Device Pixel Ratio: '+DevicePixelRatio
].join('\n');

if (setconsole) console.log(str);
return aScreenInfo;
}

// Обрабатываем клики на тапках
var itap; var lview=false;
document.addEventListener("click",clickHandler,false);
function clickHandler(event)
{
   if (event.target.id=='tole')
   {
      itap=0;
      if (lview) console.log('tole'+itap);
      //if (lview) alert('tole'+itap);
   }
   else if (event.target.id=='tori')
   {
      itap=itap+1;
      if (lview) console.log('tori'+itap);
      //if (lview) alert('tori'+itap);
   }
   else if (event.target.id=='bori')
   {
      itap=itap+2;
      if (lview) console.log('bori'+itap);
      //if (lview) alert('bori'+itap);
   }
   else if (event.target.id=='bole')
   {
      itap=itap+4;
      if (lview) console.log('bole'+itap);
      //if (lview) alert('bole'+itap);
   }
   if (itap==7) 
   {
      if (lview) console.log('all='+itap);
      $('#inpTaping').css('display','block');
   }
   if (itap==15) 
   {
      $('#tole').css('background-color','#87CEFA');
      $('#tori').css('background-color','#87CEFA');
      $('#bori').css('background-color','#87CEFA');
      $('#bole').css('background-color','#87CEFA');
   }
}

