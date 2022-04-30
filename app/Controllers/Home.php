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

class Home extends App
{
    #Render Data
    public function index() {	
        
        #Set Default Language
        $this->langue = Flight::get('language');

        #Render
        Flight::view()->display("index.twig", [
			"locales"   => $this->getLocales($this->langue),
			"langue"    => $this->langue,
            "url"       => "/",
			"errors"    => $this->errors,
        ]);
    }
    
}
