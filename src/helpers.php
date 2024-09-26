<?php

if (!function_exists('dd')) {
    /**
     * Dump and die
     * @param mixed ...$values
     * @return void
     */
    function dd(mixed ...$values): void
    {
        header('Content-Type: application/json');
        echo json_encode($values,JSON_UNESCAPED_UNICODE);
        die();
    }
}