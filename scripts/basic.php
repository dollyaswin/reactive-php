<?php
require_once __DIR__ . '/bootstrap.php';

use React\EventLoop\Factory;
use Rx\Scheduler;

$loop = Factory::create();
//You only need to set the default scheduler once
Scheduler::setDefaultFactory(function () use ($loop) {
    return new Scheduler\EventLoopScheduler($loop);
});

$fruits = ['apple', 'banana', 'orange', 'raspberry'];
$source = \Rx\Observable::fromArray($fruits);
$source->subscribe(
    function ($x) {
        echo 'Next: ', $x, ' (' . strlen($x) . ' chars)', PHP_EOL;
    },
    function (Exception $ex) {
        echo 'Error: ', $ex->getMessage(), PHP_EOL;
    },
    function () {
        echo 'Completed', PHP_EOL;
    }
);
$loop->run();
