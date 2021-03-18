<?php 

namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Product extends \Controller\Core\Admin{

	public function gridHtmlAction(){
		$gridHtml = \Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
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

	public function formAction(){
		try {
			$product = \Mage::getModel('Model\Product');
			$id = $this->getRequest()->getGet('id');
			$product->load($id);
			/*if ($id) {
				$left = \Mage::getBlock('Block\Admin\Product\Edit\Tab');
			}
			else{
				$left = NULL;
			}*/
			$left = \Mage::getBlock('Block\Admin\Product\Edit\Tab');
			$edit = \Mage::getBlock('Block\Admin\Product\Edit');
			$edit->setTab($left);
			$edit->setTableRow($product);
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
		catch (Exception $e) {
			$e->getMessage();
		}
		
	}

	public function saveAction()
	{	
		try{
			$product = \Mage::getModel('Model\Product');
			if (!$this->getRequest()->isPost()) {
				throw new Exception("Invalid request");
			}
				$id = $this->getRequest()->getGet('id');
				$productData = $this->getRequest()->getPost('Product');

				if ($id) {
					$product->updatedDate = Date("Y-m-d H:i:s");
					$product->ProductId = $id;
				}
				else{
					$product->createdDate = Date("Y-m-d H:i:s");
				}
				$product->ProductId = $id;
				$product->setData($productData);
				$product->save();
				$gridHtml = \Mage::getBlock('Block\Admin\Product\Grid')->toHtml();

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
				$this->getMessage()->setFailure($e->getMessage());
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
			$product = \Mage::getModel('Model\Product');
			$product->deleteData($id);
			$gridHtml = \Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
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
			$this->getMessage()->setFailure($e->getMessage());
		}	
	}

	public function changeStatusAction()
	{
		try
		{
			$product = \Mage::getModel('Model\Product');
			if (!$this->getRequest()->isPost()) 
			{
				throw new Exception("Invalid.");
		 	}
		 	$productStatus = $this->getRequest()->getGet('Status');
		 	$product->ProductId = $this->getRequest()->getGet('id');
		 	if ($productStatus == 'Disable') {
		 		$product->Status = 'Enable';
		 	}
		 	elseif ($productStatus == 'Enable') {
		 		$product->Status = 'Disable';
		 	}
		 	
			$product->save();

			$gridHtml = \Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
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