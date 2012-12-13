<?php


/**
 * 
 * @author afilipenko
 *
 */
abstract class Reef_Validate_Abstract {
	
	/**
	 * Holds registred filters
	 * 
	 * @var array
	 */
	private $_filters 		= array();
	
	/**
	 * Holds registed validators
	 * 
	 * @var array
	 */
	private $_validators 	= array();
	
	/**
	 * @return array 
	 */
	public function getFilters() {
		return $this->_filters;
	}
	
	/**
	 * @return array
	 */
	public function getValidators() {
		return $this->_validators;
	}
	
	/**
	 * 
	 * 
	 * @param string $field
	 * @param mixed $filter
	 * @return Reef_Validate_Abstract
	 */
	public function addFilter($field, $filter) {
		if (isset($this->_filters[$field])) {
			$this->_filters[$field] = array();
		}
		$this->_filters[$field][] = $filter;
		return $this;
	}
	
	public function addValidator() {
		
	}
}