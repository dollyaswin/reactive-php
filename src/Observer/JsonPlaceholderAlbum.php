<?php

namespace RxExample\Observer;

class JsonPlaceholderAlbum extends \Rx\Observer\AbstractObserver
{
    protected function completed()
    {
        print("Completed" . PHP_EOL);
    }
    protected function next($title)
    {
        printf("Title: %s" . PHP_EOL, $title);
    }
    protected function error(\Throwable $err)
    {
        printf("Error: %s" . PHP_EOL, $err->getMessage());
    }
}
