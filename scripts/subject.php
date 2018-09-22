<?php

require_once __DIR__ . '/bootstrap.php';

use Rx\Observer\CallbackObserver;
use Rx\Observable;
use Rx\Subject\Subject;

$fruits   = ['apple', 'banana', 'orange', 'raspberry'];
$observer = new CallbackObserver(
    function ($value) {
        echo "Next: $value\n";
    },
    function (\Exception $err) {
        $msg = $err->getMessage();
        echo "Error: $msg\n";
    },
    function () {
        echo "Complete\n";
    }
);
$subject = new Subject();
$subject
    ->map(function ($value) {
        return strlen($value);
    })
    ->filter(function ($len) {
        return $len > 5;
    })
    ->subscribe($observer);
$subject->onNext('apple');
$subject->onNext('banana');
$subject->onNext('orange');
$subject->onNext('raspberry');

$loop->run();
