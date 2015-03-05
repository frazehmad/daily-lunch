<?php

include 'config.php';
include 'functions.php';

$today_meal = findTodayMeal();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Today Meal  - JEEGLO</title>
	<style>
		body {
		    color: #ffffff;
		    background-image:url("background.jpg");
		    background-repeat: no-repeat;
		    background-size: cover;
		    background-attachment: fixed;
		    background-position: left;
		}
		html {
		    height: 100%
		}
		.meal {
			font-family: sans-serif;
			font-size: 3em;
			margin: 170px 0 0 150px;
			width: 325px;
			line-height: 1.1em;
			text-shadow: 1px 1px #000000;
		}
		.meal strong {
			color: #b8d750;
			text-shadow: 2px 2px #000000;
		}

		@media only screen and (max-width: 1000px) {
		   .meal { 
		   	font-size: 1.8em; 
		   	margin: 150px 0 0 100px;
		   	width: 190px;
		   }
		}
	</style>
</head>
<body>
	<div class="meal">
		<?php if(is_array($today_meal) AND isset($today_meal['error'])): ?>
			<?php echo $today_meal['message']; ?>
		<?php else: ?>
			We are eating <strong><?php echo $today_meal->name; ?></strong> in today's lunch!
		<?php endif; ?>
	</div>
</body>
</html>