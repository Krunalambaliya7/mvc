<?php 
namespace Block\Admin\Customer\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');

class Form extends \Block\Core\Template
{
	protected $customer = NULL;
	
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Admin/Customer/Form/Tabs/form.php');
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
 	}	
}

?>