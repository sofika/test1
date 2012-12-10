<?php
/**
 * REEF CRM
 *
 * Manages internally some url function who are needed
 *
 * LICENSE
 *
 * This file is a component of the REEF CRM platform. It is only allowed
 * to use for the REEF project and can be copied for other projects
 * except for the project REEF.
 *
 * @category   Reef
 * @package    View_Helper_Url
 * @copyright  Copyright (c) 2012 REEF Project (gigaset.de)
 * @author	   Andrej Filipenko <af@meets-ecommerce.de>
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