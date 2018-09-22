<?php

require_once __DIR__ . '/bootstrap.php';

use Rx\Observer\CallbackObserver;
use Rx\Observable;
use RxExample\Observer\PrintValue;

$fruits   = ['grape', 'watermelon', 'strawberry', 'pineaple'];
$observer = new CallbackObserver(
		function ($value) {
			printf("Next: %d chars" . PHP_EOL, $value);
		},
		function (\Exception $err) {
			printf("Error: %s" . PHP_EOL, $err->getMessage());
		},
		function () {
			echo "Complete" . PHP_EOL;
		}
);

Observable::fromArray($fruits)
    ->map(function ($value) {
        return strlen($value);
    })
    ->filter(function ($len) {
        return $len > 5;
    })
    ->subscribe($observer);

$loop->run();
