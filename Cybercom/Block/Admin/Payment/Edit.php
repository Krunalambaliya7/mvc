<?php

namespace Block\Admin\Payment;
\Mage::loadFileByClassName('Block\Core\Template');

class Edit extends \Block\Core\Template
{	
	protected $payment = NULL;

	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Admin/Payment/edit.php');
	}

 	public function setPayment($payment = NULL)
 	{

 		if ($payment) {
 			$this->payment = $payment;
 			return $this;
 		}
 		$payment = \Mage::getModel('Model\Payment');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$payment = $payment->load($id);
 		}

 		$this->payment = $payment;
 		return $this;
 	}

 	public function getPayment()
 	{
 		if (!$this->payment) {
 			$this->setPayment(); 
 		}
 		return $this->payment;
 	}	
}

?>