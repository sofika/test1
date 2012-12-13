<?php

/**
 * REEF CRM
 *
 * This class manages the entry of the platform
 *
 * LICENSE
 *
 * This file is a component of the REEF CRM platform. It is only allowed
 * to use for the REEF project and can be copied for other projects
 * except for the project REEF.
 *
 * @category   Controllers
 * @package    UserController
 * @copyright  Copyright (c) 2012 REEF Project (gigaset.de)
 * @author	   Andrej Filipenko <af@meets-ecommerce.de>
 */
class IndexController extends Zend_Controller_Action {
	
	public function indexAction() {
		$this->view->auth = Zend_Auth::getInstance();
		$form = new Reef_Form_Login();
		$this->view->form = $form; 
	}
}

