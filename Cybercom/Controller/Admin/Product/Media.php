<?php

namespace Controller\Admin\Product;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Media extends \Controller\Core\Admin
{
	public function __construct()
	{
		parent::__construct();
	}

	public function gridAction()
	{
		try {
			if (!$this->getRequest()->getGet('id')) {
				return NULL;
			}

			$layout = \Mage::getBlock('Block\Core\Layout');
			$grid = \Mage::getBlock('Block\Admin\Product\Edit\Tabs\Media');
			
			$layout->getChild('content')->addChild($grid,'grid');
			echo $layout->toHtml();
		} 
		catch (Exception $e) {
			$e->getMessage();
		}
	}

	public function saveAction()
	{	
		try{
			$media = \Mage::getModel('Model\Product\Media');
			$img = $_FILES['file']['name'];
			$temp = $_FILES['file']['tmp_name'];
			$path = 'Images/';
			move_uploaded_file($temp, $path.$img);
			$media->ProductId = $this->getRequest()->getGet('id');
			$media->img = $img;
			$media->save();

			$this->getUrl()->redirect('grid','Admin\Product\Media',['tab'=>'media']);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function deleteAction()
	{
		$data = $this->getRequest()->getPost();

		$media = \Mage::getModel('Model\Product\Media');

		foreach ($data['remove'] as $key => $value) {
			$media->deleteMedia($value);
		}
		$this->getUrl()->redirect('grid','Media',[],true);
	}

	public function updateAction()
	{
		$media = \Mage::getModel('Model\Product\Media');	
		$data = $this->getRequest()->getPost('image');
		echo "<pre>";
		foreach ($data as $key => $value) {
			print_r($value);
			//$media->updateMedia($key);
		}
		//$this->getUrl()->redirect('grid','Product_Media',[],true);
	}
} 
?>