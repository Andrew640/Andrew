<!DOCTYPE html>
<html>
	<head>

		<link href="/css/date.css" rel="stylesheet" type="text/css"/>

    <title>Twitter search</title>


    </head>


	<body>

		<header class="header">

				<form class="form" action="/" method="post">
					Twitter Search<input class="inputbox" value="{$twitterhandle}" name="twitterhandle" type="text" />
				</form>
		</header>

		<div class="extraline"></div>

<!-- <pre>{$twitterhandle|@print_r}</pre> -->


    	<div>

    		{foreach from=$tweets item=tweet}
				<div class="line">
    			<span class="by">Tweeted by {$tweet.user.screen_name}</span> <br />
					<span class="td">Time and Date of Tweet: {$tweet.created_at}</span> <br />
					<span class="twt">Tweet: {$tweet.text}</span>
				</div>

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
