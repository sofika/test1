<?php
/**
 * 
 * @author afilipenko
 * @see Zend_View_Helper_Url
 */
class Reef_View_Helper_Url extends Zend_View_Helper_Url {
	
	/**
	 * Returns home url
	 * 
	 * @return string Url
	 */
	public function getHomeUrl() {
		return $this->url(array(), null, true);
	}
}