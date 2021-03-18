<?php 

namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');

class Category extends \Block\Core\Template
{
	protected $category = NULL;
	
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Admin/Product/Form/Tabs/category.php');
	}

	public function setCategory($category = NULL)
 	{

 		if ($category) {
 			$this->category = $category;
 			return $this;
 		}
 		$category = \Mage::getModel('Model\Product\Category');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$category = $category->fetchCategory();
 		}

 		$this->category = $category;
 		return $this;
 	}

 	public function getCategory()
 	{
 		if (!$this->category) {
 			$this->setCategory(); 
 		}
 		return $this->category;
 	}	
}

?>