<?php
namespace Controller\Core;
class Abstracts
{
	protected $request = NULL;
	protected $url = NULL;

	public function __construct(){
		$this->setRequest();
		$this->setUrl();
	}


	public function setRequest(){
		$this->request = \Mage::getModel('Model\Core\Request');
	}

	public function getRequest(){
		return $this->request;
	}

	public function setUrl(){
		$this->url = \Mage::getModel('Model\Core\Url');
	}

	public function getUrl(){
		if (!$this->url) {
			$this->setUrl();
		}
		return $this->url;
	}
} 
?>