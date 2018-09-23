<?php

require_once __DIR__ . '/bootstrap.php';

use Rx\Subject\Subject;
use RxExample\Observer\PrintValue;

$subject = new Subject();
$subject->map(function ($value) {
            return strlen($value);
})->filter(function ($len) {
    return $len > 5;
})->subscribe(new PrintValue);
$subject->onNext('grape');
$subject->onNext('watermelon');
$subject->onNext('strawberry');
$subject->onNext('pineaple');
$loop->run();
