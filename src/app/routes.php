<?php
/**
 * Nikba - A PHP Framework For Directus API
 *
 * @package  Nikba
 * @author   Bargan Nicolai <office@nikba.com>
 */

#Setup possible languages
Flight::set('possible_languages', array('ro', 'ru', 'en'));

#Set default language if not present in url
Flight::set('language', 'ro');

#Setup route to check the language
Flight::route('(/@lang:[a-z]{2})(/*)', function($language) {
    #Check if valid language
    if (in_array($language, Flight::get('possible_languages'))) {
        #Set language
        Flight::set('language', $language);
        #Continue to next route
        return true;
    }
    else {
        Flight::set('language', 'ro');
        return true;
    }
});

#Home
Flight::route('(/[a-z]{2})/', array( new Controllers\Home, 'index' ) );

#404
Flight::map('notFound', array( new Controllers\PageNotFound, 'index' ) );


#Error
Flight::map("error", function(Throwable $ex){ 
    Flight::logger()->error($ex);
    echo "<pre>{$ex}</pre>";
});
