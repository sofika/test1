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
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        $this->bootstrap->bootstrap();
        parent::setUp();
        $this->_setUpControllerMock();
        
    }
    
    /**
     * Tears down 
     */
    public function tearDown() {
    	$this->resetRequest();
    	$this->resetResponse();
    	parent::tearDown();
    }
    
    /**
     * Sets up the controller mock
     */
    protected function _setUpControllerMock(){
    	$request = $this->getRequest()
    		->setRequestUri('/user/register')
    		->setPathInfo(null);
    	$response = $this->getResponse();
    	$this->getFrontController()
    		->setRequest($request)
    		->setResponse($response)
    		->throwExceptions(true)
    		->returnResponse(false);
    	
    	$controller  = 'UserController';
    	$methods = array('registerAction', 'loginAction', 'newsletterAction', 'profileAction', 'logoutAction');
    	$arguments = array($request, $response, $request->getParams());
    	$this->_controllerMock = $this->getMock(
    			$controller,
    			$methods
    	);
    }

    /**
     * Tests the register action
     * 
     * @test
     */
    public function testRegisterAction(){
    	$this->_controllerMock
    		 ->expects($this->once())
    		 ->method('registerAction');
    	
    	// Execute controller
    	$this->_controllerMock->registerAction();
    }

    /**
     * Tests the login action
     * 
     * @test
     */
    public function testLoginAction(){
    	$this->_controllerMock
    	->expects($this->once())
    	->method('loginAction');
    	 
    	// Execute model
    	$this->_controllerMock->loginAction();
    }
    
    /**
     * Tests the newsletter action
     *
     * @test
     */
    public function testNewsletterAction(){
    	$this->_controllerMock
    	->expects($this->once())
    	->method('newsletterAction');
    
    	// Execute model
    	$this->_controllerMock->newsletterAction();
    }
    
    /**
     * Tests the profile action
     *
     * @test
     */
    public function testProfileAction(){
    	$this->_controllerMock
    	->expects($this->once())
    	->method('profileAction');
    
    	// Execute model
    	$this->_controllerMock->profileAction();
    }
    
    /**
     * Tests the logout action
     *
     * @test
     */
    public function testLogoutAction(){
    	$this->_controllerMock
    	->expects($this->once())
    	->method('logoutAction');
    
    	// Execute model
    	$this->_controllerMock->logoutAction();
    }

}



