<?php 

namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');

class Form extends \Block\Core\Template
{
	protected $product = NULL;
	
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Admin/Product/Form/Tabs/form.php');
	}

	public function setProduct($product = NULL)
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
 	}	
}

?>