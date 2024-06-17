<?php

namespace Bubblegum;

/**
 * Session manager
 */
class Session
{

    /**
     * Write data to the session
     * @param $data
     * @return void
     */
    public static function write($data): void
    {
        $_SESSION['data'] = $data;
    }

    /**
     * Read data from the session
     * @return array
     */
    public static function read(): array
    {
        if (isset($_SESSION['data'])){
            return $_SESSION['data'];
        }
        return [];
    }

    /**
     * Clear data from the session
     * @return void
     */
    public static function clear(): void
    {
        $_SESSION['data'] = [];
    }
}