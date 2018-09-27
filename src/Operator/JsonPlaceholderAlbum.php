<?php
namespace RxExample\Operator;

use Rx\Observer\CallbackObserver;
use Rx\ObservableInterface as ObservableI;
use Rx\ObserverInterface as ObserverI;
use Rx\DisposableInterface as DisposableI;
use Rx\Operator\OperatorInterface as OperatorI;

class JsonPlaceholderAlbum implements OperatorI
{
    public function __invoke(ObservableI $observable, ObserverI $observer): DisposableI
    {
        $callbackObserver = new CallbackObserver(
            function ($album) use ($observer) {
                if (isset($album['id'])) {
                    $observer->onNext($album['title']);
                } else {
                    $observer->onError(new InvalidArgumentException('Album name not found'));
                }
            },
            [$observer, 'onError'],
            [$observer, 'onCompleted']
        );

        return $observable->subscribe($callbackObserver);
    }
}
