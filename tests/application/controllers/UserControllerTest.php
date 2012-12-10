<?php
/**
 * REEF CRM
 * 
 * This class tests the user controller
 * 
 * LICENSE
 * 
 * This file is a component of the REEF CRM platform. It is only allowed
 * to use for the REEF project and can be copied for other projects
 * except for the project REEF.
 *
 * @category   Test
 * @package    Test_UserControllerTest
 * @copyright  Copyright (c) 2012 REEF Project (gigaset.de)
 * @author	   Daniel Matuschewsky <dm@meets-ecommerce.de>
 */
class UserControllerTest extends Zend_Test_PHPUnit_DatabaseTestCase
{
	/**
	 * (non-PHPdoc)
	 * @see Zend_Test_PHPUnit_ControllerTestCase::setUp()
	 */
    public function setUp(){
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }
    
    /**
     * Sets up the controller mock
     */
    protected function setUpControllerMock(){
    	
    }

    /**
     * Tests the register action
     * 
     * @test
     */
    public function testRegisterAction(){
    	
    }


}



