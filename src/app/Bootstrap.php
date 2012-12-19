<?php
/**
 * REEF CRM
 *
 * Bootstraps the application
 *
 * LICENSE
 *
 * This file is a component of the REEF CRM platform. It is only allowed
 * to use for the REEF project and can be copied for other projects
 * except for the project REEF.
 *
 * @category   Bootstrap
 * @package    Bootstrap
 * @copyright  Copyright (c) 2012 REEF Project (gigaset.de)
 * @author	   Andrej Filipenko <af@meets-ecommerce.de>
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
	
	/**
	 * Constructor
	 * 
	 * @param Zend_Application $application
	 */
	public function __construct($application) {
		parent::__construct($application);
	}
	
	/**
	 * Initiates the structure of the module build
	 */
	public function _initStructure(){
		$cacheKey   = 'config_structure';
		$autoloader = Zend_Loader_Autoloader::getInstance();
		$iterator   = new DirectoryIterator(APPLICATION_PATH . '/code');
		if(($resourceTypes = Reef_Cache::getMemcache()->load($cacheKey)) == null){
			$resourceTypes = array();
			foreach($iterator as $file){
				if($file->isDir() && $file->getFilename() !== '.' && $file->getFilename() !== '..'){
					$namespace = ucfirst($file->getFilename());
					$resourceTypes[] = array(
							'basePath'	=> APPLICATION_PATH . '/code/' . $file->getFilename(),
							'namespace'	=> (($file->getFilename() == "default") ? '' : $namespace),
							'resourceTypes'	=> array(
									'model' => array(
											'path'		=> 'models/',
											'namespace'	=> 'Model'
									)
							)
					);
				}
			}
			Reef_Cache::getMemcache()->save($resourceTypes, $cacheKey);
		}
		foreach($resourceTypes as $type){
			new Zend_Loader_Autoloader_Resource($type);
		}
	}
	
}