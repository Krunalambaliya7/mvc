<?php 
namespace Block\Admin\Category\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');

class Media extends \Block\Core\Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Admin/Category/Form/Tabs/media.php');
	}
}
?>