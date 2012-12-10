<?php
class Reef_Mail_Newsletter_Activation extends Zend_Mail {
	
	public function __construct($charset = 'utf-8') {
		parent::__construct($charset);
		$config = array('auth' => 'login', 'username' => 'mail@meets-ecommerce.de', 'password' => 'esl1990');
		$transport 	= new Zend_Mail_Transport_Smtp('jprzhhv012.jproxx.com', $config);
		Zend_Mail::setDefaultTransport($transport);
	}
	
	/**
	 * Send newsletter activation email
	 * 
	 * @param int $userId
	 * @param string $userMail
	 * @param string $userCode
	 * @return Reef_Mail_Newsletter_Activation
	 */
	public function recive($userId, $userMail, $userCode) {
		$url  = 'http://'. $_SERVER['HTTP_HOST'] .'/user/newsletter/option/enable/';
		$url .= 'id/' . $userId . '/code/' . $userCode;
		$html = sprintf('Activate newsletter: <a href="%s">klick herer</a>', $url);
		$this->setBodyHtml($html)
			 ->setFrom('newsletter-activation@reef.local')
			 ->addTo($userMail)
			 ->setSubject('Newsletter activation link')
			 ->send();
		return $this;
	}
}