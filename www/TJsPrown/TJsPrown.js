function MakeCatchyQuotes()
{
   var Result=0;
   $(document).ready(function() 
   {
      $('span.pq').each(function() 
      {
         var quote=$(this).clone();
         quote.removeClass('pq');
         quote.addClass('pullquote');
         $(this).before(quote);
      }); // конец each
   }); // конец ready
   return Result;
}

function PageAssign(c)
{
   var Result=0;
   window.location.assign(c);
   
   return Result;
}

      function paTiny() 
      {
         window.location.assign("/TinyMCE/Tiny.php");
      }


function getTime(secs) {
	var sep = ':'; //separator character
	var hours,minutes,seconds,time,am_pm;
	var now = new Date();
	hours = now.getHours();
	if (hours < 12) {
		am_pm = 'am';
	} else {
		am_pm = 'pm';
	}
	hours = hours % 12;
	if (hours === 0) {
		hours = 12;
	} 
	time = hours;
	minutes = now.getMinutes();
	if (minutes < 10) {
		minutes = '0' + minutes;
	}
	time += sep + minutes;
	if (secs) {
		seconds = now.getSeconds();
		if (seconds < 10) {
			seconds = '0' + seconds;
		}
		time += sep + seconds;
	} 
	return time + ' ' + am_pm;
}

