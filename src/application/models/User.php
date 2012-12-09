<?php
/**
 * 
 * @author afilipenko
 *
 */
class Application_Model_User extends Reef_Model {
	
	/**
	 * Create new user record
	 * 
	 * @param array $data
	 * @return mixed
	 */
	static public function add(array $data) {
		if (isset($data['password2'])) unset($data['password2']);
		$data = $this->insert($data);
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