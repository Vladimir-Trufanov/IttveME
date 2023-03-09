/* на русском */

/*
// 1 часть: игра с курсором-змеёй
var width, height
var step = 0;
var canvas = document.createElement('canvas')
var ctx = canvas.getContext('2d')
var bg = [68,	43,	48]

// mouse coordinates
function Mouse () 
{
  //ii=$("#WorkTiny").innerWidth;
  this.x = 160; //window.innerWidth / 2
  //this.x = $("#Life").innerWidth / 2
  
  this.y = 160; //window.innerHeight / 2
  //this.y = $("#Life").innerHeight / 2
}
var mouse = new Mouse()
document.onmousemove = function(e){ mouse.x = e.pageX; mouse.y = e.pageY}

document.getElementsByTagName('body')[0].appendChild(canvas)

window.addEventListener('resize', setup)
//$("#Life").addEventListener('resize', setup)




setup()

function setup() 
{
  canvas.width = width = window.innerWidth
  canvas.height = height = window.innerHeight
  //canvas.width = width = $("#Life").innerWidth
  //canvas.height = height = $("#Life").innerHeight
  
  fillCanvas(ctx, bg, 1)
}

window.requestAnimationFrame(animate);
//$("#Life").requestAnimationFrame(animate);

function animate() {
  fillCanvas(ctx, bg, 1)
  draw()
  step++
  window.requestAnimationFrame(function(){animate()})
  //$("#Life").requestAnimationFrame(function(){animate()})
}


function Flwr () {
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


var flwr, flwrPrev, train = [], i, n = 50;
for (i = 0; i < n; i++) {
  flwr = new Flwr()
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

function draw () {
  // update flwrs
  // console.log(train)
  
  for (i in train){
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

function fillCanvas (context, color, alpha) 
{
  //context.rect(0, 0, this.width, this.height)

  o=document.getElementById('WorkTiny');
  oi=o.getBoundingClientRect();
  wipi=oi.width;
  topi=oi.top+20;
  //console.log(wipi);
 
  
  context.rect(20,topi,wipi,300);
  //context.rect(10,10,300,300);
  //context.fillStyle = 'rgba(${color[0]}, ${color[1]}, ${color[2]}, ${alpha})';
  context.fillStyle = 'Azure';
  
  context.fill();
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


$(document).ready(function()
{

var div=document.getElementById('Gallery');
var button=document.createElement("input");
button.setAttribute("type", "button");
button.setAttribute("id", "NewButton");
button.setAttribute("value", "Новая кнопка");
/*можно сделать и так
button.type = "button";
button.id = "NewButton";
button.value = "Новая кнопка";
*/
   div.appendChild(button);
});
  



