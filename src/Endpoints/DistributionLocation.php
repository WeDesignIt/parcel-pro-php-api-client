<?php

namespace WeDesignIt\ParcelPro\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use WeDesignIt\ParcelPro\Exceptions\ParcelProException;

class DistributionLocation extends Endpoint
{

    /**
     * Returns closest 20 distribution locations based on the given address
     *
     * @see https://login.parcelpro.nl/api/docs/#operation--uitreiklocaties
     *
     * @param  string  $carrier
     * @param  string  $postalCode
     * @param  int  $houseNumber
     * @param  string  $countryCode
     *
     * @return array|string
     * @throws ParcelProException
     * @throws GuzzleException
     *
     */
    public function get(
        string $carrier,
        string $postalCode,
        int $houseNumber,
        string $countryCode = 'NL'
    ) {
        $userId = $this->client->getUserId();
        $date   = $this->client->getDateTime();

        return $this->client->request('get', 'uitreiklocatie.php', [
            'json' => [
                'GebruikerId' => $userId,
                'Datum'       => $date,
                'Carrier'     => $carrier,
                'Postcode'    => $postalCode,
                'Nummer'      => $houseNumber,
                // 'Straat' => ... // there really is no use for this
                'Landcode'    => $countryCode,
                'HmacSha256'  => $this->client->getHash(
                    compact('userId', 'date', 'postalCode', 'houseNumber')
                ),
            ],
        ]);
    }
}
