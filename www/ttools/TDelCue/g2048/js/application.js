// Wait till the browser is ready to render the game (avoids glitches)
window.requestAnimationFrame(function () 
{
  // Добавлено tve 2023.04.10
  var MaxTile=2048;
  // От того, как было
  // new GameManager(4, KeyboardInputManager, HTMLActuator, LocalStorageManager);
  new GameManager(4,KeyboardInputManager,HTMLActuator,LocalStorageManager,MaxTile);
});
