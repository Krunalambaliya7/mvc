<?php

namespace Block\Admin\Customer\CustomerGroup;
\Mage::loadFileByClassName('Block\Core\Template');
 class Grid extends \Block\Core\Template
 {
 	protected $customerGroup = [];

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Admin/Customer/CustomerGroup/grid.php');
 	}

 	public function setCustomerGroup($customerGroup = NULL)
	{
		if(!$customerGroup)
		{
			$customer = \Mage::getModel('Model\Customer\CustomerGroup\Group');
			$customerGroup = $customer->FetchAll();
		}
		$this->customerGroup = $customerGroup;
		return $this;
	}

	public function getCustomerGroup()
	{
		if (!$this->customerGroup) {
			$this->setCustomerGroup();
		}
		return $this->customerGroup; 
	}
 } 
?>