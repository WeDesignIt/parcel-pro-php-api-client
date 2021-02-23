<?php

namespace WeDesignIt\ParcelPro\Resources\Shipment;

use WeDesignIt\ParcelPro\Resources\Resource;

class Sender extends Resource
{

    public const NAME = 'NaamAfzender';
    public const CONTACT_NAME = 'ContactpersoonAfzender';
    public const STREET = 'StraatAfzender';
    public const HOUSE_NUMBER = 'NummerAfzender';
    public const HOUSE_NUMBER_ADDITION = 'ToevoegingAfzender';
    public const POSTAL_CODE = 'PostcodeAfzender';
    public const CITY = 'PlaatsAfzender';
    public const COUNTRY = 'LandAfzender';
    public const EMAIL = 'EmailAfzender';
    public const PHONE_NUMBER = 'TelefoonnummerAfzender';

    /**
     * @return string[]
     */
    public function getRequiredFields(): array
    {
        return [];
    }

    /**
     * @param  string  $name
     *
     * @return $this
     */
    public function name(string $name): Sender
    {
        $this->offsetSet(self::NAME, $name);

        return $this;
    }

    /**
     * @param  string  $contactName
     *
     * @return $this
     */
    public function contactName(string $contactName): Sender
    {
        $this->offsetSet(self::CONTACT_NAME, $contactName);

        return $this;
    }

    /**
     * @param  string  $street
     *
     * @return $this
     */
    public function street(string $street): Sender
    {
        $this->offsetSet(self::STREET, $street);

        return $this;
    }

    /**
     * @param  string  $houseNumber
     *
     * @return $this
     */
    public function houseNumber(string $houseNumber): Sender
    {
        $this->offsetSet(self::HOUSE_NUMBER, $houseNumber);

        return $this;
    }

    /**
     * @param  string  $houseNumberAddition
     *
     * @return $this
     */
    public function houseNumberAddition(string $houseNumberAddition): Sender
    {
        $this->offsetSet(self::HOUSE_NUMBER_ADDITION, $houseNumberAddition);

        return $this;
    }

    /**
     * @param  string  $postalCode
     *
     * @return $this
     */
    public function postalCode(string $postalCode): Sender
    {
        $this->offsetSet(self::POSTAL_CODE, $postalCode);

        return $this;
    }

    /**
     * @param  string  $city
     *
     * @return $this
     */
    public function city(string $city): Sender
    {
        $this->offsetSet(self::CITY, $city);

        return $this;
    }

    /**
     * @param  string  $country
     *
     * @return $this
     */
    public function country(string $country): Sender
    {
        $this->offsetSet(self::COUNTRY, $country);

        return $this;
    }

    /**
     * @param  string  $email
     *
     * @return $this
     */
    public function email(string $email): Sender
    {
        $this->offsetSet(self::EMAIL, $email);

        return $this;
    }

    /**
     * @param  string  $phoneNumber
     *
     * @return $this
     */
    public function phoneNumber(string $phoneNumber): Sender
    {
        $this->offsetSet(self::PHONE_NUMBER, $phoneNumber);

        return $this;
    }

}
