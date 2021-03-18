<?php

namespace Model\Product;
\Mage::loadFileByClassName('Model\Core\Table');

class Category extends \Model\Core\Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName("product_category");
        $this->setPrimaryKey('primaryId');
    }

    public function fetchCategory()
    {
    	$query = "SELECT * FROM `category`";

    	$rows = $this->fetchAll($query);
    	return $rows;
    }
}