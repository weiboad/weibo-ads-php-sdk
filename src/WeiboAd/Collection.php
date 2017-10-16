<?php

namespace WeiboAd;


class Collection implements \ArrayAccess, \Countable, \IteratorAggregate
{
    protected $items = [];

    public function __construct($items = []) {
        $this->items = $this->convertToArray($items);
    }

    public function offsetExists($offset) {
        return array_key_exists($offset, $this->items);
    }

    public function offsetGet($offset) {
        return $this->items[$offset];
    }

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetUnset($offset) {
        unset($this->items[$offset]);
    }

    public function count() {
        return count($this->items);
    }

    public function getIterator() {
        return new \ArrayIterator($this->items);
    }

    protected function convertToArray($items) {
        if ($items instanceof self) {
            return $items->all();
        }
        return (array) $items;
    }
}