<?php

namespace Block\Admin\Dashboard;
\Mage::loadFileByClassName('Block\Core\Template');

 class Grid extends \Block\Core\Template
 {

 	public function __construct()
 	{
 		parent::__construct();
 		$this->setTemplate('./View/Admin/Dashboard/dashboard.php');

 	}


 } 
?>