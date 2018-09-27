<?php
declare(strict_types = 1);

require_once __DIR__ . '/bootstrap.php';

use RxExample\Observable\JsonPlaceholderAlbum as JsonPlaceholderAlbumObservable;
use RxExample\Operator\JsonPlaceholderAlbum as JsonPlaceholderAlbumOperator;
use RxExample\Observer\JsonPlaceholderAlbum as JsonPlaceholderAlbumObserver;
use RxExample\Observer\PrintValue;

$client = new \GuzzleHttp\Client();
$album  = null;
try {
	$album  = new JsonPlaceholderAlbumObservable($client);
	$album->take(3)
	      ->lift(function () {
	     		return new JsonPlaceholderAlbumOperator();
	      })
	      ->distinct()
	      ->subscribe(new JsonPlaceholderAlbumObserver);
} catch (\RuntimeException $e) {
	echo $e->getMessage(), PHP_EOL;
}