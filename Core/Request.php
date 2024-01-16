<?php

namespace Core;

class Request
{
    public function get(string $variableName)
    {
        return $_REQUEST[$variableName] ?? '';
    }
}