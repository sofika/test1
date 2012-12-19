<?php
class Reef_Model_User extends Reef_Model {
	
	/**
	 * 
	 * @param array $data
	 */
	public function validateLogin(array $data) {
		$email = new Zend_Validate();
		$email->addValidator(new Zend_Validate_EmailAddress());
		if (!isset($data['email']) || !$email->isValid($data['email'])) {
			$this->setValidationMessage("invalid email address");
			return false;
		}
		$password = new Zend_Validate();
		$password->addValidator(new Zend_Validate_StringLength(array('min' => 6, 'max' => 32)));
		if (!isset($data['password']) || !$password->isValid($data['password'])) {
			$this->setValidationMessage("please enter secure password");
			return false;
		}
		return true;
	}
	
	/**
	 * Checks all needed user fields
	 * 
	 * @param array $data
	 * @return boolean
	 */
	public function validateRegister(array $data) {
		$name = new Zend_Validate();
		$name->addValidator(new Zend_Validate_StringLength(array('min' => 2, 'max' => 32)));
		if (!isset($data['name']) || !$name->isValid($data['name'])) {
			$this->setValidationMessage("invalid name");
			return false;
		}
		
		$surname = new Zend_Validate();
		$surname->addValidator(new Zend_Validate_StringLength(array('min' => 2, 'max' => 32)));
		if (!isset($data['surname']) || !$surname->isValid($data['surname'])) {
			$this->setValidationMessage("invalid surname");
			return false;
		}
		
		$email = new Zend_Validate();
		$email->addValidator(new Zend_Validate_EmailAddress());
		if (!isset($data['email']) || !$email->isValid($data['email'])) {
			$this->setValidationMessage("invalid email address");
			return false;
		}
		
		$password = new Zend_Validate();
		$password->addValidator(new Zend_Validate_StringLength(array('min' => 6, 'max' => 32)));
		if (!isset($data['password']) || !$password->isValid($data['password'])) {
			$this->setValidationMessage("please enter secure password");
			return false;
		}
		
		$options = array('table' => 'user', 'field' => 'email');
		$email->addValidator(new Zend_Validate_Db_NoRecordExists($options));
		if (!$email->isValid($data['email'])) {
			$this->setValidationMessage("email already used in other account");
			return false;
		}
		return true;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Zend_Db_Table_Abstract::insert()
	 */
	public function insert(array $data) {
		$columns = $this->_getCols();
		unset($columns[0]);
		foreach ($data as $key => $value) {
			if (!isset($columns[$key])) {
				unset($data[$key]);
			}
		}
		$data['password'] = md5($data['password']);
		return parent::insert($data);
	}
}