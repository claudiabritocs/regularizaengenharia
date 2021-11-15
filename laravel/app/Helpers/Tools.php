<?php

namespace App\Helpers;

class Tools
{
    public static function routeIs($routeNames)
    {
        foreach ((array) $routeNames as $routeName) {
            if (str_is($routeName, \Route::currentRouteName())) {
                return true;
            }
        }

        return false;
    }

    public static function fileUpload($input, $path = 'arquivos/')
    {
        if (! $file = request()->file($input)) {
            throw new \Exception("O campo (${input}) não contém nenhum arquivo.", 1);
        }

        $fileName  = str_slug(
            pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
        );
        $fileName .= '_'.date('YmdHis');
        $fileName .= str_random(10);
        $fileName .= '.'.$file->getClientOriginalExtension();

        $file->move(public_path($path), $fileName);

        return $fileName;
    }

    public static function parseLink($url)
    {
        return parse_url($url, PHP_URL_SCHEME) === null ? 'http://'.$url : $url;
    }
}
