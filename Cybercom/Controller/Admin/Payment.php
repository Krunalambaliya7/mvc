<?php 

namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Payment extends \Controller\Core\Admin{
	
	public function gridHtmlAction(){
		try {
			$gridHtml = \Mage::getBlock('Block\Admin\Payment\Grid')->toHtml();
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
			
		} catch (Exception $e) {
			$e->getMessage();
		}
		
	}

	public function formAction(){
		try {
			$edit = \Mage::getBlock('Block\Admin\Payment\Edit')->toHtml();
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
			$payment = \Mage::getModel('Model\Payment');
			if (!$this->getRequest()->isPost()) {
				throw new Exception("Invalid request");
			}
				$id = $this->getRequest()->getGet('id');
				$paymentData = $this->getRequest()->getPost('Payment');
				if ($id) {
					$payment->MethodId = $id;
				}
				else{
					$payment->createdDate = Date("Y-m-d H:i:s");
				}
				$payment->MethodId = $id;
				$payment->setData($paymentData);
				$payment->save();
				$gridHtml = \Mage::getBlock('Block\Admin\Payment\Grid')->toHtml();

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
		try
		{
			if (!$this->getRequest()->isPost()) 
			{
				throw new Exception("Invalid.");
		 	}
			$id = $this->getRequest()->getGet('id');
			$payment = \Mage::getModel('Model\Payment');
			$payment->deleteData($id);
			$gridHtml = \Mage::getBlock('Block\Admin\Payment\Grid')->toHtml();
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

	public function changeStatusAction()
	{
		try
		{
			$payment = \Mage::getModel('Model\Payment');
			if (!$this->getRequest()->isPost()) 
			{
				throw new Exception("Invalid.");
		 	}
		 	$paymentStatus = $this->getRequest()->getGet('Status');
		 	$payment->MethodId = $this->getRequest()->getGet('id');
		 	if ($paymentStatus == 'Disable') {
		 		$payment->Status = 'Enable';
		 	}
		 	elseif ($paymentStatus == 'Enable') {
		 		$payment->Status = 'Disable';
		 	}
			$payment->save();
			$gridHtml = \Mage::getBlock('Block\Admin\Payment\Grid')->toHtml();
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