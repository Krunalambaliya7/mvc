<?php

namespace Model\Attribute;
\Mage::loadFileByClassName('Model\Core\Table');
		
class Option extends \Model\Core\Table
{
	public function __construct()
	{
		parent::__construct();
		$this->setPrimaryKey("optionId");
		$this->setTableName("attribute_option");
	}

	public function fetchOption($id)
	{
		$query = "SELECT * FROM `{$this->getTableName()}` WHERE `attributeId`=$id";
		$rows = $this->FetchAll($query);
		return $rows;
	}

	public function deleteOption($ids)
	{
		$query = "DELETE FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}` NOT IN ($ids)";
		
		$this->getAdapter()->delete($query);
	}
}



?>