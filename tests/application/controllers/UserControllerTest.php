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
class UserControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{
	
	private $_controllerMock;
	
	/**
	 * (non-PHPdoc)
	 * @see Zend_Test_PHPUnit_ControllerTestCase::setUp()
	 */
    public function setUp(){
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/etc/application.ini');
        $this->bootstrap->bootstrap();
        parent::setUp();
        
    }
    
    /**
     * Tears down 
     */
    public function tearDown() {
    	parent::tearDown();
    }
    
    /**
     * A test which shows a successful result
     */
    public function testSuccessful(){
    	$this->assertTrue(true);
    }
    
    /**
     * A test which shows a fail result
    public function testFailed(){
    	$this->assertTrue(false);
    }

     */
}



