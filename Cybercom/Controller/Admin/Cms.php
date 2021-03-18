<?php 

namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Cms extends \Controller\Core\Admin
{
	public function gridHtmlAction()
	{
		$gridHtml = \Mage::getBlock('Block\Admin\Cms\Grid')->toHtml();

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

	public function formAction()
	{
		try {
			
			$edit = \Mage::getBlock('Block\Admin\Cms\Edit')->toHtml();
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
			$cms = \Mage::getModel('Model\Cms');
			if (!$this->getRequest()->isPost()) {
				throw new Exception("Invalid request");
			}
				$id = $this->getRequest()->getGet('id');
				$cmsData = $this->getRequest()->getPost('Cms');
				if ($id) {
					$cms->pageId = $id;
				}
				else{
					$cms->createdDate = Date("Y-m-d H:i:s");
				}
				$cms->pageId = $id;
				$cms->setData($cmsData);
				$cms->save();
				$gridHtml = \Mage::getBlock('Block\Admin\Cms\Grid')->toHtml();

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
			$cms = \Mage::getModel('Model\Cms');
			$cms->deleteData($id);
			$gridHtml = \Mage::getBlock('Block\Admin\Cms\Grid')->toHtml();
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
}