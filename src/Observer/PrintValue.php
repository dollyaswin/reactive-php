<?php

namespace RxExample\Observer;

class PrintValue extends \Rx\Observer\AbstractObserver
{
    protected function completed()
    {
        print("Completed" . PHP_EOL);
    }
    protected function next($item)
    {
        printf("Next: %s chars" . PHP_EOL, $item);
    }
    protected function error(\Throwable $err)
    {
        printf("Error: %s" . PHP_EOL, $err->getMessage());
    }
}
