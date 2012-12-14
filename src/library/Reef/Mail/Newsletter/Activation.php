<?php
class Reef_Mail_Newsletter_Activation extends Zend_Mail {
	
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