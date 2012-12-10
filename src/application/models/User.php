<?php
/**
 * REEF CRM
 *
 * This model handels the data handling for the user model
 *
 * LICENSE
 *
 * This file is a component of the REEF CRM platform. It is only allowed
 * to use for the REEF project and can be copied for other projects
 * except for the project REEF.
 *
 * @category   Models
 * @package    User
 * @copyright  Copyright (c) 2012 REEF Project (gigaset.de)
 * @author	   Andrej Filipenko <af@meets-ecommerce.de>
 */
class Application_Model_User extends Reef_Model {
	
	/**
	 * (non-PHPdoc)
	 * @see Zend_Db_Table_Abstract::insert()
	 */
	public function insert(array $data){
		if (isset($data['password2'])) unset($data['password2']);
		$data = parent::insert($data);
		return $data;
	}
	
	/**
	 * 
	 * 
	 * @param int $id
	 * @param string $key
	 */
	public function activate($id, $key) {
		
	}
}