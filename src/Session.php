<?php

namespace Bubblegum;

class Session
{

    public static function write($data): void
    {
        $_SESSION['data'] = $data;
    }

    public static function read(): array
    {
        if (isset($_SESSION['data'])){
            return $_SESSION['data'];
        }
        return [];
    }

    public static function clear(): void
    {
        $_SESSION['data'] = [];
    }
}