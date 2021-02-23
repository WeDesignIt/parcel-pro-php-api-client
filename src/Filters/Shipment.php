<?php

namespace WeDesignIt\ParcelPro\Filters;

use DateTime;

class Shipment implements \ArrayAccess
{

    public const SHIPMENT_ID = 'ZendingId';
    public const ORDERNUMBER = 'OrderNr';
    public const REFERENCE = 'Referentie';
    public const FROM_DATETIME = 'MinDatetime';
    public const TO_DATETIME = 'MaxDatetime';
    public const STATUS = 'Status';
    // todo status? Or error in docs?
    public const ORDER = 'Status';
    public const LIMIT = 'Limit';

    public const STATUS_PRINTED = 'Afgedrukt';
    public const STATUS_IN_PROCESS = 'InProcess';
    public const STATUS_DELIVERED = 'Afgeleverd';

    // todo under status parameter..? Or error in docs?
    public const ORDER_ASC = 'asc';
    public const ORDER_DESC = 'desc';


    /**
     * @var array
     */
    protected $filters = [];

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    /**
     * Fluent setter
     *
     * @param  int  $id
     *
     * @return $this
     */
    public function shipmentId(int $id): Shipment
    {
        $this->offsetSet(self::SHIPMENT_ID, $id);

        return $this;
    }

    /**
     * Fluent setter
     *
     * @param  string  $orderNumber
     *
     * @return $this
     */
    public function orderNumber(string $orderNumber): Shipment
    {
        $this->offsetSet(self::ORDERNUMBER, $orderNumber);

        return $this;
    }

    /**
     * Fluent setter
     *
     * @param  string  $reference
     *
     * @return $this
     */
    public function reference(string $reference): Shipment
    {
        $this->offsetSet(self::REFERENCE, $reference);

        return $this;
    }

    /**
     * Fluent setter
     *
     * @param  DateTime  $from
     *
     * @return $this
     */
    public function since(DateTime $from): Shipment
    {
        return $this->from($from);
    }

    /**
     * Fluent setter
     *
     * @param  DateTime  $from
     *
     * @return $this
     */
    public function from(DateTime $from): Shipment
    {
        $this->offsetSet(self::FROM_DATETIME, $from->format('Y-m-d H:i:s'));

        return $this;
    }

    /**
     * Fluent setter
     *
     * @param  DateTime  $to
     *
     * @return $this
     */
    public function to(DateTime $to): Shipment
    {
        $this->offsetSet(self::TO_DATETIME, $to->format('Y-m-d H:i:s'));

        return $this;
    }

    /**
     * Fluent setter
     *
     * @param  string  $status
     *
     * @return $this
     */
    public function status(string $status): Shipment
    {
        $this->offsetSet(self::STATUS, $status);

        return $this;
    }

    /**
     * Fluent setter
     *
     * @param  int  $limit
     *
     * @return $this
     */
    public function limit(int $limit): Shipment
    {
        $limit = min($limit, 50);

        $this->offsetSet(self::LIMIT, $limit);

        return $this;
    }

    /**
     * Fluent setter
     *
     * @param  string  $order
     *
     * @return $this
     */
    public function order(string $order): Shipment
    {
        $this->offsetSet(self::ORDER, $order);

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->filters;
    }

    /**
     * @param  mixed  $offset
     *
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->filters);
    }

    /**
     * @param  mixed  $offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->filters[$offset] ?? null;
    }

    /**
     * @param  mixed  $offset
     * @param  mixed  $value
     */
    public function offsetSet($offset, $value)
    {
        $this->filters[$offset] = $value;
    }

    /**
     * @param  string  $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->filters[$offset]);
    }
}
