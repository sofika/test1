<?php
/**
 * Controlls and map api requests
 * 
 * @author afilipenko
 *
 */
class ApiController extends Zend_Controller_Action {
	
	/**
	 * (non-PHPdoc)
	 * @see Zend_Controller_Action::init()
	 */
	public function init() {
		// display layout and view rendering
		$this->_helper->layout->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
	}
	
	public function serverAction() {
		$server = new Zend_Rest_Server();
		$server->setClass('Reef_Api_User');
		$server->handle();
	}
	
	public function testAction() {
		$client = new Zend_Rest_Client('http://reef.local/api/server');
		echo $client->sayHello('sgsdds')->get();
		pre($client);
	}
}