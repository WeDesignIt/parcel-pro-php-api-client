<?php

namespace WeDesignIt\ParcelPro\Resources;

class Webhook extends Resource
{

    public const STATUS = 'Status';
    public const URL = 'Url';
    public const DATA = 'Data';

    public const STATUS_PRINTED = 'afgedrukt';
    public const STATUS_INTAKE = 'aannameproces';
    public const STATUS_DELIVERED = 'afgeleverd';

    // These are in the docs
    public const DATA_SHIPMENT_ID = '?id';
    public const DATA_REFERENCE = '?referentie';
    // But I assume these can be used too:
    public const DATA_TRACKING_NUMBER = '?trackingnummer';
    public const DATA_ORDER_NUMBER = '?ordernr';

    /**
     * @return string[]
     */
    public function getRequiredFields(): array
    {
        return [
            self::STATUS, self::URL, self::DATA,
        ];
    }

    /**
     * @return $this
     */
    public function whenPrinted(): Webhook
    {
        return $this->onStatus(self::STATUS_PRINTED);
    }

    /**
     * @return $this
     */
    public function whenIntake(): Webhook
    {
        return $this->onStatus(self::STATUS_INTAKE);
    }

    /**
     * @return $this
     */
    public function whenDelivered(): Webhook
    {
        return $this->onStatus(self::STATUS_DELIVERED);
    }

    /**
     * @param  string  $status
     *
     * @return $this
     */
    public function onStatus(string $status): Webhook
    {
        $this->offsetSet(self::STATUS, $status);

        return $this;
    }

    /**
     * @param  string  $url
     *
     * @return $this
     */
    public function callbackUrl(string $url): Webhook
    {
        $this->offsetSet(self::URL, $url);

        return $this;
    }

    /**
     * @param  array  $data
     *
     * @return $this
     */
    public function withData(array $data): Webhook
    {
        $this->offsetSet(self::DATA, http_build_query($data));

        return $this;
    }
}
