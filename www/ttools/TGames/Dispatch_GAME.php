<?php namespace ttools; 
                                         
// PHP7/HTML5, EDGE/CHROME                            *** Dispatch_GAME.php ***

// ****************************************************************************
// * TGames                                            Диспетчер загрузки игр *
// *                                                                          *
// * v1.0, 20.09.2023                              Автор:       Труфанов В.Е. *
// * Copyright © 2023 tve                          Дата создания:  20.09.2023 *
// ****************************************************************************

function DispathGame($Arti)
{
   $game=NULL;
   if ($Arti->getArti=='vybrat-parnye-karty')
   {
      require_once "PairedCards/PairedCardsClass.php";
      $Paired=new \game\PairedCards($Arti); 
      $game=$Paired;
   }
   return $game;
}

// ****************************************************** Dispatch_GAME.php ***
