<?php

namespace Block\Admin\Customer;
\Mage::loadFileByClassName('Block\Core\Edit');
class Edit extends \Block\Core\Edit
{	
	protected $customer = NULL;

	public function __construct()
	{
		parent::__construct();
	}

	/*public function getTabContent()
	{
		$tabBlock = \Mage::getBlock('Block\Admin\Customer\Edit\Tab');
		$tabs = $tabBlock->getTabs();
		$tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if (!array_key_exists($tab, $tabs)) {
			return false;
		}
		$blockClassName = $tabs[$tab]['block'];
		$block = \Mage::getBlock($blockClassName);
		echo $block->toHtml();
	}

 	public function setCustomer($customer = NULL)
 	{

 		if ($customer) {
 			$this->customer = $customer;
 			return $this;
 		}
 		$customer = \Mage::getModel('Model\Customer');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$customer = $customer->load($id);
 		}

 		$this->customer = $customer;
 		return $this;
 	}

 	public function getCustomer()
 	{
 		if (!$this->customer) {
 			$this->setCustomer(); 
 		}
 		return $this->customer;
 	}*/
}

?>