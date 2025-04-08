<?php

if (!function_exists('locale_route')) {
    function locale_route(string $name, array $params = [], bool $absolute = true): string
    {
        return route($name, array_merge(['locale' => app()->getLocale()], $params), $absolute);
    }
}
