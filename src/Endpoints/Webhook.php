<?php

namespace WeDesignIt\ParcelPro\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use WeDesignIt\ParcelPro\Exceptions\ParcelProException;

class Webhook extends Endpoint
{

    /**
     * @param  array  $webhook
     *
     * @return array|string
     * @throws ParcelProException
     * @throws GuzzleException
     */
    public function create(array $webhook)
    {
        $userId = $this->client->getUserId();
        $date   = $this->client->getDateTime();

        $data = array_merge_recursive(
            [
                'GebruikerId' => $userId,
                'Datum'       => $date,
                'HmacSha256'  => $this->client->getHash([
                    'userId',
                    'date',
                ]),
            ],
            $webhook);

        return $this->client->request('post', 'triggers.php',
            ['json' => $data]);
    }
}
