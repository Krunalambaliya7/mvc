<?php

namespace Block\Admin\Category;
\Mage::loadFileByClassName('Block\Core\Template');

 class Grid extends \Block\Core\Template
 {
 	protected $template = NULL;
 	protected $categories = [];
 	protected $categoryOptions = NULL;

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Admin/Category/grid.php');
 	}

 	public function setCategories($categories = NULL)
	{
		if(!$categories)
		{
			$categories = \Mage::getModel('Model\Category');
			$categories = $categories->FetchAll();
		}
		$this->categories = $categories;
		return $this;
	}

	public function getCategories()
	{
		if (!$this->categories) {
			$this->setCategories();
		}
		return $this->categories; 
	}

	public function getName($category)
	{
		$model = \Mage::getModel('Model\Category');
		if (!$this->categoryOptions) {
			$query = "SELECT `CategoryId`,`Name` FROM `{$model->getTableName()}`";
 			$this->categoryOptions = $model->getAdapter()->fetchPairs($query);
		}
		$paths = explode("=", $category->path);
		foreach ($paths as $key => &$value) {
			if (array_key_exists($value, $this->categoryOptions)) {
				$value = $this->categoryOptions[$value];
			}
		}
		$name = implode("->", $paths);
		return $name;

	}

}
  
?>