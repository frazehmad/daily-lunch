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
		    background-image:url("background.jpg");
		    background-repeat: no-repeat;
		    background-size: 100% 100%;
		    color: #ffffff;
		}
		html {
		    height: 100%
		}
		.meal {
			font-family: sans-serif;
			font-size: 4em;
			margin: 170px 0 0 150px;
			width: 325px;
			line-height: 1.1em;
			text-shadow: 1px 1px #000000;
		}
		.meal strong {
			color: #b8d750;
			text-shadow: 2px 2px #000000;
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