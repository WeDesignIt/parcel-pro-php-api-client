<?php

namespace WeDesignIt\ParcelPro\Resources;

use WeDesignIt\ParcelPro\Resources\Shipment\Receiver;
use WeDesignIt\ParcelPro\Resources\Shipment\Sender;

class Shipment extends Resource
{
    public const CARRIER = 'Carrier';
    public const TYPE = 'Type';
    public const SIGNATURE_ON_DELIVERY = 'HandtekeningBijAflevering';
    public const NO_NEIGHBOR_DELIVERY = 'NietLeverenBijDeBuren';
    public const EVENING_DELIVERY = 'DirecteAvondlevering';
    public const SATURDAY_DELIVERY = 'Zaterdaglevering';
    public const ELEVENHUNDRED_DELIVERY = '1100levering'; // DHL only
    public const HAND_IN_AT_SERVICEPOINT = 'InleverenOpServicepoint'; // DHL only
    public const REMBOURS_COSTS = 'Rembours';
    public const INSURED_AMOUNT = 'VerzekerdBedrag';
    public const LETTERBOX_DELIVERY = 'Brievenbuslevering';
    public const BANK_ACCOUNT_NUMBER = 'Rekeningnummer';
    public const REFERENCE = 'Referentie';
    public const PICKUP_DATETIME = 'PickupTijdstip';

    public const PACKAGE_COUNT = 'AantalPakketten';
    public const WEIGHT = 'Gewicht';
    public const LENGTH = 'Lengte';
    public const WIDTH = 'Breedte';
    public const HEIGHT = 'Hoogte';
    public const REMARK = 'Opmerking';

    /**
     * @return string[]
     */
    public function getRequiredFields(): array
    {
        return [
            self::CARRIER, self::TYPE, self::PACKAGE_COUNT, self::WEIGHT,
            self::REMARK,
        ];
    }

    /**
     * Fluent setter
     *
     * @param string $carrier
     *
     * @return $this
     */
    public function carrier(string $carrier): Shipment
    {
        $this->offsetSet(self::CARRIER, $carrier);

        return $this;
    }

    /**
     * Fluent setter
     *
     * @param string $type
     *
     * @return $this
     */
    public function type(string $type): Shipment
    {
        $this->offsetSet(self::TYPE, $type);

        return $this;
    }

    /**
     * @param bool $signature
     *
     * @return $this
     */
    public function signatureOnDelivery(bool $signature = true): Shipment
    {
        $this->offsetSet(self::SIGNATURE_ON_DELIVERY, $signature);

        return $this;
    }

    /**
     * @return $this
     */
    public function allowNeighborDelivery(): Shipment
    {
        return $this->noNeighborDelivery(false);
    }

    public function noNeighborDelivery(bool $notAllowed = true)
    {
        $this->offsetSet(self::NO_NEIGHBOR_DELIVERY, $notAllowed);

        return $this;
    }

    /**
     * @param bool $eveningDelivery
     *
     * @return $this
     */
    public function eveningDelivery(bool $eveningDelivery = true): Shipment
    {
        $this->offsetSet(self::EVENING_DELIVERY, $eveningDelivery);

        return $this;
    }

    /**
     * @param bool $saturdayDelivery
     *
     * @return $this
     */
    public function saturdayDelivery(bool $saturdayDelivery = true): Shipment
    {
        $this->offsetSet(self::SATURDAY_DELIVERY, $saturdayDelivery);

        return $this;
    }

    /**
     * @param bool $elevenHundredDelivery
     *
     * @return $this
     */
    public function elevenHundredDelivery(bool $elevenHundredDelivery = true): Shipment
    {
        $this->offsetSet(self::ELEVENHUNDRED_DELIVERY, $elevenHundredDelivery);

        return $this;
    }

    /**
     * @param bool $handIn
     *
     * @return $this
     */
    public function handInAtServicePoint(bool $handIn = true): Shipment
    {
        $this->offsetSet(self::HAND_IN_AT_SERVICEPOINT, $handIn);

        return $this;
    }

    /**
     * @param float $amount
     *
     * @return $this
     */
    public function remboursCosts(float $amount): Shipment
    {
        $this->offsetSet(self::REMBOURS_COSTS, $amount);

        return $this;
    }

    /**
     * @param float $amount
     *
     * @return $this
     */
    public function insturedAmount(float $amount): Shipment
    {
        $this->offsetSet(self::INSURED_AMOUNT, $amount);

        return $this;
    }

    /**
     * @param bool $letterboxDelivery
     *
     * @return $this
     */
    public function letterboxDelivery(bool $letterboxDelivery = true): Shipment
    {
        $this->offsetSet(self::LETTERBOX_DELIVERY, $letterboxDelivery);

        return $this;
    }

    /**
     * @param string $bankAccount
     *
     * @return $this
     */
    public function bankAccountNumber(string $bankAccount): Shipment
    {
        $this->offsetSet(self::BANK_ACCOUNT_NUMBER, $bankAccount);

        return $this;
    }

    /**
     * @param string $reference
     *
     * @return $this
     */
    public function reference(string $reference): Shipment
    {
        $this->offsetSet(self::REFERENCE, $reference);

        return $this;
    }

    /**
     * @param \DateTime $moment
     *
     * @return $this
     */
    public function pickupDateTime(\DateTime $moment): Shipment
    {
        $this->offsetSet(self::PICKUP_DATETIME, $moment->format('Y-m-d H:i:s'));

        return $this;
    }

    /**
     * @param Sender $sender
     *
     * @return $this
     */
    public function sender(Sender $sender): Shipment
    {
        $this->data = array_merge_recursive(
            $this->data,
            $sender->toArray()
        );

        return $this;
    }

    /**
     * @param Sender $sender
     *
     * @return $this
     */
    public function distributionLocation(Sender $sender): Shipment
    {
        $this->data = array_merge_recursive(
            $this->data,
            $sender->toArray()
        );

        return $this;
    }

    /**
     * @param Receiver $receiver
     *
     * @return $this
     */
    public function receiver(Receiver $receiver): Shipment
    {
        $this->data = array_merge_recursive(
            $this->data,
            $receiver->toArray()
        );

        return $this;
    }

    /**
     * @param int $packageCount
     *
     * @return $this
     */
    public function packageCount(int $packageCount): Shipment
    {
        $this->offsetSet(self::PACKAGE_COUNT, $packageCount);

        return $this;
    }

    /**
     * @param float $weight
     *
     * @return $this
     */
    public function weight(float $weight): Shipment
    {
        $this->offsetSet(self::WEIGHT, $weight);

        return $this;
    }

    /**
     * @param int $length
     *
     * @return $this
     */
    public function length(int $length): Shipment
    {
        $this->offsetSet(self::LENGTH, $length);

        return $this;
    }

    /**
     * @param int $width
     *
     * @return $this
     */
    public function width(int $width): Shipment
    {
        $this->offsetSet(self::WIDTH, $width);

        return $this;
    }

    /**
     * @param int $height
     *
     * @return $this
     */
    public function height(int $height): Shipment
    {
        $this->offsetSet(self::HEIGHT, $height);

        return $this;
    }

    /**
     * @param int $length
     * @param int $width
     * @param int $height
     *
     * @return $this
     */
    public function dimensions(int $length, int $width, int $height): Shipment
    {
        return $this->length($length)
            ->width($width)
            ->height($height);
    }

    /**
     * @param string $remark
     *
     * @return $this
     */
    public function remark(string $remark): Shipment
    {
        $this->offsetSet(self::REMARK, $remark);

        return $this;
    }

}
