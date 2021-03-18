<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
		
class Attribute extends \Model\Core\Table
{
	public function __construct()
	{
		parent::__construct();
		$this->setPrimaryKey("attributeId");
		$this->setTableName("attribute");
	}
}

?>