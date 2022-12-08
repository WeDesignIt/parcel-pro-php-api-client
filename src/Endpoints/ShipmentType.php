<?php

namespace WeDesignIt\ParcelPro\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use WeDesignIt\ParcelPro\Exceptions\ParcelProException;

class ShipmentType extends Endpoint
{

    /**
     * Returns all shipment types
     *
     * @see https://login.parcelpro.nl/api/docs/#operation--type-zendingen-opvragen
     *
     * @return array|string
     * @throws ParcelProException
     * @throws GuzzleException
     */
    public function list() : array|string
    {
        $userId = $this->client->getUserId();
        $date   = $this->client->getDateTime();

        return $this->client->request('get', 'type.php', [
            'json' => [
                'GebruikerId' => $userId,
                'Datum'       => $date,
                'HmacSha256'  => $this->client->getHash(compact('userId',
                    'date')),
            ]
        ]);
    }
}
