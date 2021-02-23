<?php

namespace WeDesignIt\ParcelPro\Resources;

use WeDesignIt\ParcelPro\Interfaces\Arrayable;
use WeDesignIt\ParcelPro\Interfaces\HasRequiredFields;

class Resource implements \ArrayAccess, Arrayable, HasRequiredFields
{

    protected $data = [];

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * For fluent constructing.
     *
     * @param  array  $data
     *
     * @return static
     */
    public static function create($data = [])
    {
        return new static($data);
    }

    /**
     * @return array
     */
    public function getRequiredFields()
    {
        return [];
    }

    /**
     * @return bool
     */
    public function containsAllRequiredFields(): bool
    {
        foreach ($this->getRequiredFields() as $requiredField) {
            if ( ! array_key_exists($requiredField, $this->data)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * @param  mixed  $offset
     *
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->data);
    }

    /**
     * @param  mixed  $offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->data[$offset] ?? null;
    }

    /**
     * @param  string  $offset
     * @param  mixed  $value
     */
    public function offsetSet($offset, $value): void
    {
        $this->data[$offset] = $value;
    }

    /**
     * @param  mixed  $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }
}
