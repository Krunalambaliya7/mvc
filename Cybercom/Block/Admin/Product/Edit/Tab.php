<?php

namespace Block\Admin\Product\Edit;
\Mage::loadFileByClassName('Block\Core\Template');

 class Tab extends \Block\Core\Template 
 {
 	protected $tabs = [];
 	protected $defaultTab = NULL;

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Admin/Product/Form/tab.php');
 		$this->prepareTab();
 	}

 	public function prepareTab()
 	{
 		$this->addTab('form',['label'=>'Product Information','block'=>'Block\Admin\Product\Edit\Tabs\Form']);
 		$this->addTab('media',['label'=>'Media','block'=>'Block\Admin\Product\Edit\Tabs\Media']);
 		$this->addTab('groupPrice',['label'=>'Group Price','block'=>'Block\Admin\Product\Edit\Tabs\GroupPrice']);
 		$this->addTab('category',['label'=>'Category','block'=>'Block\Admin\Product\Edit\Tabs\Category']);
 		$this->setDefaultTab('form');
 		return $this;
 	}

 } 
?>