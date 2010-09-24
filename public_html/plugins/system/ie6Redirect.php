<?php
defined('_JEXEC') or die; 

jimport('joomla.plugin.plugin');
jimport('joomla.environment.browser');

class plgSystemIE6Redirect extends JPlugin {

	public function __construct(&$subject, $config) {
		parent::__construct($subject, $config);
	}

	public function onAfterRoute() {
		$app =& JFactory::getApplication();
		$tmpl = JRequest::getVar('tmpl', 'cmd');
	
		if ($tmpl != 'ie6' && $app->isSite() && $this->params->get('redirect') == 'redirect') {
			$browser =& JBrowser::getInstance();
			//if (stripos($browser->getAgentString(), 'chrome')) {
			if ($browser->getBrowser() == 'msie' && $browser->getMajor() == '6') {
				$url = http_build_query(JRequest::get('get'));
				if (strlen($url) > 0) {
					$url .= '&tmpl=ie6';
				} else {
					$url .= 'tmpl=ie6';
				}
				
				$app->redirect('index.php?'.$url);			
			}
		}
	}
	
	public function onAfterRender() {
		$app =& JFactory::getApplication();
	
		if ($app->isSite() && $this->params->get('redirect') == 'warn') {
			$browser =& JBrowser::getInstance();
			//if (stripos($browser->getAgentString(), 'chrome')) {
			if ($browser->getBrowser() == 'msie' && $browser->getMajor() == '6') {
				$body = JResponse::getBody();
				
				$pattern = "/(<body .*?>)/i";
				$replace = "$1\n<div class=\"ie6warn\"><p>You are currently using an unsupported browser and may experience issues browsing the site. Click <a href=\"/index.php?tmpl=ie6\">here</a> for more information.</p></div>";
				
				$body = preg_replace($pattern, $replace, $body, 1);
				
				
				JResponse::setBody($body);
			}
		}
	}
}