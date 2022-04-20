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
use Gregwar\Image\Image;
use Gregwar\Image\GarbageCollect;
use Gilbitron\Util\SimpleCache;

class App
{
    // Errors
    public $errors = array();

    // Langue
    public $langue = "ro";

    public function __construct()
    {
        $this->cache = new SimpleCache();
        $this->cache->cache_path = Flight::get('flight.cache.path');
        $this->cache->cache_time = (Flight::get('debug') == true)? 0 : Flight::get('cache.time');
        if (!file_exists( Flight::get('flight.cache.path') )) {
            mkdir( Flight::get('flight.cache.path') , 0777, true);
        }
		
		#Clear Images Cache
		$images_cache = (Flight::get('debug') == true)? 0 : Flight::get('images.cache.time');
		GarbageCollect::dropOldFiles(Flight::get('images.cache.path'), $images_cache, false);
    } 

    // Check Cache
	public function checkCache($id, $format = true) {
		$data = $this->cache->get_cache($id);
		$data = ($format == true)?unserialize($data):$data;
		return $data;
	}

	// Set New Cache
	public function setCache($id, $data, $format = true) {
		$data = ($format == true)?serialize($data):$data;
		$this->cache->set_cache($id, $data);
	}

	// Clean Cache
	public function cleanCache() {
		@array_map('unlink', glob(Flight::get('flight.cache.path')."*.*"));
	}

	#Make Date
	public function makeDate($date, $lang) {
		switch ($lang) {
		    case 'ro':
		        setlocale(LC_TIME, 'ro_RO.UTF-8');
		        $new_date = strftime("%e %B %G", strtotime($date) );
		        break;
			case 'en':
				setlocale(LC_TIME, 'en_CA.UTF-8');
				$new_date = strftime("%B %e, %G", strtotime($date) );
				break;
		    case 'ru':
		        setlocale(LC_TIME, 'ru_RU.UTF-8');
		        $new_date =  strftime("%e %B %G", strtotime($date) );
		        break;
		}
		return $new_date;
	}

	#Get Locales from API
	public function getLocales($lang) {
		#Languages
		$langues = array();

		#Collection Name
		$collection = "locales";
		
		#Cache File Name
		$cache_file = $collection."_".$lang;

		#Fields
		$fields = "id, value_{$lang}";

		#Check cache and Request from API
        if($data = $this->checkCache($cache_file)){
			$results = $data;
		} else {
			$results = Flight::api()->items($collection)->_fields($fields)->all()->get();
			if(Flight::api()->isError($results)) {
				$this->errors[] = array_merge(array("module"=>$collection), (array)$results->error);
			}
			else {
				$results = $results->data;
				$this->setCache($cache_file, $results);
			}
		}

		#Foreach Data
		foreach($results as $row) {
			$langues[$row->id] = $row->{'value_'.$lang};
		}

		Flight::set('locales', $langues);

        return $langues;
    }

	#Get Image from API
	public function getImage($id, $params = false) {
		
		if($data = $this->cache->get_cache('file_'.$id)){
			$image_data = unserialize($data);
		} else {
			$image_data = Flight::api()->file($id)->get();
			$this->cache->set_cache('file_'.$id, serialize($image_data));
		}
		
		if($data = $this->cache->get_cache('asset_'.$id)){
			$asset_data = unserialize($data);
		} else {
			$asset_data = Flight::api()->asset($image_data->data->private_hash)->get();
			$this->cache->set_cache('asset_'.$id, serialize($asset_data));
		}

		if( isset($params['svg']) ){
			$generate_file = file_put_contents(Flight::get('svg.cache.path').$id.'.svg', $asset_data->data);
			$data = '/public/cache/svg/'.$id.'.svg';
		}
		elseif(is_int($params['width']) && is_int($params['height']) && isset($params['jpeg'])  ) {
			$data = Image::fromData($asset_data->data)->zoomCrop($params['width'], $params['height'])->jpeg($quality = 90);
		}
		elseif(is_int($params['width']) && is_int($params['height']) && isset($params['png'])  ) {
			$data = Image::fromData($asset_data->data)->zoomCrop($params['width'], $params['height'])->png($quality = 90);
		}
		elseif(is_int($params['width']) && is_int($params['height'])) {
			$data = Image::fromData($asset_data->data)->zoomCrop($params['width'], $params['height'])->webp($quality = 90);
		}
		else {
			$data = Image::fromData($asset_data->data)->webp($quality = 90);
		}
		
		return $data;
    }

	

	

}