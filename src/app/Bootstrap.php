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
		$auth = Zend_Auth::getInstance();
		$auth->setStorage(new Zend_Auth_Storage_Session('login'));
	}
	
	/**
	 * Inits the placeholders
	 */
	protected function _initPlaceholders() {
		$this->bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype('HTML5');
		$view->headTitle('REEF')->setSeparator(' :: ');
		$view->headLink()->prependStylesheet('/bootstrap/css/bootstrap-responsive.css');
		$view->headLink()->prependStylesheet('/bootstrap/css/bootstrap.css');
		$view->headScript()->appendFile('/bootstrap/js/bootstrap.js');
		$view->headScript()->appendFile('/bootstrap/js/jquery.js');
	}
}