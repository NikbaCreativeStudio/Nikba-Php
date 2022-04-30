<?php
/**
 * Nikba - A PHP Framework For Directus API
 *
 * @package  Nikba
 * @author   Bargan Nicolai <office@nikba.com>
 */

#APP Config
define("APP_NAME", "nikba_app");
define("DEBUG", true);

define("FLIGHT_SET_VARS", [
    'flight.views.path'     =>  ROOT . 'resources/views/',
    'flight.assets.path'    =>  ROOT . 'public/assets/',
    'logger.path'           =>  ROOT . 'var/logs/application.log', 
    'flight.cache.path'     =>  ROOT . 'var/cache/static/',
    'images.cache.path'     =>  ROOT . 'public/cache/images/',
    'svg.cache.path'        =>  ROOT . 'public/cache/svg/',
    'flight.log_errors'     =>  true,
    'debug'                 =>  DEBUG,
    'cache.time'            =>  31556926, //1 year (365.24 days)
    'images.cache.time'     =>  365, // 1 year
    
    #Directus Data
    'directus.url'          =>  $_ENV['PROJECT_URL'],
    'directus.project'      =>  $_ENV['PROJECT_ID'],
    'directus.token'        =>  $_ENV['PROJECT_TOKEN'],
]);

define("TWIG_CONFIG", [
    'cache'    => ROOT . '/var/cache/twig/',
    "debug" => DEBUG,
]);