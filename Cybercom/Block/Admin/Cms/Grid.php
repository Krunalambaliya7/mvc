<?php
namespace Block\Admin\Cms;
\Mage::loadFileByClassName('Block\Core\Template');

 class Grid extends \Block\Core\Template
 {
 	protected $content = [];

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Admin/cms/grid.php');
 	}

 	public function setCms($content = NULL)
	{
		if(!$content)
		{
			$cms = \Mage::getModel('Model\Cms');
			$content = $cms->FetchAll();
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