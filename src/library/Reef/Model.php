<?php
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