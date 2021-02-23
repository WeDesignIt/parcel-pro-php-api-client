<?php

namespace WeDesignIt\ParcelPro\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class ShippingLabel extends Endpoint
{

    /**
     * Returns a shipping label for the given shipment ID
     *
     * @see https://login.parcelpro.nl/api/docs/#operation--label-afdrukken
     *
     * @param  int  $shipmentId
     * @param  bool  $pdf (default = true)
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function get(int $shipmentId, bool $pdf = true)
    {
        $userId = $this->client->getUserId();

        return $this->client->rawRequest('post', 'validate_apikey.php', [
            'json' => [
                'GebruikerId' => $userId,
                'ZendingId'   => $shipmentId,
                'PrintPdf'    => (int) $pdf,
                'HmacSha256'  => $this->client->getHash(compact('userId',
                    'shipmentId')),
            ],
        ]);
    }
}
