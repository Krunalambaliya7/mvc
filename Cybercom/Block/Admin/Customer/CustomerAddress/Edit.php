<?php
namespace Block\Admin\Customer\CustomerAddress;
\Mage::loadFileByClassName('Block\Core\Template');

class Edit extends \Block\Core\Template
{	
	protected $customer = NULL;

	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Admin/Customer/CustomerAddress/edit.php');
	}

	
}

?>