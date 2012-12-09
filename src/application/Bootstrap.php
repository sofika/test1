<?php
/**
 * @author afilipenko
 * @see Zend_Application_Bootstrap_Bootstrap
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
	
	/**
	 * 
	 * @param Zend_Application $application
	 */
	public function __construct($application) {
		parent::__construct($application);
		$auth = Zend_Auth::getInstance();
		$auth->setStorage(new Zend_Auth_Storage_Session('login'));
	}
	
	/**
	 * 
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