<?php

namespace App\Services;

use GuzzleHttp\Client;

/**
 * Documentation: https://docs.api.wanikani.com/20170710/
 */
class Wanikani
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var array
     */
    protected $headers;

    /**
     * Create a new Wanikani instance.
     */
    public function __construct()
    {
        $this->client  = new Client(['base_uri' => 'https://api.wanikani.com/v2/']);
        $this->headers = [
            'Authorization'     => 'Bearer '.config('services.wanikani.token'),
            'Accept'            => 'application/json',
            'Wanikani-Revision' => '20170710',
        ];
    }

    /**
     * Create a new GET request.
     */
    public function get($endpoint)
    {
        return $this->client->request('GET', $endpoint, [
            'headers' => $this->headers,
        ]);
    }
}