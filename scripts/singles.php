<?php

require_once __DIR__ . '/bootstrap.php';

use Rx\Observable;
use RxExample\Observer\PrintValue;

Observable::just('100')
    ->subscribe(new PrintValue);
