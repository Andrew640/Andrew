<!DOCTYPE html>
<html>
	<head>

		<link href="/css/date.css" rel="stylesheet" type="text/css"/>

    <title>Start</title>


    </head>

	<body>

    	<!-- <span class="date">{$items}hello</div> -->


			<div>

				<form action="/" method="post">

					Twitterhandle<input value="{$twitterhandle}" name="twitterhandle" type="text" />
				</form>

			</div>



    	<div>

    		{foreach from=$tweets item=tweet}

					<span class="date">Source: {$tweet.source}</span> <br />
					<span class="date">Time and Date of Tweet: {$tweet.time}</span> <br />
    			<span class="date2">Tweeted by {$tweet.name}</span> <br />
					<span class="date3">Tweet: {$tweet.tweet}</span>

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
