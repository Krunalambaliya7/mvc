<?php

namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');

class Product extends \Model\Core\Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName("product");
        $this->setPrimaryKey("ProductId");
    }
}
?>