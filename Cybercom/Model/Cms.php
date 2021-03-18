<?php

namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
		
class Cms extends \Model\Core\Table
{
	public function __construct()
	{
		parent::__construct();
		$this->setPrimaryKey("pageId");
		$this->setTableName("cmspage");
	}
}

?>