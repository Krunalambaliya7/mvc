<?php

namespace Block\Admin\Admin;
\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{	
	protected $admin = NULL;

	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Admin/Admin/edit.php');
	}

 	public function setAdmin($admin = NULL)
 	{

 		if ($admin) {
 			$this->admin = $admin;
 			return $this;
 		}
 		$admin = \Mage::getModel('Model\Admin');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$admin = $admin->load($id);
 		}

 		$this->admin = $admin;
 		return $this;
 	}

 	public function getAdmin()
 	{
 		if (!$this->admin) {
 			$this->setAdmin(); 
 		}
 		return $this->admin;
 	}
}

?>