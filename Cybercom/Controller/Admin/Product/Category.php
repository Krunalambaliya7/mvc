<?php 
namespace Controller\Admin\Product;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Category extends \Controller\Core\Admin
{
	public function saveAction()
	{
		$productId = $this->getRequest()->getGet('id');
		$categoryId = $this->getRequest()->getPost('Category');

		$model = \Mage::getModel('Model\Product\Category');
		$model->productId = $productId;
		$model->categoryId = $categoryId;
		$model->save();
	}
}

