<?php

namespace Block\Admin\Cms;
\Mage::loadFileByClassName('Block\Core\Template');

class Edit extends \Block\Core\Template
{	
	protected $content = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Admin/cms/edit.php');
	}


	public function setCms($content = NULL)
	{
		if ($content) {
			$this->content = $content;
			return $this;
 		}
 		$cms = \Mage::getModel('Model\Cms');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$content = $cms->load($id);
 		}

 		$this->content = $content;
 		return $this;
	}

	public function getCms()
	{
		if (!$this->content) {
			$this->setCms();
		}
		return $this->content; 
	}
}

?>