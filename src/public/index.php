<?php
/**
 * Nikba - A PHP Framework For Directus API
 *
 * @package  Nikba
 * @author   Bargan Nicolai <office@nikba.com>
 */
use C14r\Directus\API;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

#Define Charset
header('Content-Type: text/html; charset=utf-8');

#Define TimeZone
date_default_timezone_set('Europe/Bucharest');

#Define Security
define( '_NIKBA', 1 );

#Define Root Dir
$root = (!isset($_SERVER["DOCUMENT_ROOT"])) ? $_SERVER["DOCUMENT_ROOT"] = substr($_SERVER['SCRIPT_FILENAME'] , 0 , -strlen($_SERVER['PHP_SELF'])."/" ) : $_SERVER["DOCUMENT_ROOT"]."/";
@define('ROOT', $root);

#Load Composer Vendors
require ROOT.'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(ROOT);
$dotenv->load();

#Load Config
require_once (ROOT.'/app/config.php');

#Setup Flight Vars
foreach (FLIGHT_SET_VARS as $key => $value) {
    Flight::set($key, $value);
}

#Register Logger in Flight as Class
Flight::register(
                    'logger', 
                    '\Monolog\Logger', 
                    array( APP_NAME ) 
                );

function create_log_handlers() {
    return [
        new StreamHandler(Flight::get('logger.path'), Logger::DEBUG),
        new FirePHPHandler(),
    ];
}

foreach (create_log_handlers() as $logHandler) {
    Flight::logger()->pushHandler($logHandler);
}

#Register Directus in Flight as Class
Flight::register(
                    'api', 
                    'C14r\Directus\API', 
                    array(
                        Flight::get('directus.url'), 
                        Flight::get('directus.project')
                    ), 
                    function($api) {
                        $api->token(Flight::get('directus.token'));
                    }
                );


#Register Twig in Flight as Class
$loader = new \Twig\Loader\FilesystemLoader(Flight::get('flight.views.path'));

#Register patch for Assets
$loader->addPath(ROOT . 'public/assets/', 'assets');
Flight::register(
                    'view', 
                    '\Twig\Environment', 
                    array(
                        $loader,
                        TWIG_CONFIG
                        ),
                        function($twig) {
                            #Add the debug extension
                            if (DEBUG) {
                                $twig->addExtension(new \Twig\Extension\DebugExtension());
                            }
                        }
                );

#Map the call for ease of use.
Flight::map('render', function($template, $data){
	echo Flight::view()->render($template, $data);
});


#Load Routes
require_once (ROOT.'/app/routes.php');

#Start Routes
Flight::start();