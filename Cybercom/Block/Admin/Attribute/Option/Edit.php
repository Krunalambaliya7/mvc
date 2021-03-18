<?php

namespace Block\Admin\Attribute\Option;
\Mage::loadFileByClassName('Block\Core\Template');

class Edit extends \Block\Core\Template
{
	protected $options = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Admin/Attribute/Options/edit.php');
	}

	public function setOptions($options = NULL)
 	{

 		if ($options) {
 			$this->options = $options;
 			return $this;
 		}
 		$option = \Mage::getModel('Model\Attribute\Option');
 		if ($id =  $this->getRequest()->getGet('id')) {
 			$options = $option->fetchOption($id);
 		}
 		$this->options = $options;
 		return $this;
 	}

 	public function getOptions()
 	{
 		if (!$this->options) {
 			$this->setOptions(); 
 		}
 		return $this->options;
 	}
}
?>