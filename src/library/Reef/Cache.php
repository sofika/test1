<?php
/**
 * REEF CRM
 *
 * Extends the standard model behavior of Zend
 *
 * LICENSE
 *
 * This file is a component of the REEF CRM platform. It is only allowed
 * to use for the REEF project and can be copied for other projects
 * except for the project REEF.
 *
 * @category   Reef
 * @package    Reef_Auth_Adapter_Db
 * @copyright  Copyright (c) 2012 REEF Project (gigaset.de)
 * @author	   Andrej Filipenko <af@meets-ecommerce.de>
 */
class Reef_Cache {
	
	private static $_cache;
	
	/**
	 * Returns the factored cache
	 * 
	 * @return Zend_Cache
	 */
	public static function getMemcache(){
		if(self::$_cache !== null) return self::$_cache;
		$frontend = array(
			'caching'		=> true,
			'lifetime'		=> 1800,
			'automatic_serialization' => true		
		);
		$backend = array(
			'servers' =>array(
				array(
					'host'   => '127.0.0.1',
					'port'   => 11211,
					'weight' => 1
				)
			),
			'compression' => false
		);
		return Zend_Cache::factory('Core', 'Memcached', $frontend, $backend);
	}
}