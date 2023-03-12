/* на русском */

$(document).ready(function() 
{
   window.addEventListener('resize',doOnResize);
});

function doOnResize() 
{
    window.location=SignaUrl;
}

/*
// 1 часть: игра с курсором-змеёй
*/
function СursorSnake()
{
   var step=0;
   var SnakeContext;     // контекст холста для рисования змейки
   var ColorCanvas;      // цвет холста ('CadetBlue'='#5F9EA0'=[95,158,160]) 

   // Готовим холст для рисования змейки
   let SnakeCanvas=document.createElement('canvas');
   SnakeCanvas.width = window.innerWidth;
   SnakeCanvas.height = window.innerHeight;
   document.getElementsByTagName('body')[0].appendChild(SnakeCanvas);
   SnakeContext=SnakeCanvas.getContext('2d');
   ColorCanvas=[95,158,160]; 

   // Готовим координаты холста
   let o=document.getElementById('Life');
   let oi=o.getBoundingClientRect();
   let heightLife=oi.height;
   
   o=document.getElementById('tLife');
   oi=o.getBoundingClientRect();
   let heighttLife=oi.height;
   
   o=document.getElementById('WorkTiny');
   oi=o.getBoundingClientRect();
   var leftCanvas=oi.left;
   var topCanvas=oi.top;
   var widthCanvas=oi.width;
   var heightCanvas=(heightLife-heighttLife)*.98;

   var mouse=new Mouse(leftCanvas,topCanvas,widthCanvas,heightCanvas);
   //document.onmousemove = function(e){ mouse.x = e.pageX; mouse.y = e.pageY};
   //document.onmousemove =  MovingMouse(e);
   document.onmousemove = function(e){MovingMouse(e,mouse);};


   var flwr,flwrPrev,train=[],i,n=50;
   for (i = 0; i < n; i++) 
   {
      flwr = new Flwr(mouse);
      flwr.n = i;
      if (flwrPrev) 
      {
         flwr.b = flwrPrev.b + (0.1/n)
         flwr.follow = flwrPrev
         flwrPrev.child = flwr
      } 
      else 
      {
         flwr.follow = mouse
      }
      flwrPrev = flwr
      train.push(flwr)
   }
    
   console.log('Начало!');
   animate(SnakeContext,ColorCanvas,train,mouse,n,step,leftCanvas,topCanvas,widthCanvas,heightCanvas);
}


// функции

function MovingMouse(e,mouse)
{
   px=e.pageX;
   if (px>300) px=290;
   mouse.x = px; 
   mouse.y = e.pageY
}

// mouse coordinates
function Mouse (leftCanvas,topCanvas,widthCanvas,heightCanvas) 
{
   this.x = leftCanvas+(widthCanvas/2);
   this.y = topCanvas+(heightCanvas/2);
}


function Flwr (mouse) 
{
  this.follow = null
  this.child = null
  this.x = mouse.x
  this.y = mouse.y
  this.dx = 0
  this.dy = 0
  this.a = 0.35
  this.b = 0.54
  this.n = 0
}





function animate(ctx,bg,train,mouse,n,step,Left=10,Top=90,Width=300,Height=100,alpha=1) 
{
  ctx.rect(Left,Top,Width,Height);
  ctx.fillStyle='rgba('+bg[0]+','+bg[1]+','+bg[2]+','+alpha+')';
  ctx.fill();
  
  //
  // console.log('['+mouse.x+'-'+mouse.y+']');
  //
  //if (mouse.x > 200)
  draw(ctx,train,mouse,n);
  step++;
  window.requestAnimationFrame(function()
  {
     animate(ctx,bg,train,mouse,n,step,Left,Top,Width,Height,alpha)
  })
}




function draw (ctx,train,mouse,n) 
{
  // update flwrs
  // console.log(train)
  
  for (i in train)
  {
    // update position
    flwr = train[i]
    var dx = flwr.follow.x - flwr.x
    var dy = flwr.follow.y - flwr.y

    flwr.dx = flwr.dx * flwr.a + dx * (1 - flwr.a)
    flwr.dy = flwr.dy * flwr.a + dy * (1 - flwr.a)

    flwr.x = flwr.dx * flwr.b + flwr.x 
    flwr.y = flwr.dy * flwr.b + flwr.y 

  //
  // console.log('['+mouse.x+'-'+flwr.x+'  '+mouse.y+'-'+flwr.y+']');
  //
    
    // draw
    // ctx.beginPath();
    // drawCircle(ctx, flwr.x, flwr.y, 2)
    // ctx.fillStyle = '#FFF547'
    // ctx.fill()
    
    if (flwr.follow !== mouse) 
    {
      ctx.beginPath();
      ctx.strokeStyle = '#FFF547';
      ctx.lineCap = 'round';
      ctx.lineWidth = (n-flwr.n)/n * 8 + 2; // определили диаметр кружка
      
      //if (flwr.x>100) flwr.x=100;
      
      ctx.moveTo(flwr.x,flwr.y);
      ctx.lineTo(flwr.follow.x,flwr.follow.y);
      ctx.stroke();
    }
  }
  
}

/*
function drawCircle (context, x, y, r) {
  context.arc(x ,y , r, 0, 2*Math.PI);
}
*/

// 2 часть: анимация фона

/*
var colors = new Array(
  [62,35,255],
  [60,255,60],
  [255,35,98],
  [45,175,230],
  [255,0,255],
  [255,128,0]);

var step = 0;
//color table indices for: 
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0,1,2,3];

//transition speed
var gradientSpeed = 0.002;

function updateGradient()
{
  
  if ( $===undefined ) return;
  
var c0_0 = colors[colorIndices[0]];
var c0_1 = colors[colorIndices[1]];
var c1_0 = colors[colorIndices[2]];
var c1_1 = colors[colorIndices[3]];

var istep = 1 - step;
var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
var color1 = "rgb("+r1+","+g1+","+b1+")";

var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
var color2 = "rgb("+r2+","+g2+","+b2+")";

 $('#Gallery').css({
   background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});
  
  step += gradientSpeed;
  if ( step >= 1 )
  {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];
    
    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    
  }
}

setInterval(updateGradient,10);

*/


// Create a button element
/*
const button = document.createElement('button');

// Set the button text to 'Can you click me?'
button.innerText = 'TTTCan you click me?TTT';

// Attach the "click" event to your button
button.addEventListener('click', () => 
{
  // When there is a "click"
  // it shows an alert in the browser
  alert('Oh, you clicked me!')
});

// Add the button to your HTML <body> tag
//document.body.appendChild(button);

//something=document.getElementById('Gallery');
//something.appendChild(button);
*/


/*
$(document).ready(function()
{
var div=document.getElementById('Gallery');
var button=document.createElement("input");
button.setAttribute("type", "button");
button.setAttribute("id", "NewButton");
button.setAttribute("value", "Новая кнопка");
 //можно сделать и так
 //button.type = "button";
 //button.id = "NewButton";
//button.value = "Новая кнопка";
   div.appendChild(button);
});
*/  



