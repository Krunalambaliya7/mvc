<?php

namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Category extends \Controller\Core\Admin
{

 	public function gridHtmlAction(){
 		try {

 			$gridHtml = \Mage::getBlock('Block\Admin\Category\Grid')->toHtml();
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

			$category = \Mage::getModel('Model\Category');
			$id = $this->getRequest()->getGet('id');
			$category->load($id);
			$left = \Mage::getBlock('Block\Admin\Category\Edit\Tab');
			$edit = \Mage::getBlock('Block\Admin\Category\Edit');
			$edit->setTab($left);
			$edit->setTableRow($category);
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
 			$category = \Mage::getModel('Model\Category');
 			if ($id = $this->getRequest()->getGet('id')) {
	 			$category = $category->load($id);
	 			
	 			if (!$category) {
	 				throw new Exception("Record not found.");
	 				
	 			}
	 		}
	 		$categoryPath = $category->path;
	 		$categoryData = $this->getRequest()->getPost('Category');
	 		$category->setData($categoryData);
	 		
	 		$category->CategoryId = $id;

	 		$id = $category->save();
	 		$category->CategoryId = $id;

	 		$category->updatePath();
	 		$category->updateChildrenPath($categoryPath);

	 		$gridHtml = \Mage::getBlock('Block\Admin\Category\Grid')->toHtml();

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
			$category = \Mage::getModel('Model\Category');
			if ($id = $this->getRequest()->getGet('id')) {
				$category = $category->load($id);
				if (!$category) {
					throw new Exception("Id no found");
				}
			}

			$path = $category->path;
			$parentId = $category->parentId;
			$category->updateChildrenPath($path,$parentId);
			$category->deleteData($id);
			$gridHtml = \Mage::getBlock('Block\Admin\Category\Grid')->toHtml();
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
			$category = \Mage::getModel('Model\Category');
			if (!$this->getRequest()->isPost()) 
			{
				throw new Exception("Invalid.");
		 	}
		 	$categoryStatus = $this->getRequest()->getGet('Status');
		 	$category->CategoryId = $this->getRequest()->getGet('id');
		 	if ($categoryStatus == 'Disable') {
		 		$category->Status = 'Enable';
		 	}
		 	elseif ($categoryStatus == 'Enable') {
		 		$category->Status = 'Disable';
		 	}
			$category->save();
			$gridHtml = \Mage::getBlock('Block\Admin\Category\Grid')->toHtml();
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