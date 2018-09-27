<?php

use Rx\Disposable\CallbackDisposable;
use RxExample\Observer\PrintValue;

require_once 'bootstrap.php';

//With static method
$source = \Rx\Observable::create(function (\Rx\ObserverInterface $observer) {
    $observer->onNext(42);
    $observer->onCompleted();

    return new CallbackDisposable(function () {
        echo "Disposed\n";
    });
});

$subscription = $source->subscribe(new PrintValue);
