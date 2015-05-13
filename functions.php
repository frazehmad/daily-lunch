<?php

function pickRandomMeal()
{
	global $meals;

	$random_key = array_rand($meals);

	$today_meal = $meals[$random_key];

	// Convert array to object
	$today_meal = arrayToObject($today_meal);

	return $today_meal;
}

function findTodayMeal()
{
	// Define Global variables
	global $meals;

	// initiate today meal
	$today_meal = NULL;

	// What is the day today?
	$today = date("l");

	if($today == "Saturday" OR $today == "Sunday")
	{
		return array('error' => TRUE, 'message' => '<strong>Hey Buddy!</strong> go and enjoy weekend!');
	}

	// If we have fixed meal for today
	foreach ($meals as $meal) 
	{
		if(!empty($meal['day']) AND $meal['day'] == $today)
		{
			return arrayToObject($meal);
			break;
		}
	}

	// No meal was fixed today, let's find if we have generated today meal
	if($today_meal = isMealGeneratedToday())
	{
		return $today_meal;
	}

	// Let's select a random meal that has not been repeated
	$today_meal = getUniqueMeal();

	// Save today meal into file
	saveTodayMeal($today_meal);

	// Convert array to object
	$today_meal = arrayToObject($today_meal);

	return $today_meal;
}

function isMealGeneratedToday()
{
	$daily = getDailyFileContent();

	if(!empty($daily->last_generated))
	{
		$today_start_time = strtotime('today midnight');
		$today_end_time = $today_start_time + (60 * 60 * 24);

		if($daily->last_generated >= $today_start_time AND $daily->last_generated <= $today_end_time)
		{
			return $daily->today_meal;
		}
	}
}

function saveTodayMeal($today_meal)
{
	global $daily_file;
	global $daily;
	global $meals;

	if (file_exists($daily_file)) 
	{
		$this_month_meals = getThisMonthMeals();

		$today_meal_id = $today_meal['id'];

		$this_month_meals[] = $today_meal_id;

		$fileToWrite = fopen($daily_file, "w") or die("Unable to open file!");

		$file_data = array(
			"last_generated" => time(),
			"today_meal" => $today_meal,
			"this_month_meals" => $this_month_meals
		);

		fwrite($fileToWrite, json_encode($file_data));
		fclose($fileToWrite);
	}
}

function getUniqueMeal()
{
	global $daily_file;
	global $daily;
	global $meals;

	$this_month_meals = getThisMonthMeals();

	// Total Meals
	$total_meals = count($meals);
	$meals_checked = 0;

	do 
	{
		// If we have checked all meals and not able to find a unique meal
		if($meals_checked == $total_meals)
		{
			// Clean Daily JSON file
			cleanDailyFile();

			// Get this month meals again
			$this_month_meals = getThisMonthMeals();
		}

		$random_key = array_rand($meals);

		$today_meal = $meals[$random_key];
		$today_meal_id = $today_meal['id'];

		$unique = TRUE;

		// If meals was already used this month
	  	if(in_array($today_meal_id, $this_month_meals))
		{
			$unique = FALSE;
		}

		// If meal has a fixed day
		if(!empty($today_meal['day']))
		{
			$unique = FALSE;
		}

	  	$meals_checked++;

	} while (!$unique);

	return $today_meal;
}

function cleanDailyFile()
{
	global $daily_file;

	$file_data = array(
		"last_generated" => strtotime('yesterday'),
		"today_meal" => array('id'=> '', 'name' => '', 'vendor' => ''),
		"this_month_meals" => array()
	);

	$fileToWrite = fopen($daily_file, "w") or die("Unable to open file!");

	fwrite($fileToWrite, json_encode($file_data));
	fclose($fileToWrite);
}

function getThisMonthMeals()
{
	if($daily = getDailyFileContent())
	{
		$this_month_meals = $daily->this_month_meals ? $daily->this_month_meals : array();
		
		return $this_month_meals;
	}
}

function getDailyFileContent()
{
	global $daily_file;

	$daily = NULL;

	if (file_exists($daily_file)) 
	{
		$fh = fopen($daily_file, 'r');
		while ($line = fgets($fh)) 
		{
		  $daily = $daily . $line;
		}
		fclose($fh);

		$daily = json_decode($daily);
	}

	return $daily;
}

function arrayToObject($array)
{
	$object = new stdClass();

	foreach ($array as $key => $value)
	{
	    $object->$key = $value;
	}

	return $object;
}