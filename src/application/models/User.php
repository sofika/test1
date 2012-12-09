<?php
/**
 * 
 * @author afilipenko
 *
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