<?php
// PHP7/HTML5, EDGE/CHROME                                 *** DefineJs.php ***

// ****************************************************************************
// * ittve.me  Вспомогательная страница, для установки сессионной переменной, *
// *                               показывающей возможность работы JavaScript *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  17.07.2020
// Copyright © 2020 tve                              Посл.изменение: 18.07.2020

session_start(); 
$_SESSION['js'] = 'yes'; 

// *********************************************************** DefineJs.php ***
