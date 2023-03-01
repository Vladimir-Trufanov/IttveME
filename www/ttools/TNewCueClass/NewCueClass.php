<?php namespace ttools; 

// PHP7/HTML5, EDGE/CHROME                              *** NewCueClass.php ***

// ****************************************************************************
// * ittve.me                                Добавить новый раздел материалов * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  26.02.2023
// Copyright © 2023 tve                              Посл.изменение: 26.02.2023

class NewCue
{
   // ----------------------------------------------------- СВОЙСТВА КЛАССА ---
   protected $urlHome;          // Начальная страница сайта 
   
   // *************************************************************************
   // *         Проинициализировать свойства классов по настройкам сайта,     *
   // *            запустить изменение свойств для обновления настроек        *
   // *************************************************************************
   public function __construct() 
   {
   echo '
   <!-- Утки -->
   <div id="duckbody">
      <input type="checkbox" id="duck1">
      <label for="duck1" class="duck"></label>
      <input type="checkbox" id="duck2">
      <label for="duck2" class="duck"></label>
      <input type="checkbox" id="duck3">
      <label for="duck3" class="duck"></label>
      <input type="checkbox" id="duck4">
      <label for="duck4" class="duck"></label>
      <input type="checkbox" id="duck5">
      <label for="duck5" class="duck"></label>

      <div class="score"></div>
   </div>
   ';
   }
   public function __destruct() 
   {
   }
}
// ******************************************************** NewCueClass.php ***
