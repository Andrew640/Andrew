<!DOCTYPE html>
<html>
	<head>
	
		<link href="/css/date.css" rel="stylesheet" type="text/css"/>
		
    <title>Start</title>
    

    </head>
  	
	<body>

    	<!-- <span class="date">{$items}hello</div> -->
    	
    	<div class="date">
    	
    		{foreach from=$data item=tweet}
    		
    			Time and Date of Tweet <span class="date2">{$tweet.created_at}</span> <br />
    			Tweeted by {$tweet.user.screen_name}
    			
    			<br /><br />
    			
    		{/foreach}
    	
    	</div>
<!--     	<div class="date2">
 -->    	
<!--     	{$items}
 -->


<!-- 	<div class="date">Hello</div>
 -->
	</body>
</html>