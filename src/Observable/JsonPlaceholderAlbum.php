<?php
namespace RxExample\Observable;

use Rx\Observable\ArrayObservable;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Psr7\Request;

class JsonPlaceholderAlbum extends ArrayObservable
{
    /**
     * @var int
     */
    protected $limit;

    /**
     * @var string
     */
    protected $url;

    /**
     * @param GuzzleHttp\Client $httpClient
     */
    protected $httpClient;

    public function __construct(HttpClient $httpClient = null, ?string $url = null)
    {
        $this->url   = $url ?? 'https://jsonplaceholder.typicode.com/albums';
        $this->httpClient = $httpClient;
        $data  = $this->getAlbumJson();
        $sched = new \Rx\Scheduler\ImmediateScheduler();
        parent::__construct($data, $sched);
    }

    protected function getAlbumJson()
    {
        $request  = new Request('GET', $this->url);
        $response = $this->httpClient->send($request);
        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody()->getContents(), true);
        } else {
            throw new \RuntimeException('Sorry, unable to retrieve data from ' . $this->url);
        }
    }
}
