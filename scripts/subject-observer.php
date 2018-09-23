<?php

require_once __DIR__ . '/bootstrap.php';

use Rx\Observable;
use Rx\Subject\Subject;
use RxExample\Observer\PrintValue;

$subject = new Subject();
$subject->filter(function ($len) {
            return $len > 5;
})->subscribe(new PrintValue);

$fruits  = ['grape', 'watermelon', 'strawberry', 'pineaple'];
Observable::fromArray($fruits)
          ->map(function ($value) {
                return strlen($value);
          })->subscribe($subject);
$loop->run();
