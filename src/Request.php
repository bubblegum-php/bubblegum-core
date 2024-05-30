<?php

namespace Bubblegum;

class Request
{
    public function __construct(private array $data)
    { }

    public function all() {
        return $this->data;
    }
}