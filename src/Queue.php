<?php

/**
 *Queue
 *
 * A first-in first-out data structure
 */
 class Queue {

    protected $items = [];

    public function push($item) {
        $this->items[] = $item;
    }

    public function pop() {
        return array_shift($this->items);
    }

    public function getCount() {
        return count($this->items);
    }
 }