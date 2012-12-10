<?php
/**
 * REEF CRM
 *
 * Extends the standard model behavior of Zend
 *
 * LICENSE
 *
 * This file is a component of the REEF CRM platform. It is only allowed
 * to use for the REEF project and can be copied for other projects
 * except for the project REEF.
 *
 * @category   Reef
 * @package    Reef_Auth_Adapter_Db
 * @copyright  Copyright (c) 2012 REEF Project (gigaset.de)
 * @author	   Andrej Filipenko <af@meets-ecommerce.de>
 */
abstract class Reef_Model extends Zend_Db_Table_Abstract {
	
	/**
	 * (non-PHPdoc)
	 * @see Zend_Db_Table_Abstract::_setupTableName()
	 */
	protected function _setupTableName() {
		if (! $this->_name) {
			$this->_name = strtolower(end(explode('_', get_class($this))));
		}
	}
}