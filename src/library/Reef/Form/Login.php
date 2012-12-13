<?php
class Reef_Form_Login extends Zend_Form {

	public function init() {
		
		$mail = new Zend_Validate();
		$mail->addValidator(new Zend_Validate_NotEmpty(), true)
				->addValidator(new Zend_Validate_EmailAddress(), true)
				->addValidator(new Zend_Validate_Db_RecordExists(array('table' => 'user', 'field' => 'usermail')), true);
		
		$pass = new Zend_Validate();
		$pass->addValidator(new Zend_Validate_NotEmpty(), true)
				->addValidator(new Zend_Validate_StringLength(array('min' => 6, 'max' => 128)), true);
		
		$this->setMethod('post')
				->setLegend('Login')
				->setElementFilters(array(new Zend_Filter_StringTrim()));
		
		$this->addElement('text', 'usermail', array(
				'label' 	=> 'Email-Address:',
				'required' 	=> true));

		$this->addElement('password', 'password', array(
				'label' 	=> 'Password:',
				'required'	=> true));

		$this->addElement('submit', 'action', array(
				'label'		=> 'Login',
				'ignore'	=> true));

		$this->addElement('hash', 'csrf', array(
				'ignore'	=> true));
	}

}