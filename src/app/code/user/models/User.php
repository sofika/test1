<?php
class User_Model_User extends Reef_Model {
	
	public function __construct() {
		pre($this->_getCols());
	}

	public function isValid(array $data) {
	}
}