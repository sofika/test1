<?php
/**
 * REEF CRM
 *
 * Includes the auth adapter for the DB auth
 *
 * LICENSE
 *
 * This file is a component of the REEF CRM platform. It is only allowed
 * to use for the REEF project and can be copied for other projects
 * except for the project REEF.
 *
 * @category   Reef
 * @package    Auth_Adapter_Db
 * @copyright  Copyright (c) 2012 REEF Project (gigaset.de)
 * @author	   Andrej Filipenko <af@meets-ecommerce.de>
 */
class Reef_Auth_Adapter_Db extends Zend_Auth_Adapter_DbTable {
	
	public function __construct() {
		parent::__construct(null, 'user', 'usermail', 'password');
	}
}