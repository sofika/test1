<?php
/**
 * 
 * REEF CRM
 *
 * This is the user model
 *
 * LICENSE
 *
 * This file is a component of the REEF CRM platform. It is only allowed
 * to use for the REEF project and can be copied for other projects
 * except for the project REEF.
 *
 * @category   User
 * @package    Logout_Controller
 * @copyright  Copyright (c) 2012 REEF Project (gigaset.de)
 * @author	   Daniel Matuschewsky <dm@meets-ecommerce.de>
 */
class Reef_User{
	
	private $_token;
	
	public function getPassword(){
		return "test";
	}
	
	public function setToken($token){
		$this->_token = $token;
		
	}
	public function generateToken(){
		if(!strlen($this->_token)){
			$this->_token =  md5(mt_rand(0, 10000000000));
		}
		return $this->_token;
	}
	
	public function getEmail(){
		return "dm@meets-ecommerce.de";
	}
	
	public function getFirstname(){
		return "Daniel";
	}
	
	public function getName(){
		return "Matuschewsky";
	}
	
	
}