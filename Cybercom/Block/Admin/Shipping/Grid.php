<?php
namespace Block\Admin\Shipping;
\Mage::loadFileByClassName('Block\Core\Template');

 class Grid extends \Block\Core\Template
 {
 	protected $shippings = NULL;

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Admin/Shipping/grid.php');
 	}

 	public function setShippings($shippings = NULL)
	{
		if(!$shippings)
		{
			$shipping = \Mage::getModel('Model\Shipping');
			$shippings = $shipping->FetchAll();
		}
		$this->shippings = $shippings;
		return $this;
	}

	public function getShippings()
	{
		if (!$this->shippings) {
			$this->setShippings();
		}
		return $this->shippings; 
	}
 } 
?>