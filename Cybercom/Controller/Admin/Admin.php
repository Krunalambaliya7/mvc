<?php 

namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Admin extends \Controller\Core\Admin{
	
	public function gridHtmlAction(){
		try {
			$gridHtml = \Mage::getBlock('Block\Admin\Admin\Grid')->toHtml();
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
		try {
			
			$edit = \Mage::getBlock('Block\Admin\Admin\Edit')->toHtml();
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
		catch (Exception $e) {
			$e->getMessage();
		}
		
	}

	public function saveAction()
	{	
		try{
			$admin = \Mage::getModel('Model\Admin');
			if (!$this->getRequest()->isPost()) {
				throw new Exception("Invalid request");
			}
				$id = $this->getRequest()->getGet('id');
				$adminData = $this->getRequest()->getPost('Admin');
				if ($id) {
					$admin->adminId = $id;
				}
				else{
					$admin->createdDate = Date("Y-m-d H:i:s");
				}
				$admin->adminId = $id;
				$admin->setData($adminData);
				if ($admin->save()) {
				   $this->getMessage()->setSuccess("Data Added Successfully.");
				}
				$gridHtml = \Mage::getBlock('Block\Admin\Admin\Grid')->toHtml();

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
				$edit->getMessage()->setFailure($e->getMessage());
			}
		}

	public function deleteAction()
	{
		try
		{
			if (!$this->getRequest()->isPost()) 
			{
				throw new Exception("Invalid.");
		 	}
			$id = $this->getRequest()->getGet('id');
			$admin = \Mage::getModel('Model\Admin');
			$admin->deleteData($id);
			$gridHtml = \Mage::getBlock('Block\Admin\Admin\Grid')->toHtml();
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
			$edit->getMessage()->setFailure($e->getMessage());
		}	
	}

	public function changeStatusAction()
	{
		try
		{
			$admin = \Mage::getModel('Model\Admin');
			if (!$this->getRequest()->isPost()) 
			{
				throw new Exception("Invalid.");
		 	}
		 	$adminStatus = $this->getRequest()->getGet('Status');
		 	$admin->adminId = $this->getRequest()->getGet('id');
		 	if ($adminStatus == 'Disable') {
		 		$admin->Status = 'Enable';
		 	}
		 	elseif ($adminStatus == 'Enable') {
		 		$admin->Status = 'Disable';
		 	}
		 	

			$admin->save();

			$gridHtml = \Mage::getBlock('Block\Admin\Admin\Grid')->toHtml();
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