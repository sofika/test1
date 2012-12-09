<?php
class Reef_Form extends Zend_Form {
	
	/**
	 * create form by config
	 * 
	 * @param string $name
	 * @return Zend_Form
	 */
	static public function create($name) {
		$file 	= APPLICATION_PATH . '/configs/forms/' . $name;
		$config = new Zend_Config_Ini($file);
		return new Zend_Form($config->form);
	}
	
	/**
	 * remove from elements
	 * 
	 * @param array $elemets
	 * @return Reef_Form
	 */
	public function removeElements(array $elemets) {
		foreach ($elements as $name) {
			if ($this->getElement($name)) {
				$this->removeElement($name);
			}
		}
		return $this;
	}
}