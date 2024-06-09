<?php

namespace Bubblegum;

class Request
{
    public function __construct()
    { }

    public function all() {
        return self::getRequestData();
    }

    protected static function getRequestData(): array
    {
        return $_REQUEST;
    }
}