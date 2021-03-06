<?php 

namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');

class GroupPrice extends \Block\Core\Template
{
	protected $price = NULL;

	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Admin/Product/Form/Tabs/groupPrice.php');
	}

	public function setPrice($price = NULL)
	{
		if(!$price)
		{
			$id = $this->getRequest()->getGet('id');
			$price = \Mage::getModel('Model\Product\GroupPrice');
			$price = $price->fetchPrice($id);
		}
		$this->price = $price;
		return $this;
	}

	public function getPrice()
	{
		if (!$this->price) {
			$this->setPrice();
		}
		return $this->price; 
	}
}
?>