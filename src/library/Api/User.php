<?php
class Api_User {
	
	public function getData($id) {
		$data = array('id' => $id, 'name' => 'Andrej', 'email' => 'af@meets-ecommerce');
		return serialize($data);
	}
}