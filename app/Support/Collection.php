<?php

namespace App\Support;

use IteratorAggregate;
use ArrayIterator;

class Collection implements IteratorAggregate
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
}