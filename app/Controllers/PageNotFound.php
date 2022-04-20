<?php
/**
 * Nikba - A PHP Framework For Directus API
 *
 * @package  Nikba
 * @author   Bargan Nicolai <office@nikba.com>
 */

namespace Controllers;

use Flight;
use Flight\template\View;
use Gilbitron\Util\SimpleCache;

class PageNotFound extends App
{
    #Render Data
    public function index() {		
        #Set Default Language
        $this->langue = Flight::get('language');
        $page = "404";
        #Render
        Flight::view()->display("404.twig", [
			"locales"   => $this->getLocales($this->langue),
			"langue"    => $this->langue,
            "url"       => "/404/",
			"errors"    => $this->errors,
        ]);
    }
    
}
