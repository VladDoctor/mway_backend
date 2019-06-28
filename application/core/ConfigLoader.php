<?php

namespace application\core;

interface ConfigLoaderInt
{
    public static function infoConfig();
    public static function dbConfig();                                    //Interface for read config.ini
    public static function apiConfig();
}

final class ConfigLoader implements ConfigLoaderInt
{
    public static $configPath = 'config.ini';

    public static function infoConfig()
    {
        return parse_ini_file(ConfigLoader::$configPath, true)['info-config'];
    }

    public static function dbConfig()
    {
        return parse_ini_file(ConfigLoader::$configPath, true)['db-config'];
    }

    public static function apiConfig()
    {
        return parse_ini_file(ConfigLoader::$configPath, true)['api-config'];
    }
}

?>