<?php
/**
 * REEF CRM
*
* This class manages error handling
*
* LICENSE
*
* This file is a component of the REEF CRM platform. It is only allowed
* to use for the REEF project and can not be copied for other projects
* except for the project REEF.
*
* @category   Ref
* @package    Rest_Controller
* @copyright  Copyright (c) 2012 REEF Project (gigaset.de)
* @author	  Andrej Filipenko <af@meets-ecommerce.de>
*/
class Reef_Rest_Controller_Abstract extends Zend_Rest_Controller{

	
	/**
	 * (non-PHPdoc)
	 * @see Zend_Controller_Action::preDispatch()
	 */
	public function preDispatch(){
		$this->_initFormat();
		$contextSwitch = $this->_getHelper()->getHelper('contextSwitch');
		$contextSwitch
			->addActionContext('index', array('json'))
			->addActionContext('put', array('json'))
			->addActionContext('post', array('json'))
			->addActionContext('delete', array('json'))
			->addActionContext('get', array('json'))
			->addActionContext('index', array('json'))
			->initContext();
		$this->_getHelper()->viewRenderer->setNoRender(true);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Zend_Controller_Action::init()
	 */
	public function init(){
		
	}
	
	/**
	 * Initiates the format
	 * 
	 */
	protected function _initFormat(){
		$this->getRequest()->setParam('format', 'json');
	}
	
	/**
	 * Returns the standard view
	 * 
	 * @return Zend_View
	 */
	protected function _getView(){
		return $this->view;
	}
	
	/**
	 * Returns a action broker
	 * 
	 * @return Zend_Controller_Action_HelperBroker
	 */
	protected function _getHelper(){
		return $this->_helper;
	}
	
	/**
	 * This method returns the rest requested parameters +
	 * the filtering of the data to prevent hacking, xss etc.
	 * 
	 * @param string $paramName
	 * @param mixed  $default
	 * @return mixed 
	 */
	protected function _getParam($paramName, $default=null){
		return parent::_getParam($paramName, $default);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Zend_Rest_Controller::indexAction()
	 */
	public function indexAction(){
		$this->_forward('get');
		$this->getResponse()
			 ->setHttpResponseCode(403);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Zend_Rest_Controller::getAction()
	 */
	public function getAction(){
		$this->getResponse()
			 ->setHttpResponseCode(403);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Zend_Rest_Controller::headAction()
	 */
	public function headAction(){
		$this->getResponse()
			 ->setHttpResponseCode(403);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Zend_Rest_Controller::putAction()
	 */
	public function putAction(){
		$this->getResponse()
			 ->setHttpResponseCode(403);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Zend_Rest_Controller::deleteAction()
	 */
	public function deleteAction(){
		$this->getResponse()
			 ->setHttpResponseCode(403);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Zend_Rest_Controller::postAction()
	 */
	public function postAction(){
		$this->getResponse()
			 ->setHttpResponseCode(403);
	}
	
}