<?php
class Reef_Auth_Adapter_Db extends Zend_Auth_Adapter_DbTable {
	
	public function __construct() {
		parent::__construct(null, 'user', 'usermail', 'password');
	}
}