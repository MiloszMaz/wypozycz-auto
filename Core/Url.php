<?php

namespace Core;

class Url
{
    private static function getPath(): string
    {
        $pathUrl = $_SERVER['SCRIPT_NAME'];
        $pathUrl = str_replace('/index.php', '', $pathUrl);

        return $pathUrl;
    }
    public static function to(string $route, array $params = []): string
    {
        if($params) {
            $url = http_build_query($params);
            $route .= '?' . $url;
        }

        return sprintf('%s%s', self::getPath(), $route);
    }
}