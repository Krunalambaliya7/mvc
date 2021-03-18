<?php

namespace Block\Core\Layout;
\Mage::loadFileByClassName('Block\Core\Template'); 

class Header extends \Block\Core\Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/core/index.html');
	}
}
?>