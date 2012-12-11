<?php
/**
 * REEF CRM
 *
 * This class manages all user related actions
 *
 * LICENSE
 *
 * This file is a component of the REEF CRM platform. It is only allowed
 * to use for the REEF project and can be copied for other projects
 * except for the project REEF.
 *
 * @category   Controllers
 * @package    UserController
 * @copyright  Copyright (c) 2012 REEF Project (gigaset.de)
 * @author	   Andrej Filipenko <af@meets-ecommerce.de>
 */
class UserController extends Zend_Controller_Action {
	
	public function preDispatch() {
		if (Zend_Auth::getInstance()->hasIdentity()) {
			#var_dump(Zend_Auth::getInstance()->getIdentity());
			#exit;
		}
	}
	
	/**
	 * User login process
	 */
	public function loginAction() {
		if (Zend_Auth::getInstance()->hasIdentity()) {
			$this->redirect('index');
		}
		$form = Reef_Form::create('user_login.ini');
		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->getRequest()->getPost())) {
				$form->getElement('password')->addFilter(new Zend_Filter_Callback('md5'));
				$adapter = new Reef_Auth_Adapter_Db();
				$adapter->setIdentity($form->getValue('usermail'));
				$adapter->setCredential($form->getValue('password'));
				$result = Zend_Auth::getInstance()->authenticate($adapter);
				if ($result->isValid()) {
					$storage = Zend_Auth::getInstance()->getStorage();
					$storage->write($adapter->getResultRowObject(null,'password'));
					$this->_helper->FlashMessenger('login successfully');
					$this->redirect('index');
				}
				$this->view->messages = $result->getMessages();
			}
		}
		$this->view->form = $form;
		$this->renderScript('default/form.phtml');
	}
	
	/**
	 * User registration process
	 */
	public function registerAction() {
		if (Zend_Auth::getInstance()->hasIdentity()) {
			$this->redirect('index');
		}
		$form = Reef_Form::create('user_register.ini');
		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->getRequest()->getPost())) {
				$form->getElement('password')->addFilter(new Zend_Filter_Callback('md5'));
				$form->getElement('password2')->addFilter(new Zend_Filter_Callback('md5'));
				$data = $form->getValues();
				$data['code'] = substr(md5(rand(1, 23)), 0, 10);
				// save user
				$user = new Application_Model_User();
				$userId = $user->insert($data);
				$this->_helper->FlashMessenger('account successfully registred');
				// check newsletter
				if ($form->getValue('newsletter') == 1) {
					$mail = new Reef_Mail_Newsletter_Activation();
					$mail->recive($userId, $data['usermail'], $data['code']);
					$this->_helper->FlashMessenger('newsletter activation link sent to email');
				}
				$this->redirect('user/login');
			}
		}
		$this->view->form = $form;
		$this->renderScript('default/form.phtml');
	}
	
	/**
	 * Logout user
	 */
	public function logoutAction() {
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			$this->_helper->FlashMessenger('no access');
			$this->redirect('user/login');
		}
		Zend_Auth::getInstance()->clearIdentity();
		$this->_helper->FlashMessenger('session cleared');
		$this->redirect('index');
	}
	
	/**
	 * Show user profile
	 */
	public function profileAction() {
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			$this->_helper->FlashMessenger('no access');
			$this->redirect('user/login');
		}
		$this->view->data = Zend_Auth::getInstance()->getIdentity();
	}
	
	/**
	 * Switch newsletter on/off
	 */
	public function newsletterAction() {
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		if ($this->getRequest()->getParam('option') 
				&& $this->getRequest()->getParam('id') 
				&& $this->getRequest()->getParam('code')) {
			// select user from database
			$id = $this->getRequest()->getParam('id');
			$model = new Application_Model_User();
			$user = $model->find($id);
			if (!$user->count() > 0) {
				$this->redirect('index');
			}
			$user = $user->current();
			switch ($this->getRequest()->getParam('option')) {
				case 'enable':
					if ($user->id == $id 
							&& $this->getRequest()->getParam('code') == $user->code 
							&& $user->newsletter == 0) {
						$user->newsletter = 1;
						$user->save();
						$this->_helper->FlashMessenger('newsletter enabled');
					}
					break;
			
				case 'disbale':
					
					break;
			}
		} else {
			$this->_helper->FlashMessenger('no access to this section');
		}
		$this->redirect('index');
	}
}