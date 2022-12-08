<?php

namespace WeDesignIt\ParcelPro\Resources\Shipment;

use WeDesignIt\ParcelPro\Resources\Resource;

class Receiver extends Resource
{

    public const NAME = 'Naam';
    public const DIRECTED_TO = 'Tav';
    public const DEPARTMENT = 'Afdeling';
    public const STREET = 'Straat';
    public const HOUSE_NUMBER = 'Nummer';
    public const HOUSE_NUMBER_ADDITION = 'Toevoeging';
    public const POSTAL_CODE = 'Postcode';
    public const CITY = 'Plaats';
    public const COUNTRY = 'Land';
    public const EMAIL = 'Email';
    public const PHONE_NUMBER = 'Telefoonnummer';

    /**
     * @return string[]
     */
    public function getRequiredFields(): array
    {
        return [
            self::NAME, self::STREET, self::HOUSE_NUMBER, self::POSTAL_CODE,
            self::CITY, self::COUNTRY, self::EMAIL,
        ];
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function name(string $name): Receiver
    {
        $this->offsetSet(self::NAME, $name);

        return $this;
    }

    /**
     * @param string $directedTo
     *
     * @return $this
     */
    public function directedTo(string $directedTo): Receiver
    {
        $this->offsetSet(self::DIRECTED_TO, $directedTo);

        return $this;
    }

    /**
     * @param string $department
     *
     * @return $this
     */
    public function department(string $department): Receiver
    {
        $this->offsetSet(self::DEPARTMENT, $department);

        return $this;
    }

    /**
     * @param string $street
     *
     * @return $this
     */
    public function street(string $street): Receiver
    {
        $this->offsetSet(self::STREET, $street);

        return $this;
    }

    /**
     * @param string $houseNumber
     *
     * @return $this
     */
    public function houseNumber(string $houseNumber): Receiver
    {
        $this->offsetSet(self::HOUSE_NUMBER, $houseNumber);

        return $this;
    }

    /**
     * @param string $houseNumberAddition
     *
     * @return $this
     */
    public function houseNumberAddition(string $houseNumberAddition): Receiver
    {
        $this->offsetSet(self::HOUSE_NUMBER_ADDITION, $houseNumberAddition);

        return $this;
    }

    /**
     * @param string $postalCode
     *
     * @return $this
     */
    public function postalCode(string $postalCode): Receiver
    {
        $this->offsetSet(self::POSTAL_CODE, $postalCode);

        return $this;
    }

    /**
     * @param string $city
     *
     * @return $this
     */
    public function city(string $city): Receiver
    {
        $this->offsetSet(self::CITY, $city);

        return $this;
    }

    /**
     * @param string $country
     *
     * @return $this
     */
    public function country(string $country): Receiver
    {
        $this->offsetSet(self::COUNTRY, $country);

        return $this;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function email(string $email): Receiver
    {
        $this->offsetSet(self::EMAIL, $email);

        return $this;
    }

    /**
     * @param string $phoneNumber
     *
     * @return $this
     */
    public function phoneNumber(string $phoneNumber): Receiver
    {
        $this->offsetSet(self::PHONE_NUMBER, $phoneNumber);

        return $this;
    }

}
