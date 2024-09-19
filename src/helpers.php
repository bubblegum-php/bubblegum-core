<?php

if (!function_exists('dd')) {
    /**
     * Dump and die
     * @param mixed ...$values
     * @return void
     */
    function dd(mixed ...$values): void
    {
        var_dump(...$values);
        die();
    }
}