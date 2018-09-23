<?php
require __DIR__ . '/../vendor/autoload.php';

use React\EventLoop\Factory;
use Rx\Scheduler;

$loop = Factory::create();
//You only need to set the default scheduler once
Scheduler::setDefaultFactory(function () use ($loop) {
    return new Scheduler\EventLoopScheduler($loop);
});
register_shutdown_function(function () use ($loop) {
    $loop->run();
});
