<?php
namespace Block\Admin\Admin;
\Mage::loadFileByClassName('Block\Core\Template');

 class Grid extends \Block\Core\Template
 {
 	protected $admins = [];

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Admin/Admin/grid.php');
 	}

 	public function setAdmins($admins = NULL)
	{
		if(!$admins)
		{
			$admin = \Mage::getModel('Model\Admin');
			$admins = $admin->FetchAll();
		}
		$this->admins = $admins;
		return $this;
	}

	public function getAdmins()
	{
		if (!$this->admins) {
			$this->setAdmins();
		}
		return $this->admins; 
	}
 } 
?>