<?php

namespace WeDesignIt\ParcelPro\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use WeDesignIt\ParcelPro\Exceptions\ParcelProException;
use WeDesignIt\ParcelPro\Resources\Shipment\Receiver;
use WeDesignIt\ParcelPro\Resources\Shipment\Sender;

class Shipment extends Endpoint
{

    /**
     * Returns shipments based on given filters.
     * For fluent usage, you can use the WeDesignIt\ParcelPro\Filters\Shipment
     * class for inputting filters.
     *
     * @see https://login.parcelpro.nl/api/docs/#operation--zendingen
     *
     * @param  array  $filters
     *
     * @return array|string
     * @throws ParcelProException
     * @throws GuzzleException
     */
    public function list(array $filters = []): array
    {
        $userId = $this->client->getUserId();
        $date   = $this->client->getDateTime();

        $data = array_merge_recursive(
            [
                'GebruikerId' => $userId,
                'Datum'       => $date,
                'HmacSha256'  => $this->client->getHash(compact('userId',
                    'date'))
            ],
            $filters);

        return $this->client->request('get', 'zendingen.php',
            ['json' => $data]);
    }

    /**
     * Returns a particular shipment based on shipment ID.
     *
     * @param  int  $id
     *
     * @return array|string
     * @throws ParcelProException
     * @throws GuzzleException
     */
    public function get(int $id): array
    {
        $filters = new \WeDesignIt\ParcelPro\Filters\Shipment();
        $filters->shipmentId($id);

        return $this->list($filters->toArray());
    }

    /**
     * Create a new shipment.
     * For fluent usage you can use the WeDesignIt\ParcelPro\Resources\Shipment
     * class for creating a shipment
     *
     * @see https://login.parcelpro.nl/api/docs/#operation--nieuwe-zending
     *
     * @param  array  $shipment
     *
     * @return array|string
     * @throws ParcelProException
     * @throws GuzzleException
     */
    public function create(array $shipment)
    {
        $userId = $this->client->getUserId();
        $date   = $this->client->getDateTime();

        if (empty(($shipment[Sender::POSTAL_CODE] ?? ''))) {
            $hashdata = [
                $userId,
                $date,
                $shipment[Receiver::POSTAL_CODE]
            ];
        } else {
            $hashdata = [
                $userId,
                $date,
                ($shipment[Sender::POSTAL_CODE] ?? ''),
                $shipment[Receiver::POSTAL_CODE]
            ];
        }

        $data = array_merge_recursive(
            [
                'GebruikerId' => $userId,
                'Datum'       => $date,
                'HmacSha256'  => $this->client->getHash($hashdata),
            ],
            $shipment);

        return $this->client->request('post', 'zending.php',
            ['json' => $data]);
    }
}
