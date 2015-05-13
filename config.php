<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set('Asia/Karachi');

$meals = array(
	array(
		'id' => 1,
		'name' => 'Chicken Lachay',
		'vendor' => 'Walk n Door'
	),
	array(
		'id' => 2,
		'name' => 'Chicken Koftay',
		'vendor' => 'Walk n Door'
	),
	array(
		'id' => 3,
		'name' => 'White Karhai',
		'vendor' => 'Walk n Door'
	),
	array(
		'id' => 4,
		'name' => 'BBQ Biryani',
		'vendor' => 'Merrath'
	),
	array(
		'id' => 5,
		'name' => 'Nihari',
		'vendor' => 'Jawed'
	),
	array(
		'id' => 6,
		'name' => 'Haleem',
		'vendor' => 'Karachi Haleem'
	),
	array(
		'id' => 7,
		'name' => 'Beef Biryani',
		'vendor' => 'Walk n Door',
		'day' => "Friday"
	),
	array(
		'id' => 8,
		'name' => 'Chicken Biryani',
		'vendor' => 'Sadia'
	),
	array(
		'id' => 9,
		'name' => 'Zinger Burger',
		'vendor' => 'Pukar Foods'
	),
	array(
		'id' => 10,
		'name' => 'Tikka + Roll',
		'vendor' => 'Eaton'
	),
	array(
		'id' => 11,
		'name' => 'Saucy Broast',
		'vendor' => 'KBC'
	),
	array(
		'id' => 12,
		'name' => 'Pizza',
		'vendor' => 'PizzaHut'
	),
	array(
		'id' => 13,
		'name' => 'Daal Chawal',
		'vendor' => 'Walk n Door'
	),
	array(
		'id' => 14,
		'name' => 'Kari Chawal',
		'vendor' => 'Walk n Door'
	),
	array(
		'id' => 15,
		'name' => 'Bihari + Malai Boti with Parathas',
		'vendor' => 'Merrath'
	),
	array(
		'id' => 16,
		'name' => 'Reshmi Paneer Handi',
		'vendor' => 'KBC'
	),
	array(
		'id' => 17,
		'name' => 'Bihari Tikka',
		'vendor' => 'Meal Time'
	),
	array(
		'id' => 18,
		'name' => 'Cholay',
		'vendor' => 'Baloch Cholay'
	),
	array(
		'id' => 19,
		'name' => 'Chargha',
		'vendor' => 'Walk n Door'
	),
	array(
		'id' => 20,
		'name' => 'Wow Deal',
		'vendor' => 'Subway'
	),
	array(
		'id' => 21,
		'name' => 'Broast',
		'vendor' => 'Pukar Foods'
	),
	array(
		'id' => 22,
		'name' => 'Club Sandwich',
		'vendor' => 'Pukar Foods'
	)
);

$daily_file = "daily.json";