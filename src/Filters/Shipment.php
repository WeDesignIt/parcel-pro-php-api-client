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
    protected array $filters = [];

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    /**
     * Fluent setter
     *
     * @param int $id
     *
     * @return self
     */
    public function shipmentId(int $id): self
    {
        $this->offsetSet(self::SHIPMENT_ID, $id);

        return $this;
    }

    /**
     * Fluent setter
     *
     * @param string $orderNumber
     *
     * @return self
     */
    public function orderNumber(string $orderNumber): self
    {
        $this->offsetSet(self::ORDERNUMBER, $orderNumber);

        return $this;
    }

    /**
     * Fluent setter
     *
     * @param string $reference
     *
     * @return self
     */
    public function reference(string $reference): self
    {
        $this->offsetSet(self::REFERENCE, $reference);

        return $this;
    }

    /**
     * Fluent setter
     *
     * @param DateTime $from
     *
     * @return self
     */
    public function since(DateTime $from): self
    {
        return $this->from($from);
    }

    /**
     * Fluent setter
     *
     * @param DateTime $from
     *
     * @return self
     */
    public function from(DateTime $from): self
    {
        $this->offsetSet(self::FROM_DATETIME, $from->format('Y-m-d H:i:s'));

        return $this;
    }

    /**
     * Fluent setter
     *
     * @param DateTime $to
     *
     * @return self
     */
    public function to(DateTime $to): self
    {
        $this->offsetSet(self::TO_DATETIME, $to->format('Y-m-d H:i:s'));

        return $this;
    }

    /**
     * Fluent setter
     *
     * @param string $status
     *
     * @return self
     */
    public function status(string $status): self
    {
        $this->offsetSet(self::STATUS, $status);

        return $this;
    }

    /**
     * Fluent setter
     *
     * @param int $limit
     *
     * @return self
     */
    public function limit(int $limit): self
    {
        $limit = min($limit, 50);

        $this->offsetSet(self::LIMIT, $limit);

        return $this;
    }

    /**
     * Fluent setter
     *
     * @param string $order
     *
     * @return self
     */
    public function order(string $order): self
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
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($offset, $this->filters);
    }

    /**
     * @param mixed $offset
     *
     * @return mixed|null
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->filters[$offset] ?? null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->filters[$offset] = $value;
    }

    /**
     * @param string $offset
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->filters[$offset]);
    }
}
