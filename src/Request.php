<?php

namespace Bubblegum;

class Request
{
    protected array $rowData = [];
    public function __construct()
    {
        if ($_SERVER['CONTENT_TYPE'] === 'application/json') {
            $this->rowData = json_decode(file_get_contents('php://input'), true);
        }
    }

    public function all() {
        return static::requestData() + $this->rowData;
    }

    public function rawData(): array
    {
        return $this->rowData;
    }

    public static function requestData(): array
    {
        return $_REQUEST;
    }

    public static function cookies(): array
    {
        return $_COOKIE;
    }

    public static function getData(): array
    {
        return $_GET;
    }

    public static function postData(): array
    {
        return $_POST;
    }
}