<?php
namespace Block\Admin\Category;
\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{	
	protected $category = NULL;

	public function __construct()
	{
		parent::__construct();
	}

	/*public function getTabContent()
	{
		$tabBlock = \Mage::getBlock('Block\Admin\Category\Edit\Tab');
		$tabs = $tabBlock->getTabs();
		$tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if (!array_key_exists($tab, $tabs)) {
			return false;
		}
		$blockClassName = $tabs[$tab]['block'];
		$block = \Mage::getBlock($blockClassName);
		echo $block->toHtml();
	}

 	public function setCategory($category = NULL)
 	{

 		if ($category) {
 			$this->category = $category;
 			return $this;
 		}
 		$category = \Mage::getModel('Model\Category');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$category = $category->load($id);
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
 	}*/

 	 	
}

?>