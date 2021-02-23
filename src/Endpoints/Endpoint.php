<?php

namespace WeDesignIt\ParcelPro\Endpoints;

use WeDesignIt\ParcelPro\Client;

abstract class Endpoint
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Resource constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

}
