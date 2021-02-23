<?php

namespace WeDesignIt\ParcelPro;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use WeDesignIt\ParcelPro\Exceptions\ParcelProException;

class Client
{
    /**
     * @var string
     */
    protected $baseUrl = 'https://login.parcelpro.nl/api/';

    /**
     * @var GuzzleClient
     */
    protected $client;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * Client constructor.
     *
     * @param  int  $userId
     * @param  string  $apiKey
     */
    public function __construct(int $userId, string $apiKey)
    {
        $this->userId = $userId;
        $this->apiKey = $apiKey;

        $this->client = new GuzzleClient([
            'base_uri' => $this->baseUrl,
            'headers'  => [
                'Accept' => 'application/json',
            ],
        ]);
    }

    /**
     * Returns the hash for signing
     *
     * @param  array  $data
     *
     * @return string
     */
    public function getHash(array $data): string
    {
        return hash_hmac('sha256', implode('', $data), $this->apiKey);
    }

    /**
     * Returns formatted datetime for 'Datum' field
     *
     * @param  \DateTime|null  $when
     *
     * @return string
     */
    public function getDateTime(\DateTime $when = null): string
    {
        if (is_null($when)) {
            $when = new \DateTime();
        }

        return $when->format('Y-m-d H:i:s');
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param  string  $method
     * @param  string  $uri
     * @param  array  $options
     *
     * @return array|string Array if the response was JSON, raw response body otherwise.
     * @throws ParcelProException
     * @throws GuzzleException
     */
    public function request(
        string $method,
        string $uri,
        array $options = []
    ) {
        $response = $this->rawRequest($method, $uri, $options);

        $contents = $response->getBody()->getContents();

        // fallback to application/json as this is, apart from 1 call, the return type
        $default = 'application/json';
        if (stristr(($response->getHeader('Content-Type')[0] ?? $default), 'application/json') !== false) {
            $array = json_decode($contents, true);

            if ((int) ($array['Code'] ?? 0) > 0) {
                throw new ParcelProException((int) $array['Code']);
            }

            return (array) $array;
        } else {
            return $contents;
        }
    }

    /**
     * @param  string  $method
     * @param  string  $uri
     * @param  array  $options
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function rawRequest(
        string $method,
        string $uri,
        array $options = []
    ): ResponseInterface {
        return $this->client->request($method, $uri, $options);
    }

}
