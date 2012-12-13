<?php
class Reef_Rest_Controller extends Zend_Rest_Controller {
	
	public function preDispatch() {
		$this->_helper->layout->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
	}
	
	public function indexAction() {}
	public function getAction() {}
	public function postAction() {}
	public function putAction() {}
	public function deleteAction() {}
	public function headAction() {}
	
}