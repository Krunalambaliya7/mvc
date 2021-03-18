<?php
namespace Block\Core;

\Mage::loadFileByClassName('Block\Core\Template');

 class Layout extends Template
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/core/onecolumn.php');
 		$this->prepareChildren();
 	}

 	public function prepareChildren()
 	{
 		$this->addChild(\Mage::getBlock('Block\Core\Layout\Header') , 'header');
 		$this->addChild(\Mage::getBlock('Block\Core\Layout\Content') , 'content');
 		$this->addChild(\Mage::getBlock('Block\Core\Layout\Footer') , 'footer');
 		$this->addChild(\Mage::getBlock('Block\Core\Layout\Message') , 'message');
 		$this->addChild(\Mage::getBlock('Block\Core\Layout\Left') , 'left');
 	}
 } 
?>