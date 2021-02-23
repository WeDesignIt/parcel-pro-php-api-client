<?php

namespace WeDesignIt\ParcelPro\Endpoints;

use WeDesignIt\ParcelPro\Exceptions\ParcelProException;

class Account extends Endpoint
{

    /**
     * @see https://login.parcelpro.nl/api/docs/#operation--account-bestaat
     *
     * @param  string  $email
     *
     * @return array|string
     * @throws ParcelProException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function exists($email)
    {
        $userId = $this->client->getUserId();

        return $this->client->request('GET', 'account_exists.php', [
            'json' => [
                'GebruikerId' => $userId,
                'Email'       => $email,
                'HmacSha256'  => $this->client->getHash(compact('userId',
                    'email')),
            ],
        ]);
    }

    /**
     * @param  string  $email
     *
     * @return bool
     */
    public function isExisting($email): bool
    {
        $response = $this->exists($email);

        return ((int) $response['exists'] ?? 0) === 1;
    }

    /**
     * @see https://login.parcelpro.nl/api/docs/#operation--account-aanmaken
     *
     * @param  array  $data
     *
     * @return array|string
     * @throws ParcelProException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $data)
    {
        $userId = $this->client->getUserId();
        $email  = $data['email'] ?? '';

        $data = array_merge_recursive($data, [
            'GebruikerId' => $userId,
            'HmacSha256'  => $this->client->getHash(compact('userId', 'email')),
        ]);

        return $this->client->request('post', 'create_account.php',
            ['json' => $data]);
    }
}
