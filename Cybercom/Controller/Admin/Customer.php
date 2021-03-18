<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Customer extends \Controller\Core\Admin
{
 	
 	public function gridHtmlAction(){
 		try {
 			
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
 		catch (Exception $e) {
 			$e->getMessage();
 		}
		
	}

	public function formAction(){

			/*if ($this->getRequest()->getGet('id')) {
				$left = \Mage::getBlock('Block\Admin\Customer\Edit\Tab')->toHtml();
			}
			else{
				$left = NULL;
			}*/
			$customer = \Mage::getModel('Model\Customer');
			$id = $this->getRequest()->getGet('id');
			$customer->load($id);
			$left = \Mage::getBlock('Block\Admin\Customer\Edit\Tab');
			$edit = \Mage::getBlock('Block\Admin\Customer\Edit');
			$edit->setTab($left);
			$edit->setTableRow($customer);
			$edit = $edit->toHtml(); 
			
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
 		try{

	 		$customer = \Mage::getModel('Model\Customer');
			if (!$this->getRequest()->isPost()) {
				throw new Exception("Invalid request");
			}
			$id = $this->getRequest()->getGet('id');
			$customerData = $this->getRequest()->getPost('Customer');
			if ($id) {
				$customer->updatedDate = Date("Y-m-d H:i:s");
				$customer->CustomerId = $id;
			}
			else{
				$customer->createdDate = Date("Y-m-d H:i:s");
			}
			$customer->CustomerId = $id;
			$customer->setData($customerData);
			$customer->save();
			$gridHtml = \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();

			$response = [
				'status'=>'success',
				'message'=>'excellent',
				'element'=>[
					[
						'selector'=>'#contentHtml',
						'html'=>$gridHtml
					],
					[
						'selector'=>'#leftHtml',
						'html'=>NULL
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


  	public function deleteAction()
 	{	
 		try{
			if (!$this->getRequest()->isPost()) 
			{
				throw new Exception("Invalid.");
		 	}
			$id = $this->getRequest()->getGet('id');
			$customer = \Mage::getModel('Model\Customer');
		
			$customer->deleteData($id);
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

 	public function changeStatusAction()
	{
		try
		{
			$customer = \Mage::getModel('Model\Customer');
			if (!$this->getRequest()->isPost()) 
			{
				throw new Exception("Invalid.");
		 	}
		 	$customerStatus = $this->getRequest()->getGet('Status');
		 	$customer->CustomerId = $this->getRequest()->getGet('id');
		 	if ($customerStatus == 'Disable') {
		 		$customer->Status = 'Enable';
		 	}
		 	elseif ($customerStatus == 'Enable') {
		 		$customer->Status = 'Disable';
		 	}
			$customer->save();
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
		catch (Exception $e)
		{
			$e->getMessage();
		}
	}
} 

?>