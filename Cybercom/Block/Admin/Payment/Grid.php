<?php
namespace Block\Admin\Payment;
\Mage::loadFileByClassName('Block\Core\Template');

 class Grid extends \Block\Core\Template
 {

 	protected $payments = [];

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Admin/Payment/grid.php');

 	}

 	public function setPayments($payments = NULL)
	{
		if(!$payments)
		{
			$payment = \Mage::getModel('Model\Payment');
			$payments = $payment->FetchAll();
		}
		$this->payments = $payments;
		return $this;
	}

	public function getPayments()
	{
		if (!$this->payments) {
			$this->setPayments();
		}
		return $this->payments; 
	}
 } 
?>