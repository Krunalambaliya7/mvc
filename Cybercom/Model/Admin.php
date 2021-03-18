<?php

namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
		
class Admin extends \Model\Core\Table
{
	public function __construct()
	{
		parent::__construct();
		$this->setPrimaryKey("adminId");
		$this->setTableName("admin");
	}
}

?>