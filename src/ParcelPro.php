<?php

namespace WeDesignIt\ParcelPro;

use WeDesignIt\ParcelPro\Endpoints\Account;
use WeDesignIt\ParcelPro\Endpoints\ApiKey;
use WeDesignIt\ParcelPro\Endpoints\DistributionLocation;
use WeDesignIt\ParcelPro\Endpoints\Shipment;
use WeDesignIt\ParcelPro\Endpoints\ShipmentType;
use WeDesignIt\ParcelPro\Endpoints\ShippingLabel;
use WeDesignIt\ParcelPro\Endpoints\Webhook;

class ParcelPro
{

    private Client $client;

    /**
     * ParcelPro constructor.
     *
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return Account
     */
    public function account(): Account
    {
        return new Account($this->client);
    }

    /**
     * @return ApiKey
     */
    public function apiKey(): ApiKey
    {
        return new ApiKey($this->client);
    }

    /**
     * @return DistributionLocation
     */
    public function distributionLocation(): DistributionLocation
    {
        return new DistributionLocation($this->client);
    }

    /**
     * @return Shipment
     */
    public function shipment(): Shipment
    {
        return new Shipment($this->client);
    }

    /**
     * @return ShipmentType
     */
    public function shipmentType(): ShipmentType
    {
        return new ShipmentType($this->client);
    }

    /**
     * @return ShippingLabel
     */
    public function shippingLabel(): ShippingLabel
    {
        return new ShippingLabel($this->client);
    }

    /**
     * @return Webhook
     */
    public function webhook(): Webhook
    {
        return new Webhook($this->client);
    }

}
