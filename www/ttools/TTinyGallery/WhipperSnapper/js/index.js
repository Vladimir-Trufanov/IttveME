/* на русском */


$(document).ready(function()
{
   //СursorSnake();
});


/*
// 1 часть: игра с курсором-змеёй
//window.requestAnimationFrame(animate);
*/

/*
var step = 0;
var canvas1 = document.createElement('canvas');
canvas1.width = window.innerWidth
canvas1.height = window.innerHeight
document.getElementsByTagName('body')[0].appendChild(canvas1);
var ctx = canvas1.getContext('2d');
var bg = [68,	43,	48]
var mouse = new Mouse()

document.onmousemove = function(e){ mouse.x = e.pageX; mouse.y = e.pageY}
window.addEventListener('resize', setup);


var flwr, flwrPrev, train = [], i, n = 50;
for (i = 0; i < n; i++) 
{
  flwr = new Flwr(mouse)
  flwr.n = i
  if (flwrPrev) {
    flwr.b = flwrPrev.b + (0.1/n)
    flwr.follow = flwrPrev
    flwrPrev.child = flwr
  } else {
    flwr.follow = mouse
  }
  flwrPrev = flwr
  train.push(flwr)
}

setup(ctx,bg);
anim(ctx,bg,train,mouse,n);
*/


function igra()
{
var step = 0;
var canvas1 = document.createElement('canvas');
canvas1.width = window.innerWidth
canvas1.height = window.innerHeight
document.getElementsByTagName('body')[0].appendChild(canvas1);
var ctx = canvas1.getContext('2d');
var bg = [68,	43,	48]
var mouse = new Mouse()

document.onmousemove = function(e){ mouse.x = e.pageX; mouse.y = e.pageY}
window.addEventListener('resize', setup);


var flwr, flwrPrev, train = [], i, n = 50;
for (i = 0; i < n; i++) 
{
  flwr = new Flwr(mouse)
  flwr.n = i
  if (flwrPrev) {
    flwr.b = flwrPrev.b + (0.1/n)
    flwr.follow = flwrPrev
    flwrPrev.child = flwr
  } else {
    flwr.follow = mouse
  }
  flwrPrev = flwr
  train.push(flwr)
}

setup(ctx,bg);
anim(ctx,bg,train,mouse,n,step);

}


/*
function СursorSnake()
{
   let o; // див
   let oi;
   var leftCanvas;
   var topCanvas;
   var widthCanvas;
   var heightCanvas;
   var heightLife;     // высота дива Life
   var heighttLife;    // высота дива tLife

   var SnakeCanvas=document.createElement('canvas');
   SnakeCanvas.width = window.innerWidth
   SnakeCanvas.height = window.innerHeight
   document.getElementsByTagName('body')[0].appendChild(SnakeCanvas);
   var SnakeContext=SnakeCanvas.getContext('2d');
   var ColorCanvas=[95,158,160]; 
  
   // Выбираем параметры для холста
   o=document.getElementById('Life');
   oi=o.getBoundingClientRect();
   leftCanvas=oi.left;
   topCanvas=oi.top;
   widthCanvas=oi.width;
   heightLife=oi.height;
   console.log('Life');
   console.log('leftCanvas='+leftCanvas);
   console.log('topCanvas='+topCanvas);
   console.log('widthCanvas='+widthCanvas);
   console.log('heightLife='+heightLife);
   
   o=document.getElementById('tLife');
   oi=o.getBoundingClientRect();
   leftCanvas=oi.left;
   topCanvas=oi.top;
   widthCanvas=oi.width;
   heighttLife=oi.height;
   console.log('tLife');
   console.log('leftCanvas='+leftCanvas);
   console.log('topCanvas='+topCanvas);
   console.log('widthCanvas='+widthCanvas);
   console.log('heighttLife='+heighttLife);
   
   o=document.getElementById('WorkTiny');
   oi=o.getBoundingClientRect();
   leftCanvas=oi.left;
   topCanvas=oi.top;
   widthCanvas=oi.width;
   
   console.log('WorkTiny');
   console.log('leftCanvas='+leftCanvas);
   console.log('topCanvas='+topCanvas);
   console.log('widthCanvas='+widthCanvas);
   
   heightCanvas=heightLife-heighttLife;
   console.log('heightCanvas='+heightCanvas);
   
   SnakeCanvas.left = 20;
   SnakeCanvas.top = 400;
   SnakeCanvas.width = 200;
   SnakeCanvas.height = 100;

   SnakeContext.rect(20,400,200,100);
   SnakeContext.fillStyle = 'Azure';
   SnakeContext.fill();
   
   console.log('Приветик!');

}

   
   console.log('Приветик1!');
*/






