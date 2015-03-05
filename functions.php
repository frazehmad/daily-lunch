<?php

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
		return array('error' => TRUE, 'message' => 'Hey Buddy! go and enjoy weekend!');
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
	$random_key = array_rand($meals);

	$today_meal = $meals[$random_key];

	// Save today meal into file
	saveTodayMeal($today_meal);

	// Convert array to object
	$today_meal = arrayToObject($today_meal);

	return $today_meal;
}

function isMealGeneratedToday()
{
	global $daily;

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
		$this_month_meals = $daily->this_month_meals ? $daily->this_month_meals : array();

		$today_meal_id = $today_meal['id'];

		$total_meals = count($meals);

		if(count($this_month_meals) >= count($meals))
		{
			$this_month_meals = array($today_meal_id);
		}
		else
		{
			if(!in_array($today_meal_id, $this_month_meals))
			{
				$this_month_meals[] = $today_meal_id;
			}
		}

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

function arrayToObject($array)
{
	$object = new stdClass();

	foreach ($array as $key => $value)
	{
	    $object->$key = $value;
	}

	return $object;
}