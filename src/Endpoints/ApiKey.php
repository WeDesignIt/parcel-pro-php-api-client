<?php

namespace WeDesignIt\ParcelPro\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use WeDesignIt\ParcelPro\Exceptions\ParcelProException;

class ApiKey extends Endpoint
{

    /**
     * Returns if the given api key is valid.
     *
     * @see https://login.parcelpro.nl/api/docs/#authentication
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function validate(): ResponseInterface
    {
        $userId = $this->client->getUserId();
        $date   = $this->client->getDateTime();

        return $this->client->rawRequest('post', 'validate_apikey.php', [
            'json' => [
                'GebruikerId' => $userId,
                'Datum'       => $date,
                'HmacSha256'  => $this->client->getHash(compact('userId',
                    'date')),
            ],
        ]);
    }

    /**
     * @return bool
     * @throws GuzzleException
     */
    public function isValid(): bool
    {
        try {
            return $this->validate()->getStatusCode() === 200;
        } catch (GuzzleException $ge) {
            return false;
        }
    }

}
