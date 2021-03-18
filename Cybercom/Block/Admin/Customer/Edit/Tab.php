<?php

namespace Block\Admin\Customer\Edit;
\Mage::loadFileByClassName('Block\Core\Template');

 class Tab extends \Block\Core\Template 
 {
 	protected $tabs = [];
 	protected $defaultTab = NULL;

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Admin/Customer/Form/tab.php');
 		$this->prepareTab();
 	}

 	public function prepareTab()
 	{
 		$this->addTab('form',['label'=>'Customer Information','block'=>'Block\Admin\Customer\Edit\Tabs\Form']);
 		$this->addTab('address',['label'=>'Customer Address','block'=>'Block\Admin\Customer\CustomerAddress\Edit']);
 		$this->setDefaultTab('form');
 		return $this;
 	}

 	/*public function setDefaultTab($defaultTab)
 	{
 		$this->defaultTab = $defaultTab;
 		return $this;
 	}

 	public function getDefaultTab()
 	{
 		return $this->defaultTab;
 	}

 	public function setTabs(array $tabs)
 	{
 		$this->tabs = $tabs;
 		return $this;
 	}

 	public function getTabs()
 	{
 		return $this->tabs;
 	}

 	public function addTab($key,$tabs = [])
 	{
 		$this->tabs[$key] = $tabs;
 		return $this;
 	}

 	public function getTab($key)
 	{
 		if (!array_key_exists($key, $tabs)) {
 			return $this;
 		}
 		return $this->tabs[$key];
 	}

 	public function removeTab($key)
 	{
 		if (array_key_exists($key, $tabs)) {
 			unset($this->tabs[$key]);
 		}
 		return $this;
 	}*/
 } 
?>