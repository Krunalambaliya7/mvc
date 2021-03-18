<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');

class Customer extends \Model\Core\Table
{

    public function __construct()
    {
        parent::__construct();
        $this->setTableName("customer");
        $this->setPrimaryKey("CustomerId");
    }
}
?>