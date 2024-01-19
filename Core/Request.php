<?php

namespace Core;

class Request
{
    public static function get(string $variableName)
    {
        if(isset($_REQUEST[$variableName])) {
            return trim($_REQUEST[$variableName]);
        }

        return '';
    }
}