<?php
class UserController extends Zend_Controller_Action {
	
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
				// database adapter
				$adapter = new Reef_Auth_Adapter_Db();
				$adapter->setIdentity($form->getValue('usermail'));
				$adapter->setCredential($form->getValue('password'));
				$result = Zend_Auth::getInstance()->authenticate($adapter);
				// check auth
				if ($result->isValid()) {
					$this->redirect('index');
				}
				$this->view->messages = $result->getMessages();
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
			$this->redirect('user/login');
		}
		Zend_Auth::getInstance()->clearIdentity();
		$this->redirect('index');
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
				// Application_Model_User::add($form->getValues());
				$user = new Application_Model_User();
				$user->insert($form->getValues());
				$this->redirect('user/login');
			}
		}
		$this->view->form = $form;
		$this->renderScript('default/form.phtml');
	}
	
	/**
	 * User activation process
	 */
	public function activateAction() {
		if ($this->getParam('id') && $this->getParam('key')) {}
	}
	
	/**
	 * Show user profile
	 */
	public function profileAction() {}
}