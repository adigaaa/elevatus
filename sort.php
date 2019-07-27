<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Sorter;
use App\Exceptions\ParseException;
use App\Exceptions\ValidationException;

try {
	$stops = json_decode(file_get_contents(base_path('Data/stops.json')),true);
	if (json_last_error() !== JSON_ERROR_NONE) {
		throw new ParseException();
	}
	$sorter = new Sorter($stops);
	$sorter->sort();

} catch (Exception $e) {
	echo  (new App\Exceptions\Handler($e))->respond();
}
