<?php 
namespace Controller\Admin\Attribute;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Option extends \Controller\Core\Admin{
	
	public function gridAction(){

		try {

			$edit = \Mage::getBlock('Block\Admin\Attribute\Option\Edit')->toHtml();
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
			$optionModel = \Mage::getModel('Model\Attribute\Option');
			$optionExist = $this->getRequest()->getPost('exist');
			$optionNew = $this->getRequest()->getPost('new');
			$optionRemove = implode(',',array_keys($optionExist));
			$attributeId = $this->getRequest()->getGet('id');

			$optionModel->deleteOption($optionRemove);
			
			foreach ($optionExist as $key => $value) {
				$optionModel->optionId = $key;
				$optionModel->setData($value);
				//$optionModel->save();
			}

			foreach ($optionNew['name'] as $key => $value) {
				$optionModel->optionId = NULL;
				$optionModel->name = $optionNew['name'][$key];
				$optionModel->attributeId = $attributeId;
				$optionModel->sortOrder = $optionNew['sortOrder'][$key];
				$optionModel->save();
			}
			/*echo "<pre>";
			print_r($optionModel);
			die();*/
			$edit = \Mage::getBlock('Block\Admin\Attribute\Option\Edit')->toHtml();
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
}
?>