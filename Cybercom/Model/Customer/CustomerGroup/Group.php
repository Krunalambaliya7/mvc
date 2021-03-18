<?php 
namespace Model\Customer\CustomerGroup;
\Mage::loadFileByClassName('Model\Core\Table');

class Group extends \Model\Core\Table
{

    public function __construct()
    {
        parent::__construct();
        $this->setTableName("customer_group");
        $this->setPrimaryKey("groupId");
    }

    public function fetchGroup()
    {
        $query = "SELECT groupName FROM `customer_group`";
        $rows = $this->getAdapter()->fetchAll($query);
        return $rows;
      
    }
}
?>