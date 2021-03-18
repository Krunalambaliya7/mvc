<?php

namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');

class Payment extends \Model\Core\Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName("payment");
        $this->setPrimaryKey("MethodId");
    }
}
?>