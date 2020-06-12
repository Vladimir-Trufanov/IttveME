function paTiny() 
{
   window.location.assign("/TinyMCE/Tiny.php");
}


// Обрабатываем клики на кнопках 'настройка' и 'назад'
document.addEventListener("click",clickHandler,false);
function clickHandler(event)
{
  console.log(event.target.id);
  if  (event.target.id=='hochesh')
  {
      /* 
      // первый вариант
      $('.Gallery').css('display','none');
      $('.News').css('display','none');
      $('.Life').css('display','none');

      $('#Rocary').css('display','block');
      */
      var elem = document.getElementById("Rocary1");
      
      elem.innerHTML = '<div> <img class="imgCard2" id="Rocary2" '+
                       'src="Art/ittve1-1-На-Сампо.jpg" '+ 
                       'alt="На горе Сампо"> </div>';
      
  }
  else if  (event.target.id=='Rocary')
  {
      /*
      // первый вариант
      $('.Gallery').css('display','block');
      $('.News').css('display','block');
      $('.Life').css('display','block');

      $('#Rocary').css('display','none');
      */
  
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

$('#Rocary').on('error', function () 
{
  console.log('Rocary on error');
  //$(this).attr('src', 'path_to_default_image.png');
});