/*
var SnakeCanvas=document.createElement('canvas');
SnakeCanvas.width = window.innerWidth
SnakeCanvas.height = window.innerHeight
document.getElementsByTagName('body')[0].appendChild(SnakeCanvas);
var SnakeContext=SnakeCanvas.getContext('2d');
var ColorCanvas=[95,158,160]; 

fillOldCanvas(ctx,bg,1); 
fill1(SnakeContext,bg,1);
*/

function fillOldCanvas(context,color,alpha) 
{
  context.rect(10,90,300,100);
  context.fillStyle = 'Azure';
  context.fill();
}

/*
function fill1(context,color,alpha) 
{
  context.rect(10,290,300,100);
  //context.fillStyle = 'red';
  context.fill();
}
*/

/*
var canvas2 = document.createElement('canvas')
var ctx2 = canvas1.getContext('2d')
document.getElementsByTagName('body')[0].appendChild(canvas2);
*/


/*
var canvas2 = document.createElement('canvas')
var ctx2 = canvas2.getContext('2d')
document.getElementsByTagName('body')[0].appendChild(canvas2);
setup2();

function setup2() 
{
  / *
  width = window.innerWidth
  height = window.innerHeight
  * /
  fillCanvas2(ctx2, bg, 1)
}
function fillCanvas2 (context, color, alpha) 
{
  //context.rect(0, 0, this.width, this.height)

  o=document.getElementById('WorkTiny');
  oi=o.getBoundingClientRect();
  wipi=oi.width;
  topi=oi.top+20;
  //console.log(wipi);
 
  canvas2.left = 20;
  canvas2.top = 400;
  canvas2.width = 200;
  canvas2.height = 200;

  context.rect(20,400,200,200);
  //context.fillStyle = 'rgba(${color[0]}, ${color[1]}, ${color[2]}, ${alpha})';
  context.fillStyle = 'Azure';
  
  context.fill();
}
*/


/*

   let o; // див
   let oi;
   var leftCanvas;
   var topCanvas;
   var widthCanvas;
   var heightCanvas;
   var heightLife;     // высота дива Life
   var heighttLife;    // высота дива tLife
  
   // Выбираем параметры для холста
   
   o=document.getElementById('Life');
   oi=o.getBoundingClientRect();
   leftCanvas=oi.left;
   topCanvas=oi.top;
   widthCanvas=oi.width;
   heightLife=oi.height;
   console.log('Life');
   console.log('leftCanvas='+leftCanvas);
   console.log('topCanvas='+topCanvas);
   console.log('widthCanvas='+widthCanvas);
   console.log('heightLife='+heightLife);
   
   o=document.getElementById('tLife');
   oi=o.getBoundingClientRect();
   leftCanvas=oi.left;
   topCanvas=oi.top;
   widthCanvas=oi.width;
   heighttLife=oi.height;
   console.log('tLife');
   console.log('leftCanvas='+leftCanvas);
   console.log('topCanvas='+topCanvas);
   console.log('widthCanvas='+widthCanvas);
   console.log('heighttLife='+heighttLife);
   
   o=document.getElementById('WorkTiny');
   oi=o.getBoundingClientRect();
   leftCanvas=oi.left;
   topCanvas=oi.top;
   widthCanvas=oi.width;
   
   console.log('WorkTiny');
   console.log('leftCanvas='+leftCanvas);
   console.log('topCanvas='+topCanvas);
   console.log('widthCanvas='+widthCanvas);
   
   heightCanvas=heightLife-heighttLife;
   console.log('heightCanvas='+heightCanvas);
   
   SnakeCanvas.left = 20;
   SnakeCanvas.top = 400;
   SnakeCanvas.width = 200;
   SnakeCanvas.height = 100;
   */
   
   /*
   SnakeContext.rect(20,400,200,100);
   SnakeContext.fillStyle = 'Azure';
   SnakeContext.fill();
   */

   //FillCanvas(SnakeContext,ColorCanvas,1,iLeft,iTop,iWidth,iHeight);
   //FillCanvas(SnakeContext,ColorCanvas,1);
   
   //setup(SnakeContext,bg);


