<?php 
namespace Model\Customer\CustomerAddress;
\Mage::loadFileByClassName('Model\Core\Table');

class Address extends Model_Core_Table
{

    public function __construct()
    {
        parent::__construct();
        $this->setTableName('customerAddress');
    }

    public function saveAddress()
    {
	 $query = "INSERT INTO `{$this->getTableName()}` (`".implode('`, `', array_keys($this->data))."`)  VALUES ('".implode('\',\'', array_values($this->data))."');";
      $id = $this->getAdapter()->insert($query);
      return $id;
    }
}
?>