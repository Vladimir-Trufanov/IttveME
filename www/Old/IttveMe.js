
// Создать DIV для проверки включенности JavaScript
function MakeDiv()
{
   var $el = document.createElement('div');
   $el.id='prob';
   $el.style.display = 'none';
   /*
   $el.innerHTML = 'name';
   $el.style.width = '10cm';
   $el.style.height = '1cm';
   $el.style.backgroundColor = '#ff00ff'; // показали выстроенный DIV
   $el.style.bottom = 0;
   */
   document.body.appendChild($el);
}
// Проверить через DIV включенность JavaScript
function isDiv()
{
   var element=document.getElementById('prob');
   if (!element)
   {
      console.log('Меня нет на странице');
   } 
   else 
   {
      console.log('Я присутствую');
   }
}
// Обрабатываем нажатия на кнопки (HTML5-JS)             
function clickLifeMenu() 
{
   console.log('Кнопа LifeMenu');
}

$(document).ready(function() 
{
   $('[title]').tooltip();
});




function paTiny() 
{
   //window.location.assign("/TinyMCE/Tiny.php");
}

function paNastr() 
{
   window.location.assign("/Nastr.php");
}


// Обрабатываем клики на кнопках 
document.addEventListener("click",clickHandler,false);
function clickHandler(event)
{
   console.log(event.target.id);
   if  (event.target.id=='hochesh')
   {
      /* 
      // первый вариант
      $('#Gallery').css('display','none');
      $('#News').css('display','none');
      $('#Life').css('display','none');

      $('#imgFull').css('display','block');
      */
      var elem = document.getElementById("News");
      
      elem.innerHTML = '<div> <img class="imgCard2" id="Rocary2" '+
                       'src="ittveNews/ittve01-001-На-Сампо.jpg" '+ 
                       'alt="На горе Сампо"> </div>';
      
   }
   else if  (event.target.id=='imgFull')
   {
      /*
      // первый вариант
      $('#Gallery').css('display','block');
      $('#News').css('display','block');
      $('#Life').css('display','block');

      $('#imgFull').css('display','none');
      */
  
   }
   // Если нажата кнопка 'tve'
   else if ((event.target.id=='btnLifeMenu')||(event.target.id=='imgLifeMenu'))
   {
      // Обрабатывается через HTML5
      // clickLifeMenu(); 
   }


  /*
*/
  
  
  
  
   /*
   if ((event.target.id=='bCtrl')|(event.target.id=='iCtrl'))
   {
      $('#bCtrl').css('display','none');
      $('#ListInfo').css('display','none');
      $('#bUndo').css('display','block');
      $('#ListInfoCtrl').css('display','block');
   }
   if ((event.target.id=='bUndo')|(event.target.id=='iUndo'))
   {
      $('#bUndo').css('display','none');
      $('#ListInfoCtrl').css('display','none');
      $('#bCtrl').css('display','block');
      $('#ListInfo').css('display','block');
   }
   */
}

/*
$(document).ready(function()
{
$('img').each(function(){
$(this).error(function(){ $(this).attr('src', 'noimg.png'); });
});
});
*/

$('#imgFull').on('error', function () 
{
  console.log('imgFull on error');
  //$(this).attr('src', 'path_to_default_image.png');
});