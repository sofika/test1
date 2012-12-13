<?php
class Reef_Controller_Action extends Zend_Controller_Action {

	public function preDispatch() {

	}
	
	/**
	 * 
	 * @param unknown_type $type
	 */
	protected function getCacheManager($type) {
		return $this->getFrontController()
		->getParam('bootstrap')
		->getResource('cachemanager')
		->getCacheManager()
		->getCache($type);
	}
}