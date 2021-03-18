<?php

namespace Block\Admin\Product;
\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{	

	public function __construct()
	{
		parent::__construct();
	}

 	/*public function setProduct($product = NULL)
 	{

 		if ($product) {
 			$this->product = $product;
 			return $this;
 		}
 		$product = \Mage::getModel('Model\Product');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$product = $product->load($id);
 		}

 		$this->product = $product;
 		return $this;
 	}

 	public function getProduct()
 	{
 		if (!$this->product) {
 			$this->setProduct(); 
 		}
 		return $this->product;
 	}*/

 	
}

?>