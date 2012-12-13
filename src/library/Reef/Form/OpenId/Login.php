<?php
class Reef_Form_OpenId_Login extends Zend_Form {
	
	public function init() {
		$this->setMethod('post')
				->setLegend('OpenID Login');
		
		$identifier = $this->createElement('text', 'openid_identifier');
		$identifier->setLabel('Name:')
					->addFilter(new Zend_Filter_StringTrim())
					->addValidator(new Zend_Validate_NotEmpty(), true);
		
		$password 	= $this->createElement('password', 'openid_password');
		$password->setLabel('Password:')
					->addFilter(new Zend_Filter_StringTrim())
					->addValidator(new Zend_Validate_NotEmpty(), true);
		
		$action		= $this->createElement('submit', 'openid_action');
		$action->setValue('login');
		
		$this->addElements(array($identifier, $password, $action));
	}
}