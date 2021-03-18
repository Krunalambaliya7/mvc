<?php

namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Group extends \Controller\Core\Admin
{
	public function __construct()
	{
		parent::__construct();
	}

	public function gridHtmlAction(){
 		try {
			$gridHtml = \Mage::getBlock('Block\Admin\Customer\CustomerGroup\Grid')->toHtml();
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

		$edit = \Mage::getBlock('Block\Admin\Customer\CustomerGroup\Edit')->toHtml();
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

	 		$customer = \Mage::getModel('Model\Customer\CustomerGroup\Group');
			if (!$this->getRequest()->isPost()) {
				throw new Exception("Invalid request");
			}
			$id = $this->getRequest()->getGet('id');
			$customerData = $this->getRequest()->getPost('Customergroup');
			if (!$id) {
				$customer->createdDate = Date("Y-m-d H:i:s");
			}
			$customer->groupId = $id;
			$customer->setData($customerData);
			$customer->save();
			$gridHtml = \Mage::getBlock('Block\Admin\Customer\CustomerGroup\Grid')->toHtml();

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

 	public function deleteAction()
 	{	
 		try{
			if (!$this->getRequest()->ispost()) 
			{
				throw new Exception("Invalid.");
		 	}
			$id = $this->getRequest()->getGet('id');
			$customer = \Mage::getModel('Model\Customer\CustomerGroup\Group');
		
			$customer->deleteData($id); 
			$gridHtml = \Mage::getBlock('Block\Admin\Customer\CustomerGroup\Grid')->toHtml();
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
			$customer = \Mage::getModel('Model\Customer\CustomerGroup\Group');
			if (!$this->getRequest()->isPost()) 
			{
				throw new Exception("Invalid.");
		 	}
		 	$customerStatus = $this->getRequest()->getGet('Status');
		 	$customer->groupId = $this->getRequest()->getGet('id');
		 	if ($customerStatus == 'Disable') {
		 		$customer->default = 'Enable';
		 	}
		 	elseif ($customerStatus == 'Enable') {
		 		$customer->default = 'Disable';
		 	}
			$customer->save();
			$gridHtml = \Mage::getBlock('Block\Admin\Customer\CustomerGroup\Grid')->toHtml();
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