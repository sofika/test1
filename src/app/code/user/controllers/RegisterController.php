<?php
/**
 * REEF CRM
 *
 * This is rest resource handling the user registration
 *
 * LICENSE
 *
 * This file is a component of the REEF CRM platform. It is only allowed
 * to use for the REEF project and can be copied for other projects
 * except for the project REEF.
 *
 * @category   User
 * @package    Register_Controller
 * @copyright  Copyright (c) 2012 REEF Project (gigaset.de)
 * @author	   Daniel Matuschewsky <dm@meets-ecommerce.de>
 */
class User_RegisterController extends Reef_Rest_Controller_Abstract{
	
	/**
	 * This function initalized everything needed
	 * before the action get called for example for
	 * checking acl, account or any given data
	 */
	public function initAction() {}
	
	/**
	 * This action creates a user
	 */
	public function postAction() {
		$model = new Reef_Model_User();
		if ($model->validateRegister($this->getRequest()->getParams())) {
			$model->insert($this->getRequest()->getParams());
			$response = array(
					'status' => 'ok', 
					'message' => 'user successfully created');
		} else {
			$response = array(
					'status' => 'error', 
					'message' => $model->getValidationMessage());
		}
		$this->getResponse()->setHttpResponseCode(200);
		$this->_getView()->assign($response);
	}
}