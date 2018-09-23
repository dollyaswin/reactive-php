<?php

require_once __DIR__ . '/bootstrap.php';

$fruits = ['apple', 'banana', 'orange', 'raspberry'];
$source = \Rx\Observable::fromArray($fruits);
$source->subscribe(
    function ($x) {
        printf("Next: %s (%d chars)" . PHP_EOL, $x, strlen($x));
    },
    function (Exception $ex) {
        echo 'Error: ', $ex->getMessage(), PHP_EOL;
    },
    function () {
        echo 'Completed', PHP_EOL;
    }
);
