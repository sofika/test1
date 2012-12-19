<?php
class Reef_Controller_Plugin_RestAuth extends Zend_Controller_Plugin_Abstract {
	
	public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request) {
		$userToken = $request->getHeader('user-token');
	}
	
	public function preDispatch(Zend_Controller_Request_Abstract $request) {
		$token = $request->getHeader('user-token');
		if (!$token) {
			#$this->getResponse()->setHttpResponseCode(403)->appendBody("Invalid user token\n");
		}
	}
	
// 	public function preDispatch()
// 	{
// 			$request->setModuleName('default')
// 			->setControllerName('error')
// 			->setActionName('access')
// 			->setDispatched(true);
// 	}
}