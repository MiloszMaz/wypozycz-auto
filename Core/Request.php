<?php

namespace Core;

class Request
{
    public static function get(string $variableName)
    {
        if(isset($_REQUEST[$variableName])) {
            return $_REQUEST[$variableName];
        }

        return '';
    }
}