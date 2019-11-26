<?php

namespace App\Support;

use IteratorAggregate;
use ArrayIterator;

class Collection implements IteratorAggregate, \JsonSerializable
{
    private $_items = [];

    public function __construct(array $items = [])
    {
        $this->_items = $items;
    }

    public function get()
    {
        return $this->_items;
    }

    public function count()
    {
        return count($this->_items);
    }

    public function merge(Collection $collection)
    {
        return $this->add($collection->get());
    }

    public function add(array $items)
    {
        $this->_items = array_merge($this->_items, $items);
    }

    public function getIterator()
    {
        // Implement getIterator() method.
        return new ArrayIterator($this->_items);
    }

    public function toJson()
    {
        return json_encode($this->get());
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        // Implement jsonSerialize() method.
        return $this->_items;
    }
}