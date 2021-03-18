<?php
namespace Controller\Admin\Customer;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Address extends \Controller\Core\Admin
{
	public function __construct()
	{
		parent::__construct();
	}

	public function formAction(){

			$edit = \Mage::getBlock('Block\Admin\Customer\Edit')->toHtml();
			$left = \Mage::getBlock('Block\Admin\Customer\Edit\Tab')->toHtml();
			$response = [
			'status'=>'success',
			'message'=>'excellent',
			'element'=>[
				[
					'selector'=>'#contentHtml',
					'html'=>$edit
				]
			]
		];
		header("Content-type: application/json; charset=utf-8");
		echo json_encode($response);
	}

	public function saveAction()
	{
		try
		{
			$customer = \Mage::getModel('Model\Customer\CustomerAddress\Address');
			if (!$this->getRequest()->isPost()) {
				throw new Exception("Invalid request");
			}
			$id = $this->getRequest()->getGet('id');
			$billingData = $this->getRequest()->getPost('Billing');
			$customer->CustomerId = $id;
			$customer->addressType = 'Billing';
			$customer->setData($billingData);
			$customer->saveAddress();

			$shippingData = $this->getRequest()->getPost('Shipping');
			$customer->CustomerId = $id;
			$customer->addressType = 'Shipping';
			$customer->setData($shippingData);
			$customer->saveAddress();
			
			$gridHtml = \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();

			$response = [
				'status'=>'success',
				'message'=>'excellent',
				'element'=>[
					[
						'selector'=>'#contentHtml',
						'html'=>$gridHtml
					]
				]
			];
			header("Content-type: application/json; charset=utf-8");
			echo json_encode($response);
			
	 	}
	 	catch(Exception $e)
	 	{
	 		$e->getMessage();
	 	}
	}
} 
?>