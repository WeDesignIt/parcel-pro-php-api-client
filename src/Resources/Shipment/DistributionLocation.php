<?php

namespace WeDesignIt\ParcelPro\Resources\Shipment;

use WeDesignIt\ParcelPro\Resources\Resource;

class DistributionLocation extends Resource
{

    public const ID = 'ProductCodeUitreiklocatie';
    public const TYPE = 'LocationTypeUitreiklocatie';
    public const NAME = 'NameUitreiklocatie';
    public const STREET = 'StreetUitreiklocatie';
    public const HOUSE_NUMBER = 'HousenumberUitreiklocatie';
    public const HOUSE_NUMBER_ADDITION = 'HousenumberAdditionalUitreiklocatie';
    public const POSTAL_CODE_DIGITS = 'PostalcodeNumericUitreiklocatie';
    public const POSTAL_CODE_LETTERS = 'PostalcodeAlphaUitreiklocatie';
    public const CITY = 'CityUitreiklocatie';

    /**
     * @return string[]
     */
    public function getRequiredFields(): array
    {
        return [];
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function id(string $id): DistributionLocation
    {
        $this->offsetSet(self::ID, $id);

        return $this;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function type(string $type): DistributionLocation
    {
        $this->offsetSet(self::TYPE, $type);

        return $this;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function name(string $name): DistributionLocation
    {
        $this->offsetSet(self::NAME, $name);

        return $this;
    }

    /**
     * @param string $street
     *
     * @return $this
     */
    public function street(string $street): DistributionLocation
    {
        $this->offsetSet(self::STREET, $street);

        return $this;
    }

    /**
     * @param string $houseNumber
     *
     * @return $this
     */
    public function houseNumber(string $houseNumber): DistributionLocation
    {
        $this->offsetSet(self::HOUSE_NUMBER, $houseNumber);

        return $this;
    }

    /**
     * @param string $houseNumberAddition
     *
     * @return $this
     */
    public function houseNumberAddition(string $houseNumberAddition): DistributionLocation
    {
        $this->offsetSet(self::HOUSE_NUMBER_ADDITION, $houseNumberAddition);

        return $this;
    }

    /**
     * @param int $postalCodeDigits
     *
     * @return $this
     */
    public function postalCodeDigits(int $postalCodeDigits): DistributionLocation
    {
        $this->offsetSet(self::POSTAL_CODE_DIGITS, $postalCodeDigits);

        return $this;
    }

    /**
     * @param int $postalCodeLetters
     *
     * @return $this
     */
    public function postalCodeLetters(int $postalCodeLetters): DistributionLocation
    {
        $this->offsetSet(self::POSTAL_CODE_LETTERS, $postalCodeLetters);

        return $this;
    }

    /**
     * @param string $city
     *
     * @return $this
     */
    public function city(string $city): DistributionLocation
    {
        $this->offsetSet(self::CITY, $city);

        return $this;
    }
}
