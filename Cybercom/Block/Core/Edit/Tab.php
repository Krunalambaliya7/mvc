<?php 
namespace Block\Core\Edit;
\Mage::loadFileByClassName('Block\Core\Template');

class Tab extends \Block\Core\Template
{
	
	public function __construct()
	{
		$this->setTemplate('./View/Admin/Product/Form/tab.php');
		$this->prepareTab();
	}
}
?>