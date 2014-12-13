<?php

namespace PivotalTracker;

/**
* App
*/
final class App
{
    static protected $_token = null;

    static protected $_api = null;



    private function __construct()
    {
    }



    public static function init($token = null)
    {
        if ($token == static::token() && static::$_api) {
            return;
        }

        static::token($token);
    }



    public static function token($token = null)
    {
        static::$_token = $token;
        if (!static::$_api) {
            static::$_api = new Api(static::$_token);
        } else {
            static::$_api->setToken(static::$_token);
        }

        return static::$_token;
    }



    public static function api()
    {
        if (!static::$_api) {
            static::init();
        }
        return static::$_api;
    }
}
