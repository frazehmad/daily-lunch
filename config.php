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
		'name' => 'Qeema Aalo',
		'vendor' => 'Walk n Door'
	),
	array(
		'id' => 3,
		'name' => 'Chicken Koftay',
		'vendor' => 'Walk n Door'
	),
	array(
		'id' => 4,
		'name' => 'White Karhai',
		'vendor' => 'Walk n Door'
	),
	array(
		'id' => 5,
		'name' => 'BBQ Biryani',
		'vendor' => 'Merrath'
	),
	array(
		'id' => 6,
		'name' => 'Nihari',
		'vendor' => 'Jawed'
	),
	array(
		'id' => 7,
		'name' => 'Haleem',
		'vendor' => 'Karachi Haleem'
	),
	array(
		'id' => 8,
		'name' => 'Beef Biryani',
		'vendor' => 'Walk n Door',
		'day' => "Friday"
	),
	array(
		'id' => 9,
		'name' => 'Chicken Biryani',
		'vendor' => 'Sadia'
	),
	array(
		'id' => 10,
		'name' => 'Zinger Burger',
		'vendor' => 'Pukar Foods'
	),
	array(
		'id' => 11,
		'name' => 'Tikka + Roll',
		'vendor' => 'Eaton'
	),
	array(
		'id' => 12,
		'name' => 'Saucy Broast',
		'vendor' => 'KBC'
	),
	array(
		'id' => 13,
		'name' => 'Pizza',
		'vendor' => 'PizzaHut'
	),
	array(
		'id' => 14,
		'name' => 'Daal Chawal',
		'vendor' => 'Walk n Door'
	),
	array(
		'id' => 15,
		'name' => 'Kari Chawal',
		'vendor' => 'Walk n Door'
	),
	array(
		'id' => 16,
		'name' => 'Chicken Shashlik',
		'vendor' => 'Walk n Door'
	),
	array(
		'id' => 17,
		'name' => 'Bihari + Malai Boti with Parathas',
		'vendor' => 'Merrath'
	),
	array(
		'id' => 18,
		'name' => 'Reshmi Paneer Handi',
		'vendor' => 'KBC'
	),
	array(
		'id' => 19,
		'name' => 'Zinger Strips',
		'vendor' => 'KFC'
	),
	array(
		'id' => 20,
		'name' => 'Cholay',
		'vendor' => 'Baloch Cholay'
	),
	array(
		'id' => 21,
		'name' => 'Chargha',
		'vendor' => 'Walk n Door'
	)
);

$daily_file = "daily.json";
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