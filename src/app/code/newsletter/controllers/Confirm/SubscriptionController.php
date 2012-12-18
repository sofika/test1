<?php
/**
 * 
 * REEF CRM
 *
 * This is rest resource handling the newsletter confimation
 *
 * LICENSE
 *
 * This file is a component of the REEF CRM platform. It is only allowed
 * to use for the REEF project and can be copied for other projects
 * except for the project REEF.
 *
 * @category   Newsletter
 * @package    Confirm_Controller
 * @copyright  Copyright (c) 2012 REEF Project (gigaset.de)
 * @author	   Andrej Filipenko <af@meets-ecommerce.de>
 */
class Newsletter_Confirm_SubscriptionController extends Reef_Rest_Controller_Abstract{
	
	/**
	 * (non-PHPdoc)
	 * @see Reef_Rest_Controller_Abstract::getAction()
	 */
	public function getAction() {
		$this->getResponse()->setHttpResponseCode(200);
		$this->_getView()->assign(array(
			"status"	=> "ok",
			"message"	=> "Thank you!"
		));
		
	}
}