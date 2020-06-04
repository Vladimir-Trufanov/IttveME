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
      $('.Gallery').css('display','none');
      $('.News').css('display','none');
      $('.Life').css('display','none');

      $('#Rocary').css('display','block');
  
  }
  else if  (event.target.id=='Rocary')
  {
      $('.Gallery').css('display','block');
      $('.News').css('display','block');
      $('.Life').css('display','block');

      $('#Rocary').css('display','none');
  
  
  }
  
  
  
  
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

