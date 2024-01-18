<?php
namespace Core;

class FlashMessage
{
    public static function add(string $key, string $message): void
    {
        $_SESSION['flash_message'][$key] = $message;
    }

    public static function get(string $key): string
    {
        if(self::has($key)) {
            $message = $_SESSION['flash_message'][$key];
            unset($_SESSION['flash_message'][$key]);
            return $message;
        }
        return '';
    }

    public static function has(string $key): bool
    {
        return isset($_SESSION['flash_message'][$key]);
    }
}