// функции

function setup(context,color,iLeft=10,iTop=90,iWidth=300,iHeight=100) 
{
   fillOldCanvas(context,color,1);
}

/*
function fillOldCanvas(context,color,alpha) 
{
  //context.rect(0, 0, this.width, this.height)

  / *
  o=document.getElementById('WorkTiny');
  oi=o.getBoundingClientRect();
  wipi=oi.width;
  topi=oi.top+20;
  //console.log(wipi);
  * /

  //context.rect(20,topi,wipi,300);
  context.rect(10,90,300,100);
  //context.rect(iLeft,iTop,iWidth,iHeight);
  //context.fillStyle = 'rgba(${color[0]}, ${color[1]}, ${color[2]}, ${alpha})';
  context.fillStyle = 'Azure';
  
  context.fill();
}
*/

function FillCanvas(context,color,alpha,iLeft,iTop,iWidth,iHeight) 
{
  //context.rect(0, 0, this.width, this.height)

  /*
  o=document.getElementById('WorkTiny');
  oi=o.getBoundingClientRect();
  wipi=oi.width;
  topi=oi.top+20;
  //console.log(wipi);
  */

  //context.rect(20,topi,wipi,300);
  context.rect(10,190,300,100);
  //context.rect(iLeft,iTop,iWidth,iHeight);
  //context.fillStyle = 'rgba(${color[0]}, ${color[1]}, ${color[2]}, ${alpha})';
  context.fillStyle = 'red';
  
  context.fill();
}


// mouse coordinates
function Mouse () 
{
  //ii=$("#WorkTiny").innerWidth;
  this.x = 160; //window.innerWidth / 2
  //this.x = $("#Life").innerWidth / 2
  
  this.y = 160; //window.innerHeight / 2
  //this.y = $("#Life").innerHeight / 2
}


/*
function animate() 
{
  fillOldCanvas(ctx,bg,1);
  draw()
  step++
  window.requestAnimationFrame(function(){animate()})
}
*/

function anim(ctx,bg,train,mouse,n,step) 
{
  fillOldCanvas(ctx,bg,1);
  draw(ctx,train,mouse,n)
  step++
  window.requestAnimationFrame(function(){anim(ctx,bg,train,mouse,n,step)})
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
    
    // draw
    // ctx.beginPath();
    // drawCircle(ctx, flwr.x, flwr.y, 2)
    // ctx.fillStyle = '#FFF547'
    // ctx.fill()
    
    if (flwr.follow !== mouse) {
      ctx.beginPath();
      ctx.strokeStyle = '#FFF547'
      ctx.lineCap = 'round'
      ctx.lineWidth = (n-flwr.n)/n * 8 + 2
      ctx.moveTo(flwr.x,flwr.y);
      ctx.lineTo(flwr.follow.x,flwr.follow.y);
      ctx.stroke();
    }
  }
  
}

function drawCircle (context, x, y, r) {
  context.arc(x ,y , r, 0, 2*Math.PI);
}

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



